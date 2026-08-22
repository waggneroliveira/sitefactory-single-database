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

    <style>
      /* RESET LOCAL & ISOLAMENTO DE ESCOPO (.tpl-modal-sec) */
      .tpl-modal-sec, .tpl-modal-sec * {
        box-sizing: border-box !important;
        margin: 0;
        padding: 0;
      }
      .tpl-modal-sec, .content-video, .video{
        background-color: #08090a !important;
      }
      .tpl-modal-sec {        
        padding: 90px 0 !important;
        color: #f3f4f6 !important;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        width: 100% !important;
        position: relative !important;
        clear: both !important;
        line-height: 1.5 !important;
        display: block !important;
      }

      .tpl-modal-sec .tpl-container {
        max-width: 1280px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
        width: 100% !important;
        display: block !important;
      }

      /* BLOCO DE TOPO (SUBSTITUTO DO HEADER PARA EVITAR CONFLITO GLOBAL) */
      .tpl-modal-sec .tpl-header-block {
        display: flex !important;
        justify-content: space-between !important;
        align-items: flex-end !important;
        margin-bottom: 40px !important;
        gap: 32px !important;
        flex-wrap: wrap !important;
        position: relative !important;
        width: 100% !important;
        height: auto !important;
        top: auto !important;
        left: auto !important;
      }

      .tpl-modal-sec .tpl-header-left {
        max-width: 580px !important;
        flex: 1 1 300px !important;
      }

      .tpl-modal-sec .tpl-badge {
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        background: rgba(59, 130, 246, 0.12) !important;
        border: 1px solid rgba(59, 130, 246, 0.3) !important;
        color: #3b82f6 !important;
        padding: 6px 14px !important;
        border-radius: 100px !important;
        font-size: 0.8rem !important;
        font-weight: 600 !important;
        margin-bottom: 16px !important;
        width: fit-content !important;
      }

      .tpl-modal-sec .tpl-header-block h2 {
        font-size: 2.5rem !important;
        font-weight: 700 !important;
        line-height: 1.2 !important;
        color: #ffffff !important;
        letter-spacing: -0.02em !important;
        text-transform: none !important;
      }

      .tpl-modal-sec .tpl-header-block h2 span {
        color: #9ca3af !important;
        display: inline !important;
      }

      .tpl-modal-sec .tpl-header-right {
        max-width: 400px !important;
        flex: 1 1 280px !important;
      }

      .tpl-modal-sec .tpl-header-block p {
        color: #9ca3af !important;
        font-size: 0.98rem !important;
        line-height: 1.6 !important;
        margin-bottom: 12px !important;
      }

      .tpl-modal-sec .tpl-scroll-hint {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        font-size: 0.85rem !important;
        color: #3b82f6 !important;
        font-weight: 600 !important;
      }

      /* TRILHO DE SCROLL HORIZONTAL */
      .tpl-modal-sec .tpl-scroll-track {
        display: flex !important;
        gap: 24px !important;
        overflow-x: auto !important;
        scroll-snap-type: x mandatory !important;
        padding: 12px 0 28px 0 !important;
        -webkit-overflow-scrolling: touch !important;
        scrollbar-width: thin !important;
        scrollbar-color: rgba(255, 255, 255, 0.2) transparent !important;
        width: 100% !important;
      }

      .tpl-modal-sec .tpl-scroll-track::-webkit-scrollbar {
        height: 6px !important;
      }

      .tpl-modal-sec .tpl-scroll-track::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2) !important;
        border-radius: 10px !important;
      }

      /* CARD DO TEMPLATE */
      .tpl-modal-sec .tpl-card {
        flex: 0 0 340px !important;
        min-width: 340px !important;
        max-width: 340px !important;
        scroll-snap-align: start !important;
        background: #121417 !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 18px !important;
        overflow: hidden !important;
        display: flex !important;
        flex-direction: column !important;
        position: relative !important;
        transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease !important;
      }

      .tpl-modal-sec .tpl-card:hover {
        transform: translateY(-6px) !important;
        border-color: rgba(59, 130, 246, 0.5) !important;
        box-shadow: 0 20px 35px -10px rgba(0,0,0,0.8), 0 0 25px rgba(59, 130, 246, 0.2) !important;
      }

      /* NAVEGADOR FICTÍCIO */
      .tpl-modal-sec .tpl-card-topbar {
        background: rgba(255, 255, 255, 0.04) !important;
        padding: 10px 16px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        height: 38px !important;
      }

      .tpl-modal-sec .tpl-dots {
        display: flex !important;
        gap: 6px !important;
      }

      .tpl-modal-sec .tpl-dots span {
        width: 8px !important;
        height: 8px !important;
        border-radius: 50% !important;
        background: rgba(255, 255, 255, 0.25) !important;
        display: inline-block !important;
      }

      .tpl-modal-sec .tpl-tag {
        font-size: 0.7rem !important;
        font-weight: 600 !important;
        color: #10b981 !important;
        background: rgba(16, 185, 129, 0.12) !important;
        padding: 2px 8px !important;
        border-radius: 4px !important;
        line-height: 1.2 !important;
      }

      /* AUTO-SCROLL DA IMAGEM NO HOVER */
      .tpl-modal-sec .tpl-preview {
        position: relative !important;
        height: 260px !important;
        overflow: hidden !important;
        background: #000000 !important;
        width: 100% !important;
      }

      .tpl-modal-sec .tpl-preview img {
        width: 100% !important;
        height: auto !important;
        display: block !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        border: none !important;
        margin: 0 !important;
        padding: 0 !important;
        transition: transform 3.8s cubic-bezier(0.25, 1, 0.5, 1) !important;
      }

      .tpl-modal-sec .tpl-card:hover .tpl-preview img {
        transform: translateY(calc(-100% + 260px)) !important;
      }

      /* OVERLAY */
      .tpl-modal-sec .tpl-overlay {
        position: absolute !important;
        inset: 0 !important;
        background: rgba(8, 9, 10, 0.65) !important;
        backdrop-filter: blur(3px) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        opacity: 0 !important;
        transition: opacity 0.3s ease !important;
        z-index: 5 !important;
      }

      .tpl-modal-sec .tpl-card:hover .tpl-overlay {
        opacity: 1 !important;
      }

      .tpl-modal-sec .tpl-btn-preview {
        background: #3b82f6 !important;
        color: #ffffff !important;
        padding: 10px 20px !important;
        border-radius: 100px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        font-size: 0.85rem !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        border: none !important;
        cursor: pointer !important;
      }

      /* RODAPÉ DO CARD */
      .tpl-modal-sec .tpl-card-body {
        padding: 18px 20px !important;
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        background: rgba(255, 255, 255, 0.01) !important;
        border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
      }

      .tpl-modal-sec .tpl-category {
        font-size: 0.75rem !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        color: #3b82f6 !important;
        letter-spacing: 0.05em !important;
        display: block !important;
        margin-bottom: 2px !important;
      }

      .tpl-modal-sec .tpl-title {
        font-size: 1.05rem !important;
        font-weight: 600 !important;
        color: #ffffff !important;
      }

      .tpl-modal-sec .tpl-arrow {
        width: 34px !important;
        height: 34px !important;
        border-radius: 50% !important;
        background: rgba(255, 255, 255, 0.06) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        color: #9ca3af !important;
        transition: all 0.3s ease !important;
      }

      .tpl-modal-sec .tpl-card:hover .tpl-arrow {
        background: #3b82f6 !important;
        color: #ffffff !important;
        transform: rotate(45deg) !important;
      }

      /* BANNER INFERIOR */
      .tpl-modal-sec .tpl-cta {
        margin-top: 36px !important;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.12) 0%, rgba(18, 20, 23, 0.9) 100%) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 20px !important;
        padding: 28px 36px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        gap: 20px !important;
        flex-wrap: wrap !important;
      }

      .tpl-modal-sec .tpl-cta-text h4 {
        color: #ffffff !important;
        font-size: 1.2rem !important;
        font-weight: 600 !important;
        margin-bottom: 4px !important;
      }

      .tpl-modal-sec .tpl-cta-text p {
        color: #9ca3af !important;
        font-size: 0.92rem !important;
      }

      .tpl-modal-sec .tpl-cta-btn {
        background: #ffffff !important;
        color: #000000 !important;
        padding: 12px 26px !important;
        border-radius: 100px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        font-size: 0.88rem !important;
        white-space: nowrap !important;
        transition: all 0.3s ease !important;
      }

      .tpl-modal-sec .tpl-cta-btn:hover {
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3) !important;
        transform: scale(1.02) !important;
      }

      /* RESPONSIVIDADE */
      @media (max-width: 768px) {
        .tpl-modal-sec .tpl-card {
          flex: 0 0 280px !important;
          min-width: 280px !important;
          max-width: 280px !important;
        }

        .tpl-modal-sec .tpl-header-block h2 {
          font-size: 1.8rem !important;
        }

        .tpl-modal-sec .tpl-cta {
          flex-direction: column !important;
          text-align: center !important;
          padding: 24px !important;
        }

        .tpl-modal-sec .tpl-cta-btn {
          width: 100% !important;
        }
      }
    </style>

    <section class="tpl-modal-sec overflow-hidden">
      <div class="tpl-container">
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
      <section class="video container-fluid">
          <div class="container p-0">
              <div class="content-video d-flex justify-content-center align-items-center">
                  <!-- Lista -->
                  <div class="left col-5 dark-background h-100 d-flex justify-content-center align-items-end flex-column position-relative">
                      <div class="swiper mySwiper position-relative">
                          <div class="swiper-wrapper py-4 flex-column align-items-start justify-content-start m-auto position-relative">
                              @foreach($videos as $video)
                                  <div class="swiper-slide align-items-center mb-3 justify-content-center"
                                      data-video="{{ $video->link }}">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="external-icon" viewBox="0 0 28.57 20" focusable="false" style="pointer-events: none; display: block; width: 35px; height: auto;">
                                          <svg viewBox="0 0 28.57 20" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg">
                                              <g>
                                                  <path d="M27.9727 3.12324C27.6435 1.89323 26.6768 0.926623 25.4468 0.597366C23.2197 2.24288e-07 14.285 0 14.285 0C14.285 0 5.35042 2.24288e-07 3.12323 0.597366C1.89323 0.926623 0.926623 1.89323 0.597366 3.12324C2.24288e-07 5.35042 0 10 0 10C0 10 2.24288e-07 14.6496 0.597366 16.8768C0.926623 18.1068 1.89323 19.0734 3.12323 19.4026C5.35042 20 14.285 20 14.285 20C14.285 20 23.2197 20 25.4468 19.4026C26.6768 19.0734 27.6435 18.1068 27.9727 16.8768C28.5701 14.6496 28.5701 10 28.5701 10C28.5701 10 28.5677 5.35042 27.9727 3.12324Z" fill="#FF0000"></path>
                                                  <path d="M11.4253 14.2854L18.8477 10.0004L11.4253 5.71533V14.2854Z" fill="white"></path>
                                              </g>
                                          </svg>
                                      </svg>
                                      <h3 class="title montserrat-medium font-16 mb-0 col-10">
                                          {{ $video->title ?? 'Vídeo' }}
                                      </h3>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                      <div class="nav-video position-absolute d-flex flex-column align-items-end me-5">
                          <div class="swiper-button-up">▲</div>
                          <div class="swiper-button-down">▼</div>
                      </div>
                  </div>

                  <!-- Player -->
                  <div class="right col-7 bg-black d-flex justify-content-center align-items-center">
                      <iframe id="videoPlayer" class="w-100 h-100"
                              src=""
                              title="Vídeo"
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                              allowfullscreen></iframe>
                  </div>
              </div>
          </div>
      </section>
    @endif

    <!-- success stories Section Start -->
    <section class="key_feature_section row_am" id="review_sec">

    		<!-- side element left  -->
      	<div class="kf_side_element left_side"> <img src="images/thumbup.webp" alt="image"> </div>
      	<!-- side element right  -->
      	<div class="kf_side_element right_side"> <img src="images/like.webp" alt="image"> </div>
      	
        <div class="key_innner">

          <!-- container  -->
          <div class="container">

            <!-- section title  -->
            <div class="section_title" >
              <span class="title_badge">Depoimentos</span>
              <h2>Experiência de quem vive</h2>
            </div>

            <!-- slider  -->
            <div id="feature_slider" class="owl-carousel owl-theme" data-aos="fade-up" data-aos-duration="1500">

              <!-- testimonial 1  -->
              <div class="item">
                <div class="feature_box">
                  <!-- image -->
                	<div class="img">
                    <img src="images/story1.webp" alt="image">
                  </div>

                  <div class="txt_blk">
  	                <h6>Olivia Sam</h6>
                    <!-- star -->
                    <div class="rating">
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                    </div>
                    <!-- story text -->
  	                <p> <span class="story_bold"> “Delivery on time every order!” </span> Lorem Ipsum is simply dummy text of the printing the industrys standard dummytextever since.</p>
              	</div>
                <!-- image -->
                <div class="quote_img">
                  <img src="images/quote.webp" alt="image">
                </div>

                </div>
              </div>

              <!-- testimonial 2  -->
              <div class="item">
                <div class="feature_box">
                  <!-- image -->
                	<div class="img">
                    <img src="images/story2.webp" alt="image">
                  </div>

                  <div class="txt_blk">
  	                <h6>Sandra Luna</h6>
                    <!-- star -->
                    <div class="rating">
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                    </div>
                    <!-- story text -->
  	                <p> <span class="story_bold"> “Quality and Healthy Food" </span> Simply dummy text of the printing and typesetting indus try lorem Ipsum has been the industrys standard.</p>
              	</div>
                <!-- image -->
                <div class="quote_img">
                  <img src="images/quote.webp" alt="image">
                </div>

                </div>
              </div>

              <!-- testimonial 3  -->
              <div class="item">
                <div class="feature_box">
                  <!-- image -->
                	<div class="img">
                    <img src="images/story3.webp" alt="image">
                  </div>

                  <div class="txt_blk">
  	                <h6>Amelia Elisa</h6>
                    <!-- star -->
                    <div class="rating">
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                    </div>
                    <!-- story text -->
  	                <p> <span class="story_bold"> "Easy to use App, Much Helpfull” </span> Indus try lorem Ipsum has been the industrys standard dummytextever Print  and tysetting.</p>

              	</div>
                <!-- image -->
                <div class="quote_img">
                  <img src="images/quote.webp" alt="image">
                </div>

                </div>
              </div>

              <!-- testimonial 4  -->
              <div class="item">
                <div class="feature_box">
                  <!-- image -->
                	<div class="img">
                    <img src="images/story4.webp" alt="image">
                  </div>

                  <div class="txt_blk">
  	                <h6>Maria Sim</h6>
                    <!-- star -->
                    <div class="rating">
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                      <span><i class="icofont-star"></i></span>
                    </div>
                    <!-- story text -->
  	                <p> <span class="story_bold"> "Supportive staff!” </span> Lorem Ipsum is simply dummy text of the printing and dummy text typesetting industry lorem Ipsum has been.</p>

              	</div>
                <!-- image -->
                <div class="quote_img">
                  <img src="images/quote.webp" alt="image">
                </div>
                
                </div>
              </div>

            </div>

            <!-- button  -->
            <div class="ctr_cta">
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
        </div>
    </section>
    <!-- success stories Section End -->

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

