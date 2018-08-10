@foreach (['danger', 'warning', 'success', 'info'] as $key)
    @if(Session::has($key))
        <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
    @endif
@endforeach

@if (count($errors) > 0)
    <div class="alert alert-danger">
        Hmm - there is a problem:
        <ul>
            @foreach ($errors->all() as $message) 
               <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif