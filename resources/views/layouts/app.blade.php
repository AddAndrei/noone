<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/my.css") }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->



</head>

<body class="antialiased">

        <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Eighth navbar example">
            <div class="container">
                <a class="navbar-brand" href="#">Тредиум</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse flex-grow-0" id="navbarsExample07">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link @if(Route::current()->getName() == "main.index") active @endif"
                               aria-current="page" href="{{ route("main.index") }}">На главную</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  @if(Route::current()->getName() == "articles.index") active @endif"
                               href="{{ route("articles.index") }}">Каталог статей</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


    @yield('content')
        <footer class="footer">
            <div class="container">
                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1">
                    <div class="col">
                        <h2>Тредиум</h2>
                        &#169; 3001-3020 все права защищены
                    </div>
                    <div class="col">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li class="nav-item">
                                <a class="nav-link"
                                   aria-current="page" href="#">Блог</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="#">Как перестать прокастринировать и начать жить</a>
                            </li>


                        </ul>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </footer>
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
</body>
</html>

