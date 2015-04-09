@forelse($years as $y)
    <a href="{{url('schoolyears/'.Hashids::encode($y->id))}}">
        <div class="card-panel">
            {{$y->present()->nice_name}}
        </div>
    </a>
@empty
    <div class="card-panel">
        Non è stato trovato nessun anno scolastico.
    </div>
@endforelse