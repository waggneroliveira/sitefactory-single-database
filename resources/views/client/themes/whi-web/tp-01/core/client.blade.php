<!DOCTYPE html>
<html lang="pt-BR">
<head>
    @php
        $seoTitle = $seoGoogle->title ?? '';
        $seoDescription = $seoGoogle->description ?? '';
        $seoKeywords = $seoGoogle->keywords ?? '';

        $socialImage = !empty($seoGoogle->social_image) ? asset('storage/' . $seoGoogle->social_image) : null;
        $organizationLogo = !empty($seoGoogle->organization_logo) ? asset('storage/' . $seoGoogle->organization_logo) : null;
        $favicon = !empty($seoGoogle->favicon) ? asset('storage/' . $seoGoogle->favicon) : null;

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => '#organization',
        ];

        if (!empty($seoGoogle->organization_name)) $schema['name'] = $seoGoogle->organization_name;
        if (!empty($seoGoogle->legal_name)) $schema['legalName'] = $seoGoogle->legal_name;
        if (!empty($seoGoogle->organization_url)) $schema['url'] = $seoGoogle->organization_url;

        if ($organizationLogo) {
            $schema['logo'] = $organizationLogo;
            $schema['image'] = $organizationLogo;
        } elseif ($socialImage) {
            $schema['logo'] = $socialImage;
            $schema['image'] = $socialImage;
        }

        if (!empty($seoGoogle->organization_description)) $schema['description'] = $seoGoogle->organization_description;

        if (!empty($seoGoogle->founding_date)) {
            $schema['foundingDate'] = $seoGoogle->founding_date instanceof \Carbon\Carbon ? $seoGoogle->founding_date->format('Y-m-d') : $seoGoogle->founding_date;
        }

        if (!empty($seoGoogle->email)) $schema['email'] = $seoGoogle->email;
        if (!empty($seoGoogle->telephone)) $schema['telephone'] = $seoGoogle->telephone;

        $address = [];

        if (!empty($seoGoogle->street_address)) $address['streetAddress'] = $seoGoogle->street_address;
        if (!empty($seoGoogle->address_locality)) $address['addressLocality'] = $seoGoogle->address_locality;
        if (!empty($seoGoogle->address_region)) $address['addressRegion'] = $seoGoogle->address_region;
        if (!empty($seoGoogle->postal_code)) $address['postalCode'] = $seoGoogle->postal_code;
        if (!empty($seoGoogle->address_country)) $address['addressCountry'] = $seoGoogle->address_country;

        if (!empty($address)) $schema['address'] = array_merge(['@type' => 'PostalAddress'], $address);

        $contactPoint = [];

        if (!empty($seoGoogle->telephone)) $contactPoint['telephone'] = $seoGoogle->telephone;
        if (!empty($seoGoogle->contact_type)) $contactPoint['contactType'] = $seoGoogle->contact_type;
        if (!empty($seoGoogle->email)) $contactPoint['email'] = $seoGoogle->email;
        if (!empty($seoGoogle->area_served)) $contactPoint['areaServed'] = $seoGoogle->area_served;

        if (!empty($seoGoogle->available_languages)) {
            $languages = is_array($seoGoogle->available_languages) ? $seoGoogle->available_languages : array_map('trim', explode(',', $seoGoogle->available_languages));
            $languages = array_values(array_filter($languages));
            if (!empty($languages)) $contactPoint['availableLanguage'] = $languages;
        }

        if (!empty($contactPoint)) $schema['contactPoint'] = array_merge(['@type' => 'ContactPoint'], $contactPoint);

        if (!empty($seoGoogle->opening_hours)) {
            $openingHours = $seoGoogle->opening_hours;

            if (is_string($openingHours)) {
                $decodedOpeningHours = json_decode($openingHours, true);
                if (json_last_error() === JSON_ERROR_NONE) $openingHours = $decodedOpeningHours;
            }

            if (!empty($openingHours)) $schema['openingHoursSpecification'] = $openingHours;
        }

        if (!empty($seoGoogle->slogan)) $schema['slogan'] = $seoGoogle->slogan;

        if (!empty($seoGoogle->organization_keywords)) {
            $organizationKeywords = is_array($seoGoogle->organization_keywords) ? $seoGoogle->organization_keywords : array_map('trim', explode(',', $seoGoogle->organization_keywords));
            $organizationKeywords = array_values(array_filter($organizationKeywords));
            if (!empty($organizationKeywords)) $schema['keywords'] = $organizationKeywords;
        }
    @endphp

    <title>{{ isset($blogInner) && !empty($blogInner->title) ? $blogInner->title : $seoTitle }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    @if(isset($blogInner))
        @php
            $blogDescription = Str::limit(strip_tags($blogInner->text ?? $seoDescription), 150);
            $blogImage = !empty($blogInner->path_image_thumbnail) ? asset('storage/' . $blogInner->path_image_thumbnail) : $socialImage;
        @endphp

        @if(!empty($blogDescription))
            <meta name="description" content="{{ $blogDescription }}">
        @endif

        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $blogInner->title ?? $seoTitle }}">
        <meta property="og:description" content="{{ $blogDescription }}">

        @if($blogImage)
            <meta property="og:image" content="{{ $blogImage }}">
        @endif

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="{{ $blogInner->title ?? $seoTitle }}">
        <meta name="twitter:description" content="{{ $blogDescription }}">

        @if($blogImage)
            <meta name="twitter:image" content="{{ $blogImage }}">
        @endif
    @else
        @if(!empty($seoDescription))
            <meta name="description" content="{{ $seoDescription }}">
        @endif

        @if(!empty($seoKeywords))
            <meta name="keywords" content="{{ $seoKeywords }}">
        @endif

        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $seoTitle }}">
        <meta property="og:description" content="{{ $seoDescription }}">

        @if($socialImage)
            <meta property="og:image" content="{{ $socialImage }}">
        @elseif($organizationLogo)
            <meta property="og:image" content="{{ $organizationLogo }}">
        @endif

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="{{ $seoTitle }}">
        <meta name="twitter:description" content="{{ $seoDescription }}">

        @if($socialImage)
            <meta name="twitter:image" content="{{ $socialImage }}">
        @elseif($organizationLogo)
            <meta name="twitter:image" content="{{ $organizationLogo }}">
        @endif
    @endif

    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="copyright" content="Direitos reservados WHI">
    <meta name="author" content="WHI">

    @if($favicon)
        <link rel="shortcut icon" href="{{ $favicon }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap" onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap">
    </noscript>

    <link rel="preload" href="https://unpkg.com/aos@2.3.1/dist/aos.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"></noscript>

    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"></noscript>

    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></noscript>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    <link href="{{ asset('build/client/lgpd/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="{{ asset('build/client/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="preload" href="{{ asset('build/client/bootstrap-icons/bootstrap-icons.css') }}" as="style" onload="this.rel='stylesheet'">
    <link href="{{ asset('build/client/themes/whi-web/tp-01/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/client/themes/whi-web/tp-01/css/responsivo.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('build/client/css/default.css') }}" rel="stylesheet" type="text/css">

    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}</script>
</head>

<body>

    <div id="organization" hidden></div>

    {{-- Preloader --}}
    {{-- <div id="preloader">
        <div id="loader"></div>
    </div> --}}

    {{-- WhatsApp --}}
    @if(isset($contact) && $contact->phone_one <> null)
        @php
            $phone = preg_replace('/\D/', '', $contact->phone_one);
            $mensagem = "Olá! Encontrei seu site e gostaria de conhecer mais sobre os planos disponíveis.%0A";
        @endphp

        <a href="https://wa.me/55{{ $phone }}?text={{ $mensagem }}" class="whatsapp-floatt" target="_blank" rel="noopener noreferrer" aria-label="Fale conosco no WhatsApp">
            <i class="bi bi-whatsapp"></i>
        </a>
    @endif

    <style>
        :root {
            --primary-color: {{ $tenantTheme->primary_color ?: '#10513D' }};
            --secondary-color: {{ $tenantTheme->secondary_color ?: '#FDC20C' }};
            --accent-color: {{ $tenantTheme->accent_color ?: 'rgba(16, 81, 61, 0.5)' }};
            --text-color: {{ $tenantTheme->text_color ?: '#565656' }};
            --text-color-header: {{ $tenantTheme->text_color_header ?: '#FFFFFF' }};
            --bg-header: {{ $tenantTheme->bg_header ?: '#10513D' }};
            --text-color-footer: {{ $tenantTheme->text_color_footer ?: '#FFFFFF' }};
            --bg-footer: {{ $tenantTheme->bg_footer ?: '#10513D' }};
            --bg-scroll: {{ $tenantTheme->bg_scroll ?: '#F8F9FA' }};
            --color-button-one: {{ $tenantTheme->color_button_one ?: '#FFF' }};
            --color-button-two: {{ $tenantTheme->color_button_two ?: '#000' }};
            --text-button-one: {{ $tenantTheme->text_button_one ?: 'Botão 1' }};
            --bg-button-one: {{ $tenantTheme->bg_button_one ?: '#10513D' }};
            --text-button-two: {{ $tenantTheme->text_button_two ?: 'Botão 2' }};
            --bg-button-two: {{ $tenantTheme->bg_button_two ?: '#FDC20C' }};
            --copyright-text: {{ $tenantTheme->copyright ?: '© 2024 Todos os direitos reservados' }};
        }
        body{ background: #021127 !important }
        .tpl-modal-sec .tpl-badge{
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: var(--secondary-color) !important;
        }
        .tpl-modal-sec .tpl-scroll-hint, .tpl-modal-sec .tpl-category{
            color: var(--secondary-color)
        }
        .bg-button-two.color-button-two.px-3.py-2.rounded-3 {
            position: relative;
            overflow: hidden;
            z-index: 1;
            font-weight: 600;
            font-size: 16px;
            isolation: isolate;
        }

        .bg-button-two.color-button-two.px-3.py-2.rounded-3::before {
            content: "";
            position: absolute;
            inset: 0;
            width: 0;
            height: 100%;
            background: var(--bg-button-one);
            border-radius: 6px;
            transition: width .6s ease;
            z-index: 0;
        }

        .bg-button-two.color-button-two.px-3.py-2.rounded-3:hover::before {
            width: 100%;
        }

        .bg-button-two.color-button-two.px-3.py-2.rounded-3:hover {
            color: var(--color-button-one);
        }
        .bg-button-two.color-button-two.px-3.py-2.rounded-3 span {
            position: relative;
            z-index: 1;
        }
        .testimonial-card:hover{
            border-color: color-mix(in srgb, var(--secondary-color) 40%, transparent);
        }
        .author-avatar{
            border: 2px solid var(--secondary-color);
        }
        .tpl-modal-sec .tpl-card:hover .tpl-arrow, .tpl-modal-sec .tpl-btn-preview, .tpl-modal-sec .tpl-card:hover .tpl-arrow{background: var(--secondary-color) !important;}
        .why_new_section .why_new_section_inner .why_new_left_data .why_data_block .number{background: var(--primary-color);}
        .why_new_section .why_new_section_inner .why_new_left_data .why_data_block{background: color-mix(in srgb, var(--secondary-color) 10%, transparent);;border: solid 1px var(--secondary-color);}
        .title_badge{color: var(--secondary-color); border:1px solid var(--secondary-color)}
        .primary-color { color: var(--primary-color); }
        .secondary-color { color: var(--secondary-color); }
        .accent-color { color: var(--accent-color); }
        .text-color { color: var(--text-color); }
        .text-color-header { color: var(--text-color-header); }
        .text-color-footer { color: var(--text-color-footer); }
        .color-button-one { color: var(--color-button-one); }
        .color-button-two { color: var(--color-button-two); }
        .bg-primary-color { background: var(--primary-color); }
        .bg-secondary-color { background: var(--secondary-color); }
        .bg-accent-color { background: var(--accent-color); }
        .bg-header { background: var(--bg-header); }
        .bg-footer { background: var(--bg-footer); }
        .bg-scroll { background: var(--bg-scroll); }
        .bg-button-one { background: var(--bg-button-one); }
        .bg-button-two { background: var(--bg-button-two); }
    </style>

    {{-- Header --}}
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg mt-0 justify-content-center justify-content-md-start">
                <a class="navbar-brand logo-header" href="#">
                    @if(!empty($tenantTheme->path_image_logo_header))
                        <img src="{{ asset('storage/' . $tenantTheme->path_image_logo_header) }}" alt="{{ $seoGoogle->organization_name ?? config('app.name') }}">
                    @else
                        <span class="fw-bold">{{ $seoGoogle->organization_name ?? config('app.name') }}</span>
                    @endif
                </a>

                @if(isset($tenantTheme->link_header) && $tenantTheme->link_header <> null)
                    <a href="{{ $tenantTheme->link_header }}" target="_blank" rel="noopener noreferrer" class="bg-button-one color-button-one ms-auto px-4 py-2">
                        <i class="bi bi-box-arrow-in-right"></i> {{ $tenantTheme->btn_title_header }}
                    </a>
                @endif
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <style>
        /* ==========================================================
   SEÇÃO REDES SOCIAIS - LIGHT ELEGANT PREMIUM (#573FD0)
   ========================================================== */
.social-section-light {
  background-color: #ffffff;
  padding: 60px 0;
  font-family: 'Montserrat', 'Inter', sans-serif;
  position: relative;
}

/* Card Container com Sombra Suave */
.social-wrapper-card {
  background: #ffffff;
  border: 1px solid rgba(87, 63, 208, 0.12);
  border-radius: 24px;
  padding: 32px 40px;
  box-shadow: 0 15px 35px rgba(87, 63, 208, 0.05);
  position: relative;
  overflow: hidden;
  transition: all 0.3s ease;
}

.social-wrapper-card:hover {
  box-shadow: 0 20px 45px rgba(87, 63, 208, 0.08);
  border-color: rgba(87, 63, 208, 0.25);
}

/* Badge Decorativo */
.social-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  color: #573fd0;
  background: rgba(87, 63, 208, 0.08);
  padding: 6px 14px;
  border-radius: 20px;
  margin-bottom: 8px;
}

.social-title {
  font-size: 1.5rem;
  font-weight: 800;
  color: #0f172a;
  margin: 0;
  letter-spacing: -0.3px;
}

/* Botões de Redes Sociais Elegantes */
.social-links-container {
  display: flex;
  gap: 16px;
  flex-wrap: wrap;
}

.social-pill-btn {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  padding: 12px 22px;
  border-radius: 16px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  color: #475569;
  text-decoration: none;
  font-size: 14px;
  font-weight: 700;
  transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
  position: relative;
  overflow: hidden;
}

.social-pill-btn i {
  font-size: 18px;
  transition: transform 0.3s ease;
}

/* Efeito Hover Genérico */
.social-pill-btn:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
}

.social-pill-btn:hover i {
  transform: scale(1.15) rotate(-5deg);
}

/* Temas Dinâmicos por Rede Social */
/* Instagram */
.social-pill-btn.insta:hover {
  background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
  color: #ffffff;
  border-color: transparent;
  box-shadow: 0 10px 25px rgba(253, 29, 29, 0.3);
}

/* Facebook */
.social-pill-btn.face:hover {
  background: #1877f2;
  color: #ffffff;
  border-color: #1877f2;
  box-shadow: 0 10px 25px rgba(24, 119, 242, 0.3);
}

/* TikTok / LinkedIn */
.social-pill-btn.tiktok:hover {
  background: #000000;
  color: #ffffff;
  border-color: #000000;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
}

/* Responsividade */
@media (max-width: 991px) {
  .social-wrapper-card {
    padding: 28px 20px;
    text-align: center;
  }
  
  .social-links-container {
    justify-content: center;
    margin-top: 20px;
  }

  .social-title {
    font-size: 1.3rem;
  }
}
    </style>

    @if (isset($contact) && ($contact->link_insta || $contact->link_face || $contact->link_tik_tok))
  <section class="social-section-light">
    <div class="container">
      <div class="social-wrapper-card shadow-sm">
        <div class="row align-items-center">
          
          <!-- Lado Esquerdo: Chamada Institucional -->
          <div class="col-lg-5 mb-3 mb-lg-0">
            <span class="social-badge">
              <i class="bi bi-share-fill"></i> Conecte-se Conosco
            </span>
            <h3 class="social-title">Siga a WHI nas redes sociais</h3>
          </div>

          <!-- Lado Direito: Botoes Interativos de Redes Sociais -->
          <div class="col-lg-7">
            <div class="social-links-container justify-content-lg-end">
              
              <!-- Instagram -->
              @if ($contact->link_insta != null)
                <a href="{{ $contact->link_insta }}" target="_blank" rel="noopener noreferrer" class="social-pill-btn insta">
                  <i class="bi bi-instagram"></i>
                  <span>Instagram</span>
                </a>
              @endif

              <!-- Facebook -->
              @if ($contact->link_face != null)
                <a href="{{ $contact->link_face }}" target="_blank" rel="noopener noreferrer" class="social-pill-btn face">
                  <i class="bi bi-facebook"></i>
                  <span>Facebook</span>
                </a>
              @endif

              <!-- TikTok / LinkedIn -->
              @if ($contact->link_tik_tok != null)
                <a href="{{ $contact->link_tik_tok }}" target="_blank" rel="noopener noreferrer" class="social-pill-btn tiktok">
                  <i class="bi bi-tiktok"></i>
                  <span>TikTok</span>
                </a>
              @endif

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
@endif

    {{-- Footer --}}
    <footer class="bg-footer border-top pt-3 pt-lg-5 pb-3">
        <div class="container">

            <!-- Linha principal -->
            <div class="row align-items-start justify-content-between">

                <!-- Logo + botão -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <img src="{{asset('storage/' .$tenantTheme->path_image_logo_footer)}}" alt="{{ config('app.name') }}" height="65">
                    @if ($tenantTheme->link <> null)                        
                        <div class="mt-3 mt-lg-5">
                            <a href="{{ $tenantTheme->link }}" target="_blank" rel="noopener noreferrer" class="bg-button-two color-button-two px-4 py-2 font-changa font-16 font-medium text-decoration-none hover-zoom">
                                {{$tenantTheme->btn_title}}
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Mapa do site -->
                <div class="col-lg-4 mb-4 mb-0">
                    <h6 class="font-changa text-color-footer font-16 font-bold mb-3 position-relative d-inline-block font-changa font-16 font-medium">
                        Mapa do Site
                        <span class="d-block bg-yellow mt-1" style="height:3px; width:40px;"></span>
                    </h6>

                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><a href="{{route('index')}}" class="text-color-footer font-changa font-16 font-regular text-decoration-none d-block mb-2">Início</a></li>
                                <li><a href="{{route('index')}}#about" class="text-color-footer font-changa font-16 font-regular text-decoration-none d-block mb-2">Quem Somos</a></li>
                                <li><a href="{{route('index')}}#services" class="text-color-footer font-changa font-16 font-regular text-decoration-none d-block mb-2">Serviços</a></li>
                            </ul>
                        </div>

                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><a href="{{ request()->routeIs('index') ? '#depoiment' : route('index') . '#depoiment' }}" class="text-color-footer font-changa font-16 font-regular text-decoration-none d-block mb-2">Depoimentos</a></li>
                                <li><a href="{{ request()->routeIs('index') ? '#faq' : route('index') . '#faq' }}" class="text-color-footer font-changa font-16 font-regular text-decoration-none d-block mb-2">FAQ</a></li>
                                <li><a href="{{route('index')}}#contato" class="text-color-footer font-changa font-16 font-regular text-decoration-none d-block mb-2">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 col-12">

                    <h5 class="text-color-footer">Newsletter</h5>
                    <div class="news_letter">
                        <p class="text-color-footer">Inscreva-se e seja o primeiro a receber promoções incríveis</p>
                        <form id="newsletter-form">
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required="">
                                <button type="submit" class="btn" aria-label="subscribe">
                                    <i class="bi bi-send-fill"></i>
                                </button>
                            </div>
                            
                            <label class="text-color-footer">
                                <input type="checkbox" id="privacy-policy" required=""> 
                                Concordo com a Política de Privacidade da Delifast.
                            </label>
                            
                            <!-- Mensagem de feedback -->
                            <div id="newsletter-message" class="mt-2" style="display: none;"></div>
                        </form>
                    </div>

                </div>
            </div>

            <!-- Linha inferior -->
            <hr class="border-light opacity-25 my-0 mb-3 my-lg-4 border-color-footer">

            <div class="row align-items-center">
                @php
                    $cnpj = !empty($tenantTheme->cnpj) ? preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', preg_replace('/\D/', '', $tenantTheme->cnpj)) : '';
                @endphp

                <div class="row align-items-center g-4 m-0">
                    <div class="col-12 col-lg-5 text-center text-lg-start small text-color-footer m-0 p-0">
                        <p id="footer-text" class="mb-0 text-color-footer"></p>
                    </div>

                    <div class="col-12 col-lg-3 text-center small text-color-footer mt-0">
                        @if ($tenantTheme->privacy_policy <> null)                            
                            <a href="#" class="text-color-footer text-decoration-none" data-bs-toggle="modal" data-bs-target="#privacyModal">Política de Privacidade</a>
                            <span class="mx-1">|</span>
                        @endif
                        @if ($tenantTheme->terms_of_use <> null)                            
                            <a href="#" class="text-color-footer text-decoration-none" data-bs-toggle="modal" data-bs-target="#termsModal">Termos de Uso</a>
                        @endif
                    </div>

                    <!-- Modal Política de Privacidade -->
                    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="privacyModalLabel">Política de Privacidade</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    {!! $tenantTheme->privacy_policy !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Termos de Uso -->
                    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="termsModalLabel">Termos de Uso</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    {!! $tenantTheme->terms_of_use !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 m-0 p-0">
                        <div class="d-flex justify-content-center justify-content-lg-end align-items-center gap-3">
                            <a href="https://www.whi.dev.br/" target="_blank" rel="noopener noreferrer" class="text-color-footer text-decoration-none d-flex align-items-center gap-2">
                                <span class="font-13">Sistema</span>
                                <img src="{{asset('build/client/themes/default/images/whi-web.png')}}" title="Whi Web" alt="WHI Web" height="50" class="logo-system">
                            </a>

                            <span class="text-color-footer opacity-50">|</span>

                            <a href="https://www.whi.dev.br/" target="_blank" rel="noopener noreferrer" class="text-color-footer text-decoration-none d-flex align-items-center gap-2">
                                <span class="font-13">Desenvolvido por</span>
                                <img src="{{asset('build/client/themes/default/images/whi.png')}}" title="Agência WHI" alt="WHI" height="25" class="logo-system">
                            </a>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const currentYear = new Date().getFullYear();
                        const footerText = document.getElementById('footer-text');

                        if (footerText) {
                            footerText.innerHTML = `© ${currentYear} <span>{{ $tenantTheme->copyright }} - Todos os direitos reservados{{ $cnpj ? ' | ' . $cnpj : '' }}.</span>`;
                        }
                    });
                </script>
            </div>

        </div>
    </footer>

    {{-- Modal Política de Privacidade --}}
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacyModalLabel">Política de Privacidade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    {!! $tenantTheme->privacy_policy !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentYear = new Date().getFullYear();
            const footerText = document.getElementById('footer-text');

            if (footerText) {
                footerText.innerHTML = `© ${currentYear} <span>{{ $tenantTheme->copyright }} - Todos os direitos reservados{{ $cnpj ? ' | ' . $cnpj : '' }}.</span>`;
            }
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('build/client/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('build/client/lgpd/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="{{ asset('build/client/themes/whi-web/tp-01/js/jquery.js') }}"></script>
    <script src="{{ asset('build/client/themes/whi-web/tp-01/js/typed.min.js') }}"></script>
    <script src="{{ asset('build/client/themes/whi-web/tp-01/js/contador.js') }}"></script>
    <script src="{{ asset('build/client/themes/whi-web/tp-01/js/main.js') }}"></script>

    <script>
        AOS.init({ duration:800, once:true, offset:40 });

        Fancybox.bind('[data-fancybox="wedding-gallery"]', {
            Thumbs:{ type:"modern" },
            Toolbar:{ display:{ left:["infobar"], right:["thumbs","close"] } }
        });

        const modalElem = document.getElementById('modalServico');

        if(modalElem) {
            modalElem.addEventListener('show.bs.modal', function(event) {
                const card = event.relatedTarget;

                if(card) {
                    const titulo = card.getAttribute('data-servico-titulo');
                    const desc = card.getAttribute('data-servico-desc');

                    const modalTitulo = document.getElementById('modalTitulo');
                    const modalDescricao = document.getElementById('modalDescricao');

                    if(modalTitulo) modalTitulo.innerText = titulo;
                    if(modalDescricao) modalDescricao.innerHTML = desc;
                }
            });
        }

        const form = document.getElementById('formContato');
        const alertDiv = document.getElementById('msgAlert');

        if(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if(alertDiv) {
                    alertDiv.classList.remove('d-none');
                    setTimeout(() => alertDiv.classList.add('d-none'), 4000);
                }

                form.reset();
            });
        }

        document.querySelectorAll('.navbar-nav .nav-link, a[href^="#"]:not(.whatsapp-floatt)').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');

                if(targetId && targetId !== "#" && targetId.startsWith("#")) {
                    const targetElem = document.querySelector(targetId);

                    if(targetElem) {
                        e.preventDefault();
                        targetElem.scrollIntoView({ behavior:'smooth', block:'start' });
                    }

                    const navbarCollapse = document.querySelector('.navbar-collapse');

                    if(navbarCollapse?.classList.contains('show')) {
                        new bootstrap.Collapse(navbarCollapse).toggle();
                    }
                }
            });
        });
    </script>

    @php
        $slide = $slides->first();
    @endphp

    @if ($slide)
        <script>
            const typedStrings = @json($slide->typed ?? '')
                .split(',')
                .map(item => item.trim())
                .filter(item => item !== '');

            $("#typed").typed({
                strings: typedStrings,
                typeSpeed: 100,
                startDelay: 0,
                backSpeed: 60,
                backDelay: 2000,
                loop: true,
                cursorChar: "|",
                contentType: 'html'
            });
        </script>
    @endif

    <script>        
        // Fixed Discount Dish JS
        $(document).ready(function() {
            let cardBlock = document.querySelectorAll('.task_block');
            let topStyle = 120;
            cardBlock.forEach((card) => {
                card.style.top = `${topStyle}px`;
                topStyle += 30;
            })
        });
        // Scroll Down Window 
        $(document).ready(function() {
            // Attach a click event handler to the button
            $('#scrollButton').click(function() {
                // Scroll down smoothly 200 pixels from the current position
                $('html, body').animate({
                    scrollTop: $(window).scrollTop() + 600
                }, 800); // Adjust the speed (800ms) as needed
            });
        });
        //Envio whatsapp dos planos
        document.addEventListener('DOMContentLoaded', function() {
            // Seleciona todos os botões com a classe específica
            const whatsappButtons = document.querySelectorAll('.whatsapp-plan-btn');
            // Adiciona evento de clique a cada botão
            whatsappButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Encontra o elemento do plano (box-plan) mais próximo
                    const planBox = this.closest('.box-plan');
                    // Extrai informações do plano
                    const planName = planBox.querySelector('h5').textContent.trim();
                    // Encontra a descrição (primeiro p.mb-2 após o h5)
                    const planDescription = planBox.querySelector('h5 + p.mb-2')?.textContent.trim() || planBox.querySelector('p.mb-2')?.textContent.trim() || '';
                    // Encontra o preço (h6 dentro de .price)
                    const priceElement = planBox.querySelector('.price h6');
                    const planPrice = priceElement ? priceElement.textContent.trim() : '';
                    // Extrai os benefícios do plano - limpa o texto
                    const features = [];
                    const listItems = planBox.querySelectorAll('ul.list li');
                    listItems.forEach(item => {
                        // Remove espaços extras e quebras de linha
                        let text = item.textContent.replace(/\s+/g, ' ') // Substitui múltiplos espaços/linhas por um espaço
                            .replace(/\n/g, ' ') // Remove quebras de linha
                            .trim();
                        // Remove o conteúdo do SVG (que é o ícone de check)
                        // O SVG geralmente é o primeiro elemento filho
                        if (item.firstElementChild && item.firstElementChild.tagName === 'svg') {
                            text = text.replace(item.firstElementChild.textContent, '').trim();
                        }
                        if (text) {
                            // Limpa espaços extras novamente
                            text = text.replace(/\s+/g, ' ').trim();
                            features.push(text);
                        }
                    });
                    // Pega a URL base do WhatsApp
                    const whatsappUrl = this.getAttribute('href');
                    // Cria a mensagem personalizada
                    let message = `Olá! Estou entrando em contato através do site do Delifast.\n\n`;
                    message += `📋 *PLANO SELECIONADO*\n`;
                    message += `*${planName}*\n`;
                    message += `${planDescription}\n`;
                    if (planPrice) {
                        message += `*Preço:* ${planPrice}\n`;
                    }
                    if (features.length > 0) {
                        message += `\n✅ *BENEFÍCIOS INCLUÍDOS:*\n`;
                        features.forEach(feature => {
                            message += `• ${feature}\n`;
                        });
                    }
                    message += `\nGostaria de mais informações sobre este plano!`;
                    // Substitui quebras de linha por %0A para URL do WhatsApp
                    const whatsappMessage = message.replace(/\n/g, '%0A');
                    // Cria a URL final com a mensagem
                    const newUrl = `${whatsappUrl}?text=${whatsappMessage}`;
                    // Redireciona para o WhatsApp
                    window.open(newUrl, '_blank', 'noopener noreferrer');
                });
            });
        });
        // Envio whatsapp Servicos avulsos
        document.addEventListener('DOMContentLoaded', function() {
            // Primeiro, vamos remover os parâmetros ?text= dos links existentes
            // MAS somente dos que NÃO têm a classe keep-message
            const allWhatsAppLinks = document.querySelectorAll('a[href*="wa.me"]:not(.keep-message)');
            allWhatsAppLinks.forEach(link => {
                const baseUrl = link.getAttribute('href').split('?')[0];
                link.setAttribute('href', baseUrl);
                link.classList.add('whatsapp-plan-btn');
            });
            // Função para limpar texto
            function cleanText(text) {
                return text.replace(/\s+/g, ' ').replace(/\n/g, ' ').trim();
            }
            // Função para processar itens da lista
            function processListItems(listElement) {
                const features = [];
                if (!listElement) return features;
                const listItems = listElement.querySelectorAll('li');
                listItems.forEach(item => {
                    // Clona para não modificar o DOM original
                    const clone = item.cloneNode(true);
                    // Remove SVGs (ícones)
                    const svgs = clone.querySelectorAll('svg');
                    svgs.forEach(svg => svg.remove());
                    // Processa texto em negrito
                    const boldElements = clone.querySelectorAll('b');
                    boldElements.forEach(bold => {
                        const boldText = bold.textContent;
                        bold.parentNode.replaceChild(document.createTextNode(`*${boldText}*`), bold);
                    });
                    let text = clone.textContent;
                    text = cleanText(text);
                    if (text) {
                        features.push(text);
                    }
                });
                return features;
            }
            // Função para criar mensagem do WhatsApp
            function createWhatsAppMessage(type, data) {
                let message = '';
                if (type === 'plan') {
                    message = `Olá! Estou entrando em contato através do site do Delifast.%0A%0A`;
                    message += `📋 *PLANO SELECIONADO*%0A`;
                    message += `*${data.name}*%0A`;
                    message += `${data.description}%0A`;
                    if (data.price) {
                        message += `*Preço:* ${data.price}%0A`;
                    }
                    if (data.features.length > 0) {
                        message += `%0A✅ *BENEFÍCIOS INCLUÍDOS:*%0A`;
                        data.features.forEach(feature => {
                            message += `• ${feature}%0A`;
                        });
                    }
                    message += `%0AGostaria de mais informações sobre este plano!`;
                } else if (type === 'service') {
                    message = `Olá! Estou entrando em contato através do site do Delifast.%0A%0A`;
                    message += `🛠️ *SERVIÇO SELECIONADO*%0A`;
                    message += `*${data.name}*%0A`;
                    if (data.price) {
                        message += `*Valor:* ${data.price}%0A`;
                    }
                    if (data.tag) {
                        message += `🏷️ *${data.tag}*%0A`;
                    }
                    if (data.features.length > 0) {
                        message += `%0A✅ *O QUE ESTÁ INCLUÍDO:*%0A`;
                        data.features.forEach(feature => {
                            message += `• ${feature}%0A`;
                        });
                    }
                    message += `%0AGostaria de mais informações sobre este serviço!`;
                }
                return message;
            }
            // Configurar botões de PLANOS (apenas os que NÃO têm keep-message)
            const planButtons = document.querySelectorAll('.box-plan .btn.puprple_btn:not(.keep-message)');
            planButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const planBox = this.closest('.box-plan');
                    // Obter nome do plano
                    const planName = planBox.querySelector('h5').textContent.trim();
                    // Obter descrição do plano
                    let planDescription = '';
                    const descriptionEl = planBox.querySelector('h5 + p.mb-2') || planBox.querySelector('.price p.mb-2');
                    if (descriptionEl) {
                        planDescription = descriptionEl.textContent.trim();
                    }
                    // Obter preço
                    const priceEl = planBox.querySelector('.price h6');
                    const planPrice = priceEl ? priceEl.textContent.trim() : '';
                    // Obter benefícios
                    const planFeatures = processListItems(planBox.querySelector('ul.list'));
                    // Criar dados do plano
                    const planData = {
                        name: planName,
                        description: planDescription,
                        price: planPrice,
                        features: planFeatures
                    };
                    // Criar mensagem
                    const message = createWhatsAppMessage('plan', planData);
                    // Construir URL do WhatsApp
                    const whatsappUrl = `https://wa.me/5571992768360?text=${message}`;
                    // Abrir WhatsApp
                    window.open(whatsappUrl, '_blank', 'noopener noreferrer');
                });
            });
            // Configurar botões de SERVIÇOS (apenas os que NÃO têm keep-message)
            const serviceButtons = document.querySelectorAll('.box-service .btn.puprple_btn:not(.keep-message)');
            serviceButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const serviceBox = this.closest('.box-service');
                    // Obter nome do serviço
                    const serviceName = serviceBox.querySelector('h5').textContent.trim();
                    // Obter tag (se houver)
                    let serviceTag = '';
                    const tagEl = serviceBox.querySelector('.tag p');
                    if (tagEl) {
                        const tagText = tagEl.textContent.trim();
                        if (tagText !== 'Popular') {
                            serviceTag = tagText;
                        }
                    }
                    // Obter preço
                    const priceEl = serviceBox.querySelector('.price h6');
                    let servicePrice = '';
                    if (priceEl) {
                        const priceText = priceEl.textContent.trim();
                        const span = priceEl.querySelector('span');
                        if (span) {
                            servicePrice = priceText.replace(span.textContent, '').trim();
                            servicePrice += ` ${span.textContent.trim()}`;
                        } else {
                            servicePrice = priceText;
                        }
                    }
                    // Obter características
                    const serviceFeatures = processListItems(serviceBox.querySelector('ul.list'));
                    // Criar dados do serviço
                    const serviceData = {
                        name: serviceName,
                        tag: serviceTag,
                        price: servicePrice,
                        features: serviceFeatures
                    };
                    // Criar mensagem
                    const message = createWhatsAppMessage('service', serviceData);
                    // Construir URL do WhatsApp
                    const whatsappUrl = `https://wa.me/5571992768360?text=${message}`;
                    // Abrir WhatsApp
                    window.open(whatsappUrl, '_blank', 'noopener noreferrer');
                });
            });
            console.log('WhatsApp script carregado com sucesso! Botões com .keep-message serão ignorados.');
        });
    </script>
</body>
</html>