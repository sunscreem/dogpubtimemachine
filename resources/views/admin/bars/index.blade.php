@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @foreach($bars as $bar)
                        <div>
                            <a href="{{ route('admin.bar.edit',$bar->id) }}">{{ $bar->name }}</a>
                        </div>
                    @endforeach
                </div>
             
            </div>
        </div>
    </div>
</div>
@endsection