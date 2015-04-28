@extends('parents.resource')

@section('title')
    <h4>{{$y->present()->nice_name}}</h4>
@endsection

@section('actions')
    @if(Auth::user()->can('edit.schoolyears'))
    <div class="row">
        <div class="col offset-s1 s1">
            <a href="{{url('schoolyears/'.Hashids::encode($y->id).'/edit')}}">
                <i class="mdi-image-edit small tooltipped eventful"
                   data-position="top" data-delay="50" data-tooltip="Modifica anno scolastico"></i>
            </a>
        </div>
    </div>
    @endif
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