@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">
                                <i class="bi bi-person-badge"></i> Novo Gestor
                            </h4>
                            <a href="{{ route('web.gestores.index') }}" class="btn btn-light btn-sm">
                                <i class="bi bi-arrow-left"></i> Voltar
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h5><i class="bi bi-exclamation-triangle"></i> Erros no formulário:</h5>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('web.gestores.store') }}">
                            @csrf

                            <!-- Nome -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="bi bi-person"></i> Nome Completo *
                                </label>
                                <input
                                    type="text"
                                    name="nome"
                                    class="form-control @error('nome') is-invalid @enderror"
                                    value="{{ old('nome') }}"
                                    required
                                >
                                @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NIF e Telefone -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="bi bi-credit-card"></i> NIF (9 dígitos) *
                                    </label>
                                    <input
                                        type="text"
                                        name="nif"
                                        class="form-control @error('nif') is-invalid @enderror"
                                        value="{{ old('nif') }}"
                                        maxlength="9"
                                        required
                                    >
                                    @error('nif')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Exemplo: 123456789</small>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">
                                        <i class="bi bi-telephone"></i> Telefone
                                    </label>
                                    <input
                                        type="text"
                                        name="telefone"
                                        class="form-control @error('telefone') is-invalid @enderror"
                                        value="{{ old('telefone') }}"
                                    >
                                    @error('telefone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Botões -->
                            <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                                <a href="{{ route('web.gestores.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-x-circle"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Criar Gestor
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-muted">
                        <small>
                            <i class="bi bi-info-circle"></i> Campos marcados com * são obrigatórios.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
    </style>
@endsection
