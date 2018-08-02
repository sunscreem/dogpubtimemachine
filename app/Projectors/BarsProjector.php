<?php

namespace App\Projectors;

use App\Bar;
use App\Events\BarCreated;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;

class BarsProjector implements Projector
{
    use ProjectsEvents;

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        BarCreated::class => 'onBarCreated',
    ];

    public function onBarCreated(BarCreated $event)
    {
        Bar::create($event->barAttributes);
    }

    public function resetState()
    {
        Bar::truncate();
    }

    public function streamEventsBy(): string
    {
        return 'accountUuid';
    }
}
