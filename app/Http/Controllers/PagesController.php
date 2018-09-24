<?php

namespace App\Http\Controllers;

use App\Bar;
use App\Beer;
use Artisan;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $bars = Bar::select('name', 'uuid')
                ->orderBy('name')
                ->get();

        $beers = Beer::select('name', 'brewery', 'uuid')
                       ->get()
                        ->filter(function ($value) {
                            return $value->totalBars;
                        })
                       ->sortByDesc('totalBars')
                       ->values();
     
        $initialData = ['beers' => $beers,
                        'bars' => $bars];

        return view('homepage', compact('initialData'));
    }

    public function beerSelected($id)
    {
        $beerSelected = Beer::findOrFail($id);

        return view('homepage', compact('beerSelected'));
    }
}
