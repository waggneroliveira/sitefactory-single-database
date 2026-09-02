@extends($theme->core('client'))

@section('content')
    <!-- Banner-Section-Start -->
    <section class="banner_section" id="home_sec">
        @foreach ($slides as $slide)
            <!-- hero bg -->
            <div id="hero" class="hero_bg">
                <img src="{{ asset('storage/' . $slide->path_image) }}" alt="image">
            </div>

            <!-- container start -->
            <div class="container">
                <!-- row start -->
                <div class="row">
                <div class="col-lg-7 col-md-12">
                    <!-- banner text -->
                    <div class="banner_text">
                        <span class="hero-badge mb-3 d-inline-block secondary-color">
                            <i class="bi bi-rocket-takeoff me-1"></i> Lançamento 2026
                        </span>
                        <!-- typed text -->
                        <div class="type-wrap">
                            <!-- add static words/sentences here (i.e. text that you don't want to be removed)-->
                            <span id="typed" style="white-space:pre;" class="typed secondary-color">
                            </span>
                        </div>
                        <!-- h1 -->
                        <h1 class="hero-title font-changa font-40 font-bold text-white"> {{$slide->title}} <span class="secondary-color">{{$slide->subtitle}}</span></h1>
                        <!-- p -->
                        <div class="description text-white">
                            {!! $slide->description !!}
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-center justify-content-lg-start flex-wrap gap-3">
                        @if ($slide->link <> null)                                    
                            <a href="{{$slide->link}}" target="_blank" rel="noopener noreferrer" class="rounded-1 d-flex align-items-center btn-one py-2 px-3 px-lg-5 btn-hero font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none">
                                {{$slide->btn_title}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>  
                            </a>
                        @endif
                        <a href="#services" class="btn d-flex align-items-center btn-outline-light px-lg-5 px-3 py-lg-3 py-1 font-15 font-medium">
                            Serviços avulso
                        </a>
                    </div>

                    <div class="hero-stats">
                        <div class="hero-stats-item">
                            <div class="number text-white-50">100%</div>
                            <div class="label">Personalizável</div>
                        </div>
                        <div class="hero-stats-item">
                            <div class="number text-white-50">24/7</div>
                            <div class="label">Seu site online</div>
                        </div>
                        <div class="hero-stats-item">
                            <div class="number text-white-50">1</div>
                            <div class="label">Plataforma completa</div>
                        </div>
                    </div>
                </div>

                <!-- banner image start -->
                <div class="col-lg-5 col-md-12 mt-4 mt-lg-0">
                    <div class="hero_img">
                    <img src="{{ asset('storage/' . $slide->path_image_mobile) }}" alt="image">
                    </div>
                </div>
                <!-- banner image end -->
                <!-- row end -->
            </div>
            <!-- container end -->
        @endforeach
    </section>
    <!-- Banner-Section-end -->

    <!-- How it Works Section Start -->
    <section class="advance_feature_section white_text" id="how_sec">
        <div class="af_innner">

            <!-- background blure shapes -->
            <div class="blure_shape bg-secondary-color bs_1"> </div>
            <div class="blure_shape bg-secondary-color bs_2"> </div>

            @if ($topics->count() > 0)
                <!-- container -->
                <div class="container">
                    <!-- listing -->
                    <div class="af_listing">
                        <!-- row -->
                        <div class="row">
                            <!-- collom -->
                            <div class="col-md-12">
                                <!-- inner section -->
                                <div class="row listing_inner align-items-center">
                                    <!-- blok -->
                                    @foreach ($topics as $topic)
                                        <div class="af_block col-lg-3 col-md-6 col-sm-6 p-1">
                                            <div class="text d-flex justify-content-center gap-3 align-items-start flex-column" style="min-height: 223px;">
                                                <div class="d-flex justify-content-between align-items-start flex-column mb-2">
                                                    
                                                    <a @if($topic->link) href="{{ $topic->link }}" target="_blank" rel="noopener noreferrer" @endif class="topic-item d-block">
                                                        @if ($topic->path_image)
                                                            <div class="bg-icon bg-secondary-color">
                                                                <img src="{{ asset('storage/' . $topic->path_image) }}" height="30" alt="{{ $topic->title }}" class="img-fluid d-block m-auto" loading="lazy">
                                                            </div>
                                                        @endif
                                                    </a>

                                                    <div class="h5 mt-2">{{ $topic->title }}</div>
                                                </div>
                                                <p>{{ $topic->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <!-- row -->
                    </div>
                    <!-- listing -->

                </div>
            @endif
        </div>

        <!-- device image -->
        <div class="device">
            <img src="{{asset('build/client/images/themes/whi-web/device.png')}}" alt="image" height="250" loading="lazy">
        </div>

    </section>
    <!-- How it Works Section End -->

    <!-- why us new section start -->
    <section class="why_new_section bg-white position-relative" id="why_sec">
        <!-- inner section start -->
        <div class="why_new_section_inner">
        <!-- container start -->
        <div class="container">
          <!-- row start -->
          <div class="row justify-content-center">

            <!-- section title -->
            <div class="section_title">
                <span class="title_badge">Personalize do seu jeito</span>
                <h2 class="trhee-step">Seu site com<br><span>a sua identidade</span></h2>
            </div>

            <div class="dtat_box">
              <div class="col-lg-6 col-md-12">
                <!-- why us new box left -->
                <div class="why_new_left_data">

                  <!-- block 1 -->
                  <div class="why_data_block">
                    <!-- icon -->
                    <div class="number text-white">
                    01                    
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                        <div class="font-semibold font-15 font-changa">Escolha seu template</div>
                        <p>Escolha o modelo que mais combina com o seu negócio e comece a personalizar seu site.</p>
                    </div>
                  </div>

                  <!-- block 2 -->
                  <div class="why_data_block">
                    <!-- icon -->
                    <div class="number text-white">
                    02                    
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <div class="font-semibold font-15 font-changa">Acesse seu painel</div>
                      <p>Entre na sua conta e tenha acesso a todas as opções de personalização do seu site.</p>
                    </div>
                  </div>

                  <!-- block 3 -->
                  <div class="why_data_block">
                    <!-- number -->
                    <div class="number text-white">
                      03
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <div class="font-semibold font-15 font-changa">Personalize seu tema</div>
                      <p>Altere cores, textos, imagens e outros elementos para deixar o site com a identidade da sua marca.</p>
                    </div>
                  </div>

                  <!-- block 4 -->
                  <div class="why_data_block">
                    <!-- number -->
                    <div class="number text-white">
                      04
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <div class="font-semibold font-15 font-changa">Salve e veja a mudança</div>
                      <p>Salve suas alterações e confira seu site personalizado em poucos instantes.</p>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-6 col-md-12 position-relative">
                <img src="{{asset('build/client/images/themes/whi-web/tablet.png')}}" class="position-absolute tablet" loading="lazy" alt="image" style="height: 250px; bottom: 15px; right: 11px;z-index: 1;">
                <img src="{{asset('build/client/images/themes/whi-web/phone-login.png')}}" class="position-absolute phone-img" loading="lazy" alt="image" style="height: 220px; bottom: 15px; left: 0px; z-index: 1;">
                <!-- why us new image -->
                <div class="why_us_new_img position-relative">
                  <img src="{{asset('build/client/images/themes/whi-web/gif-paine-one.gif')}}" loading="lazy" alt="image">
                </div>
              </div>
            </div>

          </div>
          <!-- row end -->
        </div>
        <!-- container end -->
      </div>
      
    </section>
    <!-- why us new section end -->

    <!-- Service Section Start -->
    <section class="row_am service_section position-relative overflow-hidden" id="feature_sec">
        <!-- background blure shapes -->       
        <div class="blure_shape bg-secondary-color bs_2"> </div>

        <div class="container position-relative">
            @php
                $logoPath = storage_path('app/public/' . $tenantTheme->path_image_logo_header);
                $dimensions = file_exists($logoPath) ? @getimagesize($logoPath) : null;
            @endphp
            <!-- section title -->
            <div class="section_title">
                <span class="title_badge text-white">VANTAGENS</span>
                <h2 class="trhee-step text-white">O que você ganha com<br> a <span>WHI Web</span></h2>
            </div>     

            <div class="row service_blocks flex-row-reverse">                
                <div class="col-md-6">
                    <div class="service_text right_side">

                        <span class="title_badge">Para você</span>
                        <h3 class="text-white">Design profissional para o seu negócio</h3>
                        <p class="text-white">Tenha acesso a layouts pensados para diferentes tipos de negócios, com uma estrutura moderna e pronta para apresentar sua empresa.</p>

                        <ul class="design_block py-3 px-0">
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Layouts criados para diferentes segmentos
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Design moderno e profissional
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Estrutura pensada para destacar seu negócio
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Experiência otimizada para seus visitantes
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Responsividade em celulares, tablets e computadores
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Atualizações contínuas nos modelos disponíveis
                            </li>
                        </ul>
                        <div class="btn_block">
                            <a href="#plans" class="bg-button-two color-button-two px-3 py-2 rounded-3">
                              <span>
                                Começar agora
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                              </span> 
                            </a>
                        </div>
                    </div>
                </div>                

                <div class="col-md-6">
                    <div class="inner_block dark_bg rotate_right">
                        <div class="img">
                            <img src="{{asset('build/client/images/themes/whi-web/benefit-1.png')}}" alt="image" loading="lazy" width="{{ $dimensions[0] ?? 200 }}" height="{{ $dimensions[1] ?? 60 }}" style="max-width:100%;height:auto;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row service_blocks no_bottom_padding">
                <div class="col-md-6">
                  <div class="service_text">
                    <span class="title_badge">Para seu cliente</span>
                    <h3 class="text-white">Uma experiência melhor para quem visita</h3>
                    <p class="text-white">Ofereça um site organizado, rápido e adaptado para facilitar a navegação e apresentar sua empresa com clareza.</p>

                    <ul class="design_block py-3 px-0">
                        <li class="d-flex gap-2 justify-content-start align-items-center">
                            <i class="bi bi-check-circle"></i>
                            Navega por uma estrutura clara e intuitiva
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center">
                            <i class="bi bi-check-circle"></i>
                            Encontra informações importantes com facilidade
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center">
                            <i class="bi bi-check-circle"></i>
                            Acessa o site de qualquer dispositivo
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center">
                            <i class="bi bi-check-circle"></i>
                            Conhece melhor seus produtos e serviços
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center">
                            <i class="bi bi-check-circle"></i>
                            Entra em contato de forma rápida
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center">
                            <i class="bi bi-check-circle"></i>
                            Percebe mais profissionalismo na sua presença online
                        </li>
                    </ul>

                    <a href="#plans" 
                    class="bg-button-two color-button-two px-3 py-2 rounded-3">
                    <span>
                      Começar agora
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                    </span> 
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="inner_block">
                        <div class="img">
                            <img src="{{asset('build/client/images/themes/whi-web/benefit-2.png')}}" alt="image" loading="lazy" width="{{ $dimensions[0] ?? 200 }}" height="{{ $dimensions[1] ?? 60 }}" style="max-width:100%;height:auto;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row service_blocks flex-row-reverse">
                <div class="col-md-6">
                    <div class="service_text right_side">

                        <span class="title_badge">Para seu negócio</span>
                        <h3 class="text-white">Tenha autonomia para cuidar do seu site</h3>
                        <p class="text-white">Gerencie o conteúdo da sua presença digital em um só lugar, sem depender de alterações feitas por terceiros.</p>

                        <ul class="design_block py-3 px-0">
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Gerencie todo o conteúdo pelo seu painel
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Atualize informações sempre que necessário
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Controle imagens, textos e informações da empresa
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Economize tempo com uma gestão mais simples
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Mantenha seu site sempre atualizado
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center">
                                <i class="bi bi-check-circle"></i>
                                Tenha mais autonomia sobre sua presença digital
                            </li>
                        </ul>
                        <div class="btn_block">
                            <a href="#plans" 
                            class="bg-button-two color-button-two px-3 py-2 rounded-3">
                            <span>
                              Começar agora
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inner_block dark_bg rotate_right">
                        <div class="img">
                            <img src="{{asset('build/client/images/themes/whi-web/benefit-3.png')}}" alt="image" loading="lazy" width="{{ $dimensions[0] ?? 200 }}" height="{{ $dimensions[1] ?? 60 }}" style="max-width:100%;height:auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="blure_shape bg-secondary-color bs_1"> </div> 
    </section>
    <!-- Service Section End -->

    <section class="tpl-modal-sec">
      <div class="container">
        <!-- Div de topo (Sem tag header para não colidir) -->
        <div class="tpl-header-block">
          <div class="tpl-header-left">
            <div class="tpl-badge">
              <i class="bi bi-intersect"></i> Modelos Prontos
            </div>
            <h2>Um template para começar.<br><span>Uma identidade única.</span></h2>
          </div>

          <div class="tpl-header-right">
            <p>Escolha uma estrutura profissional e passe o mouse sobre os cards para navegar no modelo completo.</p>
            <div class="tpl-scroll-hint">
              Deslize para ver mais <i class="bi bi-arrow-right"></i>
            </div>
          </div>
        </div>

        <!-- Trilho de Rolagem -->
        <div class="tpl-scroll-track">

          <!-- Item 1 -->
          <article class="tpl-card">
            <div class="tpl-card-topbar">
              <div class="tpl-dots"><span></span><span></span><span></span></div>
              <span class="tpl-tag">Popular</span>
            </div>
            <div class="tpl-preview">
              <img src="https://halothemes.net/cdn/shop/files/petcity-theme.jpg" onerror="this.src='https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=800&q=80'" alt="Petshop" loading="lazy">
              <div class="tpl-overlay">
                <a href="#" class="tpl-btn-preview bg-secondary">Ver Demo <i class="bi bi-arrow-up-right"></i></a>
              </div>
            </div>
            <div class="tpl-card-body">
              <div>
                <span class="tpl-category">Petshop</span>
                <h3 class="tpl-title">Moderno e Acolhedor</h3>
              </div>
              <div class="tpl-arrow"><i class="bi bi-arrow-up-right"></i></div>
            </div>
          </article>

          <!-- Item 2 -->
          <article class="tpl-card">
            <div class="tpl-card-topbar">
              <div class="tpl-dots"><span></span><span></span><span></span></div>
              <span class="tpl-tag">Destaque</span>
            </div>
            <div class="tpl-preview">
              <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/7b3e7c176553645.64c7c4c7e7a6f9.png" onerror="this.src='https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80'" alt="Restaurante" loading="lazy">
              <div class="tpl-overlay">
                <a href="#" class="tpl-btn-preview">Ver Demo <i class="bi bi-arrow-up-right"></i></a>
              </div>
            </div>
            <div class="tpl-card-body">
              <div>
                <span class="tpl-category">Restaurante</span>
                <h3 class="tpl-title">Elegante e Convidativo</h3>
              </div>
              <div class="tpl-arrow"><i class="bi bi-arrow-up-right"></i></div>
            </div>
          </article>

          <!-- Item 3 -->
          <article class="tpl-card">
            <div class="tpl-card-topbar">
              <div class="tpl-dots"><span></span><span></span><span></span></div>
            </div>
            <div class="tpl-preview">
              <img src="https://y4pdgnepgswqffpt.public.blob.vercel-storage.com/templates/52439/servexa-UBoXqFa1RHZGFrlhyXS8hvp8hA4fKN" alt="Serviços" loading="lazy">
              <div class="tpl-overlay">
                <a href="#" class="tpl-btn-preview">Ver Demo <i class="bi bi-arrow-up-right"></i></a>
              </div>
            </div>
            <div class="tpl-card-body">
              <div>
                <span class="tpl-category">Serviços</span>
                <h3 class="tpl-title">Clean e Profissional</h3>
              </div>
              <div class="tpl-arrow"><i class="bi bi-arrow-up-right"></i></div>
            </div>
          </article>

          <!-- Item 4 -->
          <article class="tpl-card">
            <div class="tpl-card-topbar">
              <div class="tpl-dots"><span></span><span></span><span></span></div>
              <span class="tpl-tag">Novo</span>
            </div>
            <div class="tpl-preview">
              <img src="https://www.yola.com/ws/media-library/0a36e7e121e846f3a45f539f5f88a90e/27c5bb58f4394abeb3d85fc6c41574db.jpeg" alt="Empresas" loading="lazy">
              <div class="tpl-overlay">
                <a href="#" class="tpl-btn-preview">Ver Demo <i class="bi bi-arrow-up-right"></i></a>
              </div>
            </div>
            <div class="tpl-card-body">
              <div>
                <span class="tpl-category">Empresas</span>
                <h3 class="tpl-title">Sofisticado e Objetivo</h3>
              </div>
              <div class="tpl-arrow"><i class="bi bi-arrow-up-right"></i></div>
            </div>
          </article>

        </div>

        <!-- Banner Inferior -->
        <div class="tpl-cta">
          <div class="tpl-cta-text">
            <h4>Quer algo 100% exclusivo?</h4>
            <p>Criamos um design personalizado do zero para atender às necessidades específicas do seu negócio.</p>
          </div>
          <a href="#" class="tpl-cta-btn">Solicitar Projeto Exclusivo</a>
        </div>

      </div>
    </section>

    @if (!empty($videos) && $videos->count() > 0)
      <section class="video-section">
        <div class="container">
          <div class="row video-card-container g-0">
            
            <!-- Lista Lateral (Esquerda) -->
            <div class="col-lg-5 p-2 p-lg-4 video-sidebar">
              <div class="video-sidebar-header">
                <h2 class="video-sidebar-title">Playlist de Vídeos</h2>
                <span class="video-count-badge">{{ $videos->count() }} vídeos</span>
              </div>

              <div class="video-list">
                @foreach($videos as $video)
                  <div class="video-item" data-video="{{ $video->link }}">
                    <div class="video-thumb-wrapper">
                      <!-- Thumbnail dinâmica gerada via JS -->
                      <img class="video-thumb-img" src="" alt="Thumbnail" loading="lazy">
                      <div class="play-icon-overlay">
                        <svg viewBox="0 0 24 24">
                          <path d="M8 5v14l11-7z"/>
                        </svg>
                      </div>
                    </div>
                    <h3 class="video-title">
                      {{ $video->title ?? 'Vídeo ' . ($loop->iteration) }}
                    </h3>
                  </div>
                @endforeach
              </div>
            </div>

            <!-- Player de Vídeo (Direita) -->
            <div class="col-lg-7 video-player-wrapper">
              <iframe id="videoPlayer" class="video-player-iframe"
                      src=""
                      title="Player de Vídeo"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>
            </div>

          </div>
        </div>
      </section>
    @endif

    <section class="testimonials-section" id="review_sec">
      <div class="container position-relative z-1">
        
        <!-- Cabeçalho -->
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-8" data-aos="fade-up">
            <span class="testimonials-badge">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              Depoimentos Reais
            </span>
            <h2 class="testimonials-title">Transformando a rotina de quem confia no nosso trabalho</h2>
          </div>
        </div>

        <!-- Estatísticas de Impacto (Novidade Visual) -->
        <div class="row metrics-banner align-items-center text-center mb-5" data-aos="fade-up" data-aos-delay="100">
          <div class="col-6 col-md-3 mb-3 mb-md-0">
            <div class="metric-number">4.9/5</div>
            <p class="metric-label">Nota Média dos Clientes</p>
          </div>
          <div class="col-6 col-md-3 mb-3 mb-md-0">
            <div class="metric-number">+10k</div>
            <p class="metric-label">Entregas Realizadas</p>
          </div>
          <div class="col-6 col-md-3">
            <div class="metric-number">99%</div>
            <p class="metric-label">Satisfação Garantida</p>
          </div>
          <div class="col-6 col-md-3">
            <div class="metric-number">24/7</div>
            <p class="metric-label">Suporte Dedicado</p>
          </div>
        </div>

        <!-- Slider de Depoimentos (Swiper) -->
        <div class="swiper testimonialSwiper mb-5" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper py-3">

            <!-- Card 1 -->
            <div class="swiper-slide">
              <div class="testimonial-card">
                <svg class="testimonial-quote-icon" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <div class="rating-stars">★★★★★</div>
                <p class="testimonial-text">
                  <strong>"Agilidade sem igual!"</strong> O serviço superou minhas expectativas. A entrega chegou muito antes do prazo e o atendimento tirou todas as minhas dúvidas instantaneamente.
                </p>
                <div class="author-wrapper">
                  <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Avatar" class="author-avatar" loading="lazy">
                  <div>
                    <h3 class="author-name">Beatriz Rossi</h3>
                    <p class="author-role">Empresária</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="swiper-slide">
              <div class="testimonial-card">
                <svg class="testimonial-quote-icon" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <div class="rating-stars">★★★★★</div>
                <p class="testimonial-text">
                  <strong>"Qualidade Impecável!"</strong> Desde o primeiro contato percebi o profissionalismo. O produto chegou muito bem embalado e a experiência de uso é nota 10.
                </p>
                <div class="author-wrapper">
                  <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80" alt="Avatar" class="author-avatar" loading="lazy">
                  <div>
                    <h3 class="author-name">Ricardo Mendes</h3>
                    <p class="author-role">Designer Lead</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="swiper-slide">
              <div class="testimonial-card">
                <svg class="testimonial-quote-icon" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <div class="rating-stars">★★★★★</div>
                <p class="testimonial-text">
                  <strong>"Facilidade e Segurança"</strong> A plataforma é super intuitiva. Resolver as minhas demandas diárias ficou muito mais rápido depois que comecei a usar.
                </p>
                <div class="author-wrapper">
                  <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=100&auto=format&fit=crop&q=80" alt="Avatar" class="author-avatar" loading="lazy">
                  <div>
                    <h3 class="author-name">Camila Fernandes</h3>
                    <p class="author-role">Gerente de Projetos</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Chamada para Ação CTA -->
        <div class="btn_block text-center" data-aos="fade-up" data-aos-delay="300">
            <a href="#plans" class="bg-button-two color-button-two px-3 py-2 rounded-3 ">
              <span>
                Começar agora
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
              </span>
            </a>
        </div>

      </div>
    </section>

    <section class="pricing-section" id="plans">
      <div class="container">
        
        <!-- Cabeçalho -->
        <div class="row justify-content-center text-center">
          <div class="col-lg-8">
            <span class="pricing-badge">Planos e Preços</span>
            <h2 class="pricing-title">Escolha o plano ideal para escalar o seu negócio</h2>
            <p class="pricing-subtitle">Transparência total. Sem taxas escondidas, altere ou cancele quando quiser.</p>
            
            <!-- Toggle Mensal / Anual -->
            <div class="pricing-toggle-wrapper flex-wrap">
              <span class="toggle-label active" id="label-monthly">Cobrança Mensal</span>
              <div class="form-check form-switch p-0 m-0">
                <input 
                  class="form-check-input pricing-switch" 
                  type="checkbox" 
                  id="pricingToggle"
                  aria-labelledby="label-monthly label-yearly"
                >
              </div>
              <span class="toggle-label" id="label-yearly">
                Cobrança Anual
                <span class="discount-badge">-20% OFF</span>
              </span>
            </div>
          </div>
        </div>

        <!-- Cards de Planos -->
        <div class="row g-4 align-items-stretch justify-content-center">
          
          <!-- PLANO 1: START -->
          <div class="col-lg-4 col-md-6">
            <div class="plan-card">
              <div>
                <h3 class="plan-name">Start</h3>
                <p class="plan-description">Perfeito para quem está começando e precisa das ferramentas essenciais.</p>
                
                <div class="plan-price-wrapper">
                  <span class="currency">R$</span>
                  <span class="amount" data-monthly="49" data-yearly="39">49</span>
                  <span class="period">/mês</span>
                </div>

                <ul class="plan-features">
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Até 3 projetos ativos
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Suporte via e-mail (24h)
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Acesso à comunidade básica
                  </li>
                  <li class="feature-disabled">
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                    Relatórios avançados
                  </li>
                  <li class="feature-disabled">
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                    Gerente de conta dedicado
                  </li>
                </ul>
              </div>

              <a href="#" class="btn-plan btn-plan-outline">Começar com Start</a>
            </div>
          </div>

          <!-- PLANO 2: PRO (Mais Popular) -->
          <div class="col-lg-4 col-md-6">
            <div class="plan-card popular">
              <span class="popular-badge">Mais Popular</span>
              <div>
                <h3 class="plan-name">Pro</h3>
                <p class="plan-description">A solução completa para empresas em crescimento que buscam performance.</p>
                
                <div class="plan-price-wrapper">
                  <span class="currency">R$</span>
                  <span class="amount" data-monthly="99" data-yearly="79">99</span>
                  <span class="period">/mês</span>
                </div>

                <ul class="plan-features">
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Projetos ilimitados
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Suporte prioritário via WhatsApp
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Acesso completo a todas as ferramentas
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Relatórios e métricas avançadas
                  </li>
                  <li class="feature-disabled">
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                    Gerente de conta dedicado
                  </li>
                </ul>
              </div>

              <a href="#" class="btn-plan btn-plan-primary">Testar Pro Grátis</a>
            </div>
          </div>

          <!-- PLANO 3: PREMIUM -->
          <div class="col-lg-4 col-md-6">
            <div class="plan-card">
              <div>
                <h3 class="plan-name">Premium</h3>
                <p class="plan-description">Atendimento VIP e infraestrutura personalizada para grandes operações.</p>
                
                <div class="plan-price-wrapper">
                  <span class="currency">R$</span>
                  <span class="amount" data-monthly="199" data-yearly="159">199</span>
                  <span class="period">/mês</span>
                </div>

                <ul class="plan-features">
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Tudo do Plano Pro incluído
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Gerente de conta dedicado 24/7
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    API de integração exclusiva
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    Treinamento de equipe personalizado
                  </li>
                  <li>
                    <span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    SLA de atendimento de 30min
                  </li>
                </ul>
              </div>

              <a href="#" class="btn-plan btn-plan-outline">Falar com Consultor</a>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="faq-section" id="faq">
      <div class="container">
        
        <div class="row g-5">
          
          @if (isset($sessaoFaq) && $sessaoFaq <> null)
            @php $isFull = !(isset($faqs) && $faqs->count()); @endphp

            <div class="{{ $isFull ? 'col-lg-12 text-center mx-auto' : 'col-lg-4' }}">
              <span class="faq-badge">{{$sessaoFaq->tag}}</span>
              <h2 class="faq-title">{{$sessaoFaq->title}}</h2>
              <div class="faq-subtitle mb-4">{!!$sessaoFaq->description!!}</div>

              <div class="support-card {{ $isFull ? 'mx-auto' : 'd-none d-lg-block' }}" style="{{ $isFull ? 'max-width: 450px;' : '' }}">
                <div class="support-icon {{ $isFull ? 'm-auto mb-2' : 'm-0' }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <h3 class="support-title">{{$sessaoFaq->title_box}}</h3>
                <div class="support-text">{{$sessaoFaq->description_box}}</div>
                <a href="{{$sessaoFaq->link}}" target="_blank" class="btn-faq-cta w-100 justify-content-center">
                  {{$sessaoFaq->btn_title}}
                </a>
              </div>
            </div>
          @endif

          @if (isset($faqs) && $faqs->count())
            <div class="{{ (isset($sessaoFaq) && $sessaoFaq <> null) ? 'col-lg-8' : 'col-lg-12' }}">
              <div class="faq-accordion">

                @foreach($faqs as $faq)                
                  <div class="faq-card">
                    <button class="faq-header">
                      <span>{{$faq->question}}</span>
                      <span class="faq-toggle-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                      </span>
                    </button>
                    <div class="faq-body">
                      {!! $faq->answer !!}
                    </div>
                  </div>
                @endforeach

              </div>

              <div class="text-center mt-5">
                <a href="#plans" class="btn-faq-cta">
                  Começar agora
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                </a>
              </div>

            </div>
          @endif
        </div>
      </div>
    </section>

    <section class="cta-pro-section" id="contact_sec">
    <!-- Glows de Iluminação em Camadas -->
    <div class="cta-glow-1"></div>
    <div class="cta-glow-2"></div>

    <div class="container">
      <div class="cta-glass-card p-3 p-lg-4">
        <div class="row align-items-center">
          
          <!-- Conteúdo Principal -->
          <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="cta-status-badge">
              <span class="status-dot"></span>
              Equipe Online Agora
            </div>
            <h2 class="cta-title">Vamos impulsionar o seu projeto?</h2>
            <p class="cta-subtitle">Escolha o canal de sua preferência ou selecione o assunto abaixo para iniciarmos seu atendimento imediato.</p>

            <!-- Seletor de Assuntos (Interativo) -->
            <div class="cta-topics-label">Sobre o que deseja falar?</div>
            <div class="cta-topics-group justify-content-center justify-content-lg-start">
              <span class="topic-chip active" data-subject="Orçamento & Prazos">Orçamento</span>
              <span class="topic-chip" data-subject="Dúvidas Técnicas">Dúvidas Técnicas</span>
              <span class="topic-chip" data-subject="Contratar Plano">Contratar Plano</span>
              <span class="topic-chip" data-subject="Suporte">Suporte</span>
            </div>
          </div>

          <!-- Canais Rápidos de Contato -->
          <div class="col-lg-6">
            <div class="d-flex flex-column gap-3">

              <!-- Canal 1: WhatsApp Direto -->
              <div class="contact-channel-card justify-content-start justify-content-lg-between p-2 p-lg-4">
                <div class="channel-info">
                  <div class="channel-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                  </div>
                  <div class="channel-details">
                    <div class="h4">Atendimento Telefônico / WhatsApp</div>
                    <p class="d-flex justify-content-start">(71) 99276-8360</p>
                  </div>
                </div>
                <div class="d-flex gap-2 w-100-mobile">
                  <button class="btn-channel-action" onclick="copyToClipboard('(71) 99276-8360', 'Telefone copiado!')" title="Copiar Número">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                  </button>
                  <a href="https://wa.me/5571992768360?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20Orçamento%20%26%20Prazos" id="whatsapp-btn" target="_blank" class="btn-channel-action btn-channel-primary">
                    Conversar
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                  </a>
                </div>
              </div>

              <!-- Canal 2: E-mail -->
              <div class="contact-channel-card justify-content-start justify-content-lg-between p-2 p-lg-4">
                <div class="channel-info">
                  <div class="channel-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                  </div>
                  <div class="channel-details">
                    <div class="h4">Envie uma mensagem por e-mail</div>
                    <p class="d-flex justify-content-star">atendimento@whi.dev.br</p>
                  </div>
                </div>
                <div class="d-flex gap-2 w-100-mobile">
                  <button class="btn-channel-action" onclick="copyToClipboard('atendimento@whi.dev.br', 'E-mail copiado!')" title="Copiar E-mail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="14" height="14" x="8" y="8" rx="2" ry="2"/><path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/></svg>
                  </button>
                  <a href="mailto:atendimento@whi.dev.br" class="btn-channel-action">
                    Escrever
                  </a>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
    </section>

    <!-- Toast de Notificação -->
    <div id="cta-toast" class="cta-toast">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
      <span id="toast-message">Copiado com sucesso!</span>
    </div>

@endsection
