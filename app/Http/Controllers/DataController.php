<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bar;
use App\Beer;
use Carbon\Carbon;
use App\HistoricData;

class DataController extends Controller
{
    public function index(Request $request)
    {
        
        $data = HistoricData::where('dataEndsAtDate', Carbon::parse(request('date'))->endOfDay())->first()->data;

        // dump($data);

        $bars = collect($data['bars'])
             ->sortby('name');


        $beers = collect($data['beers'])
                ->sortByDesc('totalBars')
                ->values();

        return compact('beers', 'bars');
    }
}
