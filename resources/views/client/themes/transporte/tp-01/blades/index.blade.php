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
        <section class="lets-go bg-grey-light py-5">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    @if ($letsgo->path_image <> null)                    
                        <div class="content-left col-12 col-lg-6">
                            <img src="{{asset('storage/' . $letsgo->path_image)}}" alt="Carro de entrega" class="w-100">
                        </div>
                    @endif
                    <div class="content-left col-12 col-lg-6">
                        <h3 class="about-title font-changa font-50 font-bold primary-color mb-3">
                            {{$letsgo->title}}
                        </h3>
                        <p class="color-grey font-changa font-16 font-regular text-center text-lg-start">{{$letsgo->description}}</p>
                        <div class="step-actions gap-3 d-flex mt-4 flex-wrap justify-content-center justify-content-lg-start">
                            <a href="{{route('about')}}#coverage-section" class="rounded-pill py-2 px-4 hover-zoom btn-hero font-changa color-button-two bg-button-two font-18 font-medium text-decoration-none" rel="noopener noreferrer">
                                Onde Distribuimos
                                <svg class="ms-2" width="31" height="13" viewBox="0 0 31 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.1708 12.4741L30.4078 6.23712L24.1708 0.000120163L22.4036 1.76727L26.8527 6.23712L22.3828 10.707L24.1708 12.4741Z" fill="var(--color-button-two)"/>
                                <path d="M0 5H27V7.2H0V5Z" fill="var(--color-button-two)"/>
                                </svg>
                            </a>
                            <a href="{{route('about')}}#team-section" class="rounded-pill py-2 px-4 hover-zoom btn-hero font-changa color-button-two bg-button-two font-18 font-medium text-decoration-none" rel="noopener noreferrer">
                                Encontrar Representantes
                                <svg class="ms-2" width="31" height="13" viewBox="0 0 31 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.1708 12.4741L30.4078 6.23712L24.1708 0.000120163L22.4036 1.76727L26.8527 6.23712L22.3828 10.707L24.1708 12.4741Z" fill="var(--color-button-two)"/>
                                <path d="M0 5H27V7.2H0V5Z" fill="var(--color-button-two)"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (isset($productCategorieHighlights) && $productCategorieHighlights->count())
        <section class="category-product position-relative">
            <img src="{{asset('build/client/themes/petshop/tp-01/images/firula-top-product.svg')}}" alt="Firula" class="position-absolute top-0 left-0">
            <div class="container py-5">
                <div class="row g-4">
                    @foreach ($productCategorieHighlights as $productCategory)
                        <div class="col-12 col-md-4 mb-3 mb-lg-0">
                            <div class="card p-4 d-flex flex-row justify-content-center align-items-center border-0 rounded-4 bg-secondary-color">
                                @if ($productCategory->path_image <> null)                                
                                    <img src="{{asset('storage/' . $productCategory->path_image)}}"
                                        class="card-img-top rounded"
                                        alt="{{$productCategory->title}}">
                                @endif

                                <div class="card-body text-center">
                                    <a href="{{ route('products', ['category' => $productCategory->slug]) }}" 
                                    class="stretched-link text-decoration-none">
                                        <h5 class="card-title font-changa text-black font-25 font-bold">
                                            {{$productCategory->title}}
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if (isset($products) && $products->count())
        <section class="products-section py-5">
            <div class="container">

                <!-- Header -->
                <div class="text-center mb-4">
                    <span class="about-subtitle span-product color-yellow font-changa font-16 font-bold d-block mb-2 text-end m-0 z-3 position-relative">
                        Conheça Aqui!
                    </span>

                    <h3 class="about-title font-changa font-50 font-bold primary-color mb-3 position-relative">
                        <img src="{{asset('build/client/themes/petshop/tp-01/images/firula-about.svg')}}" alt="Firula" class="position-absolute firula-products">
                        Nossos <span class="color-grey z-3 position-relative">Produtos</span>
                    </h3>
                </div>

                <!-- Filtros -->
                <div class="d-flex justify-content-center gap-2 mb-5 flex-wrap">
                    <button class="btn btn-filter text-uppercase font-changa font-18 font-semibold primary-color px-4 py-2 active" data-filter="all">Todos</button>
                    @foreach ($productCategories as $productCategory)
                        <button class="btn btn-filter text-uppercase font-changa font-18 font-semibold primary-color px-4 py-2" data-filter="{{$productCategory->slug}}">{{$productCategory->title}}</button>
                    @endforeach
                </div>
                
                <!-- Produtos -->
                <div class="row g-4 products">
                    <!-- Produto -->
                    @foreach ($products as $product)                
                        <div class="col-6 col-sm-6 col-lg-3 product {{$product->category->slug}}">
                            <div class="product-card bg-white shadow-sm rounded-3">
                                <div class="image position-relative mb-0">
                                    <img src="{{asset('storage/' . $product->path_image)}}" alt="{{$product->title}}">
                                </div>
                                <div class="py-3">
                                    <h6 class="font-changa font-18 font-semibold primary-color">{{$product->title}}</h6>
                                    <p class="color-grey font-changa font-16 font-regular mb-0">{{$product->description}}</p>
                                </div>
                                <a href="{{ route('client.product', ['category' => $product->category->slug, 'slug' => $product->slug]) }}" class="col-12">
                                    <span class="bg-button-two color-button-two btn-view font-changa font-16 font-medium col-10 col-lg-5 hover-zoom">Ver Produto</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Botão -->
                <div class="text-end mt-4 d-flex justify-content-center justify-content-lg-end align-items-center">
                    <a href="{{route('products')}}" class="btn-product bg-button-two color-button-two rounded-pill py-2 px-4 hover-zoom">
                        Ver todos os produtos
                        <svg class="ms-2" width="31" height="13" viewBox="0 0 31 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24.1708 12.4741L30.4078 6.23712L24.1708 0.000120163L22.4036 1.76727L26.8527 6.23712L22.3828 10.707L24.1708 12.4741Z" fill="var(--color-button-two)"></path>
                        <path d="M0 5H27V7.2H0V5Z" fill="var(--color-button-two)"></path>
                        </svg>
                    </a>
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

    <script>
    const buttons = document.querySelectorAll('.btn-filter');
    const products = document.querySelectorAll('.product');

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.dataset.filter;

        products.forEach(product => {
            product.classList.toggle(
            'd-none',
            filter !== 'all' && !product.classList.contains(filter)
            );
        });
        });
    });
    </script>
@endsection
