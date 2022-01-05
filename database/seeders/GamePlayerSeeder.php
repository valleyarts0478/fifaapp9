<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamePlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_player')->insert([
            [
                'game_id' => 1,
                'player_id' => 1,
                'goal' => 1,
            ],
            [
                'game_id' => 1,
                'player_id' => 2,
                'goal' => 2,
            ],
        ]);
    }
}
