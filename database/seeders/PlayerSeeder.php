<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            [
                'team_owner_id' => 1,
                'position' => 'FW',
                'player_no' => 10,
                'player_name' => 'player1',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 1,
                'position' => 'MF',
                'player_no' => 11,
                'player_name' => 'player2',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 1,
                'position' => 'DF',
                'player_no' => 12,
                'player_name' => 'player3',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
