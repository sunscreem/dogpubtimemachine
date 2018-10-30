<?php

namespace Tests\Feature;

use App\Bar;
use App\Beer;
use Tests\TestCase;
use App\HistoricData;
use Spatie\EventProjector\Models\StoredEvent;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HistoryDataTest extends TestCase
{
    // use RefreshDatabase; <-- doesnt work with a mysql db and uuids by the looks of it. Sigh.
    use DatabaseMigrations;

    protected $firstBar;

    protected $firstBeer;

    public function setup()
    {
        Parent::setup();

        // our test data
        // two days ago - create 2 bars, create 2 beers, attached those beers to the first bar.
        $this->setDate(now()->subDay(2));
        $newBars = $this->createBars(2);
        $newBeers = $this->createBeers(2);
        $this->firstBar = $newBars->first();
        $this->firstBeer = $newBeers->first();
        $this->attachBeersToBar($this->firstBar, $newBeers);

        // yesterday - create 1 beer, attach it to that same first bar
        $this->setDate(now()->subDay(1));
        $newBeer = $this->createBeers(1)->first();
        $this->attachBeersToBar($this->firstBar, $newBeer);

        // today - remove the beer we added yesterday and update the bars name
        $this->setDate(null); // now
        $this->createBars(1);
        $this->createBeers(1);
        $this->detachBeerFromBar($this->firstBar, $newBeer);
        $this->updateBar($this->firstBar, ['name' => 'New Test Name']);
    }

    /** @test */
    public function it_should_be_reporting_the_test_setup_counts_correctly()
    {
        $this->assertCount(3, Bar::all());

        $this->assertCount(4, Beer::all());

        $this->assertSame('New Test Name', $this->firstBar->fresh()->name);

        $this->assertCount(2, $this->firstBar->fresh()->beers);

        $this->assertCount(12, StoredEvent::all());
    }

    /** @test */
    public function it_produces_a_history_containing_three_days()
    {
        $this->artisan('data:rebuild');

        $this->assertCount(3, HistoricData::all());
    }

    /** @test */
    public function it_shows_the_correct_number_of_bars_and_beers_for_two_days_ago()
    {
        $this->artisan('data:rebuild');

        $data = HistoricData::find(1)->data;

        $this->assertCount(2, $data['bars']);

        $this->assertCount(2, $data['beers']);

        $firstBeer = $data['beers'][$this->firstBeer->uuid];
        $firstBar = $data['bars'][$this->firstBar->uuid];

        $this->assertNotSame('New Test Name', $firstBar['name']);

        $this->assertSame($firstBar['uuid'], $firstBeer['barUUIDs'][0]);
    }

    /** @test */
    public function it_shows_the_correct_number_of_bars_and_beers_for_yesterday()
    {
        $this->artisan('data:rebuild');

        $data = HistoricData::find(2)->data;

        $this->assertCount(2, $data['bars']);

        $this->assertCount(3, $data['beers']);

        $firstBeer = $data['beers'][$this->firstBeer->uuid];
        $firstBar = $data['bars'][$this->firstBar->uuid];

        $this->assertNotSame('New Test Name', $firstBar['name']);

        $this->assertSame($firstBar['uuid'], $firstBeer['barUUIDs'][0]);
    }

    /** @test */
    public function it_shows_the_correct_number_of_bars_and_beers_for_today()
    {
        $this->artisan('data:rebuild');

        $data = HistoricData::find(3)->data;

        $this->assertCount(3, $data['bars']);

        $this->assertCount(2, $data['beers']);

        $firstBeer = $data['beers'][$this->firstBeer->uuid];
        $firstBar = $data['bars'][$this->firstBar->uuid];

        $this->assertSame('New Test Name', $firstBar['name']);

        $this->assertSame($firstBar['uuid'], $firstBeer['barUUIDs'][0]);
    }
}
