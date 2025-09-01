<!-- resources/views/admin/imoveis/show.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detalhes do Imóvel</h1>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h3 class="card-title text-warning">{{ $imovel->titulo }}</h3>
                <p class="card-text">{{ $imovel->descricao }}</p>

                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><strong>Referência:</strong> {{ $imovel->referencia }}</li>
                    <li class="list-group-item"><strong>Tipo de Negócio:</strong> {{ ucfirst($imovel->tipo_negocio) }}</li>
                    <li class="list-group-item"><strong>Tipo de Imóvel:</strong> {{ $imovel->tipo_imovel }}</li>
                    <li class="list-group-item"><strong>Valor:</strong> R$ {{ number_format($imovel->valor, 2, ',', '.') }}</li>
                    <li class="list-group-item"><strong>Endereço:</strong> {{ $imovel->endereco }}, {{ $imovel->bairro }} - {{ $imovel->cidade }}</li>
                </ul>
            </div>
        </div>

        {{-- Exibir imagens --}}
        <h4>Imagens do Imóvel</h4>
        <div class="row">
            @forelse($imovel->imagens as $imagem)
                <div class="col-md-3 mb-3">
                    <div class="card border-warning">
                        <img src="{{ asset('storage/' . $imagem->caminho_imagem) }}" class="card-img-top" alt="Imagem do imóvel">
                    </div>
                </div>
            @empty
                <p>Nenhuma imagem cadastrada para este imóvel.</p>
            @endforelse
        </div>

        <div class="mt-4">
            <a href="{{ route('admin.imoveis.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('admin.imoveis.edit', $imovel->id) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
@endsection
