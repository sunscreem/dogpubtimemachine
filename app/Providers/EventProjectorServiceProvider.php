<?php

namespace App\Providers;

use App\Projectors\BarsBeersProjector;
use App\Projectors\BarsProjector;
use App\Projectors\BeersProjector;
use Illuminate\Support\ServiceProvider;
use Spatie\EventProjector\Facades\Projectionist;

class EventProjectorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Projectionist::addProjectors([BarsProjector::class,
                                        BeersProjector::class,
                                        BarsBeersProjector::class,
        ]);
    }
}
