<?php

namespace App\Http\Controllers;

use App\Beer;

class BarController extends Controller
{
    public function hasBeer(Beer $beer)
    {
        return $beer->bars()->orderBy('name')->get()->map(function ($bar) {
            $lastChecked = ($bar->updated_at ? $bar->updated_at->diffForHumans() : '-');
            $tapListLastUpdate = ($bar->tap_list_last_updated ? $bar->tap_list_last_updated->diffForHumans() : '-');

            return [
                'name'                     => $bar->name,
                'lastChecked'              => $lastChecked,
                'tapListLastUpdated'       => $tapListLastUpdate,
                'brewdog_site_listing_url' => $bar->bar_url,
            ];
        });
    }
}
