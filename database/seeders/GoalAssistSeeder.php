<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalAssistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goal_assists')->insert([
            [
                'game_result_id' => 1,
                'team_owner_id' => 1,
                'player_name' => "player1",
                'goals' => 1,
                'assists' => 1,
            ],
            [
                'game_result_id' => 1,
                'team_owner_id' => 1,
                'player_name' => "player2",
                'goals' => 1,
                'assists' => 0,
            ],
            [
                'game_result_id' => 1,
                'team_owner_id' => 4,
                'player_name' => "player7",
                'goals' => 0,
                'assists' => 1,
            ],
            [
                'game_result_id' => 1,
                'team_owner_id' => 4,
                'player_name' => "player8",
                'goals' => 1,
                'assists' => 0,
            ],
            [
                'game_result_id' => 2,
                'team_owner_id' => 4,
                'player_name' => "player7",
                'goals' => 1,
                'assists' => 1,
            ],
            [
                'game_result_id' => 2,
                'team_owner_id' => 4,
                'player_name' => "player8",
                'goals' => 1,
                'assists' => 1,
            ],
            [
                'game_results_id' => 2,
                'team_owner_id' => 1,
                'player_name' => "player1",
                'goals' => 1,
                'assists' => 0,
            ],
            [
                'game_results_id' => 2,
                'team_owner_id' => 1,
                'player_name' => "player2",
                'goals' => 1,
                'assists' => 1,
            ],
        ]);
    }
}
