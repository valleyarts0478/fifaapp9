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
                'convention_id' => 1,
                'league_id' => 1,
                'home_goal' => NULL,
                'away_goal' => NULL,
            ],
            [
                'game_id' => 2,
                'convention_id' => 1,
                'league_id' => 1,
                'home_goal' => 0,
                'away_goal' => 2,
            ],
        ]);
    }
}
