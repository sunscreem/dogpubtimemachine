@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="text-center mt-3 mb-4">Dog Pub Time Machine</h1>

    <time-machine></time-machine>

    <div class="card">
        <div class="card-header">
            Here's some info.
        </div>
        <div class="card-body">
            <a href="https://github.com/sunscreem/dogpubtimemachine"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>
            <h4>What Is This?</h4>
            <p>The idea is to be able to show you what beers are currently available in which brewdog bars.</p> 
            <p>Hopefully this will lead to showing some cool stats.</p>
            <h4>Who is making this crap?</h4>
            <p>That will be me - <a href="https://twitter.com/sunscreem">Robert Cooper</a> - the bloke from the podcast. Anything you want to talk about - email me <a href="mailto:sunscreem@gmail.com">sunscreem@gmail.com</a></a></p>
            <h4>Why is called a "Time Machine?"</h4>
            <p>The idea is you'll be able to wind back the clock and see what bars had what beer on in the past.</p>
            <p>Obviously thats not working yet.</p>
            <h4>It looks awful - is there some sort of to-do list for fixing it?</h4>
            <p>Indeed - this is an open source project. The to-do list and known bugs are <a href="https://github.com/sunscreem/dogpubtimemachine/issues">right here</a>.</p>
            <h4>The beers/pubs look wrong? Whats going on?</h4>
            <p>To say this was thrown together in an afternoon would be very accurate. Bear with me... it will get better. Hopefully.</p>
            <h4>Did this take you long?</h4>
            <p>A day. I woke up and thought .. screw it .. lets just get it done. If you like it too .. well.. you can always <a href="https://buyrobabeer.com">buyrobabeer.com</a>.</p>
        </div>
    </div>
    
</div>

@endsection
