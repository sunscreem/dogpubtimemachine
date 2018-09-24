<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Bar;
use Spatie\EventProjector\Models\StoredEvent;
use App\Beer;
use App\HistoricData;

class HistoryDataTest extends TestCase
{
    use RefreshDatabase;

    protected $allHistoricData;

    public function setup()
    {
        Parent::setup();

        dump('creating dummy data for -2 days ago');
        $this->setDate(now()->subDay(2));
        $this->createBars(2);
        $this->createBeers(2);
        $this->attachBeersToBar(Bar::first(), Beer::all());

        dump('creating dummy data for yesterday');
        $this->setDate(now()->subDay(1));
        $newBeer = $this->createBeers(1)->first();
        $this->attachBeersToBar(Bar::first(), $newBeer);

        dump('creating dummy data for today');
        $this->setDate(null); // now
        $this->createBars(1);
        $this->createBeers(1);
        $this->detachBeerFromBar(Bar::first(), $newBeer);
       
        $this->updateBar(Bar::first(), ['name' => 'New Test Name']);

        // dd('');
        // ok rob - fuck knows whats happening. Why is the beer detached event now not showing up?
        dd(StoredEvent::select('created_at','event_class')->get()->toArray());

        $this->artisan('data:rebuild'); // speed things up a bit.. just run the rebuild once.

        $this->allHistoricData = HistoricData::all();
   
    }

    /** @test */
    public function it_should_be_reporting_the_test_setup_counts_correctly(){
    
        // we've already covered this in another test but 
        // lets get an error right  here if the test data
        // gets changed as the app grows

        $this->assertCount(3, Bar::all());

        $this->assertCount(4, Beer::all());

        $this->assertSame('New Test Name', Bar::first()->fresh()->name);

        $this->assertCount(2, Bar::first()->beers);
    }

    /** @test */
    public function it_produces_a_history_containing_three_days(){

        $this->assertCount(3, $this->allHistoricData);
    
    }

    /** @test */
    public function it_shows_the_correct_number_of_bars_and_beers_for_two_days_ago(){

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

        $data = HistoricData::find(2)->data;

        $this->assertCount(2, $data['bars']);

        $this->assertCount(3, $data['beers']);

        $firstBeer = collect($data['beers'])->first();
        $firstBar = collect($data['bars'])->first();

        $this->assertNotSame('New Test Name', $firstBar['name']);

        $this->assertSame($firstBar['uuid'], $firstBeer['barUUIDs'][0]);

    }

    /** @test */
    public function it_shows_the_correct_number_of_bars_and_beers_for_today()
    {

        $data = HistoricData::find(3)->data;
        
        $this->assertCount(3, $data['bars']);

        $this->assertCount(3, $data['beers']);

        $firstBeer = collect($data['beers'])->first();
        $firstBar = collect($data['bars'])->first();

        $this->assertSame('New Test Name', $firstBar['name']);

        dd($firstBar['uuid'],$firstBeer['barUUIDs']);

        $this->assertSame($firstBar['uuid'], $firstBeer['barUUIDs'][0]);

    }

}
