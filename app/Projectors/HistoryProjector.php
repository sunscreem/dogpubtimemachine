<?php

namespace App\Projectors;

use Session;
use App\Beer;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;
use App\Events\BeerCreated;

class HistoryProjector implements Projector
{
    use ProjectsEvents;

    protected $targetEndDate;

    /**
     * @param mixed $targetEventId
    *
    * @return static
    */
    public function setTargetEndDate($targetEndDate)
    {
        $this->targetEndDate = $targetEndDate;

        return $this;
    }

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        BeerCreated::class => 'onBeerCreated',
    ];

    public function resetState()
    {
        Session::forget(['beers']);

        $beers = Session::get('beers', collect());
    }

    public function onBeerCreated(BeerCreated $event)
    {
        $beers = Session::get('beers', collect());

        // rob - you are here. Now just pass that date through from the controller and skip any events passsed that date

        $newBeer = new Beer($event->beerAttributes);

        $beers->push($newBeer);

        Session::put('beers', $beers);
    }

    public function streamEventsBy(): string
    {
        return 'uuid';
    }
}
