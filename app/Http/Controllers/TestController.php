<?php

namespace App\Http\Controllers;

use Artisan;
use Session;
use Illuminate\Http\Request;
use App\Projectors\HistoryProjector;
use Spatie\EventProjector\Facades\Projectionist;

class TestController extends Controller
{
    public function index()
    {
        dump('started', Session::all());

        //From: https://github.com/36864/Event-Sourced-Task-Lists/blob/b0bc7cc7dc04cffe3a3ea1f3a8a9c1706bde13ce/app/Http/Controllers/History/Controller.php#L27
        $projector = Projectionist::addProjector(HistoryProjector::class)->getProjector(HistoryProjector::class);
        $projector->reset();
        $projector->setTargetEndDate('a date');
        Projectionist::replay(collect([$projector]));

        dump('finished', Session::all());
    }
}
