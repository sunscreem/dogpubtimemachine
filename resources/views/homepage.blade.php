@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between">
        <span>
            <h1 class="mt-3">Dog Pub Time Machine</h1>
        </span>
        <span class="text-right">
            {{-- <date-change></date-change> --}}
        </span>
    </div>

    <div class="d-flex justify-content-between">
        <span>
            <h6>What beers are on tap in Brewdog bars?</h6>
        </span>
        <span class="text-right">
            <h6 class="text-center">Right now there are {{ $totalBeers }} beers on tap across {{ $totalBars }} Brewdog bars!</h6>
        </span>
    </div>
    
    <time-machine></time-machine>

    <div class="card shadow">
        <div class="card-header">
            What on earth is this?!
        </div>
        <div class="card-body">
        <p>If you are wondering what this is, who made it and why then you are in luck:</p>
        <p><a href="https://github.com/sunscreem/dogpubtimemachine/tree/master#what-is-this">Head on over here</a> for all the details.</p>
        </div>
    </div>
    
</div>

@endsection
