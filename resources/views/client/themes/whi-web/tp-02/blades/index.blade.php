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

                                    <h1 class="hero-title font-changa font-50 font-bold">
                                        {{$slide->title}}
                                    </h1>

                                    <div class="hero-actions d-flex">
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
        <section id="topic" class="topics py-5">
            <div class="container">
                <div class="row g-4 justify-content-center mt-2 col-12 col-lg-10 m-auto">
                    @foreach ($topics as $topic)   
                        <div class="col-6 col-md-4 col-lg-2 topic-col m-auto">
                            <div class="d-flex justify-content-center align-items-center gap-2">
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
        <section class="about mt-4 pb-5">
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
                                <h3 class="about-title font-changa font-50 font-semiBold mb-3 text-grey">
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
        
                                <div class="works8-boxarea">
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
        
                                <div class="works8-boxarea">
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
                                <div class="works8-boxarea">
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
                                <div class="works8-boxarea">
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

    <style>
        .linha-do-tempo{
            margin-top: -85px;
        }
        .space70{
            height: 70px;
        }
        .about {
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .about .works-main-widget-area {
            position: relative;
            z-index: 1;
            margin: 0 70px 0 0;
        }

        .about .works-main-widget-area::after {
            position: absolute;
            content: "";
            height: 425px;
            width: 2px;
            right: -85px;
            transition: all .4s;
            background: #F0F0F2;
            top: -50px;
        }

        .about .works-main-widget-area:hover .icons {
            background: #D99400;
            transition: all .4s;
            transform: rotateY(-180deg);
        }

        .about .works-main-widget-area:hover .icons img {
            filter: brightness(0) invert(1);
            transition: all .4s;
        }

        .about .works-main-widget-area:hover .works8-boxarea {
            background: #D99400;
            transition: all .4s;
        }

        .about .works-main-widget-area:hover .works8-boxarea a,
        .about .works-main-widget-area:hover .works8-boxarea p {
            color: #FFF;
            transition: all .4s;
        }

        .about .works-main-widget-area:hover .works8-boxarea h5 {
            background: #D99400;
            color: #FFF;
        }

        .about .works-main-widget-area .icons {
            height: 80px;
            width: 80px;
            display: inline-block;
            transition: all .4s;
            border-radius: 10px;
            text-align: center;
            line-height: 80px;
            background: #F4F4F9;
        }

        .about .works-main-widget-area .icons img {
            transition: all .4s;
        }

        .about .works-main-widget-area .works8-boxarea {
            position: relative;
            z-index: 1;
            background: #F4F4F9;
            padding: 24px;
            transition: all .4s;
            border-radius: 10px;
        }

        .about .works-main-widget-area .works8-boxarea a {
            font-family: "Manrope", sans-serif;
            font-style: normal;
            line-height: 24px;
            display: inline-block;
            transition: all .4s;
        }

        .about .works-main-widget-area .works8-boxarea p {
            font-family: "Manrope", sans-serif;
            font-style: normal;
            line-height: 24px;
            transition: all .4s;
        }

        .about .works-main-widget-area .works8-boxarea h5 {
            font-family: "Manrope", sans-serif;
            font-style: normal;
            height: 40px;
            width: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            background: #F4F4F9;
            position: absolute;
            top: 50%;
            right: -100px;
            margin-top: -20px;
            transition: all .4s;
        }

        .about .works-main-widget-area2 {
            position: relative;
            z-index: 1;
            margin: 0 0 0 70px;
        }

        .about .works-main-widget-area2:hover .icons {
            background: #D99400;
            transition: all .4s;
            transform: rotateY(-180deg);
        }

        .about .works-main-widget-area2:hover .icons img {
            filter: brightness(0) invert(1);
            transition: all .4s;
        }

        .about .works-main-widget-area2:hover .works8-boxarea {
            background: #D99400;
            transition: all .4s;
        }

        .about .works-main-widget-area2:hover .works8-boxarea a,
        .about .works-main-widget-area2:hover .works8-boxarea p {
            color: #FFF;
            transition: all .4s;
        }

        .about .works-main-widget-area2:hover .works8-boxarea h5 {
            background: #D99400;
            color: #FFF;
        }

        .about .works-main-widget-area2 .icons {
            height: 80px;
            width: 80px;
            display: inline-block;
            transition: all .4s;
            border-radius: 10px;
            text-align: center;
            line-height: 80px;
            background: #F4F4F9;
        }

        .about .works-main-widget-area2 .icons img {
            transition: all .4s;
        }

        .about .works-main-widget-area2 .works8-boxarea {
            position: relative;
            z-index: 1;
            background: #F4F4F9;
            padding: 24px;
            transition: all .4s;
            border-radius: 8px;
        }

        .about .works-main-widget-area2 .works8-boxarea a {
            line-height: 24px;
            display: inline-block;
            transition: all .4s;
        }

        .about .works-main-widget-area2 .works8-boxarea p {
            font-family: "Manrope", sans-serif;
            font-style: normal;
            font-weight: 500;
            line-height: 26px;
            transition: all .4s;
        }

        .about .works-main-widget-area2 .works8-boxarea h5 {
            font-family: "Manrope", sans-serif;
            font-style: normal;

            height: 40px;
            width: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            background: #F4F4F9;
            position: absolute;
            top: 50%;
            left: -100px;
            margin-top: -20px;
            transition: all .4s;
        }

        /* XS */
        @media (max-width: 767px) {
            .about .works-main-widget-area,
            .about .works-main-widget-area2 {
                margin: 0;
            }

            .about .works-main-widget-area::after {
                display: none;
            }

            .about .works-main-widget-area .works8-boxarea h5,
            .about .works-main-widget-area2 .works8-boxarea h5 {
                display: none;
            }
        }

        /* MD */
        @media (min-width: 768px) and (max-width: 991px) {
            .about .works-main-widget-area::after {
                display: none;
            }

            .about .works-main-widget-area .works8-boxarea h5 {
                right: -60px;
            }

            .about .works-main-widget-area2 .works8-boxarea h5 {
                left: -60px;
            }
        }
    </style>
  
    <style>
        .section-container {
            background-color: #F7F4EF;
            padding: 60px 0;
        }

        /* Botões/Abas dos Pilares */
        .pillar-card {
        background-color: transparent;
        border: 1px solid transparent;
        border-radius: 12px;
        padding: 16px 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        color: #4a4a4a;
        width: 100%;
        text-align: left;
        }

        .pillar-card:hover {
        background-color: rgba(255, 255, 255, 0.6);
        }

        /* Estado Ativo do Pilar */
        .pillar-card.active {
        background-color: #ffffff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .pillar-icon-box {
        width: 44px;
        height: 44px;
        color: #ffffff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
        }

        /* Conteúdo das Abas */
        .tab-content-container {
        margin-top: 40px;
        }


        /* Barra de Progresso Customizada */
        .progress-label-group {
            display: flex;
            justify-content: space-between;
        }

        .custom-progress {
        height: 10px;
        border-radius: 5px;
        background-color: #e2ded7;
        overflow: hidden;
        }

        .custom-progress-bar {
        background-color: #d9822b;
        border-radius: 5px;
        height: 100%;
        transition: width 0.6s ease;
        }

        .content-image {
        width: 100%;
        height: 320px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        /* Animação suave para troca de conteúdo */
        .tab-pane {
        display: none;
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
        }

        .tab-pane.active {
        display: flex;
        opacity: 1;
        }
    </style>

    <section class="section-container position-relative">
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

    <!-- JavaScript para alternar as abas -->
    <script>
    function changeTab(tabId, element) {
        // 1. Remove a classe 'active' de todos os botões de pilares
        const buttons = document.querySelectorAll('.pillar-card');
        buttons.forEach(btn => btn.classList.remove('active'));

        // 2. Oculta todo o conteúdo das abas
        const panes = document.querySelectorAll('.tab-pane');
        panes.forEach(pane => pane.classList.remove('active'));

        // 3. Ativa o botão clicado
        element.classList.add('active');

        // 4. Exibe o conteúdo correspondente
        const targetPane = document.getElementById(tabId);
        if (targetPane) {
        targetPane.classList.add('active');
        }
    }
    </script>

    <!-- Our Exhibitions Section Start -->
    <section class="our-exhibitions bg-secondary-color position-relative py-5">
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

    <style>
        /* Container Escuro e Estilo Geral */

        .exhibition-swiper {
            padding: 10px 0 30px;
        }

        /* Card em formato de pílula arredondada */
        .exhibition-item {
            display: flex;
            flex-direction: column;            
            overflow: hidden;
            text-align: center;
            height: 640px;
            gap: 10px;
        }

        .exhibition-item-header:nth-of-type(odd), .exhibition-item-image:nth-of-type(odd){
            border-radius: 200px 200px 0 0;
        }
        .exhibition-item-header:nth-of-type(even), .exhibition-item-image:nth-of-type(even){
            border-radius: 0 0 200px 200px;
        }
        /* Bloco do Conteúdo (Texto e Ícone) */
        .exhibition-item-header {
            border: 1px solid rgba(255, 255, 255, 0.15);            
            padding: 0px 50px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .exhibition-item-header .icon-box img {
            max-width: 40px;
            height: auto;
        }

        .exhibition-item-content h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 12px;
        }

        .exhibition-item-content p {
            font-size: 0.85rem;
            color: #b0a8a6;
            line-height: 1.5;
            margin: 0;
        }

        /* Bloco da Imagem */
        .exhibition-item-image {
            width: 100%;
            height: 320px;
            overflow: hidden;
        }

        .exhibition-item-image img {
            width: 100%;
            height: 100%;
            /* aspect-ratio: 1 / 0.80; */
            object-fit: cover;
            display: block;
            transition: all 0.6s ease-in-out;
        }

        .exhibition-item:hover .exhibition-item-image figure img{
            transform: scale(1.05) rotate(2deg);
        }
        
        .image-anime{
            position: relative;
            overflow: hidden;
        }

        .image-anime:after{
            content: "";
            position: absolute;
            width: 200%;
            height: 0%;
            left: 50%;
            top: 50%;
            background-color: rgba(255,255,255,.3);
            transform: translate(-50%,-50%) rotate(-45deg);
            z-index: 1;
        }

        .image-anime:hover:after{
            height: 250%;
            transition: all 600ms linear;
            background-color: transparent;
        }

        /* Estilo do Botão do Carrossel (Navegação Circular) */
        .swiper-navigation-wrapper .swiper-button-prev-custom,
        .swiper-navigation-wrapper .swiper-button-next-custom {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .swiper-navigation-wrapper .swiper-button-prev-custom:hover,
        .swiper-navigation-wrapper .swiper-button-next-custom:hover {
            border-color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>

    <!-- Enterprise Solutions Section Start -->
    <section class="solutions-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row align-items-end mb-5">
                <div class="col-lg-8">
                    <span class="font-changa font-50 font-medium accent-color">Uma oportunidade,</span>
                    <h2 class="main-title font-changa font-50 font-bold mb-0 text-grey">Soluções incríveis para empresas</h2>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="#" class="rounded-pill d-table m-auto me-lg-0 py-3 px-3 px-lg-4 font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none hover-zoom">
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
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica eé simplesmente uma simulação</p>
                                        </div>
                                    </div>
                                    <!-- Card 2 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-sun"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Treinamento Básico</h4>
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica eé simplesmente uma simulação</p>
                                        </div>
                                    </div>
                                    <!-- Card 3 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-sun"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Crescimento Empresarial</h4>
                                            <p class="font-changa font-15 font-medium">We discuss your business goals, hiringé simplesmente uma simulação de texto d</p>
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
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica eé simplesmente uma simulação</p>
                                        </div>
                                    </div>
                                    <!-- Card 6 -->
                                    <div class="col-md-4">
                                        <div class="feature-card">
                                            <div class="icon-box">
                                                <i class="bi bi-grid-3x3-gap"></i>
                                            </div>
                                            <h4 class="font-changa font-18 font-bold">Contrato sem fidelização</h4>
                                            <p class="font-changa font-15 font-medium">é simplesmente uma simulação de texto da indústria tipográfica eé simplesmente uma simulação</p>
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

    <style>
        /* Layout & Cores */
        .solutions-section {
            background-color: #EAE6DF;
            color: #4A4A4A;
        }

        /* Card da Imagem Principal */
        .banner-card {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            height: 100%;
            max-height: 558px;
        }

        .banner-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Cards de Funcionalidade */
        .feature-card {
            background-color: #F8F7F5;
            border-radius: 16px;
            padding: 24px 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
            min-height: 265px;
        }

        .feature-card .icon-box {
            width: 42px;
            height: 42px;
            background-color: #D98804;
            color: #FFFFFF;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .feature-card h4 {
            color: #2D2D2D;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: #727272;
            line-height: 1.45;
            margin: 0;
        }


        /* Efeito Hover nos Cards de Funcionalidade */
        .feature-card {
            transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), 
                        box-shadow 0.3s cubic-bezier(0.25, 0.8, 0.25, 1),
                        background-color 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            background-color: #ffffff;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        /* Efeito Hover na Caixa do Ícone */
        .feature-card .icon-box {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .feature-card:hover .icon-box {
            transform: scale(1.08);
            background-color: #b87303;
        }

        /* Efeito Hover na Imagem do Banner Lateral */
        .banner-card {
            cursor: pointer;
        }

        .banner-card img {
            transition: transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .banner-card:hover img {
            transform: scale(1.04);
        }

        /* Animação do Selo "H" no Hover da Imagem */
        .banner-card .badge-icon {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .banner-card:hover .badge-icon {
            transform: translateY(-50%) scale(1.1);
        }

        /* Botões de Navegação Circular */
        .swiper-button-prev-custom,
        .swiper-button-next-custom {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1px solid #4A4A4A;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4A4A4A;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .swiper-button-prev-custom:hover,
        .swiper-button-next-custom:hover {
            background-color: #4A4A4A;
            color: #EAE6DF;
        }
    </style>

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
                <div class="row g-4 products mt-5">
                    <!-- Produto -->
                    @foreach ($products as $product)                
                        <div class="col-6 col-sm-6 col-lg-3 mb-4 product {{$product->category->slug}}">
                            <div class="product-card bg-primary-color shadow-sm rounded-3 p-0 position-relative">
                                <div class="image position-relative mb-0">
                                    <img src="{{asset('storage/' . $product->path_image)}}" alt="{{$product->title}}" loading="lazy">
                                </div>
                                <div class="p-3 pb-2">
                                    <h6 class="font-changa font-18 font-semibold text-dark text-start">{{$product->title}}</h6>
                                    <p class="color-grey font-changa font-16 font-regular mb-0 text-start lh-sm">{{substr(strip_tags($product->description), 0, 70)}}</p>
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
                                                @endphp

                                                <button class="btn d-flex flex-column text-dark font-changa btn-sm me-2">
                                                    @if(isset($matches[1]))
                                                        <span class="fw-bold font-15">{{ $matches[1] }}</span>
                                                        @if(!empty($matches[2]))
                                                            <span class="font-12">{{ $matches[2] }}</span>
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
                                    <div class="d-flex flex-wrap justify-content-between align-items-center col-10 px-0 pb-3 mt-3">
                                        <div class="user-card col-7">
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
                      
                                        <a href="{{ route('client.product', ['category' => $product->category->slug, 'slug' => $product->slug]) }}" class="col-4">
                                            <span class="bg-button-one color-button-one rounded-2 py-2 px-2 btn-view font-changa font-11 font-medium col-12 d-flex align-items-center justify-content-center mb-0">
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

    <style>
        .user-card {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: sans-serif;
        }

        .avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            gap: 0px;
        }
    </style> 

    @if (isset($statute))
        <section class="step-to-step">
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="left-content col-12 col-lg-6 bg-secondary-color z-3 d-flex flex-column align-items-end justify-content-center py-5">
                        @if (isset($statute) && $statute->path_file <> null)                    
                            <div class="image position-relative">
                                <img src="{{asset('storage/' . $statute->path_file)}}" alt="Passo a passo" class="w-100 step-image">

                                <img src="{{asset('build/client/themes/petshop/tp-01/images/icon-step.png')}}" alt="Icone" class="w-100 icon-step position-absolute">
                            </div>
                        @endif
            
                        @if (isset($statute) && $statute->text_atend || isset($statute) && $statute->phone)                    
                            <div class="description col-12 col-lg-7 text-center text-lg-end px-0 px-lg-4">
                                @if ($statute->text_atend <> null)                            
                                    <p class="font-changa font-28 font-bold">{{$statute->text_atend}}</p>
                                @endif
                                @if ($statute->phone <> null)                            
                                    <span class="text-white font-changa font-28 font-medium">
                                        <svg class="me-2" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 0C11.2057 0 9.52148 0.338541 7.94727 1.01562C6.35612 1.69271 4.97233 2.61947 3.7959 3.7959C2.61947 4.97233 1.69271 6.35612 1.01562 7.94727C0.338542 9.52148 0 11.2057 0 13C0 14.7943 0.338542 16.4785 1.01562 18.0527C1.69271 19.6439 2.61947 21.0277 3.7959 22.2041C4.97233 23.3805 6.35612 24.3073 7.94727 24.9844C9.52148 25.6615 11.2057 26 13 26C13.8971 26 14.7689 25.9154 15.6152 25.7461C16.4616 25.5599 17.2741 25.3018 18.0527 24.9717C18.8314 24.6416 19.5677 24.248 20.2617 23.791C20.9557 23.3171 21.599 22.7839 22.1914 22.1914C22.2422 22.1406 22.2803 22.0856 22.3057 22.0264C22.3311 21.9671 22.3438 21.8952 22.3438 21.8105C22.3438 21.6582 22.293 21.5312 22.1914 21.4297C22.0898 21.3281 21.9629 21.2773 21.8105 21.2773C21.7259 21.2773 21.654 21.29 21.5947 21.3154C21.5355 21.3408 21.4805 21.3789 21.4297 21.4297C20.888 21.9714 20.2956 22.4538 19.6523 22.877C19.026 23.3171 18.3574 23.6852 17.6465 23.9814C16.9355 24.2777 16.1908 24.5104 15.4121 24.6797C14.6335 24.832 13.8294 24.9082 13 24.9082C11.3581 24.9082 9.80925 24.5951 8.35352 23.9688C6.91471 23.3594 5.65365 22.513 4.57031 21.4297C3.48698 20.3464 2.64062 19.0853 2.03125 17.6465C1.40495 16.1908 1.0918 14.6419 1.0918 13C1.0918 11.3581 1.40495 9.80924 2.03125 8.35352C2.64062 6.91471 3.48698 5.65365 4.57031 4.57031C5.65365 3.48698 6.91471 2.64062 8.35352 2.03125C9.80925 1.40495 11.3581 1.0918 13 1.0918C14.6419 1.0918 16.1908 1.40495 17.6465 2.03125C19.0853 2.64062 20.3464 3.48698 21.4297 4.57031C22.513 5.65365 23.3594 6.91471 23.9688 8.35352C24.5951 9.80924 24.9082 11.3581 24.9082 13V14.625C24.9082 15.3698 24.6458 16.0088 24.1211 16.542C23.5964 17.0752 22.9616 17.3418 22.2168 17.3418H20.5918V16.5293C20.5918 16.1569 20.4606 15.8438 20.1982 15.5898C19.9359 15.3359 19.6185 15.209 19.2461 15.209C18.7721 15.209 18.3151 15.1709 17.875 15.0947C17.4349 15.0186 17.0033 14.9128 16.5801 14.7773H16.6309C16.5801 14.7604 16.5166 14.7477 16.4404 14.7393C16.3643 14.7308 16.2923 14.7266 16.2246 14.7266C16.0553 14.7266 15.8945 14.7562 15.7422 14.8154C15.5898 14.8747 15.4544 14.9551 15.3359 15.0566L13.7363 16.2754C12.873 15.8353 12.1029 15.2767 11.4258 14.5996C10.7487 13.9225 10.1901 13.1608 9.75 12.3145L9.72461 12.2637L10.8926 10.7148C11.0111 10.5964 11.1042 10.4567 11.1719 10.2959C11.2396 10.1351 11.2734 9.96159 11.2734 9.77539C11.2734 9.69076 11.2692 9.61458 11.2607 9.54688C11.2523 9.47917 11.2396 9.41146 11.2227 9.34375V9.36914C11.0872 8.97982 10.9814 8.56087 10.9053 8.1123C10.8291 7.66374 10.791 7.21094 10.791 6.75391C10.791 6.75391 10.791 6.74967 10.791 6.74121C10.791 6.73275 10.791 6.72852 10.791 6.72852C10.791 6.37305 10.6641 6.06413 10.4102 5.80176C10.1562 5.53939 9.8431 5.4082 9.4707 5.4082H6.75391C6.38151 5.4082 6.06413 5.53939 5.80176 5.80176C5.53939 6.06413 5.4082 6.37305 5.4082 6.72852C5.4082 8.64128 5.77214 10.444 6.5 12.1367C7.22786 13.8125 8.2181 15.2767 9.4707 16.5293C10.7233 17.7819 12.1875 18.7721 13.8633 19.5C15.556 20.2279 17.3503 20.5918 19.2461 20.5918C19.6185 20.5918 19.9359 20.4606 20.1982 20.1982C20.4606 19.9359 20.5918 19.627 20.5918 19.2715V18.4082H22.2168C23.2663 18.4082 24.1592 18.04 24.8955 17.3037C25.6318 16.5674 26 15.6745 26 14.625V13C26 11.2057 25.6615 9.52148 24.9844 7.94727C24.2904 6.37305 23.3551 4.99772 22.1787 3.82129C21.0023 2.64486 19.627 1.70963 18.0527 1.01562C16.4785 0.338541 14.7943 0 13 0ZM19.5 19.2715C19.5 19.3223 19.4746 19.373 19.4238 19.4238C19.373 19.4746 19.3138 19.5 19.2461 19.5C17.4857 19.5 15.8353 19.1615 14.2949 18.4844C12.7546 17.8242 11.4046 16.9144 10.2451 15.7549C9.08561 14.5954 8.17578 13.2454 7.51562 11.7051C6.83854 10.1647 6.5 8.51432 6.5 6.75391V6.72852C6.5 6.67773 6.52539 6.62695 6.57617 6.57617C6.62695 6.52539 6.6862 6.5 6.75391 6.5H9.4707C9.53841 6.5 9.59766 6.52539 9.64844 6.57617C9.69922 6.62695 9.72461 6.67773 9.72461 6.72852C9.72461 6.74544 9.72461 6.75391 9.72461 6.75391C9.72461 7.27865 9.76693 7.79492 9.85156 8.30273C9.9362 8.81055 10.0547 9.29297 10.207 9.75L10.1816 9.69922C10.1986 9.71615 10.2028 9.75423 10.1943 9.81348C10.1859 9.87272 10.1478 9.9362 10.0801 10.0039L8.6582 11.8828C8.62435 11.9336 8.59896 11.9886 8.58203 12.0479C8.5651 12.1071 8.55664 12.1621 8.55664 12.2129C8.55664 12.2637 8.56087 12.3102 8.56934 12.3525C8.5778 12.3949 8.5905 12.4329 8.60742 12.4668C9.13216 13.5501 9.81348 14.5107 10.6514 15.3486C11.4893 16.1865 12.4329 16.8594 13.4824 17.3672L13.5332 17.3926C13.5671 17.4095 13.6051 17.4222 13.6475 17.4307C13.6898 17.4391 13.7363 17.4434 13.7871 17.4434C13.8548 17.4434 13.9141 17.4349 13.9648 17.418C14.0156 17.401 14.0664 17.3757 14.1172 17.3418L16.0469 15.8691C16.0807 15.8522 16.1104 15.8353 16.1357 15.8184C16.1611 15.8014 16.1908 15.793 16.2246 15.793C16.2415 15.793 16.2542 15.7972 16.2627 15.8057C16.2712 15.8141 16.2839 15.8184 16.3008 15.8184C16.7409 15.9707 17.2106 16.085 17.71 16.1611C18.2093 16.2373 18.7214 16.2754 19.2461 16.2754C19.2461 16.2754 19.2503 16.2754 19.2588 16.2754C19.2673 16.2754 19.2715 16.2754 19.2715 16.2754C19.3392 16.2923 19.3942 16.3219 19.4365 16.3643C19.4788 16.4066 19.5 16.4616 19.5 16.5293V19.2461V19.2715Z" fill="#FFF"/>
                                        </svg>
                                        {{$statute->phone}}
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                    @if (isset($statute) && $statute->title || isset($statute) && $statute->subtitle || isset($statute) && $statute->description || isset($statute) && $statute->btn_number)
                        <div class="right-content col-11 m-auto col-lg-6 py-5 px-2 px-md-4 px-lg-5">
                            <span class="about-subtitle color-yellow font-changa font-16 font-bold d-block mb-2">
                                Passo a passo
                            </span>
                
                            <h3 class="about-title font-changa font-50 font-semibold primary-color mb-3">
                                {{$statute->title}} <span class="color-grey">{{$statute->subtitle}}</span>
                            </h3>

                            <div class="list-unstyled list-step mt-4 position-relative">
                                {!!$statute->description!!}
                            </div>
                            @if ($statute->btn_number <> null)                    
                                <div class="step-actions mt-4 d-flex justify-content-center justify-content-lg-start">
                                    <a href="{{$statute->btn_number}}" target="_blank" rel="noopener noreferrer" class="rounded-pill py-2 px-3 px-lg-5 font-changa bg-button-two color-button-two font-18 font-medium text-decoration-none hover-zoom" rel="noopener noreferrer">
                                        {{$statute->btn_title}}
                                        <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-two)"/>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
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
                    <div class="content-left col-12 col-lg-8">
                        <h3 class="about-title font-changa font-50 font-bold text-dark mb-3">
                            {{$letsgo->title}}
                        </h3>
                        <p class="color-grey font-changa font-16 font-regular text-center text-lg-start">{{$letsgo->description}}</p>
                        <div class="step-actions gap-3 d-flex mt-4 flex-wrap justify-content-center justify-content-lg-start">
                            @if (isset($contact) && $contact->link_tik_tok <> nul)                                
                                <a href="{{ $contact->link_tik_tok }}" class="rounded-pill py-2 px-4 hover-zoom btn-hero font-changa color-button-one bg-button-one font-16 font-medium text-decoration-none" rel="noopener noreferrer">
                                    Conectar no Linkedin
                                    <svg class="ms-1" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.7336 0H1.26641C0.567 0 0 0.567 0 1.26641V12.7336C0 13.433 0.567 14 1.26641 14H12.7336C13.433 14 14 13.433 14 12.7336V1.26641C14 0.567 13.433 0 12.7336 0ZM4.33219 12.0885C4.33219 12.2921 4.1672 12.4571 3.96365 12.4571H2.39484C2.19129 12.4571 2.0263 12.2921 2.0263 12.0885V5.51215C2.0263 5.3086 2.19129 5.14361 2.39484 5.14361H3.96365C4.1672 5.14361 4.33219 5.3086 4.33219 5.51215V12.0885ZM3.17925 4.52369C2.35614 4.52369 1.68887 3.85641 1.68887 3.03331C1.68887 2.2102 2.35614 1.54293 3.17925 1.54293C4.00235 1.54293 4.66962 2.2102 4.66962 3.03331C4.66962 3.85641 4.00239 4.52369 3.17925 4.52369ZM12.5307 12.1182C12.5307 12.3053 12.379 12.4571 12.1919 12.4571H10.5084C10.3213 12.4571 10.1696 12.3053 10.1696 12.1182V9.03352C10.1696 8.57335 10.3046 7.01704 8.967 7.01704C7.9295 7.01704 7.71906 8.08229 7.6768 8.56034V12.1182C7.6768 12.3053 7.52511 12.4571 7.33794 12.4571H5.70976C5.52263 12.4571 5.37091 12.3053 5.37091 12.1182V5.48247C5.37091 5.29534 5.52263 5.14361 5.70976 5.14361H7.33794C7.52507 5.14361 7.6768 5.29534 7.6768 5.48247V6.05621C8.06151 5.47887 8.63324 5.03326 9.85054 5.03326C12.5462 5.03326 12.5307 7.55164 12.5307 8.93537V12.1182Z" fill="var(--color-button-one)"/>
                                    </svg>
                                </a>
                            @endif
                            @if (isset($contact) && $contact->link_insta <> nul)                                
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
                        <div class="col-6 col-sm-6 col-lg-3">
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
                                            class="bg-accent-color text-white font-changa font-14 font-regular rounded-2 d-flex justify-content-center align-items-center border-0" 
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
                                        <div class="row align-items-start g-4 mt-3">
                                            <!-- Imagem com cantos arredondados -->
                                            <div class="col-12 col-md-5">
                                                <img src="{{asset('storage/' . $representative->path_image)}}" 
                                                    alt="{{$representative->title}}" 
                                                    class="img-fluid w-100 object-fit-contain" 
                                                    style="border-radius: 24px; max-height: 300px;">
                                            </div>

                                            <!-- Conteúdo com Nome, Cargo, Redes e Biografia -->
                                            <div class="col-12 col-md-7 text-start">
                                                <div class="d-flex justify-content-between align-items-baseline mb-1">
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

                                                <p class="text-secondary lh-base mb-0" style="font-size: 0.95rem;">
                                                    {!! $representative->description !!}
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

    @if (isset($sessaoFaq) && $sessaoFaq <> null || isset($faqs) && $faqs->count())
        <section id="faq" class="faq-section pt-5 bg-grey-light">
            <div class="container">
                <div class="row align-items-start g-5">
                    @if (isset($sessaoFaq) && $sessaoFaq <> null)
                        <!-- COLUNA ESQUERDA -->
                        <div class="col-lg-5">
                            <!-- Header -->
                            <div class="mb-4">
                                <span class="about-subtitle faq-eyebrow color-yellow font-changa font-16 font-bold d-block mb-2 text-end m-0 z-3 position-relative">
                                    Conheça Aqui!
                                </span>

                                <h3 class="faq-title font-changa font-50 font-bold primary-color mb-3">
                                    {{$sessaoFaq->title}} <span class="color-grey">{{$sessaoFaq->subtitle}}</span>
                                </h3>
                            </div>

                            <div class="faq-text color-grey font-changa font-16 font-regular text-center text-lg-start">
                                {!!$sessaoFaq->description!!}
                            </div>

                            @if ($sessaoFaq->btn_title <> null && $sessaoFaq->btn_number <> null)                
                                <div class="d-flex justify-content-center justify-content-lg-start align-items-center">
                                    <a href="{{$sessaoFaq->btn_number}}" class="bg-button-two color-button-two btn-product rounded-pill py-2 px-4 text-white hover-zoom">
                                        {{$sessaoFaq->btn_title}}
                                        <svg class="ms-2" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.4451 4.325e-05C9.23037 4.325e-05 6.01638 1.22269 3.56813 3.67104V3.6769C-0.397625 7.64665 -1.07437 13.7219 1.62183 18.5939L0.752675 23.3312H0.753652C0.705799 23.586 0.786854 23.8468 0.970449 24.0294C1.15307 24.213 1.4138 24.2931 1.66772 24.2462L6.40497 23.3771C11.277 26.0743 17.3572 25.3976 21.327 21.4307C26.2245 16.5343 26.2245 8.5675 21.327 3.67C18.8787 1.22272 15.6599 4.325e-05 12.4451 4.325e-05ZM12.4451 1.55669C15.2556 1.55669 18.0671 2.63482 20.2166 4.78319C24.5144 9.08019 24.5144 16.0214 20.2166 20.3194C16.6259 23.9064 11.0554 24.5744 6.72337 21.9298H6.7224C6.55834 21.8292 6.36205 21.7921 6.1726 21.8263L2.5016 22.4972L3.17445 18.8262C3.2096 18.6367 3.17445 18.4404 3.07484 18.2754C0.430339 13.9434 1.09144 8.37415 4.67934 4.78315C6.82779 2.6347 9.63534 1.55665 12.4458 1.55665L12.4451 1.55669ZM12.4451 5.11919C9.69512 5.11919 7.45288 7.37504 7.45288 10.1339H7.45385C7.45483 10.5646 7.80443 10.9132 8.2351 10.9152C8.44311 10.9162 8.64233 10.8341 8.79078 10.6877C8.93824 10.5412 9.02125 10.342 9.02222 10.134C9.02222 8.21793 10.5486 6.6877 12.445 6.6877C14.3413 6.6877 15.866 8.21798 15.866 10.134C15.866 11.7336 14.7898 13.0665 13.3405 13.463C12.4694 13.7012 11.6569 14.4376 11.6569 15.4903V17.0304H11.6578C11.6569 17.2393 11.7399 17.4395 11.8873 17.588C12.0348 17.7354 12.236 17.8184 12.445 17.8175C12.653 17.8165 12.8522 17.7335 12.9987 17.586C13.1452 17.4376 13.2272 17.2384 13.2262 17.0304V15.4903C13.2262 15.2979 13.4342 15.0626 13.7536 14.9757H13.7594C15.8825 14.3946 17.4304 12.4377 17.4304 10.1339C17.4304 7.37515 15.195 5.11919 12.4451 5.11919ZM12.4217 18.5019C11.9539 18.5137 11.5672 18.9062 11.5672 19.374C11.5672 19.8486 11.9676 20.2471 12.4451 20.2471C12.9226 20.2471 13.3172 19.8486 13.3172 19.374C13.3172 18.8994 12.9227 18.5019 12.4451 18.5019H12.4217Z" fill="var(--color-button-two)"/>
                                        </svg>
                                    </a>
                                </div>
                            @endif

                            <div class="faq-image mt-0">
                                <img src="{{asset('build/client/themes/petshop/tp-01/images/faq.png')}}" alt="Entrega" class="img-fluid">
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
        <section id="depoiment" class="depoiment py-5 position-relative">
            <img src="{{asset('build/client/themes/petshop/tp-01/images/firula-blog.svg')}}" alt="Firula blog" class="firula-blog position-absolute top-0 left-0">
            <div class="container z-3 position-relative">
                <span class="blog-subtitle color-yellow font-changa font-16 font-bold d-block mb-2 m-auto me-0">
                    Experiência de quem viveu!
                </span>

                <h3 class="about-title font-changa font-50 font-bold primary-color mb-3 text-center">
                    Depoimentos
                </h3>
            </div>
            <div class="col-11 m-auto me-0">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">

                        <!-- Slide -->
                        @foreach ($depoiments as $depoiment)                    
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    @if ($depoiment->path_image <> null)                                
                                        <div class="icon mb-3">
                                            <img src="{{asset('storage/' . $depoiment->path_image)}}" alt="Depoimento-{{$depoiment->id}}">
                                        </div>
                                    @endif

                                    <div class="text color-grey font-changa font-16 font-regular text-start">
                                        {!!$depoiment->text!!}
                                    </div>

                                    <div class="author">
                                        <h5 class="primary-color font-changa font-16 font-medium mb-0 mt-3">{{$depoiment->name}}</h5>
                                        <span class="color-grey font-changa font-16 font-regular">{{$depoiment->function}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- Dots -->
                    <div class="swiper-pagination mt-4 position-relative d-flex justify-content-center align-items-center"></div>
                </div>
            </div>
        </section>
    @endif

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

        document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.testimonial-swiper', {
            loop: true,
            spaceBetween: 24,
            pagination: {
            el: '.swiper-pagination',
            clickable: true,
            },
            breakpoints: {
            0: {
                slidesPerView: 1.2,
            },
            768: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 2.5,
            }
            }
        });
        });

    </script>
@endsection
