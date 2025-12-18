@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-home"></i> Alojamentos</h1>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>

        <!-- Campo de Pesquisa SIMPLES -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('alojamentos.index') }}" class="row g-3">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Pesquisar por nome do alojamento..."
                                value="{{ $search ?? '' }}"
                            >
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i> Pesquisar
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        @if(isset($search) && $search)
                            <a href="{{ route('alojamentos.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Limpar Pesquisa
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Mensagem de resultado -->
        @if(isset($search) && $search)
            <div class="alert alert-info mb-3">
                <i class="fas fa-search"></i>
                Pesquisando por: <strong>"{{ $search }}"</strong>
                @if($alojamentos->count() > 0)
                    - {{ $alojamentos->count() }} resultado(s)
                @else
                    - Nenhum resultado encontrado
                @endif
            </div>
        @endif

        <!-- Tabela de Alojamentos -->
        <div class="card shadow-sm">
            <div class="card-body">
                @if($alojamentos->isEmpty())
                    <!-- Mensagem quando não há resultados -->
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-search fa-3x text-muted"></i>
                        </div>
                        <h4 class="text-muted">
                            @if(isset($search) && $search)
                                Nenhum alojamento encontrado para "{{ $search }}"
                            @else
                                Nenhum alojamento registado
                            @endif
                        </h4>
                        <p class="text-muted">
                            @if(isset($search) && $search)
                                Tente pesquisar por outro termo ou <a href="{{ route('alojamentos.index') }}">limpe a pesquisa</a>
                            @else
                                Os alojamentos aparecerão aqui quando forem criados.
                            @endif
                        </p>
                    </div>
                @else
                    <!-- Tabela (só mostra se houver resultados) -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Morada</th>
                                <th>Quartos</th>
                                <th>Gestor</th>
                                <th>Limpezas</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alojamentos as $alojamento)
                                <tr>
                                    <td>{{ $alojamento->id }}</td>
                                    <td>{{ $alojamento->nome }}</td>
                                    <td>{{ Str::limit($alojamento->morada, 30) }}</td>
                                    <td>{{ $alojamento->num_quartos }}</td>
                                    <td>{{ $alojamento->gestor->nome ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $alojamento->limpezas_count ?? $alojamento->limpezas->count() }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('alojamentos.show', $alojamento->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-4 text-center text-muted">
            <p>
                @if(isset($search) && $search)
                    Resultados da pesquisa: {{ $alojamentos->count() }} alojamento(s)
                @else
                    Total: {{ $alojamentos->count() }} alojamentos registados
                @endif
            </p>
        </div>
    </div>
@endsection
