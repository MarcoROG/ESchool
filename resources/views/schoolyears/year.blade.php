@extends('parents.resource')

@section('title')
    <h4>{{$y->present()->nice_name}}</h4>
@endsection

@section('actions')
@endsection

@section('info')
    <div class="row">
        <div class="col offset-s1 s1">
            <i class="mdi-action-event small"></i>
        </div>
        <div class="col s9">
            <p class="valign">Primo quadrimestre: {{$y->present()->first_term}} </p>
        </div>
    </div>
    <div class="row">
        <div class="col offset-s1 s1">
            <i class="mdi-action-event small"></i>
        </div>
        <div class="col s9">
            <p class="valign">Secondo quadrimestre: {{$y->present()->second_term}} </p>
        </div>
    </div>
@endsection