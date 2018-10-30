<?php

use App\Bar;
use Illuminate\Database\Seeder;

class BarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bar::createWithAttributes(['name' => 'Aberdeen',
                        'territory'       => 'UK',
                        'bar_url'         => 'https://www.brewdog.com/bars/uk/aberdeen',
                        'tap_list_url'    => 'https://www.brewdog.com/ajax/tap_list.php?id=41', ]);

        Bar::createWithAttributes(['name' => 'Angel',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9998',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/angel', ]);

        Bar::createWithAttributes(['name' => 'Birmingham',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5758',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/birmingham', ]);

        Bar::createWithAttributes(['name' => 'Brighton',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7490',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/brighton', ]);

        Bar::createWithAttributes(['name' => 'Bristol',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5761',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/bristol', ]);

        Bar::createWithAttributes(['name' => 'Camden',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5762',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/camden', ]);

        Bar::createWithAttributes(['name' => 'Cardiff',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5763',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/cardiff', ]);

        Bar::createWithAttributes(['name' => 'Castlegate',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7963',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/castlegate', ]);

        Bar::createWithAttributes(['name' => 'Clapham Junction',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5764',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/clapham-junction', ]);

        Bar::createWithAttributes(['name' => 'Clerkenwell',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7962',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/clerkenwell', ]);

        Bar::createWithAttributes(['name' => 'DogHouse Merchant City',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7824',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/doghouse-merchant-city', ]);

        Bar::createWithAttributes(['name' => 'DogTap & DogWalk Brewery Tour',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5766',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/dogtap', ]);

        Bar::createWithAttributes(['name' => 'Dundee',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5767',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/dundee', ]);

        Bar::createWithAttributes(['name' => 'Edinburgh',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5768',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/edinburgh', ]);

        Bar::createWithAttributes(['name' => 'Glasgow',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5771',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/glasgow', ]);

        Bar::createWithAttributes(['name' => 'Leeds',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5773',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/leeds', ]);

        Bar::createWithAttributes(['name' => 'Leicester',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=6498',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/leicester', ]);

        Bar::createWithAttributes(['name' => 'Liverpool',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5774',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/liverpool', ]);

        Bar::createWithAttributes(['name' => 'Lothian Road Edinburgh',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9695',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/lothian-road', ]);

        Bar::createWithAttributes(['name' => 'Manchester',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5775',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/manchester', ]);

        Bar::createWithAttributes(['name' => 'Newcastle',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5776',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/newcastle', ]);

        Bar::createWithAttributes(['name' => 'North Street Leeds',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7294',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/northstreetleeds', ]);

        Bar::createWithAttributes(['name' => 'Norwich',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=8345',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/norwich', ]);

        Bar::createWithAttributes(['name' => 'Nottingham',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5777',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/nottingham', ]);

        Bar::createWithAttributes(['name' => 'Overworks Tap Room',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9883',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/overworkstaproom', ]);

        Bar::createWithAttributes(['name' => 'Oxford',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9242',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/oxford', ]);

        Bar::createWithAttributes(['name' => 'Reading',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9589',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/reading', ]);

        Bar::createWithAttributes(['name' => 'Sheffield',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5780',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/sheffield', ]);

        Bar::createWithAttributes(['name' => 'Shepherd\'s Bush',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5781',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/shepherds-bush', ]);

        Bar::createWithAttributes(['name' => 'Seven Dials',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9684',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/sevendials', ]);

        Bar::createWithAttributes(['name' => 'Shoreditch',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5909',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/shoreditch', ]);

        Bar::createWithAttributes(['name' => 'Soho',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7844',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/soho', ]);

        Bar::createWithAttributes(['name' => 'Southampton',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=8628',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/southampton', ]);

        Bar::createWithAttributes(['name' => 'Stirling',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7923',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/stirling', ]);

        Bar::createWithAttributes(['name' => 'Tower Hill',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9567',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/tower-hill', ]);

        Bar::createWithAttributes(['name' => 'York',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=8736',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/york', ]);

        Bar::createWithAttributes(['name' => 'DogTap Columbus & DogWalk USA',
                    'territory'           => 'USA',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=8841',
                    'bar_url'             => 'https://www.brewdog.com/bars/usa/dogtap-columbus', ]);

        Bar::createWithAttributes(['name' => 'Franklinton',
                    'territory'           => 'USA',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9568',
                    'bar_url'             => 'https://www.brewdog.com/bars/usa/franklinton', ]);

        Bar::createWithAttributes(['name' => 'Short North',
                    'territory'           => 'USA',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=9888',
                    'bar_url'             => 'https://www.brewdog.com/bars/usa/short-north', ]);

        Bar::createWithAttributes(['name' => 'Barcelona',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5757',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/barcelona', ]);

        Bar::createWithAttributes(['name' => 'Berlin Mitte',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=8685',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/berlin-mitte', ]);

        Bar::createWithAttributes(['name' => 'Bologna',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5759',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/bologna', ]);

        Bar::createWithAttributes(['name' => 'Brussels',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7671',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/brussels', ]);

        Bar::createWithAttributes(['name' => 'Firenze',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5769',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/firenze', ]);

        Bar::createWithAttributes(['name' => 'Göteborg',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5770',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/goteborg', ]);

        Bar::createWithAttributes(['name' => 'Grünerløkka',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7102',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/grunerlokka', ]);

        Bar::createWithAttributes(['name' => 'Helsinki',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5772',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/helsinki', ]);

        Bar::createWithAttributes(['name' => 'Kungsholmen',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5783',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/kungsholmen', ]);

        Bar::createWithAttributes(['name' => 'Malmö',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=8391',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/malm', ]);

        Bar::createWithAttributes(['name' => 'Roma',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=8005',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/roma', ]);

        Bar::createWithAttributes(['name' => 'Roppongi',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5778',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/roppongi', ]);

        Bar::createWithAttributes(['name' => 'São Paulo',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=5779',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/sao-paulo', ]);

        Bar::createWithAttributes(['name' => 'Södermalm',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=7487',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/sodermalm', ]);

        Bar::createWithAttributes(['name' => 'Tallinn',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=8941',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/tallinn', ]);

        Bar::createWithAttributes(['name' => 'Norrköping',
                    'territory'           => 'International',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=10037',
                    'bar_url'             => 'https://www.brewdog.com/bars/worldwide/norrkoping', ]);

        Bar::createWithAttributes(['name' => 'Milton Keynes',
                    'territory'           => 'UK',
                    'tap_list_url'        => 'https://www.brewdog.com/ajax/tap_list.php?id=10029',
                    'bar_url'             => 'https://www.brewdog.com/bars/uk/milton-keynes',
                ]);
    }
}
