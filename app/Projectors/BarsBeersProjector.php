<?php

namespace App\Projectors;

use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;
use App\Events\AttachBeerToBar;
use App\Bar;
use App\Events\RemoveBeerFromBar;

class BarsBeersProjector implements Projector
{
    use ProjectsEvents;

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        AttachBeerToBar::class => 'onBeerAttachedToBar',
        RemoveBeerFromBar::class => 'onBeerRemovedFromBar',
    ];

    public function onBeerAttachedToBar(AttachBeerToBar $event)
    {
        // dump($event->attributes);
        Bar::find($event->attributes['bar_id'])
            ->beers()
            ->attach($event->attributes['beer_id'], ['uuid' => $event->attributes['uuid']]);
    }

    public function onBeerRemovedFromBar(RemoveBeerFromBar $event)
    {
        dump($event->attributes);
        Bar::find($event->attributes['bar_id'])
            ->beers()
            ->detach($event->attributes['beer_id']);
    }
}
