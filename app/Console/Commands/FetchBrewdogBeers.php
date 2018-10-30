<?php

namespace App\Console\Commands;

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

        $crawler = Goutte::request('GET', $barToUpdate->tap_list_url);

        $this->info('Fetching bar menus for '.$barToUpdate->name);

        // check for content
        if (! $crawler->filter('.onTap span + span')->count()) {
            // bar isn't giving us data

            $barToUpdate->update(['tap_list_last_updated' => null]);

            $barToUpdate->touch();

            $this->error('Something went wrong - No data found for this bar!');

            return;
        }

        // dump($barToUpdate->name,$barToUpdate->url,$crawler->filter('.onTap span + span')->count()); //debug
        // dump($barToUpdate->name);

        $tapListLastUpdated = $this->sortOutTheLastUpdatedTime($crawler->filter('.onTap span + span')->text());

        $onTapBeers = [];

        $crawler->filter('.onTapInfo .category')->each(function ($category) use (&$onTapBeers) {
            $categoryTitle = strtolower($category->filter('.title')->text());

            $this->line('Category Found: '.$categoryTitle);
            // dump($categoryTitle); // debug

            if (str_contains($categoryTitle, config('site.categoryWordsToSkip'))) {
                $this->line(' - contains a word from the skip list - skipped');

                return;
            }

            // if (strpos($categoryTitle, 'can') !== false) {
            //     $this->line(' - contains \'can\'- skipped');
            //     return;
            // }

            $category->filter('ul.beer')->each(function ($node) use (&$onTapBeers) {
                $thisBeer = [];
                $node->children()->each(function ($li) use (&$thisBeer) {
                    $thisBeer[] = $li->text();
                });
                $onTapBeers[] = $thisBeer; //explode("\t", $node->text());
            });
        });

        $this->line(count($onTapBeers).' beers found in total');

        $thisBarsBeerIds = collect($onTapBeers)->map(function ($beer) {
            return $this->fetchOrCreateBeerID($beer);
        });

        $this->line('Tap list reporting as being last updated: '.$tapListLastUpdated->diffForHumans());

        $barToUpdate->update(['tap_list_last_updated' => $tapListLastUpdated]);

        $result = $barToUpdate->syncBeers($thisBarsBeerIds);

        $this->info('All done. ('.count($result['attached']).' Added, '.count($result['detached']).' Detached)');
    }

    private function fetchOrCreateBeerID($tapBeer)
    {
        preg_match("/^(.+?)\d/", $tapBeer[2], $matches);

        // dump($tapBeer, $matches); //debug

        if (! isset($matches[1])) {
            $matches[1] = '-';
        }

        // dump('looking for', $tapBeer[0], $tapBeer[1]);
        $ourBeer = Beer::where(['name' => $tapBeer[0], 'brewery' => $matches[1]])->first();

        if (! $ourBeer) {
            $ourBeer = Beer::createWithAttributes(['name' => $tapBeer[0], 'brewery' => $matches[1]]);
        }

        return $ourBeer->uuid;
    }

    private function sortOutTheLastUpdatedTime($lastUpdatedText)
    {
        $hoursAndMinutes = explode(',', substr($lastUpdatedText, 14));

        $hours = 0;

        $minutes = (int) trim(substr(trim($hoursAndMinutes[0]), 0, 2));

        if (count($hoursAndMinutes) == 2) {
            $hours = (int) trim(substr($hoursAndMinutes[0], 0, 2));
            $minutes = (int) trim(substr(trim($hoursAndMinutes[1]), 0, 2));
        }

        // dd($lastUpdatedText, $hoursAndMinutes, $hours, $minutes); // debug

        return Carbon::now()->subHours($hours)->subMinutes($minutes);
    }
}
