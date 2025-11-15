<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Transacciones</title>
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

        .d-inline {
            display: inline;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 0;
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
            margin-bottom: 2rem;
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
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--verde-primary);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--verde-primary);
        }

        .nav-links a:hover::after {
            width: 100%;
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
            color: var(--gray-800);
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto 2rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #ffd60a 0%, #ffc300 100%);
            padding: 2.5rem 2rem;
            text-align: center;
        }

        .header h2 {
            color: #2d3748;
            font-size: 2rem;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .alert {
            margin: 1.5rem 2rem;
            padding: 1rem 1.5rem;
            background: #d4edda;
            border-left: 4px solid #28a745;
            border-radius: 8px;
            color: #155724;
            font-size: 0.95rem;
        }

        .actions {
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            display: inline-block;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        .table-container {
            padding: 0 2rem 2rem;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        thead {
            background: #f8f9fa;
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            border-bottom: 2px solid #e5e7eb;
        }

        td {
            padding: 1rem;
            color: #374151;
            font-size: 0.95rem;
            border-bottom: 1px solid #f3f4f6;
        }

        tbody tr {
            transition: background-color 0.2s;
        }

        tbody tr:hover {
            background-color: #fffbeb;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #9ca3af;
            font-size: 1rem;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .amount {
            font-weight: 600;
            color: #059669;
        }

        .charge {
            color: #dc2626;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 0;
            }

            .container {
                margin: 0 0.5rem 1rem;
            }

            .header {
                padding: 2rem 1rem;
            }

            .header h2 {
                font-size: 1.5rem;
            }

            .actions, .table-container {
                padding: 1rem;
            }

            .alert {
                margin: 1rem;
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
    </style>
</head>
<body>
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

    <div class="container">
        <div class="header">
            <h2>Mis Transacciones</h2>
        </div>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="actions">
            <a href="{{ route('transactions.create') }}" class="btn">+ Nueva Transacción</a>
        </div>

        <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>MTCN</th>
                <th>Beneficiario</th>
                <th>Monto</th>
                <th>Cargo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $tx)
                <tr>
                    <td>{{$tx->mtcn}}</td>
                    <td>{{ $tx->receiver->first_name }} {{ $tx->receiver->paternal_name }}</td>
                    <td class="amount">Q{{ number_format($tx->send_amount, 2) }}</td>
                    <td class="charge">Q{{ number_format($tx->charge, 2) }}</td>

                    <!-- NUEVAS COLUMNAS -->
                    <td>{{ $tx->originationState->name ?? 'N/A' }}</td>
                    <td>{{ $tx->destinationState->name ?? 'N/A' }}</td>

                    <td><span class="status-badge">{{ $tx->status }}</span></td>
                    <td>{{ \Carbon\Carbon::parse($tx->date)->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty-state">
                        No hay transacciones registradas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
        </div>
    </div>
</body>
</html>