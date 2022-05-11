<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('team_members')->insert([
            [
                'team_owner_id' => 1,
                'activitytime1' => 'activitytime1',
                'comment' => 'commnet1',
                'address1' => '111',
                'voicechat' => 'test',
                'created_at' => '2022/02/27 00:00:00',
            ],
        ]);
    }
}
