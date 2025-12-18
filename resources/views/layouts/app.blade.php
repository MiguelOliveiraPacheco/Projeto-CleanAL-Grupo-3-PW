<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanAL - Gestão de Limpezas de AL</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .stat-card {
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            color: white;
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .bg-gradient-1 { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .bg-gradient-2 { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .bg-gradient-3 { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
        .bg-gradient-4 { background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); }
        .table-hover tbody tr:hover {
            background-color: rgba(102, 126, 234, 0.1);
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%); /* azul bebé */
            color: #333;
            border-right: 1px solid #90caf9;
        }

        .sidebar a {
            color: #444;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-left: 4px solid transparent;
            transition: all 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(144, 202, 249, 0.3); /* azul claro no hover */
            border-left: 4px solid #2196f3; /* borda azul */
            color: #111;
        }

        .sidebar .logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #90caf9;
            background-color: rgba(255, 255, 255, 0.4);
        }
        .content {
            padding: 30px;
        }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar d-none d-md-block">
            <div class="logo">
                <h4><i class="bi bi-house-heart"></i> CleanAL</h4>
                <small class="text-muted">Gestão de Limpezas</small>
            </div>
            <nav class="nav flex-column mt-4">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('alojamentos.index') }}" class="{{ request()->is('alojamentos*') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-2"></i> Alojamentos
                </a>
                <a href="{{ route('limpezas.index') }}" class="{{ request()->is('limpezas*') ? 'active' : '' }}">
                    <i class="bi bi-clipboard2-check me-2"></i> Limpezas
                </a>
                <a href="{{ route('gestores.index') }}" class="{{ request()->is('gestores*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge me-2"></i> Gestores
                </a>
                <a href="{{ route('funcionarios.index') }}" class="{{ request()->is('funcionarios*') ? 'active' : '' }}">
                    <i class="bi bi-people me-2"></i> Funcionários
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <!-- Navbar para mobile -->
            <nav class="navbar navbar-expand-lg navbar-custom d-md-none">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#">
                        <i class="bi bi-house-heart"></i> CleanAL
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mobileNav">
                        <div class="navbar-nav">
                            <a class="nav-link text-white" href="{{ url('/') }}">Dashboard</a>
                            <a class="nav-link text-white" href="{{ route('alojamentos.index') }}">Alojamentos</a>
                            <a class="nav-link text-white" href="{{ route('limpezas.index') }}">Limpezas</a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Conteúdo -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@yield('scripts')
</body>
</html>
