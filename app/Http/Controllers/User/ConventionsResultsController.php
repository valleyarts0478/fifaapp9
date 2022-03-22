<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Convention;
use App\Models\ConventionsResult;
use App\Models\League;
use App\Models\Team_owner;

class ConventionsResultsController extends Controller
{
    public function index()
    {
        // $goal_assists = Goal_Assist::all();
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        //リレーション先のカラムを利用する場合の書き方
        //$conventionを外からつかうためuseで読み込む
        $convention_results = ConventionsResult::where('convention_id', $convention->id)
            ->orderBy('game_point', 'desc')
            ->get();
        $count = count($convention_results);

        //試合結果が未登録の場合
        if ($count === 0) {
            return view('user.no_match');
        } else
            // dd($convention_results);

            $team_info = [];
        foreach ($convention_results as $result) {
            $team_info['team_name'][] = $result->team_name;
            // 'league_id' => $result->league_id,
        }
        // dd($team_info);
        // 画像情報とるため
        $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();
        // $count = count($team_names);
        // dd($cnt, $team_names);
        //flag用
        $test = [];
        foreach ($convention_results as $result) {
            $test[] = [
                'league_id' => $result['league_id']
            ];
        }
        // dump($test);
        // dd($test);
        $flag = array_filter($test, function ($test) {
            return $test['league_id'] == 2;
        });
        // dd($flag);

        return view('user.team_rank', compact('convention_results', 'team_names', 'flag', 'count'));
    }
}
