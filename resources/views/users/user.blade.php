@extends('parents.master')

@section('content')

    <div class="card-panel z-depth-2">
        <div class="row">
            <div class="col offset-s1 s7">
                <h3>{{$user->fullName()}}</h3><i class=""></i> <br>
                <h5>{{$user->roles()->first()->name}}</h5>
            </div>
            <div class="col s1">
                <a href="{{url('messages/'.$user->id.'/send')}}">
                <i class="mdi-content-mail small tooltipped eventful"
                   data-position="top" data-delay="50" data-tooltip="Invia un messaggio"></i>
                </a>
            </div>
            @if(Auth::user()->is('secretary') )
                @if(!$user->approved)
                <form id="activate" role="form" method="POST" action="{{url('users/'.$user->token.'/approve')}}">
                    <input type="hidden" name="_method" value="patch">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col s1">
                        <a href="#" onclick="document.getElementById('activate').submit()">
                        <i class="mdi-action-done small tooltipped eventful"
                           data-position="top" data-delay="50" data-tooltip="Approva utente"></i>
                        </a>
                    </div>
                </form>
                @endif
                <div class="col s1">
                    <a href="{{url('users/'.$user->id.'/edit')}}">
                        <i class="mdi-image-edit small tooltipped eventful"
                           data-position="top" data-delay="50" data-tooltip="Modifica utente"></i>
                    </a>
                </div>
            @endif
        </div>
        @include('partials.messages')
        <div class="row">
            <div class="col offset-s1 s1">
                <i class="mdi-social-cake small"></i>
            </div>
            <div class="col s9 valign">
                <p class="valign">{{$user->getBirthday()}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col offset-s1 s1">
                <i class="mdi-social-location-city small"></i>
            </div>
            <div class="col s9 valign">
                <p class="valign">{{$user->birth_place}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col offset-s1 s1">
                <i class="mdi-action-home small"></i>
            </div>
            <div class="col s9">
                <p class="valign">{{$user->address}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col offset-s1 s1">
                <i class="mdi-communication-call small"></i>
            </div>
            <div class="col s9">
                <p class="valign">{{$user->telephone}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col offset-s1 s1">
                <i class="mdi-hardware-smartphone small"></i>
            </div>
            <div class="col s9">
                <p class="valign">{{$user->mobile}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col offset-s8 s3">
                <a href="{{url('users/approve')}}"></a>
            </div>

        </div>
    </div>
@endsection