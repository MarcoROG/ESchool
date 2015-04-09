@extends('parents.master')

@section('content')
    <div class="card-panel z-depth-2">
        <div class="row">
            <div class="col offset-s1 s11">
                @yield('title')
            </div>
        </div>
        <div class="row">
            @yield('actions')
        </div>
        @include('partials.messages')
        <div class="row">
            @yield('info')
        </div>
    </div>
@endsection