<?php

namespace App\Http\Controllers;

use App\Bar;
use App\Beer;

class PagesController extends Controller
{
    public function index()
    {
        // \DB::listen(function ($sql,$bindings,$time) {
        //     var_dump($sql);
        //     var_dump($time);
        // });

        $bars = Bar::select('name', 'uuid', 'tap_list_last_updated', 'bar_url')
                ->orderBy('name')
                ->get();

        $beers = Beer::select('name', 'brewery', 'uuid')
                        ->withCount('bars')
                        ->having('bars_count', '>', 0)
                       ->get()
                       ->sortByDesc('bars_count')
                       ->values();

        $initialData = ['beers' => $beers,
                        'bars'  => $bars, ];

        // $initialData = null;

        return view('homepage', compact('initialData'));
    }

    public function beerSelected($id)
    {
        $beerSelected = Beer::findOrFail($id);

        return view('homepage', compact('beerSelected'));
    }
}
