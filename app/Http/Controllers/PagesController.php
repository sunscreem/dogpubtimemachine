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

        // return view('home', compact('totalBeers', 'totalBars'));
    }

    public function beerSelected($id)
    {
        // $beerSelected = Beer::findOrFail($id);

        // return view('home', compact('beerSelected'));
    }
}