<script>
    const section = document.querySelector('section.video');
    if (section) {
        const wrapper = section.querySelector('.mySwiper .swiper-wrapper');
        const slides  = Array.from(section.querySelectorAll(".mySwiper .swiper-slide"));
        const player  = section.querySelector("#videoPlayer");

        let currentIndex = 0;
        let firstLoad = true;

        // Normaliza URL (adiciona protocolo se vier //)
        function norm(url) {
            if (!url) return "";
            return url.startsWith("//") ? window.location.protocol + url : url;
        }

        // Converte para URL de embed (YouTube / Vimeo)
        function toEmbed(rawUrl) {
            const urlStr = norm(rawUrl);
            if (!urlStr) return "";

            let u;
            try { u = new URL(urlStr); } catch { return urlStr; }

            const host = u.hostname.replace(/^www\./, "");

            // YouTube
            if (host.includes("youtube.com") || host.includes("youtu.be")) {
                // Se já for /embed/ mantém
                if (u.pathname.startsWith("/embed/")) return u.toString();

                // youtu.be/<id>
                if (host === "youtu.be" && u.pathname.length > 1) {
                    const id = u.pathname.split("/")[1];
                    return `https://www.youtube.com/embed/${id}`;
                }

                // shorts -> converte para embed
                if (u.pathname.startsWith("/shorts/")) {
                    const id = u.pathname.split("/")[2] || u.pathname.split("/")[1];
                    return `https://www.youtube.com/embed/${id}`;
                }

                // watch?v=<id>
                const v = u.searchParams.get("v");
                if (v) return `https://www.youtube.com/embed/${v}`;

                // /live/<id> ou /v/<id> etc.
                const parts = u.pathname.split("/").filter(Boolean);
                if (parts.length >= 2) {
                    const id = parts.pop();
                    return `https://www.youtube.com/embed/${id}`;
                }
            }

            // Vimeo
            if (host.includes("vimeo.com")) {
                // Se já for player.vimeo.com
                if (host === "player.vimeo.com") return u.toString();

                // Extrai o último segmento numérico como ID
                const parts = u.pathname.split("/").filter(Boolean);
                const last = parts[parts.length - 1];
                if (/^\d+$/.test(last)) {
                    return `https://player.vimeo.com/video/${last}`;
                }
            }

            // Desconhecido: retorna original
            return urlStr;
        }

        function setActiveByIndex(index, userTriggered = false) {
            if (index < 0 || index >= slides.length) return;

            slides.forEach(s => s.classList.remove("active"));
            const slide = slides[index];
            slide.classList.add("active");

            const raw = slide.getAttribute("data-video");
            const embedUrl = toEmbed(raw);
            if (embedUrl) player.src = embedUrl;

            currentIndex = index;

            if (!firstLoad || userTriggered) {
                slide.scrollIntoView({ behavior: "smooth", block: "nearest" });
            }
        }

        // Clique em um item
        slides.forEach((slide, idx) => {
            slide.addEventListener("click", () => setActiveByIndex(idx, true));
        });

        // Inicia no primeiro (sem rolagem)
        if (slides.length > 0) setActiveByIndex(0);

        // Libera rolagem depois do load
        window.addEventListener("load", () => {
            setTimeout(() => { firstLoad = false; }, 500);
        });

        // Navegação ↑ ↓
        const btnUp = section.querySelector(".swiper-button-up");
        const btnDown = section.querySelector(".swiper-button-down");

        btnUp && btnUp.addEventListener("click", () => {
            if (currentIndex > 0) setActiveByIndex(currentIndex - 1, true);
        });
        btnDown && btnDown.addEventListener("click", () => {
            if (currentIndex < slides.length - 1) setActiveByIndex(currentIndex + 1, true);
        });
    }
</script>
@endsection
