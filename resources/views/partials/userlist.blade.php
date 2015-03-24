@forelse($users as $u)
    <a href="{{url('users/'.$u->id.'/profile')}}">
        <div class="card-panel">
            {{$u->fullName()}}
        </div>
    </a>
@empty
    <div class="card-panel">
        Non è stato trovato nessun utente.
    </div>
@endforelse