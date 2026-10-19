@extends($theme->core('client'))

@section('content')
    <!-- Banner-Section-Start -->
    @if (isset($slides) && $slides->count())
      <section class="banner_section hero-sales-section position-relative overflow-hidden py-5" id="home_sec">
          <!-- Background Glow & Mesh Gradient -->
          <div class="hero-bg-glow"></div>

          <div class="container position-relative z-2 py-lg-4">
              <div class="row align-items-center gy-5" style="height: 100vh">
                  <!-- COLUNA DA ESQUERDA: COPY DE ALTO IMPACTO -->
                  @foreach ($slides as $slide)
                    <div class="col-lg-6 text-center text-lg-start">
                        <!-- Título Principal com Tipografia Forte -->
                        <h1 class="hero-main-title font-changa text-white font-medium lh-sm mb-3">
                            {{$slide->title}}
                            <span class="d-block text-gradient-accent secondary-color font-bold">{{$slide->subtitle}}</span>
                        </h1>

                        <!-- Subtítulo Persuasivo -->
                        <div class="hero-subtext text-white-50 font-18 mb-4 pe-lg-4">
                            {!!$slide->description!!}
                        </div>

                        <!-- CTAs de Conversão -->
                        <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3 mb-4">
                            <a
                                href="#plans"
                                class="rounded-1 d-flex align-items-center btn-one py-2 px-3 px-lg-5 btn-hero font-changa bg-button-one color-button-one font-15 font-bold text-decoration-none"
                            >
                                <span class="">Começar Agora por R$ 59,90</span>
                                <i class="ms-2 bi bi-arrow-right font-20"></i>
                            </a>
                            <a
                                href="https://wa.me/SEUNUMERO"
                                target="_blank"
                                class="btn d-flex align-items-center btn-outline-light px-lg-5 px-3 py-lg-3 py-1 font-15 font-medium"
                            >
                                <i class="bi bi-whatsapp color-whatsapp me-2 font-16"></i>
                                <span>Falar no WhatsApp</span>
                            </a>
                        </div>

                        <!-- Social Proof & Garantias -->
                        <div
                            class="d-flex align-items-center justify-content-center justify-content-lg-start gap-4 pt-2 text-white-50 font-13"
                        >
                            <div class="d-flex align-items-center gap-1.5">
                                <i class="bi bi-check-circle-fill text-success me-2"></i> Sem taxa de adesão
                            </div>
                            <div class="d-flex align-items-center gap-1.5">
                                <i class="bi bi-check-circle-fill text-success me-2"></i> Suporte incluso
                            </div>
                            <div class="d-flex align-items-center gap-1.5">
                                <i class="bi bi-check-circle-fill text-success me-2"></i> Setup Rápido
                            </div>
                        </div>
                    </div>

                    <!-- COLUNA DA DIREITA: MOCKUP INTERATIVO REPLICADO EM HTML/CSS -->
                    <div class="col-lg-6 m-0">
                        <div class="hero-mockup-wrapper position-relative mx-auto">
                            <!-- TABLET CONTAINER (REPLICAÇÃO DA IMAGEM) -->
                            <div class="tablet-device shadow-lg">
                                <!-- Tablet Top Bar -->
                                <div class="tablet-header d-flex align-items-center justify-content-between px-3 py-2">
                                    <span class="tablet-time font-11 text-white-50">agosto quinta-feira às 19:04</span>
                                    <div class="tablet-browser-bar d-flex align-items-center px-2 py-0.5 rounded-3">
                                        <i class="bi bi-lock-fill font-10 text-success me-1"></i>
                                        <span class="font-11 text-white-50">whiweb.com.br</span>
                                    </div>
                                    <div class="tablet-status font-11 text-white-50">
                                        <i class="bi bi-wifi me-1"></i> 100% <i class="bi bi-battery-full ms-1"></i>
                                    </div>
                                </div>
  
                                <!-- Tablet Screen / Admin Dashboard -->
                                <div class="tablet-body p-3">
                                    <!-- App Top Bar -->
                                    <div
                                        class="app-navbar d-flex align-items-center justify-content-between p-2 rounded-3 mb-3"
                                    >
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="app-logo fw-bold text-white-50">W</div>
                                            <i class="bi bi-list text-white font-18 ms-2"></i>
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <i class="bi bi-aspect-ratio text-white-50 font-14"></i>
                                            <i class="bi bi-search text-white-50 font-14"></i>
                                            <div class="position-relative">
                                                <i class="bi bi-bell text-white-50 font-14"></i>
                                                <span class="badge-dot">2</span>
                                            </div>
                                            <i class="bi bi-moon text-white-50 font-14"></i>
                                            <div class="d-flex align-items-center gap-1 text-white font-10 fw-medium">                                              
                                                Wagner Oliveira <i class="bi bi-chevron-down font-10"></i>
                                            </div>
                                            <i class="bi bi-gear text-white-50 font-12"></i>
                                        </div>
                                    </div>
  
                                    <!-- Dashboard Title -->
                                    <div class="mb-3 text-start">
                                        <h5 class="fw-bold text-dark mb-0 font-16 d-flex align-items-center gap-2">
                                            <i class="bi bi-grid-fill text-primary"></i> Painel Gerenciador
                                        </h5>
                                        <p class="text-muted font-11 mb-0">Gerencie todos os módulos do seu site</p>
                                    </div>
  
                                    <!-- Dashboard Grid Modules -->
                                    <div class="dashboard-grid">
                                        <div class="module-card">
                                            <i class="bi bi-image text-primary font-16"></i>
                                            <span class="font-10">Sliders</span>
                                            <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                        </div>
                                        <div class="module-card">
                                            <i class="bi bi-list-ul text-primary font-16"></i>
                                            <span class="font-10">Tópicos</span>
                                            <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                        </div>
                                        <div class="module-card">
                                            <i class="bi bi-person-lines-fill text-primary font-16"></i>
                                            <span class="font-10">Serviços</span>
                                            <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                        </div>
                                        <div class="module-card">
                                            <i class="bi bi-images text-primary font-16"></i>
                                            <span class="font-10">Galeria</span>
                                            <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                        </div>
                                        <div class="module-card">
                                            <i class="bi bi-question-circle-fill text-primary font-16"></i>
                                            <span class="font-10">Sobre Nós</span>
                                            <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                        </div>
                                        <div class="module-card">
                                            <i class="bi bi-display text-primary font-16"></i>
                                            <span class="font-10">Contato</span>
                                            <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                        </div>
                                        <div class="module-card">
                                            <i class="bi bi-person-badge-fill text-primary font-16"></i>
                                            <span class="font-10">Lead Contato</span>
                                            <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                        </div>
                                    </div>
  
                                    <!-- Config Section Title -->
                                    <div class="section-title-sm text-start mt-2 mb-1 text-muted font-11 fw-bold">
                                        <i class="bi bi-envelope-gear"></i> Configuração SMTP
                                    </div>
                                    <div class="module-card mb-2">
                                        <i class="bi bi-envelope text-primary font-16"></i>
                                        <span class="font-10">Configuração de e-mail</span>
                                        <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                    </div>
  
                                    <div class="section-title-sm text-start mt-2 mb-1 text-muted font-11 fw-bold">
                                        <i class="bi bi-shield-lock"></i> Segurança e Controle de Acesso
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="module-card">
                                                <i class="bi bi-clipboard-data text-primary font-16"></i>
                                                <span class="font-10">Auditoria</span>
                                                <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="module-card">
                                                <i class="bi bi-people-fill text-primary font-16"></i>
                                                <span class="font-10">Grupos de permissões</span>
                                                <i class="bi bi-chevron-right font-8 text-muted ms-auto"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
  
                            <!-- CARDS FLUTUANTES COM EFEITO DE HOVER/FLUTUAÇÃO (Skins Flutuantes da Imagem) -->
                            <div class="floating-badge badge-seo shadow-lg animate-float-1">
                                <div class="icon-wrap bg-primary-soft">
                                    <i class="bi bi-rocket-takeoff-fill text-primary font-22"></i>
                                </div>
                                <div class="text-start">
                                    <strong class="d-block font-13 text-dark">SEO Google Otimizado</strong>
                                    <small class="text-muted font-11">Apareça no topo</small>
                                </div>
                            </div>
  
                            <div class="floating-badge badge-templates shadow-lg animate-float-2">
                                <div class="icon-wrap bg-primary-soft">
                                    <i class="bi bi-bar-chart-line-fill text-primary font-22"></i>
                                </div>
                                <div class="text-start">
                                    <strong class="d-block font-13 text-dark">Templates Otimizados</strong>
                                    <small class="text-muted font-11">Layouts de alta conversão</small>
                                </div>
                            </div>
  
                            <div class="floating-badge badge-audit shadow-lg animate-float-3">
                                <div class="icon-wrap bg-primary-soft">
                                    <i class="bi bi-shield-check text-primary font-22"></i>
                                </div>
                                <div class="text-start">
                                    <strong class="d-block font-13 text-dark">Auditoria Completa</strong>
                                    <small class="text-muted font-11">Segurança em tempo real</small>
                                </div>
                            </div>
  
                            <div class="floating-badge badge-permissions shadow-lg animate-float-4">
                                <div class="icon-wrap bg-primary-soft">
                                    <i class="bi bi-people-fill text-primary font-22"></i>
                                </div>
                                <div class="text-start">
                                    <strong class="d-block font-13 text-dark">Grupos & Permissões</strong>
                                    <small class="text-muted font-11">Gestão de equipe</small>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endforeach
              </div>
          </div>
      </section>
    @endif

    <!-- Banner-Section-end -->
    @if ($topics->count() > 0)
      <!-- How it Works Section Start -->
      <section class="advance_feature_section white_text" id="how_sec">
          <div class="af_innner">

              <!-- background blure shapes -->
              <div class="blure_shape bg-secondary-color bs_1"> </div>
              <div class="blure_shape bg-secondary-color bs_2"> </div>

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
                                          <div class="text d-flex justify-content-center gap-3 align-items-start flex-column" style="min-height: 267px;">
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
          </div>

          <!-- device image -->
          <div class="device">
              <img src="{{asset('build/client/images/themes/whi-web/device.png')}}" alt="image" height="250" loading="lazy">
          </div>

      </section>
      <!-- How it Works Section End -->
    @endif
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
                <h2 class="trhee-step">A forma mais rápida de colocar <br><span>seu negócio no ar</span></h2>
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
                        <div class="font-semibold font-15 font-changa">Definição do modelo do seu site</div>
                        <p>Nós recomendamos o modelo perfeito para o seu segmento ou você escolhe o seu favorito em nosso catálogo de templates.</p>
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
                      <div class="font-semibold font-15 font-changa">Personalização com a sua identidade visual</div>
                      <p>Nossa equipe configura suas cores, logomarca, textos e informações para que o site reflita exatamente a identidade da sua empresa.</p>
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
                      <div class="font-semibold font-15 font-changa">Você aprova e nós publicamos!</div>
                      <p>Você valida o resultado e nós cuidamos de toda a parte técnica: publicação, hospedagem, certificado de segurança e presença no Google</p>
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
                      <div class="font-semibold font-15 font-changa">Autonomia total no painel</div>
                      <p>Você recebe seu login e tem total liberdade para alterar fotos, textos, serviços ou anúncios em tempo real, sempre que precisar.</p>
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-lg-6 col-md-12 position-relative">

              </div>
            </div>

          </div>
          <!-- row end -->
        </div>
        <!-- container end -->
      </div>
      
    </section>
    <!-- why us new section end -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
  .whiweb-showcase-section {
    --ww-bg: #0b0f19;
    --ww-muted: #94a3b8;
    --ww-indigo: #4f46e5;
    position: relative;
    isolation: isolate;
    overflow: hidden;
    width: 100%;
    padding: 2rem clamp(1rem, 4vw, 3rem);
    color: #f1f5f9;
    font-family: Inter, sans-serif;
    background: var(--ww-bg);
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 1.5rem;
    box-shadow: 0 25px 50px -12px rgba(0,0,0,.5);
  }
  .whiweb-showcase-section *, .whiweb-showcase-section *::before, .whiweb-showcase-section *::after { box-sizing: border-box; }
  .whiweb-showcase-section .ww-glow {
    position: absolute; inset: 0; z-index: -1; pointer-events: none;
    background: radial-gradient(circle at 50% 30%,rgba(99,102,241,.25),rgba(14,165,233,.1) 40%,transparent 70%);
  }
  .whiweb-showcase-section h2, .whiweb-showcase-section .ww-brand { font-family: Changa, sans-serif; }
  .whiweb-showcase-section .ww-kicker {
    display: inline-flex; align-items: center; gap: .5rem; margin-bottom: .75rem;
    padding: .35rem .85rem; color: #a5b4fc; background: rgba(99,102,241,.1);
    border: 1px solid rgba(99,102,241,.2); border-radius: 50rem;
    font-size: .7rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase;
  }
  .whiweb-showcase-section .ww-live-dot { width: .5rem; height: .5rem; background: #34d399; border-radius: 50%; animation: ww-ping 1.5s infinite; }
  .whiweb-showcase-section .ww-title {
    margin: 0 0 .5rem; color: #fff; font-size: clamp(1.6rem,3.4vw,2.5rem);
    font-weight: 800; line-height: 1.15; letter-spacing: -.03em;
  }
  .whiweb-showcase-section .ww-gradient-text {
    color: #7dd3fc; background: linear-gradient(90deg,#818cf8,#38bdf8,#34d399);
    -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
  }
  .whiweb-showcase-section .ww-intro { max-width: 42rem; margin: auto; color: var(--ww-muted); font-size: .875rem; }
  .whiweb-showcase-section .ww-glass {
    background: rgba(11,15,25,.75); border: 1px solid rgba(255,255,255,.08);
    border-radius: 1rem; -webkit-backdrop-filter: blur(16px); backdrop-filter: blur(16px);
  }
  .whiweb-showcase-section .ww-controls { max-width: 28rem; margin: 1.5rem auto; padding: .5rem; color: #cbd5e1; font-size: .75rem; }
  .whiweb-showcase-section .ww-control-btn {
    display: inline-flex; align-items: center; gap: .45rem; padding: .45rem .7rem;
    color: #e2e8f0; background: #1e293b; border: 1px solid #334155; border-radius: .7rem;
    transition: background .2s, color .2s;
  }
  .whiweb-showcase-section .ww-control-btn:hover { background: #334155; color: #fff; }
  .whiweb-showcase-section .ww-control-btn.primary { color: white; background: #4f46e5; border-color: #4f46e5; }
  .whiweb-showcase-section .ww-control-btn.primary:hover { background: #6366f1; }
  .whiweb-showcase-section .ww-scene { position: relative; z-index: 1; display: flex; align-items: center; justify-content: center; min-height: 620px; margin: 1rem 0; padding-bottom: 3rem; perspective: 1200px; }
  .whiweb-showcase-section .ww-macbook { position: relative; z-index: 1; width: min(100%,940px); transition: transform .5s; }
  .whiweb-showcase-section .ww-macbook:hover { transform: scale(1.01); }
  .whiweb-showcase-section .ww-laptop-bezel {
    position: relative; overflow: hidden; padding: .75rem .75rem .25rem;
    background: #0d111a; border: 4px solid #1e2638; border-bottom: 0;
    border-radius: 1.5rem 1.5rem 0 0; box-shadow: 0 25px 40px rgba(0,0,0,.7);
  }
  .whiweb-showcase-section .ww-webcam { position: absolute; z-index: 2; top: .35rem; left: 50%; width: .5rem; height: .5rem; transform: translateX(-50%); border-radius: 50%; background: #05070b; }
  .whiweb-showcase-section .ww-screen {
    position: relative; display: flex; flex-direction: column; min-height: 510px;
    overflow: hidden; color: #e2e8f0; background: #0b0f19;
    border: 1px solid rgba(51,65,85,.7); border-radius: .75rem .75rem 0 0;
    font-size: .75rem; user-select: none;
  }
  .whiweb-showcase-section .ww-browserbar, .whiweb-showcase-section .ww-tabletbar, .whiweb-showcase-section .ww-phonebar {
    display: flex; align-items: center; justify-content: space-between; gap: .5rem;
    padding: .5rem .75rem; background: #111625; border-bottom: 1px solid #1e293b;
  }
  .whiweb-showcase-section .ww-dots { display: flex; flex: 0 0 4rem; gap: .35rem; }
  .whiweb-showcase-section .ww-dots i { width: .7rem; height: .7rem; border-radius: 50%; }
  .whiweb-showcase-section .ww-dots i:nth-child(1) { background: #f43f5e; }
  .whiweb-showcase-section .ww-dots i:nth-child(2) { background: #f59e0b; }
  .whiweb-showcase-section .ww-dots i:nth-child(3) { background: #10b981; }
  .whiweb-showcase-section .ww-url { display: flex; align-items: center; justify-content: center; gap: .5rem; flex: 1; max-width: 34rem; padding: .3rem .75rem; color: #cbd5e1; background: #090d16; border: 1px solid #334155; border-radius: .5rem; font: .7rem monospace; }
  .whiweb-showcase-section .ww-browser-icons { display: flex; justify-content: flex-end; gap: .7rem; flex: 0 0 4rem; color: #94a3b8; }
  .whiweb-showcase-section .ww-app { display: flex; flex: 1; min-height: 0; overflow: hidden; background: #0f1422; }
  .whiweb-showcase-section .ww-sidebar {
    display: flex; flex: 0 0 14rem; flex-direction: column; justify-content: space-between;
    padding: .85rem; color: #94a3b8; background: #070a12; border-right: 1px solid #1e293b;
  }
  .whiweb-showcase-section .ww-brand-row { display: flex; align-items: center; gap: .6rem; padding: .35rem .5rem .8rem; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; }
  .whiweb-showcase-section .ww-logo {
    display: inline-flex; align-items: center; justify-content: center; width: 1.8rem; height: 1.8rem;
    color: white; background: #4f46e5; border-radius: .5rem; font-weight: 800;
    box-shadow: 0 5px 15px rgba(79,70,229,.35);
  }
  .whiweb-showcase-section .ww-brand { color: #fff; font-size: .85rem; font-weight: 800; letter-spacing: .08em; line-height: 1; }
  .whiweb-showcase-section .ww-brand-sub { color: #64748b; font-size: .55rem; letter-spacing: .15em; text-transform: uppercase; }
  .whiweb-showcase-section .ww-nav-label { margin: .75rem .5rem .35rem; color: #64748b; font-size: .6rem; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
  .whiweb-showcase-section .ww-nav-link { display: flex; align-items: center; justify-content: space-between; padding: .4rem .55rem; margin-bottom: .15rem; color: #94a3b8; text-decoration: none; border-radius: .5rem; transition: .2s; }
  .whiweb-showcase-section .ww-nav-link:hover { color: #e2e8f0; background: #1e293b; }
  .whiweb-showcase-section .ww-nav-link.active { color: #c7d2fe; background: rgba(79,70,229,.22); border: 1px solid rgba(99,102,241,.3); }
  .whiweb-showcase-section .ww-user { display: flex; align-items: center; gap: .55rem; padding-top: .7rem; border-top: 1px solid #1e293b; }
  .whiweb-showcase-section .ww-avatar { display: inline-flex; align-items: center; justify-content: center; width: 1.6rem; height: 1.6rem; flex: 0 0 auto; color: white; background: linear-gradient(45deg,#6366f1,#38bdf8); border-radius: 50%; font-size: .6rem; font-weight: 800; }
  .whiweb-showcase-section .ww-dashboard { position: relative; display: flex; flex: 1; flex-direction: column; justify-content: space-between; min-width: 0; padding: 1rem; overflow-y: auto; color: #1e293b; background: #f8fafc; }
  .whiweb-showcase-section .ww-dash-nav, .whiweb-showcase-section .ww-dash-card { background: #fff; border: 1px solid #e2e8f0; border-radius: .75rem; box-shadow: 0 1px 3px rgba(15,23,42,.08); }
  .whiweb-showcase-section .ww-dash-nav { display: flex; align-items: center; justify-content: space-between; padding: .6rem .75rem; margin-bottom: 1rem; }
  .whiweb-showcase-section .ww-dash-card { display: flex; align-items: center; gap: .7rem; padding: .75rem; cursor: pointer; transition: border-color .2s, background .2s, box-shadow .2s; }
  .whiweb-showcase-section .ww-card-icon { display: inline-flex; align-items: center; justify-content: center; width: 2.3rem; height: 2.3rem; flex: 0 0 auto; color: #4f46e5; background: #eef2ff; border-radius: .6rem; font-size: 1rem; }
  .whiweb-showcase-section .ww-card-title { margin: 0; color: #1e293b; font-size: .75rem; font-weight: 800; }
  .whiweb-showcase-section .ww-card-copy { margin: 0; color: #94a3b8; font-size: .65rem; }
  .whiweb-showcase-section .ww-section-title { margin: 0 0 .5rem; color: #475569; font-size: .75rem; font-weight: 800; }
  .whiweb-showcase-section .ww-dashboard-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: .65rem; }
  .whiweb-showcase-section .ww-module-theme { animation: ww-highlight-theme 12s infinite; }
  .whiweb-showcase-section .ww-module-slider { animation: ww-highlight-slider 12s infinite; }
  .whiweb-showcase-section .ww-dashboard-footer { display: flex; justify-content: space-between; padding-top: 1rem; margin-top: 1.5rem; color: #94a3b8; border-top: 1px solid #e2e8f0; font-size: .6rem; }
  .whiweb-showcase-section .ww-toast {
    position: absolute; right: 1rem; bottom: 1rem; z-index: 5; display: flex; align-items: center; gap: .6rem;
    padding: .6rem .8rem; color: white; background: #10b981; border: 1px solid #34d399;
    border-radius: .75rem; box-shadow: 0 8px 20px rgba(16,185,129,.3); animation: ww-toast 12s infinite;
  }
  .whiweb-showcase-section .ww-laptop-base { position: relative; display: flex; align-items: center; justify-content: center; height: 1.25rem; background: #1a2232; border-top: 1px solid #334155; border-radius: 0 0 1rem 1rem; }
  .whiweb-showcase-section .ww-hinge { width: 7rem; height: .25rem; margin-bottom: .25rem; background: #0d121d; border-radius: 1rem; }
  .whiweb-showcase-section .ww-laptop-name { position: absolute; bottom: 0; color: #64748b; font-size: .55rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase; }
  .whiweb-showcase-section .ww-phone, .whiweb-showcase-section .ww-tablet { position: absolute; z-index: 2; transition: transform .4s, z-index .4s; }
  .whiweb-showcase-section .ww-phone { bottom: -1rem; left: 0; width: 230px; }
  .whiweb-showcase-section .ww-tablet { right: 0; bottom: -.5rem; width: 270px; }
  .whiweb-showcase-section .ww-phone:hover, .whiweb-showcase-section .ww-tablet:hover { z-index: 4; transform: scale(1.04); }
  .whiweb-showcase-section .ww-device-frame { padding: .6rem; background: #181e29; border: 4px solid #2d3748; border-radius: 2.7rem; box-shadow: 0 20px 40px rgba(0,0,0,.8); }
  .whiweb-showcase-section .ww-device-screen { position: relative; display: flex; flex-direction: column; justify-content: space-between; min-height: 430px; padding: .75rem; overflow: hidden; color: #e2e8f0; background: #0b0f19; border: 1px solid #1e293b; border-radius: 2.1rem; font-size: .7rem; }
  .whiweb-showcase-section .ww-notch { display: flex; align-items: center; justify-content: space-between; width: 5rem; height: 1rem; padding: 0 .5rem; margin: 0 auto .4rem; color: #94a3b8; background: #000; border-radius: 2rem; font-size: .5rem; }
  .whiweb-showcase-section .ww-login-card { position: relative; padding: .9rem; margin: auto 0; overflow: hidden; color: #1e293b; text-align: center; background: white; border: 1px solid #f1f5f9; border-radius: 1rem; box-shadow: 0 8px 20px rgba(0,0,0,.2); }
  .whiweb-showcase-section .ww-login-field { padding: .35rem .5rem; color: #475569; text-align: left; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: .5rem; font: .6rem monospace; }
  .whiweb-showcase-section .ww-login-label { display: block; margin-bottom: .15rem; color: #94a3b8; font-size: .5rem; font-weight: 700; text-align: left; text-transform: uppercase; }
  .whiweb-showcase-section .ww-login-button { width: 100%; padding: .45rem; color: white; background: #2563eb; border: 0; border-radius: .5rem; font-size: .65rem; font-weight: 800; animation: ww-button 8s infinite; }
  .whiweb-showcase-section .ww-success { position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: .25rem; color: white; background: #059669; border-radius: 1rem; opacity: 0; pointer-events: none; animation: ww-success 8s infinite; }
  .whiweb-showcase-section .ww-phonebar { padding: .4rem .5rem; margin-top: .5rem; border: 1px solid #1e293b; border-radius: .7rem; }
  .whiweb-showcase-section .ww-tablet-frame { padding: .65rem; background: #161c26; border: 4px solid #283245; border-radius: 2rem; box-shadow: 0 20px 40px rgba(0,0,0,.8); }
  .whiweb-showcase-section .ww-tablet-screen { min-height: 380px; padding: .55rem; overflow: hidden; color: #e2e8f0; background: #0b0f19; border: 1px solid #1e293b; border-radius: 1.4rem; font-size: .65rem; }
  .whiweb-showcase-section .ww-tablet-content { padding: .65rem; color: #1e293b; background: #f8fafc; border-radius: .75rem; }
  .whiweb-showcase-section .ww-mini-grid { display: grid; grid-template-columns: repeat(2,minmax(0,1fr)); gap: .4rem; }
  .whiweb-showcase-section .ww-mini-card { display: flex; align-items: center; gap: .4rem; min-width: 0; padding: .4rem; color: #475569; background: #fff; border: 1px solid #e2e8f0; border-radius: .5rem; font-size: .6rem; font-weight: 700; }
  .whiweb-showcase-section .ww-footer { max-width: 64rem; padding: 1.5rem; margin: 1rem auto 0; }
  .whiweb-showcase-section .ww-feature-icon { display: inline-flex; align-items: center; justify-content: center; width: 2.5rem; height: 2.5rem; flex: 0 0 auto; border-radius: .75rem; font-size: 1.15rem; }
  .whiweb-showcase-section .ww-cursor { position: absolute; z-index: 6; pointer-events: none; filter: drop-shadow(0 2px 4px rgba(0,0,0,.4)); animation: ww-cursor 12s infinite cubic-bezier(.4,0,.2,1); }
  .whiweb-showcase-section.is-paused *, .whiweb-showcase-section.is-paused *::before, .whiweb-showcase-section.is-paused *::after { animation-play-state: paused !important; }
  @keyframes ww-ping { 70%,100% { box-shadow: 0 0 0 7px rgba(52,211,153,0); } 0% { box-shadow: 0 0 0 0 rgba(52,211,153,.55); } }
  @keyframes ww-cursor { 0%,100% { top:75%; left:80%; opacity:0; } 10% { opacity:1; } 30% { top:68%; left:34%; } 50% { top:32%; left:32%; } 75% { top:85%; left:88%; } 90% { opacity:1; } }
  @keyframes ww-highlight-theme { 0%,28%,52%,100% { border-color:#e2e8f0; background:#fff; } 32%,48% { border-color:#6366f1; background:#eef2ff; box-shadow:0 0 12px rgba(99,102,241,.3); } }
  @keyframes ww-highlight-slider { 0%,50%,76%,100% { border-color:#e2e8f0; background:#fff; } 54%,72% { border-color:#6366f1; background:#eef2ff; box-shadow:0 0 12px rgba(99,102,241,.3); } }
  @keyframes ww-toast { 0%,70%,100% { transform:translateY(120%); opacity:0; } 75%,95% { transform:translateY(0); opacity:1; } }
  @keyframes ww-button { 0%,58%,95%,100% { transform:scale(1); background:#2563eb; } 62% { transform:scale(.95); background:#1d4ed8; } 66%,85% { transform:scale(1); background:#16a34a; } }
  @keyframes ww-success { 0%,62%,90%,100% { opacity:0; } 66%,85% { opacity:1; } }
  @media (max-width: 767.98px) {
    .whiweb-showcase-section { padding: 1.5rem 1rem; }
    .whiweb-showcase-section .ww-scene { min-height: 580px; }
    .whiweb-showcase-section .ww-screen { min-height: 460px; }
    .whiweb-showcase-section .ww-sidebar { flex-basis: 10rem; padding: .6rem; }
    .whiweb-showcase-section .ww-dashboard { padding: .65rem; }
    .whiweb-showcase-section .ww-phone { left: -.35rem; width: 190px; }
    .whiweb-showcase-section .ww-tablet { right: -.35rem; width: 220px; }
    .whiweb-showcase-section .ww-device-screen { min-height: 360px; padding: .55rem; }
    .whiweb-showcase-section .ww-tablet-screen { min-height: 340px; }
    .whiweb-showcase-section .ww-footer { padding: 1rem; }
  }
  @media (max-width: 575.98px) {
    .whiweb-showcase-section .ww-scene { min-height: 520px; }
    .whiweb-showcase-section .ww-screen { min-height: 420px; }
    .whiweb-showcase-section .ww-sidebar { display: none; }
    .whiweb-showcase-section .ww-phone { width: 155px; }
    .whiweb-showcase-section .ww-tablet { width: 185px; }
    .whiweb-showcase-section .ww-device-screen { min-height: 310px; }
    .whiweb-showcase-section .ww-tablet-screen { min-height: 290px; }
    .whiweb-showcase-section .ww-control-btn { padding: .4rem .5rem; }
  }
</style>

<section class="whiweb-showcase-section container-fluid mx-auto" aria-labelledby="whiweb-showcase-title">
  <div class="ww-glow"></div>
  <header class="position-relative text-center mb-4">
    <div class="ww-kicker"><span class="ww-live-dot"></span>Sistema WhiWeb 2026 • Live Interactive Demo</div>
    <h2 id="whiweb-showcase-title" class="ww-title">Gerenciamento Multiplataforma <span class="ww-gradient-text">Em Tempo Real</span></h2>
    <p class="ww-intro">Interface responsiva replicada em HTML/CSS/JS. Veja a interação simulada entre MacBook, iPhone e Tablet do ecossistema WhiWeb.</p>
  </header>

  <div class="ww-controls ww-glass d-flex align-items-center justify-content-between gap-2">
    <button type="button" id="btnToggleAnim" class="ww-control-btn primary"><i id="animIcon" class="bi bi-pause-fill"></i><span id="animStatusText">Pausar Animações</span></button>
    <div class="d-flex align-items-center gap-2">
      <button type="button" id="btnTriggerToast" class="ww-control-btn"><i class="bi bi-bell-fill text-success"></i>Disparar Login</button>
      <button type="button" id="btnReset" class="ww-control-btn" title="Reiniciar fluxo" aria-label="Reiniciar fluxo"><i class="bi bi-arrow-clockwise"></i></button>
    </div>
  </div>

  <div class="ww-scene">
    <div class="ww-macbook">
      <div class="ww-laptop-bezel">
        <span class="ww-webcam"></span>
        <div class="ww-screen">
          <div class="ww-cursor" aria-hidden="true"><svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M3 3L10.07 19.97L12.58 12.58L19.97 10.07L3 3Z" fill="#6366F1" stroke="#fff" stroke-width="2" stroke-linejoin="round"/></svg></div>
          <div class="ww-browserbar">
            <div class="ww-dots"><i></i><i></i><i></i></div>
            <div class="d-flex align-items-center gap-2 flex-grow-1 justify-content-center">
              <div class="d-flex gap-2 text-secondary"><i class="bi bi-chevron-left"></i><i class="bi bi-chevron-right"></i><i class="bi bi-sidebar-reverse"></i></div>
              <div class="ww-url"><i class="bi bi-lock-fill text-success"></i><span>whi.localhost</span><i class="bi bi-arrow-clockwise ms-auto text-secondary"></i></div>
            </div>
            <div class="ww-browser-icons"><i class="bi bi-share"></i><i class="bi bi-plus-lg"></i><i class="bi bi-square-stack"></i></div>
          </div>
          <div class="ww-app">
            <aside class="ww-sidebar">
              <div>
                <div class="ww-brand-row"><span class="ww-logo">W<span class="text-info">+</span></span><div><span class="ww-brand d-block">WHIWEB</span><span class="ww-brand-sub">Plataforma</span></div></div>
                <div class="ww-nav-label">Listagem</div>
                <a href="#" class="ww-nav-link active"><span><i class="bi bi-house-door-fill me-2"></i>Home</span><span>3</span></a>
                <a href="#" class="ww-nav-link"><span><i class="bi bi-info-circle me-2"></i>Sobre Nós</span><span>3</span></a>
                <a href="#" class="ww-nav-link"><span><i class="bi bi-envelope me-2"></i>Contato</span><span>2</span></a>
                <div class="ww-nav-label">Segurança e Acesso</div>
                <a href="#" class="ww-nav-link"><span><i class="bi bi-shield-check me-2"></i>Controle</span><span>2</span></a>
              </div>
              <div class="ww-user"><span class="ww-avatar">WO</span><div><div class="text-light">Wagner Oliveira</div><small class="text-success">● Admin Online</small></div></div>
            </aside>
            <main class="ww-dashboard">
              <div>
                <div class="ww-dash-nav"><div><strong class="text-dark">Painel Gerenciador</strong><small class="d-block text-secondary">Bem-vindo de volta, Wagner</small></div><div class="d-flex align-items-center gap-3 text-secondary"><i class="bi bi-search"></i><i class="bi bi-bell"></i><span class="ww-avatar">WO</span></div></div>
                <div class="d-flex align-items-center justify-content-between mb-3"><div><div class="fw-bold text-dark">Módulos do Sistema</div><small class="text-secondary">Gerencie o conteúdo da sua plataforma</small></div><span class="badge text-bg-primary">Visão geral</span></div>
                <section class="mb-3"><h3 class="ww-section-title"><i class="bi bi-grid-fill text-primary me-1"></i>Conteúdo do Site</h3><div class="ww-dashboard-grid">
                  <div class="ww-dash-card ww-module-slider"><span class="ww-card-icon"><i class="bi bi-images"></i></span><div><h4 class="ww-card-title">Sliders</h4><p class="ww-card-copy">Banners e destaques</p></div><i class="bi bi-chevron-right text-primary ms-auto"></i></div>
                  <div class="ww-dash-card"><span class="ww-card-icon"><i class="bi bi-list-ul"></i></span><div><h4 class="ww-card-title">Tópicos</h4><p class="ww-card-copy">Conteúdo principal</p></div><i class="bi bi-chevron-right text-secondary ms-auto"></i></div>
                  <div class="ww-dash-card"><span class="ww-card-icon"><i class="bi bi-person-lines-fill"></i></span><div><h4 class="ww-card-title">Serviços</h4><p class="ww-card-copy">Serviços oferecidos</p></div><i class="bi bi-chevron-right text-secondary ms-auto"></i></div>
                  <div class="ww-dash-card"><span class="ww-card-icon"><i class="bi bi-grid-fill"></i></span><div><h4 class="ww-card-title">Galeria</h4><p class="ww-card-copy">Imagens e projetos</p></div><i class="bi bi-chevron-right text-secondary ms-auto"></i></div>
                  <div class="ww-dash-card"><span class="ww-card-icon"><i class="bi bi-question-circle-fill"></i></span><div><h4 class="ww-card-title">Sobre Nós</h4><p class="ww-card-copy">Nossa história</p></div><i class="bi bi-chevron-right text-secondary ms-auto"></i></div>
                  <div class="ww-dash-card"><span class="ww-card-icon"><i class="bi bi-display"></i></span><div><h4 class="ww-card-title">Contato</h4><p class="ww-card-copy">Canais de atendimento</p></div><i class="bi bi-chevron-right text-secondary ms-auto"></i></div>
                </div></section>
                <section class="mb-3"><h3 class="ww-section-title"><i class="bi bi-shield-lock text-primary me-1"></i>Segurança e Controle de Acesso</h3><div class="ww-dashboard-grid"><div class="ww-dash-card"><span class="ww-card-icon"><i class="bi bi-people-fill"></i></span><div><h4 class="ww-card-title">Usuários</h4><p class="ww-card-copy">Permissões de equipe</p></div><i class="bi bi-chevron-right text-secondary ms-auto"></i></div></div></section>
                <section><h3 class="ww-section-title"><i class="bi bi-palette-fill text-primary me-1"></i>Configuração do Tema</h3><div class="ww-dashboard-grid"><div class="ww-dash-card ww-module-theme"><span class="ww-card-icon"><i class="bi bi-paint-bucket"></i></span><div><h4 class="ww-card-title">Configuração do Tema</h4><p class="ww-card-copy">Cores, fontes e logo</p></div><i class="bi bi-chevron-right text-primary ms-auto"></i></div></div></section>
              </div>
              <div class="ww-dashboard-footer"><span>2026 © WHI - Web de Alta Inspiração</span><strong class="text-primary">v3.42 Pro</strong></div>
              <div id="macToast" class="ww-toast"><span class="rounded-circle bg-white bg-opacity-25 px-2 py-1"><i class="bi bi-check-lg"></i></span><span><strong class="d-block">Sucesso</strong><small>Login realizado com êxito!</small></span></div>
            </main>
          </div>
        </div>
      </div>
      <div class="ww-laptop-base"><span class="ww-hinge"></span><span class="ww-laptop-name">MacBook Air</span></div>
    </div>

    <div class="ww-phone">
      <div class="ww-device-frame"><div class="ww-device-screen">
        <div class="ww-notch"><span>12:16</span><span><i class="bi bi-wifi"></i> <i class="bi bi-battery-full text-success"></i></span></div>
        <div class="ww-login-card">
          <div class="d-flex align-items-center justify-content-center gap-2 mb-2"><span class="ww-logo">W</span><span class="ww-brand text-dark">WHIWEB</span></div>
          <strong class="d-block">Acessar conta</strong><small class="text-secondary">Informe seus dados para continuar</small>
          <div class="my-3"><label class="ww-login-label">E-mail</label><div class="ww-login-field"><span class="ww-typing-email">seu@email.com</span></div></div>
          <div class="mb-3"><label class="ww-login-label">Senha</label><div class="ww-login-field d-flex justify-content-between"><span class="ww-typing-pass">••••••••</span><i class="bi bi-eye"></i></div></div>
          <div class="d-flex justify-content-between mb-3 text-secondary" style="font-size:.55rem"><span>☑ Manter conectado</span><a href="#" class="text-primary text-decoration-none">Esqueceu a senha?</a></div>
          <button class="ww-login-button">Entrar <i class="bi bi-arrow-right"></i></button>
          <div class="ww-success"><i class="bi bi-check-circle-fill fs-3"></i><strong>Login Efetuado!</strong><small>Redirecionando ao painel...</small></div>
          <div class="mt-3 text-secondary"><i class="bi bi-shield-lock-fill text-success"></i> Ambiente seguro</div>
        </div>
        <div class="ww-phonebar"><span>whi.localhost</span><span><i class="bi bi-book me-2"></i><i class="bi bi-square-stack"></i></span></div>
        <span class="d-block mx-auto mt-2 bg-secondary rounded-pill" style="width:4rem;height:4px"></span>
      </div></div>
    </div>

    <div class="ww-tablet">
      <div class="ww-tablet-frame"><div class="ww-tablet-screen">
        <div class="ww-tabletbar rounded-3 border mb-2"><span><span class="ww-logo">W</span> <i class="bi bi-list ms-2"></i></span><span><i class="bi bi-search me-2"></i>🇧🇷 <i class="bi bi-bell text-info ms-2"></i> <span class="ww-avatar">WO</span></span></div>
        <div class="ww-tablet-content">
          <div class="d-flex justify-content-between align-items-center mb-2"><div><strong class="d-block">Painel Gerenciador</strong><small class="text-secondary">Visão otimizada em Tablet</small></div><span class="badge text-bg-primary">Pro</span></div>
          <div class="ww-mini-grid mb-2">
            <div class="ww-mini-card"><i class="bi bi-images text-primary"></i>Sliders</div><div class="ww-mini-card"><i class="bi bi-list-ul text-primary"></i>Tópicos</div>
            <div class="ww-mini-card"><i class="bi bi-person-lines-fill text-primary"></i>Serviços</div><div class="ww-mini-card"><i class="bi bi-grid-fill text-primary"></i>Galeria</div>
            <div class="ww-mini-card"><i class="bi bi-question-circle-fill text-primary"></i>Sobre Nós</div><div class="ww-mini-card"><i class="bi bi-display text-primary"></i>Contato</div>
          </div>
          <small class="d-block text-secondary fw-bold text-uppercase mb-1">Segurança</small>
          <div class="ww-mini-grid mb-2"><div class="ww-mini-card"><i class="bi bi-clipboard-data text-primary"></i>Auditoria</div><div class="ww-mini-card"><i class="bi bi-people-fill text-primary"></i>Permissões</div></div>
          <div class="ww-mini-card bg-primary-subtle border-primary-subtle text-primary-emphasis"><i class="bi bi-paint-bucket text-primary"></i>Configuração do Tema</div>
        </div>
        <span class="d-block mx-auto mt-2 bg-secondary rounded-pill" style="width:5rem;height:4px"></span>
      </div></div>
    </div>
  </div>

  <footer class="ww-footer ww-glass">
    <div class="row g-4 text-center text-md-start">
      <div class="col-12 col-md-4 d-flex align-items-start gap-3"><span class="ww-feature-icon text-primary bg-primary bg-opacity-10"><i class="bi bi-laptop"></i></span><div><h3 class="h6 fw-bold text-white">Totalmente Responsivo</h3><p class="small text-secondary mb-0">Layout adapta-se a qualquer resolução de tela mantendo a mesma facilidade de uso.</p></div></div>
      <div class="col-12 col-md-4 d-flex align-items-start gap-3"><span class="ww-feature-icon text-info bg-info bg-opacity-10"><i class="bi bi-lightning-charge-fill"></i></span><div><h3 class="h6 fw-bold text-white">Animações de Navegação</h3><p class="small text-secondary mb-0">Simulação interativa de cliques, digitação e avisos com transição suave.</p></div></div>
      <div class="col-12 col-md-4 d-flex align-items-start gap-3"><span class="ww-feature-icon text-success bg-success bg-opacity-10"><i class="bi bi-shield-check"></i></span><div><h3 class="h6 fw-bold text-white">Painel WhiWeb 2026</h3><p class="small text-secondary mb-0">Pronto para ser integrado à sua landing page ou documentação de produto.</p></div></div>
    </div>
  </footer>
</section>

<script>
(() => {
  const section = document.querySelector('.whiweb-showcase-section');
  if (!section) return;

  const toggleButton = section.querySelector('#btnToggleAnim');
  const icon = section.querySelector('#animIcon');
  const status = section.querySelector('#animStatusText');
  const toast = section.querySelector('#macToast');
  let isAnimated = true;

  toggleButton.addEventListener('click', () => {
    isAnimated = !isAnimated;
    section.classList.toggle('is-paused', !isAnimated);
    icon.className = isAnimated ? 'bi bi-pause-fill' : 'bi bi-play-fill';
    status.textContent = isAnimated ? 'Pausar Animações' : 'Retomar Animações';
  });

  section.querySelector('#btnTriggerToast').addEventListener('click', () => {
    toast.style.animation = 'none';
    void toast.offsetHeight;
    toast.style.animation = '';
  });

  section.querySelector('#btnReset').addEventListener('click', () => {
    section.classList.remove('is-paused');
    isAnimated = true;
    icon.className = 'bi bi-pause-fill';
    status.textContent = 'Pausar Animações';
    section.querySelectorAll('.ww-toast,.ww-cursor,.ww-module-theme,.ww-module-slider,.ww-success,.ww-login-button').forEach((element) => {
      element.style.animation = 'none';
      void element.offsetHeight;
      element.style.animation = '';
    });
  });
})();
</script>



    @if (isset($advantages) && $advantages->count())
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

              @foreach($advantages as $advantage)
                  @php
                      // Verifica se a iteração é par ou ímpar para alternar os lados do layout
                      $isEven = $loop->iteration % 2 === 0;
                  @endphp

                  <div class="row service_blocks {{ !$isEven ? 'flex-row-reverse' : '' }} {{ $loop->last ? 'no_bottom_padding' : '' }}">
                      
                      <!-- Coluna de Texto -->
                      <div class="col-md-6">
                          <div class="service_text {{ !$isEven ? 'right_side' : '' }}">

                              @if(!empty($advantage->tag))
                                  <span class="title_badge">{{ $advantage->tag }}</span>
                              @endif

                              <h3 class="text-white">{{ $advantage->title }}</h3>
                              <p class="text-white">{{ $advantage->description }}</p>

                              @if(!empty($advantage->text))
                                @php
                                    $content = $advantage->text;
                                    // Verifica se o texto vindo do CMS contém tags <ul> ou <li>
                                    $hasListTags = preg_match('/<\/?(ul|li)[^>]*>/i', $content);
                                @endphp

                                @if($hasListTags)
                                    {{-- Caso o CMS envie HTML com <ul>/<li> (Editor WYSIWYG) --}}
                                    @php
                                        // Adiciona a classe do seu layout à tag <ul>
                                        $formattedHtml = preg_replace('/<ul([^>]*)>/i', '<ul$1 class="design_block py-3 px-0">', $content);
                                        
                                        // Adiciona os ícones e as classes Bootstrap às tags <li>
                                        $formattedHtml = preg_replace(
                                            '/<li([^>]*)>(.*?)<\/li>/is', 
                                            '<li$1 class="d-flex gap-2 justify-content-start align-items-center"><i class="bi bi-check-circle"></i> $2</li>', 
                                            $formattedHtml
                                        );
                                    @endphp

                                    {!! $formattedHtml !!}

                                    @else
                                        {{-- Caso seja texto simples digitado linha por linha --}}
                                        @php
                                            $items = array_filter(array_map('trim', explode("\n", $content)));
                                        @endphp

                                        @if(!empty($items))
                                            <ul class="design_block py-3 px-0">
                                                @foreach($items as $item)
                                                    <li class="d-flex gap-2 justify-content-start align-items-center">
                                                        <i class="bi bi-check-circle"></i>
                                                        {{ $item }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endif
                                @endif

                              <div class="btn_block">
                                  <a href="{{ $advantage->button_url ?? '#plans' }}" class="bg-button-two color-button-two px-3 py-2 rounded-3">
                                      <span>
                                          {{ $advantage->button_text ?? 'Começar agora' }}
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5">
                                              <path d="M5 12h14"></path>
                                              <path d="m12 5 7 7-7 7"></path>
                                          </svg>
                                      </span> 
                                  </a>
                              </div>

                          </div>
                      </div>

                      <!-- Coluna de Imagem -->
                      <div class="col-md-6">
                          <div class="inner_block {{ !$isEven ? 'dark_bg rotate_right' : '' }}">
                              <div class="img">
                                  <img src="{{ asset('storage/' . $advantage->path_image) }}" 
                                      alt="{{ $advantage->title }}" 
                                      loading="lazy" 
                                      width="{{ $dimensions[0] ?? 200 }}" 
                                      height="{{ $dimensions[1] ?? 60 }}" 
                                      style="max-width:100%;height:auto;">
                              </div>
                          </div>
                      </div>

                  </div>
              @endforeach
          </div>

          <div class="blure_shape bg-secondary-color bs_1"> </div> 
      </section>
      <!-- Service Section End -->
    @endif

    <section id="templates" class="tpl-modal-sec">
      <div class="container">
        <!-- Div de topo (Sem tag header para não colidir) -->
        <div class="tpl-header-block">
          <div class="tpl-header-left col-12 col-lg-8">
            <div class="tpl-badge">
              <i class="bi bi-intersect"></i> Modelos Prontos
            </div>
            <h2>Modelos prontos pensados para o seu segmento. <br><span>Adaptados com a cara do seu negócio. </span></h2>
          </div>

          <div class="tpl-header-right col-12 col-lg-4">
            <p>Escolha a estrutura ideal para sua empresa ou deixe que nossa equipe recomende o modelo perfeito. Navegue pelos cards para ver os detalhes de cada um.</p>
            <a href="{{ route('templates') }}">
            <div class="tpl-scroll-hint">
                Ver todos os templates<i class="bi bi-arrow-right"></i>
              </div>
            </a>
          </div>
        </div>

        <!-- Trilho de Rolagem -->
        <div class="tpl-scroll-track">

          <!-- Item 1 -->
          @foreach($templateThemes as $templateTheme)
            @php
                $preview = $templateTheme['preview'] ?? null;

                if (is_string($preview)) {
                    $previews = json_decode($preview, true) ?? [];
                } elseif (is_array($preview)) {
                    $previews = $preview;
                } else {
                    $previews = [];
                }

                $previewImage = $previews[0] ?? null;
                $countPreviews = count($previews);
            @endphp
            <article class="tpl-card">
              <div class="tpl-card-topbar">
                <div class="tpl-dots"><span></span><span></span><span></span></div>
                <span class="tpl-tag">                  
                  {{ match ($templateTheme->layout_type) {
                      'onepage' => 'Página Única',
                      'multipage' => 'Múltiplas Páginas',
                      default => $templateThemeInner->layout_type,
                  } }}
                </span>
              </div>
              <div class="tpl-preview">
                <img src="{{ asset('storage') .'/'. $previewImage }}" alt="{{ $templateTheme->name }}" loading="lazy">
                <div class="tpl-overlay">
                  <a href="{{ route('template', ['slug' => $templateTheme->slug, 'templateVariation' => $templateTheme->template_variation]) }}" class="tpl-btn-preview bg-secondary"><i data-lucide="eye" style="width: 14px; height: 14px;"></i> Ver Detalhe</a>
                </div>
              </div>
              <div class="tpl-card-body">
                <div>
                    <span class="tpl-category">{{ is_object($templateTheme) ? $templateTheme->title : $templateTheme['title'] }}</span>
                    <div class="d-flex align-items-center gap-2 text-secondary" style="font-size: 0.75rem;">
                        @if ($countPreviews )                          
                          <span class="d-flex align-items-center gap-1">
                              <i data-lucide="layers" style="width: 14px; height: 14px;"></i>
                              {{ $countPreviews }} Páginas
                          </span>
                        @endif
                        @if ($templateTheme->technology <> null)                          
                          <span class="d-flex align-items-center gap-1 d-none">
                              <i data-lucide="code-2" style="width: 14px; height: 14px;"></i>
                              {{ strtoupper($templateTheme->technology ?? '') }}
                          </span>
                        @endif
                    </div>
                </div>
                <div class="tpl-arrow"><i class="bi bi-arrow-up-right"></i></div>
              </div>
            </article>
          @endforeach

        </div>

        <!-- Banner Inferior -->
        <div class="tpl-cta">
          <div class="tpl-cta-text">
            <h4>Sua empresa precisa de um site sob medida do zero?</h4>
            <p>Conheça os serviços de desenvolvimento exclusivo da Agência WHI e crie um projeto único para o seu negócio.</p>
          </div>
          @php
              $phone = preg_replace('/\D/', '', $contact->whatsapp);
              $mensagem = "Olá! Encontrei seu site e gostaria de conhecer mais sobre as condições para projetos exclusivos.";
          @endphp
          <a href="https://wa.me/55{{ $phone }}?text={{ $mensagem }}" target="_blank" rel="noopener noreferrer" class="tpl-cta-btn">Solicitar Projeto Exclusivo</a>
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
    
    @if ((isset($sections['testimonial']) && $sections <> null) ||
      (!empty($depoiments) && count($depoiments) > 0))
      <section class="testimonials-section" id="review_sec">
        <div class="container position-relative z-1">
          
          <!-- Cabeçalho -->
          <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
              <span class="testimonials-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                {{ $sections['testimonial']->tag }}
              </span>
              <h2 class="testimonials-title">{{ $sections['testimonial']->title }}</h2>
            </div>
          </div>

          <!-- Estatísticas de Impacto (Novidade Visual) -->
          @if (isset($benefitTopics) && $benefitTopics->count())
            <div class="row metrics-banner align-items-center text-center mb-5">
              @foreach($benefitTopics as $parametro)            
                <div class="col-6 col-md-3 mb-3 mb-md-0">
                  <div class="metric-number">{{$parametro->number}}</div>
                  <p class="metric-label">{{$parametro->title}}</p>
                </div>
              @endforeach
            </div>
          @endif

          <!-- Slider de Depoimentos (Swiper) -->
          @if (isset($depoiments) && $depoiments->count())
            <div class="swiper testimonialSwiper mb-5">
              <div class="swiper-wrapper py-3">

                <!-- Card 1 -->
                @foreach ($depoiments as $depoiment)
                  <div class="swiper-slide">
                    <div class="testimonial-card">
                      <svg class="testimonial-quote-icon" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                      <div class="rating-stars">★★★★★</div>
                      <div class="testimonial-text">
                          {!!$depoiment->text!!}
                      </div>
                      <div class="author-wrapper">
                        @if ($depoiment->path_image <> null) 
                          <img src="{{asset('storage/' . $depoiment->path_image)}}" alt="{{$depoiment->name}}" class="author-avatar" loading="lazy">
                        @endif
                        <div>
                          <h3 class="author-name">{{$depoiment->name}}</h3>
                          <p class="author-role">{{$depoiment->function}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach

              </div>
            </div>
          @endif

          <!-- Chamada para Ação CTA -->
          <div class="btn_block text-center">
              <a href="#plans" class="bg-button-two color-button-two px-3 py-2 rounded-3 ">
                <span>
                  Começar agora
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                </span>
              </a>
          </div>

        </div>
      </section>
    @endif

    @if (isset($contractedPlans) && $contractedPlans->count())
      <section class="pricing-section" id="plans">
        <div class="container">
          
          <!-- Cabeçalho -->
          <div class="row justify-content-center text-center">
            <div class="col-lg-8">
              <span class="pricing-badge">Planos e Preços</span>
              <h2 class="pricing-title">Escolha o plano ideal para escalar o seu negócio</h2>
              <p class="pricing-subtitle mb-5">Um serviço completo, com preço transparente, sem taxas escondidas e condições claras de contratação.</p>
              
              <!-- Toggle Mensal / Anual (Desabilitado) -->
              <div class="pricing-toggle-wrapper flex-wrap opacity-75 opacity-100-hover d-none">
                <span class="toggle-label text-muted" id="label-monthly" style="cursor: not-allowed;">Cobrança Mensal</span>
                <div class="form-check form-switch p-0 m-0">
                  <input 
                    class="form-check-input pricing-switch" 
                    type="checkbox" 
                    id="pricingToggle"
                    aria-labelledby="label-monthly label-yearly"
                    checked 
                    disabled
                  >
                </div>
                <span class="toggle-label active" id="label-yearly" style="cursor: default;">
                  Cobrança Anual
                  <span class="discount-badge d-none">-20% OFF</span>
                </span>
              </div>
            </div>
          </div>

          <!-- Cards de Planos -->
          <div class="row g-4 align-items-stretch justify-content-center">

            @foreach($contractedPlans as $plan)
                @php
                    $phone = preg_replace('/\D/', '', $contact->whatsapp);
                    
                    // 1. Converte entidades HTML (&aacute;, &eacute;, etc.) de volta para caracteres acentuados
                    $textDecodificado = html_entity_decode($plan->text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                    
                    // 2. Extrai os itens <li> e formata como tópicos com hífem
                    $featuresLimpo = str_replace(["\r", "\n"], '', $textDecodificado);
                    $featuresLimpo = str_replace('<li>', "\n- ", str_replace('</li>', '', $featuresLimpo));
                    $featuresLimpo = strip_tags($featuresLimpo); // Remove a tag <ul> restante

                    // 3. Converte também eventuais acentos no nome do plano
                    $nomePlano = html_entity_decode($plan->name, ENT_QUOTES | ENT_HTML5, 'UTF-8');

                    // 4. Monta a mensagem final sem caracteres estranhos
                    $textoMensagem = "*WHI WEB | Suporte ao Cliente*". "\n\n"
                                  ."Olá! Tenho interesse no plano *" . $nomePlano . "* (R$ " . number_format($plan->price, 2, ',', '.') . "/mês).\n\n"
                                  . "*Recursos incluídos:*" . $featuresLimpo . "\n\n"
                                  . "Gostaria de obter mais informações sobre como assinar.";
                                  
                    $mensagemUrl = urlencode($textoMensagem);
                    $precoMensal = number_format((float) $plan->monthly_price, 2, ',', '.');
                    $precoAnual = number_format((float) $plan->price, 2, ',', '.');
                @endphp

                <div class="col-lg-4 col-md-6">
                  <div class="plan-card px-4 {{ $plan->popular == 1 ? 'popular' : '' }}">
                    @if ($plan->popular == 1)                  
                      <span class="popular-badge">Mais Popular</span>
                    @endif
                    
                    <div>
                      <h3 class="plan-name">{{ $plan->name }}</h3>
                      <div class="plan-description">{{ $plan->description }}</div>
                      
                      <div class="plan-price-wrapper">
                        <span class="currency">R$</span>
                        <span class="amount" data-monthly="{{ $precoMensal }}" data-yearly="{{ $precoAnual }}">{{ $precoAnual }}</span>
                        <span class="period">/mês</span>
                      </div>

                      <div class="plan-features">
                        {!! $plan->text !!}
                      </div>
                    </div>

                    <a href="https://wa.me/55{{ $phone }}?text={{ $mensagemUrl }}" 
                      target="_blank" 
                      rel="noopener noreferrer" 
                      class="btn-plan {{ $plan->popular == 1 ? 'btn-plan-primary' : 'btn-plan-outline' }}">
                      Assinar {{ $plan->name }}
                    </a>
                  </div>
                </div>
            @endforeach

          </div>
        </div>
      </section>
    @endif

    @if (isset($sessaoFaq) && $sessaoFaq <> null || isset($faqs) && $faqs->count())
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
                  <div class="support-icon {{ $isFull ? 'm-auto mb-2' : 'm-0 mb-2' }}">
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
    @endif

@endsection
