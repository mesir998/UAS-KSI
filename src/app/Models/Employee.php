<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'nik',
        'email',
        'department_id',
        'position_id',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function salarySlip()
    {
        return $this->hasMany(SalarySlip::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
