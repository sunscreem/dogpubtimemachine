@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-header">Bars Data Status</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Bar
                            </th>
                            <th>
                                Location
                            </th>
                            <th>
                                Beers On Tap
                            </th>
                            <th>
                                Last Changed
                            </th>
                            <th>
                                Last Checked
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bars as $bar)
                            <tr>
                                <td scope="row">
                                    <a href="{{ $bar->bar_url }}" target="_blank">{{ $bar->name }}</a>
                                </td>
                                <td>
                                    {{ $bar->territory }}
                                </td>
                                <td>
                                    @if($bar->tap_list_last_updated)
                                        {{ $bar->beers_count ?: '-' }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ optional($bar->tap_list_last_updated)->diffForHumans() ?: '-' }}
                                </td>
                                <td class="text-muted">
                                    {{ optional($bar->updated_at)->diffForHumans() }}
                                </td>
                                    
                                <td>
                                @if(!$bar->beers_count |! $bar->tap_list_last_updated)
                                        <span class="badge badge-danger text-large text-uppercase">Offline</span> 

                                @elseif($bar->tap_list_last_updated->lessThan(now()->subDays(3)))
                                        <span class="badge badge-warning text-large text-uppercase">Stale</span> 

                                @else
                                        <span class="badge badge-success text-large text-uppercase">Good</span> 
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection