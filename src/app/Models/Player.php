<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $fillable = [
        'club_id',
        'name',
        'date_of_birth',    
        'position',
        'contract_start',
        'contract_end',
        'salary',
    ];

    // ⏬⏬⏬ WAJIB: Mutator & Accessor salary
    public function setSalaryAttribute($value)
    {
        $this->attributes['salary'] = Crypt::encryptString($value);
    }

    public function getSalaryAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }
}
