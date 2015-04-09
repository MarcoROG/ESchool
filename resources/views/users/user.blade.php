@extends('parents.resource')

@section('title')
    <h3>{{$user->present()->full_name}}</h3><i class=""></i>
    <h5>{{$user->roles()->first()->name}}</h5>
@endsection
@section('actions')
    <div class="col offset-s1 s1">
        <a href="{{url('messages/'.Hashids::encode($user->id).'/send')}}">
            <i class="mdi-content-mail small tooltipped eventful"
               data-position="top" data-delay="50" data-tooltip="Invia un messaggio"></i>
        </a>
    </div>
    @if(!$user->approved && Auth::user()->can('approve.users')&& Auth::user()->id!=$user->id)
        <form id="approve" role="form" method="POST" action="{{url('users/'.Hashids::encode($user->id).'/approve/1')}}">
            <input type="hidden" name="_method" value="patch">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col s1">
                <a href="#" onclick="document.getElementById('approve').submit()">
                    <i class="mdi-action-done small tooltipped eventful"
                       data-position="top" data-delay="50" data-tooltip="Approva utente"></i>
                </a>
            </div>
        </form>
        <form id="unapprove" role="form" method="POST" action="{{url('users/'.Hashids::encode($user->id).'/approve/0')}}">
            <input type="hidden" name="_method" value="patch">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col s1">
                <a href="#" onclick="document.getElementById('unapprove').submit()">
                    <i class="mdi-content-clear small tooltipped eventful"
                       data-position="top" data-delay="50" data-tooltip="Rifiuta utente"></i>
                </a>
            </div>
        </form>
    @endif
    @if(Auth::user()->can('edit.users') || Auth::user()->id==$user->id )
        <div class="col s1">
            <a href="{{url('users/'.Hashids::encode($user->id).'/edit')}}">
                <i class="mdi-image-edit small tooltipped eventful"
                   data-position="top" data-delay="50" data-tooltip="Modifica utente"></i>
            </a>
        </div>
        @endif
@endsection
@section('info')
    <div class="row">
        <div class="col offset-s1 s1">
            <i class="mdi-social-cake small"></i>
        </div>
        <div class="col s9">
            <p class="valign">{{$user->present()->recurrent_birthday}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col offset-s1 s1">
            <i class="mdi-social-location-city small"></i>
        </div>
        <div class="col s9">
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
@endsection