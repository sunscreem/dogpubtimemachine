<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bar;
use App\Beer;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $bars = Bar::select('name', 'uuid')
            ->orderBy('name')
            ->get();

        $beers = Beer::select('name', 'brewery', 'uuid')
            ->get()
            ->sortByDesc('totalBars')
            ->values();

        return compact('beers', 'bars');
    }
}
