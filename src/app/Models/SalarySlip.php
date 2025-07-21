<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class SalarySlip extends Model
{
    protected $table = 'salary_slips';

    protected $fillable = [
        'employee_id',
        'month',
        'amount',
    ];

    // Mutator: simpan data amount terenkripsi
    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = Crypt::encryptString($value);
    }

    // Accessor: ambil data amount dalam bentuk terdekripsi
    public function getAmountAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
