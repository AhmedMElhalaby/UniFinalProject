<?php

namespace Database\Factories;

use App\Enums\Gender;
use App\Enums\ScientificGrade;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'mobile'=>$this->faker->phoneNumber(),
            'identity_number'=>$this->faker->randomNumber(9),
            'std_number'=>'2015'.$this->faker->numberBetween(1000,9999),
            'birthday'=>$this->faker->date(),
            'gender'=>$this->faker->randomElement(array_column(Gender::cases(),'value')),
            'scientific_grade'=>$this->faker->randomElement(array_column(ScientificGrade::cases(),'value')),
            'address'=>$this->faker->address(),
            'password'=>'123456'
        ];
    }
}
