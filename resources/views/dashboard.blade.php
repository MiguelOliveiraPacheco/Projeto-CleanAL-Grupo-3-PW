@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h1>

        <!-- Estatísticas -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card bg-gradient-1">
                    <h5><i class="bi bi-house-door"></i> Alojamentos</h5>
                    <h2>{{ $stats['total_alojamentos'] }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-gradient-2">
                    <h5><i class="bi bi-clipboard2-check"></i> Total Limpezas</h5>
                    <h2>{{ $stats['total_limpezas'] }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-gradient-3">
                    <h5><i class="bi bi-calendar-check"></i> Limpezas Hoje</h5>
                    <h2>{{ $stats['limpezas_hoje'] }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-gradient-4">
                    <h5><i class="bi bi-check-circle"></i> Concluídas</h5>
                    <h2>{{ $stats['limpezas_concluidas'] }}</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Gráfico -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-bar-chart"></i> Estatísticas de Limpezas</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="limpezasChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Últimas limpezas -->
            <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white">
                            <h5 class="mb-0"><i class="bi bi-clock-history"></i> Últimas Limpezas</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                @foreach($ultimas_limpezas as $limpeza)
                                    <div class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">{{ $limpeza->alojamento->nome ?? 'N/A' }}</h6>
                                            <small class="text-muted">
                                                @php
                                                    // Converte string para data formatada
                                                    $data = is_string($limpeza->data)
                                                        ? date('d/m', strtotime($limpeza->data))
                                                        : $limpeza->data->format('d/m');
                                                @endphp
                                                {{ $data }}
                                            </small>
                                        </div>
                                        <p class="mb-1 small">
                            <span class="badge bg-{{ $limpeza->estado == 'concluida' ? 'success' : ($limpeza->estado == 'em_progresso' ? 'warning' : 'primary') }}">
                                {{ $limpeza->estado }}
                            </span>
                                            @if($limpeza->funcionario)
                                                • {{ $limpeza->funcionario->nome }}
                                            @endif
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Quick Stats -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5><i class="bi bi-person-badge"></i> Gestores: {{ $stats['total_gestores'] }}</h5>
                        <h5><i class="bi bi-people"></i> Funcionários: {{ $stats['total_funcionarios'] }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Links Rápidos</h5>
                        <a href="{{ route('alojamentos.index') }}" class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-house-door"></i> Ver Alojamentos
                        </a>
                        <a href="{{ route('limpezas.index') }}" class="btn btn-outline-success w-100">
                            <i class="bi bi-clipboard2-check"></i> Ver Limpezas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            // Gráfico de limpezas
            const ctx = document.getElementById('limpezasChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Agendadas', 'Em Progresso', 'Concluídas', 'Canceladas'],
                    datasets: [{
                        data: [
                            {{ $stats['limpezas_pendentes'] }},
                            {{ $stats['total_limpezas'] - $stats['limpezas_pendentes'] - $stats['limpezas_concluidas'] }},
                            {{ $stats['limpezas_concluidas'] }},
                            0
                        ],
                        backgroundColor: [
                            '#ffc107',
                            '#0dcaf0',
                            '#198754',
                            '#dc3545'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        </script>
    @endsection
@endsection
