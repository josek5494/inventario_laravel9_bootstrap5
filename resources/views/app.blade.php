<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <link href="{{ asset('scss/app.css') }}" rel="stylesheet">
    <title>Inventario</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item pt-2">
                        <a id="productos" class="nav-link" href="{{route('productos')}}"><h5>Productos</h5></a>
                    </li>
                    <li class="nav-item pt-2">
                        <a id="categorias" class="nav-link" href="{{route('categorias')}}"><h5>Categorías</h5></a>
                    </li>
                    <li class="nav-item pt-2">
                        <a id="almacenes" class="nav-link" href="{{route('almacenes')}}"><h5>Almacenes</h5></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield ('contenido')
</body>

</html>