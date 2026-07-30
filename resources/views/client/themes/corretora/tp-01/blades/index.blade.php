@extends($theme->core('client'))
@section('content')
    @if(isset($slides) && count($slides) > 0)
        <section class="hero">
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                    @foreach ($slides as $slide)
                        <div class="swiper-slide">
                            <div class="hero-slide">
                                <!-- Imagem full -->
                                <div class="hero-bg">
                                    <picture>
                                        <source srcset="{{ asset('storage/' . $slide->path_image_mobile) }}" media="(max-width: 530px)">
                                        <img src="{{ asset('storage/' . $slide->path_image) }}" alt="Distribuição PET" title="Distribuição PET">
                                    </picture>
                                </div>

                                <!-- Overlay -->
                                <div class="overflow"></div>

                                <!-- Conteúdo -->
                                <div class="hero-content mt-5 mt-lg-0">
                                    <div class="container">
                                        <div class="row justify-content-between vh">
                                            <div class="col-lg-5 mt-150">
                                                <span class="font-changa font-15 font-semibold text-uppercase color-green">Encontre o imóvel perfeito</span>
                                                <h1 class="hero-title font-changa font-60 font-bold mb-1 mt-3">
                                                    {{ $slide->title }}
                                                </h1>

                                                <h2 class="hero-subtitle font-changa font-40 font-bold">
                                                    começa aqui!
                                                </h1>

                                                <span class="description font-changa font-15 font-regular">
                                                    {!! $slide->description !!}
                                                </span>


                                                <div class="hero-actions d-flex">
                                                    @if ($slide->link != null)                                    
                                                        <a href="{{ $slide->link }}" target="_blank" rel="noopener noreferrer" class="btn-one rounded-3 px-4 btn-hero btn font-changa bg-yellow color-green font-15 font-medium text-decoration-none">
                                                            Conheça
                                                            <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--green-color)"/>
                                                            </svg>
                                                        </a>
                                                    @endif
                                                    
                                                    <a href="" rel="noopener noreferrer" class="btn-download-ficha btn-two rounded-3 px-4 btn-hero btn font-changa bg-yellow color-green font-15 font-medium text-decoration-none">
                                                        Fale com um especialista
                                                        <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--green-color)"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 d-flex justify-content-end align-items-center mt-150">
                                                <div class="card border-0 rounded-4 overflow-hidden position-relative text-white shadow-sm" style="max-width: 350px; background: linear-gradient(180deg, rgba(8,36,74,.95) 0%, rgba(4,26,57,.98) 100%);">
                                                    <div class="card-body p-4">

                                                        <small class="text-warning fw-semibold text-uppercase d-block mb-3" style="letter-spacing:.5px;">
                                                            Lançamento Exclusivo
                                                        </small>

                                                        <h3 class="fw-bold mb-3">
                                                            Residencial Vista Azul
                                                        </h3>

                                                        <p class="text-light opacity-75 mb-4">
                                                            Apartamentos na planta com vista definitiva para o mar.
                                                        </p>

                                                        <small class="d-block text-light opacity-75">
                                                            A partir de
                                                        </small>

                                                        <div class="display-6 fw-bold lh-1 mb-4">
                                                            R$ 620.000<span style="font-size:.55em;">*</span>
                                                        </div>

                                                        <a href="#" class="btn btn-info text-dark fw-semibold rounded-2 px-4 py-2">
                                                            Conheça o empreendimento
                                                        </a>

                                                        <small class="d-block text-light opacity-50 mt-3">
                                                            *Consulte condições
                                                        </small>

                                                    </div>
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
    
    <section id="search" class="col-8 position-relative bg-white shadow-lg mt-negative rounded-3">
        <div class="property-search p-3">
            <div class="row align-items-center g-0">
        
                <!-- Tipo -->
                <div class="col-lg-3 col-md-6">
                    <div class="property-search__item d-flex justify-content-center align-items-center gap-0">
        
                        <div class="property-search__icon">
                            <i class="bi bi-building font-30"></i>
                        </div>
        
                        <div class="property-search__content">
                            <small class="label-imovel font-changa font-15 font-regular">Tipo de imóvel</small>
        
                            <select class="form-select border-0 shadow-none pt-0">
                                <option class="font-changa font-15 font-regular">Todos</option>
                                <option class="font-changa font-15 font-regular">Apartamento</option>
                                <option class="font-changa font-15 font-regular">Casa</option>
                                <option class="font-changa font-15 font-regular">Terreno</option>
                                <option class="font-changa font-15 font-regular">Sala Comercial</option>
                            </select>
                        </div>
        
                    </div>
                </div>
        
                <!-- Cidade -->
                <div class="col-lg-3 col-md-6">
                    <div class="property-search__item d-flex justify-content-center align-items-center gap-0">
        
                        <div class="property-search__icon">
                            <i class="bi bi-geo-alt font-30"></i>
                        </div>
        
                        <div class="property-search__content">
                            <small class="label-imovel font-changa font-15 font-regular">Cidade / Bairro</small>
        
                            <select class="form-select border-0 shadow-none pt-0">
                                <option class="font-changa font-15 font-regular">Selecione</option>
                            </select>
                        </div>
        
                    </div>
                </div>
        
                <!-- Faixa de preço -->
                <div class="col-lg-3 col-md-6">
                    <div class="property-search__item d-flex justify-content-center align-items-center gap-0">
        
                        <div class="property-search__icon">
                            <i class="bi bi-currency-dollar font-30"></i>
                        </div>
        
                        <div class="property-search__content">
                            <small class="label-imovel font-changa font-15 font-regular">Faixa de preço</small>
        
                            <select class="form-select border-0 shadow-none pt-0">
                                <option class="font-changa font-15 font-regular">Selecione</option>
                            </select>
                        </div>
        
                    </div>
                </div>
        
                <!-- Botão -->
                <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                    <div class="property-search__button w-100">
        
                        <button type="submit" class="btn-search rounded-3 py-2 px-4 w-100 text-white text-center font-changa font-15 font-regular">
                            Buscar imóveis
                            <i class="bi bi-search ms-2"></i>
                        </button>
        
                    </div>
                </div>
        
            </div>
        </div>
    </section>

    @if ($topics->count() > 0)
        <section id="topic" class="topics pt-5">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    @foreach ($topics as $topic)   
                        <div class="col-6 col-md-4 col-lg-2 topic-col">
                            @if ($topic->link <> null)
                                <a href="{{$topic->link}}" class="topic-item d-block" rel="noopener noreferrer">
                                    <img src="{{asset('storage/'.$topic->path_image)}}" alt="Tópico 1" class="img-fluid d-block m-auto" loading="lazy">
                                </a>
                                @else
                                <a class="topic-item d-block">
                                    <img src="{{asset('storage/'.$topic->path_image)}}" alt="Tópico 1" class="img-fluid d-block m-auto" loading="lazy">
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
