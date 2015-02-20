@if (count($errors) > 0)
    <div class="row">
        <div class="offset-s1 col s10 card darken-2 z-depth-2">
            <ul class="collection with-header">
                <li class="collection-header"><h5>Ops! Sembrerebbe tu abbia commesso degli errori!</h5></li>
                @foreach ($errors->all() as $error)
                    <li class="collection-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif