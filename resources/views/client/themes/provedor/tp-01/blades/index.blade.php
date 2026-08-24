@extends($theme->core('client'))
@section('content')
@if (!empty($slides))
    <section id="hero" class="hero position-relative d-flex flex-column section dark-background overflow-hidden">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide">
                        <picture>
                            <source srcset="{{ asset('storage/' . $slide->path_image_mobile) }}" media="(max-width: 885px)">
                            <img src="{{ asset('storage/' . $slide->path_image) }}" alt="Banner Hero" title="Banner Hero" class="image-hero w-100">
                        </picture>
                    </div>
                @endforeach
            </div>
            <!-- Paginação opcional -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
@endif
@if (!empty($topics))
    <section id="topics" class="animate-on-scroll" data-animation="animate__fadeInUp">
        <div class="col-12 topics">
            <div class="row text-white text-center">
                @foreach ($topics as $topic)                
                    <div class="box-topic col-md-4 grey-background p-4 d-flex justify-content-between align-items-center">
                        <div class="mb-3">
                            @if (isset($topic->path_image) && $topic->path_image <> null)                                
                                <img src="{{asset('storage/'.$topic->path_image)}}" alt="Ícone {{$topic->title}}" loading="lazy">
                            @endif
                        </div>
                        <div class="description text-start col-10">
                            <h5 class="montserrat-bold font-20">{{$topic->title}}</h5>
                            <p class="mb-0 montserrat-regular font-15 text-white">
                                {{$topic->description}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@if (!empty($abouts) || !empty($partners))
    <section id="about" class="position-relative">
        <div class="container">
            @foreach($abouts as $about)                
                <div class="d-flex justify-content-between align-items-start about flex-wrap w-100 pt-4 pt-lg-5">
                    <div class="col-11 col-lg-6 animate-on-scroll" data-animation="animate__fadeInLeft">
                        <h1 class="d-flex align-items-start gap-2 montserrat-semiBold font-28 text-black before text-uppercase">{{$about->title}}</h1>
                
                        <div class="description mt-4">{!!$about->text!!}</div>
                        
                        @if ($about->link)                        
                            <div class="call-to-action mt-4">
                                <a href="{{$about->link}}" target="_blank" rel="noopener noreferrer" class="btn background-red rounded-5 px-4 py-2 text-white montserrat-semiBold font-15">{{$about->title_button}}</a>
                            </div>
                        @endif
                    </div>

                    @if (isset($about->path_image) && $about->path_image <> null)                    
                        <div class="col-11 col-lg-6 animate-on-scroll" data-animation="animate__fadeInRight">
                            <div class="image d-flex justify-content-end">
                                <img src="{{asset('storage/'.$about->path_image)}}" alt="About" class="w-100 h-100 about-image d-none d-sm-block" loading="lazy">
                            </div>
                        </div>            
                    @endif
                </div>
            @endforeach
            @if (!empty($partners))
                <div class="partners animate-on-scroll" data-animation="animate__fadeInUp">
                    <div class="container py-5">
                        <div class="col-11 col-lg-12 m-auto row g-3 justify-content-start">
                            @foreach ($partners as $partner)                        
                                <div class="col-6 col-sm-4 col-md-2">
                                    <div class="partner-card border rounded-2 d-flex justify-content-center align-items-center">
                                        @if (isset($partner->path_image) && $partner->path_image <> null)                                            
                                            <img src="{{asset('storage/'.$partner->path_image)}}" alt="Logo dos parceiro" loading="lazy"/>                            
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <img src="{{asset('build/client/images/firu.webp')}}" alt="Firlua about" class="firula-about position-absolute d-none d-sm-block" loading="lazy">
    </section>
@endif

@if ((!empty($planSection) && ($planSection->title || $planSection->subtitle || $planSection->text)) ||
    (!empty($planCategories) && count($planCategories) > 0) ||
    (!empty($plans) && count($plans) > 0))
    <section id="plans" class="background-plan py-5 plan">
        <div class="content m-auto me-0 justify-content-end d-flex flex-wrap flex-column flex-md-row">
            <aside class="col-11 col-md-4 animate-on-scroll" data-animation="animate__fadeInLeft">
                @if (isset($planSection->title) || isset($planSection->subtitle))
                    <div class="w-100">
                        <h2 class="montserrat-medium font-25 text-white">{{ $planSection->title }}</h2>
                        <h3 class="text-uppercase montserrat-ExtraBold font-35 text-white">{{ $planSection->subtitle }}</h3>
                    </div>
                @endif
                @if (!empty($planCategories))                
                    <ul class="d-flex justify-content-center align-items-start gap-4 flex-column p-0 mt-5 col-12 col-md-7">
                        @foreach ($planCategories as $planCategory)                    
                            <li class="list-unstyled pb-4 col-12">
                                <button type="button" 
                                        class="border-transparent shadow-none border-none montserrat-medium font-15 text-white background-red py-2 px-3 rounded-5 d-flex w-100 justify-content-center gap-3 align-items-center btn-filter-category" 
                                        data-id="{{ $planCategory->id }}">
                                        @if (isset($planCategory->path_image) && $planCategory->path_image <> null)                                            
                                            <img src="{{ asset('storage/' . $planCategory->path_image) }}" alt="Imagem da categoria" class="imagem-da-categoria" loading="lazy">
                                        @endif
                                        {{ $planCategory->title }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @if (!empty($planSection))                
                    <div class="obs mt-4 col-12 col-md-8">
                        <div class="description">
                            {!! $planSection->text !!}
                        </div>
                    </div>
                @endif
            </aside>
            @if (!empty($plans))
                <div class="col-12 col-md-7 position-relative animate-on-scroll" data-animation="animate__fadeInRight">
                    <div class="swiper init-swiper" style="padding: 0 0 35px 0">
                        <script type="application/json" class="swiper-config">
                            {
                                "speed": 500,
                                "slidesPerView": 3.5,
                                "slidesPerGroup": 1,
                                "centeredSlides": false,
                                "initialSlide": 0,
                                "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                },
                                "navigation": {
                                    "nextEl": ".swiper-button-next",
                                    "prevEl": ".swiper-button-prev"
                                },
                                "breakpoints": {
                                    "320": {
                                        "slidesPerView": 1.3,
                                        "spaceBetween": 5
                                    },
                                    "515": {
                                        "slidesPerView": 2,
                                        "spaceBetween": 5
                                    },
                                    "631": {
                                        "slidesPerView": 2.5,
                                        "spaceBetween": 5
                                    },
                                    "768": {
                                        "slidesPerView": 2.2,
                                        "spaceBetween": 5
                                    },
                                    "1025": {
                                        "slidesPerView": 3.2,
                                        "spaceBetween": 10
                                    }
                                }
                            }
                        </script>

                        <div id="loader" style="display: none;" class="load text-center my-4">
                            <img src="{{ asset('build/client/images/load.gif') }}" alt="Carregando..." style="width: 40px;" loading="lazy">
                        </div>
                        
                        <div id="plans-container" class="swiper-wrapper align-items-baseline">                        
                            @foreach ($plans as $plan)  
                                @php
                                    $priceformated = $plan->price;
                                    $price = str_replace('.', ',', $priceformated);
                                @endphp                      
                                <div class="swiper-slide">
                                    <div class="card-plan bg-white rounded-3 py-4 px-3 w-100">
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="title">
                                                <h4 class="montserrat-medium text-black font-18 mb-1">{{$plan->title}}</h4>
                                                <h5 class="subtitle-plan montserrat-bold font-18 mb-0">{{$plan->subtitle}}</h5>
                                            </div>
                                            <div class="qtd-mb">
                                                <span class="subtitle-plan montserrat-bold font-20 lh-sm">{{$plan->bandwidth_limit}}</span>
                                                <p class="montserrat-medium font-15 text-black mb-0 lh-sm">{{$plan->bandwidth_unit}}</p>
                                            </div>
                                        </div>
                                        <div class="p-0 mt-4 list">
                                            {!! $plan->description !!}
                                        </div>
                                        @if ($price <> "0,00")
                                            <div class="price">
                                                <span class="montserrat-semiBold font-25 text-red d-block text-center">R$ {{$price}}</span>
                                            </div>
                                        @endif
                                        <div class="call-to-action mt-3 text-center">
                                            @if (isset($contact) && $contact->phone_one <> null)
                                                @php
                                                    // Remove caracteres não numéricos do telefone
                                                    $phone = preg_replace('/\D/', '', $contact->phone_one);

                                                    // Monta mensagem com ícones e quebras de linha
                                                    $mensagem = "Olá! Tenho interesse no plano:%0A"
                                                            . "📌 Plano: {$plan->title} {$plan->subtitle}%0A"
                                                            . "🚀 Velocidade: {$plan->bandwidth_limit} {$plan->bandwidth_unit}%0A"
                                                            . "💲 Preço: R$ {$price}";
                                                @endphp

                                                <a 
                                                    href="https://wa.me/55{{ $phone }}?text={{ $mensagem }}" 
                                                    target="_blank" 
                                                    rel="noopener noreferrer" 
                                                    class="btn background-red rounded-5 px-5 py-2 text-white montserrat-semiBold font-15"
                                                >
                                                    Quero esse
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach                          
                        </div>
                        <div class="btn-navigation">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endif
<section id="all-complete" class="animate-on-scroll" data-animation="animate__fadeIn">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-12 col-md-4 mb-3 mb-md-0">
                <h2 class="d-flex align-items-start gap-2 montserrat-semiBold font-28 text-black before text-uppercase">
                    TUDO COMPLETO PARA VOCÊ!
                </h2>
            </div>
            <div class="col-12 col-md-8">
                <p class="montserrat-regular font-15 mt-2 mt-md-3">
                    CristoNet leva até você tecnologia de ponta, produtos de excelência, serviços eficientes e a qualidade que inspira confiança.
                </p>
            </div>
        </div>
    </div>
</section>
@if ((!empty($productSection) && ($productSection->title || $productSection->subtitle || $productSection->text)) ||
    (!empty($products) && count($products) > 0)) 
    <section id="products" class="background-plan py-5 products position-relative">
        <div class="content m-auto me-0 justify-content-end align-content-center d-flex flex-wrap flex-column flex-md-row" style="min-height: 512px;">
            <aside class="col-12 col-md-4">
                @if (isset($productSection->title) || isset($productSection->subtitle))                    
                    <div class="w-100 animate-on-scroll" data-animation="animate__fadeInLeft">
                        <h2 class=" montserrat-medium font-25 text-white">{{$productSection->title}}</h2>
                        <h3 class="text-uppercase montserrat-ExtraBold font-35 text-white">{{$productSection->subtitle}}</h3>
                    </div>
                @endif

                @if (isset($productSection->text))                    
                    <div class="obs animate-on-scroll mt-4 col-12 col-md-8" data-animation="animate__fadeInLeft">
                        <div class="description-session">
                            {!! $productSection->text !!}
                        </div>
                    </div>
                @endif

                <img src="{{asset('build/client/images/woman-product.webp')}}" alt="imagem woman-firula" class="d-none d-sm-block position-absolute bottom-0" loading="lazy">
            </aside>
            <div class="col-12 col-md-7 animate-on-scroll" data-animation="animate__fadeInRight">
                <div class="swiper init-swiper" style="padding: 0 0 35px 0">
                    <script type=application/json class=swiper-config>
                        {
                            "speed": 500,
                            "slidesPerView": 3.5,
                            "slidesPerGroup": 1,
                            "centeredSlides": false,
                            "initialSlide": 0,
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1.3,
                                    "spaceBetween": 5
                                },
                                "513": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 5
                                },
                                "631": {
                                    "slidesPerView": 2.5,
                                    "spaceBetween": 5
                                },
                                "768": {
                                    "slidesPerView": 2.2,
                                    "spaceBetween": 5
                                },
                                "1025": {
                                    "slidesPerView": 3.2,
                                    "spaceBetween": 10
                                }
                            }
                        }
                    </script>

                    <div class="swiper-wrapper align-items-start">   
                        @foreach($products as $product)     
                            @php
                                $priceformated = $product->price;
                                $price = str_replace('.', ',', $priceformated);
                            @endphp                     
                            <div class=swiper-slide>
                                <div class="card-plan bg-white rounded-3 p-3">
                                    <div class="d-flex justify-content-center align-items-center flex-column">
                                        @if (isset($product->path_image) && !empty($product->path_image))                                            
                                            <div class="image mb-3">
                                                <img src="{{asset('storage/' .$product->path_image)}}" alt="Imagem do produto" loading="lazy">
                                            </div>
                                        @endif
                                        <div class="title">
                                            <h4 class="subtitle-plan montserrat-bold font-18 mb-0 text-center">{{$product->title}}</h4>
                                        </div>
                                    </div>
                                    <div class="description p-0 mt-4">                                                                           
                                        {!! $product->text !!}                                 
                                    </div>
                                    @if ($price <> "0,00")
                                        <div class="price">
                                            <span class="montserrat-semiBold font-25 text-red d-block text-center">R$ {{$price}}</span>
                                        </div>
                                    @endif
                                    <div class="call-to-action mt-3 text-center">
                                        @if (isset($contact) && $contact->phone_one <> null)
                                            @php
                                                // Remove caracteres não numéricos do telefone
                                                $phone = preg_replace('/\D/', '', $contact->phone_one);

                                                // Monta mensagem com ícones e quebras de linha
                                                $mensagem = "Olá! Tenho interesse no produto:%0A"
                                                        . "📌 Produto: {$product->title}%0A"
                                                        . "💲 Preço: R$ {$price}";
                                            @endphp

                                            <a 
                                                href="https://wa.me/55{{ $phone }}?text={{ $mensagem }}" 
                                                target="_blank" 
                                                rel="noopener noreferrer" 
                                                class="btn background-red rounded-5 px-5 py-2 text-white montserrat-semiBold font-15"
                                            >
                                                Quero esse
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>                  
                        @endforeach                      
                    </div>
                    <div class=btn-navigation>
                        <div class=swiper-button-prev></div>
                        <div class=swiper-button-next></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@if ((!empty($depoimentSession) && ($depoimentSession->title || $depoimentSession->text)) ||
    (!empty($depoiments) && count($depoiments) > 0))
    <section id="depoiment" class="depoiment position-relative h-100">
        <div class="content m-auto me-0 justify-content-end d-flex flex-wrap align-items-center h-100 flex-column flex-md-row">
            @if (!empty($depoimentSession) && isset($depoimentSession->title) && isset($depoimentSession->text))            
                <div class="col-11 col-lg-4 animate-on-scroll" data-animation="animate__fadeInLeft">
                    @if ($depoimentSession->title)                    
                        <h2 class="title mb-0 text-uppercase font-35 montserrat-semiBold text-black before">{{ $depoimentSession->title }}</h2>
                    @endif
                    
                    @if ($depoimentSession->text)                    
                        <div class="description mb-0 mt-4 text-start p-0 col-12 col-lg-8">
                            {!! $depoimentSession->text !!}
                        </div>
                    @endif
                    
                    <div class="call-to-action mt-3">
                        @if (isset($contact) && $contact->phone_one <> null)
                            @php
                                // Remove caracteres não numéricos do telefone
                                $phone = preg_replace('/\D/', '', $contact->phone_one);

                                // Monta mensagem com ícones e quebras de linha
                                $mensagem = "Olá! Encontrei seu site e gostaria de conhecer mais sobre os planos disponíveis.%0A";
                            @endphp

                            <a 
                                href="https://wa.me/55{{ $phone }}?text={{ $mensagem }}" 
                                target="_blank" 
                                rel="noopener noreferrer" 
                                class="btn background-red rounded-5 px-5 py-2 text-white montserrat-semiBold font-15"
                            >
                                Conhecer
                            </a>
                        @endif
                    </div>
                </div>
            @endif

            <div class="col-12 col-md-7 position-relative animate-on-scroll" data-animation="animate__fadeInRight">
                <div class="project-list-details-slider swiper init-swiper">
                    <script type=application/json class=swiper-config>
                        {
                            "speed": 500,
                            "slidesPerView": 5,
                            "slidesPerGroup": 1,
                            "centeredSlides": true,
                            "initialSlide": 0,
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1.2,
                                    "spaceBetween": 5
                                },
                                "475": {
                                    "slidesPerView": 1.2,
                                    "spaceBetween": 5
                                },
                                "631": {
                                    "slidesPerView": 2.3,
                                    "spaceBetween": 5
                                },
                                "768": {
                                    "slidesPerView": 2.3,
                                    "spaceBetween": 5
                                },
                                "991": {
                                    "slidesPerView": 2.3,
                                    "spaceBetween": 5
                                },
                                "1025": {
                                    "slidesPerView": 2.5,
                                    "spaceBetween": 5
                                }
                            }
                        }
                    </script>
                    <div class="swiper-wrapper align-items-start">
                        @foreach($depoiments as $depoiment)                        
                            <div class="swiper-slide">
                                <div class="project-list-item dark-background px-3 py-4 rounded-4">
                                    <svg class="position-absolute start-0 ms-2 mt-2 top-0" width="29" height="29" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 13.0833H10.6667C12.0013 13.0833 13.0833 12.0013 13.0833 10.6667V3.41667C13.0833 2.08199 12.0013 1 10.6667 1H3.41667C2.08199 1 1 2.08199 1 3.41667V13.0833ZM1 13.0833V21.5417C1 26.2131 4.78692 30 9.45833 30M17.9167 13.0833H27.5833C28.9181 13.0833 30 12.0013 30 10.6667V3.41667C30 2.08199 28.9181 1 27.5833 1H20.3333C18.9987 1 17.9167 2.08199 17.9167 3.41667V13.0833ZM17.9167 13.0833V21.5417C17.9167 26.2131 21.7036 30 26.375 30" stroke="#F2E416"/>
                                    </svg>

                                    <div class="row">
                                        <div class="content position-relative">
                                            <div class="depoiment-text m-auto mt-2 font-15 montserrat-regular">
                                                {!! $depoiment->text !!}
                                            </div>                                          
                                        </div>

                                        <div class="client-info d-flex flex-column m-auto mt-4 gap-1 p-0">
                                            <span class="font-16 montserrat-medium">{{ $depoiment->title }}</span>
                                            <span class="font-12 montserrat-regular text-white">{{ $depoiment->time }}</span>
                                            <div class="image-rating">
                                                <img src="{{asset('build/client/images/rating.svg')}}" loading="lazy" alt="Rating" class="w-100" loading="lazy">
                                            </div>
                                        </div> 
                                    </div> 

                                    <svg class="position-absolute end-0 me-2 mb-2 bottom-0" width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M36 21.4167L24.3333 21.4167C22.7225 21.4167 21.4167 22.7225 21.4167 24.3333L21.4167 33.0833C21.4167 34.6941 22.7225 36 24.3333 36L33.0833 36C34.6941 36 36 34.6942 36 33.0833L36 21.4167ZM36 21.4167L36 11.2083C36 5.57042 31.4296 1 25.7917 1M15.5833 21.4167L3.91666 21.4167C2.30579 21.4167 0.999997 22.7225 0.999997 24.3333L0.999996 33.0833C0.999996 34.6941 2.30579 36 3.91666 36L12.6667 36C14.2775 36 15.5833 34.6941 15.5833 33.0833L15.5833 21.4167ZM15.5833 21.4167L15.5833 11.2083C15.5833 5.57042 11.0129 1 5.375 1" stroke="#F2E416"/>
                                    </svg>
                                
                                </div>
                            </div>
                        @endforeach                         
                    </div>
                    <div class=btn-navigation>
                        <div class=swiper-button-prev></div>
                        <div class=swiper-button-next></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@if (!empty($contact))
    <section id="contact" class="contact-section py-5 bg-contact text-white">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <!-- Coluna Esquerda - Formulário -->
                <div class="col-11 col-lg-5 mb-4 mb-lg-0 animate-on-scroll" data-animation="animate__fadeInUp">
                    @if ($contact->name_section)                        
                        <h2 class="title mb-0 text-uppercase font-32 montserrat-semiBold before">
                            {{$contact->name_section}}
                        </h2>
                    @endif
                    <p class="mt-4 montserrat-regular text-white font-15">
                        {{$contact->text}}
                    </p>

                    <div class="d-flex align-items-center mb-4">
                        @if ($contact->mention)                            
                            <span class="me-3 montserrat-regular font-15"><a href="{{ isset($contact->link_insta) ? $contact->link_insta : '' }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram me-2"></i> {{ '@' .$contact->mention}}</a></span>
                        @endif
                        @if ($contact->phone_one)                        
                            <span class="montserrat-regular font-15"><i class="bi bi-whatsapp me-2"></i> {{ $contact->phone_one }}</span>
                        @endif
                    </div>

                    <form id="phoneForm" class="col-12 col-lg-11">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="tel" name="phone" id="phone" class="form-control montserrat-regular font-15" placeholder="Telefone" required>
                            <button class="btn btn-danger montserrat-medium font-15 col-3" type="submit">Enviar</button>
                        </div>
                        <div class="form-check small">
                            <input class="form-check-input" type="checkbox" name="term_privacy" id="privacyCheck" required>
                            <label class="form-check-label montserrat-regular font-15" for="privacyCheck">
                                Aceito os termos descritos na Política de Privacidade
                            </label>
                        </div>
                    </form>
                </div>

                <!-- Coluna Direita - Mapa -->
                @if ($contact->maps)                    
                    <div class="col-11 col-lg-5 animate-on-scroll" data-animation="animate__fadeInDown">
                        <div class="ratio ratio-4x3">
                            <iframe src="{{ $contact->maps }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" title="Mapa de localização"></iframe>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.btn-filter-category');
        const loader = document.getElementById('loader');
        const container = document.getElementById('plans-container');

        const minLoadingTime = 200; // em ms

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                const categoryId = this.dataset.id;

                // Ativa estado visual
                buttons.forEach(btn => btn.classList.remove('on-active'));
                this.classList.add('on-active');

                // Mostra loader e escurece
                loader.style.display = 'flex';
                container.style.opacity = '0.4';

                const startTime = new Date().getTime();

                fetch(`planos/categoria/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        const elapsedTime = new Date().getTime() - startTime;
                        const remainingTime = minLoadingTime - elapsedTime;

                        setTimeout(() => {
                            container.innerHTML = data.html;
                            loader.style.display = 'none';
                            container.style.opacity = '1';

                            // Suaviza os elementos via classe
                            const newPlans = container.querySelectorAll('.plan-ajax-hidden');
                            newPlans.forEach((el, index) => {
                                setTimeout(() => {
                                    el.classList.add('plan-ajax-show');
                                }, 150 * index);
                            });
                        }, remainingTime > 0 ? remainingTime : 0);

                    })
                    .catch(error => {
                        console.error('Erro ao buscar planos:', error);
                        loader.style.display = 'none';
                        container.style.opacity = '1';
                    });
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Configura CSRF Token para todas as requisições AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#phoneForm').on('submit', function(e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
            url: '{{ route("send-newsletter") }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    title: 'Sucesso!',
                    text: response.message,
                    icon: 'success',
                    timer: 1800,
                    showConfirmButton: false
                });
                $('#phoneForm')[0].reset();
            },
            error: function(xhr) {
                console.log(xhr.status, xhr.responseText); // Debug rápido

                if (xhr.status === 422) {
                    // Erro de validação
                    const errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let field in errors) {
                        errorMessages += errors[field][0] + '\n';
                    }

                    Swal.fire({
                        title: 'Erro de validação',
                        text: errorMessages,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });

                } else if (xhr.status === 419) {
                    // CSRF token inválido
                    Swal.fire({
                        title: 'Sessão expirada',
                        text: 'Recarregue a página e tente novamente.',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });

                } else {
                    // Erro genérico
                    Swal.fire({
                        title: 'Erro',
                        text: 'Ocorreu um erro ao enviar seu cadastro. Tente novamente.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
</script>

@endsection
