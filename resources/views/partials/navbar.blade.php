
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
                        <a href="{{url('users')}}"><li>Utenti</li></a>
                        <a href="#"><li>Voce 3</li></a>
                        @if(Auth::Check())
                            <a href="{{url('users/'.Auth::user()->id.'/profile')}}"><li>Profilo</li></a>
                            <a href="{{url('/auth/logout')}}"><li>Logout</li></a>
                        @else
                            <a href="{{url('/auth/login')}}"><li>Accedi</li></a>
                        @endif
                    </ul>
                </div>
            </nav>
</div>