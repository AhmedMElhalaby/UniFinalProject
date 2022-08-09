<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition()
    {
        $images = [
            'home_assets/images/corse1.png',
            'home_assets/images/corse2.png',
            'home_assets/images/corse3.png',
        ];
        return [
            'name'=>$this->faker->name(),
            'details'=>$this->faker->realText(),
            'location'=>$this->faker->address(),
            'lecturer_id'=>Lecturer::pluck('id')[$this->faker->numberBetween(1,Lecturer::count()-1)],
            'start_date'=>$this->faker->date(),
            'end_date'=>$this->faker->date(),
            'course_days'=>$this->faker->randomDigitNotZero(),
            'course_hours'=>$this->faker->randomDigitNotZero(),
            'lecture_start_time'=>$this->faker->time(),
            'image'=>$this->faker->randomElement($images)
        ];
    }
}
