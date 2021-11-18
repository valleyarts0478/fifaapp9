<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Stock;
use App\Models\League;
use App\Models\Team;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            Ownerseeder::class,
            Shopseeder::class,
            ImageSeeder::class,
            CategorySeeder::class,
            // ProductSeeder::class,
            // StockSeeder::class,
            UserSeeder::class,
            ConventionSeeder::class,
            LeagueSeeder::class,
            TeamOwnerSeeder::class,
            TeamSeeder::class,
        ]);
        Product::factory(100)->create();
        Stock::factory(100)->create();
    }
}
