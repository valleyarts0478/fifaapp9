<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'position_name' => "FW",
            ],
            [
                'position_name' => "MF",
            ],
            [
                'position_name' => "DF",
            ],
            [
                'position_name' => "GK",
            ],
        ]);
    }
}
