<?php

namespace App\Projectors;

use App\Beer;
use App\Events\BeerCreated;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;

class BeersProjector implements Projector
{
    use ProjectsEvents;

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        BeerCreated::class => 'onBeerCreated',
    ];

    public function onBeerCreated(BeerCreated $event)
    {
        Beer::create($event->beerAttributes);
    }

    public function resetState()
    {
        Beer::truncate();
    }

    public function streamEventsBy(): string
    {
        return 'uuid';
    }
}
