<?php

namespace App\Http\Controllers;

use App\Beer;
use Illuminate\Http\Request;

class BarController extends Controller
{
    public function hasBeer(Beer $beer)
    {
        return $beer->bars()->get();
    }
}
