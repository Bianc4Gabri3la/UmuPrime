@extends('layouts.app')

@section('title', 'Contato - UmuPrime Imóveis')

@section('content')
<!-- Page Header -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color));">
    <div class="container">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-dark">Entre em Contato</h1>
            <p class="lead text-dark">Estamos aqui para ajudar você a encontrar o imóvel perfeito</p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-lg-6">
                <div class="mb-5">
                    <h2 class="h3 fw-bold mb-4">Informações de Contato</h2>
                    
                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-map-marker-alt fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Endereço</h5>
                                <p class="text-muted mb-0">Rua Ministro Oliveira Salazar, 4665, Umuarama - PR</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-phone fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Telefone</h5>
                                <p class="text-muted mb-0">(44) 2020-2657</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fas fa-envelope fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">E-mail</h5>
                                <p class="text-muted mb-0">umuprimeimoveis@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-center">
                            <div class="contact-icon me-3">
                                <i class="fab fa-whatsapp fa-2x" style="color: var(--primary-color);"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">WhatsApp</h5>
                                <p class="text-muted mb-0">(44) 9 8435-5225</p>
                                <a href="https://wa.me/5544984355225?text=Olá! Gostaria de mais informações sobre os imóveis." 
                                   class="btn btn-success btn-sm mt-2" target="_blank">
                                    <i class="fab fa-whatsapp"></i> Conversar no WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <h5 class="mb-3">Redes Sociais</h5>
                        <div class="social-links flex-wrap gap-2 ">
                            <a href="https://www.instagram.com/umuprime" target="_blank" class="justify-content-center" >
                                <i class="fab fa-instagram"></i> 
                            </a>
                            <a href="https://www.facebook.com/umuprime" target="_blank" class="justify-content-center">
                                <i class="fab fa-facebook"></i> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="contact-form-wrapper">
                    <h2 class="h3 fw-bold mb-4">Envie uma Mensagem</h2>
                    
                    <form id="contactForm" class="contact-form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nome" class="form-label">Nome *</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefone" class="form-label">Telefone *</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="assunto" class="form-label">Assunto</label>
                            <select class="form-select" id="assunto" name="assunto">
                                <option value="">Selecione um assunto</option>
                                <option value="compra">Interesse em Compra</option>
                                <option value="aluguel">Interesse em Aluguel</option>
                                <option value="venda">Quero Vender meu Imóvel</option>
                                <option value="avaliacao">Avaliação de Imóvel</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="mensagem" class="form-label">Mensagem *</label>
                            <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-paper-plane"></i> Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold">Nossa Localização</h2>
            <p class="lead">Venha nos visitar em Umuarama</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="map-container" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <iframe src="https://www.google.com/maps/embed?pb=!3m2!1spt-BR!2sbr!4v1756152067481!5m2!1spt-BR!2sbr!6m8!1m7!1sIptqoYtkm3y_AgXsJWJp3w!2m2!1d-23.75971440250656!2d-53.30556481106415!3f344.87186954183153!4f-6.70080586368428!5f0.7820865974627469" 
                            width="100%" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Coletar dados do formulário
    const formData = new FormData(this);
    const nome = formData.get('nome');
    const telefone = formData.get('telefone');
    const email = formData.get('email');
    const assunto = formData.get('assunto');
    const mensagem = formData.get('mensagem');
    
    // Criar mensagem para WhatsApp
    let whatsappMessage = `Olá! Meu nome é ${nome}.\n\n`;
    whatsappMessage += `📧 E-mail: ${email}\n`;
    whatsappMessage += `📱 Telefone: ${telefone}\n`;
    
    if (assunto) {
        whatsappMessage += `📋 Assunto: ${assunto}\n`;
    }
    
    whatsappMessage += `\n💬 Mensagem:\n${mensagem}`;
    
    // Codificar a mensagem para URL
    const encodedMessage = encodeURIComponent(whatsappMessage);
    
    // Abrir WhatsApp
    const whatsappUrl = `https://wa.me/5544999999999?text=${encodedMessage}`;
    window.open(whatsappUrl, '_blank');
    
    // Mostrar mensagem de sucesso
    alert('Redirecionando para o WhatsApp...');
    
    // Limpar formulário
    this.reset();
});
</script>
@endpush

