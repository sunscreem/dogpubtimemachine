<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\EventProjector\Facades\Projectionist;
use App\Projectors\BarsProjector;
use App\Projectors\BeersProjector;
use App\Projectors\BarsBeersProjector;
use App\Projectors\HistoryProjector;

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
                                        HistoryProjector::class, ]);
    }
}
