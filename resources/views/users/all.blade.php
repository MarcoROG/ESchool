@extends('parents.master')

@section('content')
    @include('partials.messages')
    @forelse($users as $u)
        <div class="card-panel">
            {{$u->name}}
        </div>
    @empty
        <div class="card-panel">
            Non è stato trovato nessun utente.
        </div>
    @endforelse
    @if(Auth::user() instanceof \App\Users\Secretary)
        <div class="row">
            <div class="col offset-s9 s3">
                <a href="{{action('UserController@showSubscriptionInterface')}}"
                   class="btn-large waves-effect waves-light">
                    <i class="mdi-content-add-box medium right"></i>
                    Aggiungi utenti
                </a>
            </div>
        </div>
    @endif
@endsection