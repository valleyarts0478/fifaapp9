<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan; //追加
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\GameResult;
use App\Models\Game;
use App\Models\Team_owner;
use App\Models\Player;
use App\Models\ConventionsResult;

class BatchTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testbatch:testdayo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'コマンド実行のテスト';

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
        // ConventionsResult::updateOrCreate(
        //     ['id' => 1],
        //     ['team_name' => 'team_1']
        // );

        $game_results = GameResult::all();
        $games = [];
        foreach ($game_results as $game_result) {
            $games[] = $game_result->game;

            if ($game_result->home_goal > $game_result->away_goal) {
                ConventionsResult::updateOrCreate(
                    ['team_name' => $game_result->game->home_team],
                    [
                        'team_name' => $game_result->game->home_team,
                        'convention_id' => $game_result->game->convention_id,
                        'league_id' => $game_result->game->league_id,
                        'numbers_diff' => $game_result->home_goal,
                        'win' => 1,
                        'lose' => 0,
                        'draw' => 0,
                    ]
                );
            };
            // elseif ($game_result->away_goal < $game_result->home_goal) {
            //     ConventionsResult::updateOrCreate(
            //         ['team_name' => $game_result->game->away_team],
            //         [
            //             'team_name' => $game_result->game->away_team,
            //             'numbers_diff' => $game_result->away_goal,
            //         ]
            //     );
            // } else {
            //     '引き分け';
            // }
        }


        return 0;
    }
}
