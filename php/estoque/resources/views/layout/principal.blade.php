{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport"--}}
          {{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="/css/materialize.min.css">--}}
    {{--<link rel="stylesheet" href="/css/app.css">--}}
    {{--<title>Listagem de Produtos</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
    {{--@yield('conteudo')--}}
{{--</div>--}}
{{--<script src="/js/materialize.min.js"></script>--}}
{{--<script src="/js/app.js"></script>--}}

{{--</body>--}}
{{--</html>--}}

<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <script type="text/javascript" src="/js/app.js"></script>
    <title>Controle de estoque</title>
</head>
<body>
<ul class="nav navbar-nav navbar-right">

</ul>
<div class="container">

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="/produtos">Estoque Laravel</a>
            </div>
            @if (!Auth::guest())
            <ul class="nav navbar-nav">
                <li><a href="/produtos">Listagem</a></li>
            </ul>

            <ul class="nav navbar-nav">
                <li><a href="/produtos/novo">Adicionar</a></li>
            </ul>
            @endif

            @if (Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="/login" >Login</a></li>
                </ul>
            @else
                <div>
                    <a href="#" class="dropdown-toggle" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item bg-menu" href="/logout">Logout</a>
                    </div>
                </div>
            @endif

        </div>
    </nav>

    @yield('conteudo')

    <footer class="footer">
        <p>© Curso de Laravel do Alura.</p>
    </footer>

</div>
</body>
</html>