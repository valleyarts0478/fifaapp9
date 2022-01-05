<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Convention;
use App\Models\League;
use App\Models\Team_owner;

class GameResultsController extends Controller
{
    public function index()
    {
        // $conventions = Convention::all();
        // $leagues = League::all();
        // $games = Game::all();
        $results = GameResult::all();
        $team_owner = Team_owner::find(Auth::id());
        // dd($team_owner->team_name);

        $games = Game::select('id', 'convention_id', 'league_id', 'game_date', 'home_team', 'away_team')
            ->where('home_team', $team_owner->team_name)
            ->orWhere('away_team', $team_owner->team_name)
            ->orderBy('game_date', 'asc')
            ->get();

        // dd($results);

        return view('team_owner.results.index', compact('results'));
    }

    public function edit($id)
    {
        $team_owner = Team_owner::find(Auth::id());
        $gameResult = GameResult::find($id);

        // dd($players);

        return view('team_owner.results.edit', compact('gameResult', 'team_owner'));
    }

    public function update(Request $request, $id)
    {
        $gameResult = GameResult::find($id);
        $team_owner = Team_owner::find(Auth::id());

        if ($team_owner->team_name === $gameResult->game->home_team) {
            $gameResult->home_goal = $request->goal;
        } elseif ($team_owner->team_name === $gameResult->game->away_team) {
            $gameResult->away_goal = $request->goal;
        } else {
            return redirect()
                ->route('team_owner.results.index')
                ->with('status', 'team_nameが統一されていない可能性があります。');
        }

        $gameResult->save();

        return redirect()
            ->route('team_owner.results.index')
            ->with([
                'message' => '試合結果を入力しました。',
                'status' => 'info'
            ]);
    }
}
