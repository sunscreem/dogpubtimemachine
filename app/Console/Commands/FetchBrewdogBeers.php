<?php

namespace App\Console\Commands;

use Cache;
use Goutte;
use App\Bar;
use App\Beer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FetchBrewdogBeers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'brewdog:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Bar Data From Brewdog';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $barToUpdate = Bar::orderBy('updated_at')->first();

        $crawler = Goutte::request('GET', $barToUpdate->url);
        
        // check for content
        if (!$crawler->filter('.onTap span + span')->count()) {


            // bar isn't giving us data
            
            $barToUpdate->update(['tap_list_last_updated' => null]);

            return;

        }

        // dump($barToUpdate->name,$barToUpdate->url,$crawler->filter('.onTap span + span')->count()); //debug

        $tapListLastUpdated = $this->sortOutTheLastUpdatedTime($crawler->filter('.onTap span + span')->text());

        $onTapBeers = [];


        $crawler->filter('.onTapInfo ul.beer')->each(function ($node) use (&$onTapBeers) {
            $onTapBeers[] = explode("\t", $node->text());
        });

        $thisBarsBeerIds = collect($onTapBeers)->map(function ($beer) {
            return $this->fetchOrCreateBeerID($beer);
        });

        $barToUpdate->update(['tap_list_last_updated' => $tapListLastUpdated]);

        $barToUpdate->beers()->sync($thisBarsBeerIds);
    }

    private function fetchOrCreateBeerID($tapBeer)
    {
        preg_match("/^(.+?)\d/", $tapBeer[2], $matches);

        // dump($tapBeer, $matches); //debug

        if (!isset($matches[1])) {
            $matches[1] = '-';
        }
        $ourBeer = Beer::firstOrCreate(['name' => $tapBeer[0], 'brewery' => $matches[1]]);

        return $ourBeer->id;
    }

    private function sortOutTheLastUpdatedTime($lastUpdatedText)
    {
        $hoursAndMinutes = explode(',', substr($lastUpdatedText, 14));

        $hours = 0;

        $minutes = (int)trim(substr(trim($hoursAndMinutes[0]), 0, 2));

        if (count($hoursAndMinutes) == 2) {
            $hours = (int)trim(substr($hoursAndMinutes[0], 0, 2));
            $minutes = (int)trim(substr(trim($hoursAndMinutes[1]), 0, 2));
        }

        // dd($lastUpdatedText, $hoursAndMinutes, $hours, $minutes); // debug

        return Carbon::now()->subHours($hours)->subMinutes($minutes);
    }
}
