@extends('layouts.admin')

@section('title', 'Editar Imóvel - UmuPrime Imóveis')
@section('page-title', 'Editar Imóvel')

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

    .image-preview {
        width: 100px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 10px;
        border: 2px solid #eee;
    }

    .delete-btn {
        background: var(--secondary-color);
        color: white;
        border: none;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .delete-btn:hover {
        background: var(--primary-color);
        color: var(--secondary-color);
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
    <form action="{{ route('admin.imoveis.update', $imovel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Dados principais -->
        <div class="form-section">
            <h5>Informações do Imóvel</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Título</label>
                    <input type="text" name="titulo" value="{{ old('titulo', $imovel->titulo) }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Preço</label>
                    <input type="text" name="preco" value="{{ old('preco', $imovel->preco) }}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Descrição</label>
                    <textarea name="descricao" rows="4" class="form-control">{{ old('descricao', $imovel->descricao) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Localização -->
        <div class="form-section">
            <h5>Localização</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Cidade</label>
                    <input type="text" name="cidade" value="{{ old('cidade', $imovel->cidade) }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Bairro</label>
                    <input type="text" name="bairro" value="{{ old('bairro', $imovel->bairro) }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Endereço</label>
                    <input type="text" name="endereco" value="{{ old('endereco', $imovel->endereco) }}" class="form-control">
                </div>
            </div>
        </div>

        <!-- Imagens -->
        <div class="form-section">
            <h5>Imagens</h5>
            <div class="mb-3">
                <input type="file" name="imagens[]" class="form-control" multiple>
            </div>
            <div class="d-flex flex-wrap">
                @foreach($imovel->imagens as $imagem)
                    <div class="position-relative me-2 mb-2">
                        <img src="{{ asset('storage/' . $imagem->caminho) }}" class="image-preview">
                        <form action="{{ route('admin.imoveis.deleteImage', [$imovel->id, $imagem->id]) }}" method="POST" class="position-absolute top-0 end-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Botões -->
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.imoveis.index') }}" class="btn btn-outline-primary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>
@endsection
