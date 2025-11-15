<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Elms+Sans:ital,wght@0,100..900;1,100..900&family=Stack+Sans+Headline:wght@200..700&display=swap" rel="stylesheet">
    <!-- Estilos extra -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Verdes</title>
    <script>
        function irAlPie() {
            document.getElementById('registro').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</head>

<body>
    <nav class="navbar-top">
    <div class="nav-content">
        <a class="nav-brand" href="{{ url('/') }}">Verdes</a>
        <div class="nav-links">
            @auth
            <a href="{{route ('menu.menu')}}">Menu</a>
            <a href="{{route ('transactions.index')}}">Mis Transacciones</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            @else
                <a href="{{route ('register')}}">Registrar</a>
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>
</nav>
<div class="container">

    <!-- HERO -->
    <section class="hero">
        <h1>Envía tus verdesitos a cualquier país</h1>
        <p class="lead mb-4">Rápido, seguro y sin vueltas.</p>
        <button class="btn-verde" onclick="irAlPie()">Comenzar</button>
    </section>

    <!-- SOBRE NOSOTROS -->
    <section class="section-card">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="mb-3">Sobre nosotros</h2>
                <p class="mb-4">Somos <strong>Verdes</strong>, como el dinero. La empresa que ayuda a que ese familiar pueda lograr sus sueños, llevándole tu dinero a su país.</p>
                <button class="btn-verde" onclick="irAlPie()">Registrar ahora</button>
            </div>
            <div class="col-md-4 text-center">
                <i class="bi bi-currency-exchange icon-box"></i>
            </div>
        </div>
    </section>

    <!-- POR QUÉ ELEGIRNOS -->
    <section class="section-card">
        <h2 class="text-center mb-5">¿Por qué elegirnos?</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <i class="bi bi-lightning-fill icon-box"></i>
                <h5>Envíos rápidos</h5>
                <p>El dinero llega en minutos a tu beneficiario.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="bi bi-globe-americas icon-box"></i>
                <h5>Alcance mundial</h5>
                <p>Cobertura en más de 150 países.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="bi bi-clock icon-box"></i>
                <h5>Cobra el mismo día</h5>
                <p>Disponible para retirar apenas lo envíes.</p>
            </div>
        </div>
    </section>

    <!-- CÓMO FUNCIONA -->
    <section class="section-card">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-3">¿Cómo funciona?</h2>
                <p class="mb-4">En solo dos pasos:</p>
                <ol class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <span class="bg-verde-money text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width:2rem;height:2rem;">1</span>
                        <div>
                            <h6 class="mb-0">¿Dónde?</h6>
                            <small class="text-muted">Selecciona el país de destino.</small>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="bg-verde-money text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width:2rem;height:2rem;">2</span>
                        <div>
                            <h6 class="mb-0">¿Quién?</h6>
                            <small class="text-muted">Ingresa los datos de tu beneficiario.</small>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="col-md-6 text-center">
                <i class="bi bi-rocket-takeoff-fill icon-box" style="font-size:4rem;"></i>
            </div>
        </div>
    </section>

   
    <!-- LOGIN -->
    <section class="text-center mb-5" id="registro">
        <h5 class="fw-light mb-3">¿Ya tienes un perfil?</h5>
        <a href="{{route('login')}}" class="btn btn-outline-success rounded-pill px-4">Iniciar Sesión</a>
    </section>

</div>

<footer>
    © 2025 | Sitio creado por <span>Dylan Roldán</span>
</footer>

</body>
</html>