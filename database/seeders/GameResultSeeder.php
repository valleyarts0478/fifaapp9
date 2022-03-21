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
                'convention_id' => 2,
                'league_id' => 1,
                'section' => 1,
                'home_goal' => 2,
                'away_goal' => 1,
                'home_own_goal' => 0,
                'away_own_goal' => 0,
            ],
            [
                'game_id' => 2,
                'convention_id' => 2,
                'league_id' => 1,
                'section' => 1,
                'home_goal' => 2,
                'away_goal' => 2,
                'home_own_goal' => 0,
                'away_own_goal' => 0,
            ],
            [
                'game_id' => 3,
                'convention_id' => 2,
                'league_id' => 2,
                'section' => 2,
                'home_goal' => 2,
                'away_goal' => 2,
                'home_own_goal' => 0,
                'away_own_goal' => 0,
            ],
            [
                'game_id' => 4,
                'convention_id' => 2,
                'league_id' => 2,
                'section' => 2,
                'home_goal' => 1,
                'away_goal' => 0,
                'home_own_goal' => 0,
                'away_own_goal' => 0,
            ],
        ]);
    }
}
