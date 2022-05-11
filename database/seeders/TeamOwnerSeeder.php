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
                'id' => 1,
                'name' => 'BIGBANG',
                'email' => 'big@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => 7,
                'league_id' => 1,
                'team_name' => 'BIGBANG',
                'team_abb' => 'BIG',
                'twitter_add' => '123',
                'team_logo_url' => 'BIGBANG_500.png',
                'created_at' => '2022/02/27 00:00:00',
            ],
            [
                'id' => 2,
                'name' => 'Rebel United',
                'email' => 'rbl@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => 7,
                'league_id' => 1,
                'team_name' => 'Rebel United',
                'team_abb' => 'RBL',
                'twitter_add' => '123456',
                'team_logo_url' => 'Rebel_United_500.jpg',
                'created_at' => '2022/02/27 00:00:00',
            ],
            [
                'id' => 3,
                'name' => 'Contact Tokyo',
                'email' => 'cty@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => 7,
                'league_id' => 1,
                'team_name' => 'Contact Tokyo',
                'team_abb' => 'CTY',
                'twitter_add' => '456789',
                'team_logo_url' => 'Contact_Tokyo_500.png',
                'created_at' => '2022/02/27 00:00:00',
            ],
            [
                'id' => 4,
                'name' => 'Break Time',
                'email' => 'brt@rale.net',
                'password' => Hash::make('123456'),
                'convention_id' => 7,
                'league_id' => 1,
                'team_name' => 'Break Time',
                'team_abb' => 'BRT',
                'twitter_add' => '987654',
                'team_logo_url' => 'break_time_500.jpg',
                'created_at' => '2022/02/27 00:00:00',
            ],
            // [
            //     'name' => 'Otintin SC',
            //     'email' => 'oti@rale.net',
            //     'password' => Hash::make('123456'),
            //     'convention_id' => 7,
            //     'league_id' => 1,
            //     'team_name' => 'Otintin SC',
            //     'team_abb' => 'OTI',
            //     'twitter_add' => '@',
            //     'team_logo_url' => 'Otintin_500.jpg',
            //     'created_at' => '2022/02/27 00:00:00',
            // ],
            // [
            //     'name' => 'fc ham seven',
            //     'email' => 'ham@rale.net',
            //     'password' => Hash::make('123456'),
            //     'convention_id' => 7,
            //     'league_id' => 1,
            //     'team_name' => 'fc ham seven',
            //     'team_abb' => 'HAM',
            //     'twitter_add' => '@',
            //     'team_logo_url' => 'fc_ham_seven_500.jpeg',
            //     'created_at' => '2022/02/27 00:00:00',
            // ],
            // [
            //     'name' => 'MINOSPACE',
            //     'email' => 'min@rale.net',
            //     'password' => Hash::make('123456'),
            //     'convention_id' => 7,
            //     'league_id' => 1,
            //     'team_name' => 'MINOSPACE',
            //     'team_abb' => 'MIN',
            //     'twitter_add' => '@',
            //     'team_logo_url' => 'MINOSPACE_500.jpg',
            //     'created_at' => '2022/02/27 00:00:00',
            // ],
            // [
            //     'name' => 'FC HAKODATEJIN',
            //     'email' => 'fch@rale.net',
            //     'password' => Hash::make('123456'),
            //     'convention_id' => 7,
            //     'league_id' => 1,
            //     'team_name' => 'FC HAKODATEJIN',
            //     'team_abb' => 'FCH',
            //     'twitter_add' => '@',
            //     'team_logo_url' => 'FC_HAKODATEJIN_500.jpg',
            //     'created_at' => '2022/02/27 00:00:00',
            // ],
            // [
            //     'name' => 'Pase de Rey FCB',
            //     'email' => 'yaa@rale.net',
            //     'password' => Hash::make('123456'),
            //     'convention_id' => 7,
            //     'league_id' => 1,
            //     'team_name' => 'Pase de Rey FCB',
            //     'team_abb' => 'YAA',
            //     'twitter_add' => '@',
            //     'team_logo_url' => 'Pasé_dè_Rèy_FCB_500.jpg',
            //     'created_at' => '2022/02/27 00:00:00',
            // ],
            // [
            //     'name' => 'KATANMAIKE FC',
            //     'email' => 'ktm@rale.net',
            //     'password' => Hash::make('123456'),
            //     'convention_id' => 7,
            //     'league_id' => 1,
            //     'team_name' => 'KATANMAIKE FC',
            //     'team_abb' => 'KTM',
            //     'twitter_add' => '@',
            //     'team_logo_url' => 'KATANMAIKE_FC_500.jpg',
            //     'created_at' => '2022/02/27 00:00:00',
            // ],
            // [
            //     'name' => 'Va Ramosun Fc',
            //     'email' => 'vrm@rale.net',
            //     'password' => Hash::make('123456'),
            //     'convention_id' => 7,
            //     'league_id' => 1,
            //     'team_name' => 'Va Ramosun Fc',
            //     'team_abb' => 'VRM',
            //     'twitter_add' => '@',
            //     'team_logo_url' => 'Va_Ramosun_Fc_500.jpg',
            //     'created_at' => '2022/02/27 00:00:00',
            // ],
            // [
            //     'name' => 'NOISEMAKER',
            //     'email' => 'nom@rale.net',
            //     'password' => Hash::make('123456'),
            //     'convention_id' => 7,
            //     'league_id' => 1,
            //     'team_name' => 'NOISEMAKER',
            //     'team_abb' => 'NOM',
            //     'twitter_add' => '@',
            //     'team_logo_url' => 'NOISEMAKER_500.jpg',
            //     'created_at' => '2022/02/27 00:00:00',
            // ],
        ]);
    }
}
