@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="bi bi-person-badge"></i> Gestores</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('web.gestores.create') }}" class="btn btn-success">
                    <i class="bi bi-plus"></i> Novo Gestor
                </a>
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>

        <div class="row">
            @foreach($gestores as $gestor)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $gestor->nome }}</h5>
                            <p class="card-text">
                                <i class="bi bi-credit-card"></i> NIF: {{ $gestor->nif }}<br>
                                <i class="bi bi-telephone"></i> {{ $gestor->telefone ?? 'Não definido' }}
                            </p>
                            <div class="d-flex justify-content-between">
                        <span class="badge bg-info">
                            <i class="bi bi-house-door"></i> {{ $gestor->alojamentos_count ?? 0 }} Alojamentos
                        </span>
                                <span class="badge bg-warning">
                            <i class="bi bi-people"></i> {{ $gestor->funcionarios_count ?? 0 }} Funcionários
                        </span>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <small class="text-muted">
                                Registado em: {{ $gestor->created_at->format('d/m/Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 text-center text-muted">
            <p>Total: {{ count($gestores) }} gestores registados</p>
        </div>
    </div>
@endsection
