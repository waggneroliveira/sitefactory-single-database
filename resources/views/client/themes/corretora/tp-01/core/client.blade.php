<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#0d0d0d">
    <meta name="description" content="A Girollato é uma distribuidora especializada em rações, alimentos e artigos pet, oferecendo produtos de qualidade para cães, gatos e outros animais com variedade, cuidado e confiança.">
    <meta name="keywords" content="Girollato, distribuidora de rações, artigos pet, produtos pet, ração para cães, ração para gatos, acessórios pet, pet shop, alimentos para animais, higiene pet, brinquedos para pets, areia para gatos, distribuidora pet, casa de ração, produtos para cães e gatos, pet store, ração premium, produtos pet em Lauro de Freitas, distribuidora de rações Bahia">    <meta name="google-site-verification" content="-bUd4PZJ-3xvnf7cOkcmNLV7jzTk5106hfB0mPtvhqE" />
    <title>Corretora</title>
    @if(isset($blogInner))
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $blogInner->title }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($blogInner->text), 150) }}">
        <meta property="og:image" content="{{ asset('storage/' . $blogInner->path_image_thumbnail) }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="{{ $blogInner->title }}">
        <meta name="twitter:description" content="{{ Str::limit(strip_tags($blogInner->text), 150) }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $blogInner->path_image_thumbnail) }}">
    @else
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Girollato">
        <meta property="og:description" content="A Girollato é uma distribuidora especializada em rações, alimentos e artigos pet, oferecendo produtos de qualidade para cães, gatos e outros animais com variedade, cuidado e confiança.">
        <meta property="og:image" content="https://girolato.com.br/build/client/images/logo.svg">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="Girollato">
        <meta name="twitter:description" content="A Girollato é uma distribuidora especializada em rações, alimentos e artigos pet, oferecendo produtos de qualidade para cães, gatos e outros animais com variedade, cuidado e confiança.">
        <meta name="twitter:image" content="https://girolato.com.br/build/client/images/logo.svg">
    @endif

    
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="copyright" content="Direitos reservados WHI">
    <meta name="author" content="WHI">
    <link rel="shortcut icon" href="https://girolato.com.br/build/client/images/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap" onload='this.onload=null,this.rel="stylesheet"'>
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap">
    </noscript>

    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"></noscript>
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></noscript>
    <link href="{{ asset('build/client/lgpd/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="{{ asset('build/client/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preload" href="{{ asset('build/client/css/bootstrap-icons/bootstrap-icons.css') }}" as="style" onload="this.rel='stylesheet'">
    <link href="{{ asset('build/client/css/default.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="{{ asset("build/client/css/{$theme->slug}/{$theme->template_variation}/style.css") }}">   
    <link href="{{ asset("build/client/css/{$theme->slug}/{$theme->template_variation}/responsivo.css") }}" rel="stylesheet" type="text/css" /> --}}

    <script type=application/ld+json>
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "@id": "#organization",
            "name": "Girollato",
            "legalName": "Girollato",
            "url": "https://girolato.com.br/",
            "logo": "https://girolato.com.br/build/client/images/logo.svg",
            "image": "https://girolato.com.br/build/client/images/logo.svg",
            "description": "A Girollato é uma distribuidora especializada em rações, alimentos e artigos pet, oferecendo produtos de qualidade para cães, gatos e outros animais com variedade, cuidado e confiança.",
            "foundingDate": "2010",
            "email": "contato@girollato.com.br",
            "telephone": "+55 71 9 9623-8037",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Alameda Maji, 144 - Quingoma",
                "addressLocality": "Lauro de Freitas",
                "addressRegion": "BA",
                "postalCode": "42725-610",
                "addressCountry": "BR"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+55 71 9 9623-8037",
                "contactType": "customer service",
                "email": "contato@girollato.com.br",
                "areaServed": "BR",
                "availableLanguage": ["pt", "en"]
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "08:00",
                "closes": "17:00"
            },
            "slogan": "Girollato",
            "keywords": [
                "distribuidora de rações",
                "ração para cães",
                "ração para gatos",
                "artigos pet",
                "produtos pet",
                "acessórios para pets",
                "pet shop",
                "distribuidora pet",
                "alimentos para animais",
                "ração premium",
                "ração super premium",
                "produtos para cães e gatos",
                "brinquedos para pets",
                "higiene pet",
                "areia para gatos",
                "pet store",
                "distribuidor de produtos pet",
                "ração em Lauro de Freitas",
                "produtos pet em Lauro de Freitas",
                "distribuidora de rações Bahia",
                "produtos para animais domésticos",
                "suplementos pet",
                "petshop online",
                "casa de ração",
                "loja pet"
            ]
        }
    </script>
