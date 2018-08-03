<?php

namespace App\Projectors;

use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;
use App\Events\BeerAttachedToBar;
use App\Bar;
use App\Events\BeerDetachedFromBar;

class BarsBeersProjector implements Projector
{
    use ProjectsEvents;

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        BeerAttachedToBar::class => 'onBeerAttachedToBar',
        BeerDetachedFromBar::class => 'onBeerRemovedFromBar',
    ];

    public function onBeerAttachedToBar(BeerAttachedToBar $event)
    {
        Bar::find($event->attributes['bar_id'])
            ->beers()
            ->attach($event->attributes['beer_id'], ['uuid' => $event->attributes['uuid']]);
    }

    public function onBeerRemovedFromBar(BeerDetachedFromBar $event)
    {
        Bar::find($event->attributes['bar_id'])
            ->beers()
            ->detach($event->attributes['beer_id']);
    }
}
