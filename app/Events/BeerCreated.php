<?php

namespace App\Events;

use Spatie\EventProjector\ShouldBeStored;

class BeerCreated implements ShouldBeStored
{
    /** @var array */
    public $beerAttributes;

    public function __construct(array $beerAttributes)
    {
        $this->beerAttributes = $beerAttributes;
    }
}