</head>
<body>
    <div id="organization" hidden></div>

    <header class="border-bottom bg-transparent fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light py-4">
            <div class="container">

                <!-- Logo -->
                <a class="navbar-brand me-5" href="#">
                    {{-- <img src="{{asset('storage/' .$theme->path_image_logo_header)}}" alt="Girollato" height="40"> --}}
                    <img src="{{asset('build/client/images/logo.svg')}}" alt="Girollato" height="40">
                </a>

                <!-- Mobile -->
                <button class="navbar-toggler" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSite">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse" id="navbarSite">

                    <ul class="navbar-nav mx-auto align-items-lg-center gap-1">

                        <li class="nav-item">
                            <a class="nav-link text-white font-changa font-16 font-regular font-header active position-relative" href="#">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white font-changa font-16 font-regular font-header" href="#">
                                Quem Somos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white font-changa font-16 font-regular font-header" href="#">
                                Imóveis
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white font-changa font-16 font-regular font-header" href="#">
                                Engenharia
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white font-changa font-16 font-regular font-header" href="#">
                                Blog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white font-changa font-16 font-regular font-header" href="#">
                                Contato
                            </a>
                        </li>

                    </ul>

                    <!-- Botões -->
                    <div class="d-flex align-items-center gap-3">

                        <a href="#" class="btn btn-outline-info rounded-pill px-4">
                            Simule Aqui
                        </a>

                    </div>

                </div>

            </div>
        </nav>
    </header>

    <main>
        @yield('content') 
    </main>

    {{-- footer tp-01 --}}


    <style>
        .nav-link{
    color:#1f2937;
    letter-spacing:.06em;
}

.nav-link:hover{
    color:var(--yellow-color)
}

.nav-link.active::after{
    content:"";
    position:absolute;
    left:20%;
    bottom:-18px;
    width:60%;
    height:4px;
    background:var(--yellow-color);
    border-radius:10px;
}

/* =========================
   HERO
========================= */

.hero {
  position: relative;
  width: 100%;
}
.overflow{
    content:'';
    background: #0000001c;
    height: 100%;
    width: 100%;
    position: absolute;
    left:0;
    top:0;
    z-index: 1;
}
.hero-slide {
  position: relative;
  height: 100vh;
  overflow: hidden;
}

.hero-bg {
  position: absolute;
  inset: 0;
  z-index: 1;
}

.hero-bg img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.hero-content {
  position: relative;
  z-index: 3;
  height: 100vh;
  display: flex;
  align-items: center;
  color: #fff;
}

.hero-subtitle {
  margin-bottom: 12px;
  opacity: 0.9;
  color: var(--green-color);
}

.hero-title {
  line-height: 1;
  color: var(--yellow-color);
}
.hero-content .description{
    color: var(--grey-color);
}

.hero-actions {
  gap: 15px;
}

.btn-hero.btn:hover {
    border: 1px solid var(--white-color);
}
.btn-hero.btn:hover svg, .btn-product svg, #shareBtn svg{
    filter: brightness(10) saturate(0.1) contrast(10);
}
.btn-outline {
  border: 2px solid var(--yellow-color);
  color: var(--yellow-color);
  padding: 12px 28px;
  border-radius: 50px;
  font-weight: 600;
  text-decoration: none;
}
.main-swiper .swiper-pagination-bullet{
    height: 17px;
    width: 17px;
}
.main-swiper .swiper-pagination-bullet {
  background: rgba(255, 255, 255, 0.5);
  opacity: 1;
}

.main-swiper .swiper-pagination-bullet-active {
  background: var(--yellow-color);
}

/* Sessão de Imóveis Destaque */
.property-section {
    padding-top: 3rem;
    padding-bottom: 3rem;
}

.property-section .section-title {
    color: #0b2a3b;
}

.property-card {
    background: transparent;
    border: 0;
    border-radius: 0;
    overflow: hidden;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    transition: transform 0.3s ease;
    height: 100%;
}

.property-card:hover {
    transform: translateY(-6px);
}

.property-image-wrapper {
    position: relative;
    height: 420px;
}

