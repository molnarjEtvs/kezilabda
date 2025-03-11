<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body>
    <div class="container-fluid bg-dark text-white">
        <div class="row">
            <div class="col-12">
                <div class="py-3">
                    <h1 class="text-center">KÉZILABDA CSAPATOK</h1>
                </div>
            </div>
        </div>
    </div>

    <nav>

        <a href="">Bárki</a>

        <!-- Ezeknek a menüknek csak akkor kell megjelennie ha ba vagyok lépve -->
        @if (Auth::check())
        <a href="">User menü 1</a>
        <a href="">User menü 2</a> 
        @endif
       
        <!-- Ezeknek a menüknek csak akkor kell megjelennie ha ba vagyok lépve ÉS ADMIN VAGYOK -->
        @if (Auth::check() && Auth::user()->tipus == 'admin')
        <a href="{{route('admin.lista')}}">Admin menü 1</a>
        <a href="">Admin menü 2</a>
        @endif
        
    </nav>

    @yield('content')


    <footer class="bg-dark container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center text-white p-5">
                    Szoftverfejlesztő-tesztelő 2025 &copy;
                </div>
            </div>
        </div>
    </footer>

</body>
</html>