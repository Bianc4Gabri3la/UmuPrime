@extends('layouts.app')

@section('title', 'Sobre - UmuPrime Imóveis')

@section('content')
<!-- Page Header -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color));">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-dark">Sobre a UmuPrime</h1>
            <p class="lead text-dark">Conheça nossa história e nossos valores</p>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-content">
                    <h2 class="display-6 fw-bold mb-4">Sobre nós</h2>
                    <p class="mb-4">
                        A UmuPrime Imobiliária nasceu com o propósito de transformar a forma como as pessoas encontram o lar dos seus sonhos e fazem
                         os melhores investimentos imobiliários. Nosso compromisso é oferecer atendimento transparente, ágil e personalizado, 
                         sempre colocando as necessidades dos clientes em primeiro lugar.
                    </p>
                    <p class="mb-4">
                        Com uma equipe especializada e apaixonada pelo que faz, buscamos unir conhecimento de mercado, tecnologia 
                        e relacionamento humano para entregar soluções completas na compra, venda e locação de imóveis.
                    </p>
                    <p class="mb-4">
                        Na UmuPrime, acreditamos que cada imóvel conta uma história única — e é nossa missão conectar pessoas a espaços que realmente
                        fazem sentido para suas vidas. Seja para morar, investir ou empreender, oferecemos toda a segurança e confiança que você merece.
                    </p>
                    <p class="mb-4">
                        <strong>UmuPrime Imóveis – seu próximo capítulo começa aqui.</strong>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="UmuPrime Imóveis" 
                         class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">Nossos Valores</h2>
            <p class="lead">Os pilares que guiam nosso trabalho</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-handshake fa-3x" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Confiança</h4>
                    <p class="text-muted">
                        Construímos relacionamentos duradouros baseados na transparência e honestidade 
                        em todas as nossas negociações.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-star fa-3x" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Qualidade</h4>
                    <p class="text-muted">
                        Oferecemos apenas imóveis de qualidade e serviços de excelência, 
                        garantindo a satisfação de nossos clientes.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-users fa-3x" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Atendimento</h4>
                    <p class="text-muted">
                        Nossa equipe está sempre pronta para oferecer um atendimento personalizado 
                        e dedicado a cada cliente.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-lightbulb fa-3x" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Inovação</h4>
                    <p class="text-muted">
                        Utilizamos as mais modernas tecnologias e estratégias para 
                        facilitar o processo de compra, venda e locação.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-shield-alt fa-3x" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Segurança</h4>
                    <p class="text-muted">
                        Todas as transações são realizadas com total segurança jurídica 
                        e acompanhamento profissional.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon mb-3">
                        <i class="fas fa-heart fa-3x" style="color: var(--primary-color);"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Compromisso</h4>
                    <p class="text-muted">
                        Estamos comprometidos em realizar o sonho da casa própria 
                        e encontrar o investimento ideal para cada cliente.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">Nossos Serviços</h2>
            <p class="lead">Soluções completas para o mercado imobiliário</p>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="service-item d-flex">
                    <div class="service-icon me-4">
                        <i class="fas fa-home fa-2x" style="color: var(--primary-color);"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-2">Venda de Imóveis</h4>
                        <p class="text-muted">
                            Ajudamos você a vender seu imóvel pelo melhor preço, com estratégias 
                            de marketing eficazes e acompanhamento completo.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="service-item d-flex">
                    <div class="service-icon me-4">
                        <i class="fas fa-key fa-2x" style="color: var(--primary-color);"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-2">Locação</h4>
                        <p class="text-muted">
                            Encontre o imóvel ideal para alugar ou coloque seu imóvel 
                            para locação com segurança e rentabilidade.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="service-item d-flex">
                    <div class="service-icon me-4">
                        <i class="fas fa-search fa-2x" style="color: var(--primary-color);"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-2">Consultoria</h4>
                        <p class="text-muted">
                            Oferecemos consultoria especializada para investimentos imobiliários 
                            e orientação completa sobre o mercado.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="service-item d-flex">
                    <div class="service-icon me-4">
                        <i class="fas fa-calculator fa-2x" style="color: var(--primary-color);"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-2">Avaliação</h4>
                        <p class="text-muted">
                            Realizamos avaliações precisas e atualizadas do seu imóvel, 
                            baseadas no mercado atual.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">Nossa Equipe</h2>
            <p class="lead">Profissionais qualificados e experientes</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="team-info text-center">
                    <p class="lead mb-4">
                        Nossa equipe é formada por corretores experientes, consultores especializados 
                        e profissionais dedicados que trabalham juntos para oferecer o melhor 
                        atendimento do mercado imobiliário.
                    </p>
                    <p class="mb-4">
                        Todos os nossos profissionais são devidamente registrados no CRECI e 
                        participam regularmente de cursos de atualização e capacitação.
                    </p>
                    <a href="{{ route('contato') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-users"></i> Conheça Nossa Equipe
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background-color: var(--primary-color);">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-6 fw-bold text-dark">Pronto para encontrar seu imóvel ideal?</h2>
                <p class="lead text-dark mb-4">
                    Entre em contato conosco e descubra como podemos ajudar você a realizar seus sonhos imobiliários.
                </p>
                <a href="{{ route('contato') }}" class="btn btn-dark btn-lg me-3">
                    <i class="fas fa-envelope"></i> Fale Conosco
                </a>
                <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg">
                    <i class="fas fa-search"></i> Ver Imóveis
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.value-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.value-card:hover {
    transform: translateY(-5px);
}

.service-item {
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    margin-bottom: 20px;
    transition: transform 0.3s ease;
}

.service-item:hover {
    transform: translateY(-3px);
}
</style>
@endpush

