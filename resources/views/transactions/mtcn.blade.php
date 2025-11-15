<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transacción Exitosa - Verdes</title>
    <style>
        :root {
            --verde-primary: #22c55e;
            --verde-dark: #16a34a;
            --amarillo-primary: #ffd60a;
            --amarillo-dark: #ffc300;
            --white: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-600: #4b5563;
            --gray-800: #1f2937;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, var(--gray-50) 0%, var(--white) 100%);
            color: var(--gray-800);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .d-inline {
            display: inline;
        }

        /* Navbar */
        .navbar-top {
            background: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--verde-primary);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-brand:hover {
            color: var(--verde-dark);
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--verde-primary);
        }

        .btn-logout {
            background: transparent;
            border: 1px solid var(--gray-200);
            color: var(--gray-600);
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: var(--gray-50);
            border-color: var(--gray-600);
        }

        /* Container principal */
        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 3rem 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Icono de éxito */
        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--verde-primary) 0%, var(--verde-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: scaleIn 0.5s ease-out;
        }

        .success-icon::after {
            content: '✓';
            color: var(--white);
            font-size: 3rem;
            font-weight: bold;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Título */
        h2 {
            font-size: 2rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 1rem;
        }

        /* Texto descriptivo */
        .description {
            font-size: 1.1rem;
            color: var(--gray-600);
            margin: 1.5rem 0;
        }

        /* Card del MTCN */
        .mtcn-card {
            background: linear-gradient(135deg, var(--amarillo-primary) 0%, var(--amarillo-dark) 100%);
            padding: 2rem;
            border-radius: 16px;
            margin: 2rem 0;
            box-shadow: 0 8px 24px rgba(255, 214, 10, 0.3);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 0.6s ease-out 0.2s backwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mtcn-label {
            font-size: 0.9rem;
            color: var(--gray-800);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .mtcn-code {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--gray-800);
            letter-spacing: 4px;
            font-family: 'Courier New', monospace;
        }

        /* Nota informativa */
        .info-note {
            background: var(--white);
            border: 2px solid var(--gray-100);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            color: var(--gray-600);
            font-size: 1rem;
            animation: fadeIn 0.6s ease-out 0.4s backwards;
        }

        .info-note::before {
            content: 'ℹ️';
            font-size: 1.5rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        /* Botón de acción */
        .btn-primary {
            background: linear-gradient(135deg, var(--verde-primary) 0%, var(--verde-dark) 100%);
            color: var(--white);
            padding: 0.875rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.2);
            display: inline-block;
            margin-top: 1.5rem;
            animation: fadeIn 0.6s ease-out 0.6s backwards;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(34, 197, 94, 0.3);
            color: var(--white);
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--gray-800) 0%, #111827 100%);
            color: var(--white);
            text-align: center;
            padding: 2rem 1rem;
            margin-top: auto;
            font-size: 0.95rem;
        }

        footer span {
            color: #86efac;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 2rem 1rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .success-icon {
                width: 60px;
                height: 60px;
            }

            .success-icon::after {
                font-size: 2rem;
            }

            .mtcn-code {
                font-size: 1.75rem;
                letter-spacing: 2px;
            }

            .description {
                font-size: 1rem;
            }

            .nav-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .nav-brand {
                font-size: 1.5rem;
            }

            .mtcn-card {
                padding: 1.5rem;
            }

            .mtcn-code {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar-top">
        <div class="nav-content">
            <a class="nav-brand" href="{{ url('/') }}">Verdes</a>
            <div class="nav-links">
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

    <div class="container">
        <div class="success-icon"></div>
        
        <h2>¡Transacción creada exitosamente!</h2>
        
        <p class="description">Comparte este código MTCN con tu beneficiario:</p>

        <div class="mtcn-card">
            <div class="mtcn-label">Código MTCN</div>
            <div class="mtcn-code">{{ session('mtcn') }}</div>
        </div>

        <div class="info-note">
            No es necesario proporcionar más datos. Tu beneficiario solo necesita este código para retirar el dinero.
        </div>

        <a href="{{ route('transactions.index') }}" class="btn-primary">
            Ver mis transacciones
        </a>
    </div>

    <footer>
        © 2025 | Sitio creado por <span>Dylan Roldán</span>
    </footer>
</body>
</html>