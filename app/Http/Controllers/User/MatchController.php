<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Convention;
use App\Models\League;
use App\Models\Team_owner;


class MatchController extends Controller
{
    public function index()
    {

        $results = GameResult::all();
        // dd($results);

        $games = Game::select('id', 'convention_id', 'league_id', 'game_date', 'home_team', 'away_team')
            ->orderBy('game_date', 'asc')
            ->get();

        return view('user.match.index', compact('results'));
    }

    public function top()
    {

        return view('test');
    }
}
