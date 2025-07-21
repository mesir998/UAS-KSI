<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchModel extends Model
{
    use HasFactory;

    protected $table = 'match_models';

    protected $fillable = [
        'club_id',
        'opponent',
        'match_date',
        'location',
        'result',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }
}
