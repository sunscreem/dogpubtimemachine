<?php

namespace App\Http\Controllers;

use App\Bar;
use Illuminate\Http\Request;

class SystemStatusController extends Controller
{
    public function index()
    {
        $totalBrewdogBars = Bar::count();

        $lastBar = Bar::orderBy('updated_at', 'desc')->first();

        $lastBarChecked = $lastBar->updated_at->diffForHumans() . ' (' . $lastBar->name . ')';

        $totalBarsCheckedInTwoHours = Bar::where('updated_at', '>', now()->subHours(2))->count();

        $totalBarUpdatedTapListInLastThreeDays = Bar::where('tap_list_last_updated', '>', now()->subDays(3))->count();

        $barsNotShowingTapLists = Bar::whereNull('tap_list_last_updated')->where('tap_list_last_updated', '>', now()->subDays(3))->get()->pluck('name')->toArray();

        $barsNotShowingTapLists = join(', ', $barsNotShowingTapLists);

        if (!$barsNotShowingTapLists) {
            $barsNotShowingTapLists = '-';
        }

        return compact(
                        'totalBrewdogBars',
                        'lastBarChecked',
                        'totalBarsCheckedInTwoHours',
                        'totalBarUpdatedTapListInLastThreeDays',
                        'barsNotShowingTapLists'
        );
    }
}
