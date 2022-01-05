<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Team_owner;

class League extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'league_name',
    ];

    // public function convention()
    // {

    //     return $this->belongsTo(Convention::class, 'convention_id');
    // }
    public function team_owner()
    {

        return $this->hasOne(Team_owner::class);
    }
    public function games()
    {

        return $this->hasMany(Game::class);
    }
}
