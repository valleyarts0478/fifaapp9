<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Team_owner;
use App\Models\Goal_Assist;

class GoalAssistsController extends Controller
{
    public function index()
    {
        $results = GameResult::all();
        $team_owner = Team_owner::find(Auth::id());

        $games = Game::select('id', 'convention_id', 'league_id', 'game_date', 'home_team', 'away_team')
            ->where('home_team', $team_owner->team_name)
            ->orWhere('away_team', $team_owner->team_name)
            ->orderBy('game_date', 'asc')
            ->get();

        return view('team_owner.results.index', compact('results'));
    }

    public function edit($id)
    {
        $team_owner = Team_owner::find(Auth::id());
        $players = $team_owner->players;
        $gameResult = GameResult::find($id);
        $goal_assists = Goal_Assist::all();
        // dd($players);
        $goal_assist = [];
        foreach ($players as $player) {
            foreach ($goal_assists as $goal_assist) {
                $goal_assist = [ //初期設定
                    'game_id' => $goal_assist->game->id,
                    'team_owner_id' => $team_owner,
                    'player_id' => $player->id,
                ];
            }
        }
        // dd($goal_assist);

        return view('team_owner.results.edit', compact('gameResult', 'team_owner', 'players'));
    }

    public function update(Request $request, $id)
    {
        $gameResult = GameResult::find($id);
        $team_owner = Team_owner::find(Auth::id());
        $goal_assists = Goal_Assist::all();


        foreach ($goal_assists as $goal_assist) {
            //ゴール・アシスト入力
            $goal_assists->player_id = $request->player_id;
            $goal_assists->goal =  $request->goal;
            // $goal_assists->assists = $request->asssits;

            $goal_assists->save();
        }

        return redirect()
            ->route('team_owner.results.index')
            ->with([
                'message' => '試合結果を入力しました。',
                'status' => 'info'
            ]);
    }
}
