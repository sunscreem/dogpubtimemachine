@extends('layouts.app')

@section('content')

<time-machine :initial-data="{{ json_encode($initialData) }}" :time-machine-starts-date="'{{ config('site.timeMachineStartDate') }}'"></time-machine>

@endsection
