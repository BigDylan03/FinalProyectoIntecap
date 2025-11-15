<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar beneficiario – Verdes</title>

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
            <a href="{{route('menu.menu')}}">Menu</a>
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

            <h2 class="mb-4">Editar beneficiario</h2>

            <form action="{{ route('receivers.update', $receiver->id_receiver) }}" method="POST">
                @csrf
                @method('PUT')

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Nombres</legend>
                    <div class="row g-3">
                        <div class="col">
                            <label class="form-label small text-muted">Primer Nombre</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $receiver->first_name) }}" required>
                        </div>
                        <div class="col">
                            <label class="form-label small text-muted">Segundo Nombre</label>
                            <input type="text" name="middle_name" class="form-control" value="{{ old('middle_name', $receiver->middle_name) }}">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Apellidos</legend>
                    <div class="row g-3">
                        <div class="col">
                            <label class="form-label small text-muted">Apellido Paterno</label>
                            <input type="text" name="paternal_name" class="form-control" value="{{ old('paternal_name', $receiver->paternal_name) }}" required>
                        </div>
                        <div class="col">
                            <label class="form-label small text-muted">Apellido Materno</label>
                            <input type="text" name="maternal_name" class="form-control" value="{{ old('maternal_name', $receiver->maternal_name) }}">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Estado</legend>
                    <select name="id_state" class="form-select" required>
                        <option value="">Seleccione un estado</option>
                        @foreach($states as $state)
                            <option value="{{ $state->id_state }}" {{ $state->id_state == $receiver->id_state ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>

                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('receivers.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    <button type="submit" class="btn-verde">Guardar cambios</button>
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