@extends('parents.master')
@section('content')
    @for($i=0;$i<5;$i++)
        <div class="card-panel teal lighten-4 z-depth-1 ">1</div>
        <div class="card-panel teal lighten-2 z-depth-2">2</div>
        <div class="card-panel teal  z-depth-3">3</div>
    @endfor
@endsection
