<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\ScientificGrade;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name','email','mobile','identity_number','std_number','password','birthday','gender','scientific_grade','address','avatar','is_active'];

    protected $hidden = ['password'];

    protected $casts = [
        'gender' => Gender::class,
        'scientific_grade' => ScientificGrade::class,
    ];

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn ($value, $attributes) => $attributes['password'] = Hash::make($value),
        );
    }
    public function courses_students(): HasMany
    {
        return $this->hasMany(CourseStudent::class);
    }
    public function courses()
    {
        return Course::whereIn('id',$this->courses_students()->pluck('course_id'))->get();
    }
}
