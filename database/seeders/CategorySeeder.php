<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('categories')->delete();

        \DB::table('categories')->insert([
            [
                'name' => 'パーティー',
            ],
            [
                'name' => 'ミュージック',
            ],
            [
                'name' => 'グルメ',
            ],
            [
                'name' => 'ゲーム',
            ],
            [
                'name' => 'スポーツ',
            ],
            [
                'name' => 'ビジネス',
            ],
        ]);
    }
}
