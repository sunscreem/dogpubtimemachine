<?php

use Illuminate\Database\Seeder;
use App\Bar;

class AddDoghouseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Bar::create([
        'name'                     => 'Doghouse',
        'territory'                => 'USA',
        'url'                      => null,
        'brewdog_site_listing_url' => 'https://www.brewdog.com/bars/usa/doghouse',
    ]);

  }
}
