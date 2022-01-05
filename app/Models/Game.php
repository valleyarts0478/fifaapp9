<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Team_owner;
use App\Models\player;
use App\Models\GameResult;
use App\Models\Convention;
use App\Models\League;

class Game extends Model
{
    use HasFactory;

    // protected $dates = ['game_date'];

    protected $fillable = [
        'convention_id',
        'league_id',
        'game_date',
        'home_team',
        'away_team',
    ];

    public function results()
    {
        return $this->hasMany(GameResult::class);
    }
    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function convention()
    {
        return $this->belongsTo(Convention::class);
    }
    public function league()
    {
        return $this->belongsTo(league::class);
    }
}
