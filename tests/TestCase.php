<?php

namespace Tests;

use App\Bar;
use App\Beer;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createBars($count)
    {
        $bars = factory(Bar::class, $count)->make()
                ->each(function ($bar) {
                    Bar::createWithAttributes($bar->toArray());
                });
    }

    public function updateBar($bar)
    {
      
    }

    public function createBeers($count)
    {
        $bars = factory(Beer::class, $count)->make();

            $bars->each(function ($beer) {
                Beer::createWithAttributes($beer->setAppends([])->toArray());
            });
    }

    public function attachBeersToBar($bar,$beers)
    {
    }

    public function detachBeersFromBar($bar, $beers)
    {
    }
}
