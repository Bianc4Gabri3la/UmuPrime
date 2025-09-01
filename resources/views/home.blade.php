@extends('layouts.app')

@section('title', 'UmuPrime Imóveis - Sua casa dos sonhos está aqui')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1>Seu imóvel, seu futuro.</h1>
            <p>Nossa qualidade inegociável.</p>
        </div>
    </div>
</section>

<!-- Search Form -->
<div class="container">
    <div class="search-form">
        <form method="GET" action="{{ route('home') }}">
            <div class="row g-3">
                <div class="col-md-2">
                    <label class="form-label">Negócio</label>
                    <select name="tipo_negocio" class="form-select">
                        <option value="">Selecione</option>
                        <option value="aluguel" {{ request('tipo_negocio') == 'aluguel' ? 'selected' : '' }}>Alugar</option>
                        <option value="venda" {{ request('tipo_negocio') == 'venda' ? 'selected' : '' }}>Comprar</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Tipo do Imóvel</label>
                    <select name="tipo_imovel" class="form-select">
                        <option value="">Selecione</option>
                        <option value="apartamento" {{ request('tipo_imovel') == 'apartamento' ? 'selected' : '' }}>Apartamento</option>
                        <option value="casa" {{ request('tipo_imovel') == 'casa' ? 'selected' : '' }}>Casa</option>
                        <option value="terreno" {{ request('tipo_imovel') == 'terreno' ? 'selected' : '' }}>Terreno</option>
                        <option value="comercial" {{ request('tipo_imovel') == 'salacomercial' ? 'selected' : '' }}>Sala Comercial</option>
                         <option value="comercial" {{ request('tipo_imovel') == 'salaocomercial' ? 'selected' : '' }}>Salão Comercial</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Valor mínimo</label>
                    <input type="number" name="valor_min" class="form-control" placeholder="R$ 0,00" value="{{ request('valor_min') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Valor máximo</label>
                    <input type="number" name="valor_max" class="form-control" placeholder="R$ 0,00" value="{{ request('valor_max') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Cidade</label>
                    <input type="text" name="cidade" class="form-control" placeholder="Digite a cidade" value="{{ request('cidade') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Pesquisar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@if($imoveisDestaque->count() > 0)
<!-- Featured Properties -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Imóveis em Destaque</h2>
            <p class="lead">Confira nossa seleção especial de imóveis</p>
        </div>
        
        <div class="row">
            @foreach($imoveisDestaque as $imovel)
            <div class="col-lg-4 col-md-6">
                <div class="property-card">
                    <div class="property-image" style="background-image: url('{{ $imovel->primeira_imagem ? asset('storage/' . $imovel->primeira_imagem->caminho_imagem) : 'https://via.placeholder.com/400x250?text=Sem+Imagem' }}')">
                        <div class="property-badge">{{ ucfirst($imovel->tipo_negocio) }}</div>
                        <div class="property-price">{{ $imovel->valor_formatado }}</div>
                    </div>
                    <div class="property-info">
                        <h5 class="property-title">{{ $imovel->titulo }}</h5>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i> {{ $imovel->endereco }}, {{ $imovel->bairro }} - {{ $imovel->cidade }}
                        </p>
                        <div class="property-features">
                            @if($imovel->quartos)
                            <div class="feature-item">
                                <i class="fas fa-bed"></i> {{ $imovel->quartos }}
                            </div>
                            @endif
                            @if($imovel->banheiros)
                            <div class="feature-item">
                                <i class="fas fa-bath"></i> {{ $imovel->banheiros }}
                            </div>
                            @endif
                            @if($imovel->area_construida)
                            <div class="feature-item">
                                <i class="fas fa-ruler-combined"></i> {{ $imovel->area_construida }}m²
                            </div>
                            @endif
                        </div>
                        <a href="{{ route('imovel.show', $imovel->id) }}" class="btn btn-primary w-100">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Properties -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Todos os Imóveis</h2>
            <p class="lead">Encontre o imóvel perfeito para você</p>
        </div>
        
        @if($imoveis->count() > 0)
        <div class="row">
            @foreach($imoveis as $imovel)
            <div class="col-lg-4 col-md-6">
                <div class="property-card">
                    <div class="property-image" style="background-image: url('{{ $imovel->primeira_imagem ? asset('storage/' . $imovel->primeira_imagem->caminho_imagem) : 'https://via.placeholder.com/400x250?text=Sem+Imagem' }}')">
                        <div class="property-badge">{{ ucfirst($imovel->tipo_negocio) }}</div>
                        <div class="property-price">{{ $imovel->valor_formatado }}</div>
                    </div>
                    <div class="property-info">
                        <h5 class="property-title">{{ $imovel->titulo }}</h5>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i> {{ $imovel->endereco }}, {{ $imovel->bairro }} - {{ $imovel->cidade }}
                        </p>
                        <div class="property-features">
                            @if($imovel->quartos)
                            <div class="feature-item">
                                <i class="fas fa-bed"></i> {{ $imovel->quartos }}
                            </div>
                            @endif
                            @if($imovel->banheiros)
                            <div class="feature-item">
                                <i class="fas fa-bath"></i> {{ $imovel->banheiros }}
                            </div>
                            @endif
                            @if($imovel->area_construida)
                            <div class="feature-item">
                                <i class="fas fa-ruler-combined"></i> {{ $imovel->area_construida }}m²
                            </div>
                            @endif
                        </div>
                        <a href="{{ route('imovel.show', $imovel->id) }}" class="btn btn-primary w-100">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $imoveis->links() }}
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-home fa-3x text-muted mb-3"></i>
            <h4>Nenhum imóvel encontrado</h4>
            <p class="text-muted">Tente ajustar os filtros de busca ou volte mais tarde.</p>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background-color: var(--primary-color);">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-6 fw-bold text-dark">Não encontrou o que procura?</h2>
                <p class="lead text-dark mb-4">Entre em contato conosco e nossa equipe especializada te ajudará a encontrar o imóvel ideal!</p>
                <a href="{{ route('contato') }}" class="btn btn-dark btn-lg me-3">
                    <i class="fas fa-envelope"></i> Fale Conosco
                </a>
                <a href="https://wa.me/5544999999999" class="btn btn-success btn-lg" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

