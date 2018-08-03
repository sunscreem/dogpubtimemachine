<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Bar;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function bars()
    {
        $bars = Bar::orderBy('name')->get();

        return view('admin.bars.index')->with(compact('bars'));
    }

    // public function edit(Bar $bar)
    // {
    //     return view('admin.bar.edit')->with(compact('bar'));
    // }
}
