<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseStudentFactory extends Factory
{
    public function definition()
    {
        return [
            'student_id'=>Student::pluck('id')[$this->faker->numberBetween(1,Student::count()-1)],
            'course_id'=>Course::pluck('id')[$this->faker->numberBetween(1,Course::count()-1)],
            'is_paid'=>$this->faker->boolean()
        ];
    }
}
