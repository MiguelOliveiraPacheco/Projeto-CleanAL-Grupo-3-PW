{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h1>

        <!-- Barra do utilizador (se não estiver no layout) -->
        @if($utilizador && !isset($inLayout))
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong><i class="bi bi-person-circle"></i> Utilizador:</strong>
                            {{ $utilizador->name }}
                            <span class="text-muted">({{ $utilizador->email }})</span>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-box-arrow-right"></i> Sair
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Estatísticas -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <i class="bi bi-house-door"></i> Alojamentos
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_alojamentos'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-house fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <i class="bi bi-clipboard2-check"></i> Total Limpezas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_limpezas'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-clipboard-data fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    <i class="bi bi-calendar-check"></i> Limpezas Hoje
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['limpezas_hoje'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-calendar-day fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    <i class="bi bi-clock-history"></i> Pendentes
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['limpezas_pendentes'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-hourglass-split fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    <i class="bi bi-check-circle"></i> Concluídas
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['limpezas_concluidas'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-check2-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    <i class="bi bi-person-badge"></i> Gestores
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_gestores'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-vcard fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    <i class="bi bi-people"></i> Funcionários
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_funcionarios'] }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    <i class="bi bi-graph-up"></i> Taxa Conclusão
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @php
                                        $total = $stats['total_limpezas'];
                                        $concluidas = $stats['limpezas_concluidas'];
                                        $taxa = $total > 0 ? round(($concluidas / $total) * 100, 1) : 0;
                                    @endphp
                                    {{ $taxa }}%
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-bar-chart-line fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico e Últimas Limpezas -->
        <div class="row">
            <!-- Gráfico -->
            <div class="col-md-8 mb-4">
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
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-clock-history"></i> Últimas Limpezas</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @forelse($ultimas_limpezas as $limpeza)
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">{{ $limpeza->alojamento->nome ?? 'N/A' }}</h6>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($limpeza->data)->format('d/m') }}
                                        </small>
                                    </div>
                                    <p class="mb-1 small">
                                    <span class="badge bg-{{
                                        $limpeza->estado == 'concluida' ? 'success' :
                                        ($limpeza->estado == 'em_progresso' ? 'warning' :
                                        ($limpeza->estado == 'cancelada' ? 'danger' : 'primary'))
                                    }}">
                                        {{ ucfirst(str_replace('_', ' ', $limpeza->estado)) }}
                                    </span>
                                        @if($limpeza->funcionario)
                                            • {{ $limpeza->funcionario->nome }}
                                        @endif
                                    </p>
                                </div>
                            @empty
                                <div class="list-group-item text-center text-muted py-4">
                                    <i class="bi bi-inbox fs-1"></i>
                                    <p class="mt-2 mb-0">Não há limpezas registadas</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats e Links -->
        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-info-circle"></i> Resumo do Sistema</h5>
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                        <i class="bi bi-house text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Alojamentos</h6>
                                        <p class="text-muted mb-0">{{ $stats['total_alojamentos'] }} registados</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                                        <i class="bi bi-person-badge text-success"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Gestores</h6>
                                        <p class="text-muted mb-0">{{ $stats['total_gestores'] }} ativos</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning bg-opacity-10 p-2 rounded me-3">
                                        <i class="bi bi-people text-warning"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Funcionários</h6>
                                        <p class="text-muted mb-0">{{ $stats['total_funcionarios'] }} na equipa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-info bg-opacity-10 p-2 rounded me-3">
                                        <i class="bi bi-check2-circle text-info"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Conclusão</h6>
                                        <p class="text-muted mb-0">{{ $stats['limpezas_concluidas'] }} limpezas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-link"></i> Navegação Rápida</h5>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <a href="{{ url('/alojamentos') }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center py-3">
                                    <i class="bi bi-house-door fs-4 me-2"></i>
                                    <div>
                                        <div class="fw-bold">Alojamentos</div>
                                        <small class="text-muted">Gerir</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ url('/limpezas') }}" class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center py-3">
                                    <i class="bi bi-clipboard2-check fs-4 me-2"></i>
                                    <div>
                                        <div class="fw-bold">Limpezas</div>
                                        <small class="text-muted">Agendar</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ url('/gestores') }}" class="btn btn-outline-warning w-100 d-flex align-items-center justify-content-center py-3">
                                    <i class="bi bi-person-badge fs-4 me-2"></i>
                                    <div>
                                        <div class="fw-bold">Gestores</div>
                                        <small class="text-muted">Gerir</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ url('/funcionarios') }}" class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center py-3">
                                    <i class="bi bi-people fs-4 me-2"></i>
                                    <div>
                                        <div class="fw-bold">Funcionários</div>
                                        <small class="text-muted">Ver equipa</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Gráfico de limpezas
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('limpezasChart').getContext('2d');

                // Calcular em progresso
                const total = {{ $stats['total_limpezas'] }};
                const pendentes = {{ $stats['limpezas_pendentes'] }};
                const concluidas = {{ $stats['limpezas_concluidas'] }};
                const emProgresso = total - pendentes - concluidas;

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Agendadas', 'Em Progresso', 'Concluídas'],
                        datasets: [{
                            data: [pendentes, emProgresso, concluidas],
                            backgroundColor: [
                                '#ffc107', // Amarelo para agendadas
                                '#0dcaf0', // Azul claro para em progresso
                                '#198754'  // Verde para concluídas
                            ],
                            borderWidth: 2,
                            borderColor: '#fff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 20,
                                    usePointStyle: true,
                                    pointStyle: 'circle'
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.raw || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = Math.round((value / total) * 100);
                                        return `${label}: ${value} (${percentage}%)`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endsection

    <style>
        /* Estilos específicos para o dashboard */
        .card {
            border: 1px solid #e3e6f0;
            border-radius: 0.35rem;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        .border-left-primary {
            border-left: 0.25rem solid #4e73df !important;
        }

        .border-left-success {
            border-left: 0.25rem solid #1cc88a !important;
        }

        .border-left-info {
            border-left: 0.25rem solid #36b9cc !important;
        }

        .border-left-warning {
            border-left: 0.25rem solid #f6c23e !important;
        }

        .border-left-danger {
            border-left: 0.25rem solid #e74a3b !important;
        }

        .border-left-secondary {
            border-left: 0.25rem solid #858796 !important;
        }

        .border-left-dark {
            border-left: 0.25rem solid #5a5c69 !important;
        }

        .text-gray-800 {
            color: #5a5c69 !important;
        }

        .text-gray-300 {
            color: #dddfeb !important;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .text-xs {
            font-size: 0.7rem !important;
        }

        .list-group-item {
            border-left: none;
            border-right: none;
            padding: 1rem 1.25rem;
        }

        .list-group-item:first-child {
            border-top: none;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }
    </style>
@endsection
