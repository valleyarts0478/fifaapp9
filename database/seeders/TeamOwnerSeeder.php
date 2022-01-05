<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeamOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_owners')->insert([
            [
                'name' => 'team1',
                'email' => 'team@test.com',
                'password' => Hash::make('password123'),
                'convention_id' => 1,
                'league_id' => 1,
                'team_name' => 'team_1',
                'team_abb' => 'AAA',
                'team_logo_url' => 'BIGBANG_500.png',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'team2',
                'email' => 'team2@test.com',
                'password' => Hash::make('password123'),
                'convention_id' => 1,
                'league_id' => 1,
                'team_name' => 'team_2',
                'team_abb' => 'BBB',
                'team_logo_url' => 'BIGBANG_500.png',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'team3',
                'email' => 'team3@test.com',
                'password' => Hash::make('password123'),
                'convention_id' => 1,
                'league_id' => 1,
                'team_name' => 'team_4',
                'team_abb' => 'DDD',
                'team_logo_url' => 'BIGBANG_500.png',
                'created_at' => '2021/01/01 11:11:11'
            ],
        ]);
    }
}
