<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('service_reasons')) {
            Schema::create('service_reasons', function (Blueprint $table): void {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->enum('service_type', ['return', 'warranty', 'both'])->default('both');
                $table->text('condition_text')->nullable();
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('return_requests', 'reason_id')) {
            Schema::table('return_requests', function (Blueprint $table): void {
                $table->foreignId('reason_id')->nullable()->after('user_id')->constrained('service_reasons')->nullOnDelete();
                $table->foreignId('warranty_claim_id')->nullable()->after('admin_note')->constrained('warranty_claims')->nullOnDelete();
            });
        }

        if (!Schema::hasColumn('warranty_claims', 'reason_id')) {
            Schema::table('warranty_claims', function (Blueprint $table): void {
                $table->foreignId('reason_id')->nullable()->after('user_id')->constrained('service_reasons')->nullOnDelete();
                $table->foreignId('return_request_id')->nullable()->after('technician_note')->constrained('return_requests')->nullOnDelete();
            });
        }

        $reasons = [
            ['name' => 'Sản phẩm lỗi kỹ thuật', 'slug' => 'san-pham-loi-ky-thuat', 'service_type' => 'both', 'condition_text' => 'Cần cung cấp IMEI và mô tả lỗi; shop kiểm tra tình trạng thực tế.', 'sort_order' => 1],
            ['name' => 'Giao sai sản phẩm', 'slug' => 'giao-sai-san-pham', 'service_type' => 'return', 'condition_text' => 'Sản phẩm chưa qua sử dụng, còn đủ phụ kiện và gửi yêu cầu trong thời hạn đổi trả.', 'sort_order' => 2],
            ['name' => 'Sản phẩm hư hỏng khi nhận', 'slug' => 'hu-hong-khi-nhan', 'service_type' => 'return', 'condition_text' => 'Cần mô tả tình trạng và có thể bổ sung hình ảnh khi đối soát.', 'sort_order' => 3],
            ['name' => 'Không đúng mô tả', 'slug' => 'khong-dung-mo-ta', 'service_type' => 'return', 'condition_text' => 'Sản phẩm và phụ kiện gửi lại đầy đủ để shop kiểm tra.', 'sort_order' => 4],
            ['name' => 'Lỗi pin/sạc', 'slug' => 'loi-pin-sac', 'service_type' => 'warranty', 'condition_text' => 'Thiết bị còn trong thời hạn bảo hành và xác minh đúng IMEI.', 'sort_order' => 5],
            ['name' => 'Lỗi màn hình/cảm ứng', 'slug' => 'loi-man-hinh-cam-ung', 'service_type' => 'warranty', 'condition_text' => 'Không thuộc lỗi do rơi vỡ, vào nước hoặc can thiệp phần cứng.', 'sort_order' => 6],
        ];

        foreach ($reasons as $reason) {
            DB::table('service_reasons')->updateOrInsert(['slug' => $reason['slug']], array_merge($reason, ['is_active' => true, 'created_at' => now(), 'updated_at' => now()]));
        }
    }

    public function down(): void
    {
        Schema::table('warranty_claims', function (Blueprint $table): void {
            $table->dropForeign(['reason_id']);
            $table->dropForeign(['return_request_id']);
            $table->dropColumn(['reason_id', 'return_request_id']);
        });
        Schema::table('return_requests', function (Blueprint $table): void {
            $table->dropForeign(['reason_id']);
            $table->dropForeign(['warranty_claim_id']);
            $table->dropColumn(['reason_id', 'warranty_claim_id']);
        });
        Schema::dropIfExists('service_reasons');
    }
};
