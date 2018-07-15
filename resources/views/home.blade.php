@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mt-3 ">Dog Pub Time Machine</h1>
    <h6 class="text-center mb-4">Right now there are {{ $totalBeers }} beers on tap across {{ $totalBars }} Brewdog bars!</h6>
    

    <time-machine></time-machine>

    <div class="card">
        <div class="card-header">
            What on earth IS THIS?!
        </div>
        <div class="card-body">
        <p>If you are wondering what this is, who made it and why then you are in luck:</p>
        <p><a href="https://github.com/sunscreem/dogpubtimemachine/tree/master#what-is-this">Head on over here</a> for all the details.</p>
        </div>
    </div>
    
</div>

@endsection
