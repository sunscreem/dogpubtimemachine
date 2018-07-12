<?php

namespace App\Http\Controllers;

use App\Beer;
use Artisan;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index()
  {
    return view('home');
  }

  public function beerSelected($id)
  {
    $beerSelected      = Beer::findOrFail($id);

    return view('home', compact('beerSelected'));
  }
}
