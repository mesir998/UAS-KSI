<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $fillable = [
        'employee_id',
        'date',
        'is_present',
    ];

    public function employee() // singular
    {
        return $this->belongsTo(Employee::class);
    }
}
