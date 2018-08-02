<?php

namespace App\Events;

use Spatie\EventProjector\ShouldBeStored;

class RemoveBeerFromBar implements ShouldBeStored
{
    /** @var array */
    public $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }
}
