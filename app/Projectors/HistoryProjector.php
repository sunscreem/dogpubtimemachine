<?php

namespace App\Projectors;

use Session;
use App\Beer;
use App\Bar;
use Carbon\Carbon;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;
use App\Events\BeerCreated;
use Spatie\EventProjector\Models\StoredEvent;
use App\Events\BarCreated;
use App\Events\BarUpdated;
use App\Events\BeerAttachedToBar;
use App\Events\BeerDetachedFromBar;

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
        $this->targetEndDate = Carbon::parse($targetEndDate)->endOfDay();

        return $this;
    }

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        BeerCreated::class => 'onBeerCreated',
        BarCreated::class => 'onBarCreated',
        BarUpdated::class => 'onBarUpdate',
        BeerAttachedToBar::class => 'onBeerAttachedToBar',
        BeerDetachedFromBar::class => 'onBeerRemovedFromBar',
    ];

    public function resetState()
    {
        Session::forget(['beers', 'bars']);

        $beers = Session::get('beers', collect());
    }

    public function onBeerCreated(StoredEvent $storedEvent)
    {
        if (Carbon::parse($storedEvent->created_at)->gt($this->targetEndDate)) {
            return;
        }

        $beers = Session::get('beers', collect());

        $beers->push(new Beer($storedEvent->event->beerAttributes));

        Session::put('beers', $beers);
    }

    public function onBarCreated(StoredEvent $storedEvent)
    {
        if (Carbon::parse($storedEvent->created_at)->gt($this->targetEndDate)) {
            return;
        }

        $bars = Session::get('bars', collect());

        $bars->push(new Bar($storedEvent->event->barAttributes));

        Session::put('bars', $bars);
    }

    public function onBarUpdate(StoredEvent $storedEvent)
    {
        if (Carbon::parse($storedEvent->created_at)->gt($this->targetEndDate)) {
            return;
        }

        $bars = Session::get('bars', collect());

        $updatedBars = $bars->map(function ($bar) use ($storedEvent) {
            if ($bar->uuid != $storedEvent->event->barAttributes['uuid']) {
                return $bar;
            };
            return $bar->fill($storedEvent->event->barAttributes);
        });

        Session::put('bars', $updatedBars);
    }

    public function onBeerAttachedToBar()
    {
        // code...
    }

    public function onBeerRemovedFromBar()
    {
        // code...
    }

    public function streamEventsBy(): string
    {
        return 'uuid';
    }
}
