@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-users"></i> Funcionários</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('web.funcionarios.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Novo Funcionário
                </a>
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>

        <!-- CARD DE PESQUISA E FILTROS -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0"><i class="fas fa-filter"></i> Pesquisa e Filtros</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('funcionarios.index') }}">

                    <!-- Linha 1: Pesquisa por nome -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Pesquisar por nome:</label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Digite o nome do funcionário..."
                                    value="{{ request('search') }}"
                                >
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Filtrar por morada:</label>
                            <input
                                type="text"
                                name="morada"
                                class="form-control"
                                placeholder="Ex: Lisboa, Porto, Centro..."
                                value="{{ request('morada') }}"
                            >
                        </div>
                    </div>

                    <!-- Linha 2: Filtros numéricos -->
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label class="form-label">Experiência mín. (anos):</label>
                            <input
                                type="number"
                                name="exp_min"
                                class="form-control"
                                min="0"
                                max="50"
                                placeholder="0"
                                value="{{ request('exp_min') }}"
                            >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Experiência máx. (anos):</label>
                            <input
                                type="number"
                                name="exp_max"
                                class="form-control"
                                min="0"
                                max="50"
                                placeholder="50"
                                value="{{ request('exp_max') }}"
                            >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Preço/hora máximo (€):</label>
                            <input
                                type="number"
                                name="preco_max"
                                class="form-control"
                                min="0"
                                max="100"
                                step="0.5"
                                placeholder="Ex: 15.00"
                                value="{{ request('preco_max') }}"
                            >
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <div class="d-flex gap-2 w-100">
                                <button type="submit" class="btn btn-primary flex-grow-1">
                                    <i class="fas fa-filter"></i> Aplicar Filtros
                                </button>
                                @if(request()->anyFilled(['search', 'exp_min', 'exp_max', 'preco_max', 'morada']))
                                    <a href="{{ route('funcionarios.index') }}" class="btn btn-outline-danger">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Resumo dos filtros ativos -->
                    @if(request()->anyFilled(['search', 'exp_min', 'exp_max', 'preco_max', 'morada']))
                        <div class="alert alert-info py-2 mb-0">
                            <small>
                                <i class="fas fa-info-circle"></i> Filtros ativos:
                                @if(request('search')) <span class="badge bg-primary me-1">Nome: {{ request('search') }}</span> @endif
                                @if(request('exp_min')) <span class="badge bg-secondary me-1">Exp. mín: {{ request('exp_min') }} anos</span> @endif
                                @if(request('exp_max')) <span class="badge bg-secondary me-1">Exp. máx: {{ request('exp_max') }} anos</span> @endif
                                @if(request('preco_max')) <span class="badge bg-success me-1">Preço máx: {{ request('preco_max') }}€</span> @endif
                                @if(request('morada')) <span class="badge bg-warning me-1">Morada: {{ request('morada') }}</span> @endif
                            </small>
                        </div>
                    @endif

                </form>
            </div>
        </div>

        <!-- RESULTADOS -->
        @if($funcionarios->isEmpty())
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-user-slash fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">
                        @if(request()->anyFilled(['search', 'exp_min', 'exp_max', 'preco_max', 'morada']))
                            Nenhum funcionário encontrado com os filtros atuais
                        @else
                            Nenhum funcionário registado
                        @endif
                    </h4>
                    <p class="text-muted">
                        @if(request()->anyFilled(['search', 'exp_min', 'exp_max', 'preco_max', 'morada']))
                            Tente alterar os critérios de pesquisa ou <a href="{{ route('funcionarios.index') }}">limpe todos os filtros</a>.
                        @else
                            Os funcionários aparecerão aqui quando forem registados.
                        @endif
                    </p>
                </div>
            </div>
        @else
            <!-- TABELA DE FUNCIONÁRIOS -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Experiência</th>
                                <th>Preço/Hora</th>
                                <th>Morada</th>
                                <th>Gestor</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($funcionarios as $funcionario)
                                <tr>
                                    <td>{{ $funcionario->id }}</td>
                                    <td>
                                        <strong>{{ $funcionario->nome }}</strong>
                                        @if(request('search') && stripos($funcionario->nome, request('search')) !== false)
                                            <span class="badge bg-info ms-1">Corresponde</span>
                                        @endif
                                    </td>
                                    <td>{{ $funcionario->email }}</td>
                                    <td>
                                <span class="badge bg-{{ $funcionario->anos_exp >= 5 ? 'success' : ($funcionario->anos_exp >= 2 ? 'warning' : 'secondary') }}">
                                    {{ $funcionario->anos_exp }} anos
                                </span>
                                    </td>
                                    <td>
                                        @if($funcionario->preco_hora)
                                            <span class="badge bg-primary">{{ number_format($funcionario->preco_hora, 2) }} €</span>
                                        @else
                                            <span class="badge bg-secondary">Não definido</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($funcionario->morada)
                                            <small>{{ Str::limit($funcionario->morada, 25) }}</small>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>{{ $funcionario->gestor->nome ?? 'N/A' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-info" title="Ver detalhes">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- CONTADOR DE RESULTADOS -->
            <div class="mt-3 text-center">
                <div class="alert alert-light">
                    <i class="fas fa-chart-bar"></i>
                    <strong>{{ $funcionarios->count() }}</strong> funcionário(s) encontrado(s)
                    @if(request()->anyFilled(['search', 'exp_min', 'exp_max', 'preco_max', 'morada']))
                        com os filtros aplicados
                    @endif
                </div>
            </div>
        @endif

    </div>
@endsection
