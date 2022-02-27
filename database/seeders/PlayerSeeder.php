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
                'position_id' => 1,
                'player_no' => 10,
                'player_name' => 'player1',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 1,
                'position_id' => 2,
                'player_no' => 11,
                'player_name' => 'player2',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 2,
                'position_id' => 3,
                'player_no' => 12,
                'player_name' => 'player3',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 2,
                'position_id' => 1,
                'player_no' => 13,
                'player_name' => 'player4',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 3,
                'position_id' => 2,
                'player_no' => 14,
                'player_name' => 'player5',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 3,
                'position_id' => 4,
                'player_no' => 15,
                'player_name' => 'player6',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 4,
                'position_id' => 3,
                'player_no' => 16,
                'player_name' => 'player7',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_owner_id' => 4,
                'position_id' => 1,
                'player_no' => 17,
                'player_name' => 'player8',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
