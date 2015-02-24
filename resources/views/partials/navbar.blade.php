
<div class="navbar-fixed" style="margin-bottom: 50px">
            <nav>
                <div class="nav-wrapper red darken-3">
                    <a href="{{url('/')}}" class="brand-logo left">
                    @if(file_exists('images/logo.png'))
                        <img width="150" height="50" src="{{asset('images/logo.png')}}">
                    @else
                        <img width="150" height="50" src="{{asset('images/default.png')}}">
                    @endif
                    </a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down ">
                        <a href="{{action('UserController@showAll')}}"><li>Utenti</li></a>
                        <a href="#"><li>Voce 2</li></a>
                        <a href="#"><li>Voce 3</li></a>
                        <a href="{{url('/auth/login')}}"><li>Accedi</li></a>
                    </ul>
                </div>
            </nav>
</div>