<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeamOwnerAddSeeder extends Seeder
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
                'name' => 'BIGBANG',
                'email' => 'bigg@rale.com',
                'password' => Hash::make('123456'),
                'convention_id' => 3,
                'league_id' => 1,
                'team_name' => 'BIGBANG',
                'team_abb' => 'BIG',
                'team_logo_url' => 'BIGBANG_500.png',
                'created_at' => '2022/02/26 11:11:11'
            ]
        ]);
    }
}
