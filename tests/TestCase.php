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

    public function updateBar($bar,$attributes)
    {
        $bar->updateWithAttributes(array_merge($bar->toArray(), $attributes));
    }

    public function createBeers($count)
    {
        factory(Beer::class, $count)
            ->make()
            ->each(function ($beer) {
                Beer::createWithAttributes($beer->setAppends([])->toArray());
            });
    }

    public function attachBeersToBar($bar,$beers)
    {
        $bar->syncBeers($beers->pluck('uuid'));
    }

    public function detachedBeerFromBar($bar, $beer)
    {
        $beers = $bar->beers->pluck('uuid');
        
        $beers->forget($beers->search($beer->uuid));

        $bar->syncBeers($beers);
    }
}
