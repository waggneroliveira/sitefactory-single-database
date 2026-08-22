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
                <div class="col-lg-7 col-md-12" data-aos="fade-up" data-aos-duration="1500">
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

                    <div class="mt-3 d-flex justify-conten-center flex-wrap gap-3">
                        @if ($slide->link <> null)                                    
                            <a href="{{$slide->link}}" target="_blank" rel="noopener noreferrer" class="rounded-1 d-flex align-items-center btn-one py-2 px-3 px-lg-5 btn-hero font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none hover-zoom">
                                {{$slide->btn_title}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>  
                            </a>
                        @endif
                        <a href="#services" class="btn d-flex align-items-center btn-outline-light px-lg-5 px-3 py-lg-3 py-1 font-15 font-medium hover-zoom">
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
                                        <div class="af_block col-lg-3 col-md-6 col-sm-6 p-1" data-aos="fade-up" data-aos-duration="{{ ($loop->index + 1) * 500 }}">
                                            <div class="text d-flex justify-content-center gap-3 align-items-start flex-column" style="min-height: 223px;">
                                                <div class="d-flex justify-content-between align-items-start flex-column mb-2">
                                                    @if ($topic->link <> null)
                                                        <a href="{{$topic->link}}" class="topic-item d-block" rel="noopener noreferrer">
                                                            @if ($topic->path_image <> null)                                                        
                                                                <div class="bg-icon bg-secondary-color">
                                                                    <img src="{{asset('storage/'.$topic->path_image)}}" height="30" alt="Tópico 1" class="img-fluid d-block m-auto" loading="lazy">
                                                                </div>
                                                            @endif
                                                        </a>
                                                        @else
                                                        <a class="topic-item d-block">
                                                            @if ($topic->path_image <> null)                                                        
                                                                <div class="bg-icon bg-secondary-color">
                                                                    <img src="{{asset('storage/'.$topic->path_image)}}" height="30" alt="Tópico 1" class="img-fluid d-block m-auto" loading="lazy">
                                                                </div>
                                                            @endif
                                                        </a>
                                                    @endif
                                                    
                                                    <h5>{{$topic->title}}</h5>
                                                </div>
                                                <p>{{$topic->description}}</p>
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
            <img src="{{asset('build/client/images/themes/whi-web/device.png')}}" alt="image" height="250">
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
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <span class="title_badge">Personalize do seu jeito</span>
                <h2 class="trhee-step">Seu site com<br><span>a sua identidade</span></h2>
            </div>

            <div class="dtat_box">
              <div class="col-lg-6 col-md-12">
                <!-- why us new box left -->
                <div class="why_new_left_data">

                  <!-- block 1 -->
                  <div class="why_data_block " data-aos="fade-right" data-aos-duration="1500">
                    <!-- icon -->
                    <div class="number text-white">
                    01                    
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                        <h6>Escolha seu template</h6>
                        <p>Escolha o modelo que mais combina com o seu negócio e comece a personalizar seu site.</p>
                    </div>
                  </div>

                  <!-- block 2 -->
                  <div class="why_data_block " data-aos="fade-right" data-aos-duration="1500">
                    <!-- icon -->
                    <div class="number text-white">
                    02                    
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <h6>Acesse seu painel</h6>
                      <p>Entre na sua conta e tenha acesso a todas as opções de personalização do seu site.</p>
                    </div>
                  </div>

                  <!-- block 3 -->
                  <div class="why_data_block " data-aos="fade-right" data-aos-duration="1500">
                    <!-- number -->
                    <div class="number text-white">
                      03
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <h6>Personalize seu tema</h6>
                      <p>Altere cores, textos, imagens e outros elementos para deixar o site com a identidade da sua marca.</p>
                    </div>
                  </div>

                  <!-- block 4 -->
                  <div class="why_data_block " data-aos="fade-right" data-aos-duration="1500">
                    <!-- number -->
                    <div class="number text-white">
                      04
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <h6>Salve e veja a mudança</h6>
                      <p>Salve suas alterações e confira seu site personalizado em poucos instantes.</p>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-6 col-md-12 position-relative" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <img src="{{asset('build/client/images/themes/whi-web/tablet.png')}}" class="position-absolute" alt="image" style="height: 250px; bottom: 15px; right: 11px;z-index: 1;">
                <img src="{{asset('build/client/images/themes/whi-web/phone-login.png')}}" class="position-absolute" alt="image" style="    height: 220px; bottom: 15px; left: -34px; z-index: 1;">
                <!-- why us new image -->
                <div class="why_us_new_img position-relative">
                  <img src="{{asset('build/client/images/themes/whi-web/gif-paine-one.gif')}}" alt="image">
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
            <!-- section title -->
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
                <span class="title_badge text-white">VANTAGENS</span>
                <h2 class="trhee-step text-white">O que você ganha com<br> a <span>WHI Web</span></h2>
            </div>     

            <div class="row service_blocks flex-row-reverse">                
                <div class="col-md-6">
                    <div class="service_text right_side" data-aos="fade-up" data-aos-duration="1500">

                        <span class="title_badge">Para você</span>
                        <h3 class="text-white">Design profissional para o seu negócio</h3>
                        <p class="text-white">Tenha acesso a layouts pensados para diferentes tipos de negócios, com uma estrutura moderna e pronta para apresentar sua empresa.</p>

                        <ul class="design_block py-3">
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Layouts</span> criados para diferentes segmentos</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Design</span> moderno e profissional</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Estrutura</span> pensada para destacar seu negócio</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Experiência</span> otimizada para seus visitantes</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Responsividade</span> em celulares, tablets e computadores</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Atualizações</span> contínuas nos modelos disponíveis</h6>
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
                    <div class="inner_block dark_bg rotate_right" data-aos="fade-up" data-aos-duration="1500">
                        <div class="img">
                            <img src="{{asset('build/client/images/themes/whi-web/benefit-1.png')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row service_blocks no_bottom_padding">
                <div class="col-md-6">
                  <div class="service_text" data-aos="fade-up" data-aos-duration="1500">
                    <span class="title_badge">Para seu cliente</span>
                    <h3 class="text-white">Uma experiência melhor para quem visita</h3>
                    <p class="text-white">Ofereça um site organizado, rápido e adaptado para facilitar a navegação e apresentar sua empresa com clareza.</p>

                    <ul class="design_block py-3">
                        <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                            <i class="bi bi-check-circle"></i>
                            <h6><span>Navega</span> por uma estrutura clara e intuitiva</h6>
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                            <i class="bi bi-check-circle"></i>
                            <h6><span>Encontra</span> informações importantes com facilidade</h6>
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                            <i class="bi bi-check-circle"></i>
                            <h6><span>Acessa</span> o site de qualquer dispositivo</h6>
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                            <i class="bi bi-check-circle"></i>
                            <h6><span>Conhece</span> melhor seus produtos e serviços</h6>
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                            <i class="bi bi-check-circle"></i>
                            <h6><span>Entra</span> em contato de forma rápida</h6>
                        </li>
                        <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                            <i class="bi bi-check-circle"></i>
                            <h6><span>Percebe</span> mais profissionalismo na sua presença online</h6>
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
                    <div class="inner_block" data-aos="fade-up" data-aos-duration="1500">
                        <div class="img">
                            <img src="{{asset('build/client/images/themes/whi-web/benefit-2.png')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row service_blocks flex-row-reverse">
                <div class="col-md-6">
                    <div class="service_text right_side" data-aos="fade-up" data-aos-duration="1500">

                        <span class="title_badge">Para seu negócio</span>
                        <h3 class="text-white">Tenha autonomia para cuidar do seu site</h3>
                        <p class="text-white">Gerencie o conteúdo da sua presença digital em um só lugar, sem depender de alterações feitas por terceiros.</p>

                        <ul class="design_block py-3">
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Gerencie</span> todo o conteúdo pelo seu painel</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Atualize</span> informações sempre que necessário</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Controle</span> imagens, textos e informações da empresa</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Economize</span> tempo com uma gestão mais simples</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Mantenha</span> seu site sempre atualizado</h6>
                            </li>
                            <li class="d-flex gap-2 justify-content-start align-items-center" data-aos="fade-up" data-aos-duration="1500">
                                <i class="bi bi-check-circle"></i>
                                <h6><span>Tenha</span> mais autonomia sobre sua presença digital</h6>
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
                    <div class="inner_block dark_bg rotate_right" data-aos="fade-up" data-aos-duration="1500">
                        <div class="img">
                            <img src="{{asset('build/client/images/themes/whi-web/benefit-3.png')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="blure_shape bg-secondary-color bs_1"> </div> 
    </section>
    <!-- Service Section End -->

    <section class="tpl-modal-sec overflow-hidden">
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
              <img src="https://halothemes.net/cdn/shop/files/petcity-theme.jpg" onerror="this.src='https://images.unsplash.com/photo-1548199973-03cce0bbc87b?auto=format&fit=crop&w=800&q=80'" alt="Petshop">
              <div class="tpl-overlay">
                <a href="#" class="tpl-btn-preview">Ver Demo <i class="bi bi-arrow-up-right"></i></a>
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
              <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/7b3e7c176553645.64c7c4c7e7a6f9.png" onerror="this.src='https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80'" alt="Restaurante">
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
              <img src="https://y4pdgnepgswqffpt.public.blob.vercel-storage.com/templates/52439/servexa-UBoXqFa1RHZGFrlhyXS8hvp8hA4fKN" alt="Serviços">
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
              <img src="https://www.yola.com/ws/media-library/0a36e7e121e846f3a45f539f5f88a90e/27c5bb58f4394abeb3d85fc6c41574db.jpeg" alt="Empresas">
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
            <div class="col-lg-5 video-sidebar">
              <div class="video-sidebar-header">
                <h2 class="video-sidebar-title">Playlist de Vídeos</h2>
                <span class="video-count-badge">{{ $videos->count() }} vídeos</span>
              </div>

              <div class="video-list">
                @foreach($videos as $video)
                  <div class="video-item" data-video="{{ $video->link }}">
                    <div class="video-thumb-wrapper">
                      <!-- Thumbnail dinâmica gerada via JS -->
                      <img class="video-thumb-img" src="" alt="Thumbnail">
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


      <style>
        /* ==========================================================
   SEÇÃO DE DEPOIMENTOS - ULTRA MODERNA (DARK GLASS)
   ========================================================== */
.testimonials-section {
  background: #080a0f;
  position: relative;
  padding: 100px 0;
  overflow: hidden;
  font-family: 'Montserrat', sans-serif;
}

/* Esferas de luz com brilho de fundo (Glow Effects) */
.testimonials-section::before,
.testimonials-section::after {
  content: '';
  position: absolute;
  width: 350px;
  height: 350px;
  border-radius: 50%;
  filter: blur(120px);
  pointer-events: none;
  opacity: 0.25;
}
.testimonials-section::before {
  background: #ff0055;
  top: 10%;
  left: -5%;
}
.testimonials-section::after {
  background: #7000ff;
  bottom: 10%;
  right: -5%;
}

/* Badge e Cabeçalho */
.testimonials-badge {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.12);
  color: #ff0055;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  padding: 6px 16px;
  border-radius: 30px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 16px;
}

