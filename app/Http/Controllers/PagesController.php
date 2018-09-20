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
        // $totalBars = Bar::count();

        // $totalBeers = Beer::all()->filter(function ($value) {
        //     return $value->totalBars;
        // })->count();

        $bars = Bar::select('name', 'uuid')
                ->orderBy('name')
                ->get();

        // ->keyBy('uuid');
        //  ->all();

        $beers = Beer::select('name', 'brewery', 'uuid')
                       ->get()
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
