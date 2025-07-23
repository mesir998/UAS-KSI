<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'name',
    'nim',
    'study_program',
    'enrollment_year',


    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    

    // --------------------------
    // Mutators: Simpan terenkripsi
    // --------------------------

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    public function setNimAttribute($value)
    {
        $this->attributes['nim'] = Crypt::encryptString($value);
    }

    public function setStudyProgramAttribute($value)
    {
        $this->attributes['study_program'] = Crypt::encryptString($value);
    }

    // --------------------------
    // Accessors: Ambil didekripsi
    // --------------------------

    public function getNameAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function getNimAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function getStudyProgramAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }
}
