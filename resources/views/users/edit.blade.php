@extends('parents.master')

@section('content')
    <div class="card-panel">
        <form  role="form" method="POST" action="{{url('users/'.$user->token.'/edit')}}" >
            <div class="row">
                <div class="col offset-s2 s8">
                    <h2>Modifica di un utente</h2>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="patch">
            @include('partials.messages')
            <div class="row">
                <div class="col offset-s1 s10">
                    <h5>Informazioni personali</h5>
                </div>
                {{--Nome--}}
                <div class="input-field col s5 offset-s1">
                    <i class="mdi-social-person prefix"></i>
                    <input type="text" name="name" id="name" maxlength="30" class="validate" value="{{old('name')?old('name'):$user->name }}">
                    <label for="name">Nome</label>
                </div>
                {{--Secondo nome--}}
                <div class="input-field col s5 ">
                    <i class="mdi-social-person prefix"></i>
                    <input type="text" name="middle_name" id="middle_name" maxlength="30" class="validate" value="{{old('middle_name')?old('middle_name'):$user->middle_name }}">
                    <label for="middle_name">Secondo nome</label>
                </div>
                {{--Cognome--}}
                <div class="input-field col s5 offset-s1">
                    <i class="mdi-social-person prefix"></i>
                    <input type="text" name="surname" id="surname" maxlength="30" class="validate" value="{{old('surname')?old('surname'):$user->surname }}">
                    <label for="surname">Cognome</label>
                </div>
            </div>

            <div class="row">
                {{--Data di nascita--}}
                <div class="input-field col s5 offset-s1">
                    <i class="mdi-action-event prefix"></i>
                    <input type="text" class="datepicker picker__input" name="birth_day" id="birth_day" value="{{old('birth_day')?old('birth_day'):$user->birth_day }}">
                    <label for="birth_day">Giorno di nascita</label>
                </div>
                {{--Luogo di nascita--}}
                <div class="input-field col s5 ">
                    <i class="mdi-social-location-city prefix"></i>
                    <input type="text"  name="birth_place" id="birth_place" value="{{old('birt_place')?old('birth_place'):$user->birth_place }}">
                    <label for="birth_place">Luogo di nascita</label>
                </div>
            </div>
            {{--Sesso--}}
            <div class="row">
                <div class="col s3 offset-s1">
                    Sesso:
                </div>
                <div class="input-field col s3 offset-s1">

                    <input type="radio" name="gender" id="Male" value="M" <?php $g=old('gender')?old('gender'):$user->gender; if($g=="M"){echo 'checked="checked"';} ?>>
                    <label for="Male">Maschio</label>
                </div>
                <div class="input-field col s3 offset-s1">
                    <input type="radio" name="gender" id="Female" value="F" <?php $g=old('gender')?old('gender'):$user->gender; if($g=="F"){echo 'checked="checked"';} ?>>
                    <label for="Female">Femmina</label>
                </div>
            </div><br>
            {{--Religione--}}
            @if($mode=='secretary')
            <div class="row">
                <div class="col s3 offset-s1">
                    Religione:
                </div>
                <div class="col offset-s1 s7">
                    <input type="checkbox" id="catholic" name="catholic" <?php if($user->catholic){echo 'checked="checked"';} ?>>
                    <label for="catholic">Si avvale dell'insegnamento della religione cattolica</label>
                </div>
            </div>
            @endif
            <br>
            <div class="row">
                <div class="col offset-s1 s10">
                    <h5>Informazioni di recapito</h5>
                </div>
                {{--Indirizzo--}}
                <div class="input-field col offset-s1 s10">
                    <i class="mdi-action-home prefix"></i>
                    <input type="text" name="address" id="address" value="{{old('address')?old('address'):$user->address }}">
                    <label for="address">Indirizzo</label>
                </div>
                {{--Email--}}
                <div class="input-field col offset-s1 s10">
                    <i class="mdi-content-mail prefix"></i>
                    <input type="email" name="email" id="email" class="validate" value="{{old('email')?old('email'):$user->email }}">
                    <label for="email">Email</label>
                </div>
                @if($mode=='auto')
                    {{--Password--}}
                    <div class="input-field col offset-s1 s10">
                        <i class="mdi-communication-vpn-key prefix"></i>
                        <input type="password" name="password" id="password" class="validate" >
                        <label for="password">Password</label>
                    </div>
                    {{--Conferma password--}}
                    <div class="input-field col offset-s1 s10">
                        <i class="mdi-communication-vpn-key prefix"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="validate">
                        <label for="password_confirmation">Conferma password</label>
                    </div>
                @endif
                {{--Fisso--}}
                <div class="input-field col offset-s1 s5">
                    <i class="mdi-communication-call prefix"></i>
                    <input type="tel" name="telephone" id="telephone" class="validate" value="{{old('telephone')?old('old_telephone'):$user->telephone }}">
                    <label for="telephone">Numero di telefono domestico</label>
                </div>
                {{--Cellulare--}}
                <div class="input-field col s5">
                    <i class="mdi-hardware-smartphone prefix"></i>
                    <input type="tel" name="mobile" id="mobile" class="validate" value="{{old('mobile')?old('mobile'):$user->mobile }}">
                    <label for="mobile">Numero di telefono cellulare</label>
                </div>
            </div>
            <br>
            <div class="row">
                {{--Reset--}}
                <div class="col offset-s1 s4">
                    <button class="btn waves-effect waves-light" type="reset" name="reset">
                        <i class="mdi-content-undo left"></i>
                        Resetta campi
                    </button>
                </div>
                {{--Submit--}}
                <div class="col offset-s3 s4">
                    <button class="btn waves-effect waves-light" type="submit">
                        <i class="mdi-content-send right"></i>
                        Modifica utente
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection