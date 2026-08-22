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

    <!-- call to action -->
    <section class="cta_section new white_text" id="contact_sec">
        <!-- container start -->
        <div class="container">
            <div class="cta_box"> 
                <div class="element">
                    <span class="element1"> <img src="images/element_white_3.webp" alt="image"> </span>
                    <span class="element2"> <img src="images/element_white_4.webp" alt="image"> </span>
                </div>         	
                <div class="left">

                <!-- section title -->
                <div class="section_title" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                    <img src="images/customer-icon.webp" class="customer_icon" alt="image">
                    <!-- h2 -->
                    <h3 class="text-dark">Ainda com dúvidas?</h3>
                    <!-- p -->
                    <p class="text-dark" >Fale conosco agora e esclareça imediatamente!</p>
                </div>

                </div>	
                <!-- cta buttons -->
                <div class="right">     		
                    <div class="btn_block ">
                        <a href="tel:5571992768360" class="btn puprple_btn aos-init aos-animate call_btn" ><i class="icofont-ui-call"></i> Ligue-nos</a>
                        <a href="mailto:atendimento@whi.dev.br" class="btn aos-init aos-animate email_btn" ><i class="icofont-envelope-open"></i> Enviar e-mail</a>
                    </div>	
                </div>	          	
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- call to action -->   


    {{-- Footer --}}
    <footer class="pt-5 pb-4 mt-2 bg-footer">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4 col-md-6">
                    @if($tenantTheme->path_image_logo_footer)
                        <img src="{{ asset('storage/' . $tenantTheme->path_image_logo_footer) }}" alt="{{ config('app.name') }}" height="40">
                    @endif

                    <p class="text-color-footer small">{{ $tenantTheme->description }}</p>

                    <div class="mt-3">
                        <a href="{{ $tenantTheme->link ?? '#' }}" target="_blank" rel="noopener noreferrer">
                            <span class="bg-button-two color-button-two rounded font-12 font-bold px-3 py-2">{{ $tenantTheme->btn_title ?? 'Saiba mais' }}</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h6 class="primary-color mb-3 fw-semibold">Navegação</h6>

                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="#inicio" class="text-color-footer text-decoration-none">Início</a></li>
                        <li class="mb-2"><a href="#quem-somos" class="text-color-footer text-decoration-none">Quem Somos</a></li>
                        <li class="mb-2"><a href="#servicos" class="text-color-footer text-decoration-none">Serviços</a></li>
                        <li class="mb-2"><a href="#galeria-casamento" class="text-color-footer text-decoration-none">Casamento</a></li>
                        <li><a href="#contato" class="text-color-footer text-decoration-none">Contato</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h6 class="primary-color mb-3 fw-semibold">Serviços Rápidos</h6>

                    <ul class="list-unstyled small">
                        @foreach($services as $serviceNow)
                            <li class="mb-2 text-color-footer">
                                <i class="bi bi-check2-circle primary-color me-1"></i> {{ $serviceNow->title }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-12">

                    <h5>Newsletter</h5>
                    <div class="news_letter">
                        <p>Inscreva-se e seja o primeiro a receber promoções incríveis</p>
                        <form id="newsletter-form">
                            <div class="form-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required="">
                                <button type="submit" class="btn" aria-label="subscribe">
                                    <i class="icofont-paper-plane"></i>
                                </button>
                            </div>
                            
                            <label class="text-white">
                                <input type="checkbox" id="privacy-policy" required=""> 
                                Concordo com a Política de Privacidade da Delifast.
                            </label>
                            
                            <!-- Mensagem de feedback -->
                            <div id="newsletter-message" class="mt-2" style="display: none;"></div>
                        </form>
                    </div>

                </div>
            </div>

            <hr class="bg-secondary mt-5">

            @php
                $cnpj = !empty($tenantTheme->cnpj) ? preg_replace('/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/', '$1.$2.$3/$4-$5', preg_replace('/\D/', '', $tenantTheme->cnpj)) : '';
            @endphp

            <div class="row align-items-center g-4">
                <div class="col-12 col-lg-5 text-center text-lg-start small text-color-footer">
                    <p id="footer-text" class="mb-0 text-color-footer"></p>
                </div>

                <div class="col-12 col-lg-3 text-center small text-color-footer">
                    @if($tenantTheme->privacy_policy <> null)
                        <a href="#" class="text-color-footer text-decoration-none" data-bs-toggle="modal" data-bs-target="#privacyModal">Política de Privacidade</a>
                    @endif

                    <span class="mx-1">|</span>

                    @if($tenantTheme->terms_of_use <> null)
                        <a href="#" class="text-color-footer text-decoration-none" data-bs-toggle="modal" data-bs-target="#termsModal">Termos de Uso</a>
                    @endif
                </div>

                <div class="col-12 col-lg-4">
                    <div class="d-flex justify-content-center justify-content-lg-end align-items-center gap-3">
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-color-footer text-decoration-none d-flex align-items-center gap-2">
                            <span class="font-13">Sistema</span>
                            @if($tenantTheme->path_image_logo_footer)
                                <img src="{{ asset('storage/' . $tenantTheme->path_image_logo_footer) }}" alt="WHI Web" style="filter:brightness(0) invert(1);opacity:.5;height:24px;width:auto;">
                            @endif
                        </a>

                        <span class="text-color-footer opacity-50">|</span>

                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-color-footer text-decoration-none d-flex align-items-center gap-2">
                            <span class="font-13">Desenvolvido por</span>
                            <img src="https://www.whi.dev.br/build/client/images/logo.png" alt="WHI" style="height:24px;width:auto;">
                        </a>
                    </div>
                </div>
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

    {{-- Modal Termos de Uso --}}
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