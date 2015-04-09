@extends('parents.master')

@section('content')
    @include('partials.messages')
    @include('partials.userlist')
    @if(Auth::user()->can('approve.users'))
        <div class="row">
            <div class="col s5">
                <a href="{{url('users/unapproved')}}"
                    class="btn waves-effect waves-light">
                    <i class="mdi-action-search medium left"></i>
                    Visualizza utenti da approvare
                </a>
            </div>
    @endif
    @if(Auth::user()->can('create.users'))

            <div class="col offset-s4 s3">
                <a href="{{url('users/add')}}"
                   class="btn waves-effect waves-light">
                    <i class="mdi-content-add-box medium right"></i>
                    Aggiungi
                </a>
            </div>
        </div>
    @endif
@endsection