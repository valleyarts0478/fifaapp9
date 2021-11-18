<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'team_name' => 'TEAM-A',
                'team_owner_id' => 1,
                'team_logo_url' => 'sample1.jpg',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_name' => 'TEAM-B',
                'team_owner_id' => 2,
                'team_logo_url' => 'sample2.jpg',
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'team_name' => 'TEAM-C',
                'team_owner_id' => 3,
                'team_logo_url' => 'sample3.jpg',
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
