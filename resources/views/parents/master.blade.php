<!doctype html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>eSchool</title>

        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.css')}}"  media="all"/>
        <link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}"  media="all"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </head>
    <body>
        @include('partials.navbar')
        <div class="container">
            @yield('content')
        </div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="{{asset('js/materialize.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/app.min.js')}}"></script>
    </body>
</html>