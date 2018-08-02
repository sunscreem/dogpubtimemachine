<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BarsSeeder::class);
        // $this->call(BarsTableWebsiteColumnsUpdaterSeeder::class);
        // $this->call(AddMKSeeder::class);
        //$this->call(AddDoghouseSeeder::class);
    }
}
