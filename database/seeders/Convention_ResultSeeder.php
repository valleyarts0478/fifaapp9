<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Convention_ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('convention_results')->insert([
            [
                'team_name' => 'team_A',
                'convention_id' => 1,
                'league_id' => 1,
                'game_point' => 3,
                'game_count' => 2,
                'win' => 1,
                'lose' => 1,
                'draw' => 0,
                'numbers_diff' => 3,
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_name' => 'team_D',
                'convention_id' => 1,
                'league_id' => 1,
                'game_point' => 3,
                'game_count' => 2,
                'win' => 1,
                'lose' => 1,
                'draw' => 0,
                'numbers_diff' => 3,
                'created_at' => '2021/01/01 11:11:11',
            ],


        ]);
    }
}