.testimonials-title {
  color: #ffffff;
  font-size: 2.5rem;
  font-weight: 800;
  letter-spacing: -0.5px;
}

/* Banner de Métricas / Métricas de Sucesso */
.metrics-banner {
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(255, 255, 255, 0.06);
  backdrop-filter: blur(12px);
  border-radius: 20px;
  padding: 24px;
}

.metric-number {
  font-size: 2rem;
  font-weight: 800;
  background: linear-gradient(135deg, #ffffff 0%, #a0a5b5 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.metric-label {
  color: #8a8f9d;
  font-size: 13px;
  margin: 0;
}

/* Cards de Depoimento */
.testimonial-card {
  background: rgba(18, 22, 31, 0.6);
  border: 1px solid rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(16px);
  border-radius: 24px;
  padding: 32px;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
  position: relative;
}

.testimonial-card:hover {
  transform: translateY(-8px);
  border-color: rgba(255, 0, 85, 0.4);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
}

.testimonial-quote-icon {
  position: absolute;
  top: 24px;
  right: 28px;
  opacity: 0.1;
  width: 40px;
  height: 40px;
  fill: #ffffff;
}

.rating-stars {
  color: #ffb800;
  display: flex;
  gap: 4px;
  margin-bottom: 16px;
  font-size: 14px;
}

.testimonial-text {
  color: #c5c9d3;
  font-size: 15px;
  line-height: 1.6;
  margin-bottom: 24px;
}

.testimonial-text strong {
  color: #ffffff;
}

/* Autor */
.author-wrapper {
  display: flex;
  align-items: center;
  gap: 14px;
}

.author-avatar {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #ff0055;
}

.author-name {
  color: #ffffff;
  font-size: 15px;
  font-weight: 700;
  margin: 0;
}

.author-role {
  color: #727785;
  font-size: 12px;
  margin: 0;
}

/* Botão de Ação CTA */
.cta-button-glow {
  background: linear-gradient(135deg, #ff0055 0%, #ff5000 100%);
  color: #ffffff;
  font-weight: 700;
  padding: 14px 32px;
  border-radius: 50px;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  box-shadow: 0 10px 25px rgba(255, 0, 85, 0.3);
  transition: all 0.3s ease;
}

.cta-button-glow:hover {
  color: #ffffff;
  transform: scale(1.05);
  box-shadow: 0 15px 35px rgba(255, 0, 85, 0.5);
}
      </style>

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
              <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Avatar" class="author-avatar">
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
              <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80" alt="Avatar" class="author-avatar">
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
              <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?w=100&auto=format&fit=crop&q=80" alt="Avatar" class="author-avatar">
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
    <div class="text-center" data-aos="fade-up" data-aos-delay="300">
      <a href="#plans" class="cta-button-glow">
        Começar agora
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
      </a>
    </div>

  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".testimonialSwiper", {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });
});
</script>


    <section id="plans" class="plans">
      <div class="af_innner">
        <div class="blure_shape bg-secondary-color bs_1"> </div>
        <div class="blure_shape bg-secondary-color bs_2"> </div>
        <div class="container">
          <div class="section_title">
            <span class="title_badge">Planos</span>
            <h2 class="text-white trhee-step">Comece. Organize. <br><span>Automatize.</span></h2>
            <p class="text-white">Um plano pra cada momento do seu negócio. Cancele quando quiser.</p>
          </div>

          <div class="row mt-5">
            <div class="box-plan col-lg-4 col-md-6 col-12 pt-4 pb-5 essencial mb-3 mb-lg-0">
              <div class="d-flex flex-column justify-content-center align-items-start">
                <h5>Basic</h5>
                <p class="plan-text-color mb-2">Pra começar a organizar</p>
    
                <div class="price">
                  <h6 class="d-flex justify-content-center align-items-center">R$ 39,90 <span class="plan-text-color">/mês</span></h6>
                </div>
              </div>
              <ul class="list mt-3">
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Cardápio Digital Completo
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Recebimento de pedidos via WhatsApp
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Cadastro de produtos e categorias
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Painel Administrativo
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Controle de Estoque
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Customização básica (logo e 1 cor principal)
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Configuração de horário de funcionamento
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Acesso administrativo (1 conta)
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Link Exclusivo
                </li>
              </ul>
              <div class="payment-forms d-none flex-column justify-content-center align-items-center py-3 mt-4">
                <p class="text-white">Formas de pagamentos:</p>
                <div class="payment d-flex flex-column justify-content-center align-items-center">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.54579 1.63778L1.63791 9.54574C-0.545942 11.7296 -0.545942 15.2702 1.63774 17.4541L9.54605 25.3621C11.7297 27.546 15.2704 27.546 17.4539 25.3621L25.3622 17.4541C27.5459 15.2703 27.5459 11.7297 25.3622 9.54617L17.4539 1.63778C15.2702 -0.545926 11.7296 -0.545926 9.54605 1.63778H9.54579ZM15.4768 3.61496L23.3851 11.5229C24.4769 12.6149 24.4769 14.3852 23.3851 15.4771L15.4768 23.3851C14.3849 24.477 12.6149 24.477 11.523 23.3851L3.61507 15.4771C2.52315 14.3852 2.52315 12.6148 3.61507 11.5229L11.523 3.61496C12.6149 2.5232 14.3849 2.5232 15.4768 3.61513V3.61496Z" fill="#4BB0A7"/>
                    <path d="M0.000488281 13.4998C0.000488281 18.0334 6.48484 22.2314 10.1277 18.6217L10.9141 17.811C12.1064 16.5804 12.6978 16.196 13.4969 16.198C14.2024 16.1996 14.7572 16.5057 15.7016 17.4249L16.727 18.47C20.2943 22.3734 27.0002 18.1099 27.0002 13.4998C27.0002 8.96664 20.5159 4.7686 16.873 8.37786L16.0276 9.2466L15.6124 9.65567C14.7019 10.5237 14.174 10.8016 13.5003 10.8016C12.7744 10.8016 12.1659 10.4387 11.1287 9.4058L10.2748 8.53077C6.70608 4.62638 0.000488281 8.88943 0.000488281 13.4998ZM24.1581 13.4998C24.1581 15.8909 20.5799 18.2287 18.9633 16.7881L18.6116 16.4318L18.2231 16.0302C16.4974 14.2499 15.3599 13.504 13.5037 13.4998C11.7558 13.4956 10.6496 14.1511 9.09948 15.7024L8.19723 16.6279C6.61691 18.3552 2.84249 15.9555 2.84249 13.4997C2.84249 11.1086 6.42067 8.77083 8.03729 10.2116L8.8105 11.0033C10.4985 12.7359 11.6773 13.4997 13.5002 13.4997C15.2999 13.4997 16.3728 12.8351 18.0609 11.1322L18.8362 10.3367C20.3834 8.64447 24.1581 11.044 24.1581 13.4998Z" fill="#4BB0A7"/>
                    </svg>
                    <span class="text-white">Pix</span>
                </div>
              </div>

              <div class="renovation p-2 d-none justify-content-center align-items-center mt-4">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.3124 3.9375C10.3437 3.03125 9.0624 2.5 7.71865 2.5C5.3124 2.53125 3.21865 4.1875 2.65615 6.46875C2.59365 6.65625 2.4374 6.75 2.28115 6.75H0.499903C0.249903 6.75 0.0624027 6.5625 0.124903 6.3125C0.781153 2.71875 3.9374 0 7.7499 0C9.8124 0 11.6874 0.84375 13.0937 2.15625L14.2187 1.03125C14.6874 0.5625 15.4999 0.90625 15.4999 1.5625V5.75C15.4999 6.1875 15.1562 6.5 14.7499 6.5H10.5312C9.8749 6.5 9.53115 5.71875 9.9999 5.25L11.3124 3.9375ZM0.749903 9H4.9374C5.59365 9 5.9374 9.8125 5.46865 10.2812L4.15615 11.5938C5.1249 12.5 6.40615 13.0312 7.7499 13.0312C10.1562 13 12.2499 11.3438 12.8124 9.0625C12.8749 8.875 13.0312 8.78125 13.1874 8.78125H14.9687C15.2187 8.78125 15.4062 8.96875 15.3437 9.21875C14.6874 12.8125 11.5312 15.5 7.7499 15.5C5.65615 15.5 3.78115 14.6875 2.3749 13.375L1.2499 14.5C0.781153 14.9688 -9.72748e-05 14.625 -9.72748e-05 13.9688V9.75C-9.72748e-05 9.34375 0.312403 9 0.749903 9Z" fill="#4CAF50"/>
                </svg>
                <p class="text-white m-0">Renovação automática - cancele quando quiser</p>
              </div>

              <!-- button  -->
              <div class="ctr_cta mt-5">
                <div class="btn_block w-100">
                <a href="https://wa.me/5571992768360" 
                target=_blank rel="noopener noreferrer" 
                data-plan="essencial"
                class="bg-button-two color-button-two px-3 py-2 rounded-3 whatsapp-plan-btn w-100 text-uppercase">
                  <span>
                    Começar com Basic
                  </span>
                  
                </a>
                </div>
              </div>
            </div>

            <div class="box-plan col-lg-4 col-md-6 col-12 pt-4 pb-5 premium mb-3 mb-lg-0">
              <div class="tag d-none justify-content-center align-items-center px-5 py-1">
                <p class="text-dark m-0">Popular</p>
              </div>
              <div class="d-flex flex-column justify-content-center align-items-start">
                <h5 class="text-dark">Pro</h5>
                <p class="text-dark mb-2 d-none">O mais escolhido pelos lojistas</p>
                <div class="price">
                  <h6 class="d-flex justify-content-center align-items-center text-dark">Em breve <span></span></h6>
                  <p class="text-dark mb-2">Seja avisado quando lançar</p>
                </div>
              </div>
              <ul class="list mt-3">
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Tudo do plano Basic
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Histórico de pedidos
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Controle financeiro
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Status de pedido
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Customização avançada (logo e 2 cores)
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  QR Code do cardápio
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Cupons de desconto
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Controle de acesso versátil (múltiplos admins)
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Níveis de permissão
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Controle de acesso por função
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Relatório básico (pedidos realizados)
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Status de pedido (recebido, preparando, pronto)
                </li>
                <li class="text-dark">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Suporte prioritário
                </li>
              </ul>
              <div class="payment-forms d-none flex-column justify-content-center align-items-center py-3 mt-4">
                <p class="text-dark">Formas de pagamentos:</p>
                <div class="payment">
                  <div class="gap d-flex justify-content-between align-items-center">
                    <div class="pix d-flex flex-column justify-content-center align-items-center">
                      <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.54579 1.63778L1.63791 9.54574C-0.545942 11.7296 -0.545942 15.2702 1.63774 17.4541L9.54605 25.3621C11.7297 27.546 15.2704 27.546 17.4539 25.3621L25.3622 17.4541C27.5459 15.2703 27.5459 11.7297 25.3622 9.54617L17.4539 1.63778C15.2702 -0.545926 11.7296 -0.545926 9.54605 1.63778H9.54579ZM15.4768 3.61496L23.3851 11.5229C24.4769 12.6149 24.4769 14.3852 23.3851 15.4771L15.4768 23.3851C14.3849 24.477 12.6149 24.477 11.523 23.3851L3.61507 15.4771C2.52315 14.3852 2.52315 12.6148 3.61507 11.5229L11.523 3.61496C12.6149 2.5232 14.3849 2.5232 15.4768 3.61513V3.61496Z" fill="#4BB0A7"/>
                      <path d="M0.000488281 13.4998C0.000488281 18.0334 6.48484 22.2314 10.1277 18.6217L10.9141 17.811C12.1064 16.5804 12.6978 16.196 13.4969 16.198C14.2024 16.1996 14.7572 16.5057 15.7016 17.4249L16.727 18.47C20.2943 22.3734 27.0002 18.1099 27.0002 13.4998C27.0002 8.96664 20.5159 4.7686 16.873 8.37786L16.0276 9.2466L15.6124 9.65567C14.7019 10.5237 14.174 10.8016 13.5003 10.8016C12.7744 10.8016 12.1659 10.4387 11.1287 9.4058L10.2748 8.53077C6.70608 4.62638 0.000488281 8.88943 0.000488281 13.4998ZM24.1581 13.4998C24.1581 15.8909 20.5799 18.2287 18.9633 16.7881L18.6116 16.4318L18.2231 16.0302C16.4974 14.2499 15.3599 13.504 13.5037 13.4998C11.7558 13.4956 10.6496 14.1511 9.09948 15.7024L8.19723 16.6279C6.61691 18.3552 2.84249 15.9555 2.84249 13.4997C2.84249 11.1086 6.42067 8.77083 8.03729 10.2116L8.8105 11.0033C10.4985 12.7359 11.6773 13.4997 13.5002 13.4997C15.2999 13.4997 16.3728 12.8351 18.0609 11.1322L18.8362 10.3367C20.3834 8.64447 24.1581 11.044 24.1581 13.4998Z" fill="#4BB0A7"/>
                      </svg>
                      <span class="text-dark mt-1">Pix</span>
                    </div>
                    
                    <div class="cartao d-flex flex-column justify-content-between align-items-center">
                      <svg width="27" height="21" viewBox="0 0 27 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.82285e-05 18.75V10.5H27.0001V18.75C27.0001 20.0156 25.9688 21 24.7501 21H2.2501C0.984473 21 9.82285e-05 20.0156 9.82285e-05 18.75ZM9.0001 15.5625V17.4375C9.0001 17.7656 9.23447 18 9.5626 18H15.9376C16.2188 18 16.5001 17.7656 16.5001 17.4375V15.5625C16.5001 15.2812 16.2188 15 15.9376 15H9.5626C9.23447 15 9.0001 15.2812 9.0001 15.5625ZM3.0001 15.5625V17.4375C3.0001 17.7656 3.23447 18 3.5626 18H6.9376C7.21885 18 7.5001 17.7656 7.5001 17.4375V15.5625C7.5001 15.2812 7.21885 15 6.9376 15H3.5626C3.23447 15 3.0001 15.2812 3.0001 15.5625ZM27.0001 2.25V4.5H9.82285e-05V2.25C9.82285e-05 1.03125 0.984473 0 2.2501 0H24.7501C25.9688 0 27.0001 1.03125 27.0001 2.25Z" fill="#FF6B35"/>
                      </svg>

                      <span class="text-dark mt-1">Cartão</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="renovation p-2 d-none justify-content-center align-items-center mt-4">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.3124 3.9375C10.3437 3.03125 9.0624 2.5 7.71865 2.5C5.3124 2.53125 3.21865 4.1875 2.65615 6.46875C2.59365 6.65625 2.4374 6.75 2.28115 6.75H0.499903C0.249903 6.75 0.0624027 6.5625 0.124903 6.3125C0.781153 2.71875 3.9374 0 7.7499 0C9.8124 0 11.6874 0.84375 13.0937 2.15625L14.2187 1.03125C14.6874 0.5625 15.4999 0.90625 15.4999 1.5625V5.75C15.4999 6.1875 15.1562 6.5 14.7499 6.5H10.5312C9.8749 6.5 9.53115 5.71875 9.9999 5.25L11.3124 3.9375ZM0.749903 9H4.9374C5.59365 9 5.9374 9.8125 5.46865 10.2812L4.15615 11.5938C5.1249 12.5 6.40615 13.0312 7.7499 13.0312C10.1562 13 12.2499 11.3438 12.8124 9.0625C12.8749 8.875 13.0312 8.78125 13.1874 8.78125H14.9687C15.2187 8.78125 15.4062 8.96875 15.3437 9.21875C14.6874 12.8125 11.5312 15.5 7.7499 15.5C5.65615 15.5 3.78115 14.6875 2.3749 13.375L1.2499 14.5C0.781153 14.9688 -9.72748e-05 14.625 -9.72748e-05 13.9688V9.75C-9.72748e-05 9.34375 0.312403 9 0.749903 9Z" fill="#4CAF50"/>
                </svg>
                <p class="text-dark m-0">Renovação automática - cancele quando quiser</p>
              </div>

              <!-- button  -->
              <div class="ctr_cta mt-5">
                <div class="btn_block w-100">
                <a href="https://wa.me/5571992768360" 
                target=_blank rel="noopener noreferrer" 
                data-plan="premium"
                class="bg-button-two color-button-two px-3 py-2 rounded-3 whatsapp-plan-btn disabled w-100" style="opacity:0.5; cursor:not-allowed; pointer-events:none;">
                  <span>
                    EM BREVE
                  </span>
                </a>
                </div>
              </div>
            </div>

            <div class="box-plan col-lg-4 col-md-6 col-12 pt-4 pb-5 elite mb-3 mb-lg-0">
              <div class="d-flex flex-column justify-content-center align-items-start">
                <h5>Premium</h5>
                <p class="plan-text-color mb-2 d-none">Pra escalar e automatizar</p>
    
                <div class="price">
                  <h6 class="d-flex justify-content-center align-items-center text-white">Em breve <span></span></h6>
                  <p class="text-white mb-2">Seja avisado quando lançar</p>
                </div>
              </div>
              <ul class="list mt-3">
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Tudo do plano PRO
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Integração API WhatsApp
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Pagamento direto na plataforma
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Histórico de clientes
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Relatórios com gráficos
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Visão de desempenho (gráficos)
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Customização completa (identidade visual)
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Auditoria completa (histórico de ações)
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Mensagens automáticas básicas
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Notificações e atendimento (WhatsApp + e-mail)
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Suporte 24/7
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Impressão automática (bluetooth/USB)
                </li>
                <li class="text-white">
                  <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                  </svg>
                  Acesso antecipado a novas features
                </li>
              </ul>
              <div class="payment-forms d-none flex-column justify-content-center align-items-center py-3 mt-4">
                <p class="text-white">Formas de pagamentos:</p>
                <div class="payment">
                  <div class="gap d-flex justify-content-between align-items-center">
                    <div class="pix d-flex flex-column justify-content-center align-items-center">
                      <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.54579 1.63778L1.63791 9.54574C-0.545942 11.7296 -0.545942 15.2702 1.63774 17.4541L9.54605 25.3621C11.7297 27.546 15.2704 27.546 17.4539 25.3621L25.3622 17.4541C27.5459 15.2703 27.5459 11.7297 25.3622 9.54617L17.4539 1.63778C15.2702 -0.545926 11.7296 -0.545926 9.54605 1.63778H9.54579ZM15.4768 3.61496L23.3851 11.5229C24.4769 12.6149 24.4769 14.3852 23.3851 15.4771L15.4768 23.3851C14.3849 24.477 12.6149 24.477 11.523 23.3851L3.61507 15.4771C2.52315 14.3852 2.52315 12.6148 3.61507 11.5229L11.523 3.61496C12.6149 2.5232 14.3849 2.5232 15.4768 3.61513V3.61496Z" fill="#4BB0A7"/>
                      <path d="M0.000488281 13.4998C0.000488281 18.0334 6.48484 22.2314 10.1277 18.6217L10.9141 17.811C12.1064 16.5804 12.6978 16.196 13.4969 16.198C14.2024 16.1996 14.7572 16.5057 15.7016 17.4249L16.727 18.47C20.2943 22.3734 27.0002 18.1099 27.0002 13.4998C27.0002 8.96664 20.5159 4.7686 16.873 8.37786L16.0276 9.2466L15.6124 9.65567C14.7019 10.5237 14.174 10.8016 13.5003 10.8016C12.7744 10.8016 12.1659 10.4387 11.1287 9.4058L10.2748 8.53077C6.70608 4.62638 0.000488281 8.88943 0.000488281 13.4998ZM24.1581 13.4998C24.1581 15.8909 20.5799 18.2287 18.9633 16.7881L18.6116 16.4318L18.2231 16.0302C16.4974 14.2499 15.3599 13.504 13.5037 13.4998C11.7558 13.4956 10.6496 14.1511 9.09948 15.7024L8.19723 16.6279C6.61691 18.3552 2.84249 15.9555 2.84249 13.4997C2.84249 11.1086 6.42067 8.77083 8.03729 10.2116L8.8105 11.0033C10.4985 12.7359 11.6773 13.4997 13.5002 13.4997C15.2999 13.4997 16.3728 12.8351 18.0609 11.1322L18.8362 10.3367C20.3834 8.64447 24.1581 11.044 24.1581 13.4998Z" fill="#4BB0A7"/>
                      </svg>
                      <span class="text-white mt-1">Pix</span>
                    </div>
                    
                    <div class="cartao d-flex flex-column justify-content-between align-items-center">
                      <svg width="27" height="21" viewBox="0 0 27 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.82285e-05 18.75V10.5H27.0001V18.75C27.0001 20.0156 25.9688 21 24.7501 21H2.2501C0.984473 21 9.82285e-05 20.0156 9.82285e-05 18.75ZM9.0001 15.5625V17.4375C9.0001 17.7656 9.23447 18 9.5626 18H15.9376C16.2188 18 16.5001 17.7656 16.5001 17.4375V15.5625C16.5001 15.2812 16.2188 15 15.9376 15H9.5626C9.23447 15 9.0001 15.2812 9.0001 15.5625ZM3.0001 15.5625V17.4375C3.0001 17.7656 3.23447 18 3.5626 18H6.9376C7.21885 18 7.5001 17.7656 7.5001 17.4375V15.5625C7.5001 15.2812 7.21885 15 6.9376 15H3.5626C3.23447 15 3.0001 15.2812 3.0001 15.5625ZM27.0001 2.25V4.5H9.82285e-05V2.25C9.82285e-05 1.03125 0.984473 0 2.2501 0H24.7501C25.9688 0 27.0001 1.03125 27.0001 2.25Z" fill="#FF6B35"/>
                      </svg>

                      <span class="text-white mt-1">Cartão</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="renovation p-2 d-none justify-content-center align-items-center mt-4">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.3124 3.9375C10.3437 3.03125 9.0624 2.5 7.71865 2.5C5.3124 2.53125 3.21865 4.1875 2.65615 6.46875C2.59365 6.65625 2.4374 6.75 2.28115 6.75H0.499903C0.249903 6.75 0.0624027 6.5625 0.124903 6.3125C0.781153 2.71875 3.9374 0 7.7499 0C9.8124 0 11.6874 0.84375 13.0937 2.15625L14.2187 1.03125C14.6874 0.5625 15.4999 0.90625 15.4999 1.5625V5.75C15.4999 6.1875 15.1562 6.5 14.7499 6.5H10.5312C9.8749 6.5 9.53115 5.71875 9.9999 5.25L11.3124 3.9375ZM0.749903 9H4.9374C5.59365 9 5.9374 9.8125 5.46865 10.2812L4.15615 11.5938C5.1249 12.5 6.40615 13.0312 7.7499 13.0312C10.1562 13 12.2499 11.3438 12.8124 9.0625C12.8749 8.875 13.0312 8.78125 13.1874 8.78125H14.9687C15.2187 8.78125 15.4062 8.96875 15.3437 9.21875C14.6874 12.8125 11.5312 15.5 7.7499 15.5C5.65615 15.5 3.78115 14.6875 2.3749 13.375L1.2499 14.5C0.781153 14.9688 -9.72748e-05 14.625 -9.72748e-05 13.9688V9.75C-9.72748e-05 9.34375 0.312403 9 0.749903 9Z" fill="#4CAF50"/>
                </svg>
                <p class="text-white m-0">Renovação automática - cancele quando quiser</p>
              </div>

              <!-- button  -->
              <div class="ctr_cta mt-5">
                <div class="btn_block w-100">
                <a href="https://wa.me/5571992768360" 
                target=_blank rel="noopener noreferrer" 
                data-plan="premium"
                class="bg-button-two color-button-two px-3 py-2 rounded-3 whatsapp-plan-btn disabled w-100" style="opacity:0.5; cursor:not-allowed; pointer-events:none;">
                  <span>
                    EM BREVE
                  </span>
                </a>
                </div>
              </div>
            </div>
          </div>

          <div id="services" class="services mt-5 px-3 py-5 position-relative">
            <div class="section_title">
              <span class="title_badge">Serviços avulsos</span>
              <h2 class="text-white">Potencialize seu negócio</h2>
              <p class="plan-text-color p-0">Ideal para quem quer resultado rápido sem assinatura</p>
            </div>

            <div class="row mt-5 px-3">
              <div class="item col-lg-4 col-md-6 col-12 mb-2 p-0">                
                <div class="box-service p-3">
                  <div class="tag d-flex justify-content-center m-auto m-lg-0 align-items-center">
                    <p class="text-dark mb-0 text-uppercase">Mais vendido</p>
                  </div>
                  <div class="d-flex flex-wrap flex-row justify-content-center justify-content-lg-between align-items-baseline mt-3">                  
                    <h5 class="text-white m-0 col-12 col-lg-8 p-0">Cadastro de Produtos</h5>
                    <div class="price col-12 col-lg-4 p-0">
                      <h6 class="d-flex justify-content-center align-items-center flex-column m-0">R$ 79,90 <span class="plan-text-color">por pacote</span></h6>
                    </div>
                  </div>
                  <ul class="list mt-3">
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Cadastro de 20 produtos com fotos e descrições
                    </li>
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Organização em categorias básicas
                    </li>
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Entrega em 48 horas úteis
                    </li>
                  </ul>
  
                  <!-- button  -->
                  <div class="ctr_cta mt-4 d-flex justify-content-between">
                    <div class="btn_block">
                      <a href="https://wa.me/5571992768360" class="bg-button-two color-button-two px-3 py-2 rounded-3 whatsapp-btn">
                        <span>
                          SABER MAIS
                        </span>
                      </a>
                    </div>
                    <div class="payment d-flex flex-column justify-content-center align-items-center">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.54579 1.63778L1.63791 9.54574C-0.545942 11.7296 -0.545942 15.2702 1.63774 17.4541L9.54605 25.3621C11.7297 27.546 15.2704 27.546 17.4539 25.3621L25.3622 17.4541C27.5459 15.2703 27.5459 11.7297 25.3622 9.54617L17.4539 1.63778C15.2702 -0.545926 11.7296 -0.545926 9.54605 1.63778H9.54579ZM15.4768 3.61496L23.3851 11.5229C24.4769 12.6149 24.4769 14.3852 23.3851 15.4771L15.4768 23.3851C14.3849 24.477 12.6149 24.477 11.523 23.3851L3.61507 15.4771C2.52315 14.3852 2.52315 12.6148 3.61507 11.5229L11.523 3.61496C12.6149 2.5232 14.3849 2.5232 15.4768 3.61513V3.61496Z" fill="#FFF"/>
                        <path d="M0.000488281 13.4998C0.000488281 18.0334 6.48484 22.2314 10.1277 18.6217L10.9141 17.811C12.1064 16.5804 12.6978 16.196 13.4969 16.198C14.2024 16.1996 14.7572 16.5057 15.7016 17.4249L16.727 18.47C20.2943 22.3734 27.0002 18.1099 27.0002 13.4998C27.0002 8.96664 20.5159 4.7686 16.873 8.37786L16.0276 9.2466L15.6124 9.65567C14.7019 10.5237 14.174 10.8016 13.5003 10.8016C12.7744 10.8016 12.1659 10.4387 11.1287 9.4058L10.2748 8.53077C6.70608 4.62638 0.000488281 8.88943 0.000488281 13.4998ZM24.1581 13.4998C24.1581 15.8909 20.5799 18.2287 18.9633 16.7881L18.6116 16.4318L18.2231 16.0302C16.4974 14.2499 15.3599 13.504 13.5037 13.4998C11.7558 13.4956 10.6496 14.1511 9.09948 15.7024L8.19723 16.6279C6.61691 18.3552 2.84249 15.9555 2.84249 13.4997C2.84249 11.1086 6.42067 8.77083 8.03729 10.2116L8.8105 11.0033C10.4985 12.7359 11.6773 13.4997 13.5002 13.4997C15.2999 13.4997 16.3728 12.8351 18.0609 11.1322L18.8362 10.3367C20.3834 8.64447 24.1581 11.044 24.1581 13.4998Z" fill="#FFF"/>
                        </svg>
                        <span class="text-white mt-1">Pix</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item col-lg-4 col-md-6 col-12 mb-2 p-0">                
                <div class="box-service p-3">
                  <div class="d-flex flex-wrap flex-row justify-content-center justify-content-lg-between align-items-baseline mt-3">                  
                    <h5 class="text-white m-0 col-12 col-lg-8 p-0">Personalização do cardápio</h5>
                    <div class="price col-12 col-lg-4 p-0">
                      <h6 class="d-flex justify-content-center align-items-center flex-column m-0">R$ 89,90 <span class="plan-text-color">Única vez</span></h6>
                    </div>
                  </div>
                  <ul class="list mt-3">
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Definição de cores principais (2 cores)
                    </li>
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Ajuste de layout básico
                    </li>
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Preview antes de aprovar
                    </li>
                  </ul>
  
                  <!-- button  -->
                  <div class="ctr_cta mt-4 d-flex justify-content-between">
                    <div class="btn_block">
                      <a href="https://wa.me/5571992768360" class="bg-button-two color-button-two px-3 py-2 rounded-3 whatsapp-btn">
                        <span>
                          SABER MAIS
                        </span>
                      </a>
                    </div>
                    <div class="payment d-flex flex-column justify-content-center align-items-center">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.54579 1.63778L1.63791 9.54574C-0.545942 11.7296 -0.545942 15.2702 1.63774 17.4541L9.54605 25.3621C11.7297 27.546 15.2704 27.546 17.4539 25.3621L25.3622 17.4541C27.5459 15.2703 27.5459 11.7297 25.3622 9.54617L17.4539 1.63778C15.2702 -0.545926 11.7296 -0.545926 9.54605 1.63778H9.54579ZM15.4768 3.61496L23.3851 11.5229C24.4769 12.6149 24.4769 14.3852 23.3851 15.4771L15.4768 23.3851C14.3849 24.477 12.6149 24.477 11.523 23.3851L3.61507 15.4771C2.52315 14.3852 2.52315 12.6148 3.61507 11.5229L11.523 3.61496C12.6149 2.5232 14.3849 2.5232 15.4768 3.61513V3.61496Z" fill="#FFF"/>
                        <path d="M0.000488281 13.4998C0.000488281 18.0334 6.48484 22.2314 10.1277 18.6217L10.9141 17.811C12.1064 16.5804 12.6978 16.196 13.4969 16.198C14.2024 16.1996 14.7572 16.5057 15.7016 17.4249L16.727 18.47C20.2943 22.3734 27.0002 18.1099 27.0002 13.4998C27.0002 8.96664 20.5159 4.7686 16.873 8.37786L16.0276 9.2466L15.6124 9.65567C14.7019 10.5237 14.174 10.8016 13.5003 10.8016C12.7744 10.8016 12.1659 10.4387 11.1287 9.4058L10.2748 8.53077C6.70608 4.62638 0.000488281 8.88943 0.000488281 13.4998ZM24.1581 13.4998C24.1581 15.8909 20.5799 18.2287 18.9633 16.7881L18.6116 16.4318L18.2231 16.0302C16.4974 14.2499 15.3599 13.504 13.5037 13.4998C11.7558 13.4956 10.6496 14.1511 9.09948 15.7024L8.19723 16.6279C6.61691 18.3552 2.84249 15.9555 2.84249 13.4997C2.84249 11.1086 6.42067 8.77083 8.03729 10.2116L8.8105 11.0033C10.4985 12.7359 11.6773 13.4997 13.5002 13.4997C15.2999 13.4997 16.3728 12.8351 18.0609 11.1322L18.8362 10.3367C20.3834 8.64447 24.1581 11.044 24.1581 13.4998Z" fill="#FFF"/>
                        </svg>
                        <span class="text-white mt-1">Pix</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="item col-lg-4 col-md-6 col-12 mb-2 p-0">
                <div class="box-service p-3">
                  <div class="d-flex flex-wrap flex-row justify-content-center justify-content-lg-between  align-items-baseline mt-3">                  
                    <h5 class="text-white m-0 col-12 col-lg-8 p-0">Treinamento Express</h5>
                    <div class="price col-12 col-lg-4 p-0">
                      <h6 class="d-flex justify-content-center align-items-center flex-column m-0">R$ 109,90 <span class="plan-text-color">Por Sessão</span></h6>
                    </div>
                  </div>
                  <ul class="list mt-3">
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Sessão de 30 min por video conferência
                    </li>
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Foco no essencial (cadastrar, gerenciar pedidos)
                    </li>
                    <li class="text-white">
                      <svg width="17" height="13" viewBox="0 0 17 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 11.7812L0.3125 6.59375C0 6.28125 0 5.75 0.3125 5.4375L1.4375 4.3125C1.75 4 2.25 4 2.5625 4.3125L6.09375 7.8125L13.5938 0.3125C13.9062 0 14.4062 0 14.7188 0.3125L15.8438 1.4375C16.1562 1.75 16.1562 2.28125 15.8438 2.59375L6.65625 11.7812C6.34375 12.0938 5.8125 12.0938 5.5 11.7812Z" fill="#D4AF37"/>
                      </svg>
                      Gravado para você reassistir
                    </li>
                  </ul>
  
                  <!-- button  -->
                  <div class="ctr_cta mt-4 d-flex justify-content-between">
                    <div class="btn_block">
                      <a href="https://wa.me/5571992768360" class="bg-button-two color-button-two px-3 py-2 rounded-3 whatsapp-btn">
                        <span>
                          SABER MAIS
                        </span>
                      </a>
                    </div>
                    <div class="payment d-flex flex-column justify-content-center align-items-center">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.54579 1.63778L1.63791 9.54574C-0.545942 11.7296 -0.545942 15.2702 1.63774 17.4541L9.54605 25.3621C11.7297 27.546 15.2704 27.546 17.4539 25.3621L25.3622 17.4541C27.5459 15.2703 27.5459 11.7297 25.3622 9.54617L17.4539 1.63778C15.2702 -0.545926 11.7296 -0.545926 9.54605 1.63778H9.54579ZM15.4768 3.61496L23.3851 11.5229C24.4769 12.6149 24.4769 14.3852 23.3851 15.4771L15.4768 23.3851C14.3849 24.477 12.6149 24.477 11.523 23.3851L3.61507 15.4771C2.52315 14.3852 2.52315 12.6148 3.61507 11.5229L11.523 3.61496C12.6149 2.5232 14.3849 2.5232 15.4768 3.61513V3.61496Z" fill="#FFF"/>
                        <path d="M0.000488281 13.4998C0.000488281 18.0334 6.48484 22.2314 10.1277 18.6217L10.9141 17.811C12.1064 16.5804 12.6978 16.196 13.4969 16.198C14.2024 16.1996 14.7572 16.5057 15.7016 17.4249L16.727 18.47C20.2943 22.3734 27.0002 18.1099 27.0002 13.4998C27.0002 8.96664 20.5159 4.7686 16.873 8.37786L16.0276 9.2466L15.6124 9.65567C14.7019 10.5237 14.174 10.8016 13.5003 10.8016C12.7744 10.8016 12.1659 10.4387 11.1287 9.4058L10.2748 8.53077C6.70608 4.62638 0.000488281 8.88943 0.000488281 13.4998ZM24.1581 13.4998C24.1581 15.8909 20.5799 18.2287 18.9633 16.7881L18.6116 16.4318L18.2231 16.0302C16.4974 14.2499 15.3599 13.504 13.5037 13.4998C11.7558 13.4956 10.6496 14.1511 9.09948 15.7024L8.19723 16.6279C6.61691 18.3552 2.84249 15.9555 2.84249 13.4997C2.84249 11.1086 6.42067 8.77083 8.03729 10.2116L8.8105 11.0033C10.4985 12.7359 11.6773 13.4997 13.5002 13.4997C15.2999 13.4997 16.3728 12.8351 18.0609 11.1322L18.8362 10.3367C20.3834 8.64447 24.1581 11.044 24.1581 13.4998Z" fill="#FFF"/>
                        </svg>
                        <span class="text-white mt-1">Pix</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Page Wraper -->
    <div class="page_wrapper">
      <section id="faq">
        <div class="container my-5">
          <div class="faq">
            <div class="section_title mb-5">
              <span class="title_badge">FAQ</span>
              <h2 class="text-dark">Dúvidas Frequentes</h2>
              <p class="text-dark p-0">Os principais questionamentos são respondidos aqui!</p>
            </div>

            <!-- Item 1 -->
            <div class="card faq-item mb-3">
              <div class="card-header" id="headingOne">
                <button class="btn btn-link faq-btn d-flex justify-content-between align-items-center w-100 d-flex justify-content-between align-items-center" data-toggle="collapse"
                  data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Quanto tempo leva para configurar meu sistema?
                  <span class="icon">
                    <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.0001 9L9.70236 8.40331L18 1.4022L16.5955 0L9 6.40443L1.40455 0L0 1.4022L8.29764 8.40331L9.0001 9Z" fill="black"/>
                    </svg>
                  </span>
                </button>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faq">
                <div class="card-body">
                  Em média 2-3 dias úteis. Nós fazemos a configuração inicial para você começar a vender rápido.
                </div>
              </div>
            </div>

            <!-- Item 2 (ativo) -->
            <div class="card faq-item mb-3">
              <div class="card-header" id="headingTwo">
                <button class="btn btn-link faq-btn collapsed d-flex justify-content-between align-items-center w-100 d-flex justify-content-between align-items-center" data-toggle="collapse"
                  data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Preciso de conhecimento técnico?
                  <span class="icon">
                    <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.0001 9L9.70236 8.40331L18 1.4022L16.5955 0L9 6.40443L1.40455 0L0 1.4022L8.29764 8.40331L9.0001 9Z" fill="black"/>
                    </svg>
                  </span>
                </button>
              </div>

              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faq">
                <div class="card-body">
                  Não! Desenvolvemos pensando em donos de restaurante. Se você sabe usar WhatsApp, sabe usar o DeliFast.
                </div>
              </div>
            </div>

            <!-- Item 3 -->
            <div class="card faq-item mb-3">
              <div class="card-header" id="headingThree">
                <button class="btn btn-link faq-btn collapsed d-flex justify-content-between align-items-center w-100 d-flex justify-content-between align-items-center" data-toggle="collapse"
                  data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Como recebo os pedidos dos clientes?
                  <span class="icon">
                    <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.0001 9L9.70236 8.40331L18 1.4022L16.5955 0L9 6.40443L1.40455 0L0 1.4022L8.29764 8.40331L9.0001 9Z" fill="black"/>
                    </svg>
                  </span>
                </button>
              </div>

              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faq">
                <div class="card-body">
                  Direto no WhatsApp do seu restaurante. Cada pedido chega organizado com todas as informações que você precisa.
                </div>
              </div>
            </div>

            <!-- Item 4 -->
            <div class="card faq-item mb-3">
              <div class="card-header" id="headingFour">
                <button class="btn btn-link faq-btn collapsed d-flex justify-content-between align-items-center w-100 d-flex justify-content-between align-items-center" data-toggle="collapse"
                  data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  Posso cancelar quando quiser?
                  <span class="icon">
                    <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.0001 9L9.70236 8.40331L18 1.4022L16.5955 0L9 6.40443L1.40455 0L0 1.4022L8.29764 8.40331L9.0001 9Z" fill="black"/>
                    </svg>
                  </span>
                </button>
              </div>

              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faq">
                <div class="card-body">
                  Sim, sem multa e sem burocracia. Cancele a qualquer momento pelo próprio sistema.
                </div>
              </div>
            </div>

            <!-- Item 5 -->
            <div class="card faq-item mb-3">
              <div class="card-header" id="headingFive">
                <button class="btn btn-link faq-btn collapsed d-flex justify-content-between align-items-center w-100 d-flex justify-content-between align-items-center" data-toggle="collapse"
                  data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  O que acontece se eu não pagar a mensalidade?
                  <span class="icon">
                    <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.0001 9L9.70236 8.40331L18 1.4022L16.5955 0L9 6.40443L1.40455 0L0 1.4022L8.29764 8.40331L9.0001 9Z" fill="black"/>
                    </svg>
                  </span>
                </button>
              </div>

              <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faq">
                <div class="card-body">
                  Seu cardápio fica pausado, mas todos seus dados ficam guardados por 60 dias. Ao pagar, tudo volta ao normal.
                </div>
              </div>
            </div>

            <!-- Item 6 -->
            <div class="card faq-item">
              <div class="card-header" id="headingSix">
                <button class="btn btn-link faq-btn collapsed d-flex justify-content-between align-items-center w-100 d-flex justify-content-between align-items-center" data-toggle="collapse"
                  data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  Vocês oferecem suporte? Como funciona?
                  <span class="icon">
                    <svg width="18" height="9" viewBox="0 0 18 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.0001 9L9.70236 8.40331L18 1.4022L16.5955 0L9 6.40443L1.40455 0L0 1.4022L8.29764 8.40331L9.0001 9Z" fill="black"/>
                    </svg>
                  </span>
                </button>
              </div>

              <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faq">
                <div class="card-body">
                  Sim! Nosso suporte é feito via WhatsApp e está sempre pronto para ajudar.
                </div>
              </div>
            </div>

            <div class="row mt-5">
              <div class="btn_block m-auto">
                  <a href="#plans" 
                  class="bg-button-two color-button-two px-3 py-2 rounded-3 keep-message">
                  <span>
                    Começar agora
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                  </span>
                  </a>
              </div>
            </div>
          </div>
        </div>
      </section>  
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const section = document.querySelector('.video-section');
        if (!section) return;

        const items = Array.from(section.querySelectorAll('.video-item'));
        const player = section.querySelector('#videoPlayer');

        // Normalização de URL
        function norm(url) {
          if (!url) return "";
          return url.startsWith("//") ? window.location.protocol + url : url;
        }

        // Extrai ID do YouTube
        function getYouTubeId(urlStr) {
          try {
            const u = new URL(urlStr);
            const host = u.hostname.replace(/^www\./, "");

            if (host === "youtu.be") return u.pathname.split("/")[1];
            if (u.pathname.startsWith("/embed/") || u.pathname.startsWith("/shorts/")) return u.pathname.split("/")[2] || u.pathname.split("/")[1];
            return u.searchParams.get("v");
          } catch {
            return null;
          }
        }

        // Gera a URL de Embed do Vídeo
        function toEmbed(rawUrl) {
          const urlStr = norm(rawUrl);
          if (!urlStr) return "";

          const ytId = getYouTubeId(urlStr);
          if (ytId) return `https://www.youtube.com/embed/${ytId}?autoplay=1`;

          // Vimeo
          if (urlStr.includes("vimeo.com")) {
            const parts = urlStr.split("/").filter(Boolean);
            const last = parts[parts.length - 1];
            if (/^\d+$/.test(last)) return `https://player.vimeo.com/video/${last}?autoplay=1`;
          }

          return urlStr;
        }

        // Obtém imagem de Capa (Thumbnail)
        function getThumbnail(rawUrl) {
          const urlStr = norm(rawUrl);
          const ytId = getYouTubeId(urlStr);
          
          if (ytId) {
            return `https://img.youtube.com/vi/${ytId}/mqdefault.jpg`;
          }
          
          // Imagem fallback caso não seja YouTube
          return "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=150&q=80";
        }

        // Define o item ativo
        function setActive(index, isUserClick = false) {
          if (index < 0 || index >= items.length) return;

          items.forEach(item => item.classList.remove('active'));
          const selectedItem = items[index];
          selectedItem.classList.add('active');

          const rawUrl = selectedItem.getAttribute('data-video');
          const embedUrl = toEmbed(rawUrl);

          // Evita autoplay automático no primeiro carregamento do site se não for clique
          if (!isUserClick) {
            player.src = embedUrl.replace('?autoplay=1', '');
          } else {
            player.src = embedUrl;
          }

          selectedItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        // Inicializa thumbnails e eventos
        items.forEach((item, index) => {
          const rawUrl = item.getAttribute('data-video');
          const imgTag = item.querySelector('.video-thumb-img');
          
          if (imgTag) {
            imgTag.src = getThumbnail(rawUrl);
          }

          item.addEventListener('click', () => setActive(index, true));
        });

        // Ativa o primeiro item da lista ao carregar
        if (items.length > 0) {
          setActive(0, false);
        }
      });
    </script>
@endsection
