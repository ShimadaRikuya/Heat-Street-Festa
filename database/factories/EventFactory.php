<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'discription' => $this->faker->unique()->safeEmail(),
            'image_uploader' => 'storage/event_images/アインシュタイン.jpg',
            'event_start' => now(), // password
            'event_end' => '2022-12-31',
            'event_time_discription' => '10時会場、11時開演',
            'fee' => rand(1000,10000),
            'official_url' => 'URL',
            'venue' => '東京ドーム',
            'zip' => '0010000',
            'address1' => '北海道',
            'address2' => '札幌市北区',
            'category_id' => rand(1,5),
            'team_id' => '1',
            'form_public' => '1',
        ];
    }
}
