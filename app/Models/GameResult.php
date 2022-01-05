<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Convention;
use App\Models\League;

class GameResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'convention_id',
        'league_id',
        'home_goal',
        'away_goal',
    ];

    public function game()
    {

        return $this->belongsTo(game::class);
    }
    public function convention()
    {

        return $this->belongsTo(Convention::class);
    }
    public function league()
    {

        return $this->belongsTo(Leauge::class);
    }
}
