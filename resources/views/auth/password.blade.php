@extends('parents.master')

@section('content')
    <div class="card-panel ">
        <div class="row">
            <div class="col offset-s1 s10">
                <h4>Reset della password</h4>
            </div>
        </div>
        @if (session('status'))
            <div class="row">
                <div class="col s10 offset-s1">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        @include('partials.messages')
        <form role="form" method="POST" action="/password/email">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="input-field col s10 offset-s1">
                    <i class="mdi-communication-email prefix"></i>
                    <input type="email" class="validate" name="email" id="email" value="{{ old('email') }}">
                    <label for="email">Indirizzo email</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col offset-s1 s5">
                    <a class="btn" href="{{url('auth/login')}}"><i class="medium mdi-navigation-arrow-back left"></i> Torna indietro</a>
                </div>
                <div class="input-field col s6">
                    <button type="submit" class="btn waves-effect waves-light" name="action">
                        Manda il reset della password.
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
