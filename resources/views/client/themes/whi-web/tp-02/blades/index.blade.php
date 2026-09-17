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
                            <div class="hero-content mt-0 align-items-center">
                                <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <h1 class="hero-title font-changa font-50 font-bold mb-3">
                                            {{$slide->title}}
                                        </h1>

                                        <span class="hero-subtitle font-changa font-15 font-regular">
                                            {!!$slide->description!!}
                                        </span>


                                        <div class="hero-actions d-flex mt-4">
                                            @if ($slide->link <> null)                                    
                                                <a href="{{$slide->link}}" target="_blank" rel="noopener noreferrer" class="btn-one rounded-pill py-2 px-3 px-lg-4 btn-hero font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none hover-zoom">
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
    @if ($topics->count() > 0)
        <section id="topic" class="topics py-3 py-lg-5">
            <div class="container">
                <div class="row g-4 justify-content-center mt-2 col-12 col-lg-10 m-auto">
                    @foreach ($topics as $topic)   
                        <div class="col-6 col-md-4 col-lg-2 topic-col m-auto">
                            <div class="d-flex justify-content-center align-items-center gap-2 mb-2 mb-lg-0">
                                <svg class="col-1" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="7.5" cy="7.5" r="7.5" fill="#A93F08"/>
                                </svg>
    
                                <h2 class="font-changa font-20 font-semiBold text-center text-grey text-uppercase mb-0">{{$topic->title}}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if (isset($abouts) && $abouts->count())
        <section id="about-us" class="about mt-4 pb-5">
            <div class="container">
                @foreach($abouts as $about)                
                    <div class="row align-items-start justify-content-center">
                        @if (isset($about->path_image) && $about->path_image <> null)                    
                            <!-- IMAGEM (fora do container) -->
                            <div class="col-12 col-lg-5 p-0 about-image text-center">
                                <img
                                src="{{asset('storage/'.$about->path_image)}}"
                                alt="Sobre a Girollato"
                                class="img-fluid w-auto"
                                loading="lazy"
                                >
                            </div>
                        @endif
                        <!-- TEXTO (dentro do container) -->
                        <div class="col-12 col-lg-7 mt-4 mt-lg-0 z-3">
                            <div class="container position-relative">
                                <h3 class="about-title font-changa font-50 font-semiBold mb-3 text-grey text-start">
                                    {{$about->title}} <span class="accent-color">{{$about->subtitle}}</span>
                                </h3>

                                <!-- Conteúdo adicional opcional -->
                                <div class="description">
                                    {!! $about->text !!}
                                </div>

                                @if ($about->link <> null)                        
                                    <div class="btn-about my-4 d-flex justify-content-center justify-content-lg-start">
                                        <a href="{{$about->link}}" class="rounded-pill py-2 px-3 px-lg-5 font-changa bg-button-one color-button-one font-18 font-medium text-decoration-none hover-zoom" rel="noopener noreferrer">
                                            Faça parte agora
                                            <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-one)"/>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>                
                @endforeach
                <div class="linha-do-tempo">
                    <div class="row col-12 col-lg-11 m-auto me-lg-4">
                        <div class="col-lg-6">
                            <div class="works-main-widget-area">
                                <div class="text-end">
                                    <div class="icons">
                                        <img src="{{asset('build/client/images/themes/whi-web/w-icons8.svg')}}" alt="">
                                    </div>
                                </div>
        
                                <div class="space70 d-lg-block d-none"></div>
                                <div class="space30 d-lg-none d-block"></div>
        
                                <div class="works8-boxarea my-3 my-lg-0">
                                    <a href="" class="font-changa font-18 text-grey font-semibold">Tailored Strategy</a>
                                    <div class="space16"></div>
                                    <p>Our team creates a personalized approach to match the right talent with the right opportunity.</p>
                                    <h5>02</h5>
                                </div>
                            </div>
                            <div class="works-main-widget-area">
        
                                <div class="space70 d-lg-block d-none"></div>
                                <div class="space30 d-lg-none d-block"></div>
        
                                <div class="text-end">
                                    <div class="icons">
                                        <img src="{{asset('build/client/images/themes/whi-web/w-icons10.svg')}}" alt="">
                                    </div>
                                </div>
        
                                <div class="space70 d-lg-block d-none"></div>
                                <div class="space30 d-lg-none d-block"></div>
        
                                <div class="works8-boxarea my-3 my-lg-0">
                                    <a href="" class="font-changa font-18 text-grey font-semibold">Ongoing Support</a>
                                    <div class="space16"></div>
                                    <p>Our partnership doesn’t end at placement—we’re here to provide continuous support for long-term success.</p>
                                    <h5>04</h5>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-lg-6">
                            <div class="space30 d-lg-none d-block"></div>
        
                            <div class="works-main-widget-area2">
                                <div class="works8-boxarea my-3 my-lg-0">
                                    <a href="" class="font-changa font-18 text-grey font-semibold">Tailored Strategy</a>
                                    <div class="space16"></div>
                                    <p>Our team creates a personalized approach to match the right talent with the right opportunity.</p>
                                    <h5>01</h5>
                                </div>
        
                                <div class="space70 d-lg-block d-none"></div>
                                <div class="space30 d-lg-none d-block"></div>
                                
                                <div class="text-start">
                                    <div class="icons">
                                        <img src="{{asset('build/client/images/themes/whi-web/w-icons8.svg')}}" alt="">
                                    </div>
                                </div>
        
                                <div class="space70 d-lg-block d-none"></div>
                                <div class="space30 d-lg-none d-block"></div>
                            </div>
        
                            <div class="works-main-widget-area2"> 
                                <div class="works8-boxarea my-3 my-lg-0">
                                    <a href="" class="font-changa font-18 text-grey font-semibold">Ongoing Support</a>
                                    <div class="space16"></div>
                                    <p>Our partnership doesn’t end at placement—we’re here to provide continuous support for long-term success.</p>
                                    <h5>03</h5>
                                </div>
        
                                <div class="space70 d-lg-block d-none"></div>
                                <div class="space30 d-lg-none d-block"></div>
        
                                <div class="text-start">
                                    <div class="icons">
                                        <img src="{{asset('build/client/images/themes/whi-web/w-icons10.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset('build/client/images/themes/whi-web/firula-linha-do-tempo.png')}}" alt="firula linha do tempo" class="position-absolute start-0 bottom-0">
        </section>
    @endif

    <section id="pilar" class="section-container position-relative">
        <div class="container">
            
            <!-- Cabeçalho -->
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <h2 class="font-changa font-50 font-bold text-grey">
                        Conheça os <span class="accent-color">pilares</span> principais
                    </h2>
                </div>
                <div class="col-lg-6">
                    <p class="font-changa font-20 font-medium text-grey mb-0">
                    Somos a integração em educação e mercado de trabalho para superar barreiras de ascensão profissional de pessoas negras no Brasil
                    </p>
                </div>
            </div>

            <!-- Navegação / Seletores (Pilares) -->
            <div class="row g-3 mb-4 col-12 col-lg-11">
                <div class="col-md-4 pe-lg-0">
                    <button class="pillar-card active" onclick="changeTab('educacao', this)">
                        <div class="pillar-icon-box bg-accent-color">
                            <i class="bi bi-triangle"></i>
                        </div>
                        <span class="font-changa font-20 font-medium">Educação</span>
                    </button>
                </div>

                <div class="col-md-4 pe-lg-0">
                    <button class="pillar-card" onclick="changeTab('acessibilidade', this)">
                        <div class="pillar-icon-box bg-accent-color">
                            <i class="bi bi-grid-fill"></i>
                        </div>
                        <span class="font-changa font-20 font-medium">Acessibilidade</span>
                    </button>
                </div>

                <div class="col-md-4 pe-lg-0">
                    <button class="pillar-card" onclick="changeTab('empregabilidade', this)">
                        <div class="pillar-icon-box bg-accent-color">
                            <i class="bi bi-person"></i>
                        </div>
                        <span class="font-changa font-20 font-medium">Empregabilidade</span>
                    </button>
                </div>
            </div>

            <!-- Conteúdos Dinâmicos -->
            <div class="tab-content-container col-12 col-lg-11">

                <!-- Aba 1: Educação -->
                <div id="educacao" class="row align-items-center g-4 tab-pane active">
                    <div class="col-lg-6">
                        <h3 class="font-changa font-26 font-bold mb-2">Métricas de alcance</h3>
                        <p class="font-changa font-15 font-medium text-grey mb-4">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text of the printing and typesetting industry.
                        </p>
                        <div class="progress-container me-lg-4">
                            <div class="progress-label-group font-changa font-14 font-bold text-grey mb-1">
                                <span>Mulheres Negras formadas</span>
                                <span>90%</span>
                            </div>
                            <div class="custom-progress">
                                <div class="custom-progress-bar" style="width: 90%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop" alt="Educação" class="content-image">
                    </div>
                </div>

                <!-- Aba 2: Acessibilidade -->
                <div id="acessibilidade" class="row align-items-center g-4 tab-pane">
                    <div class="col-lg-6">
                        <h3 class="font-changa font-26 font-bold mb-2">Inclusão Digital e Física</h3>
                        <p class="font-changa font-15 font-medium text-grey mb-4">
                            Garantimos que todas as plataformas, cursos e ferramentas sejam acessíveis a pessoas com deficiência e pessoas de regiões com pouca infraestrutura.
                        </p>
                        <div class="progress-container me-lg-4">
                            <div class="progress-label-group font-changa font-14 font-bold text-grey mb-1">
                                <span>Plataformas Acessíveis</span>
                                <span>85%</span>
                            </div>
                            <div class="custom-progress">
                                <div class="custom-progress-bar" style="width: 85%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=800&auto=format&fit=crop" alt="Acessibilidade" class="content-image">
                    </div>
                </div>

                <!-- Aba 3: Empregabilidade -->
                <div id="empregabilidade" class="row align-items-center g-4 tab-pane">
                    <div class="col-lg-6">
                        <h3 class="font-changa font-26 font-bold mb-2">Conexão com o Mercado</h3>
                        <p class="font-changa font-15 font-medium text-grey mb-4">
                            Conectamos os talentos com grandes empresas parceiras promovendo contratações inclusivas e oportunidades de liderança contínua.
                        </p>
                        <div class="progress-container me-lg-4">
                            <div class="progress-label-group font-changa font-14 font-bold text-grey mb-1">
                                <span>Taxa de Contratação</span>
                                <span>78%</span>
                            </div>
                            <div class="custom-progress">
                                <div class="custom-progress-bar" style="width: 78%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=800&auto=format&fit=crop" alt="Empregabilidade" class="content-image">
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('build/client/images/themes/whi-web/firula-pilares.png')}}" alt="firula pilares" class="d-none d-lg-block position-absolute end-0 top-0 w-auto" height="100%">
    </section>

    <!-- Our Exhibitions Section Start -->
    <section id="our-exhibitions" class="our-exhibitions bg-secondary-color position-relative py-5">
        <div class="container">
            <div class="row section-row mb-5">
                <div class="col-xl-12 text-center">
                    <!-- Section Title Start -->
                    <div class="section-title section-title-center">
                        <h2 class="text-anime-style-3 text-white fw-light fs-1" data-cursor="-opaque">
                            Um projeto,<br><span class="fw-bold">benefícios únicos para você</span>
                        </h2>
                        <div class="btn-about my-4 d-flex justify-content-center">
                            <a href="#" class="rounded-pill py-2 px-3 px-lg-4 font-changa bg-button-one color-button-one font-18 font-medium text-decoration-none hover-zoom" rel="noopener noreferrer">
                                Faça parte agora
                                <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-one)"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <!-- Swiper Carousel Start -->
            <div class="swiper exhibition-swiper col-12 col-lg-10">
                <div class="swiper-wrapper">

                    <!-- Slide 1 (Texto Topo / Imagem Baixo) -->
                    <div class="swiper-slide">
                        <div class="exhibition-item">
                            <div class="exhibition-item-header">
                                <div class="icon-box mb-4">
                                    {{-- <img src="images/icon-exhibition-item-1.svg" alt="Ícone"> --}}
                                    <svg width="34" height="56" viewBox="0 0 34 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.7012 9.31078C1.7012 -2.10359 32.1395 -2.10359 32.1395 9.31078C32.1395 16.9204 35.9443 32.1395 28.3347 43.5539C24.5299 47.3587 24.5299 54.9683 16.9204 54.9683C9.31078 54.9683 9.31078 47.3587 5.50599 43.5539C-2.10359 32.1395 1.7012 16.9204 1.7012 9.31078Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M11.213 19.7741C12.789 19.7741 14.0666 18.4965 14.0666 16.9205C14.0666 15.3445 12.789 14.0669 11.213 14.0669C9.63697 14.0669 8.35938 15.3445 8.35938 16.9205C8.35938 18.4965 9.63697 19.7741 11.213 19.7741Z" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M22.629 19.7741C24.205 19.7741 25.4826 18.4965 25.4826 16.9205C25.4826 15.3445 24.205 14.0669 22.629 14.0669C21.053 14.0669 19.7754 15.3445 19.7754 16.9205C19.7754 18.4965 21.053 19.7741 22.629 19.7741Z" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M11.2139 35.9444L16.9211 32.1396L22.6282 35.9444" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="exhibition-item-content">
                                    <h3>Educação Acessível</h3>
                                    <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressão.</p>
                                </div>
                            </div>
                            <div class="exhibition-item-image">
                                <figure class="image-anime m-0">
                                    <img src="{{asset('build/client/images/themes/whi-web/exhibition.png')}}" alt="Exposição">
                                </figure>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 (Imagem Topo / Texto Baixo) -->
                    <div class="swiper-slide">
                        <div class="exhibition-item reverse" data-wow-delay="0.2s">
                            <div class="exhibition-item-image">
                                <figure class="image-anime m-0">
                                    <img src="{{asset('build/client/images/themes/whi-web/exhibition.png')}}" alt="Exposição">
                                </figure>
                            </div>
                            <div class="exhibition-item-header">
                                <div class="icon-box mb-4">
                                    {{-- <img src="images/icon-exhibition-item-2.svg" alt="Ícone"> --}}
                                    <svg width="34" height="56" viewBox="0 0 34 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.7012 9.31078C1.7012 -2.10359 32.1395 -2.10359 32.1395 9.31078C32.1395 16.9204 35.9443 32.1395 28.3347 43.5539C24.5299 47.3587 24.5299 54.9683 16.9204 54.9683C9.31078 54.9683 9.31078 47.3587 5.50599 43.5539C-2.10359 32.1395 1.7012 16.9204 1.7012 9.31078Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M11.213 19.7741C12.789 19.7741 14.0666 18.4965 14.0666 16.9205C14.0666 15.3445 12.789 14.0669 11.213 14.0669C9.63697 14.0669 8.35938 15.3445 8.35938 16.9205C8.35938 18.4965 9.63697 19.7741 11.213 19.7741Z" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M22.629 19.7741C24.205 19.7741 25.4826 18.4965 25.4826 16.9205C25.4826 15.3445 24.205 14.0669 22.629 14.0669C21.053 14.0669 19.7754 15.3445 19.7754 16.9205C19.7754 18.4965 21.053 19.7741 22.629 19.7741Z" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M11.2139 35.9444L16.9211 32.1396L22.6282 35.9444" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="exhibition-item-content">
                                    <h3>Oportunidade de Mercado</h3>
                                    <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressão.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 (Texto Topo / Imagem Baixo) -->
                    <div class="swiper-slide">
                        <div class="exhibition-item" data-wow-delay="0.4s">
                            <div class="exhibition-item-header">
                                <div class="icon-box mb-4">
                                    {{-- <img src="images/icon-exhibition-item-3.svg" alt="Ícone"> --}}
                                    <svg width="34" height="56" viewBox="0 0 34 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.7012 9.31078C1.7012 -2.10359 32.1395 -2.10359 32.1395 9.31078C32.1395 16.9204 35.9443 32.1395 28.3347 43.5539C24.5299 47.3587 24.5299 54.9683 16.9204 54.9683C9.31078 54.9683 9.31078 47.3587 5.50599 43.5539C-2.10359 32.1395 1.7012 16.9204 1.7012 9.31078Z" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M11.213 19.7741C12.789 19.7741 14.0666 18.4965 14.0666 16.9205C14.0666 15.3445 12.789 14.0669 11.213 14.0669C9.63697 14.0669 8.35938 15.3445 8.35938 16.9205C8.35938 18.4965 9.63697 19.7741 11.213 19.7741Z" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M22.629 19.7741C24.205 19.7741 25.4826 18.4965 25.4826 16.9205C25.4826 15.3445 24.205 14.0669 22.629 14.0669C21.053 14.0669 19.7754 15.3445 19.7754 16.9205C19.7754 18.4965 21.053 19.7741 22.629 19.7741Z" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M11.2139 35.9444L16.9211 32.1396L22.6282 35.9444" stroke="#E53E3E" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>

                                </div>
                                <div class="exhibition-item-content">
                                    <h3>Mentorias Evolutivas</h3>
                                    <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressão.</p>
                                </div>
                            </div>
                            <div class="exhibition-item-image">
                                <figure class="image-anime m-0 position-relative">
                                    <img src="{{asset('build/client/images/themes/whi-web/exhibition.png')}}" alt="Exposição">
                                </figure>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Navegação Swiper (Botões Circulares) -->
                <div class="swiper-navigation-wrapper mt-5 d-flex justify-content-center gap-3">
                    <div class="swiper-button-prev-custom">
                        <i class="bi bi-arrow-left"></i>
                    </div>
                    <div class="swiper-button-next-custom">
                        <i class="bi bi-arrow-right"></i>
                    </div>
                </div>
            </div>
            <!-- Swiper Carousel End -->
        </div>
        <img src="{{asset('build/client/images/themes/whi-web/firula-exhibition-1.png')}}" alt="firula exhibition" class="position-absolute start-0 top-0 w-auto" height="100%">
    </section>
    <!-- Our Exhibitions Section End -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Garante que o objeto Swiper existe no escopo global
            if (typeof Swiper !== 'undefined') {
                const exhibitionSwiper = new Swiper('.exhibition-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 24,
                    loop: true,
                    navigation: {
                        nextEl: '.swiper-button-next-custom',
                        prevEl: '.swiper-button-prev-custom',
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                        },
                        1200: {
                            slidesPerView: 3,
                        }
                    }
                });
            } else {
                console.error('Swiper JS não foi carregado corretamente.');
            }
        });
    </script>

    <!-- Enterprise Solutions Section Start -->
    <section id="solutions-section" class="solutions-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row align-items-end mb-5">
                <div class="col-lg-8">
                    <span class="font-changa font-50 font-medium accent-color">Uma oportunidade,</span>
                    <h2 class="main-title font-changa font-50 font-bold mb-0 text-grey">Soluções incríveis para empresas</h2>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="#" class="rounded-pill d-table m-auto me-lg-0 py-2 py-lg-3 px-3 px-lg-4 font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none hover-zoom">
                        Faça parte agora 
                        <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-one)"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Content Grid with Main Image & Swiper -->
            <div class="row g-4">
                <!-- Left Banner Image -->
                <div class="col-lg-4">
                    <div class="banner-card">
                        <img src="{{asset('build/client/images/themes/whi-web/company-banner.png')}}" alt="Parceria de negócios" class="img-fluid">
                    </div>
                </div>

                <!-- Right Slider Area -->
                <div class="col-lg-8">
                    <div class="swiper solutions-swiper">
                        <div class="swiper-wrapper">

                            <!-- Slide 1 (Grid de 6 Cards) -->
                            <div class="swiper-slide">
                                <div class="row g-3">
                                    <!-- Card 1 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Carreiras Experientes</h4>
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica e é simplesmente uma simulação</p>
                                        </div>
                                    </div>

                                    <!-- Card 2 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-sun"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Treinamento Básico</h4>
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica e é simplesmente uma simulação</p>
                                        </div>
                                    </div>

                                    <!-- Card 3 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-sun"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Crescimento Empresarial</h4>
                                            <p class="font-changa font-15 font-medium">We discuss your business goals, hiring é simplesmente uma simulação de texto</p>
                                        </div>
                                    </div>

                                    <!-- Card 4 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-globe"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Triagem Garantida</h4>
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica e é simplesmente uma simulação</p>
                                        </div>
                                    </div>

                                    <!-- Card 5 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-grid-3x3-gap"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Publicidade no site</h4>
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica e é simplesmente uma simulação</p>
                                        </div>
                                    </div>

                                    <!-- Card 6 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-grid-3x3-gap"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Contrato sem fidelização</h4>
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica e é simplesmente uma simulação</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="row g-3">
                                    <!-- Card 7 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-grid-3x3-gap"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Contrato sem fidelização 01</h4>
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica e é simplesmente uma simulação</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-end gap-2">
                    <div class="swiper-button-prev-custom">
                        <i class="bi bi-chevron-left"></i>
                    </div>
                    <div class="swiper-button-next-custom">
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Enterprise Solutions Section End -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof Swiper !== 'undefined') {
                const solutionsSwiper = new Swiper('.solutions-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    navigation: {
                        nextEl: '.swiper-button-next-custom',
                        prevEl: '.swiper-button-prev-custom',
                    },
                });
            }
        });
    </script>

    @if (!empty($sections['product']) || isset($products) && $products->count())
        <section class="products-section py-3 py-lg-5 bg-secondary-color">
            <div class="container">

                <!-- Header -->
                <div class="my-5 my-lg-4 d-flex justify-content-center justify-content-lg-between align-items-center flex-wrap">
                    <div class="col-12 col-lg-6">                      
                        <h3 class="about-title text-start font-changa d-flex justify-content-center justify-content-lg-start font-50 font-medium text-white mb-3 position-relative">
                            {{$sections['product']->title}}
                        </h3>
                    </div>

                      <!-- Botão -->
                    <div class="col-12 col-lg-6">
                        <div class="about-span primary-color font-20 font-changa justify-content-center justify-content-lg-start font-16 font-medium d-flex align-items-center mb-0">
                            {{$sections['product']->description}} <span class="line-firu"></span>
                        </div>
                    </div>
                </div>
                
                <!-- Produtos -->
                <div class="row g-4 products w-mobile mt-5">
                    <!-- Produto -->
                    @foreach ($products as $product)                
                        <div class="col-6 col-sm-6 col-lg-4 col-xl-3 mb-2 mb-lg-3 product {{$product->category->slug}}">
                            <div class="product-card bg-white shadow-sm rounded-3 p-0 position-relative">
                                <div class="image position-relative mb-0">
                                    <img src="{{asset('storage/' . $product->path_image)}}" alt="{{$product->title}}" loading="lazy">
                                </div>
                                <div class="p-2 p-lg-3 pb-2">
                                    <h6 class="font-changa font-18 font-semibold text-dark text-start">{{$product->title}}</h6>
                                    <p class="color-grey font-changa font-16 font-regular mb-0 text-start lh-sm">{{substr(strip_tags($product->description), 0, 50)}}...</p>
                                </div>
                                <div class="row flex-wrap justify-content-center mt-0">
                                    <div class="btn-group m-auto m-lg-0 col-10 px-0 justify-content-center justify-content-lg-start" role="group">
                                        @php
                                            if (is_string($product->sizes)) {
                                                $sizes = json_decode($product->sizes, true);
                                            } else {
                                                $sizes = $product->sizes;
                                            }

                                            // Garante que seja array
                                            $sizes = is_array($sizes) ? $sizes : [];

                                            // Remove null, '', false etc
                                            $sizes = collect($sizes)
                                            ->filter()
                                            ->values()
                                            ->toArray();
                                        @endphp

                                        @if (!empty($sizes))
                                            @foreach($sizes as $size)
                                                @php
                                                    preg_match('/^(\d+(?:[.,]\d+)?)\s*(.*)$/u', trim($size), $matches);

                                                    $unit = strtolower(trim($matches[2] ?? ''));

                                                    $icon = match (true) {
                                                        str_contains($unit, 'hora') => 'bi bi-clock',
                                                        str_contains($unit, 'semana') => 'bi bi-calendar-week',
                                                        str_contains($unit, 'vídeo'), str_contains($unit, 'video') => 'bi bi-play-btn',
                                                        default => 'bi bi-info-circle',
                                                    };
                                                @endphp

                                                <button class="btn d-flex flex-column text-dark font-changa btn-sm me-2">
                                                    @if(isset($matches[1]))
                                                        <span class="fw-bold font-15">{{ $matches[1] }}</span>

                                                        @if(!empty($matches[2]))
                                                            <span class="font-12 size-unit">
                                                                <span class="d-none d-md-inline">{{ $matches[2] }}</span>
                                                                <i class="{{ $icon }} d-inline d-md-none"></i>
                                                            </span>
                                                        @endif
                                                    @else
                                                        {{ $size }}
                                                    @endif
                                                </button>
                                            @endforeach
                                        @else
                                            <i class="bi bi-exclamation-circle text-muted me-2"></i>
                                            <p class="text-dark text-center text-lg-start font-changa font-16 font-medium">
                                                Não disponível
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-0">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center col-10 px-0 pb-2 pb-lg-3 mt-2 mt-lg-3">
                                        <div class="user-card col-12 col-lg-7 mb-2 mb-lg-0">
                                            <div class="avatar">
                                                {{-- <img src="caminho-da-imagem.jpg" alt="Foto do usuário"> --}}
                                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.4107 34.8214C27.0264 34.8214 34.8214 27.0264 34.8214 17.4107C34.8214 7.79504 27.0264 0 17.4107 0C7.79504 0 0 7.79504 0 17.4107C0 27.0264 7.79504 34.8214 17.4107 34.8214Z" fill="#E5E7EB"/>
                                                <path d="M17.41 17.4104C20.6152 17.4104 23.2136 14.812 23.2136 11.6068C23.2136 8.40157 20.6152 5.80322 17.41 5.80322C14.2048 5.80322 11.6064 8.40157 11.6064 11.6068C11.6064 14.812 14.2048 17.4104 17.41 17.4104Z" fill="#9CA3AF"/>
                                                <path d="M5.80371 29.0176C5.80371 20.8926 11.6073 20.8926 17.4109 20.8926C23.2144 20.8926 29.018 20.8926 29.018 29.0176H5.80371Z" fill="#9CA3AF"/>
                                                </svg>
                                            </div>
                                            <div class="user-info text-start">
                                                <h3 class="user-name font-changa font-10 font-bold text-dark mb-0">TAMILES ALVES</h3>
                                                <span class="user-role font-changa font-10 font-medium text-dark">Professora de Inglês</span>
                                            </div>
                                        </div>
                      
                                        @php
                                            $isExternal = $product->link_type === 'external';

                                            $href = $isExternal
                                                ? $product->link
                                                : route('client.product', [
                                                    'category' => $product->category->slug,
                                                    'slug' => $product->slug
                                                ]);
                                        @endphp

                                        <a href="{{ $href }}" class="col-12 col-lg-4 col-xl-5" @if($isExternal) target="_blank" rel="noopener noreferrer" @endif>

                                            <span class="bg-button-one color-button-one rounded-2 py-2 px-2 btn-view font-changa font-11 font-medium col-12 col-lg-11 m-auto me-lg-0 d-flex align-items-center justify-content-center mb-0">
                                                Garantir agora
                                            </span>

                                        </a>
                                    </div>
                                      
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="text-end mt-4 d-flex justify-content-center justify-content-lg-end align-items-center">
                        <a href="{{route('products')}}" class="btn-product bg-button-two color-button-two rounded-pill py-2 px-5 hover-zoom">
                            {{$sections['product']->btn_title}}
                            <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-one)"></path>
                            </svg>
                        </a>
                    </div>
                </div>               

            </div>
        </section>
    @endif

    @if (isset($letsgo))
        <section class="lets-go pt-5 pb-0 position-relative">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    @if ($letsgo->path_image <> null)                    
                        <div class="content-left col-12 col-lg-3">
                            <img src="{{asset('storage/' . $letsgo->path_image)}}" alt="Carro de entrega" class="w-100">
                        </div>
                    @endif
                    <div class="content-left col-12 col-lg-8 mt-3 mt-lg-0">
                        <h3 class="about-title font-changa font-50 font-bold text-dark mb-3">
                            {{$letsgo->title}}
                        </h3>
                        <p class="color-grey font-changa font-16 font-regular text-center text-lg-start">{{$letsgo->description}}</p>
                        <div class="step-actions gap-3 d-flex mt-4 flex-wrap justify-content-center justify-content-lg-start">
                            @if (isset($contact) && $contact->link_tik_tok <> null)                                
                                <a href="{{ $contact->link_tik_tok }}" class="rounded-pill py-2 px-4 hover-zoom btn-hero font-changa color-button-one bg-button-one font-16 font-medium text-decoration-none" rel="noopener noreferrer">
                                    Conectar no Linkedin
                                    <svg class="ms-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.7336 0H1.26641C0.567 0 0 0.567 0 1.26641V12.7336C0 13.433 0.567 14 1.26641 14H12.7336C13.433 14 14 13.433 14 12.7336V1.26641C14 0.567 13.433 0 12.7336 0ZM4.33219 12.0885C4.33219 12.2921 4.1672 12.4571 3.96365 12.4571H2.39484C2.19129 12.4571 2.0263 12.2921 2.0263 12.0885V5.51215C2.0263 5.3086 2.19129 5.14361 2.39484 5.14361H3.96365C4.1672 5.14361 4.33219 5.3086 4.33219 5.51215V12.0885ZM3.17925 4.52369C2.35614 4.52369 1.68887 3.85641 1.68887 3.03331C1.68887 2.2102 2.35614 1.54293 3.17925 1.54293C4.00235 1.54293 4.66962 2.2102 4.66962 3.03331C4.66962 3.85641 4.00239 4.52369 3.17925 4.52369ZM12.5307 12.1182C12.5307 12.3053 12.379 12.4571 12.1919 12.4571H10.5084C10.3213 12.4571 10.1696 12.3053 10.1696 12.1182V9.03352C10.1696 8.57335 10.3046 7.01704 8.967 7.01704C7.9295 7.01704 7.71906 8.08229 7.6768 8.56034V12.1182C7.6768 12.3053 7.52511 12.4571 7.33794 12.4571H5.70976C5.52263 12.4571 5.37091 12.3053 5.37091 12.1182V5.48247C5.37091 5.29534 5.52263 5.14361 5.70976 5.14361H7.33794C7.52507 5.14361 7.6768 5.29534 7.6768 5.48247V6.05621C8.06151 5.47887 8.63324 5.03326 9.85054 5.03326C12.5462 5.03326 12.5307 7.55164 12.5307 8.93537V12.1182Z" fill="var(--color-button-one)"/>
                                    </svg>
                                </a>
                            @endif
                            @if (isset($contact) && $contact->link_insta <> null)                                
                                <a href="{{ $contact->link_insta }}" class="rounded-pill py-2 px-4 hover-zoom btn-hero font-changa color-button-one bg-button-one font-16 font-medium text-decoration-none" rel="noopener noreferrer">
                                    Seguir no Instagram
                                    <svg class="ms-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.75 0.75H3.75C2.09315 0.75 0.75 2.09315 0.75 3.75V9.75C0.75 11.4069 2.09315 12.75 3.75 12.75H9.75C11.4069 12.75 12.75 11.4069 12.75 9.75V3.75C12.75 2.09315 11.4069 0.75 9.75 0.75Z" stroke="var(--color-button-one)" stroke-width="1.5"/>
                                    <path d="M6.75 9.25C8.13071 9.25 9.25 8.13071 9.25 6.75C9.25 5.36929 8.13071 4.25 6.75 4.25C5.36929 4.25 4.25 5.36929 4.25 6.75C4.25 8.13071 5.36929 9.25 6.75 9.25Z" stroke="var(--color-button-one)" stroke-width="1.5"/>
                                    <path d="M10.25 4C10.6642 4 11 3.66421 11 3.25C11 2.83579 10.6642 2.5 10.25 2.5C9.83579 2.5 9.5 2.83579 9.5 3.25C9.5 3.66421 9.83579 4 10.25 4Z" fill="var(--color-button-one)"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset('build/client/images/themes/whi-web/firula-letsgo.png')}}" alt="firula letsgo" class="position-absolute bottom-0 end-0">
        </section>
    @endif

    @if (isset($directions) && $directions->count())
        <section id="team-section" class="team-section py-5">
            <div class="container z-3">
                <div class="row g-4">
                    <!-- Card -->
                    @foreach ($directions as $representative)    
                        <div class="col-6 col-sm-6 col-lg-4 col-xl-3">
                            <div class="team-card position-relative">
                                <div class="team-image bg-white">
                                    <img src="{{asset('storage/' . $representative->path_image)}}" alt="{{$representative->title}}">
                                </div>
                                <div class="team-body shadow-md rounded-2 text-center position-absolute col-11 z-3 bg-white py-2 py-lg-3 px-1 px-lg-3 d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-start align-items-start flex-column">
                                        <h6 class="mb-0 font-changa font-semibold font-18 color-green">{{$representative->title}}</h6>
                                        <small class="color-grey font-changa font-15 font-regular d-block mb-0">{{$representative->function}}</small>
                                    </div>
                                    <!-- Botão para disparar o Modal -->
                                    <button type="button" 
                                            class="color-button-one bg-button-one font-changa font-14 font-regular rounded-2 d-flex justify-content-center align-items-center border-0" 
                                            style="width: 30px; height:30px cursor: pointer;" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#representativeModal{{$representative->id}}">
                                        <i class="bi bi-eye"></i>
                                    </button>                         
                                </div>
                            </div>
                        </div>

                        <!-- Modal com o Layout da Imagem -->
                        <div class="modal fade" id="representativeModal{{$representative->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 p-4 p-md-5 position-relative" style="background-color: #EAE3D9; border-radius: 16px;">
                                    
                                    <!-- Botão Fechar -->
                                    <button type="button" class="btn-close position-absolute top-0 end-0 m-4 shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>

                                    <div class="modal-body p-0">
                                        <div class="row align-items-start g-4 mt-0">
                                            <!-- Imagem com cantos arredondados -->
                                            <div class="col-12 col-md-5">
                                                <img src="{{asset('storage/' . $representative->path_image)}}" 
                                                    alt="{{$representative->title}}" 
                                                    class="img-fluid w-100 object-fit-contain" 
                                                    style="border-radius: 24px; max-height: 300px;">
                                            </div>

                                            <!-- Conteúdo com Nome, Cargo, Redes e Biografia -->
                                            <div class="col-12 col-md-7 text-start">
                                                <div class="d-flex justify-content-between align-items-baseline mb-0">
                                                    <h2 class="fw-bold mb-0 text-dark" style="font-size: 2rem;">{{$representative->title}}</h2>
                                                    
                                                    <!-- Redes Sociais (Ajuste os links conforme seus dados) -->
                                                    <div class="d-flex gap-2 color-dark fs-5">
                                                        @if ($representative->instagram <> null)                                                            
                                                            <a href="{{$representative->instagram}}" class="text-dark"><i class="bi bi-instagram"></i></a>
                                                        @endif
                                                        @if ($representative->linkedin <> null)                                                            
                                                            <a href="{{$representative->linkedin}}" class="text-dark"><i class="bi bi-linkedin"></i></a>
                                                        @endif
                                                        @if ($representative->facebook <> null)                                                            
                                                            <a href="{{$representative->facebook}}" class="text-dark"><i class="bi bi-facebook"></i></a>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="text-muted fs-5 mb-3">{{$representative->function}}</div>

                                                <div class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                                                    {!! $representative->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (isset($depoiments) && $depoiments->count())
        <section id="depoiment" class="depoiment py-5 position-relative bg-light-custom overflow-hidden">
            <div class="container-fluid pe-0">
                <div class="row align-items-center justify-content-end me-0 flex-nowrap">
                    <!-- Texto Vertical (Left side) -->
                    <div class="col-2 d-none d-lg-flex justify-content-center align-items-xenter">
                        <div class="vertical-text-wrapper">
                            <span class="vertical-text">feedback</span>
                        </div>
                    </div>

                    <!-- Conteúdo Principal -->
                    <div class="col-12 col-lg-10 ps-3 pe-0">
                        <div class="mb-4 ps-0 ps-md-0">
                            <h2 class="text-grey font-change font-50 font-bold mb-1">Veja o relato de quem</h2>
                            <h2 class="accent-color font-change font-50 font-bold">já faz parte</h2>
                        </div>

                        <div class="swiper testimonial-swiper">
                            <div class="swiper-wrapper">

                                @foreach ($depoiments as $depoiment)                    
                                    <div class="swiper-slide">
                                        <div class="testimonial-card p-4 rounded-3 bg-white position-relative shadow-md">
                                            <!-- Ícone de Aspas (Top Right) -->
                                            <div class="quote-icon position-absolute top-0 end-0 m-4">
                                                <div class="quote-badge">
                                                    <i class="bi bi-quote"></i> <!-- Ou <img> com seu ícone -->
                                                </div>
                                            </div>

                                            <!-- Autor / Informações -->
                                            <div class="author mb-3">
                                                <h5 class="author-name font-bold mb-1">{{ $depoiment->name }}</h5>
                                                <span class="author-role d-block text-muted font-14">{{ $depoiment->function }}</span>
                                            </div>

                                            <!-- Texto do Depoimento -->
                                            <div class="text color-grey font-14 text-start">
                                                {!! $depoiment->text !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Navigation Buttons -->
                            <div class="row mt-4">
                                <div class="col-11 d-flex justify-content-end gap-2 pe-4">
                                    <div class="swiper-button-prev-custom">
                                        <i class="bi bi-chevron-left"></i>
                                    </div>
                                    <div class="swiper-button-next-custom">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.testimonial-swiper', {
                loop: true,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.swiper-button-next-custom',
                    prevEl: '.swiper-button-prev-custom',
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1.1,
                    },
                    768: {
                        slidesPerView: 2.1,
                    },
                    1200: {
                        slidesPerView: 3.2,
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.blog-swiper', {
            spaceBetween: 24,
            pagination: {
            el: '.swiper-pagination-blog',
            clickable: true,
            },
            breakpoints: {
            0: {
                slidesPerView: 1.3,
            },
            576: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 4,
                allowTouchMove: false,
            }
            }
        });
        });


    </script>

    @if (!empty($partners))
        <section class="partners-section py-5 bg-white my-3">
            <div class="container mb-4">
                <!-- Cabeçalho (Número + Textos) -->
                <div class="d-flex align-items-center justify-content-center flex-wrap gap-3 text-center text-md-start">
                    <div class="counter-badge d-flex align-items-center">
                        <span class="number-outlined font-change font-86 font-regular">250</span>
                        <span class="plus-sign">+</span>
                    </div>
                    <div class="text-content">
                        <p class="subtitle-text mb-0 font-change font-30 font-regular">Envolvidos já se credenciaram ao nosso projeto.</p>
                        <h3 class="title-bold mb-0 font-change font-38 font-semibold">Agora é sua vez</h3>
                    </div>
                </div>
            </div>

            <!-- Carrossel Infinito (Estilo Timeline Continuous) -->
            <div class="swiper partners-swiper overflow-hidden mt-5">
                <div class="swiper-wrapper ease-linear-wrapper">
                    @foreach ($partners as $partner)
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <div class="partner-card border-0 d-flex justify-content-center align-items-center">
                                @if (isset($partner->path_image) && $partner->path_image <> null)
                                    <img src="{{ asset('storage/'.$partner->path_image) }}" alt="Logo do parceiro" loading="lazy" class="partner-logo"/>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.partners-swiper', {
                loop: true,
                loopAdditionalSlides: 5, // Duplica os slides na fila para não dar "tranco" ou parar
                freeMode: {
                    enabled: true,
                    momentum: false,
                },
                slidesPerView: 3,
                spaceBetween: 30,
                speed: 4000, // Velocidade do deslizamento
                autoplay: {
                    delay: 0,
                    disableOnInteraction: true, // Para o carrossel assim que o usuário clicar/interagir
                    pauseOnMouseEnter: false,   // Altere para true se quiser que pare apenas ao passar o mouse
                },
                breakpoints: {
                    576: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                    768: {
                        slidesPerView: 6,
                        spaceBetween: 50,
                    },
                    1200: {
                        slidesPerView: 8,
                        spaceBetween: 60,
                    }
                }
            });
        });
    </script>

    <section id="contact" class="contact my-0 bg-white">
        <div class="container py-5">
            <div class="row">
                @if (isset($contact))
                    <!-- Infos -->
                    <div class="col-12 col-lg-5">
                        <h2 class="faq-title font-changa font-50 font-bold text-grey mt-2 mb-3 text-start">{{$contact->name_section}} <span class="accent-color">{{$contact->link_x}}</span></h2>
                        <p class="col-12 col-lg-8 faq-text color-grey font-changa font-16 font-regular text-start">
                            {{$contact->text}}
                        </p>
        
                        <ul class="list-unstyled">        
                            <li class="d-flex mb-3 align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-3 text-success font-14 bg-accent-color rounded-pill" style="width: 30px; height: 30px;">
                                    <i class="bi bi-telephone-fill text-white"></i>
                                </div>
                                <div>
                                    <p class="color-grey font-changa font-16 font-regular mb-0">{{$contact->phone_one}}</p>
                                </div>
                            </li>
        
                            <li class="d-flex align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-3 text-success font-14 bg-accent-color rounded-pill" style="width: 30px; height: 30px;">
                                    <i class="bi bi-envelope-fill text-white"></i>
                                </div>
                                <div>
                                    <p class="color-grey font-changa font-16 font-regular mb-0">{{$contact->name_one}}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endif
                
                <div class="col-lg-7">
                    <!-- Formulário e Mapa -->
                    <div class="row g-4 mt-4">
                        <div class="col-12">
                            <form id="contactForm">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12 mt-0">
                                        <input type="text" required id="nome" name="name" class="poppins-regular font-15 text-color form-control" placeholder="Nome Completo">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="email" required id="email" name="email" class="poppins-regular font-15 text-color form-control" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" required id="phone_whatsapp" name="phone" class="poppins-regular font-15 text-color form-control" placeholder="Whatsapp">
                                    </div>
                                    <div class="col-md-4">
                                        <select
                                            required
                                            id="subject"
                                            name="subject"
                                            class="poppins-regular font-15 text-color form-select"
                                        >
                                            <option value="" selected disabled>Selecione uma opção</option>
                                            <option value="pessoa-fisica">Pessoa Física</option>
                                            <option value="empresa">Empresa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea id="text" required name="text" class="form-control poppins-regular font-15 text-color" rows="4" placeholder="Digite aqui...."></textarea>
                                    </div>
                                    <div class="col-12 d-flex align-items-center flex-wrap">
                                        <div class="form-check me-3">
                                            <input class="form-check-input" required id="term_privacy" name="term_privacy" type="checkbox" value="1">
                                            <label class="form-check-label small poppins-regular font-14 text-color" for="privacyCheck">
                                                Aceito os termos descritos na Política de Privacidade
                                            </label>
                                        </div>
                                        <button type="submit" class="bt-hover border font-changa font-15 bg-button-one color-button-one rounded-pill ms-auto py-2 px-5 hover-zoom">
                                            Enviar
                                            <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-one)"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                const formData = $(this).serialize();

                $.ajax({
                    url: '{{ route("send-contact") }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                title: 'Sucesso!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                        $('#contactForm')[0].reset();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorMessages = '';
                            for (let field in errors) {
                                errorMessages += errors[field][0] + '\n';
                            }

                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    title: 'Erro',
                                    text: errorMessages,
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        } else {
                            if (typeof Swal !== 'undefined') {
                                Swal.fire({
                                    title: 'Erro',
                                    text: 'Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const phoneInput = document.getElementById('phone_whatsapp');

            // 1. Verificação de segurança (se o ID não existir, encerra)
            if (!phoneInput) return;

            // 2. Aplicação da máscara dinâmica durante a digitação
            phoneInput.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número

                if (value.length > 11) {
                    value = value.slice(0, 11); // Limita a 11 dígitos
                }

                // Formatação em tempo real
                if (value.length > 10) {
                    // (11) 99999-9999
                    value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
                } else if (value.length > 6) {
                    // (11) 9999-9999 (ou em digitação)
                    value = value.replace(/^(\d{2})(\d{4,5})(\d{0,4})$/, '($1) $2-$3');
                } else if (value.length > 2) {
                    // (11) 9999...
                    value = value.replace(/^(\d{2})(\d{0,5})$/, '($1) $2');
                } else if (value.length > 0) {
                    // (11...
                    value = value.replace(/^(\d{0,2})$/, '($1');
                }

                e.target.value = value;
            });

            // 3. Validação do campo
            phoneInput.addEventListener('blur', function (e) {
                const rawDigits = e.target.value.replace(/\D/g, '');

                // Zera o erro customizado para não travar o formulário
                e.target.setCustomValidity('');

                // Se estiver preenchido mas incompleto (menos de 10 dígitos)
                if (rawDigits.length > 0 && rawDigits.length < 10) {
                    e.target.classList.add('is-invalid');
                    e.target.setCustomValidity('Digite um número de WhatsApp válido com DDD.');
                    e.target.reportValidity(); // Dispara o balão nativo do HTML5
                } else {
                    e.target.classList.remove('is-invalid');
                }
            });
        });
    </script>

@endsection
