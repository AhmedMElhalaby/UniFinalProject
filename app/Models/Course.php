<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['name','details','location','lecturer_id','start_date','end_date','course_days','course_hours','lecture_start_time','image','is_active'];

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }
    public function is_student(): bool
    {
        if (!auth('web')->check())
            return false;
        return (bool)CourseStudent::where('course_id', $this->id)->where('student_id', auth()->user()->id)->first();
    }
}
