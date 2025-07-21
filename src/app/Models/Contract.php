<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';
    protected $fillable = [
        'player_id',
        'contract_number',
        'details',
        'signed_date',
        'expiry_date',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
