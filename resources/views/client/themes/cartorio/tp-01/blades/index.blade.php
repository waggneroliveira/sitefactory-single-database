@extends($theme->core('client'))
@section('content')
    <!-- Hero Banner -->
    <section id="inicio">
        @foreach ($slides as $slide)
            <div class="hero">

                <picture class="hero-background">
                    <source srcset="{{ asset('storage/' . $slide->path_image_mobile) }}" media="(max-width: 530px)">
                    <img src="{{ asset('storage/' . $slide->path_image) }}" alt="{{ $slide->title ?? 'Imagem do slide' }}" title="{{ $slide->title ?? 'Imagem do slide' }}">
                </picture>

                <div class="hero-overlay"></div>

                <div class="container text-white text-start hero-content"  data-aos="fade-up" data-aos-duration="1000">
                    <div class="row justify-content-start">
                        <div class="col-lg-7 col-md-9">

                            <span class="badge-feature bg-white text-dark mb-3 d-inline-block">
                                {{$slide->btn_title}}                                
                            </span>

                            <h1 class="display-3 fw-bold mb-3 col-lg-11">
                                {{$slide->title}}
                            </h1>

                            <div class="lead mb-4">
                                {!!$slide->description!!}
                            </div>

                            <div class="d-flex flex-wrap gap-3">
                                <a href="#servicos"
                                class="bg-button-one color-button-one rounded-pill px-5 py-3 font-16 fw-semibold hover-zoom text-uppercase">
                                    Nossos serviços
                                    <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>

                                <a href="#contato"
                                class="btn btn-outline-light rounded-pill px-5 py-3 hover-zoom">
                                    Solicite contato
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </section>

    <!-- TRÊS BOXES SOBREPOSTOS -->
    <section class="container overlap-cards">
        <div class="row g-4">
            @foreach ($topics as $topic) 
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ ($loop->index + 1) * 100 }}">
                    <div class="quick-card text-center">
                        <div class="quick-icon mb-3"><i class="bi bi-calendar-check"></i></div>
                        <h5 class="fw-bold">{{$topic->title}}</h5>
                        <p class="text-secondary small">{{$topic->description}}</p>
                        @if (isset($topic) && $topic->link <> null)
                            <a href="{{$topic->link}}" class="text-decoration-none fw-semibold secondary-color">{{$topic->btn_title}} <i class="bi bi-arrow-right-short"></i></a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Quem Somos -->
    <section id="quem-somos" class="about py-5 py-md-6" style="padding-top: 3rem;">
        <div class="container py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-1 order-2" data-aos="fade-right">
                    <h2 class="fw-bold mb-3">{{$about->title}} <span class="primary-color">{{$about->subtitle}}</span></h2>
                    <div class="gold-divider"></div>
                    <p class="lead fs-5 text-secondary">{{$about->link}}</p>
                    <div class="mt-3">
                        {!! $about->text !!}
                    </div>
                    
                    <a href="#contato" class="bg-button-two color-button-two rounded-pill px-4 py-2 d-table mt-3 fw-semibold hover-zoom">Fale com especialista <i class="bi bi-chat-dots"></i></a>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 text-center" data-aos="fade-left">
                    <img src="{{asset('storage/' . $about->path_image)}}" alt="Equipe do cartório" class="img-fluid rounded-4 shadow-lg quem-somos-img" style="max-height: 420px; width: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

    <!-- Serviços com MODAL -->
    <section id="servicos" class="py-5 bg-light">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge-feature bg-dark text-warning px-3 py-2">Nossas especialidades</span>
                <h2 class="display-6 fw-bold mt-3">Serviços com <span class="text-warning">excelência</span></h2>
                <p class="lead text-secondary mx-auto" style="max-width: 680px;">Clique em cada serviço e veja informações detalhadas.</p>
            </div>
            @if (isset($services) && $services->count())
                <div class="row g-4">
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                            <div
                                class="card service-card h-100 p-4"
                                data-bs-toggle="modal"
                                data-bs-target="#modalServico"
                                data-servico-titulo="{{ $service->title }}"
                                data-servico-desc="{{ $service->text ?? '' }}"
                                data-servico-link="{{ $service->link ?? '' }}"
                                data-servico-scroll="{{ $service->scroll_section ?? '' }}"
                            >

                                @if ($service->path_icon != null)
                                    <div class="service-icon mb-3">
                                        <img
                                            src="{{ asset('storage/' . $service->path_icon) }}"
                                            alt="{{ $service->title }}"
                                        >
                                    </div>
                                @endif

                                <h5 class="fw-bold">{{ $service->title }}</h5>

                                <p class="text-secondary">
                                    {{ $service->description }}
                                </p>

                                <hr class="my-2">

                                <small class="text-muted">
                                    <i class="bi bi-info-circle"></i>
                                    Clique para detalhes
                                </small>

                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-5" data-aos="fade-up">
                    <a href="#contato" class="btn btn-outline-warning rounded-pill px-5 fw-semibold">Solicitar atendimento</a>
                </div>
            @endif
        </div>
    </section>

    <!-- Modal Serviço -->
    <div class="modal fade" id="modalServico" tabindex="-1" aria-labelledby="modalServicoLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow">

                <div class="modal-header bg-warning bg-opacity-10 border-0">
                    <h5 class="modal-title fw-bold" id="modalServicoLabel">
                        <i class="bi bi-star-fill text-warning me-2"></i>
                        <span id="modalTitulo">Serviço</span>
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Fechar">
                    </button>
                </div>

                <div class="modal-body">
                    <div id="modalDescricao" class="fs-6 text-secondary"></div>
                </div>

                <div class="modal-footer bg-light">
                    <a
                        href="#"
                        id="modalSolicitar"
                        class="btn btn-warning rounded-pill px-4 d-none"
                    >
                        Solicitar serviço
                    </a>

                    <button
                        type="button"
                        class="btn btn-outline-secondary rounded-pill"
                        data-bs-dismiss="modal">
                        Fechar
                    </button>
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const modalServico = document.getElementById('modalServico');

            if (!modalServico) {
                return;
            }

            modalServico.addEventListener('show.bs.modal', function (event) {

                const serviceCard = event.relatedTarget;

                if (!serviceCard) {
                    return;
                }

                const titulo = serviceCard.dataset.servicoTitulo || 'Serviço';
                const descricao = serviceCard.dataset.servicoDesc || '';
                const link = serviceCard.dataset.servicoLink || '';
                const scroll = serviceCard.dataset.servicoScroll || '';

                const modalTitulo = modalServico.querySelector('#modalTitulo');
                const modalDescricao = modalServico.querySelector('#modalDescricao');
                const modalSolicitar = modalServico.querySelector('#modalSolicitar');

                modalTitulo.textContent = titulo;
                modalDescricao.innerHTML = descricao;

                // Esconde o botão inicialmente
                modalSolicitar.classList.add('d-none');

                /*
                * LINK
                */
                if (link) {

                    modalSolicitar.href = link;
                    modalSolicitar.target = '_blank';
                    modalSolicitar.rel = 'noopener noreferrer';

                    modalSolicitar.classList.remove('d-none');

                /*
                * SCROLL
                */
                } else if (scroll) {

                    modalSolicitar.href = '#' + scroll;
                    modalSolicitar.removeAttribute('target');
                    modalSolicitar.removeAttribute('rel');

                    modalSolicitar.classList.remove('d-none');

                    modalSolicitar.addEventListener('click', function () {

                        const modalInstance = bootstrap.Modal.getInstance(modalServico);

                        if (modalInstance) {
                            modalInstance.hide();
                        }

                    }, { once: true });

                /*
                * NENHUMA AÇÃO
                */
                } else {

                    modalSolicitar.href = '#';
                    modalSolicitar.removeAttribute('target');
                    modalSolicitar.removeAttribute('rel');

                    modalSolicitar.classList.add('d-none');
                }

            });

            modalServico.addEventListener('hidden.bs.modal', function () {

                document.activeElement?.blur();

                const modalSolicitar = modalServico.querySelector('#modalSolicitar');

                modalSolicitar.href = '#';
                modalSolicitar.removeAttribute('target');
                modalSolicitar.removeAttribute('rel');
                modalSolicitar.classList.add('d-none');

            });

        });
    </script>
    <!-- SEÇÃO CASAMENTO ELEGANTE COM FANCYBOX -->
    <section id="galeria-casamento" class="py-5 wedding-section">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge-feature bg-dark text-warning px-3 py-2">União que transforma</span>
                <h2 class="display-5 fw-bold mt-3">Faça seu <span class="text-warning">Casamento</span></h2>
                <div class="gold-divider mx-auto" style="margin: 1rem auto;"></div>
                <p class="lead text-secondary mx-auto" style="max-width: 700px;">Celebre o amor com segurança jurídica. Do planejamento à cerimônia, oferecemos todo suporte cartorário para o seu grande dia.</p>
            </div>

            <!-- Imagem principal destaque com Fancybox -->
            <div class="row justify-content-center mb-5" data-aos="fade-up">
                <div class="col-lg-10">
                    <div class="wedding-card">
                        <a href="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format" data-fancybox="wedding-gallery" data-caption="Cerimônia Civil - Um momento único no cartório">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format" class="wedding-highlight-img" alt="Casamento principal">
                        </a>
                        <div class="p-4 text-center bg-white">
                            <h4 class="fw-semibold">Cerimônia especial e documentação completa</h4>
                            <p class="text-muted">Habilitação de casamento, certidão e todo o suporte necessário com agilidade e respeito.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Galeria com miniaturas elegantes (Fancybox) -->
            <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-3 col-6">
                    <div class="gallery-grid-item">
                        <a href="https://images.unsplash.com/photo-1583939003579-730e3918a45a?q=80&w=1974&auto=format" data-fancybox="wedding-gallery" data-caption="Momentos de alegria e celebração">
                            <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?q=80&w=1974&auto=format" alt="Casamento ao ar livre">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="gallery-grid-item">
                        <a href="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=2070&auto=format" data-fancybox="wedding-gallery" data-caption="Alianças e buquê - símbolos do amor eterno">
                            <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=2070&auto=format" alt="Detalhes do casamento">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="gallery-grid-item">
                        <a href="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?q=80&w=2070&auto=format" data-fancybox="wedding-gallery" data-caption="Salão do cartório decorado para ocasiões especiais">
                            <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?q=80&w=2070&auto=format" alt="Espaço casamento">
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="gallery-grid-item">
                        <a href="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=2070&auto=format" data-fancybox="wedding-gallery" data-caption="Felicidade e união - um novo começo">
                            <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=2070&auto=format" alt="Felicidade casal">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5 pt-3" data-aos="fade-up">
                <p class="fs-5 fw-light">Oferecemos todo suporte com carinho: desde a documentação até a cerimônia assistida.</p>
                <a href="#contato" class="btn btn-gold rounded-pill px-5 py-3 mt-2">Quero realizar meu sonho <i class="bi bi-heart-fill ms-2"></i></a>
            </div>
        </div>
    </section>

    <!-- Contato -->
    <section id="contato" class="py-5 bg-light">
        <div class="container py-4">
            <div class="row g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info h-100 d-flex flex-column justify-content-center">
                        <div class="icon d-flex justify-content-start align-item-center gap-3">
                            <i class="bi bi-geo-alt-fill fs-1 text-warning mb-3"></i>
                            <div class="col-10">
                                <h3 class="fw-bold">Entre em contato</h3>
                                <p class="lead fs-6">Estamos localizados no centro, com fácil acesso e estrutura completa.</p>
                            </div>
                        </div>
                        <div class="mt-3 mb-3">
                            <div class="d-flex gap-3 mb-3 align-items-center"><i class="bi bi-pin-map-fill fs-4 text-secondary"></i><span>Rua XV de Novembro, 345 - Centro, São Paulo/SP - CEP 01010-000</span></div>
                            <div class="d-flex gap-3 mb-3 align-items-center"><i class="bi bi-telephone-fill fs-4 text-secondary"></i><span>(11) 3456-7890 / (11) 98765-4321</span></div>
                            <div class="d-flex gap-3 mb-3 align-items-center"><i class="bi bi-envelope-fill fs-4 text-secondary"></i><span>contato@cartoriooficial.com.br</span></div>
                            <div class="d-flex gap-3 align-items-center"><i class="bi bi-clock-fill fs-4 text-secondary"></i><span>Segunda a Sexta: 9h às 17h | Sábado: 9h às 12h</span></div>
                        </div>
                        
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.1223703424525!2d-38.41343729179306!3d-12.899852065284609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7161174b4f6de4f%3A0xf23a2bae7c4813aa!2s6%C2%BA%20Of%C3%ADcio%20de%20Registro%20Civil%20de%20Salvador%20(Subdistrito%20de%20Val%C3%A9ria%20e%20S%C3%A3o%20Crist%C3%B3v%C3%A3o)!5e0!3m2!1spt-BR!2sbr!4v1779822888942!5m2!1spt-BR!2sbr" 
                        width="100%" 
                        height="250" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="bg-white shadow-sm rounded-4 p-4 p-md-5">
                        <h4 class="fw-semibold">Envie sua mensagem</h4>
                        <p class="text-muted mb-4">Respondemos em até 2 horas úteis.</p>
                        <form id="formContato">
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label">Nome completo</label><input type="text" class="form-control" required></div>
                                <div class="col-md-6"><label class="form-label">E-mail</label><input type="email" class="form-control" required></div>
                                <div class="col-12"><label class="form-label">Telefone</label><input type="tel" class="form-control"></div>
                                <div class="col-12"><label class="form-label">Assunto</label><select class="form-select"><option>Registro Civil</option><option>Tabelionato</option><option>Casamento</option><option>Certidões</option></select></div>
                                <div class="col-12"><label class="form-label">Mensagem</label><textarea class="form-control" rows="4"></textarea></div>
                                <div class="col-12"><button type="submit" class="btn btn-warning fw-semibold px-5 rounded-pill">Enviar mensagem <i class="bi bi-send"></i></button></div>
                            </div>
                        </form>
                        <div class="alert alert-success mt-4 d-none" id="msgAlert">Mensagem enviada! Em breve entraremos em contato.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .about li::before{
            color: var(--primary-color);
        }
        .quick-card{
            border-bottom: 3px solid var(--secondary-color);
        }
    </style>
@endsection
