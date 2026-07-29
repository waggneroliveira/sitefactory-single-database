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

<style>
    .vh{
       min-height: 90vh; 
    }
    .mt-150{
        margin-top: 150px;
    }
</style>

@endsection
