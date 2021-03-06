@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="post" action="{{ route('admin.bar.update',$bar->uuid) }}">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <input type="hidden" name="uuid" value="{{ $bar->uuid }}" >
                <div class="card">
                    <div class="card-header">
                        <h5>Editing Details For {{ $bar->name }}</h5>
                    </div>
                    <div class="card-body">

                        
                        @include('admin.partials.alerts')
                        
                        @include('admin.bar.edit-bar-form')
                    
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