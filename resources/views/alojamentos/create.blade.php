@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Novo Alojamento</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('web.alojamentos.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nome do Alojamento</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Morada</label>
                                <textarea name="morada" class="form-control" rows="2" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Número de Quartos</label>
                                <input type="number" name="num_quartos" class="form-control" min="1" required>
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
                                <a href="{{ route('web.alojamentos.index') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Criar Alojamento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
