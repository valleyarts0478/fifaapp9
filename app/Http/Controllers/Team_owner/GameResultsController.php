<?php

namespace App\Http\Controllers\Team_owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Convention;
use App\Models\ConventionsResult;
use App\Models\League;
use App\Models\Team_owner;

class GameResultsController extends Controller
{
    public function index()
    {
        //降順の最初のレコードを取得
        $convention_id = Convention::orderBy('id', 'desc')->first();

        //リーグを全て取得
        $leagues_id = League::orderBy('id')->get();
        // dd($leagues_id);//idの１と２がとれている

        foreach ($leagues_id as $league_id) {

            // 試合結果テーブルから、大会ID・リーグIDを取得キーとして、試合結果レコードを全て取得する
            $game_results = GameResult::where('convention_id', $convention_id->id)
                ->where('league_id', $league_id->id)->get();

            //コレクション型はisEmpty
            if ($game_results->isEmpty()) {
                return '空になっている';
            }

            // 大会結果データ配列を用意する
            // $convention_results = [];
            // 試合結果データ配列から、home_teamだけを取得して全チームの名前を格納したチーム名配列を作成する

            // foreach ($game_results as $game_result) {
            //     $team_name = $game_result->game->home_team;
            // }
        }
        dd($game_results);

        $games = []; //配列初期化
        foreach ($game_results as $game_result) {
            $games[] = $game_result->game;
        }



        // $conventionsResults = ConventionsResult::all();
        // $conventionsResults = [];




        // $results = GameResult::all();
        // $team_owner = Team_owner::find(Auth::id());

        // $games = Game::select('id', 'convention_id', 'league_id', 'game_date', 'home_team', 'away_team')
        //     ->where('home_team', $team_owner->team_name)
        //     ->orWhere('away_team', $team_owner->team_name)
        //     ->orderBy('game_date', 'asc')
        //     ->get();

        // dd($results);

        // return view('team_owner.results.index', compact('results'));
    }

    public function edit($id)
    {
        $team_owner = Team_owner::find(Auth::id());
        $gameResult = GameResult::find($id);


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
