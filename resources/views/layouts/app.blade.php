<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LIBRERIA ODESA</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #0B3C5D;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#D9B310; font-weight:bolder; ">
                              Proveedores
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('proveedores.index')}}">Listar Proveedores</a></li>
                              <li><a class="dropdown-item" href="{{route('proveedores.create')}}">Nuevo Proveedor</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                        <a style="color:#D9B310; font-weight:bolder; id="navbarDropdown" class="nav-link dropdown-toggle" class="dropdown-item" href="{{ route('libros.index') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('Libros') }}</a>
                   
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('libros.index') }}">{{ __('Libros') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('categoria.index') }}">{{ __('Categorias') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('autors.index') }}">{{ __('Autores') }}</a></li>
                        </ul>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#D9B310; font-weight:bolder; ">
                              Compras
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('registrar-compras-libros.index')}}">Listar Compras</a></li>
                              <li><a class="dropdown-item" href="{{route('registrar-compras-libros.create')}}">Nueva Compra</a></li>
                            </ul>
                        </li>
                    </div>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
