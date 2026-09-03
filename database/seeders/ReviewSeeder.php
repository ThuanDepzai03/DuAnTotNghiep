<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $samples = [
            ['name' => 'Minh Anh', 'rating' => 5, 'comment' => 'Sản phẩm đúng mô tả, đóng gói cẩn thận và giao hàng nhanh.'],
            ['name' => 'Hoàng Nam', 'rating' => 4, 'comment' => 'Mẫu mã đẹp, dùng ổn định. Nhân viên tư vấn nhiệt tình.'],
            ['name' => 'Thu Hà', 'rating' => 5, 'comment' => 'Hàng mới, chất lượng tốt, rất hài lòng với lần mua này.'],
            ['name' => 'Quốc Bảo', 'rating' => 4, 'comment' => 'Tư vấn rõ ràng, sản phẩm hoạt động tốt và đúng nhu cầu.'],
            ['name' => 'Ngọc Mai', 'rating' => 5, 'comment' => 'Mình rất thích sản phẩm, hình thức đẹp và trải nghiệm tốt.'],
        ];

        foreach (Product::query()->select(['id', 'name'])->get() as $product) {
            foreach ($samples as $sample) {
                Review::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'customer_id' => null,
                        'customer_name' => $sample['name'],
                    ],
                    [
                        'rating' => $sample['rating'],
                        'comment' => $sample['comment'] . ' Đánh giá cho sản phẩm ' . $product->name . '.',
                        'status' => 'approved',
                    ]
                );
            }
        }
    }
}
