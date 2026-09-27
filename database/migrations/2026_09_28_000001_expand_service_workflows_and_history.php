<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE return_requests MODIFY status VARCHAR(40) NOT NULL DEFAULT 'pending'");
            DB::statement("ALTER TABLE warranty_claims MODIFY status VARCHAR(40) NOT NULL DEFAULT 'submitted'");
        }

        Schema::table('return_requests', function (Blueprint $table): void {
            foreach ([
                'refund_rejection_reason',
                'return_failure_reason',
                'customer_return_tracking_number',
                'shop_return_tracking_number',
            ] as $column) {
                if (!Schema::hasColumn('return_requests', $column)) {
                    $table->text($column)->nullable();
                }
            }

            foreach (['customer_sent_at', 'shop_received_at', 'customer_received_at'] as $column) {
                if (!Schema::hasColumn('return_requests', $column)) {
                    $table->timestamp($column)->nullable();
                }
            }
        });

        Schema::table('warranty_claims', function (Blueprint $table): void {
            foreach (['rejection_reason', 'return_failure_reason', 'customer_tracking_number', 'shop_tracking_number'] as $column) {
                if (!Schema::hasColumn('warranty_claims', $column)) {
                    $table->text($column)->nullable();
                }
            }

            foreach (['customer_sent_at', 'customer_received_at'] as $column) {
                if (!Schema::hasColumn('warranty_claims', $column)) {
                    $table->timestamp($column)->nullable();
                }
            }
        });

        if (!Schema::hasTable('service_request_status_histories')) {
            Schema::create('service_request_status_histories', function (Blueprint $table): void {
                $table->id();
                $table->string('request_type', 20);
                $table->unsignedBigInteger('request_id');
                $table->string('old_status', 40)->nullable();
                $table->string('new_status', 40);
                $table->text('reason')->nullable();
                $table->string('changed_by_type', 20)->nullable();
                $table->unsignedBigInteger('changed_by')->nullable();
                $table->string('changed_by_name')->nullable();
                $table->timestamps();
                $table->index(['request_type', 'request_id', 'id'], 'service_history_request_idx');
            });
        }

        if (Schema::hasTable('return_requests') && Schema::hasTable('service_request_status_histories')) {
            DB::table('return_requests')->orderBy('id')->each(function ($request): void {
                $exists = DB::table('service_request_status_histories')
                    ->where('request_type', 'return')
                    ->where('request_id', $request->id)
                    ->exists();

                if (!$exists) {
                    DB::table('service_request_status_histories')->insert([
                        'request_type' => 'return',
                        'request_id' => $request->id,
                        'old_status' => null,
                        'new_status' => $request->status,
                        'reason' => 'Ghi nhận trạng thái hiện có khi triển khai lịch sử.',
                        'changed_by_type' => 'system',
                        'changed_by_name' => 'Hệ thống',
                        'created_at' => $request->created_at ?? now(),
                        'updated_at' => $request->created_at ?? now(),
                    ]);
                }
            });
        }

        if (Schema::hasTable('warranty_claims') && Schema::hasTable('service_request_status_histories')) {
            DB::table('warranty_claims')->orderBy('id')->each(function ($claim): void {
                $exists = DB::table('service_request_status_histories')
                    ->where('request_type', 'warranty')
                    ->where('request_id', $claim->id)
                    ->exists();

                if (!$exists) {
                    DB::table('service_request_status_histories')->insert([
                        'request_type' => 'warranty',
                        'request_id' => $claim->id,
                        'old_status' => null,
                        'new_status' => $claim->status,
                        'reason' => 'Ghi nhận trạng thái hiện có khi triển khai lịch sử.',
                        'changed_by_type' => 'system',
                        'changed_by_name' => 'Hệ thống',
                        'created_at' => $claim->created_at ?? now(),
                        'updated_at' => $claim->created_at ?? now(),
                    ]);
                }
            });
        }
    }

    public function down(): void
    {
        throw new RuntimeException('Migration không thể rollback an toàn vì đã lưu lịch sử và trạng thái workflow mới.');
    }
};