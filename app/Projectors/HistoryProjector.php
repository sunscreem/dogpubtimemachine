<?php

namespace App\Projectors;

use App\Bar;
use App\Beer;
use App\Events\BarCreated;
use App\Events\BarUpdated;
use App\Events\BeerAttachedToBar;
use App\Events\BeerCreated;
use App\Events\BeerDetachedFromBar;
use Carbon\Carbon;
use Spatie\EventProjector\Models\StoredEvent;
use Spatie\EventProjector\Projectors\Projector;
use Spatie\EventProjector\Projectors\ProjectsEvents;

class HistoryProjector implements Projector
{
    use ProjectsEvents;

    public $currentDayForData;
    public $buildData;
    public $data = [];

    protected $allKnownBeers;

    public function __construct()
    {
        $this->currentDayForData = Carbon::parse(config('site.timeMachineStartDate'))->endOfDay();
    }

    /*
     * Here you can specify which event should trigger which method.
     */
    protected $handlesEvents = [
        BeerCreated::class         => 'onBeerCreated',
        BarCreated::class          => 'onBarCreated',
        BarUpdated::class          => 'onBarUpdate',
        BeerAttachedToBar::class   => 'onBeerAttachedToBar',
        BeerDetachedFromBar::class => 'onBeerRemovedFromBar',
    ];

    public function resetState()
    {
    }

    public function onBeerCreated(StoredEvent $storedEvent)
    {
        // dd($this->targetEndDate);
        $this->checkDate($storedEvent);

        $beer = $storedEvent->event->beerAttributes;

        // dump("A new beer has been added: {$storedEvent->event->beerAttributes['name']} by {$storedEvent->event->beerAttributes['brewery']}");

        $this->allKnownBeers[$beer['uuid']] = $beer;
    }

    public function onBarCreated(StoredEvent $storedEvent)
    {
        $this->checkDate($storedEvent);

        // dump("A new bar has been added: {$storedEvent->event->barAttributes['name']}");

        $bar = $storedEvent->event->barAttributes;

        $this->buildData['bars'][$bar['uuid']] = $bar;
    }

    public function onBarUpdate(StoredEvent $storedEvent)
    {
        $this->checkDate($storedEvent);

        // dump("A bar has been updated: {$storedEvent->event->barAttributes['name']}");

        $bar = $storedEvent->event->barAttributes;

        $this->buildData['bars'][$bar['uuid']] = $bar;
    }

    public function onBeerAttachedToBar(StoredEvent $storedEvent)
    {
        $this->checkDate($storedEvent);

        // dump("Attaching beer to a bar.");

        $barUUID = $storedEvent->event->attributes['bar_uuid'];
        $beerUUID = $storedEvent->event->attributes['beer_uuid'];

        // if ($barUUID == '6e2964a5-2b1c-4d24-857e-a9dfd6d27e32') {
        //     dump('attaching '.$beerUUID.' to '.$barUUID);
        //     dump('exists?', isset($this->buildData['beers']['b19c11a0-36de-4ded-8e16-08812e38c623']));
        // }

        // dd($this->allKnownBeers[$beerUUID]);
        $this->buildData['beers'][$beerUUID]['name'] = $this->allKnownBeers[$beerUUID]['name'];
        $this->buildData['beers'][$beerUUID]['uuid'] = $this->allKnownBeers[$beerUUID]['uuid'];
        $this->buildData['beers'][$beerUUID]['brewery'] = $this->allKnownBeers[$beerUUID]['brewery'];
        $this->buildData['beers'][$beerUUID]['barUUIDs'][] = $barUUID;
        $this->buildData['beers'][$beerUUID]['bars_count'] = count($this->buildData['beers'][$beerUUID]['barUUIDs']);

        // dump(count($this->buildData['beers'][$beerUUID]['barUUIDs']));

        // if ($barUUID == '6e2964a5-2b1c-4d24-857e-a9dfd6d27e32') {
        //     dump ('and now', $this->buildData['beers'][$beerUUID]);
        //     dump('exists?', isset($this->buildData['beers']['b19c11a0-36de-4ded-8e16-08812e38c623']));
        // }
    }

    public function onBeerRemovedFromBar(StoredEvent $storedEvent)
    {
        $this->checkDate($storedEvent);

        $barUUID = $storedEvent->event->attributes['bar_uuid'];
        $beerUUID = $storedEvent->event->attributes['beer_uuid'];

        // dump("Detaching a beer from a bar.");
        // dump('exists?', isset($this->buildData['beers']['b19c11a0-36de-4ded-8e16-08812e38c623']));
        // dump("Should be away to detach " . $beerUUID . " from " . $barUUID);
        // dump('bars for '. $beerUUID,$this->buildData['beers'][$beerUUID]['barUUIDs']);
        // dump('index:',collect($this->buildData['beers'][$beerUUID]['barUUIDs'])->search($barUUID));
        // dump('-');

        // if ($barUUID == '6e2964a5-2b1c-4d24-857e-a9dfd6d27e32') {
        //     dump("Should be away to detach ". $beerUUID." from ". $barUUID);
        //     dump('exists?', isset($this->buildData['beers']['b19c11a0-36de-4ded-8e16-08812e38c623']));
        // }

        $index = collect($this->buildData['beers'][$beerUUID]['barUUIDs'])->search($barUUID);
        unset($this->buildData['beers'][$beerUUID]['barUUIDs'][$index]);
        $this->buildData['beers'][$beerUUID]['bars_count'] = count($this->buildData['beers'][$beerUUID]['barUUIDs']);

        $newBarsCount = count($this->buildData['beers'][$beerUUID]['barUUIDs']);

        $this->buildData['beers'][$beerUUID]['bars_count'] = $newBarsCount;

        if (!$newBarsCount) {
            unset($this->buildData['beers'][$beerUUID]);
        }
    }

    public function streamEventsBy(): string
    {
        return 'uuid';
    }

    private function checkDate(StoredEvent $storedEvent) : void
    {
        // dump($storedEvent->id);
        $eventDate = Carbon::parse($storedEvent->created_at);

        // dump('Event date is '. $eventDate->toDateTimeString());

        if ($eventDate->gt($this->currentDayForData)) {
            // start a new day
            // dump('New event date spotted.');
            if (!$this->buildData) {
                // dump('no data found for this day so moving on.');
            } else {
                dump('Storing data for '.$this->currentDayForData->toDateTimeString());
                $this->data[] = ['dataEndsAtDate' => $this->currentDayForData, 'data' => $this->buildData];
            }
            // dump('And setting new date of '. $eventDate->endOfDay()->toDateTimeString());
            $this->currentDayForData = $eventDate->endOfDay();
        }
    }

    public function addFinalDay()
    {
        if (!$this->buildData) {
            // dump('no data found for final day.');
            return;
        }

        dump('Storing data for '.$this->currentDayForData->toDateTimeString());
        $this->data[] = ['dataEndsAtDate' => $this->currentDayForData, 'data' => $this->buildData];
    }
}
