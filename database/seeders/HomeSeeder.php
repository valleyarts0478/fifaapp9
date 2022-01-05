<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->insert([
            [
                'home_name' => 'team-A',
                'home_symbol' => 1,
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'home_name' => 'team-B',
                'home_symbol' => 2,
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'home_name' => 'team-C',
                'home_symbol' => 3,
                'created_at' => '2021/01/01 11:11:11',
            ],
            [
                'home_name' => 'team-D',
                'home_symbol' => 4,
                'created_at' => '2021/01/01 11:11:11',
            ],
        ]);
    }
}
