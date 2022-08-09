<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\ScientificGrade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = ['name','email','mobile','identity_number','gender','scientific_grade','avatar','address','is_active'];

    protected $casts = [
        'gender' => Gender::class,
        'scientific_grade' => ScientificGrade::class,
    ];
}
