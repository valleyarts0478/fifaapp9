<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Convention;
use App\Models\League;
use App\Models\Goal_Assist;


class GameResult extends Model
{
    use HasFactory;

    protected $table = 'game_results';

    protected $fillable = [
        'game_id',
        'convention_id',
        'league_id',
        'section',
        'home_goal',
        'away_goal',
    ];

    public function game()
    {

        return $this->belongsTo(Game::class);
    }
    public function convention()
    {

        return $this->belongsTo(Convention::class);
    }
    public function leagues()
    {

        return $this->belongsTo(Leauge::class);
    }
    public function goal_assists()
    {
        return $this->hasMany(Goal_Assist::class);
    }
}
