@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="post" action="{{ route('admin.bar.update',$bar->id) }}">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <div class="card">
                    <div class="card-header">
                        <h5>Editing Details For {{ $bar->name }}</h5>
                    </div>
                    <div class="card-body">
                        @foreach (['danger', 'warning', 'success', 'info'] as $key)
                            @if(Session::has($key))
                                <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                            @endif
                        @endforeach
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                Validation Fails
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-4">
                                <label for="barname">Bar Name:</label> 
                                <input type="text" name="name" class="form-control" id="barname" value="{{ old('name',$bar->name) }}">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="form-control">Save Changes</button>
                    </div>       
                </div>
            </form>
        </div>
    </div>
</div>
@endsection