<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Enums\ScientificGrade;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturerFactory extends Factory
{
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'mobile'=>$this->faker->phoneNumber(),
            'identity_number'=>$this->faker->randomNumber(9),
            'gender'=>$this->faker->randomElement(array_column(Gender::cases(),'value')),
            'scientific_grade'=>$this->faker->randomElement(array_column(ScientificGrade::cases(),'value')),
            'address'=>$this->faker->address(),
        ];
    }
}
