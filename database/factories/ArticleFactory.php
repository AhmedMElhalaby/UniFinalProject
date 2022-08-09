<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition()
    {
        $images = [
            'home_assets/images/corse1.png',
            'home_assets/images/corse2.png',
            'home_assets/images/corse3.png',
        ];
        return [
            'title'=>$this->faker->realText(60),
            'details'=>$this->faker->realText(500),
            'image'=>$this->faker->randomElement($images),
        ];
    }
}