.property-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.property-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
    background: linear-gradient(to top, rgba(11, 42, 59, 0.92) 0%, rgba(11, 42, 59, 0) 100%);
}

.property-overlay .property-name {
    color: #fff;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.property-overlay .property-details {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.property-overlay .property-details span {
    color: rgba(255, 255, 255, 0.5);
    font-size: 0.875rem;
    display: flex;
    align-items: center;
}

.property-overlay .property-details i {
    color: #f5b041;
    margin-right: 0.25rem;
}

.badge-warning-custom {
    background-color: #f5b041;
    color: #0b2a3b;
    padding: 0.5rem 1rem;
    border-radius: 50rem;
    font-weight: 600;
}

.badge-success-custom {
    background-color: rgba(25, 135, 84, 0.25);
    color: #198754;
    padding: 0.5rem 1rem;
    border-radius: 50rem;
    font-weight: 600;
}

.badge-info-custom {
    background-color: rgba(13, 202, 240, 0.25);
    color: #0dcaf0;
    padding: 0.5rem 1rem;
    border-radius: 50rem;
    font-weight: 600;
}

.badge-warning-soft {
    background-color: rgba(245, 176, 65, 0.1);
    color: #f5b041;
    padding: 0.5rem 1rem;
    border-radius: 50rem;
    font-weight: 400;
}

.property-img {
  height: 220px;
  object-fit: cover;
  border-top-left-radius: calc(0.5rem - 1px);
  border-top-right-radius: calc(0.5rem - 1px);
}
.badge-featured {
  background-color: #f5b041;
}
.btn-outline-dark{
    color: var(--yellow-color) !important;
    border-color: var(--yellow-color) !important;
}
.btn-outline-dark:hover{
    background-color: var(--yellow-color) !important;
    color: #FFF !important;
}
.icon-circle {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 3.5rem;
  height: 3.5rem;
  border-radius: 50%;
  background: rgba(245, 176, 65, 0.15);
  color: #f5b041;
  font-size: 1.6rem;
}

.list-unstyled li i {
  color: #f5b041;
  margin-right: 0.5rem;
}
a {
  text-decoration: none;
}
.card .image .status{
    top: 10px;
    left: 10px;
}
.featured-banner__card{
    overflow:hidden;
    min-height:280px;
    text-decoration:none;
}

.featured-banner__image{
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.8s;
}

/* Overlay */

.featured-banner__overlay{
    position:absolute;
    inset:0;
    z-index:2;
    padding:45px;

    background:
        linear-gradient(
            90deg,
            rgba(25,170,210,.95) 0%,
            rgba(25,170,210,.85) 30%,
            rgba(25,170,210,.45) 55%,
            rgba(0,0,0,0) 80%
        );
}
.featured-banner__overlay::before{
    content:'';
    position:absolute;
    inset:0;
    background:
        radial-gradient(circle at left,var(--green-color),transparent 45%);
    pointer-events:none;
}

.featured-banner__card:hover .featured-banner__image{
    transform:scale(1.06);
}

.featured-banner__description{
    color:#eefcff;
    max-width:340px;
    margin-bottom:28px;
}

.featured-banner__button{
    background: var(--yellow-color);
}

.featured-banner__button:hover{
    background:var(--green-color);
}

.featured-banner__logo{
    max-width:180px;
    width:100%;
    filter:drop-shadow(0 10px 20px rgba(0,0,0,.25));
}

/* Responsivo */

@media (max-width:991px){

    .featured-banner__overlay{
        padding:35px;
        background:linear-gradient(
            180deg,
            rgba(25,170,210,.92) 0%,
            rgba(25,170,210,.75) 55%,
            rgba(25,170,210,.40) 100%
        );
    }

    .featured-banner__title{
        font-size:2rem;
    }

    .featured-banner__description{
        max-width:100%;
    }

    .featured-banner__logo{
        margin:35px auto 0;
        max-width:170px;
    }

}

@media (max-width: 991.98px) {
    .property-section .section-subtitle {
        max-width: 100%;
    }
}

@media (max-width: 767.98px) {
    .property-image-wrapper {
        height: 350px;
    }
}
    </style>

    {{-- <script src="https://cdn.ckeditor.com/4.22.1/basic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script> --}}
    <!-- SweetAlert2 JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('build/client/css/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('build/client/lgpd/script.js') }}"></script>
    <script src="{{ asset('build/client/js/default.js') }}"></script> --}}

</body>
</html>
