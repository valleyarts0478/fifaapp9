<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Team_owner;
use App\Models\GameResult;
use App\Models\Convention;
use App\Models\League;


class ConventionsResult extends Model
{
    use HasFactory;

    protected $table = 'convention_results';

    protected $fillable = [
        'id',
        'team_name',
        'convention_id',
        'league_id',
        'game_point',
        'game_count',
        'win',
        'lose',
        'draw',
        'numbers_diff',
    ];

    public function convention()
    {
        return $this->belongsTo(Convention::class);
    }
    public function league()
    {
        return $this->belongsTo(league::class);
    }
}
