@extends('layouts.admin')

@section('title', 'Cadastrar Imóvel - UmuPrime Imóveis')
@section('page-title', 'Cadastrar Novo Imóvel')

@push('styles')
<style>
    .card-custom {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        border-left: 4px solid var(--primary-color);
    }

    .form-label {
        font-weight: 600;
        color: var(--text-dark);
    }

    .form-section {
        margin-bottom: 25px;
    }

    .form-section h5 {
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 8px;
        margin-bottom: 20px;
        color: var(--secondary-color);
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<div class="card-custom">
    <form action="{{ route('admin.imoveis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Informações básicas -->
        <div class="form-section">
            <h5>Informações do Imóvel</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Referência</label>
                    <input type="text" name="referencia" value="{{ old('referencia') }}" class="form-control" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Descrição</label>
                    <textarea name="descricao" rows="4" class="form-control">{{ old('descricao') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Negócio e tipo -->
        <div class="form-section">
            <h5>Detalhes</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tipo de Negócio</label>
                    <select name="tipo_negocio" class="form-control" required>
                        <option value="">Selecione</option>
                        <option value="aluguel" {{ old('tipo_negocio') == 'aluguel' ? 'selected' : '' }}>Aluguel</option>
                        <option value="venda" {{ old('tipo_negocio') == 'venda' ? 'selected' : '' }}>Venda</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tipo de Imóvel</label>
                    <input type="text" name="tipo_imovel" value="{{ old('tipo_imovel') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Valor</label>
                    <input type="number" step="0.01" name="valor" value="{{ old('valor') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Características (separadas por vírgula)</label>
                    <input type="text" name="caracteristicas" value="{{ old('caracteristicas') }}" class="form-control">
                </div>
            </div>
        </div>

        <!-- Localização -->
        <div class="form-section">
            <h5>Localização</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Cidade</label>
                    <input type="text" name="cidade" value="{{ old('cidade') }}" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Bairro</label>
                    <input type="text" name="bairro" value="{{ old('bairro') }}" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Endereço</label>
                    <input type="text" name="endereco" value="{{ old('endereco') }}" class="form-control" required>
                </div>
            </div>
        </div>

        <!-- Imagens -->
        <div class="form-section">
            <h5>Imagens</h5>
            <input type="file" name="imagens[]" class="form-control" multiple required>
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.imoveis.index') }}" class="btn btn-outline-primary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Cadastrar Imóvel</button>
        </div>
    </form>
</div>
@endsection
