<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\League;
use App\Models\Game;
use App\Models\Player;
use App\Models\Convention;
use App\Models\Goal_Assist;


class Team_owner extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'convention_id',
        'league_id',
        'team_name',
        'team_abb',
        'team_logo_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function league()
    {

        return $this->belongsTo(League::class);
    }

    public function convention()
    {

        return $this->belongsTo(Convention::class);
    }

    public function player()
    {

        return $this->hasMany(Player::class);
    }
    // public function games()
    // {

    //     return $this->hasOne(Game::class);
    // }
    public function goal_assists()
    {

        return $this->hasMany(Goal_Assist::class);
    }
}
