<?php

use Illuminate\Database\Seeder;
use App\Bar;

class AddMKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bar::create([
        'name' => 'Milton Keynes',
        'territory' => 'UK',
        'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=10029',
        'brewdog_site_listing_url' => 'https://www.brewdog.com/bars/uk/milton-keynes',
    ]);
    }
}
