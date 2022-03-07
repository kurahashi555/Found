<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_names = [
            '食品＆飲料',
            'ドラッグストア＆パーソナルケア',
            '美容',
            'ファッション',
            'アクセサリー',
            'ホーム家具',
            '家電＆カメラ',
            'パソコン・周辺機器',
            '音楽＆楽器',
            'ビデオ・ゲーム',
            '本',
            '文房具＆オフィス用品',
            'おもちゃ・キッズ＆ベビー',
            'スポーツ・アウトドア',
            'ペット用品',
            '車＆バイク',
            '植物'
        ];

        foreach ($category_names as $category_name) {
            $category_info = [
                'name' => $category_name,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ];
            DB::table('categories')->insert($category_info);
        }
    }
}
