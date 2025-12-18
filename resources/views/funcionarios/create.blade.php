@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Novo Funcionário</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('web.funcionarios.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" name="telefone" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Morada</label>
                                    <input type="text" name="morada" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Anos de Experiência</label>
                                    <input type="number" name="anos_exp" class="form-control" min="0" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Preço por Hora (€)</label>
                                    <input type="number" name="preco_hora" class="form-control" min="0" step="0.5">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gestor</label>
                                <select name="gestor_id" class="form-select" required>
                                    <option value="">Selecione um gestor</option>
                                    @foreach($gestores as $gestor)
                                        <option value="{{ $gestor->id }}">{{ $gestor->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="{{ route('web.funcionarios.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Criar Funcionário</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
