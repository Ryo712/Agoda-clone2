<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'グランドホテル東京',
                'city' => '東京',
                'description' => '東京の中心部に位置する高級ホテル。ビジネスと観光の両方に最適な立地です。',
            ],
            [
                'name' => '大阪リバーサイドホテル',
                'city' => '大阪',
                'description' => '大阪川沿いに建つモダンなホテル。美しい景色と快適な滞在をお約束します。',
            ],
            [
                'name' => '京都トラディショナルイン',
                'city' => '京都',
                'description' => '伝統的な日本建築を活かした京都の宿。日本文化を体験したい方におすすめです。',
            ],
            [
                'name' => '札幌スノーリゾート',
                'city' => '札幌',
                'description' => '冬のスキーシーズンに最適な札幌のリゾートホテル。温泉施設も完備しています。',
            ],
            [
                'name' => '沖縄ビーチパラダイス',
                'city' => '沖縄',
                'description' => '沖縄の美しいビーチに面したリゾートホテル。マリンアクティビティも充実しています。',
            ],
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
