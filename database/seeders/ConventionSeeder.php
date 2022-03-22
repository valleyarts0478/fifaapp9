<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ConventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conventions')->insert([
            [
                'convention_no' => 'RAL-E-4th',
                'created_at' => '2022/01/01 11:11:11'
            ],
            [
                'convention_no' => 'RAL-E-5th',
                'created_at' => '2022/01/01 11:11:11'
            ],
            [
                'convention_no' => 'RAL-E-6th',
                'created_at' => '2022/01/01 11:11:11'
            ],
        ]);
    }
}
