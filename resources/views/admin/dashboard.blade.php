@extends('admin.core.admin')

@section('content')

    @php
        /*
        |--------------------------------------------------------------------------
        | Tema atual
        |--------------------------------------------------------------------------
        */
        $templateSlug = $theme->slug ?? 'default';
        $layoutType = $theme->layout_type ?? 'onepage';

        /*
        |--------------------------------------------------------------------------
        | Módulos do layout atual
        |--------------------------------------------------------------------------
        |
        | A configuração agora é específica por:
        |
        | template
        |   -> layout
        |       -> template variation
        |           -> página
        |               -> módulos
        |
        | Exemplo:
        |
        | ecommerce
        |   multipage
        |       tp-01
        |           home
        |           about
        |           products
        |           contact
        |
        |--------------------------------------------------------------------------
        */
        $layoutConfig = config(
            "template_modules.{$templateSlug}.{$layoutType}.{$theme->template_variation}",
            []
        );

        /*
        |--------------------------------------------------------------------------
        | Fallback caso não exista configuração específica da variação
        |--------------------------------------------------------------------------
        */
        if (empty($layoutConfig)) {
            $layoutConfig = config(
                "template_modules.{$templateSlug}.{$layoutType}.tp-01",
                []
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Páginas e módulos disponíveis
        |--------------------------------------------------------------------------
        |
        | No OnePage tudo pertence à Home.
        |
        | No Multipage cada chave representa uma página real do template.
        |
        |--------------------------------------------------------------------------
        */
        if ($layoutType === 'onepage') {
            $pageModules = [
                'home' => $layoutConfig['home'] ?? [],
            ];
        } else {
            $pageModules = $layoutConfig;
        }

        /*
        |--------------------------------------------------------------------------
        | Verifica se um módulo existe em qualquer página do layout
        |--------------------------------------------------------------------------
        */
        $hasModule = function (string $module) use ($pageModules, $theme) {
            if ($theme->hasModule($module)) {
                return true;
            }

            foreach ($pageModules as $modules) {
                if (is_array($modules) && in_array($module, $modules, true)) {
                    return true;
                }
            }

            return false;
        };

        /*
        |--------------------------------------------------------------------------
        | Verifica se existe pelo menos um módulo em determinada página
        |--------------------------------------------------------------------------
        */
        $hasPageModules = function (string $page) use ($pageModules) {
            return !empty($pageModules[$page]);
        };

        /*
        |--------------------------------------------------------------------------
        | Verifica se existe pelo menos um dos módulos informados em uma página
        |--------------------------------------------------------------------------
        */
        $hasAnyPageModule = function (string $page, array $modules) use ($pageModules) {
            $available = $pageModules[$page] ?? [];

            foreach ($modules as $module) {
                if (in_array($module, $available, true)) {
                    return true;
                }
            }

            return false;
        };

        /*
        |--------------------------------------------------------------------------
        | Usuário atual
        |--------------------------------------------------------------------------
        */
        $user = Auth::user();
        $isSuper = $user->hasRole('Super');

        /*
        |--------------------------------------------------------------------------
        | Módulos da Home
        |--------------------------------------------------------------------------
        */
        $homeModules = $pageModules['home'] ?? [];

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
    @if ($hasPageModules('home'))

        <div class="mb-2">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge bg-primary bg-opacity-10 text-primary p-2">
                    <i class="mdi mdi-home fs-5"></i>
                </span>
                <h5 class="mb-0 fw-semibold">Home</h5>
            </div>

            <div class="row g-2">

                @if (in_array('slides', $homeModules, true) && ($isSuper || $user->can('slide.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.slide.index'),
                        'icon' => 'mdi-image-size-select-actual',
                        'title' => 'Slides'
                    ])
                @endif

                @if (in_array('topics', $homeModules, true) && ($isSuper || $user->can('topico.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.topic.index'),
                        'icon' => 'mdi-format-list-bulleted',
                        'title' => 'Tópicos'
                    ])
                @endif

                @if (in_array('statute', $homeModules, true) && ($isSuper || $user->can('passo a passo.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.statute.index'),
                        'icon' => 'mdi-file-document',
                        'title' => 'Passo a passo'
                    ])
                @endif

                @if (in_array('letsgo', $homeModules, true) && ($isSuper || $user->can('sesssao lets go.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.letsgo.index'),
                        'icon' => 'mdi-alert-circle',
                        'title' => 'Sessão Lets Go'
                    ])
                @endif

                @if (in_array('faq_session', $homeModules, true) && ($isSuper || $user->can('sesssao faq.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.sessaoFaq.index'),
                        'icon' => 'mdi-help-circle',
                        'title' => 'Sessão FAQ'
                    ])
                @endif

                @if (in_array('faq', $homeModules, true) && ($isSuper || $user->can('perguntas e respostas.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.faq.index'),
                        'icon' => 'mdi-comment-question',
                        'title' => 'Perguntas/Respostas'
                    ])
                @endif

                @if (in_array('testimonials', $homeModules, true) && ($isSuper || $user->can('depoimento.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.depoiment.index'),
                        'icon' => 'mdi-account-voice',
                        'title' => 'Depoimentos'
                    ])
                @endif

                @if (in_array('services', $homeModules, true) && ($isSuper || $user->can('servico.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.serviceItem.index'),
                        'icon' => 'mdi-briefcase-outline',
                        'title' => 'Serviços'
                    ])
                @endif

                @if (in_array('gallery', $homeModules, true) && ($isSuper || $user->can('galeria.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.gallery.index'),
                        'icon' => 'mdi-image-multiple',
                        'title' => 'Galeria'
                    ])
                @endif

                @if (in_array('about', $homeModules, true) && ($isSuper || $user->can('sobre nos.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.about.index'),
                        'icon' => 'mdi-help-circle',
                        'title' => 'Sobre Nós'
                    ])
                @endif

                @if (in_array('benefits', $homeModules, true) && ($isSuper || $user->can('parametro.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.benefitTopic.index'),
                        'icon' => 'mdi-star',
                        'title' => 'Parâmetros'
                    ])
                @endif

                @if (in_array('mission', $homeModules, true) && ($isSuper || $user->can('missao visao e valores.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.report.index'),
                        'icon' => 'mdi-target',
                        'title' => 'Missão, Visão e Valores'
                    ])
                @endif

                @if (in_array('planNetworkCategory', $homeModules, true) && ($isSuper || $user->can('categorias do plano.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.planNetworkCategory.index'),
                        'icon' => 'mdi-shape',
                        'title' => 'Categorias do Plano'
                    ])
                @endif

                @if (in_array('planNetwork', $homeModules, true) && ($isSuper || $user->can('plano.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.planNetwork.index'),
                        'icon' => 'mdi-wifi',
                        'title' => 'Planos de Internet'
                    ])
                @endif

                @if (in_array('representatives', $homeModules, true) && ($isSuper || $user->can('representantes.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.direction.index'),
                        'icon' => 'mdi-account-group',
                        'title' => 'Representantes'
                    ])
                @endif

                @if (in_array('videos', $homeModules, true) && ($isSuper || $user->can('video.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.video.index'),
                        'icon' => 'mdi-play-circle',
                        'title' => 'Vídeos'
                    ])
                @endif

                @if (in_array('service_locations', $homeModules, true) && ($isSuper || $user->can('onde atendemos.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.serviceLocation.index'),
                        'icon' => 'mdi-map-marker',
                        'title' => 'Sessão Onde Atendemos'
                    ])
                @endif

                @if (in_array('brands', $homeModules, true) && ($isSuper || $user->can('marcas.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.brand.index'),
                        'icon' => 'mdi-tag-multiple',
                        'title' => 'Marcas'
                    ])
                @endif

                @if (in_array('product_categories', $homeModules, true) && ($isSuper || $user->can('categorias de produtos.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.productCategory.index'),
                        'icon' => 'mdi-tag-multiple',
                        'title' => 'Categorias dos produtos'
                    ])
                @endif

                @if (in_array('products', $homeModules, true) && ($isSuper || $user->can('produtos.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.product.index'),
                        'icon' => 'mdi-package-variant',
                        'title' => 'Produtos'
                    ])
                @endif

                @if (in_array('partner', $homeModules, true) && ($isSuper || $user->can('parceiro.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.partner.index'),
                        'icon' => 'mdi-handshake-outline',
                        'title' => 'Parceiros'
                    ])
                @endif

                @if (in_array('blog_categories', $homeModules, true) && ($isSuper || $user->can('categorias de noticias.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.blogCategory.index'),
                        'icon' => 'mdi-tag-multiple',
                        'title' => 'Categorias das Notícias'
                    ])
                @endif

                @if (in_array('blog', $homeModules, true) && ($isSuper || $user->can('noticias.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.blog.index'),
                        'icon' => 'mdi-newspaper-variant',
                        'title' => 'Notícias'
                    ])
                @endif

                @if (in_array('contact', $homeModules, true) && ($isSuper || $user->can('contato.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.contact.index'),
                        'icon' => 'mdi-card-account-mail-outline',
                        'title' => 'Contato'
                    ])
                @endif

                @if (in_array('contact_leads', $homeModules, true) && ($isSuper || $user->can('lead contato.visualizar')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.formIndex.index'),
                        'icon' => 'mdi-account-box-outline',
                        'title' => 'Lead Contato'
                    ])
                @endif

                @if (in_array('download_leads', $homeModules, true) && ($isSuper || $user->can('usuario.tornar usuario master')))
                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.leadDownload.index'),
                        'icon' => 'mdi-download',
                        'title' => 'Lead Download'
                    ])
                @endif

            </div>
        </div>

    @endif

    {{-- ============================================================
        MULTIPAGE - PÁGINAS DINÂMICAS
    ============================================================ --}}
    @if ($layoutType === 'multipage')

        {{-- ========================================================
            SOBRE NÓS
        ======================================================== --}}
        @if ($hasPageModules('about'))

            @php $aboutModules = $pageModules['about']; @endphp

            <div class="mb-2">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-info bg-opacity-10 text-info p-2">
                        <i class="mdi mdi-help-circle fs-5"></i>
                    </span>
                    <h5 class="mb-0 fw-semibold">Sobre Nós</h5>
                </div>

                <div class="row g-2">

                    @if (in_array('about', $aboutModules, true) && ($isSuper || $user->can('sobre nos.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.about.index'),
                            'icon' => 'mdi-help-circle',
                            'title' => 'Sobre Nós'
                        ])
                    @endif

                    @if (in_array('benefits', $aboutModules, true) && ($isSuper || $user->can('parametro.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.benefitTopic.index'),
                            'icon' => 'mdi-star',
                            'title' => 'Parâmetros'
                        ])
                    @endif

                    @if (in_array('mission', $aboutModules, true) && ($isSuper || $user->can('missao visao e valores.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.report.index'),
                            'icon' => 'mdi-target',
                            'title' => 'Missão, Visão e Valores'
                        ])
                    @endif

                    @if (in_array('planNetworkCategory', $aboutModules, true) && ($isSuper || $user->can('categorias do plano.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.planNetworkCategory.index'),
                            'icon' => 'mdi-shape',
                            'title' => 'Categorias do Plano'
                        ])
                    @endif

                    @if (in_array('planNetwork', $aboutModules, true) && ($isSuper || $user->can('plano.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.planNetwork.index'),
                            'icon' => 'mdi-wifi',
                            'title' => 'Planos de Internet'
                        ])
                    @endif

                    @if (in_array('representatives', $aboutModules, true) && ($isSuper || $user->can('representantes.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.direction.index'),
                            'icon' => 'mdi-account-group',
                            'title' => 'Representantes'
                        ])
                    @endif

                    @if (in_array('videos', $aboutModules, true) && ($isSuper || $user->can('video.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.video.index'),
                            'icon' => 'mdi-play-circle',
                            'title' => 'Vídeos'
                        ])
                    @endif

                    @if (in_array('service_locations', $aboutModules, true) && ($isSuper || $user->can('onde atendemos.visualizar')))
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
        @if ($hasPageModules('products'))

            @php $productModules = $pageModules['products']; @endphp

            <div class="mb-2">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-warning bg-opacity-10 text-warning p-2">
                        <i class="mdi mdi-toolbox fs-5"></i>
                    </span>
                    <h5 class="mb-0 fw-semibold">Produtos</h5>
                </div>

                <div class="row g-2">

                    @if (in_array('brands', $productModules, true) && ($isSuper || $user->can('marcas.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.brand.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Marcas'
                        ])
                    @endif

                    @if (in_array('product_categories', $productModules, true) && ($isSuper || $user->can('categorias de produtos.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.productCategory.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Categorias dos produtos'
                        ])
                    @endif

                    @if (in_array('products', $productModules, true) && ($isSuper || $user->can('produtos.visualizar')))
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
        @if ($hasPageModules('blog'))

            @php $blogModules = $pageModules['blog']; @endphp

            <div class="mb-2">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge btn-green-whi bg-opacity-10 text-success p-2">
                        <i class="mdi mdi-newspaper-variant fs-5"></i>
                    </span>
                    <h5 class="mb-0 fw-semibold">Notícias</h5>
                </div>

                <div class="row g-2">

                    @if (in_array('blog_categories', $blogModules, true) && ($isSuper || $user->can('categorias de noticias.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.blogCategory.index'),
                            'icon' => 'mdi-tag-multiple',
                            'title' => 'Categorias das Notícias'
                        ])
                    @endif

                    @if (in_array('blog', $blogModules, true) && ($isSuper || $user->can('noticias.visualizar')))
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
        @if ($hasPageModules('partner'))

            @php $partnerModules = $pageModules['partner']; @endphp

            <div class="mb-2">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge btn-green-whi bg-opacity-10 text-success p-2">
                        <i class="mdi mdi-handshake-outline fs-5"></i>
                    </span>
                    <h5 class="mb-0 fw-semibold">Parceiros</h5>
                </div>

                <div class="row g-2">

                    @if (in_array('partner', $partnerModules, true) && ($isSuper || $user->can('parceiro.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.partner.index'),
                            'icon' => 'mdi-handshake-outline',
                            'title' => 'Parceiros'
                        ])
                    @endif

                </div>
            </div>

        @endif

        {{-- ========================================================
            CONTATO
        ======================================================== --}}
        @if ($hasPageModules('contact'))

            @php $contactModules = $pageModules['contact']; @endphp

            <div class="mb-2">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-danger bg-opacity-10 text-danger p-2">
                        <i class="mdi mdi-card-account-mail-outline fs-5"></i>
                    </span>
                    <h5 class="mb-0 fw-semibold">Contato</h5>
                </div>

                <div class="row g-2">

                    @if (in_array('contact', $contactModules, true) && ($isSuper || $user->can('contato.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.contact.index'),
                            'icon' => 'mdi-card-account-mail-outline',
                            'title' => 'Contato'
                        ])
                    @endif

                    @if (in_array('contact_leads', $contactModules, true) && ($isSuper || $user->can('lead contato.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.formIndex.index'),
                            'icon' => 'mdi-account-box-outline',
                            'title' => 'Lead Contato'
                        ])
                    @endif

                    @if (in_array('download_leads', $contactModules, true) && ($isSuper || $user->can('usuario.tornar usuario master')))
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
    @if ($theme->hasModule('config_smtp') && $isSuper)

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
    @if (
        $theme->hasModule('audit') ||
        $theme->hasModule('permissions') ||
        $theme->hasModule('users')
    )

        @if (
            $isSuper ||
            $user->can('usuario.tornar usuario master') ||
            ($theme->hasModule('audit') && $user->can('auditoria.visualizar')) ||
            ($theme->hasModule('users') && $user->can('usuario.visualizar')) ||
            ($theme->hasModule('permissions') && $user->can('grupo.visualizar'))
        )

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

                    @if ($theme->hasModule('audit') && ($isSuper || $user->can('auditoria.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.audit.index'),
                            'icon' => 'mdi-clipboard-text',
                            'title' => __('dashboard.audit')
                        ])
                    @endif

                    @if ($theme->hasModule('permissions') && ($isSuper || $user->can('grupo.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.group.index'),
                            'icon' => 'mdi-account-group',
                            'title' => __('dashboard.group_and_permission')
                        ])
                    @endif

                    @if ($theme->hasModule('users') && ($isSuper || $user->can('usuario.visualizar')))
                        @include('admin.components.dashboard-card', [
                            'route' => route('admin.dashboard.user.index'),
                            'icon' => 'mdi-account-multiple',
                            'title' => __('dashboard.users')
                        ])
                    @endif

                </div>
            </div>

        @endif

    @endif

    {{-- ============================================================
        CONFIGURAÇÃO DO TEMA
    ============================================================ --}}
    @if (
        $theme->hasModule('config_theme') &&
        (
            $isSuper ||
            $user->can('usuario.tornar usuario master') ||
            $user->can('configuracao do tema.visualizar')
        )
    )

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
    @if ($isSuper)

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
