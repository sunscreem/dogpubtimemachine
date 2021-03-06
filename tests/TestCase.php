<?php

namespace Tests;

use App\Bar;
use App\Beer;
use Spatie\EventProjector\Models\StoredEvent;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $date;

    public function setDate($newDate)
    {
        $this->date = $newDate;
    }

    public function createBars($count)
    {
        return factory(Bar::class, $count)->make()
                ->map(function ($bar) {
                    $newBar = Bar::createWithAttributes($bar->toArray());
                    $this->updateStoredEventDate();

                    return $newBar;
                });
    }

    public function updateBar($bar, $attributes)
    {
        $bar->updateWithAttributes(array_merge($bar->toArray(), $attributes));

        $this->updateStoredEventDate();
    }

    public function createBeers($count)
    {
        return factory(Beer::class, $count)
            ->make()
            ->map(function ($beer) {
                $newBeer = Beer::createWithAttributes($beer->setAppends([])->toArray());
                $this->updateStoredEventDate();

                return $newBeer;
            });
    }

    public function attachBeersToBar($bar, $beers)
    {
        $lastIDofStoredEvents = StoredEvent::latest('id')->first()->id;

        $bar->syncBeers($beers->pluck('uuid'));

        $this->updateStoredEventDate($lastIDofStoredEvents);
    }

    public function detachBeerFromBar($bar, $beer)
    {
        $beers = $bar->beers->pluck('uuid');

        $beers->forget($beers->search($beer->uuid));

        $lastIDofStoredEvents = StoredEvent::latest('id')->first()->id;

        $bar->syncBeers($beers);

        $this->updateStoredEventDate($lastIDofStoredEvents);
    }

    private function updateStoredEventDate($lastIDofStoredEvents = null)
    {
        if (! $this->date) {
            return;
        }

        if ($lastIDofStoredEvents) {
            StoredEvent::where('id', '>', $lastIDofStoredEvents)->update(['created_at' => $this->date]);

            return;
        }

        StoredEvent::latest('id')->first()->update(['created_at' => $this->date]);
    }
}
