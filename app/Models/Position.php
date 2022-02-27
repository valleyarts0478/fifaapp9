<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Player;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_name',

    ];

    // protected $table = 'positions';

    public function players()
    {

        return $this->hasMany(Player::class);
    }
}
