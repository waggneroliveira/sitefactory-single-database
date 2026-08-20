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
                        <!-- typed text -->
                        <div class="type-wrap">
                            <!-- add static words/sentences here (i.e. text that you don't want to be removed)-->
                            <span id="typed" style="white-space:pre;" class="typed">
                            </span>
                        </div>
                        <!-- h1 -->
                        <h1 class="hero-title font-changa font-40 font-bold text-white"> {{$slide->title}} <span class="secondary-color">{{$slide->subtitle}}</span></h1>
                        <!-- p -->
                        <div class="description text-white">
                            {!! $slide->description !!}
                        </div>
                    </div>

                    <div class="btn_block mt-3">
                        @if ($slide->link <> null)                                    
                            <a href="{{$slide->link}}" target="_blank" rel="noopener noreferrer" class="btn-one py-2 px-3 px-lg-5 btn-hero font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none hover-zoom">
                                {{$slide->btn_title}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>  
                            </a>
                        @endif
                    </div>

                    <div class="hero-stats">
                        <div class="hero-stats-item">
                            <div class="number text-white-50">4.9</div>
                            <div class="label">Avaliação média</div>
                        </div>
                        <div class="hero-stats-item">
                            <div class="number text-white-50">+2k</div>
                            <div class="label">Clientes ativos</div>
                        </div>
                        <div class="hero-stats-item">
                            <div class="number text-white-50">99.9%</div>
                            <div class="label">Uptime</div>
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
            <div class="blure_shape bs_1"> </div>
            <div class="blure_shape bs_2"> </div>

            <!-- container -->
            <div class="container">

                <!-- section title -->
                <div class="section_title">
                    <h2>
                      Quantos pedidos <br>você <span>já perdeu hoje?</span>
                    </h2>
                </div>

                <!-- listing -->
                <div class="af_listing">
                    <!-- row -->
                    <div class="row">
                        <!-- collom -->
                        <div class="col-md-12">
                            <!-- inner section -->
                            <div class="row listing_inner align-items-center">
                                <!-- blok -->
                                <div class="af_block col-lg-3 col-md-6 col-sm-6 p-1" data-aos="fade-up" data-aos-duration="1500">
                                    <div class="text" style="min-height: 223px;">
                                        <div class="d-flex justify-content-between align-items-start flex-column mb-2">
                                          <div class="bg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb6c04" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square-x size-6"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path><path d="m14.5 7.5-5 5"></path><path d="m9.5 7.5 5 5"></path></svg>
                                          </div>
                                          <h5>Pedidos perdidos no WhatsApp</h5>
                                        </div>
                                        <p>Mensagens se misturam, somem, e clientes ficam sem resposta.r</p>
                                    </div>
                                </div>

                                <!-- blok -->
                                <div class="af_block col-lg-3 col-md-6 col-sm-6 p-1" data-aos="fade-up" data-aos-duration="1500">
                                    <div class="text" style="min-height: 223px;">
                                        <div class="d-flex justify-content-between align-items-start flex-column mb-2">
                                            <div class="bg-icon">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb6c04" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-triangle-alert size-6"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"></path><path d="M12 9v4"></path><path d="M12 17h.01"></path></svg>
                                            </div>
                                            <h5>Erros no atendimento</h5>
                                        </div>
                                        <p>Anota errado, esquece o sem cebola, manda pro endereço errado.</p>
                                    </div>
                                </div>

                                <!-- blok -->
                                <div class="af_block col-lg-3 col-md-6 col-sm-6 p-1" data-aos="fade-up" data-aos-duration="1500">
                                    <div class="text" style="min-height: 223px;">
                                        <div class="d-flex justify-content-between align-items-start flex-column mb-2">
                                            <div class="bg-icon">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb6c04" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-bag size-6"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path><path d="M3 6h18"></path><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                            </div>
                                            <h5>Bagunça nos pedidos</h5>
                                        </div>

                                        <p>Caderno, papel, print do WhatsApp... ninguém entende mais nada.</p>
                                    </div>
                                </div>

                                <!-- blok -->
                                <div class="af_block col-lg-3 col-md-6 col-sm-6 p-1" data-aos="fade-up" data-aos-duration="1500">
                                    <div class="text" style="min-height: 223px;">
                                        <div class="d-flex justify-content-between align-items-start flex-column mb-2">
                                            <div class="bg-icon">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb6c04" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock size-6"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                            </div>
                                            <h5>Tempo desperdiçado</h5>
                                        </div>
                                        <p> Você passa o dia respondendo igual a um robô e não sobra tempo pra cozinhar.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- listing -->

            </div>
        </div>

        <!-- device image -->
        <div class="device">
            <img src="images/device.webp" alt="image">
        </div>

    </section>
    <!-- How it Works Section End -->

    <!-- why us new section start -->
    <section class="why_new_section" id="why_sec">
        <!-- inner section start -->
        <div class="why_new_section_inner">
        <!-- container start -->
        <div class="container">
          <!-- row start -->
          <div class="row justify-content-center">

            <!-- section title -->
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
              <span class="title_badge">A solução</span>
              <!-- h2 -->
              <h2 class="trhee-step">Funciona em <br><span>3 passos</span> simples</h2>
            </div>

            <div class="dtat_box">
              <div class="col-lg-6 col-md-12">
                <!-- why us new box left -->
                <div class="why_new_left_data">

                  <!-- block 1 -->
                  <div class="why_data_block " data-aos="fade-right" data-aos-duration="1500">
                    <!-- icon -->
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb6c04" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-link2 size-7 text-primary-foreground"><path d="M9 17H7A5 5 0 0 1 7 7h2"></path><path d="M15 7h2a5 5 0 1 1 0 10h-2"></path><line x1="8" x2="16" y1="12" y2="12"></line></svg>
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <h6>Cliente acessa seu link</h6>
                      <p>Você compartilha um link único do seu cardápio digital. Sem download, sem cadastro chato.</p>
                    </div>
                  </div>

                  <!-- block 2 -->
                  <div class="why_data_block " data-aos="fade-right" data-aos-duration="1500">
                    <!-- icon -->
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb6c04" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart size-7 text-primary-foreground"><circle cx="8" cy="21" r="1"></circle><circle cx="19" cy="21" r="1"></circle><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path></svg>
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <h6>Faz o pedido sozinho</h6>
                      <p>Escolhe os itens, personaliza, paga e envia. Tudo direto do celular dele.</p>
                    </div>
                  </div>

                  <!-- block 3 -->
                  <div class="why_data_block " data-aos="fade-right" data-aos-duration="1500">
                    <!-- icon -->
                    <div class="icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fb6c04" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell size-7 text-primary-foreground"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path></svg>
                    </div>
                    <!-- text -->
                    <div class="text col-12 col-md-10">
                      <h6>Pedido chega organizado</h6>
                      <p>Você recebe tudo certinho no painel: endereço, itens, observações e pagamento confirmado.</p>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-6 col-md-12">
                <!-- why us new image -->
                <div class="why_us_new_img" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                  <img src="images/features_frame.webp" alt="image" >
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
    <section class="row_am service_section" id="feature_sec">

        <div class="container">
            <!-- section title -->
            <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
                <span class="title_badge">VANTAGENS</span>
                <h2 class="trhee-step">O que você ganha <br>com o <span>Delifast</span></h2>
            </div>

            <div class="row service_blocks flex-row-reverse">
                <div class="col-md-6">
                    <div class="service_text right_side" data-aos="fade-up" data-aos-duration="1500">

                        <span class="title_badge">Para você</span>
                        <h3>Gestão de conteúdo e pedidos descomplicada </h3>
                        <p>Tenha acesso ao nosso dashboard onde será possível ter autonomia para mudança de todas as informações do seu sistema, inclusive a gestão de pedidos</p>
                        <ul class="design_block">
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Cadastra</span> produtos com fotos e descrições</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Define</span> preços e categorias</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Gerencia</span> pedidos e seus status pelo dashboard</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Analisa</span> relatórios de desempenho</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Redução</span> de 80% no tempo de gestão</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Atualiza</span> o cardápio instataneamente</h6>
                            </li>

                        </ul>
                        <div class="btn_block">
                            <a href="#plans" 
                            class="btn puprple_btn ml-0">Começar agora
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inner_block dark_bg rotate_right" data-aos="fade-up" data-aos-duration="1500">
                        <div class="img">
                            <img src="images/for_restaurant.webp" alt="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row service_blocks no_bottom_padding">
                <div class="col-md-6">
                    <div class="service_text" data-aos="fade-up" data-aos-duration="1500">
                        <span class="title_badge">Para seu cliente</span>
                        <h3>Processo de pedido simples e rápido</h3>
                        <p>Ofereça uma experiência fluida do primeiro clique à entrega, fazendo com que seu cliente volte a comprar pela facilidade.</p>
                        
                        <ul class="design_block">
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Acessa</span> seu cardápio digital (link ou QR Code)</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Escolhe</span> produtos e adiciona ao carrinho de forma mais rápida</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Finaliza</span> pedido com endereço e forma de pagamento</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Recebe</span> confirmação e acompanha status do pedido</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Volta</span> a comprar pela facilidade</h6>
                            </li>
                            <li data-aos="fade-up" data-aos-duration="1500">
                                <h6><span>Acompanha</span> o Status e Processamento de Pedidos em Tempo Real</h6>
                            </li>
                        </ul>
                        <div class="btn_block">
                          <a href="#plans" 
                          class="btn puprple_btn ml-0">Começar agora
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                          </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="inner_block" data-aos="fade-up" data-aos-duration="1500">
                        <div class="img">
                            <img src="images/for_customer.webp" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->
    
    <!-- App-Download-New-Section-Start -->
    <section class="row_am download_app_new" id="download_sec">
      <!-- Task Block start -->
      <div class="dap_block" data-aos="fade-up" data-aos-duration="1500">

        <!-- background blure shapes -->
        <div class="blure_shape bs_1"> </div>

        <!-- row start -->
        <div class="row">

          <!-- left images -->
          <div class="col-lg-3 col-md-12 order-2 order-lg-1">
            <div class="dap_image left">
              <img class="dap_desktop_img" src="images/download_food1.webp" alt="image">
              <img class="dap_mobile_img" src="images/download_food3.webp" alt="image">
            </div>
          </div>

          <!-- text -->
          <div class="col-lg-6 col-md-12 order-1 order-lg-2">
            <!-- text -->
            <div class="dap_text">

              <!-- section title -->
              <div class="section_title white_text" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <span class="title_badge">Entre em contato</span>
                <h2>Fale conosco agora e adquira <span>instalação e treinamento GRÁTIS!</span></h2>
                <p>
                  <b>Comece a receber pedidos hoje!</b> Em poucos dias você terá um sistema de delivery profissional, sem pagar comissões absurdas e com controle total do seu negócio.
                </p>
              </div>
              <ul class="topic-download d-flex justify-content-center align-items-center" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                <li class="position-relative"><h6>Treinamento Especializado</h6></li>
                <li class="position-relative"><h6>Pronto para uso</h6></li>
                <li class="position-relative"><h6>Instalação grátis</h6></li>
              </ul>
              <!-- Contador -->
              <div class="w-100" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
                  <div class="contador">
                      <div class="unidade">
                          <span class="numero" id="days"></span>
                          <span class="label">Dias</span>
                      </div>
                      <div class="unidade">
                          <span class="numero" id="hours"></span>
                          <span class="label">Horas</span>
                      </div>
                      <div class="unidade">
                          <span class="numero" id="mins"></span>
                          <span class="label">Minutos</span>
                      </div>
                      <div class="unidade">
                          <span class="numero" id="secs"></span>
                          <span class="label">Segundos</span>
                      </div>
                  </div>
              </div>
              <!-- Contador -->
               <a href="http://" target="_blank" rel="noopener noreferrer" class="bt bg-white text-dark mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">Adiquirir promoção!</a>
            </div>
          </div>

          <!-- left images -->
          <div class="col-lg-3 col-md-12 order-3 order-lg-3 d-none d-lg-block">
            <div class="dap_image right">
              <img src="images/download_food2.webp" alt="image">
            </div>
          </div>

        </div>
        <!-- row end -->
      </div>
      <!-- app Block end -->
    </section>
    <!-- App-Download-New-Section-end -->

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
              class="btn puprple_btn ml-0">Começar agora
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
              </a>
    	        </div>
  			    </div>

          </div>
        </div>
    </section>
    <!-- success stories Section End -->

    <section id="plans" class="plans">
      <div class="af_innner">
        <div class="blure_shape bs_1"> </div>
        <div class="blure_shape bs_2"> </div>
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
                class="btn puprple_btn ml-0 whatsapp-plan-btn w-100 text-uppercase">Começar com Basic</a>
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
                class="btn puprple_btn ml-0 whatsapp-plan-btn disabled w-100" style="opacity:0.5; cursor:not-allowed; pointer-events:none;">EM BREVE</a>
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
                class="btn puprple_btn ml-0 whatsapp-plan-btn disabled w-100" style="opacity:0.5; cursor:not-allowed; pointer-events:none;">EM BREVE</a>
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
                      <a href="https://wa.me/5571992768360" class="btn puprple_btn ml-0 whatsapp-btn">SABER MAIS</a>
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
                      <a href="https://wa.me/5571992768360" class="btn puprple_btn ml-0 whatsapp-btn">SABER MAIS</a>
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
                      <a href="https://wa.me/5571992768360" class="btn puprple_btn ml-0 whatsapp-btn">SABER MAIS</a>
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
                  class="btn puprple_btn ml-0 keep-message">Começar agora
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                  </a>
              </div>
            </div>
          </div>
        </div>
      </section>   
@endsection
