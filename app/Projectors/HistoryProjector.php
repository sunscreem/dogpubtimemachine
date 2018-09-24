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
        BeerCreated::class => 'onBeerCreated',
        BarCreated::class => 'onBarCreated',
        BarUpdated::class => 'onBarUpdate',
        BeerAttachedToBar::class => 'onBeerAttachedToBar',
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

        $this->buildData['beers'][$beerUUID] = $this->allKnownBeers[$beerUUID];
        $this->buildData['beers'][$beerUUID]['barUUIDs'][] = $barUUID;
        $this->buildData['beers'][$beerUUID]['totalBars'] = count($this->buildData['beers'][$beerUUID]['barUUIDs']);
    }

    public function onBeerRemovedFromBar(StoredEvent $storedEvent)
    {
        $this->checkDate($storedEvent);

        // dump("Detaching a beer from a bar.");

        
        $barUUID = $storedEvent->event->attributes['bar_uuid'];
        $beerUUID = $storedEvent->event->attributes['beer_uuid'];
        
        // dump("Should be away to detach ". $beerUUID." from ". $barUUID);
        
        $index = collect($this->buildData['beers'][$beerUUID]['barUUIDs'])->search($barUUID);
        unset($this->buildData['beers'][$beerUUID]['barUUIDs'][$index]);
        
        $newBarsCount = count($this->buildData['beers'][$beerUUID]['barUUIDs']);

        $this->buildData['beers'][$beerUUID]['totalBars'] = $newBarsCount;

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
        $eventDate = Carbon::parse($storedEvent->created_at);

        // dump('Event date is '. $eventDate->toDateTimeString());

        if ($eventDate->gt($this->currentDayForData)) {
            // start a new day
            // dump('New event date spotted.');
            if (!$this->buildData) { 
                // dump('no data found for this day so moving on.'); 
            }
            else {
                // dump('Storing data for '. $this->currentDayForData->toDateTimeString());
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
        
        // dump('Storing data for ' . $this->currentDayForData->toDateTimeString());
        $this->data[] = ['dataEndsAtDate' => $this->currentDayForData, 'data' => $this->buildData];
    }
}
