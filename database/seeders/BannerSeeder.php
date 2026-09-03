<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [            [
                'title' => 'Dự lễ trung thu nhận ngay quà khủng',
                'subtitle' => '',
                'image' => 'uploads/banners/1788466088-xXyOFlrI.jpg',
                'link' => 'http://127.0.0.1:8000/vouchers',
                'type' => 'static_rect',
                'position' => 0,
                'status' => 1,
            ],
            [
                'title' => 'Mừng lễ 2/9',
                'subtitle' => 'Giảm sâu đến 30% cho điện thoại flagship',
                'image' => 'img/logo.png',
                'link' => '/shop',
                'type' => 'hero',
                'position' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Apple Store',
                'subtitle' => 'iPhone mới, ưu đãi lớn',
                'image' => 'img/logo.png',
                'link' => '/shop',
                'type' => 'hero',
                'position' => 2,
                'status' => 1,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::updateOrCreate(
                [
                    'title' => $banner['title'],
                    'type' => $banner['type'],
                    'position' => $banner['position'],
                ],
                [
                    'subtitle' => $banner['subtitle'],
                    'image' => $banner['image'],
                    'link' => $banner['link'],
                    'status' => $banner['status'],
                ]
            );
        }
    }
}