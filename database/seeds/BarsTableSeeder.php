<?php

use App\Bar;
use Illuminate\Database\Seeder;

class BarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bar::create(['name' => 'Aberdeen', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=41']);
        Bar::create(['name' => 'Angel', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9998']);
        Bar::create(['name' => 'Birmingham', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5758']);
        Bar::create(['name' => 'Brighton', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7490']);
        Bar::create(['name' => 'Bristol', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5761']);
        Bar::create(['name' => 'Camden', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5762']);
        Bar::create(['name' => 'Cardiff', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5763']);
        Bar::create(['name' => 'Castlegate', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7963']);
        Bar::create(['name' => 'Clapham Junction', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5764']);
        Bar::create(['name' => 'Clerkenwell', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7962']);
        Bar::create(['name' => 'DogHouse Merchant City', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7824']);
        Bar::create(['name' => 'DogTap & DogWalk Brewery Tour', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5766']);
        Bar::create(['name' => 'Dundee', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5767']);
        Bar::create(['name' => 'Edinburgh', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5768']);
        Bar::create(['name' => 'Glasgow', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5771']);
        Bar::create(['name' => 'Leeds', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5773']);
        Bar::create(['name' => 'Leicester', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=6498']);
        Bar::create(['name' => 'Liverpool', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5774']);
        Bar::create(['name' => 'Lothian Road Edinburgh', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9695']);
        Bar::create(['name' => 'Manchester', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5775']);
        Bar::create(['name' => 'Newcastle', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5776']);
        Bar::create(['name' => 'North Street Leeds', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7294']);
        Bar::create(['name' => 'Norwich', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=8345']);
        Bar::create(['name' => 'Nottingham', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5777']);
        Bar::create(['name' => 'Overworks Tap Room', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9883']);
        Bar::create(['name' => 'Oxford', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9242']);
        Bar::create(['name' => 'Reading', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9589']);
        Bar::create(['name' => 'Sheffield', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5780']);
        Bar::create(['name' => 'Shepherd\'s Bush', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5781']);
        Bar::create(['name' => 'Seven Dials', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9684']);
        Bar::create(['name' => 'Shoreditch', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5909']);
        Bar::create(['name' => 'Soho', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7844']);
        Bar::create(['name' => 'Southampton', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=8628']);
        Bar::create(['name' => 'Stirling', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7923']);
        Bar::create(['name' => 'Tower Hill', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9567']);
        Bar::create(['name' => 'York', 'territory' => 'UK', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=8736']);

        Bar::create(['name' => 'DogTap Columbus & DogWalk USA', 'territory' => 'USA', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=8841']);
        Bar::create(['name' => 'Franklinton', 'territory' => 'USA', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9568']);
        Bar::create(['name' => 'Short North', 'territory' => 'USA', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=9888']);

        Bar::create(['name' => 'Barcelona', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5757']);
        Bar::create(['name' => 'Berlin Mitte', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=8685']);
        Bar::create(['name' => 'Bologna', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5759']);
        Bar::create(['name' => 'Brussels', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7671']);
        Bar::create(['name' => 'Firenze', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5769']);
        Bar::create(['name' => 'Göteborg', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5770']);
        Bar::create(['name' => 'Grünerløkka', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7102']);
        Bar::create(['name' => 'Helsinki', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5772']);
        Bar::create(['name' => 'Kungsholmen', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5783']);
        Bar::create(['name' => 'Malmö', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=8391']);
        Bar::create(['name' => 'Roma', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=8005']);
        Bar::create(['name' => 'Roppongi', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5778']);
        Bar::create(['name' => 'São Paulo', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=5779']);
        Bar::create(['name' => 'Södermalm', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=7487']);
        Bar::create(['name' => 'Tallinn', 'territory' => 'International', 'url' => 'https://www.brewdog.com/ajax/tap_list.php?id=8941']);
    }
}
