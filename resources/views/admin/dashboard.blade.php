@extends('layouts.admin')

@section('title', 'Dashboard - Painel Administrativo')
@section('page-title', 'Dashboard')

@section('content')
<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-home"></i>
            </div>
            <div class="stat-number">{{ $totalImoveis }}</div>
            <div class="stat-label">Total de Imóveis</div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-key"></i>
            </div>
            <div class="stat-number">{{ $imoveisAluguel }}</div>
            <div class="stat-label">Para Aluguel</div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-number">{{ $imoveisVenda }}</div>
            <div class="stat-label">Para Venda</div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-number">{{ $imoveisDestaque }}</div>
            <div class="stat-label">Em Destaque</div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="table-card">
            <div class="card-header">
                <h5 class="mb-0">Ações Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.imoveis.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i>
                            Novo Imóvel
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.imoveis.index') }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-list me-2"></i>
                            Listar Imóveis
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary w-100">
                            <i class="fas fa-external-link-alt me-2"></i>
                            Ver Site
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.imoveis.index', ['status' => 'disponivel']) }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-check me-2"></i>
                            Disponíveis ({{ $imoveisDisponiveis }})
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Properties -->
@if($recentesImoveis->count() > 0)
<div class="row">
    <div class="col-12">
        <div class="table-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Imóveis Recentes</h5>
                <a href="{{ route('admin.imoveis.index') }}" class="btn btn-sm btn-outline-dark">
                    Ver Todos
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Referência</th>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentesImoveis as $imovel)
                        <tr>
                            <td>
                                @if($imovel->primeira_imagem)
                                    <img src="{{ asset('storage/' . $imovel->primeira_imagem->caminho_imagem) }}" 
                                         alt="{{ $imovel->titulo }}" 
                                         class="image-preview">
                                @else
                                    <div class="image-preview bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $imovel->referencia }}</strong>
                            </td>
                            <td>{{ $imovel->titulo }}</td>
                            <td>
                                <span class="badge bg-primary">{{ ucfirst($imovel->tipo_negocio) }}</span>
                            </td>
                            <td>{{ $imovel->valor_formatado }}</td>
                            <td>
                                @switch($imovel->status)
                                    @case('disponivel')
                                        <span class="badge bg-success">Disponível</span>
                                        @break
                                    @case('vendido')
                                        <span class="badge bg-danger">Vendido</span>
                                        @break
                                    @case('alugado')
                                        <span class="badge bg-warning">Alugado</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">{{ ucfirst($imovel->status) }}</span>
                                @endswitch
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.imoveis.show', $imovel->id) }}" 
                                       class="btn btn-outline-primary" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.imoveis.edit', $imovel->id) }}" 
                                       class="btn btn-outline-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <div class="table-card">
            <div class="card-body text-center py-5">
                <i class="fas fa-home fa-3x text-muted mb-3"></i>
                <h5>Nenhum imóvel cadastrado</h5>
                <p class="text-muted">Comece cadastrando seu primeiro imóvel.</p>
                <a href="{{ route('admin.imoveis.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    Cadastrar Primeiro Imóvel
                </a>
            </div>
        </div>
    </div>
</div>
@endif

<!-- System Info -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="table-card">
            <div class="card-header">
                <h6 class="mb-0">Informações do Sistema</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <small class="text-muted">Versão Laravel:</small><br>
                        <strong>{{ app()->version() }}</strong>
                    </div>
                    <div class="col-6">
                        <small class="text-muted">Usuário Logado:</small><br>
                        <strong>{{ Auth::user()->name }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="table-card">
            <div class="card-header">
                <h6 class="mb-0">Links Úteis</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-external-link-alt me-2"></i>
                        Visualizar Site
                    </a>
                    <a href="{{ route('contato') }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i>
                        Página de Contato
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

