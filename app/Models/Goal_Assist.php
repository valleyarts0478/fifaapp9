<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Convention;
use App\Models\Team_owner;
use App\Models\GameResult;

class Goal_Assist extends Model
{
    use HasFactory;

    protected $table = 'goal_assists';

    protected $fillable = [
        'game_result_id',
        'team_owner_id',
        'player_name',
        'player_id',
        'goal',
        'assists',
    ];


    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    public function team_owner()
    {
        return $this->belongsTo(Team_owner::class);
    }
    public function convention()
    {
        return $this->belongsTo(Convention::class);
    }
    public function game_result()
    {
        return $this->belongsTo(GameResult::class);
    }
}
