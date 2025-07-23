<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_name',
        'score',
        'letter_grade',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function logs()
    {
        return $this->hasMany(GradeLog::class);
    }

    // --------------------------
    // Mutators
    // --------------------------

    public function setCourseNameAttribute($value)
    {
        $this->attributes['course_name'] = Crypt::encryptString($value);
    }

    public function setScoreAttribute($value)
    {
        $this->attributes['score'] = Crypt::encryptString($value);
    }

    public function setLetterGradeAttribute($value)
    {
        $this->attributes['letter_grade'] = Crypt::encryptString($value);
    }

    // --------------------------
    // Accessors (AMAN)
    // --------------------------

    public function getCourseNameAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function getScoreAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function getLetterGradeAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }
}
