<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = 'departements';
    protected $fillable = ['name'];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
