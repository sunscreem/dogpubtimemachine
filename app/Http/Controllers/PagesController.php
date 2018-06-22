<?php

namespace App\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
