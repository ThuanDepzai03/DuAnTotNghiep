<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('attributes', function (Blueprint $table): void {
            if (!Schema::hasColumn('attributes', 'slug')) {
                $table->string('slug')->nullable()->after('name');
            }

            if (!Schema::hasColumn('attributes', 'display_type')) {
                $table->string('display_type', 20)->default('select')->after('input_type');
            }

            if (!Schema::hasColumn('attributes', 'attribute_type')) {
                $table->string('attribute_type', 20)->default('variation')->after('display_type');
            }

            if (!Schema::hasColumn('attributes', 'is_filterable')) {
                $table->boolean('is_filterable')->default(false)->after('is_active');
            }
        });

        Schema::table('attribute_values', function (Blueprint $table): void {
            if (!Schema::hasColumn('attribute_values', 'slug')) {
                $table->string('slug')->nullable()->after('value');
            }

            if (!Schema::hasColumn('attribute_values', 'color_hex')) {
                $table->string('color_hex', 7)->nullable()->after('slug');
            }

            if (!Schema::hasColumn('attribute_values', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0)->after('color_hex');
            }
        });

        if (!Schema::hasTable('product_attributes')) {
            Schema::create('product_attributes', function (Blueprint $table): void {
                $table->id();
                $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
                $table->foreignId('attribute_id')->nullable()->constrained('attributes')->nullOnDelete();
                $table->string('name');
                $table->string('slug');
                $table->string('display_type', 20)->default('select');
                $table->string('attribute_type', 20)->default('information');
                $table->boolean('is_required')->default(false);
                $table->boolean('is_filterable')->default(false);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();

                $table->unique(['product_id', 'attribute_id']);
                $table->index(['product_id', 'slug']);
            });
        }

        if (!Schema::hasTable('product_attribute_values')) {
            Schema::create('product_attribute_values', function (Blueprint $table): void {
                $table->id();
                $table->foreignId('product_attribute_id')->constrained('product_attributes')->cascadeOnDelete();
                $table->foreignId('attribute_value_id')->nullable()->constrained('attribute_values')->nullOnDelete();
                $table->text('custom_value')->nullable();
                $table->string('color_hex', 7)->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();

                $table->unique(
                    ['product_attribute_id', 'attribute_value_id'],
                    'product_attribute_value_unique'
                );
            });
        }

        DB::table('attributes')->orderBy('id')->get()->each(function (object $attribute): void {
            DB::table('attributes')
                ->where('id', $attribute->id)
                ->update([
                    'slug' => $attribute->slug ?: $this->uniqueSlug('attributes', $attribute->name, $attribute->id),
                    'display_type' => $attribute->display_type ?: $this->legacyDisplayType($attribute->input_type),
                ]);
        });

        DB::table('attribute_values')->orderBy('id')->get()->each(function (object $value): void {
            DB::table('attribute_values')
                ->where('id', $value->id)
                ->update([
                    'slug' => $value->slug ?: $this->uniqueValueSlug($value->attribute_id, $value->value, $value->id),
                ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_attribute_values');
        Schema::dropIfExists('product_attributes');

        Schema::table('attribute_values', function (Blueprint $table): void {
            $table->dropColumn(['slug', 'color_hex', 'sort_order']);
        });

        Schema::table('attributes', function (Blueprint $table): void {
            $table->dropColumn(['slug', 'display_type', 'attribute_type', 'is_filterable']);
        });
    }

    private function legacyDisplayType(?string $inputType): string
    {
        return match ($inputType) {
            'number' => 'number',
            'text' => 'text',
            default => 'select',
        };
    }

    private function uniqueSlug(string $table, string $name, int $ignoreId): string
    {
        $base = Str::slug($name) ?: 'attribute';
        $slug = $base;
        $suffix = 2;

        while (DB::table($table)->where('slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = $base . '-' . $suffix++;
        }

        return $slug;
    }

    private function uniqueValueSlug(int $attributeId, string $value, int $ignoreId): string
    {
        $base = Str::slug($value) ?: 'value';
        $slug = $base;
        $suffix = 2;

        while (DB::table('attribute_values')
            ->where('attribute_id', $attributeId)
            ->where('slug', $slug)
            ->where('id', '!=', $ignoreId)
            ->exists()) {
            $slug = $base . '-' . $suffix++;
        }

        return $slug;
    }
};