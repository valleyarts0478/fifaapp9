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
use App\Models\Goal_Assist;

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

    protected $dates = ['game_date']; //日付フォーマットできるようにした

    public function game_results()
    {
        return $this->hasOne(GameResult::class);
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
    // public function team_owner()
    // {
    //     return $this->belongsTo(Team_owner::class);
    // }
    // public function goalassist()
    // {
    //     return $this->hasMany(Goal_Assist::class);
    // }
}
