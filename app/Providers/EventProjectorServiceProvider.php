<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\EventProjector\Facades\Projectionist;
use App\Projectors\BarsProjector;

class EventProjectorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Projectionist::addProjectors([
                                BarsProjector::class
                                    ]);
    }
}
