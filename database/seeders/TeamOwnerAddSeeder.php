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
                'id' => '1',
                'name' => 'Va Ramosun Fc',
                'email' => 'var@rale.net',
                'password' => Hash::make('var18'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'Va Ramosun Fc',
                'team_abb' => 'VAR',
                'twitter_add' => '@FcRamosun',
                'team_logo_url' => 'KTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '2',
                'name' => 'NOISEMAKER',
                'email' => 'nom@rale.net',
                'password' => Hash::make('nom1315'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'NOISEMAKER',
                'team_abb' => 'NOM',
                'twitter_add' => '@FIFA_NOISE',
                'team_logo_url' => 'LTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '3',
                'name' => 'FC HAKODATEJIN',
                'email' => 'fch@rale.net',
                'password' => Hash::make('fch83'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'FC HAKODATEJIN',
                'team_abb' => 'FCH',
                'twitter_add' => '@HFifa21',
                'team_logo_url' => 'MTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '4',
                'name' => 'Break Time',
                'email' => 'brt@rale.net',
                'password' => Hash::make('brt20'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'Break Time',
                'team_abb' => 'BRT',
                'twitter_add' => '@breaktime___',
                'team_logo_url' => 'NTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '5',
                'name' => 'KATANMAIKE FC',
                'email' => 'ktm@rale.net',
                'password' => Hash::make('ktm1320'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'KATANMAIKE FC',
                'team_abb' => 'KTM',
                'twitter_add' => '@katanmaike',
                'team_logo_url' => 'OTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '6',
                'name' => 'MINOSPACE',
                'email' => 'msp@rale.net',
                'password' => Hash::make('msp16'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'MINOSPACE',
                'team_abb' => 'MSP',
                'twitter_add' => '@minospacejp',
                'team_logo_url' => 'PTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '7',
                'name' => 'BIGBANG',
                'email' => 'big@rale.net',
                'password' => Hash::make('big79'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'BIGBANG',
                'team_abb' => 'BIG',
                'twitter_add' => '@BIGBANG_evehide',
                'team_logo_url' => 'QTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '8',
                'name' => 'fc ham seven',
                'email' => 'ham@rale.net',
                'password' => Hash::make('ham131'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'fc ham seven',
                'team_abb' => 'HAM',
                'twitter_add' => '@fifa_hamseven',
                'team_logo_url' => 'RTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '9',
                'name' => 'Otintin SC',
                'email' => 'otn@rale.net',
                'password' => Hash::make('otn14'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'Otintin SC',
                'team_abb' => 'OTN',
                'twitter_add' => '@OTINTIN_SC',
                'team_logo_url' => 'STM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ],
            [
                'id' => '10',
                'name' => 'FC Ardimento',
                'email' => 'fca@rale.net',
                'password' => Hash::make('fca13'),
                'convention_id' => '7',
                'league_id' => '1',
                'team_name' => 'FC Ardimento',
                'team_abb' => 'FCA',
                'twitter_add' => '@FC_Ardimento',
                'team_logo_url' => 'TTM.jpg',
                'created_at' => '2022-06-29 00:00:00',

            ]

        ]);
    }
}
