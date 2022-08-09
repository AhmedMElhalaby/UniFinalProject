<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseSuggestion extends Model
{
    use HasFactory;

    protected $table = 'courses_suggestions';

    protected $fillable = ['student_id','course_name','note'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
