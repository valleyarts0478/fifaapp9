<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Convention;
use App\Models\League;
use App\Models\GameResult;
use App\Models\Team_owner;
use App\Models\Goal_Assist;

class PlayerRankController extends Controller
{
    public function index()
    {
        // $goal_assists = Goal_Assist::all();
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        //リレーション先のカラムを利用する場合の書き方
        //$conventionを外からつかうためuseで読み込む
        $goal_assists = Goal_Assist::wherehas('game_results', function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->get();

        // dd($goal_assists);
        // $goal_assist->game_results->convention_id;
        $player_rank = [];
        foreach ($goal_assists as $goal_assist) {

            $player_rank[$goal_assist->player_name][] = [
                'convention_id' => $goal_assist->game_results->convention_id,
                'league_id' => $goal_assist->game_results->league_id,
                'game_results_id' => $goal_assist->game_results_id,
                'team_name' => $goal_assist->team_owner->team_name,
                'team_abb' => $goal_assist->team_owner->team_abb,
                'team_logo_url' => $goal_assist->team_owner->team_logo_url,
                'goals' => $goal_assist->goals,
                'assists' => $goal_assist->assists
            ];
        }
        // dd($player_rank);
        $goal_ranking = [];
        $assists_ranking = [];
        foreach ($player_rank as $key => $value) {
            $goal_sum = 0;
            $assist_sum = 0;
            foreach ($value as $value2) {
                $goal_sum += $value2['goals'];
                $assist_sum += $value2['assists'];
            }
            $goal_ranking[] = [
                'convention_id' => $value2['convention_id'],
                'league_id' => $value2['league_id'],
                'player_name' => $key,
                'goals' => $goal_sum,
                // 'assists' => $assist_sum,
                'team_name' => $value2['team_name'],
                'team_abb' => $value2['team_abb'],
                'team_logo_url' => $value2['team_logo_url']
            ];
            $assists_ranking[] = [
                'convention_id' => $value2['convention_id'],
                'league_id' => $value2['league_id'],
                'player_name' => $key,
                // 'goals' => $goal_sum,
                'assists' => $assist_sum,
                'team_name' => $value2['team_name'],
                'team_abb' => $value2['team_abb'],
                'team_logo_url' => $value2['team_logo_url']
            ];
        }
        //goalsの降順で並び替え
        array_multisort(array_column($goal_ranking, 'goals'), SORT_DESC, $goal_ranking);
        //assistsの降順で並び替え
        array_multisort(array_column($assists_ranking, 'assists'), SORT_DESC, $assists_ranking);

        //レコード数カウント
        $goal_cnt = count($goal_ranking);
        $assists_cnt = count($assists_ranking);

        $flag = array_filter($goal_ranking, function ($goal_ranking) {
            return $goal_ranking['league_id'] == 2;
        });

        // dd($flag);
        // dd($goal_ranking);
        return view('user.player_rank', compact('goal_assists', 'goal_ranking', 'assists_ranking', 'flag', 'goal_cnt', 'assists_cnt'));
    }
}
