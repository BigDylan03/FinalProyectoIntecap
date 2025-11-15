<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis beneficiarios – Verdes</title>
    <link rel="stylesheet" href="{{ asset('css/stylesBeneficiarios.css') }}">
</head>

<body>
{{-- Navbar minimalista --}}
<nav class="navbar-top">
    <div class="nav-content">
        <a class="nav-brand" href="{{ url('/') }}">Verdes</a>
        <div class="nav-links">
            <a href="{{route ('menu.menu')}}">Menu</a>
            <a href="{{route ('transactions.create')}}">Enviar dinero</a>
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
        <div class="container" style="max-width: 880px">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Mis beneficiarios</h2>
                <a href="{{ route('receivers.create') }}" class="btn-verde">+ Agregar beneficiario</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center mb-4">{{ session('success') }}</div>
            @endif

            {{-- Lista tipo bloques --}}
            <div class="beneficiary-list">
                @forelse($receivers as $receiver)
                    <div class="beneficiary-row">
                        <div class="beneficiary-info">
                            <span class="beneficiary-name">
                                {{ $receiver->first_name }} {{ $receiver->middle_name }}
                                {{ $receiver->paternal_name }} {{ $receiver->maternal_name }}
                            </span>
                            <span class="beneficiary-state">{{ $receiver->state->name ?? 'N/A' }}</span>
                        </div>
                        <div class="beneficiary-actions">
                            <a href="{{ route('receivers.edit', $receiver->id_receiver) }}" class="btn-action btn-edit">Editar</a>
                            <form action="{{ route('receivers.destroy', $receiver->id_receiver) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn-action btn-delete"
                                        onclick="return confirm('¿Seguro que deseas eliminar este beneficiario?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Aún no has registrado beneficiarios.</p>
                @endforelse
            </div>

        </div>
    </section>
</div>

<footer>
    © 2025 | Sitio creado por <span>Dylan Roldán</span>
</footer>
</body>
</html>