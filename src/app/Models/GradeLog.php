<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GradeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'student_id',
        'action',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Mutator: Simpan terenkripsi
    public function setActionAttribute($value)
    {
        $this->attributes['action'] = Crypt::encryptString($value);
    }

    // Accessor: Ambil didekripsi aman
    public function getActionAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }
}
