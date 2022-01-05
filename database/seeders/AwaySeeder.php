<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AwaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aways')->insert([
            [
                'away_name' => 'team-A',
                'away_symbol' => 1,
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'away_name' => 'team-B',
                'away_symbol' => 2,
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'away_name' => 'team-C',
                'away_symbol' => 3,
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'away_name' => 'team-D',
                'away_symbol' => 4,
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
