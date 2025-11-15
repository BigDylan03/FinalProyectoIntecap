<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar beneficiario – Verdes</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Estilos comunes -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
{{-- Navbar minimalista --}}
<nav class="navbar-top">
    <div class="nav-content">
        <a class="nav-brand" href="{{ url('/') }}">Verdes</a>
        <div class="nav-links">
            <a href="{{ route('menu.menu') }}">Menu</a>
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

            <h2 class="mb-4">Registrar beneficiario</h2>

            <form action="{{ route('menu.receiver') }}" method="POST">
                @csrf

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Nombres</legend>
                    <div class="row g-3">
                        <div class="col">
                            <label class="form-label small text-muted">Primer Nombre</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Primer Nombre" required>
                        </div>
                        <div class="col">
                            <label class="form-label small text-muted">Segundo Nombre</label>
                            <input type="text" class="form-control" name="middle_name" placeholder="Segundo Nombre">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Apellidos</legend>
                    <div class="row g-3">
                        <div class="col">
                            <label class="form-label small text-muted">Primer apellido</label>
                            <input type="text" class="form-control" name="paternal_name" placeholder="Primer apellido" required>
                        </div>
                        <div class="col">
                            <label class="form-label small text-muted">Segundo Apellido</label>
                            <input type="text" class="form-control" name="maternal_name" placeholder="Segundo Apellido">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Departamento</legend>
                    <select class="form-select" name="id_state" required>
                        <option value="">Seleccione un estado</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id_state }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </fieldset>

                <div class="text-center">
                    <button type="submit" class="btn-verde">Registrar</button>
                </div>
            </form>

        </div>
    </section>
</div>

<footer>
    © 2025 | Sitio creado por <span>Dylan Roldán</span>
</footer>
</body>
</html>