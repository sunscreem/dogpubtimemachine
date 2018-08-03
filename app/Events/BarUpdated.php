<?php

namespace App\Events;

use Spatie\EventProjector\ShouldBeStored;

class BarUpdated implements ShouldBeStored
{
    /** @var array */
    public $barAttributes;

    public function __construct(array $barAttributes)
    {
        $this->barAttributes = $barAttributes;
    }
}
