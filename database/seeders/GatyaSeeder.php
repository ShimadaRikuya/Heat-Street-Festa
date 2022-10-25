<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\gatya;

class GatyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('gatyas')->delete();

        \DB::table('gatyas')->insert([
            [
                'name' => 'ドリンク無料',
                'discription' => 'ドリンクが1杯無料で貰える引換券',
            ],
            [
                'name' => 'ドリンクホルダー',
                'discription' => 'ドリンクホルダーが1つ無料で貰える引換券',
            ],
            [
                'name' => '景品1',
                'discription' => '景品1が1つ無料で貰える引換券',
            ],
            [
                'name' => '景品2',
                'discription' => '景品2が1つ無料で貰える引換券',
            ],
            [
                'name' => '景品3',
                'discription' => '景品3が1つ無料で貰える引換券',
            ],
            [
                'name' => '景品4',
                'discription' => '景品4が1つ無料で貰える引換券',
            ],
        ]);
    }
}
