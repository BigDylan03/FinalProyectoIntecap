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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
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

    <!-- FORMULARIO (oculto hasta hacer clic) -->
    <section id="registro" class="section-card">
        <form action="{{route('welcome.store')}}" method="post">
            @csrf
            <h2 class="text-center mb-4">Regístrate ahora</h2>

            <fieldset class="mb-4">
                <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Nombres</legend>
                <div class="row g-3">
                    <div class="col"><input type="text" class="form-control" placeholder="Primer Nombre" name="first_name" required></div>
                    <div class="col"><input type="text" class="form-control" placeholder="Segundo Nombre" name="middle_name"></div>
                </div>
            </fieldset>

            <fieldset class="mb-4">
                <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Apellidos</legend>
                <div class="row g-3">
                    <div class="col"><input type="text" class="form-control" placeholder="Primer apellido" name="paternal_name" required></div>
                    <div class="col"><input type="text" class="form-control" placeholder="Segundo Apellido" name="maternal_name"></div>
                </div>
            </fieldset>

            <fieldset class="mb-4">
                <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Departamento</legend>
                <div class="row g-3">
                    <select name="id_state" id="id_state" required>
                        <optgroup>
                            @foreach ($states as $state)
                                <option value="{{ $state->id_state }}">{{ $state -> name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    
                </div>
            </fieldset>

            <fieldset class="mb-4">
                <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Datos de Contacto</legend>
                <div class="input-group mb-3"><span class="input-group-text">Teléfono</span><input type="text" class="form-control" name="phone" required></div>
                <div class="input-group mb-3"><span class="input-group-text">Correo</span><input type="email" class="form-control" name="email" required></div>
                <div class="mb-3"><label class="form-label">Contraseña</label><input type="password" class="form-control" name="password" required></div>
            </fieldset>

            <div class="text-center"><button type="submit" class="btn-verde">Registrar</button></div>
        </form>
    </section>

    <!-- LOGIN -->
    <section class="text-center mb-5">
        <h5 class="fw-light mb-3">¿Ya tienes un perfil?</h5>
        <a href="{{route('login')}}" class="btn btn-outline-success rounded-pill px-4">Iniciar Sesión</a>
    </section>

</div>

<footer>
    © 2025 | Sitio creado por <span>Dylan Roldán</span>
</footer>

</body>
</html>