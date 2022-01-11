<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_results')->insert([
            [
                'game_id' => 1,
                'convention_id' => 5,
                'league_id' => 1,
                'home_goal' => 2,
                'away_goal' => 0,
            ],
            [
                'game_id' => 2,
                'convention_id' => 5,
                'league_id' => 1,
                'home_goal' => 1,
                'away_goal' => 2,
            ],
            [
                'game_id' => 3,
                'convention_id' => 5,
                'league_id' => 1,
                'home_goal' => 2,
                'away_goal' => 2,
            ],
            [
                'game_id' => 4,
                'convention_id' => 5,
                'league_id' => 1,
                'home_goal' => 0,
                'away_goal' => 0,
            ],
        ]);
    }
}
