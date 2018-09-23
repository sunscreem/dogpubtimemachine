<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Bar;
use Spatie\EventProjector\Models\StoredEvent;
use App\Beer;

class HistoryDataTest extends TestCase
{
    use RefreshDatabase;

    public function setup()
    {
        Parent::setup();

        $this->setDate(now()->subDay(2));
        $this->createBars(2);
        $this->createBeers(2);
        $this->attachBeersToBar(Bar::first(), Beer::all());

        $this->setDate(now()->subDay(1));
        $this->createBeers(1);
        $this->detachBeerFromBar(Bar::first(), Beer::first());
                
        $this->setDate(null); // now
        $this->updateBar(Bar::first(), ['name' => 'New Test Name']);
   
    }

    /** @test */
    public function it_should_be_reporting_the_test_setup_counts_correctly(){
    
        // we've already covered this in another test but 
        // lets get an error right  here if the test data
        // gets changed as the app grows

        $this->assertCount(2, Bar::all());

        $this->assertCount(3, Beer::all());

        $this->assertSame('New Test Name', Bar::first()->fresh()->name);

        $this->assertCount(1, Bar::first()->beers);
    }

    /** @test */
    public function it_produces_a_history_containing_three_days(){

        // rob you are here.
        $this->artisan('data:rebuild');
    
    }


}
