<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú – Verdes</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>

<body>
<nav class="navbar-top">
    <div class="nav-content">
        <a class="nav-brand" href="{{ url('/') }}">Verdes</a>
        <div class="nav-links">
            <a href="{{route ('transactions.index')}}">Mis Transacciones</a>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>
</nav>

{{-- Contenido apilado --}}
<div class="container-fluid px-0">
    <section class="section-block">
        <div class="container" style="max-width: 680px">

            <h2 class="mb-4 text-center">¿Qué deseas hacer hoy?</h2>

            <div class="opciones">
                <div class="opcion"><a href="{{route ('menu.receiver')}}">Registrar un beneficiario</a></div>
                <div class="opcion"><a href="{{route ('transactions.create')}}">Enviar dinero</a></div>
                <div class="opcion"><a href="{{route ('receivers.index')}}">Mis beneficiarios</a></div>
                <div class="opcion"><a href="{{route ('transactions.index')}}">Mis Transacciones</a></div>
            </div>

        </div>
    </section>
</div>

<footer>
    © 2025 | Sitio creado por <span>Dylan Roldán</span>
</footer>
</body>
</html>