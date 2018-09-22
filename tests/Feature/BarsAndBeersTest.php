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

    /** @test */
    public function it_correct_reports_new_bars_and_beers_being_added()
    {

        $this->createBars(3);

        $this->assertCount(3,Bar::all());

        $this->createBeers(3);

        $this->assertCount(3, Beer::all());

    }

}
