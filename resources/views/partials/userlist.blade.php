@forelse($users as $u)
    <div class="card-panel">
        <a href="{{url('users/'.$u->id.'/profile')}}">
            {{$u->fullName()}}
        </a>
    </div>
@empty
    <div class="card-panel">
        Non è stato trovato nessun utente.
    </div>
@endforelse