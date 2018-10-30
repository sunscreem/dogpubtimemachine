<?php

namespace App\Projectors;

use App\Bar;
use App\Events\BarCreated;
use App\Events\BarUpdated;
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
        BarUpdated::class => 'onBarUpdate',
    ];

    public function onBarCreated(BarCreated $event)
    {
        $bar = Bar::create($event->barAttributes);

        $bar->update(['updated_at' => now()->subDays(14)]); // makes sure its the next to be updated
    }

    public function onBarUpdate(BarUpdated $event)
    {
        Bar::find($event->barAttributes['uuid'])
            ->update(['name'           => $event->barAttributes['name'],
                        'territory'    => $event->barAttributes['territory'],
                        'bar_url'      => $event->barAttributes['bar_url'],
                        'tap_list_url' => $event->barAttributes['tap_list_url'], ]);
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
