<?php

namespace App\Projectors;

use App\Bar;
use App\Events\BarCreated;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;
use App\Events\BarUpdated;

class BarsProjector implements Projector
{
    use ProjectsEvents;

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        BarCreated::class => 'onBarCreated',
        BarUpdated::class => 'onBarUpdate',
    ];

    public function onBarCreated(BarCreated $event)
    {
        Bar::create($event->barAttributes);
    }

    public function onBarUpdate(BarUpdated $event)
    {
        Bar::find($event->barAttributes['uuid'])->update(['name' => $event->barAttributes['name']]);
    }

    public function resetState()
    {
        Bar::truncate();
    }

    public function streamEventsBy(): string
    {
        return 'uuid';
    }
}
