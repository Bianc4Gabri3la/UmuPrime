@extends('layouts.app')

@section('title', 'Imóveis para ' . ucfirst($tipo) . ' - UmuPrime Imóveis')

@section('content')
<!-- Page Header -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color));">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-dark">Imóveis para {{ ucfirst($tipo) }}</h1>
            <p class="lead text-dark">Encontre o imóvel perfeito para você</p>
        </div>
    </div>
</section>

<!-- Search Filters -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="search-filters">
            <form method="GET" action="{{ $tipo == 'aluguel' ? route('imoveis.aluguel') : route('imoveis.venda') }}">
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label">Tipo do Imóvel</label>
                        <select name="tipo_imovel" class="form-select">
                            <option value="">Todos</option>
                            <option value="casa" {{ request('tipo_imovel') == 'casa' ? 'selected' : '' }}>Casa</option>
                            <option value="apartamento" {{ request('tipo_imovel') == 'apartamento' ? 'selected' : '' }}>Apartamento</option>
                            <option value="terreno" {{ request('tipo_imovel') == 'terreno' ? 'selected' : '' }}>Terreno</option>
                            <option value="comercial" {{ request('tipo_imovel') == 'comercial' ? 'selected' : '' }}>Comercial</option>
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
                        <label class="form-label">Bairro</label>
                        <input type="text" name="bairro" class="form-control" placeholder="Digite o bairro" value="{{ request('bairro') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search"></i> Filtrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Properties Listing -->
<section class="py-5">
    <div class="container">
        <!-- Results Info -->
        <div class="results-info mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0">
                        {{ $imoveis->total() }} imóvel(is) encontrado(s)
                        @if(request()->hasAny(['tipo_imovel', 'valor_min', 'valor_max', 'cidade', 'bairro']))
                            <small class="text-muted">com os filtros aplicados</small>
                        @endif
                    </h5>
                </div>
                <div class="col-md-6 text-end">
                    @if(request()->hasAny(['tipo_imovel', 'valor_min', 'valor_max', 'cidade', 'bairro']))
                        <a href="{{ $tipo == 'aluguel' ? route('imoveis.aluguel') : route('imoveis.venda') }}" 
                           class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-times"></i> Limpar Filtros
                        </a>
                    @endif
                </div>
            </div>
        </div>
        
        @if($imoveis->count() > 0)
        <!-- Properties Grid -->
        <div class="row">
            @foreach($imoveis as $imovel)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="property-card">
                    <div class="property-image" style="background-image: url('{{ $imovel->primeira_imagem ? asset('storage/' . $imovel->primeira_imagem->caminho_imagem) : 'https://via.placeholder.com/400x250?text=Sem+Imagem' }}')">
                        <div class="property-badge">{{ ucfirst($imovel->tipo_negocio) }}</div>
                        <div class="property-price">{{ $imovel->valor_formatado }}</div>
                        @if($imovel->destaque)
                        <div class="property-featured">
                            <i class="fas fa-star"></i>
                        </div>
                        @endif
                    </div>
                    <div class="property-info">
                        <h5 class="property-title">{{ $imovel->titulo }}</h5>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i> 
                            {{ $imovel->endereco }}
                            @if($imovel->numero), {{ $imovel->numero }}@endif
                            <br>
                            {{ $imovel->bairro }} - {{ $imovel->cidade }}
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
                            @if($imovel->vagas_garagem)
                            <div class="feature-item">
                                <i class="fas fa-car"></i> {{ $imovel->vagas_garagem }}
                            </div>
                            @endif
                        </div>
                        
                        <!-- Property Type and Reference -->
                        <div class="property-meta mb-3">
                            <small class="text-muted">
                                <strong>Tipo:</strong> {{ ucfirst($imovel->tipo_imovel) }} | 
                                <strong>Ref:</strong> {{ $imovel->referencia }}
                            </small>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="property-actions">
                            <a href="{{ route('imovel.show', $imovel->id) }}" class="btn btn-primary w-100 mb-2">
                                <i class="fas fa-eye"></i> Ver Detalhes
                            </a>
                            <div class="row">
                                <div class="col-6">
                                    <a href="https://wa.me/5544999999999?text=Olá! Tenho interesse no imóvel {{ $imovel->referencia }} - {{ $imovel->titulo }}" 
                                       class="btn btn-success btn-sm w-100" target="_blank">
                                        <i class="fab fa-whatsapp"></i> WhatsApp
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('contato') }}" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-envelope"></i> Contato
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $imoveis->appends(request()->query())->links() }}
        </div>
        
        @else
        <!-- No Results -->
        <div class="no-results text-center py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4>Nenhum imóvel encontrado</h4>
            <p class="text-muted mb-4">
                Não encontramos imóveis que correspondam aos seus critérios de busca.
                <br>Tente ajustar os filtros ou entre em contato conosco.
            </p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <a href="{{ $tipo == 'aluguel' ? route('imoveis.aluguel') : route('imoveis.venda') }}" 
                       class="btn btn-primary me-3">
                        <i class="fas fa-refresh"></i> Ver Todos os Imóveis
                    </a>
                    <a href="{{ route('contato') }}" class="btn btn-outline-primary">
                        <i class="fas fa-envelope"></i> Fale Conosco
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background-color: var(--primary-color);">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-6 fw-bold text-dark">Tem um imóvel para {{ $tipo == 'aluguel' ? 'alugar' : 'vender' }}?</h2>
                <p class="lead text-dark mb-4">
                    Nossa equipe especializada pode ajudar você a {{ $tipo == 'aluguel' ? 'alugar' : 'vender' }} 
                    seu imóvel rapidamente e pelo melhor preço!
                </p>
                <a href="{{ route('contato') }}" class="btn btn-dark btn-lg me-3">
                    <i class="fas fa-home"></i> Anunciar Imóvel
                </a>
                <a href="https://wa.me/5544999999999?text=Olá! Gostaria de anunciar meu imóvel." 
                   class="btn btn-success btn-lg" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.property-featured {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--accent-color);
    color: white;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

.search-filters {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.results-info {
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
}

.property-meta {
    border-top: 1px solid #eee;
    padding-top: 10px;
}

.no-results {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin: 50px 0;
}
</style>
@endpush

