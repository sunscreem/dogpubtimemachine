@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    @include('admin.partials.alerts')
                    
                    <div class="row">
                        @foreach($bars as $bar)
                            <div class="col-3">
                                <a href="{{ route('admin.bar.edit',$bar->uuid) }}">{{ $bar->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('admin.bar.create') }}" class="btn btn-primary">Add A New Bar</a>
                </div>
             
            </div>
        </div>
    </div>
</div>
@endsection