<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    public function definition()
    {
        $images = [
            'home_assets/images/laravel.png',
            'home_assets/images/node.png',
            'home_assets/images/paython.png',
        ];
        return [
            'title'=>$this->faker->name(),
            'details'=>$this->faker->realText('50'),
            'image'=>$this->faker->randomElement($images),
            'url'=>$this->faker->url()
        ];
    }
}
