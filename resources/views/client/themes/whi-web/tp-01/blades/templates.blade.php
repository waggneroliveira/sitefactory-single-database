<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Templates - Marketplace</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <style>
        :root {
            --dark-bg: #0a0d14;
            --dark-card: #121824;
            --dark-border: #1f293d;
            --brand-500: #3b82f6;
            --brand-600: #2563eb;
        }

        body {
            background-color: var(--dark-bg);
            color: #cbd5e1;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            min-height: 100vh;
        }

        ::selection {
            background-color: var(--brand-500);
            color: #ffffff;
        }

        /* Glassmorphism Navigation */
        .glass-panel {
            background: rgba(18, 24, 36, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Gradient Text */
        .text-gradient {
            background: linear-gradient(135deg, var(--brand-500) 0%, #22d3ee 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Custom Buttons */
        .btn-brand {
            background-color: var(--brand-600);
            color: #ffffff;
            border: none;
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.2);
            transition: all 0.2s ease-in-out;
        }

        .btn-brand:hover {
            background-color: var(--brand-500);
            color: #ffffff;
        }

        /* Cards */
        .template-card {
            background-color: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(32px);
        }

        .template-card:hover {
            border-color: rgba(59, 130, 246, 0.5);
        }

        .card-img-wrapper {
            position: relative;
            aspect-ratio: 16 / 9;
            background-color: #020617;
            overflow: hidden;
        }

        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top;
            transition: transform 0.5s ease;
        }

        .template-card:hover .card-img-wrapper img {
            transform: scale(1.05);
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            background: rgba(2, 6, 23, 0.6);
            backdrop-filter: blur(2px);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .template-card:hover .card-overlay {
            opacity: 1;
        }

        /* Search & Filter Containers */
        .search-container {
            background-color: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 1rem;
            padding: 0.5rem;
        }

        .form-control-dark {
            background-color: rgba(15, 23, 42, 0.5);
            border: 1px solid transparent;
            color: #ffffff;
        }

        .form-control-dark:focus {
            background-color: rgba(15, 23, 42, 0.8);
            border-color: rgba(59, 130, 246, 0.5);
            color: #ffffff;
            box-shadow: none;
        }

        .form-control-dark::placeholder {
            color: #64748b;
        }

        /* Badges */
        .badge-category {
            background-color: rgba(15, 23, 42, 0.8);
            color: #cbd5e1;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(51, 65, 85, 0.5);
            font-size: 10px;
        }

        .badge-pill-custom {
            background-color: var(--dark-card);
            color: #94a3b8;
            border: 1px solid var(--dark-border);
            border-radius: 50rem;
            padding: 0.375rem 1rem;
            font-size: 0.75rem;
            font-weight: 500;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .badge-pill-custom:hover {
            border-color: #475569;
            color: #ffffff;
        }

        .badge-pill-custom.active {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--brand-500);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .hero-section {
            opacity: 0;
            transform: translateY(24px);
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <header class="sticky-top glass-panel px-3 px-md-4 py-3">
        <div class="container-xl d-flex items-center justify-content-between align-items-center">
            <a href="#" class="d-flex align-items-center gap-2 text-decoration-none fw-bold fs-5 text-white">
                <div class="rounded-3 bg-primary d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px; background-color: var(--brand-600) !important;">
                    <i data-lucide="layout-grid" style="width: 20px; height: 20px;"></i>
                </div>
                <span>TemplateHub</span>
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="#" class="text-secondary text-decoration-none small hover-white">Documentação</a>
                <button class="btn btn-brand btn-sm rounded-3 px-3 py-2 fw-medium">
                    Enviar Template
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container-xl px-3 px-sm-4 py-5">
        
        <!-- Hero & Filter Section -->
        <section class="hero-section text-center mx-auto mb-5" style="max-width: 768px;">
            <h1 class="fw-bold text-white display-5 tracking-tight">
                Explore Nossos <span class="text-gradient">Templates de Elite</span>
            </h1>
            <p class="text-secondary mt-3 fs-6">
                Selecione interfaces de alta performance, totalmente responsivas e prontas para integração no seu projeto Laravel.
            </p>

            <!-- Search & Filters Bar -->
            <div class="mt-4 search-container shadow-lg">
                <div class="row g-2 align-items-center">
                    <div class="col-12 col-sm">
                        <div class="position-relative">
                            <i data-lucide="search" class="position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary" style="width: 18px; height: 18px;"></i>
                            <input 
                                type="text" 
                                class="form-control form-control-dark rounded-3 ps-5 py-2 text-sm" 
                                placeholder="Buscar por dashboard, SaaS, landing page..."
                            >
                        </div>
                    </div>
                    <div class="col-12 col-sm-auto">
                        <button class="btn btn-brand w-100 rounded-3 py-2 px-4 fw-semibold text-sm d-flex align-items-center justify-content-center gap-2">
                            <i data-lucide="filter" style="width: 16px; height: 16px;"></i>
                            <span>Filtrar</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Pills -->
            <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap mt-4">
                <button class="badge-pill-custom active border-0">Todos</button>
                <button class="badge-pill-custom border-0">SaaS & Admin</button>
                <button class="badge-pill-custom border-0">E-commerce</button>
                <button class="badge-pill-custom border-0">Landing Pages</button>
                <button class="badge-pill-custom border-0">Portfólio</button>
            </div>
        </section>

        <!-- Template Cards Grid -->
        <section class="row g-4">

            @foreach($templateThemes as $item)   
                @php
                    $preview = $item['preview'] ?? null;

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

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="template-card h-100 d-flex flex-column">
                        
                        <!-- Preview Image & Hover Actions -->
                        <div class="card-img-wrapper">
                            <img src="{{ asset('storage') .'/'. $previewImage }}" alt="{{ $item->name }}" loading="lazy" >
                            
                            <div class="card-overlay">
                                <a href="#" class="btn btn-brand btn-sm rounded-3 px-3 py-2 fw-semibold text-xs d-flex align-items-center gap-2">
                                    <i data-lucide="eye" style="width: 14px; height: 14px;"></i>
                                    <span>Ver Detalhes</span>
                                </a>
                            </div>

                            <!-- Top Badges -->
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge badge-category rounded-2 px-2 py-1 text-uppercase">
                                    {{ $item->name }}
                                </span>
                            </div>

                            @if($item->layout_type)
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-primary rounded-2 px-2 py-1 text-uppercase shadow" style="background-color: var(--brand-500) !important; font-size: 10px;">
                                        {{ $item->layout_type }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="p-4 flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="fs-6 fw-bold text-white mb-2">
                                    <a href="#" class="text-white text-decoration-none hover-brand">
                                        {{ $item->name }}
                                    </a>
                                </h3>
                                <div class="d-flex align-items-center gap-3 text-secondary" style="font-size: 0.75rem;">
                                    <span class="d-flex align-items-center gap-1">
                                        <i data-lucide="layers" style="width: 14px; height: 14px;"></i>
                                        {{ $countPreviews }} Páginas PNG
                                    </span>
                                    <span class="d-flex align-items-center gap-1">
                                        <i data-lucide="code-2" style="width: 14px; height: 14px;"></i>
                                        {{ strtoupper($item->technology ?? '') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Footer Info -->
                            <div class="pt-3 mt-3 border-top border-secondary-subtle d-flex align-items-center justify-content-between" style="border-color: rgba(255,255,255,0.08) !important;">
                                <span class="fw-bold text-white fs-6">
                                    {{ $item->price }}
                                </span>
                                <a href="{{route('template', ['slug' => $item->slug])}}" class="text-decoration-none fw-semibold d-flex align-items-center gap-1" style="color: var(--brand-500); font-size: 0.75rem;">
                                    <span>Acessar</span>
                                    <i data-lucide="chevron-right" style="width: 14px; height: 14px;"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </section>

    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GSAP Animations -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Inicializa os ícones Lucide
            lucide.createIcons();

            // Animação de entrada do Hero
            gsap.to('.hero-section', {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: 'power3.out'
            });

            // Animação em Cascata (Stagger) para os Cards de Template
            gsap.to('.template-card', {
                opacity: 1,
                y: 0,
                duration: 0.6,
                stagger: 0.1,
                ease: 'power2.out',
                delay: 0.2
            });
        });
    </script>
</body>
</html>