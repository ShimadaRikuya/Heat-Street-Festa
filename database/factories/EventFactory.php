<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            'image_uploader' => '1TFcmIVyKCrYu4S9iYBfzgBoZxpTKcX3NO3JsXEG.png', 
            'event_start' => now(), 
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
            'user_id' => '1', 
            'form_public' => '1', 
        ]; 
    }
}
