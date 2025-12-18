@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="bi bi-clipboard2-check"></i> Limpezas Agendadas</h1>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Voltar ao Dashboard
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Alojamento</th>
                            <th>Funcionário</th>
                            <th>Estado</th>
                            <th>Duração</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($limpezas as $limpeza)
                            <tr>
                                <td>{{ $limpeza->id }}</td>
                                <td>{{ date('d/m/Y', strtotime($limpeza->data)) }}</td>
                                <td>{{ $limpeza->hora }}</td>
                                <td>{{ $limpeza->alojamento->nome ?? 'N/A' }}</td>
                                <td>{{ $limpeza->funcionario->nome ?? 'N/A' }}</td>
                                <td>
                                    @php
                                        $badge_color = [
                                            'agendada' => 'primary',
                                            'em_progresso' => 'warning',
                                            'concluida' => 'success',
                                            'cancelada' => 'danger'
                                        ][$limpeza->estado] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $badge_color }}">
                                    {{ ucfirst($limpeza->estado) }}
                                </span>
                                </td>
                                <td>{{ $limpeza->duracao_estimada_min }} min</td>
                                <td>
                                    <a href="{{ route('limpezas.show', $limpeza->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> Detalhes
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4 text-center text-muted">
            <p>Total: {{ count($limpezas) }} limpezas registadas</p>
        </div>
    </div>
@endsection
