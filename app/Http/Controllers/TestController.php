<?php

namespace App\Http\Controllers;

use Artisan;
use Session;
use Illuminate\Http\Request;
use App\Projectors\HistoryProjector;
use Spatie\EventProjector\Facades\Projectionist;

class TestController extends Controller
{
    public function index()
    {
        dump('started', Session::all());

        dump('finished', Session::all());
    }
}
