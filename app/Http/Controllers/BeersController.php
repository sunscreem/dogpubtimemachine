<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;

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

        if (request('d')) {
            $beers = $this->fetchBeersForDate();
        }

        // dd($beers->toArray());
        return $beers->filter(function ($value) {
            return $value->totalBars;
        })
            ->sortByDesc('totalBars')
            ->values();
    }

    public function fetchBeersForDate()
    {
    }
}
