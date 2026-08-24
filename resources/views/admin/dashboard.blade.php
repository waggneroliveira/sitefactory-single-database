@extends('admin.core.admin')

@section('content')

    @php

        /*
        |--------------------------------------------------------------------------
        | Layout atual
        |--------------------------------------------------------------------------
        */

        $layoutType = $theme->layout_type ?? 'multipage';

        /*
        |--------------------------------------------------------------------------
        | Template atual
        |--------------------------------------------------------------------------
        |
        | O ThemeManager::__get() permite acessar:
        | $theme->slug
        | $theme->layout_type
        |
        */

        $templateSlug = $theme->slug ?? 'default';

        /*
        |--------------------------------------------------------------------------
        | Módulos conforme o layout
        |--------------------------------------------------------------------------
        */

        if ($layoutType === 'onepage') {

            /*
            | Onepage:
            | Todos os módulos de conteúdo ficam na Home.
            */

            $homeModules = config(
                "template_modules.{$templateSlug}.onepage.home",
                []
            );

            $aboutModules = [];
            $productModules = [];
            $blogModules = [];
            $contactModules = [];

        } else {

            /*
            | Multipage:
            | Cada página possui seus próprios módulos.
            */

            $homeModules = config(
                "template_modules.{$templateSlug}.multipage.home",
                []
            );

            $aboutModules = config(
                "template_modules.{$templateSlug}.multipage.about",
                []
            );

            $productModules = config(
                "template_modules.{$templateSlug}.multipage.products",
                []
            );

            $blogModules = config(
                "template_modules.{$templateSlug}.multipage.blog",
                []
            );

            $contactModules = config(
                "template_modules.{$templateSlug}.multipage.contact",
                []
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Verifica se o módulo existe no layout atual
        |--------------------------------------------------------------------------
        */

        $hasModule = function ($module) use (
            $homeModules,
            $aboutModules,
            $productModules,
            $blogModules,
            $contactModules
        ) {
            return
                in_array($module, $homeModules) ||
                in_array($module, $aboutModules) ||
                in_array($module, $productModules) ||
                in_array($module, $blogModules) ||
                in_array($module, $contactModules);
        };

        /*
        |--------------------------------------------------------------------------
        | Verifica se existe pelo menos um módulo
        |--------------------------------------------------------------------------
        */

        $hasAnyModule = function (array $modules) use ($hasModule) {

            foreach ($modules as $module) {

                if ($hasModule($module)) {
                    return true;
                }

            }

            return false;
        };

    @endphp


    {{-- HEADER --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="mdi mdi-view-dashboard-outline me-2 text-primary"></i>
                {{ __('dashboard.title_dashboard') }}
            </h1>

            <p class="text-muted small mb-0">
                Gerencie todos os módulos do seu site
            </p>
        </div>
    </div>


    {{-- ============================================================
        HOME
    ============================================================ --}}

    @if ($hasAnyModule([
        'slides',
        'topics',
        'statute',
        'letsgo',
        'faq_session',
        'faq',
        'testimonials',
        'services',
        'gallery',
        'about',
        'benefits',
        'mission',
        'planNetwork',
        'representatives',
        'videos',
        'service_locations',
        'brands',
        'product_categories',
        'products',
        'partner',
        'blog_categories',
        'blog',
        'contact',
        'contact_leads',
        'download_leads'
    ]))

        <div class="mb-2">

            <div class="d-flex align-items-center gap-2 mb-2">

                <span class="badge bg-primary bg-opacity-10 text-primary p-2">
                    <i class="mdi mdi-home fs-5"></i>
                </span>

                <h5 class="mb-0 fw-semibold">Home</h5>

            </div>

            <div class="row g-2">

                {{-- ====================================================
                    HOME
                ==================================================== --}}

                @if ($hasModule('slides') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('slide.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.slide.index'),
                        'icon' => 'mdi-image-size-select-actual',
                        'title' => 'Slides'
                    ])

                @endif


                @if ($hasModule('topics') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('topico.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.topic.index'),
                        'icon' => 'mdi-format-list-bulleted',
                        'title' => 'Tópicos'
                    ])

                @endif


                @if ($hasModule('statute') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('passo a passo.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.statute.index'),
                        'icon' => 'mdi-file-document',
                        'title' => 'Passo a passo'
                    ])

                @endif


                @if ($hasModule('letsgo') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('sesssao lets go.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.letsgo.index'),
                        'icon' => 'mdi-alert-circle',
                        'title' => 'Sessão Lets Go'
                    ])

                @endif


                @if ($hasModule('faq_session') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('sesssao faq.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.sessaoFaq.index'),
                        'icon' => 'mdi-help-circle',
                        'title' => 'Sessão FAQ'
                    ])

                @endif


                @if ($hasModule('faq') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('perguntas e respostas.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.faq.index'),
                        'icon' => 'mdi-comment-question',
                        'title' => 'Perguntas/Respostas'
                    ])

                @endif


                @if ($hasModule('testimonials') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('depoimento.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.depoiment.index'),
                        'icon' => 'mdi-account-voice',
                        'title' => 'Depoimentos'
                    ])

                @endif


                @if ($hasModule('services') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('depoimento.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.serviceItem.index'),
                        'icon' => 'mdi-account-voice',
                        'title' => 'Serviços'
                    ])

                @endif

                @if ($hasModule('partner') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('parceiro.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.partner.index'),
                        'icon' => 'mdi-account-voice',
                        'title' => 'Parceiros'
                    ])

                @endif


                @if ($hasModule('gallery') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('depoimento.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.gallery.index'),
                        'icon' => 'mdi-account-voice',
                        'title' => 'Galeria'
                    ])

                @endif


                {{-- ====================================================
                    ONEPAGE
                    Se for Onepage, os módulos abaixo também ficam
                    dentro da Home.
                ==================================================== --}}

                @if ($layoutType === 'onepage')

                    @if ($hasModule('about') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('sobre nos.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.about.index'),
                            'icon' => 'mdi-help-circle',
                            'title' => 'Sobre Nós'
                        ])

                    @endif


                    @if ($hasModule('benefits') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('parametro.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.benefitTopic.index'),
                            'icon' => 'mdi-star',
                            'title' => 'Parâmetros'
                        ])

                    @endif


                    @if ($hasModule('mission') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('missao visao e valores.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.report.index'),
                            'icon' => 'mdi-target',
                            'title' => 'Missão, Visão e Valores'
                        ])

                    @endif

                    @if ($hasModule('planNetwork') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('plano.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.planNetwork.index'),
                            'icon' => 'mdi-target',
                            'title' => 'Planos de Internet'
                        ])

                    @endif

                    @if ($hasModule('representatives') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('representantes.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.direction.index'),
                            'icon' => 'mdi-account-group',
                            'title' => 'Representantes'
                        ])

                    @endif


                    @if ($hasModule('videos') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('video.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.video.index'),
                            'icon' => 'mdi-play-circle',
                            'title' => 'Vídeos'
                        ])

                    @endif


                    @if ($hasModule('service_locations') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('onde atendemos.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.serviceLocation.index'),
                            'icon' => 'mdi-map-marker',
                            'title' => 'Sessão Onde Atendemos'
                        ])

                    @endif


                    @if ($hasModule('brands') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('marcas.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.brand.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Marcas'
                        ])

                    @endif


                    @if ($hasModule('product_categories') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('categorias de produtos.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.productCategory.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Categorias dos produtos'
                        ])

                    @endif


                    @if ($hasModule('products') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('produtos.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.product.index'),
                            'icon' => 'mdi-package-variant',
                            'title' => 'Produtos'
                        ])

                    @endif


                    @if ($hasModule('blog_categories') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('categorias de noticias.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.blogCategory.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Categorias das Notícias'
                        ])

                    @endif


                    @if ($hasModule('blog') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('noticias.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.blog.index'),
                            'icon' => 'mdi-newspaper-variant',
                            'title' => 'Notícias'
                        ])

                    @endif


                    @if ($hasModule('contact') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('contato.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.contact.index'),
                            'icon' => 'mdi-card-account-mail-outline',
                            'title' => 'Contato'
                        ])

                    @endif


                    @if ($hasModule('contact_leads') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('lead contato.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.formIndex.index'),
                            'icon' => 'mdi-account-box-outline',
                            'title' => 'Lead Contato'
                        ])

                    @endif


                    @if ($hasModule('download_leads') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('usuario.tornar usuario master')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.leadDownload.index'),
                            'icon' => 'mdi-download',
                            'title' => 'Lead Download'
                        ])

                    @endif

                @endif

            </div>
        </div>

    @endif


    {{-- ============================================================
        MULTIPAGE
        As seções abaixo só aparecem quando o layout é multipage.
    ============================================================ --}}

    @if ($layoutType === 'multipage')

        {{-- ========================================================
            SOBRE NÓS
        ======================================================== --}}

        @if ($hasAnyModule([
            'about',
            'benefits',
            'planNetwork',
            'mission',
            'representatives',
            'videos',
            'service_locations'
        ]))

            <div class="mb-2">

                <div class="d-flex align-items-center gap-2 mb-2">

                    <span class="badge bg-info bg-opacity-10 text-info p-2">
                        <i class="mdi mdi-help-circle fs-5"></i>
                    </span>

                    <h5 class="mb-0 fw-semibold">
                        Sobre Nós
                    </h5>

                </div>

                <div class="row g-2">

                    @if ($hasModule('about') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('sobre nos.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.about.index'),
                            'icon' => 'mdi-help-circle',
                            'title' => 'Sobre Nós'
                        ])

                    @endif


                    @if ($hasModule('benefits') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('parametro.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.benefitTopic.index'),
                            'icon' => 'mdi-star',
                            'title' => 'Parâmetros'
                        ])

                    @endif


                    @if ($hasModule('mission') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('missao visao e valores.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.report.index'),
                            'icon' => 'mdi-target',
                            'title' => 'Missão, Visão e Valores'
                        ])

                    @endif
                    
                    @if ($hasModule('planNetwork') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('plano.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.planNetwork.index'),
                            'icon' => 'mdi-target',
                            'title' => 'Planos de Internet'
                        ])

                    @endif

                    

                    @if ($hasModule('representatives') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('representantes.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.direction.index'),
                            'icon' => 'mdi-account-group',
                            'title' => 'Representantes'
                        ])

                    @endif


                    @if ($hasModule('videos') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('video.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.video.index'),
                            'icon' => 'mdi-play-circle',
                            'title' => 'Vídeos'
                        ])

                    @endif


                    @if ($hasModule('service_locations') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('onde atendemos.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.serviceLocation.index'),
                            'icon' => 'mdi-map-marker',
                            'title' => 'Sessão Onde Atendemos'
                        ])

                    @endif

                </div>
            </div>

        @endif


        {{-- ========================================================
            PRODUTOS
        ======================================================== --}}

        @if ($hasAnyModule([
            'brands',
            'product_categories',
            'products'
        ]))

            <div class="mb-2">

                <div class="d-flex align-items-center gap-2 mb-2">

                    <span class="badge bg-warning bg-opacity-10 text-warning p-2">
                        <i class="mdi mdi-toolbox fs-5"></i>
                    </span>

                    <h5 class="mb-0 fw-semibold">
                        Produtos
                    </h5>

                </div>

                <div class="row g-2">

                    @if ($hasModule('brands') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('marcas.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.brand.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Marcas'
                        ])

                    @endif


                    @if ($hasModule('product_categories') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('categorias de produtos.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.productCategory.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Categorias dos produtos'
                        ])

                    @endif


                    @if ($hasModule('products') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('produtos.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.product.index'),
                            'icon' => 'mdi-package-variant',
                            'title' => 'Produtos'
                        ])

                    @endif

                </div>
            </div>

        @endif


        {{-- ========================================================
            NOTÍCIAS
        ======================================================== --}}

        @if ($hasAnyModule([
            'blog_categories',
            'blog'
        ]))

            <div class="mb-2">

                <div class="d-flex align-items-center gap-2 mb-2">

                    <span class="badge btn-green-whi bg-opacity-10 text-success p-2">
                        <i class="mdi mdi-newspaper-variant fs-5"></i>
                    </span>

                    <h5 class="mb-0 fw-semibold">
                        Notícias
                    </h5>

                </div>

                <div class="row g-2">

                    @if ($hasModule('blog_categories') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('categorias de noticias.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.blogCategory.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Categorias das Notícias'
                        ])

                    @endif


                    @if ($hasModule('blog') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('noticias.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.blog.index'),
                            'icon' => 'mdi-newspaper-variant',
                            'title' => 'Notícias'
                        ])

                    @endif

                </div>
            </div>

        @endif

        {{-- ========================================================
            PARCEIROS
        ======================================================== --}}

        @if ($hasAnyModule([
            'partner',
        ]))

            <div class="mb-2">

                <div class="d-flex align-items-center gap-2 mb-2">

                    <span class="badge btn-green-whi bg-opacity-10 text-success p-2">
                        <i class="mdi mdi-newspaper-variant fs-5"></i>
                    </span>

                    <h5 class="mb-0 fw-semibold">
                        Parceiros
                    </h5>

                </div>

                <div class="row g-2">

                    @if ($hasModule('partner') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('parceiro.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.partner.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Parceiros'
                        ])

                    @endif

                </div>
            </div>

        @endif


        {{-- ========================================================
            CONTATO
        ======================================================== --}}

        @if ($hasAnyModule([
            'contact',
            'contact_leads',
            'download_leads'
        ]))

            <div class="mb-2">

                <div class="d-flex align-items-center gap-2 mb-2">

                    <span class="badge bg-danger bg-opacity-10 text-danger p-2">
                        <i class="mdi mdi-card-account-mail-outline fs-5"></i>
                    </span>

                    <h5 class="mb-0 fw-semibold">
                        Contato
                    </h5>

                </div>

                <div class="row g-2">

                    @if ($hasModule('contact') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('contato.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.contact.index'),
                            'icon' => 'mdi-card-account-mail-outline',
                            'title' => 'Contato'
                        ])

                    @endif


                    @if ($hasModule('contact_leads') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('lead contato.visualizar')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.formIndex.index'),
                            'icon' => 'mdi-account-box-outline',
                            'title' => 'Lead Contato'
                        ])

                    @endif


                    @if ($hasModule('download_leads') &&
                        (Auth::user()->hasRole('Super') ||
                        Auth::user()->can('usuario.tornar usuario master')))

                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.leadDownload.index'),
                            'icon' => 'mdi-download',
                            'title' => 'Lead Download'
                        ])

                    @endif

                </div>
            </div>

        @endif

    @endif


    {{-- ============================================================
        SMTP
    ============================================================ --}}

    @if ($theme->hasModule('config_smtp') &&
        (Auth::user()->hasRole('Super')))

        <div class="mb-2">

            <div class="d-flex align-items-center gap-2 mb-2">

                <span class="badge bg-secondary bg-opacity-10 text-secondary p-2">
                    <i class="mdi mdi-email-edit fs-5"></i>
                </span>

                <h5 class="mb-0 fw-semibold">
                    {{ __('dashboard.setting_smtp') }}
                </h5>

            </div>

            <div class="row g-2">

                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.settingEmail.index'),
                    'icon' => 'mdi-email',
                    'title' => __('dashboard.setting_email')
                ])

            </div>
        </div>

    @endif


    {{-- ============================================================
        SEGURANÇA
    ============================================================ --}}

    @if (Auth::user()->hasRole('Super') ||
        Auth::user()->can('usuario.tornar usuario master') ||
        Auth::user()->can('auditoria.visualizar') ||
        Auth::user()->can('usuario.visualizar') ||
        Auth::user()->can('grupo.visualizar'))

        <div class="mb-2">

            <div class="d-flex align-items-center gap-2 mb-2">

                <span class="badge bg-dark bg-opacity-10 text-dark p-2">
                    <i class="mdi mdi-security fs-5"></i>
                </span>

                <h5 class="mb-0 fw-semibold">
                    {{ __('dashboard.security_and_access_control') }}
                </h5>

            </div>

            <div class="row g-2">

                @if ($theme->hasModule('audit') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('auditoria.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.audit.index'),
                        'icon' => 'mdi-clipboard-text',
                        'title' => __('dashboard.audit')
                    ])

                @endif


                @if ($theme->hasModule('permissions') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('grupo.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.group.index'),
                        'icon' => 'mdi-account-group',
                        'title' => __('dashboard.group_and_permission')
                    ])

                @endif


                @if ($theme->hasModule('users') &&
                    (Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.visualizar')))

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.user.index'),
                        'icon' => 'mdi-account-multiple',
                        'title' => __('dashboard.users')
                    ])

                @endif

            </div>
        </div>

    @endif


    {{-- ============================================================
        CONFIGURAÇÃO DO TEMA
    ============================================================ --}}

    @if ($theme->hasModule('config_theme') &&
        (Auth::user()->hasRole('Super') ||
        Auth::user()->can('usuario.tornar usuario master') ||
        Auth::user()->can('configuracao do tema.visualizar')))

        <div class="mb-2">

            <div class="d-flex align-items-center gap-2 mb-2">

                <span class="badge bg-purple bg-opacity-10 text-purple p-2">
                    <i class="mdi mdi-palette fs-5"></i>
                </span>

                <h5 class="mb-0 fw-semibold">
                    Configuração do Tema
                </h5>

            </div>

            <div class="row g-2">

                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.tenant.index'),
                    'icon' => 'mdi-palette',
                    'title' => 'Configuração do Tema'
                ])

            </div>
        </div>

    @endif


    {{-- ============================================================
        SEO E PLANOS
    ============================================================ --}}

    @if (Auth::user()->hasRole('Super'))

        <div class="mb-2">

            <div class="d-flex align-items-center gap-2 mb-2">

                <span class="badge bg-purple bg-opacity-10 text-purple p-2">
                    <i class="mdi mdi-google-analytics fs-5"></i>
                </span>

                <h5 class="mb-0 fw-semibold">
                    SEO e Planos
                </h5>

            </div>

            <div class="row g-2">

                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.seoGoogle.index'),
                    'icon' => 'mdi-google-analytics',
                    'title' => 'Seo Google'
                ])

                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.plans.index'),
                    'icon' => 'mdi-credit-card',
                    'title' => 'Plano contratado'
                ])

                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.tenants.index'),
                    'icon' => 'mdi-account-multiple',
                    'title' => 'Cliente/Tenant'
                ])

            </div>
        </div>

    @endif


    {{-- ============================================================
        FOOTER
    ============================================================ --}}

    <footer class="footer">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">

                    <div>

                        <a
                            href="https://www.whi.dev.br/"
                            target="_blank"
                            rel="noopener noreferrer"
                            style="color:#94a0ad;"
                        >
                            <script>
                                document.write(new Date().getFullYear())
                            </script>

                            © WHI - Web de Alta Inspiração

                        </a>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="d-none d-md-flex gap-4 align-items-center justify-content-md-end footer-links">

                        <a
                            href="https://www.whi.dev.br/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-muted"
                        >
                            Sobre a WHI
                        </a>

                        <a
                            href="https://wa.me/5571992768360"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-muted"
                        >
                            Fale conosco
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </footer>


    @include('admin.loadPage.loading')

@endsection