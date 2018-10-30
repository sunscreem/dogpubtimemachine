<?php

namespace App\Projectors;

use App\Bar;
use App\Events\BeerAttachedToBar;
use App\Events\BeerDetachedFromBar;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;

class BarsBeersProjector implements Projector
{
    use ProjectsEvents;

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        BeerAttachedToBar::class   => 'onBeerAttachedToBar',
        BeerDetachedFromBar::class => 'onBeerRemovedFromBar',
    ];

    public function onBeerAttachedToBar(BeerAttachedToBar $event)
    {
        Bar::find($event->attributes['bar_uuid'])
            ->beers()
            ->attach($event->attributes['beer_uuid']);
    }

    public function onBeerRemovedFromBar(BeerDetachedFromBar $event)
    {
        Bar::find($event->attributes['bar_uuid'])
            ->beers()
            ->detach($event->attributes['beer_uuid']);
    }
}
