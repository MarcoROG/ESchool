@extends('parents.master')
@section('content')
    <div class="card-panel">
        <form  role="form" method="POST" action="/auth/login" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <h3 class="offset-s1 col s10">Login</h3>
            </div>
            @include('partials.errors-section')
            <div class="row">
                <div class="input-field col s10 offset-s1 " >
                    <input type="email" class="validate" id="email" name="email" value="{{ old('email') }}">
                    <label for="email">Indirizzo email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10 offset-s1">
                    <input type="password" class="validate" id="password" name="password" >
                    <label for="password">Password</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s8 offset-s1">
                    <input type="checkbox" name="remember" id="remember" >
                    <label for="remember">Ricordami</label><br>
                </div>

                <div class="input-field col s3">
                    <button class="btn waves-effect waves-light " type="submit" name="action">
                        Accedi
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col offset-s1 s10">
                <a  href="/password/email">Password dimenticata?</a>
                </div>
            </div>
        </form>
    </div>
@endsection



