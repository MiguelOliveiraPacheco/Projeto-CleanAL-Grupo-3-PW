{{-- resources/views/dashboard.blade.php --}}
    <!DOCTYPE html>
<html>
<head>
    <title>Dashboard - CleanAL</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .user-bar {
            background: #e0e0e0;
            padding: 10px 20px;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .stat-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #2c3e50;
            margin: 10px 0;
        }
        .limpezas-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .limpezas-table th, .limpezas-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .limpezas-table th {
            background: #f8f9fa;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
{{-- Barra do utilizador --}}
@if($utilizador)
    <div class="user-bar">
        <div>
            <strong>Utilizador:</strong> {{ $utilizador->name }}
            <span style="color: #666;">({{ $utilizador->email }})</span>
        </div>
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background: #dc3545; color: white; padding: 8px 15px; border: none; cursor: pointer;">
                    🔓 Sair
                </button>
            </form>
        </div>
    </div>
@endif

<div class="container">
    <h1>📊 Dashboard</h1>

    {{-- Estatísticas --}}
    <div class="stats-grid">
        <div class="stat-card">
            <h3>🏠 Alojamentos</h3>
            <div class="stat-number">{{ $stats['total_alojamentos'] }}</div>
        </div>

        <div class="stat-card">
            <h3>🧹 Limpezas Hoje</h3>
            <div class="stat-number">{{ $stats['limpezas_hoje'] }}</div>
        </div>

        <div class="stat-card">
            <h3>⏳ Pendentes</h3>
            <div class="stat-number">{{ $stats['limpezas_pendentes'] }}</div>
        </div>

        <div class="stat-card">
            <h3>✅ Concluídas</h3>
            <div class="stat-number">{{ $stats['limpezas_concluidas'] }}</div>
        </div>

        <div class="stat-card">
            <h3>👔 Gestores</h3>
            <div class="stat-number">{{ $stats['total_gestores'] }}</div>
        </div>

        <div class="stat-card">
            <h3>👷 Funcionários</h3>
            <div class="stat-number">{{ $stats['total_funcionarios'] }}</div>
        </div>
    </div>

    {{-- Últimas limpezas --}}
    @if(isset($ultimas_limpezas) && $ultimas_limpezas->count() > 0)
        <h2 style="margin-top: 30px;">📅 Últimas Limpezas</h2>
        <table class="limpezas-table">
            <thead>
            <tr>
                <th>Data</th>
                <th>Alojamento</th>
                <th>Funcionário</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ultimas_limpezas as $limpeza)
                <tr>
                    <td>
                        {{ \Carbon\Carbon::parse($limpeza->data)->format('d/m/Y') }}
                    </td>
                    <td>{{ $limpeza->alojamento->nome ?? 'N/A' }}</td>
                    <td>{{ $limpeza->funcionario->nome ?? 'N/A' }}</td>
                    <td>
                        @php
                            $estadoColors = [
                                'agendada' => 'blue',
                                'em_progresso' => 'orange',
                                'concluida' => 'green',
                                'cancelada' => 'red'
                            ];
                            $cor = $estadoColors[$limpeza->estado] ?? 'gray';
                        @endphp
                        <span style="color: {{ $cor }}; font-weight: bold;">
                            {{ ucfirst(str_replace('_', ' ', $limpeza->estado)) }}
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p style="margin-top: 30px; color: #666;">Não há limpezas registadas.</p>
    @endif

    {{-- Links de navegação --}}
    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee;">
        <h3>🔗 Navegação Rápida</h3>
        <p>
            <a href="{{ url('/alojamentos') }}" style="margin-right: 15px;">📋 Alojamentos</a>
            <a href="{{ url('/limpezas') }}" style="margin-right: 15px;">🧹 Limpezas</a>
            <a href="{{ url('/gestores') }}" style="margin-right: 15px;">👔 Gestores</a>
            <a href="{{ url('/funcionarios') }}">👷 Funcionários</a>
        </p>
    </div>
</div>
</body>
</html>
