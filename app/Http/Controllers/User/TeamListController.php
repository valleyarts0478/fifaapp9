<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Team_owner;
use App\Models\Game;
use App\Models\Player;
use App\Models\Convention;
use App\Models\Goal_Assist;
use App\Models\GameResult;
use App\Models\ConventionsResult; //追加
use App\Models\League;



class TeamListController extends Controller
{
    public function index()
    {
        $convention = Convention::orderBy('id', 'desc')->first();

        // dd($convention);
        $team_lists = Team_owner::where('convention_id', $convention->id)->get();

        // foreach ($team_lists as $team_list) {
        //     $league_id[$team_list->team_name] = $team_list->league_id;
        // }
        // dump($league_id);
        // dd($league_id);

        // dd($team_lists);
        return view('user.team_list', compact('team_lists'));
    }

    public function show($id)
    {
        $team = Team_owner::findOrFail($id);
        // dd($team->id);
        $players = Player::where('team_owner_id', $team->id)
            ->orderBy('position_id', 'asc')
            ->get();

        $count = Player::where('team_owner_id', $team->id)->count();

        return view('user.team_detail', compact('team', 'players', 'count'));
    }

    public function schedule($id)
    {
        $team = Team_owner::findOrFail($id);

        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        $games = Game::where(function ($query) use ($team) {
            $query->where('home_team', $team->team_name)
                ->orWhere('away_team', $team->team_name);
        })->where(function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->orderBy('game_date', 'asc')->get();
        // $games = Game::all();

        if (count($games) === 0) {
            return view('user.no_match');
        } else {
            //チームロゴ取得用
            $game_info = Game::where(function ($query) use ($convention) {
                $query->where('convention_id', $convention->id);
            })->orderBy('game_date', 'asc')->get();

            $team_info = [];
            foreach ($game_info as $info) {
                $team_info['team_name'][] = $info->home_team;
                $team_info['team_name'][] = $info->away_team;
            }
            $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();
        }



        // dd($games);
        return view('user.team_schedule', compact('games', 'team_names'));
    }
    public function schedule_list()
    {
        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        $games = Game::where('convention_id', $convention->id)
            ->where('league_id', 1)
            ->orderBy('game_date', 'asc')->get();
        // dd($games);

        $game1_count = count($games);
        $team_list = [];

        //league1
        foreach ($games as $game) {

            $team_list[$game->game_date->format('Y-m-d-H:i')][$game->id] = [
                'section' => $game->section,
                'home_team' => $game->home_team,
                'away_team' => $game->away_team,

            ];
        }
        $section = [];
        //section取得
        foreach ($games as $game) {
            $section[$game->game_date->format('Y-m-d-H:i')] = [
                'section' => $game->section,
            ];
        }
        // dd($section);

        //league2
        $game_leagues = Game::where('convention_id', $convention->id)
            ->where('league_id', 2)
            ->orderBy('game_date', 'asc')->get();

        $section2 = [];
        //section2取得
        foreach ($game_leagues as $game2) {
            $section2[$game2->game_date->format('Y-m-d-H:i')] = [
                'section' => $game2->section,
            ];
        }

        $game2_count = count($game_leagues);

        $team_list_second = [];
        foreach ($game_leagues as $league) {
            $team_list_second[$league->game_date->format('Y-m-d-H:i')][$league->id] = [
                'home_team' => $league->home_team,
                'away_team' => $league->away_team,
            ];
        }

        return view('user.schedule_list', compact('section', 'section2', 'team_list', 'team_list_second', 'game1_count', 'game2_count'));
    }

    public function day_schedule($date)
    {
        // $team = Team_owner::findOrFail($id);

        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();
        //league1
        $games = Game::where('convention_id', $convention->id)
            ->where('game_date', $date)
            ->where('league_id', 1)
            ->orderBy('game_date', 'asc')->get();

        // dd($games);
        // foreach ($games as $game) {
        //     $team_list[$game->game_date->format('Y-m-d')][$game->id] = [
        //         'home_team' => $game->home_team,
        //         'away_team' => $game->away_team,
        //     ];
        // }

        //league2
        // $games_second = Game::where('convention_id', $convention->id)
        //     ->where('game_date', $date)
        //     ->where('league_id', 2)
        //     ->orderBy('game_date', 'asc')->get();

        // dd($team_list);
        //チームロゴ取得用
        $game_info = Game::where(function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->orderBy('game_date', 'asc')->get();

        foreach ($game_info as $info) {
            $team_info['team_name'][] = $info->home_team;
            $team_info['team_name'][] = $info->away_team;
        }
        $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();


        return view('user.day_schedule', compact('games', 'team_names'));
    }

    public function day_schedule2($date)
    {
        // $team = Team_owner::findOrFail($id);

        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        //league2
        $games_second = Game::where('convention_id', $convention->id)
            ->where('game_date', $date)
            ->where('league_id', 2)
            ->orderBy('game_date', 'asc')->get();

        // dd($team_list);
        //チームロゴ取得用
        $game_info = Game::where(function ($query) use ($convention) {
            $query->where('convention_id', $convention->id);
        })->orderBy('game_date', 'asc')->get();

        foreach ($game_info as $info) {
            $team_info['team_name'][] = $info->home_team;
            $team_info['team_name'][] = $info->away_team;
        }
        $team_names = Team_owner::whereIn('team_name', $team_info['team_name'])->get();


        // dd($games);
        return view('user.day_schedule2', compact('team_names', 'games_second'));
    }

    public function day_schedule_show($id)
    {
        //HOME取得用
        $home_game = Game::findOrFail($id);

        $home_owner = Team_owner::where('team_name', $home_game->home_team)->first();

        //リレーション先のカラムを利用する場合の書き方
        //$away_ownerを外からつかうためuseで読み込む
        $home_goal_assists = Goal_Assist::wherehas('team_owner', function ($query) use ($home_owner) {
            $query->where('team_name', $home_owner->team_name);
        })->where('game_result_id', $id)->get();



        //AWAY取得用
        $games = Game::findOrFail($id);

        $away_owner = Team_owner::where('team_name', $games->away_team)->first();

        //リレーション先のカラムを利用する場合の書き方
        //$away_ownerを外からつかうためuseで読み込む
        $away_goal_assists = Goal_Assist::wherehas('team_owner', function ($query) use ($away_owner) {
            $query->where('team_name', $away_owner->team_name);
        })->where('game_result_id', $id)->get();




        return view('user.day_schedule_show', compact('home_game', 'home_owner', 'home_goal_assists', 'games', 'away_owner', 'away_goal_assists'));
    }
    public function top()
    {


        //降順の最初のレコードを取得
        $convention = Convention::orderBy('id', 'desc')->first();

        //リーグを全て取得
        $leagues = League::orderBy('id')->get();
        // dd($leagues_id);//idの１と２がとれている


        foreach ($leagues as $league) {

            // 試合結果テーブルから、大会ID・リーグIDを取得キーとして、試合結果レコードを全て取得する
            $game_results = GameResult::where('convention_id', $convention->id)
                ->where('league_id', $league->id)->get();

            //コレクション型はisEmpty
            // if ($game_results->isEmpty()) {
            //     return '試合が存在しません。';
            // }



            // 試合結果データ配列から、home_teamだけを取得して全チームの名前を格納したチーム名配列を作成する
            $team_names = [];
            foreach ($game_results as $game_result) {
                $team_names[] = $game_result->game->home_team;
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
                // $diff = [];
                // foreach ($convention_results as $key => $value) {
                //     $diff = $key['numbers_diff'];
                // }
                $point = [];
                // 第1ソートキー（volume）
                $point = array_column($convention_results, 'game_point');
                // array_multisort($diff, SORT_DESC, $convention_results);


                dd($point);
                // $hoge[] = $convention_results;
                ConventionsResult::upsert(
                    $convention_results,
                    ['team_name'],
                    ['team_name', 'convention_id', 'league_id', 'game_point', 'game_count', 'win', 'lose', 'draw', 'gain', 'loss', 'numbers_diff']
                );
            }
        }


        return view('user.top', compact('convention_results'));
    }
}
