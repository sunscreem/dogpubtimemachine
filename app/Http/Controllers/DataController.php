<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\HistoricData;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $data = HistoricData::where('dataEndsAtDate', Carbon::parse(request('date'))->endOfDay())->first()->data;

        $bars = collect($data['bars'])
             ->sortby('name')
             ->values();

        $beers = collect($data['beers'])
                ->sortByDesc('bars_count')
                ->map(function ($beer) {
                    $beer['barUUIDs'] = collect($beer['barUUIDs'])->values();

                    return $beer;
                })
                ->values();

        return compact('beers', 'bars');
    }
}
