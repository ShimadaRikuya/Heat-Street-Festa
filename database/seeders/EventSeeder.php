<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('events')->delete();

        \DB::table('events')->insert([
            [
                'title' => 'タイトル1',
                'discription' => '説明',
                'image_uploader' => 'storage/event_images/アインシュタイン.jpg',
                'event_start' => '2022-01-01',
                'event_end' => '2022-12-31',
                'event_time_discription' => '10時会場、11時開演',
                'fee' => '1000',
                'official_url' => 'URL',
                'venue' => '東京ドーム',
                'zip1' => '001',
                'zip2' => '0000',
                'address1' => '北海道',
                'address2' => '札幌市北区',
                'category_id' => '1',
                'team_id' => '1',
                'form_public' => '1',
            ]
        ]);
    }
}
