@extends('parents.master')

@section('content')
    @include('partials.messages')
    @include('partials.yearlist')
    @if(Auth::user()->can('create.schoolyears'))
        <div class="col offset-s4 s3">
            <a href="{{url('schoolyears/add')}}"
            class="btn waves-effect waves-light">
                <i class="mdi-content-add-box medium right"></i>
                Aggiungi
            </a>
        </div>
    @endif
@endsection