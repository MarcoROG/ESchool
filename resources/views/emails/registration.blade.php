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
<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="/auth/register">
        <input type="hidden" name="_method" value="patch">
        <div class="row">
            <div class="col s10 offset-s1 " align="center">
                Sei ora registrato al sito per la didattica digitale della tua scuola! <br>
                Prima di poterlo usare, tuttavia, dovrai attivare il tuo account cliccando sul pulsante sottostante.
            </div>
        </div>
        <div class="row">
            <a href="{{url('users/'.$token.'/verify')}}" class="col s4 offset-s4 center-align btn waves-effect waves-light"><i class="mdi-action-launch right"></i> Attiva il tuo account!</a>
        </div>
    </form>
</div>
</body>
</html>