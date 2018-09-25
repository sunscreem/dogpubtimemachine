<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Bar;
use Spatie\EventProjector\Models\StoredEvent;
use App\Beer;
use App\HistoricData;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HistoryDataTest extends TestCase
{

    use DatabaseMigrations;

    // use RefreshDatabase; <-- doesnt work with a mysql db and uuids by the looks of it. Sigh.
    
    public function setup()
    {
        Parent::setup();

        $this->setDate(now()->subDay(2));
        $newBars = $this->createBars(2);
        $newBeers = $this->createBeers(2);
        dump($newBeers->pluck('uuid'));
        // dump($newBars->first()->beers);
        $this->attachBeersToBar($newBars->first(), $newBeers);

        $this->setDate(now()->subDay(1));
        $newBeer = $this->createBeers(1)->first();
        dump($newBeer->uuid);
        $this->attachBeersToBar($newBars->first(), $newBeer);

        $this->setDate(null); // now
        $this->createBars(1);
        $this->createBeers(1);
        $this->detachBeerFromBar($newBars->first(), $newBeer);
       
        $this->updateBar($newBars->first(), ['name' => 'New Test Name']);

        dd('at there start there are:' . StoredEvent::count());
    }

   /** @test */
    public function it_should_be_reporting_the_test_setup_counts_correctly(){
    
        $this->assertCount(3, Bar::all());

        $this->assertCount(4, Beer::all());

        $this->assertSame('New Test Name', Bar::first()->fresh()->name);

        $this->assertCount(2, Bar::first()->beers);

        $this->assertCount(12,StoredEvent::all());
    }

    /** @test */
    public function it_produces_a_history_containing_three_days(){

        $this->artisan('data:rebuild');

        $this->assertCount(3, HistoricData::all());
    
    }

    /** @test */
    public function it_shows_the_correct_number_of_bars_and_beers_for_two_days_ago(){

        $this->artisan('data:rebuild');

        $data = HistoricData::find(1)->data;

        $this->assertCount(2, $data['bars']);

        $this->assertCount(2, $data['beers']);

        $firstBeer = collect($data['beers'])->first();
        $firstBar = collect($data['bars'])->first();

        $this->assertNotSame('New Test Name', $firstBar['name']);

        $this->assertSame($firstBar['uuid'], $firstBeer['barUUIDs'][0]);
    
    }

    /** @test */
    public function it_shows_the_correct_number_of_bars_and_beers_for_yesterday()
    {
        $this->artisan('data:rebuild');

        $data = HistoricData::find(2)->data;

        $this->assertCount(2, $data['bars']);

        $this->assertCount(2, $data['beers']);

        $firstBeer = collect($data['beers'])->first();
        $firstBar = collect($data['bars'])->first();

        $this->assertNotSame('New Test Name', $firstBar['name']);

        $this->assertSame($firstBar['uuid'], $firstBeer['barUUIDs'][0]);

    }

    /** @test */
    public function it_shows_the_correct_number_of_bars_and_beers_for_today()
    {

        $this->artisan('data:rebuild');

        $data = HistoricData::find(3)->data;
        
        dump('here there are:'.StoredEvent::count());

        $this->assertCount(3, $data['bars']);

        $this->assertCount(2, $data['beers']);

        $firstBeer = collect($data['beers'])->first();
        $firstBar = collect($data['bars'])->first();

        $this->assertSame('New Test Name', $firstBar['name']);

        $this->assertSame($firstBar['uuid'], $firstBeer['barUUIDs'][0]);

    }

}
