@extends($theme->core('client'))
@section('content')
    @if (isset($slides) && $slides->count() > 0)
        <section class="hero">
        <div class="swiper main-swiper">

            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <!-- Slide -->
                    <div class="swiper-slide">
                        <div class="hero-slide">

                        <!-- Imagem full -->
                        <div class="hero-bg">
                            <picture>
                                <source srcset="{{ asset('storage/' . $slide->path_image_mobile) }}" media="(max-width: 530px)">
                                <img src="{{ asset('storage/' . $slide->path_image) }}" alt="Distribuição PET" title="Distribuição PET">
                            </picture>
                        </div>

                        <!-- Conteúdo -->
                        <div class="hero-content mt-5 mt-lg-0">
                            <div class="container">
                            <div class="row">
                                <div class="col-lg-6">

                                    <span class="hero-subtitle font-changa font-15 font-regular">
                                        {!!$slide->description!!}
                                    </span>

                                    <h1 class="hero-title font-changa font-40 font-bold">
                                        {{$slide->title}}
                                    </h1>

                                    <div class="hero-actions d-flex">
                                        @if ($slide->link <> null)                                    
                                            <a href="{{$slide->link}}" target="_blank" rel="noopener noreferrer" class="btn-one py-2 px-3 px-lg-5 btn-hero font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none hover-zoom">
                                                {{$slide->btn_title}}
                                                <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-one)"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            </div>
                        </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Paginação -->
            <div class="swiper-pagination news"></div>
        </div>
        </section>
    @endif
    
    @if (isset($about) && $about <> null)
        <section class="about bg-white">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                <!-- TEXTO (dentro do container) -->
                <div class="col-12 col-lg-5 mt-4 mt-lg-0 z-3">
                    <div class="container position-relative">
                        <span class="secondary-color font-changa font-16 font-bold d-block mb-2">
                            Quem Somos?
                        </span>

                        <h3 class="about-title font-changa font-40 font-bold mb-3 text-black">
                            {{$about->title}} <span class="primary-color">{{$about->subtitle}}</span>
                        </h3>

                        <!-- Conteúdo adicional opcional -->
                        <div class="description">
                            {!! $about->text !!}
                        </div>

                        @if ($about->link <> null)                        
                            <div class="btn-about my-4 d-flex justify-content-center justify-content-lg-start">
                                <a href="{{$about->link}}" class=" py-2 px-3 px-lg-5 font-changa bg-button-two color-button-two font-18 font-medium text-decoration-none hover-zoom" rel="noopener noreferrer">
                                    Conheça
                                    <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-two)"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                @if (isset($about->path_image) && $about->path_image <> null)                    
                    <!-- IMAGEM (fora do container) -->
                    <div class="col-12 col-lg-6 p-0 about-image">
                        <img
                        src="{{asset('storage/'.$about->path_image)}}"
                        alt="Sobre a Girollato"
                        class="img-fluid w-100"
                        loading="lazy"
                        >
                    </div>
                @endif
                </div>
            </div>
        </section>
    @endif

    <section class="py-5" style="background-color: #174789;">
        <div class="container">

            <!-- Cabeçalho -->
            <div class="row align-items-end mb-4">

                <div class="col-lg-4">
                    <span class="badge bg-white text-dark px-4 py-2 mb-3">
                        Serviços
                    </span>

                    <h2 class="text-white fw-bold mb-0">
                        Conheça os nossos<br>
                        principais serviços
                    </h2>
                </div>

                <div class="col-lg-5 mt-3 mt-lg-0">
                    <p class="text-white small mb-0">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since 1965.
                    </p>
                </div>

                <div class="col-lg-3 mt-3 mt-lg-0">
                    <div class="d-flex justify-content-lg-end gap-2">
                        <button class="btn btn-outline-light rounded-circle swiper-button-prev-custom"
                                type="button">
                            <i class="bi bi-chevron-left"></i>
                        </button>

                        <button class="btn btn-outline-light rounded-circle swiper-button-next-custom"
                                type="button">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>

            </div>

            <!-- Swiper -->
            <div class="swiper servicesSwiper">
                <div class="swiper-wrapper">

                    <!-- Serviço 1 -->
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden">

                            <div class="p-2">
                                <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1000&auto=format&fit=crop"
                                    class="card-img-top rounded-4"
                                    alt="Armazenamento seguro">
                            </div>

                            <div class="card-body d-flex flex-column pt-0">

                                <div class="mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-warning rounded-3 p-2">
                                        <i class="bi bi-shield-check fs-5"></i>
                                    </span>
                                </div>

                                <h5 class="fw-bold mb-2">
                                    Armazenamento seguro de mercadorias
                                </h5>

                                <p class="text-muted small flex-grow-1">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy
                                    text ever since 1966.
                                </p>

                                <button type="button"
                                        class="btn btn-outline-dark rounded-pill w-100 d-flex align-items-center justify-content-between service-modal-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#serviceModal"
                                        data-title="Armazenamento seguro de mercadorias"
                                        data-icon="bi-shield-check"
                                        data-description="Oferecemos soluções completas para armazenamento seguro de mercadorias, garantindo organização, proteção e eficiência durante todo o período de armazenagem.">
                                    <span>Explore Mais</span>
                                    <i class="bi bi-chevron-right"></i>
                                </button>

                            </div>
                        </div>
                    </div>

                    <!-- Serviço 2 -->
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden">

                            <div class="p-2">
                                <img src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?q=80&w=1000&auto=format&fit=crop"
                                    class="card-img-top rounded-4"
                                    alt="Envio internacional">
                            </div>

                            <div class="card-body d-flex flex-column pt-0">

                                <div class="mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-warning rounded-3 p-2">
                                        <i class="bi bi-globe fs-5"></i>
                                    </span>
                                </div>

                                <h5 class="fw-bold mb-2">
                                    Envio internacional
                                </h5>

                                <p class="text-muted small flex-grow-1">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy
                                    text ever since 1966.
                                </p>

                                <button type="button"
                                        class="btn btn-outline-dark rounded-pill w-100 d-flex align-items-center justify-content-between service-modal-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#serviceModal"
                                        data-title="Envio internacional"
                                        data-icon="bi-globe"
                                        data-description="Realizamos envios internacionais com segurança e acompanhamento, oferecendo soluções logísticas para diferentes destinos e necessidades.">
                                    <span>Explore Mais</span>
                                    <i class="bi bi-chevron-right"></i>
                                </button>

                            </div>
                        </div>
                    </div>

                    <!-- Serviço 3 -->
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden">

                            <div class="p-2">
                                <img src="https://images.unsplash.com/photo-1580674684081-7617fbf3d745?q=80&w=1000&auto=format&fit=crop"
                                    class="card-img-top rounded-4"
                                    alt="Manuseio profissional">
                            </div>

                            <div class="card-body d-flex flex-column pt-0">

                                <div class="mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-warning rounded-3 p-2">
                                        <i class="bi bi-box-seam fs-5"></i>
                                    </span>
                                </div>

                                <h5 class="fw-bold mb-2">
                                    Manuseio profissional
                                </h5>

                                <p class="text-muted small flex-grow-1">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy
                                    text ever since 1966.
                                </p>

                                <button type="button"
                                        class="btn btn-outline-dark rounded-pill w-100 d-flex align-items-center justify-content-between service-modal-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#serviceModal"
                                        data-title="Manuseio profissional"
                                        data-icon="bi-box-seam"
                                        data-description="Nossa equipe realiza o manuseio profissional das mercadorias, seguindo processos cuidadosamente planejados para garantir segurança e agilidade.">
                                    <span>Explore Mais</span>
                                    <i class="bi bi-chevron-right"></i>
                                </button>

                            </div>
                        </div>
                    </div>

                    <!-- Serviço 4 -->
                    <div class="swiper-slide">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden">

                            <div class="p-2">
                                <img src="https://images.unsplash.com/photo-1616432043562-3671ea2e5242?q=80&w=1000&auto=format&fit=crop"
                                    class="card-img-top rounded-4"
                                    alt="Entrega rápida de carga">
                            </div>

                            <div class="card-body d-flex flex-column pt-0">

                                <div class="mb-2">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-warning rounded-3 p-2">
                                        <i class="bi bi-truck fs-5"></i>
                                    </span>
                                </div>

                                <h5 class="fw-bold mb-2">
                                    Entrega rápida de carga
                                </h5>

                                <p class="text-muted small flex-grow-1">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy
                                    text ever since 1966.
                                </p>

                                <button type="button"
                                        class="btn btn-outline-dark rounded-pill w-100 d-flex align-items-center justify-content-between service-modal-btn"
                                        data-bs-toggle="modal"
                                        data-bs-target="#serviceModal"
                                        data-title="Entrega rápida de carga"
                                        data-icon="bi-truck"
                                        data-description="Conte com nossa estrutura para realizar entregas rápidas de cargas, com eficiência, segurança e acompanhamento durante o processo logístico.">
                                    <span>Explore Mais</span>
                                    <i class="bi bi-chevron-right"></i>
                                </button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 overflow-hidden">

                <div class="modal-header">
                    <div class="d-flex align-items-center gap-3">
                        <span class="d-inline-flex align-items-center justify-content-center bg-warning rounded-3 p-2">
                            <i id="serviceModalIcon" class="bi fs-5"></i>
                        </span>

                        <h5 class="modal-title fw-bold mb-0" id="serviceModalLabel">
                            Serviço
                        </h5>
                    </div>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <p id="serviceModalDescription" class="text-muted mb-0"></p>
                </div>

            </div>
        </div>
    </div>

    <style>
        .servicesSwiper .swiper-slide {
            height: auto;
        }

        .servicesSwiper .card {
            min-height: 100%;
        }

        .servicesSwiper .card-img-top {
            height: 105px;
            object-fit: cover;
        }

        .servicesSwiper .card-body h5 {
            font-size: 1rem;
        }

        .servicesSwiper .btn-outline-dark {
            font-size: 0.8rem;
            padding: 0.6rem 0.9rem;
        }

        .swiper-button-prev-custom,
        .swiper-button-next-custom {
            width: 42px;
            height: 42px;
        }

        @media (max-width: 767.98px) {
            .servicesSwiper .card-img-top {
                height: 180px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const servicesSwiper = new Swiper('.servicesSwiper', {
                slidesPerView: 1,
                spaceBetween: 12,

                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },

                breakpoints: {
                    576: {
                        slidesPerView: 2,
                        spaceBetween: 12
                    },

                    992: {
                        slidesPerView: 4,
                        spaceBetween: 12
                    }
                }
            });

            const serviceModal = document.getElementById('serviceModal');

            serviceModal.addEventListener('show.bs.modal', function (event) {

                const button = event.relatedTarget;

                const title = button.dataset.title;
                const icon = button.dataset.icon;
                const description = button.dataset.description;

                document.getElementById('serviceModalLabel').textContent = title;

                document.getElementById('serviceModalDescription').textContent = description;

                const modalIcon = document.getElementById('serviceModalIcon');

                modalIcon.className = 'bi fs-5 ' + icon;
            });

        });
    </script>

    @if (isset($sessaoFaq) && $sessaoFaq <> null || isset($faqs) && $faqs->count())
        <section id="faq" class="faq-section pt-5 bg-grey-light">
            <div class="container">
                <div class="row align-items-start g-5">
                    @if (isset($sessaoFaq) && $sessaoFaq <> null)
                        <!-- COLUNA ESQUERDA -->
                        <div class="col-lg-5">
                            <!-- Header -->
                            <div class="mb-4">
                                <h3 class="faq-title font-changa font-50 font-bold color-grey mb-3">
                                    {{$sessaoFaq->title}} <span class="primary-color">{{$sessaoFaq->subtitle}}</span>
                                </h3>
                            </div>

                            @if ($sessaoFaq->btn_title <> null && $sessaoFaq->btn_number <> null)                
                                <div class="d-flex justify-content-center justify-content-lg-start align-items-center">
                                    <a href="{{$sessaoFaq->btn_number}}" class="bg-button-two color-button-two btn-product py-2 px-4 hover-zoom">
                                        {{$sessaoFaq->btn_title}}
                                        <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-one)"/>
                                        </svg>
                                    </a>
                                </div>
                            @endif

                            <div class="faq-image mt-4">
                                <img src="{{asset('storage/' . $sessaoFaq->path_file)}}" alt="Entrega" class="img-fluid">
                            </div>
                        </div>
                    @endif

                    @if (isset($faqs) && $faqs->count())
                        <!-- COLUNA DIREITA -->
                        <div class="col-lg-7">
                            <div class="accordion" id="faqAccordion">

                                <!-- ITEM ATIVO -->
                                @foreach ($faqs as $faq)     
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                        <button class="accordion-button collapsed font-changa font-16 font-regular"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq-{{$faq->id}}">
                                            {{$faq->question}}
                                        </button>
                                        </h2>
                                        <div id="faq-{{$faq->id}}" class="accordion-collapse collapse"
                                        data-bs-parent="#faqAccordion">
                                            <div class="accordion-body font-changa font-16 font-regular">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </div>    
                                @endforeach

                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    @endif

    @if (isset($depoiments) && $depoiments->count())
        <section id="depoiment" class="depoiment py-5 position-relative bg-secondary-color">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center">
                    @if (isset($sections['testimonial']) && $sections <> null)    
                        <div class="col-lg-4 d-table text-center text-lg-start">
                            <span class="rounded-2 col-lg-4 px-3 py-1 bg-white text-dark text-center font-changa font-16 font-bold d-block mb-2">
                                {{$sections['testimonial']->tag}}
                            </span>
        
                            <h3 class="about-title font-changa font-50 font-bold text-white mb-3">
                                {{$sections['testimonial']->title}}
                            </h3>
                            <p class="font-regular text-white mb-0 font-changa font-18">{{$sections['testimonial']->description}}</p>
                        </div>
                    @endif
                    <div class="col-lg-6">
                        <div class="swiper testimonial-swiper">
                            <div class="swiper-wrapper">
        
                                <!-- Slide -->
                                @foreach ($depoiments as $depoiment)                    
                                    <div class="swiper-slide">
                                        <div class="testimonial-card position-relative">
                                            <svg width="127" height="21" viewBox="0 0 127 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.7957 15.7848L4.08407 20.6321L6.72967 12.7486L0.000266403 7.88357H8.2389L10.7957 4.30346e-05L13.3525 7.88357H21.5912L14.8618 12.7486L17.5074 20.6321L10.7957 15.7848ZM36.9432 15.7848L30.2315 20.6321L32.8771 12.7486L26.1477 7.88357H34.3864L36.9432 4.30346e-05L39.5 7.88357H47.7386L41.0092 12.7486L43.6548 20.6321L36.9432 15.7848ZM63.0906 15.7848L56.379 20.6321L59.0246 12.7486L52.2952 7.88357H60.5338L63.0906 4.30346e-05L65.6475 7.88357H73.8861L67.1567 12.7486L69.8023 20.6321L63.0906 15.7848ZM89.2381 15.7848L82.5265 20.6321L85.1721 12.7486L78.4426 7.88357H86.6813L89.2381 4.30346e-05L91.7949 7.88357H100.034L93.3042 12.7486L95.9498 20.6321L89.2381 15.7848ZM115.386 15.7848L108.674 20.6321L111.32 12.7486L104.59 7.88357H112.829L115.386 4.30346e-05L117.942 7.88357H126.181L119.452 12.7486L122.097 20.6321L115.386 15.7848Z" fill="var(--primary-color)"/>
                                            </svg>

                                            <div class="text color-grey font-changa font-16 font-regular text-start mt-4">
                                                {!!$depoiment->text!!}
                                            </div>
        
                                            <div class="author">
                                                <h5 class="text-dark font-changa font-24 font-medium mb-0 mt-3">{{$depoiment->name}}</h5>
                                                <span class="text-dark font-changa font-16 font-regular">{{$depoiment->function}}</span>
                                            </div>

                                            <div class="position-absolute firula-testimonial">
                                                <svg width="102" height="102" viewBox="0 0 102 102" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M51 102C79.1665 102 102 79.1665 102 51C102 22.8335 79.1665 0 51 0C22.8335 0 0 22.8335 0 51C0 79.1665 22.8335 102 51 102Z" fill="white"/>
                                                <path d="M51 94C74.7482 94 94 74.7482 94 51C94 27.2518 74.7482 8 51 8C27.2518 8 8 27.2518 8 51C8 74.7482 27.2518 94 51 94Z" fill="var(--primary-color"/>
                                                <path d="M33.5778 38.5V33.5142C33.5778 32.0985 33.8548 30.652 34.4087 29.1747C34.9627 27.6974 35.6937 26.3048 36.6016 24.9968C37.5095 23.6888 38.4943 22.5962 39.5561 21.7191L43.8956 24.2812C43.0339 25.6354 42.326 27.0511 41.772 28.5284C41.2334 30.0057 40.9641 31.6522 40.9641 33.468V38.5H33.5778ZM45.2344 38.5V33.5142C45.2344 32.0985 45.5114 30.652 46.0653 29.1747C46.6193 27.6974 47.3503 26.3048 48.2582 24.9968C49.1661 23.6888 50.1509 22.5962 51.2127 21.7191L55.5522 24.2812C54.6905 25.6354 53.9826 27.0511 53.4286 28.5284C52.89 30.0057 52.6207 31.6522 52.6207 33.468V38.5H45.2344Z" fill="black"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
        
                            </div>
        
                            <!-- Dots -->
                            <div class="swiper-pagination mt-4 position-relative d-flex justify-content-center align-items-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

        @if (isset($serviceLocation))
        <section id="coverage-section" class="coverage-section py-5 position-relative">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <!-- MAPA -->
                    <div class="col-12 col-lg-6 text-center">
                        <div class="text-center text-lg-end mb-4 col-12 col-lg-11">
                            <span class="about-subtitle color-yellow font-changa font-16 font-bold d-block mb-2 text-end m-0 z-3 position-relative w-100">
                                Distribuição
                            </span>

                            <h3 class="about-title font-changa font-50 font-bold color-green mb-3 position-relative">                            
                                {{$serviceLocation->title}}
                            </h3>
                        </div>
                        <img 
                            src="{{asset('storage/' .$serviceLocation->path_image)}}" 
                            alt="Mapa de cobertura"
                            class="img-fluid coverage-map"
                            >
                    </div>
                    <!-- LISTAS -->
                    <div class="col-12 col-lg-6 mt-0">
                        <!-- BAHIA -->
                        <div class="state-block mb-4">
                            <div class="row list-service col-11 col-lg-12 m-auto">
                                {!! $serviceLocation->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset('build/client/themes/petshop/tp-01/images/firula-about.svg')}}" alt="Firula" class="position-absolute bottom-0 start-0">
        </section>
    @endif
    
@endsection
