@extends('admin.core.admin')

@section('content')

{{-- @php
    dd([
        'theme_class' => get_class($theme),
        'theme_slug' => $theme->slug,
        'current' => $theme->current(),

        'slides' => $theme->hasModule('slides'),
        'topics' => $theme->hasModule('topics'),
        'statute' => $theme->hasModule('statute'),
        'letsgo' => $theme->hasModule('letsgo'),
        'faq_session' => $theme->hasModule('faq_session'),
        'faq' => $theme->hasModule('faq'),
        'testimonials' => $theme->hasModule('testimonials'),

        'available_modules' => $theme->availableModules(),

        'config' => config("template_modules.{$theme->slug}"),
    ]);
@endphp --}}
    {{-- ============================================================
        PAGE TITLE
    ============================================================ --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">
                            {{ __('dashboard.title_dashboard') }}
                        </li>
                    </ol>
                </div>

                <h4 class="page-title">
                    {{ __('dashboard.title_dashboard') }}
                </h4>
            </div>
        </div>
    </div>


    {{-- ============================================================
        HOME
    ============================================================ --}}
    @if (
        $theme->hasAnyModule([
            'slides',
            'topics',
            'statute',
            'letsgo',
            'faq_session',
            'faq',
            'testimonials',
        ])
    )

        <div class="row">

            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">
                        <i class="mdi mdi-home"></i>
                        Home
                    </h4>
                </div>
            </div>


            {{-- Slides --}}
            @if (
                $theme->hasModule('slides') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('slide.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.slide.index'),
                    'icon' => 'mdi-image-size-select-actual',
                    'title' => 'Slides'
                ])
            @endif


            {{-- Tópicos --}}
            @if (
                $theme->hasModule('topics') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('topico.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.topic.index'),
                    'icon' => 'mdi-format-list-bulleted',
                    'title' => 'Tópicos'
                ])
            @endif


            {{-- Passo a passo --}}
            @if (
                $theme->hasModule('statute') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('passo a passo.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.statute.index'),
                    'icon' => 'mdi-file-document',
                    'title' => 'Passo a passo'
                ])
            @endif


            {{-- Sessão Lets Go --}}
            @if (
                $theme->hasModule('letsgo') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('sesssao lets go.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.letsgo.index'),
                    'icon' => 'mdi-alert-circle',
                    'title' => 'Sessão Lets Go'
                ])
            @endif


            {{-- Sessão FAQ --}}
            @if (
                $theme->hasModule('faq_session') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('sesssao faq.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.sessaoFaq.index'),
                    'icon' => 'mdi-help-circle',
                    'title' => 'Sessão FAQ'
                ])
            @endif


            {{-- Perguntas / Respostas --}}
            @if (
                $theme->hasModule('faq') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('perguntas e respostas.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.faq.index'),
                    'icon' => 'mdi-comment-question',
                    'title' => 'Perguntas/Respostas'
                ])
            @endif


            {{-- Depoimentos --}}
            @if (
                $theme->hasModule('testimonials') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('depoimento.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.depoiment.index'),
                    'icon' => 'mdi-account-voice',
                    'title' => 'Depoimentos'
                ])
            @endif

        </div>

    @endif


    {{-- ============================================================
        SOBRE NÓS
    ============================================================ --}}
    @if (
        $theme->hasAnyModule([
            'about',
            'benefits',
            'mission',
            'representatives',
            'videos',
            'service_locations',
        ])
    )

        <div class="row">

            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">
                        <i class="mdi mdi-help-circle"></i>
                        Sobre Nós
                    </h4>
                </div>
            </div>


            {{-- Sobre Nós --}}
            @if (
                $theme->hasModule('about') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('sobre nos.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.about.index'),
                    'icon' => 'mdi-help-circle',
                    'title' => 'Sobre Nós'
                ])
            @endif


            {{-- Parâmetros --}}
            @if (
                $theme->hasModule('benefits') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('parametro.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.benefitTopic.index'),
                    'icon' => 'mdi-star',
                    'title' => 'Parâmetros'
                ])
            @endif


            {{-- Missão, Visão e Valores --}}
            @if (
                $theme->hasModule('mission') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('missao visao e valores.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.report.index'),
                    'icon' => 'mdi-target',
                    'title' => 'Missão, Visão e Valores'
                ])
            @endif


            {{-- Representantes --}}
            @if (
                $theme->hasModule('representatives') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('representantes.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.direction.index'),
                    'icon' => 'mdi-account-group',
                    'title' => 'Representantes'
                ])
            @endif


            {{-- Vídeos --}}
            @if (
                $theme->hasModule('videos') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('video.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.video.index'),
                    'icon' => 'mdi-play-circle',
                    'title' => 'Vídeos'
                ])
            @endif


            {{-- Onde atendemos --}}
            @if (
                $theme->hasModule('service_locations') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('onde atendemos.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.serviceLocation.index'),
                    'icon' => 'mdi-map-marker',
                    'title' => 'Sessão Onde Atendemos'
                ])
            @endif

        </div>

    @endif


    {{-- ============================================================
        PRODUTOS
    ============================================================ --}}
    @if (
        $theme->hasAnyModule([
            'brands',
            'product_categories',
            'products',
        ])
    )

        <div class="row">

            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">
                        <i class="mdi mdi-toolbox"></i>
                        Produtos
                    </h4>
                </div>
            </div>


            {{-- Marcas --}}
            @if (
                $theme->hasModule('brands') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('marcas.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.brand.index'),
                    'icon' => 'mdi-tag-multiple',
                    'title' => 'Marcas'
                ])
            @endif


            {{-- Categorias --}}
            @if (
                $theme->hasModule('product_categories') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('categorias de produtos.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.productCategory.index'),
                    'icon' => 'mdi-tag-multiple',
                    'title' => 'Categorias dos produtos'
                ])
            @endif


            {{-- Produtos --}}
            @if (
                $theme->hasModule('products') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('produtos.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.product.index'),
                    'icon' => 'mdi-package-variant',
                    'title' => 'Produtos'
                ])
            @endif

        </div>

    @endif


    {{-- ============================================================
        NOTÍCIAS
    ============================================================ --}}
    @if (
        $theme->hasAnyModule([
            'blog_categories',
            'blog',
        ])
    )

        <div class="row">

            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">
                        <i class="mdi mdi-newspaper-variant"></i>
                        Notícias
                    </h4>
                </div>
            </div>


            {{-- Categorias das Notícias --}}
            @if (
                $theme->hasModule('blog_categories') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('categorias de noticias.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.blogCategory.index'),
                    'icon' => 'mdi-tag-multiple',
                    'title' => 'Categorias das Notícias'
                ])
            @endif


            {{-- Notícias --}}
            @if (
                $theme->hasModule('blog') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('noticias.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.blog.index'),
                    'icon' => 'mdi-newspaper-variant',
                    'title' => 'Notícias'
                ])
            @endif

        </div>

    @endif


    {{-- ============================================================
        CONTATO
    ============================================================ --}}
    @if (
        $theme->hasAnyModule([
            'contact',
            'contact_leads',
            'download_leads',
        ])
    )

        <div class="row">

            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">
                        <i class="mdi mdi-card-account-mail-outline"></i>
                        Contato
                    </h4>
                </div>
            </div>


            {{-- Contato --}}
            @if (
                $theme->hasModule('contact') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('contato.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.contact.index'),
                    'icon' => 'mdi-card-account-mail-outline',
                    'title' => 'Contato'
                ])
            @endif


            {{-- Lead Contato --}}
            @if (
                $theme->hasModule('contact_leads') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master') ||
                    Auth::user()->can('lead contato.visualizar')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.formIndex.index'),
                    'icon' => 'mdi-account-box-outline',
                    'title' => 'Lead Contato'
                ])
            @endif


            {{-- Lead Download --}}
            @if (
                $theme->hasModule('download_leads') &&
                (
                    Auth::user()->hasRole('Super') ||
                    Auth::user()->can('usuario.tornar usuario master')
                )
            )
                @include('admin.components.dashboard-card', [
                    'route' => route('admin.dashboard.leadDownload.index'),
                    'icon' => 'mdi-download',
                    'title' => 'Lead Download'
                ])
            @endif

        </div>

    @endif

    {{-- ============================================================
        SMTP
    ============================================================ --}}
    @if (
        $theme->hasModule('config_smtp') &&
        (
            Auth::user()->hasRole('Super') ||
            Auth::user()->can('usuario.tornar usuario master') ||
            Auth::user()->can('email.visualizar')
        )
    )

        <div class="row">

            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">
                        <i class="mdi mdi-email-edit"></i>
                        {{ __('dashboard.setting_smtp') }}
                    </h4>
                </div>
            </div>

            @include('admin.components.dashboard-card', [
                'route' => route('admin.dashboard.settingEmail.index'),
                'icon' => 'mdi-email',
                'title' => __('dashboard.setting_email')
            ])

        </div>

    @endif

    {{-- ============================================================
        SEGURANÇA
    ============================================================ --}}
    @if (
        $theme->hasAnyModule([
            'audit',
            'permissions',
            'users',
        ])
    )

        @if (
            Auth::user()->hasRole('Super') ||
            Auth::user()->can('usuario.tornar usuario master') ||
            Auth::user()->can('auditoria.visualizar') ||
            Auth::user()->can('usuario.visualizar') ||
            Auth::user()->can('grupo.visualizar')
        )

            <div class="row">

                <div class="col-12">

                    <div class="page-title-box">
                        <h4 class="page-title">
                            <i class="mdi mdi-security"></i>
                            {{ __('dashboard.security_and_access_control') }}
                        </h4>
                    </div>

                </div>


                {{-- ====================================================
                    AUDITORIA
                ==================================================== --}}
                @if (
                    $theme->hasModule('audit') &&
                    (
                        Auth::user()->hasRole('Super') ||
                        Auth::user()->can('usuario.tornar usuario master') ||
                        Auth::user()->can('auditoria.visualizar')
                    )
                )

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.audit.index'),
                        'icon' => 'mdi-clipboard-text',
                        'title' => __('dashboard.audit')
                    ])

                @endif


                {{-- ====================================================
                    GRUPOS / PERMISSÕES
                ==================================================== --}}
                @if (
                    $theme->hasModule('permissions') &&
                    (
                        Auth::user()->hasRole('Super') ||
                        Auth::user()->can('usuario.tornar usuario master') ||
                        Auth::user()->can('grupo.visualizar')
                    )
                )

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.group.index'),
                        'icon' => 'mdi-account-group',
                        'title' => __('dashboard.group_and_permission')
                    ])

                @endif


                {{-- ====================================================
                    USUÁRIOS
                ==================================================== --}}
                @if (
                    $theme->hasModule('users') &&
                    (
                        Auth::user()->hasRole('Super') ||
                        Auth::user()->can('usuario.tornar usuario master') ||
                        Auth::user()->can('usuario.visualizar')
                    )
                )

                    @include('admin.components.dashboard-card', [
                        'route' => route('admin.dashboard.user.index'),
                        'icon' => 'mdi-account-multiple',
                        'title' => __('dashboard.users')
                    ])

                @endif

            </div>

        @endif

    @endif


    {{-- ============================================================
        CONFIGURAÇÃO DO TEMA
        NÃO DEPENDE DO TEMPLATE
    ============================================================ --}}
    @if (
        Auth::user()->hasRole('Super') ||
        Auth::user()->can('usuario.tornar usuario master')
    )

        <div class="row">

            <div class="col-12">

                <div class="page-title-box">
                    <h4 class="page-title">
                        <i class="mdi mdi-palette"></i>
                        Configuração do Tema
                    </h4>
                </div>

            </div>

            @include('admin.components.dashboard-card', [
                'route' => route('admin.dashboard.tenant.index'),
                'icon' => 'mdi-palette',
                'title' => 'Configuração do Tema'
            ])

        </div>

    @endif

    <div class="row">

        <div class="col-12">

            <div class="page-title-box">
                <h4 class="page-title">
                    <i class="mdi mdi-palette"></i>
                    Seo Google
                </h4>
            </div>

        </div>

        @include('admin.components.dashboard-card', [
            'route' => route('admin.dashboard.seoGoogle.index'),
            'icon' => 'mdi-palette',
            'title' => 'Seo Google'
        ])

    </div>
        <div class="row">

            <div class="col-12">

                <div class="page-title-box">
                    <h4 class="page-title">
                        <i class="mdi mdi-palette"></i>
                        Plano contratado
                    </h4>
                </div>

            </div>

            @include('admin.components.dashboard-card', [
                'route' => route('admin.dashboard.plans.index'),
                'icon' => 'mdi-palette',
                'title' => 'Plano contratado'
            ])

            @include('admin.components.dashboard-card', [
                'route' => route('admin.dashboard.tenants.index'),
                'icon' => 'mdi-palette',
                'title' => 'Cliente/Tenant'
            ])

        </div>

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
                        >
                            Sobre a WHI
                        </a>

                        <a
                            href="https://wa.me/5571992768360"
                            target="_blank"
                            rel="noopener noreferrer"
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