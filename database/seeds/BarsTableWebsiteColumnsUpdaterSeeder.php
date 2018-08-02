<?php

use Illuminate\Database\Seeder;
use App\Bar;

class BarsTableWebsiteColumnsUpdaterSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
    {
        /** @var Bar $bar */
        $bar                           = Bar::where('name', 'Aberdeen')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/aberdeen';
        $bar->save();

        $bar                           = Bar::where('name', 'Angel')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/angel';
        $bar->save();

        $bar                           = Bar::where('name', 'Birmingham')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/birmingham';
        $bar->save();

        $bar                           = Bar::where('name', 'Brighton')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/brighton';
        $bar->save();

        $bar                           = Bar::where('name', 'Bristol')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/bristol';
        $bar->save();

        $bar                           = Bar::where('name', 'Camden')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/camden';
        $bar->save();

        $bar                           = Bar::where('name', 'Cardiff')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/cardiff';
        $bar->save();

        $bar                           = Bar::where('name', 'Castlegate')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/castlegate';
        $bar->save();

        $bar                           = Bar::where('name', 'Clapham Junction')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/clapham-junction';
        $bar->save();

        $bar                           = Bar::where('name', 'Clerkenwell')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/clerkenwell';
        $bar->save();

        $bar                           = Bar::where('name', 'DogHouse Merchant City')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/doghouse-merchant-city';
        $bar->save();

        $bar                           = Bar::where('name', 'DogTap & DogWalk Brewery Tour')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/dogtap';
        $bar->save();

        $bar                           = Bar::where('name', 'Dundee')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/dundee';
        $bar->save();

        $bar                           = Bar::where('name', 'Edinburgh')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/edinburgh';
        $bar->save();

        $bar                           = Bar::where('name', 'Glasgow')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/glasgow';
        $bar->save();

        $bar                           = Bar::where('name', 'Leeds')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/leeds';
        $bar->save();

        $bar                           = Bar::where('name', 'Leicester')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/leicester';
        $bar->save();

        $bar                           = Bar::where('name', 'Liverpool')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/liverpool';
        $bar->save();

        $bar                           = Bar::where('name', 'Lothian Road Edinburgh')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/lothian-road';
        $bar->save();

        $bar                           = Bar::where('name', 'Manchester')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/manchester';
        $bar->save();

        $bar                           = Bar::where('name', 'Newcastle')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/newcastle';
        $bar->save();

        $bar                           = Bar::where('name', 'North Street Leeds')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/northstreetleeds';
        $bar->save();

        $bar                           = Bar::where('name', 'Norwich')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/norwich';
        $bar->save();

        $bar                           = Bar::where('name', 'Nottingham')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/nottingham';
        $bar->save();

        $bar                           = Bar::where('name', 'Overworks Tap Room')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/overworkstaproom';
        $bar->save();

        $bar                           = Bar::where('name', 'Oxford')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/oxford';
        $bar->save();

        $bar                           = Bar::where('name', 'Reading')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/reading';
        $bar->save();

        $bar                           = Bar::where('name', 'Sheffield')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/sheffield';
        $bar->save();

        $bar                           = Bar::where('name', 'Shepherd\'s Bush')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/shepherds-bush';
        $bar->save();

        $bar                           = Bar::where('name', 'Seven Dials')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/sevendials';
        $bar->save();

        $bar                           = Bar::where('name', 'Shoreditch')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/shoreditch';
        $bar->save();

        $bar                           = Bar::where('name', 'Soho')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/soho';
        $bar->save();

        $bar                           = Bar::where('name', 'Southampton')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/southampton';
        $bar->save();

        $bar                           = Bar::where('name', 'Stirling')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/stirling';
        $bar->save();

        $bar                           = Bar::where('name', 'Tower Hill')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/tower-hill';
        $bar->save();

        $bar                           = Bar::where('name', 'York')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/uk/york';
        $bar->save();


        $bar                           = Bar::where('name', 'DogTap Columbus & DogWalk USA')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/usa/dogtap-columbus';
        $bar->save();

        $bar                           = Bar::where('name', 'Franklinton')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/usa/franklinton';
        $bar->save();

        $bar                           = Bar::where('name', 'Short North')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/usa/short-north';
        $bar->save();


        $bar                           = Bar::where('name', 'Barcelona')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/barcelona';
        $bar->save();

        $bar                           = Bar::where('name', 'Berlin Mitte')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/berlin-mitte';
        $bar->save();

        $bar                           = Bar::where('name', 'Bologna')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/bologna';
        $bar->save();

        $bar                           = Bar::where('name', 'Brussels')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/brussels';
        $bar->save();

        $bar                           = Bar::where('name', 'Firenze')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/firenze';
        $bar->save();

        $bar                           = Bar::where('name', 'Göteborg')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/goteborg';
        $bar->save();

        $bar                           = Bar::where('name', 'Grünerløkka')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/grunerlokka';
        $bar->save();

        $bar                           = Bar::where('name', 'Helsinki')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/helsinki';
        $bar->save();

        $bar                           = Bar::where('name', 'Kungsholmen')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/kungsholmen';
        $bar->save();

        $bar                           = Bar::where('name', 'Malmö')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/malm';
        $bar->save();


        $bar                           = Bar::where('name', 'Roma')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/roma';
        $bar->save();

        $bar                           = Bar::where('name', 'Roppongi')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/roppongi';
        $bar->save();

        $bar                           = Bar::where('name', 'São Paulo')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/sao-paulo';
        $bar->save();

        $bar                           = Bar::where('name', 'Södermalm')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/sodermalm';
        $bar->save();

        $bar                           = Bar::where('name', 'Tallinn')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/tallinn';
        $bar->save();

        $bar                           = Bar::where('name', 'Norrköping')->first();
        $bar->brewdog_site_listing_url = 'https://www.brewdog.com/bars/worldwide/norrkoping';
        $bar->save();
    }
}
