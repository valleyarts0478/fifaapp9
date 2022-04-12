<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan; //追加
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Convention;
use App\Models\ConventionsResult;
use App\Models\League;
use App\Models\Team_owner;
use Carbon\Carbon;

class BatchTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'conventionbatch:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '大会結果反映';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        // $team_owners = Team_owner::where('convention_id', $convention->id)->get();
        //リーグを全て取得
        $leagues = League::orderBy('id')->get();
        // dd($leagues_id);//idの１と２がとれている


        foreach ($leagues as $league) {

            // 試合結果テーブルから、大会ID・リーグIDを取得キーとして、試合結果レコードを全て取得する
            $game_results = GameResult::where('convention_id', $convention->id)
                ->where('league_id', $league->id)->get();

            //コレクション型はisEmpty
            if ($game_results->isEmpty()) {
                return '試合が存在しません。';
            }



            // 試合結果データ配列から、home_teamだけを取得して全チームの名前を格納したチーム名配列を作成する
            $team_names = [];
            foreach ($game_results as $results) {
                $team_names[] = $results->game->home_team;
            }

            //大会結果データ配列を用意する
            $convention_results = [];
            foreach ($team_names as $team_name) {
                $convention_results = [ //初期設定
                    'team_name' => $team_name,
                    'convention_id' => $convention->id,
                    'league_id' => $league->id,
                    'game_point' => 0,
                    'game_count' => 0,
                    'win' => 0,
                    'lose' => 0,
                    'draw' => 0,
                    'gain' => 0,
                    'loss' => 0,
                    'numbers_diff' => 0,
                ];

                foreach ($game_results as $game_result) {
                    //team_nameがどちらでもない場合はスキップ
                    if (is_null($game_result->home_goal) && is_null($game_result->away_goal)) {
                        continue;
                        //team_nameがhomeと一致・home側が勝利
                    } elseif ($convention_results['team_name'] === $game_result->game->home_team && $game_result->home_goal > $game_result->away_goal) {
                        $convention_results['team_name'] = $game_result->game->home_team;
                        $convention_results['convention_id'] = $game_result->game->convention_id;
                        $convention_results['league_id'] = $game_result->game->league_id;
                        $convention_results['game_point'] += 3;
                        $convention_results['game_count'] += 1;
                        $convention_results['win'] += 1;
                        $convention_results['lose'] += 0;
                        $convention_results['draw'] += 0;
                        $convention_results['gain'] += $game_result->home_goal; //カラム追加 得点
                        $convention_results['loss'] += $game_result->away_goal; //カラム追加 失点
                        $convention_results['numbers_diff'] += $game_result->home_goal - $game_result->away_goal;
                        //team_nameがhomeと一致・home側が敗戦
                    } elseif ($convention_results['team_name'] === $game_result->game->home_team && $game_result->home_goal < $game_result->away_goal) {
                        $convention_results['team_name'] = $game_result->game->home_team;
                        $convention_results['convention_id'] = $game_result->game->convention_id;
                        $convention_results['league_id'] = $game_result->game->league_id;
                        $convention_results['game_point'] += 0;
                        $convention_results['game_count'] += 1;
                        $convention_results['win'] += 0;
                        $convention_results['lose'] += 1;
                        $convention_results['draw'] += 0;
                        $convention_results['gain'] += $game_result->home_goal; //カラム追加 得点
                        $convention_results['loss'] += $game_result->away_goal; //カラム追加 失点
                        $convention_results['numbers_diff'] += $game_result->home_goal - $game_result->away_goal;
                        //team_nameがawayと一致・away側が勝利
                    } elseif ($convention_results['team_name'] === $game_result->game->away_team && $game_result->away_goal > $game_result->home_goal) {
                        $convention_results['team_name'] = $game_result->game->away_team;
                        $convention_results['convention_id'] = $game_result->game->convention_id;
                        $convention_results['league_id'] = $game_result->game->league_id;
                        $convention_results['game_point'] += 3;
                        $convention_results['game_count'] += 1;
                        $convention_results['win'] += 1;
                        $convention_results['lose'] += 0;
                        $convention_results['draw'] += 0;
                        $convention_results['gain'] += $game_result->away_goal; //カラム追加 得点
                        $convention_results['loss'] += $game_result->home_goal; //カラム追加 失点
                        $convention_results['numbers_diff'] += $game_result->away_goal - $game_result->home_goal;
                        //team_nameがawayと一致・away側が敗戦
                    } elseif ($convention_results['team_name'] === $game_result->game->away_team && $game_result->away_goal < $game_result->home_goal) {
                        $convention_results['team_name'] = $game_result->game->away_team;
                        $convention_results['convention_id'] = $game_result->game->convention_id;
                        $convention_results['league_id'] = $game_result->game->league_id;
                        $convention_results['game_point'] += 0;
                        $convention_results['game_count'] += 1;
                        $convention_results['win'] += 0;
                        $convention_results['lose'] += 1;
                        $convention_results['draw'] += 0;
                        $convention_results['gain'] += $game_result->away_goal; //カラム追加 得点
                        $convention_results['loss'] += $game_result->home_goal; //カラム追加 失点
                        $convention_results['numbers_diff'] += $game_result->away_goal - $game_result->home_goal;
                        //引き分けのときのhome処理
                    } elseif ($convention_results['team_name'] === $game_result->game->home_team && $game_result->home_goal === $game_result->away_goal) {
                        $convention_results['team_name'] = $game_result->game->home_team;
                        $convention_results['convention_id'] = $game_result->game->convention_id;
                        $convention_results['league_id'] = $game_result->game->league_id;
                        $convention_results['game_point'] += 1;
                        $convention_results['game_count'] += 1;
                        $convention_results['win'] += 0;
                        $convention_results['lose'] += 0;
                        $convention_results['draw'] += 1;
                        $convention_results['gain'] += $game_result->home_goal; //カラム追加 得点
                        $convention_results['loss'] += $game_result->away_goal; //カラム追加 失点
                        $convention_results['numbers_diff'] += $game_result->home_goal - $game_result->away_goal;
                        //引き分けのときのaway処理
                    } elseif ($convention_results['team_name'] === $game_result->game->away_team && $game_result->home_goal === $game_result->away_goal) {
                        $convention_results['team_name'] = $game_result->game->away_team;
                        $convention_results['convention_id'] = $game_result->game->convention_id;
                        $convention_results['league_id'] = $game_result->game->league_id;
                        $convention_results['game_point'] += 1;
                        $convention_results['game_count'] += 1;
                        $convention_results['win'] += 0;
                        $convention_results['lose'] += 0;
                        $convention_results['draw'] += 1;
                        $convention_results['gain'] += $game_result->away_goal; //カラム追加 得点
                        $convention_results['loss'] += $game_result->home_goal; //カラム追加 失点
                        $convention_results['numbers_diff'] += $game_result->away_goal - $game_result->home_goal;
                    } else ('不明な試合結果です。');
                }


                // $hoge[] = $convention_results;
                ConventionsResult::upsert(
                    $convention_results,
                    ['team_name'],
                    ['team_name', 'convention_id', 'league_id', 'game_point', 'game_count', 'win', 'lose', 'draw', 'gain', 'loss', 'numbers_diff']
                );
            }
        }
        return 0;
    }
}
