<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva transacción – Verdes</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <!-- Estilos comunes -->
    <style>
        :root {
            --primary-green: #4CAF50;
            --secondary-green: #81C784;
            --primary-yellow: #FFEB3B;
            --secondary-yellow: #FFC107;
            --white: #FFFFFF;
            --light-gray: #F5F5F5;
            --dark-gray: #444444;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-gray);
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .navbar-top {
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            padding: 1rem 2rem;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-green);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--dark-gray);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary-green);
        }

        .btn-logout {
            background: none;
            border: none;
            color: var(--dark-gray);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-logout:hover {
            color: var(--primary-green);
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        h2 {
            color: var(--primary-green);
            margin-bottom: 2rem;
            text-align: center;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: var(--border-radius);
            background-color: #FFEBEE;
            color: #C62828;
            border: 1px solid #EF9A9A;
        }

        .alert ul {
            margin: 0;
            padding-left: 1.5rem;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark-gray);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #DDDDDD;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-green);
            outline: none;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1em;
            padding-right: 2.5rem;
        }

        .text-end {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: var(--border-radius);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-success {
            background-color: var(--primary-green);
            color: var(--white);
        }

        .btn-success:hover {
            background-color: var(--secondary-green);
        }

        .btn-secondary {
            background-color: var(--light-gray);
            color: var(--dark-gray);
            border: 1px solid #DDDDDD;
        }

        .btn-secondary:hover {
            background-color: #E0E0E0;
        }

        #chargeDisplay {
            background-color: var(--light-gray);
            color: var(--dark-gray);
            cursor: not-allowed;
        }
    </style>
    
</head>

<body>
{{-- Navbar minimalista --}}
<nav class="navbar-top">
    <div class="nav-content">
        <a class="nav-brand" href="{{ url('/') }}">Verdes</a>
        <div class="nav-links">
            <a href="{{route ('menu.menu')}}">Menu</a>
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

            <h2 class="mb-4">Nueva transacción</h2>

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Beneficiario</legend>
                    <select class="form-select" name="id_receiver" required>
                        <option value="">Seleccione un beneficiario</option>
                        @foreach($receivers as $receiver)
                            <option value="{{ $receiver->id_receiver }}">
                                {{ $receiver->first_name }} {{ $receiver->paternal_name }} ({{ $receiver->state->name ?? 'Sin estado' }})
                            </option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Monto a enviar</legend>
                    <input type="number" step="0.01" name="send_amount" class="form-control" id="sendAmount" required>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Su banco</legend>
                    <select class="form-select" name="sending_account" required>
                        @foreach($accounts as $account)
                            <option value="{{ $account->id_account }}">{{ $account->bank_name }} ({{ $account->account_number }})</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Banco del beneficiario</legend>
                    <select class="form-select" name="paying_account" required>
                        @foreach($accounts as $account)
                            <option value="{{ $account->id_account }}">{{ $account->bank_name }} ({{ $account->account_number }})</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="mb-4">
                    <legend class="fw-semibold mb-3" style="color:var(--verde-money)">Cargo (7%)</legend>
                    <input type="text" id="chargeDisplay" class="form-control" readonly placeholder="Se calcula automáticamente">
                </fieldset>

                <div class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    <button type="submit" class="btn-verde">Registrar transacción</button>
                </div>
            </form>

        </div>
    </section>
</div>

<footer>
    © 2025 | Sitio creado por <span>Dylan Roldán</span>
</footer>

<script>
    const sendAmountInput = document.getElementById('sendAmount');
    const chargeDisplay   = document.getElementById('chargeDisplay');

    sendAmountInput.addEventListener('input', function () {
        const amount = parseFloat(this.value);
        chargeDisplay.value = !isNaN(amount) ? (amount * 0.07).toFixed(2) + ' (Q)' : '';
    });
</script>
</body>
</html>