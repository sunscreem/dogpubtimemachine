@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="post" action="{{ route('admin.bar.store') }}">
                {{csrf_field()}}
                <div class="card">
                    <div class="card-header">
                        <h5>Add a new bar</h5>
                    </div>
                    <div class="card-body">
                        
                        @include('admin.partials.alerts')

                        @include('admin.bar.edit-bar-form')
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="form-control">Create New Bar</button>
                    </div>       
                </div>
            </form>
        </div>
    </div>
</div>
@endsection