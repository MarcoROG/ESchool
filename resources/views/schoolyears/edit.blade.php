@extends('parents.master')

@section('content')
    <div class="card-panel">
        <form  role="form" method="POST" action="{{url('schoolyears/'.Hashids::encode($year->id).'/edit')}}" >
            <div class="row">
                <div class="col offset-s2 s8">
                    <h3>Modifica di un anno scolastico</h3>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="patch">
            @include('partials.messages')
            <div class="row">
                <div class="col offset-s1 s10">
                    <h5>Informazioni</h5>
                </div>
            </div>
            <div class="row">
                {{--Inizio primo quadrimestre--}}
                <div class="input-field col s5 offset-s1">
                    <i class="mdi-action-event prefix"></i>
                    <input type="text" name="first_day_first_semester" id="first_day_first_semester" maxlength="30"
                           class="validate" value="{{old('first_day_first_semester',$year->first_day_first_semester->format('d/m/Y'))}}">
                    <label for="first_day_first_semester">Inizio primo quadrimestre:</label>
                </div>
            </div>
            <div class="row">
                {{--Fine primo quadrimestre--}}
                <div class="input-field col s5 offset-s1">
                    <i class="mdi-action-event prefix"></i>
                    <input type="text" name="last_day_first_semester" id="last_day_first_semester" maxlength="30"
                           class="validate" value="{{old('last_day_first_semester',$year->last_day_first_semester->format('d/m/Y'))}}">
                    <label for="last_day_first_semester">Fine primo quadrimestre:</label>
                </div>
            </div>
            <div class="row">
                {{--Inizio secondo quadrimestre--}}
                <div class="input-field col s5 offset-s1">
                    <i class="mdi-action-event prefix"></i>
                    <input type="text" name="first_day_second_semester" id="first_day_second_semester" maxlength="30"
                           class="validate" value="{{old('first_day_second_semester',$year->first_day_second_semester->format('d/m/Y'))}}">
                    <label for="first_day_second_semester">Inizio secondo quadrimestre:</label>
                </div>
            </div>
            <div class="row">
                {{--Fine secondo quadrimestre--}}
                <div class="input-field col s5 offset-s1">
                    <i class="mdi-action-event prefix"></i>
                    <input type="text" name="last_day_second_semester" id="last_day_second_semester" maxlength="30"
                           class="validate" value="{{old('last_day_second_semester',$year->last_day_second_semester->format('d/m/Y'))}}">
                    <label for="last_day_second_semester">Fine secondo quadrimestre:</label>
                </div>
            </div>
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
                        Modifica anno scolastico
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection