<?php

namespace App\Http\Controllers;

use Session;
use App\Beer;
use App\HistoricData;
use Illuminate\Http\Request;
use App\Projectors\HistoryProjector;
use Spatie\EventProjector\Facades\Projectionist;

class BeersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::all();

        // if (request('d')) {
        //     $beers = $this->fetchBeersForDate();
        // }

        return $beers->filter(function ($value) {
            return $value->totalBars;
        })
            ->sortByDesc('totalBars')
            ->values();
    }

    public function fetchBeersForDate()
    {
        dd(request('d'));

        return HistoricData::where('dataEndsAtDate', request(d));
        // //From: https://github.com/36864/Event-Sourced-Task-Lists/blob/b0bc7cc7dc04cffe3a3ea1f3a8a9c1706bde13ce/app/Http/Controllers/History/Controller.php#L27
        // $projector = Projectionist::addProjector(HistoryProjector::class)->getProjector(HistoryProjector::class);
        // $projector->reset();
        // $projector->setTargetEndDate(request('d'));
        // Projectionist::replay(collect([$projector]));

        // return Session::get('beers', collect());
    }
}
