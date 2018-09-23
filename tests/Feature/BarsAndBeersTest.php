<?php

namespace Tests\Feature;

use App\Bar;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\EventProjector\Models\StoredEvent;
use App\Events\BarCreated;
use App\Beer;

class BarsAndBeersTest extends TestCase
{
    use RefreshDatabase;

    public function setup()
    {
        Parent::setup();

        $this->createBars(3);
        
        $this->createBeers(3);

    }

    /** @test */
    public function it_correctly_counts_new_bars_and_beers_being_added()
    {
        $this->assertCount(3,Bar::all());

        $this->assertCount(3, Beer::all());
    }

    /** @test */
    public function it_correctly_counts_beers_attached_to_a_bar(){

        $this->assertCount(0, Bar::first()->beers);
        
        $this->attachBeersToBar(Bar::first(), Beer::all());

        $this->assertCount(3,Bar::first()->beers);      
    }

    /** @test */
    public function it_correctly_counts_beers_detached_from_a_bar()
    {

        $this->attachBeersToBar(Bar::first(), Beer::all());

        $this->assertCount(3, Bar::first()->beers);

        $this->detachBeerFromBar(Bar::first(),Beer::first());

        $this->assertCount(2, Bar::first()->beers);
    }

    /** @test */
    public function it_updates_a_bar_name(){

        $this->updateBar(Bar::first(),['name'=>'New Test Name']);

        $this->assertSame('New Test Name',Bar::first()->fresh()->name);
    
    }
}
