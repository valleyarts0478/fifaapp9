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
        'section',
        'home_team',
        'away_team',
    ];
//Laravel 9.52 以降では $dates は非推奨 で、代わりに $casts を使うのが正しい方法 です。
    // protected $dates = ['game_date']; //日付フォーマットできるようにした
    protected $casts = [
        'game_date' => 'datetime',
    ];
    
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
