@extends('layouts.app')

@section('title', $imovel->titulo . ' - UmuPrime Imóveis')

@section('content')
<!-- Property Header -->
<section class="py-4 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Início</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ $imovel->tipo_negocio == 'aluguel' ? route('imoveis.aluguel') : route('imoveis.venda') }}">
                        Imóveis para {{ ucfirst($imovel->tipo_negocio) }}
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $imovel->referencia }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Property Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Property Images -->
            <div class="col-lg-8">
                <div class="property-images mb-4">
                    @if($imovel->imagens->count() > 0)
                        <!-- Main Image -->
                        <div class="main-image mb-3">
                            <img src="{{ asset('storage/' . $imovel->imagens->first()->caminho_imagem) }}" 
                                 alt="{{ $imovel->titulo }}" 
                                 class="img-fluid rounded shadow"
                                 style="width: 100%; height: 400px; object-fit: cover;">
                        </div>
                        
                        @if($imovel->imagens->count() > 1)
                        <!-- Thumbnail Gallery -->
                        <div class="row">
                            @foreach($imovel->imagens->skip(1) as $imagem)
                            <div class="col-md-3 col-6 mb-3">
                                <img src="{{ asset('storage/' . $imagem->caminho_imagem) }}" 
                                     alt="{{ $imovel->titulo }}" 
                                     class="img-fluid rounded shadow-sm thumbnail-image"
                                     style="width: 100%; height: 120px; object-fit: cover; cursor: pointer;">
                            </div>
                            @endforeach
                        </div>
                        @endif
                    @else
                        <div class="no-image text-center py-5 bg-light rounded">
                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Nenhuma imagem disponível</p>
                        </div>
                    @endif
                </div>
                
                <!-- Property Description -->
                <div class="property-description">
                    <h2 class="h4 fw-bold mb-3">Descrição do Imóvel</h2>
                    @if($imovel->descricao)
                        <p class="text-muted">{{ $imovel->descricao }}</p>
                    @else
                        <p class="text-muted">Descrição não disponível.</p>
                    @endif
                </div>
                
                <!-- Property Features -->
                @if($imovel->caracteristicas->count() > 0)
                <div class="property-features mt-4">
                    <h2 class="h4 fw-bold mb-3">Características</h2>
                    <div class="row">
                        @foreach($imovel->caracteristicas as $caracteristica)
                        <div class="col-md-6 mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            {{ $caracteristica->caracteristica }}
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Property Info Sidebar -->
            <div class="col-lg-4">
                <div class="property-info-card">
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- Price -->
                            <div class="price-section text-center mb-4">
                                <div class="property-type badge bg-primary mb-2">
                                    {{ ucfirst($imovel->tipo_negocio) }}
                                </div>
                                <h3 class="price fw-bold mb-0" style="color: var(--primary-color);">
                                    {{ $imovel->valor_formatado }}
                                </h3>
                                @if($imovel->tipo_negocio == 'aluguel')
                                <small class="text-muted">/ mês</small>
                                @endif
                            </div>
                            
                            <!-- Property Details -->
                            <div class="property-details mb-4">
                                <h5 class="fw-bold mb-3">{{ $imovel->titulo }}</h5>
                                <p class="text-muted mb-3">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    {{ $imovel->endereco }}
                                    @if($imovel->numero), {{ $imovel->numero }}@endif
                                    <br>
                                    {{ $imovel->bairro }} - {{ $imovel->cidade }}/{{ $imovel->estado }}
                                </p>
                                
                                <div class="property-specs">
                                    <div class="row text-center">
                                        @if($imovel->quartos)
                                        <div class="col-4">
                                            <div class="spec-item">
                                                <i class="fas fa-bed fa-2x mb-2" style="color: var(--primary-color);"></i>
                                                <div class="fw-bold">{{ $imovel->quartos }}</div>
                                                <small class="text-muted">Quartos</small>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        @if($imovel->banheiros)
                                        <div class="col-4">
                                            <div class="spec-item">
                                                <i class="fas fa-bath fa-2x mb-2" style="color: var(--primary-color);"></i>
                                                <div class="fw-bold">{{ $imovel->banheiros }}</div>
                                                <small class="text-muted">Banheiros</small>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        @if($imovel->area_construida)
                                        <div class="col-4">
                                            <div class="spec-item">
                                                <i class="fas fa-ruler-combined fa-2x mb-2" style="color: var(--primary-color);"></i>
                                                <div class="fw-bold">{{ $imovel->area_construida }}</div>
                                                <small class="text-muted">m²</small>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Additional Info -->
                            <div class="additional-info mb-4">
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Referência:</strong><br>
                                        <span class="text-muted">{{ $imovel->referencia }}</span>
                                    </div>
                                    <div class="col-6">
                                        <strong>Tipo:</strong><br>
                                        <span class="text-muted">{{ ucfirst($imovel->tipo_imovel) }}</span>
                                    </div>
                                </div>
                                
                                @if($imovel->area_total)
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <strong>Área Total:</strong><br>
                                        <span class="text-muted">{{ $imovel->area_total }}m²</span>
                                    </div>
                                    @if($imovel->vagas_garagem)
                                    <div class="col-6">
                                        <strong>Garagem:</strong><br>
                                        <span class="text-muted">{{ $imovel->vagas_garagem }} vaga(s)</span>
                                    </div>
                                    @endif
                                </div>
                                @endif
                            </div>
                            
                            <!-- Contact Buttons -->
                            <div class="contact-buttons">
                                <a href="https://wa.me/5544999999999?text=Olá! Tenho interesse no imóvel {{ $imovel->referencia }} - {{ $imovel->titulo }}" 
                                   class="btn btn-success w-100 mb-3" target="_blank">
                                    <i class="fab fa-whatsapp"></i> Conversar no WhatsApp
                                </a>
                                
                                <a href="{{ route('contato') }}" class="btn btn-primary w-100">
                                    <i class="fas fa-envelope"></i> Enviar Mensagem
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Properties -->
@if($imoveisRelacionados->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">Imóveis Relacionados</h2>
            <p class="lead">Outros imóveis que podem interessar você</p>
        </div>
        
        <div class="row">
            @foreach($imoveisRelacionados as $relacionado)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="property-card">
                    <div class="property-image" style="background-image: url('{{ $relacionado->primeira_imagem ? asset('storage/' . $relacionado->primeira_imagem->caminho_imagem) : 'https://via.placeholder.com/400x250?text=Sem+Imagem' }}')">
                        <div class="property-badge">{{ ucfirst($relacionado->tipo_negocio) }}</div>
                        <div class="property-price">{{ $relacionado->valor_formatado }}</div>
                    </div>
                    <div class="property-info">
                        <h5 class="property-title">{{ $relacionado->titulo }}</h5>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i> {{ $relacionado->bairro }} - {{ $relacionado->cidade }}
                        </p>
                        <div class="property-features">
                            @if($relacionado->quartos)
                            <div class="feature-item">
                                <i class="fas fa-bed"></i> {{ $relacionado->quartos }}
                            </div>
                            @endif
                            @if($relacionado->banheiros)
                            <div class="feature-item">
                                <i class="fas fa-bath"></i> {{ $relacionado->banheiros }}
                            </div>
                            @endif
                            @if($relacionado->area_construida)
                            <div class="feature-item">
                                <i class="fas fa-ruler-combined"></i> {{ $relacionado->area_construida }}m²
                            </div>
                            @endif
                        </div>
                        <a href="{{ route('imovel.show', $relacionado->id) }}" class="btn btn-primary w-100">
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
@endsection

@push('scripts')
<script>
// Image gallery functionality
document.addEventListener('DOMContentLoaded', function() {
    const thumbnails = document.querySelectorAll('.thumbnail-image');
    const mainImage = document.querySelector('.main-image img');
    
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            mainImage.src = this.src;
        });
    });
});
</script>
@endpush

