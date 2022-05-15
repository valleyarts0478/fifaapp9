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
                'id' => '11',
                'name' => 'K-team',
                'email' => 'ktm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'K-team',
                'team_abb' => 'KTM',
                'twitter_add' => '@KTM',
                'team_logo_url' => 'KTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '12',
                'name' => 'L-team',
                'email' => 'ltm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'L-team',
                'team_abb' => 'LTM',
                'twitter_add' => '@LTM',
                'team_logo_url' => 'LTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '13',
                'name' => 'M-team',
                'email' => 'mtm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'M-team',
                'team_abb' => 'MTM',
                'twitter_add' => '@MTM',
                'team_logo_url' => 'MTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '14',
                'name' => 'N-team',
                'email' => 'ntm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'N-team',
                'team_abb' => 'NTM',
                'twitter_add' => '@NTM',
                'team_logo_url' => 'NTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '15',
                'name' => 'O-team',
                'email' => 'otm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'O-team',
                'team_abb' => 'OTM',
                'twitter_add' => '@OTM',
                'team_logo_url' => 'OTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '16',
                'name' => 'P-team',
                'email' => 'ptm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'P-team',
                'team_abb' => 'PTM',
                'twitter_add' => '@PTM',
                'team_logo_url' => 'PTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '17',
                'name' => 'Q-team',
                'email' => 'qtm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'Q-team',
                'team_abb' => 'QTM',
                'twitter_add' => '@QTM',
                'team_logo_url' => 'QTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '18',
                'name' => 'R-team',
                'email' => 'rtm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'R-team',
                'team_abb' => 'RTM',
                'twitter_add' => '@RTM',
                'team_logo_url' => 'RTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '19',
                'name' => 'S-team',
                'email' => 'stm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'S-team',
                'team_abb' => 'STM',
                'twitter_add' => '@STM',
                'team_logo_url' => 'STM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '20',
                'name' => 'T-team',
                'email' => 'ttm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '2',
                'team_name' => 'T-team',
                'team_abb' => 'TTM',
                'twitter_add' => '@TTM',
                'team_logo_url' => 'TTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '1',
                'name' => 'A-team',
                'email' => 'atm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'A-team',
                'team_abb' => 'ATM',
                'twitter_add' => '@ATM',
                'team_logo_url' => 'ATM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '2',
                'name' => 'B-team',
                'email' => 'btm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'B-team',
                'team_abb' => 'BTM',
                'twitter_add' => '@BTM',
                'team_logo_url' => 'BTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '3',
                'name' => 'C-team',
                'email' => 'ctm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'C-team',
                'team_abb' => 'CTM',
                'twitter_add' => '@CTM',
                'team_logo_url' => 'CTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '4',
                'name' => 'D-team',
                'email' => 'dtm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'D-team',
                'team_abb' => 'DTM',
                'twitter_add' => '@DTM',
                'team_logo_url' => 'DTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '5',
                'name' => 'E-team',
                'email' => 'etm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'E-team',
                'team_abb' => 'ETM',
                'twitter_add' => '@ETM',
                'team_logo_url' => 'ETM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '6',
                'name' => 'F-team',
                'email' => 'ftm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'F-team',
                'team_abb' => 'FTM',
                'twitter_add' => '@FTM',
                'team_logo_url' => 'FTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '7',
                'name' => 'G-team',
                'email' => 'gtm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'G-team',
                'team_abb' => 'GTM',
                'twitter_add' => '@GTM',
                'team_logo_url' => 'GTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '8',
                'name' => 'H-team',
                'email' => 'htm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'H-team',
                'team_abb' => 'HTM',
                'twitter_add' => '@HTM',
                'team_logo_url' => 'HTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '9',
                'name' => 'I-team',
                'email' => 'itm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'I-team',
                'team_abb' => 'ITM',
                'twitter_add' => '@ITM',
                'team_logo_url' => 'ITM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ],
            [
                'id' => '10',
                'name' => 'J-team',
                'email' => 'jtm@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'J-team',
                'team_abb' => 'JTM',
                'twitter_add' => '@JTM',
                'team_logo_url' => 'JTM.jpg',
                'created_at' => '2022-05-01 0:00:00'
            ]

        ]);
    }
}
