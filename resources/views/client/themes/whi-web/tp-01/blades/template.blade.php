@extends($theme->core('client'))

@section('content')

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

        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #0a0d14;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #1f293d;
            border-radius: 9999px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #3b82f6;
        }

        /* Glassmorphism Navigation */
        .glass-panel {
            background: rgba(18, 24, 36, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
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

        .btn-dark-card {
            background-color: var(--dark-card);
            color: #ffffff;
            border: 1px solid var(--dark-border);
            transition: all 0.2s ease-in-out;
        }

        .btn-dark-card:hover {
            background-color: #1e293b;
            border-color: #475569;
            color: #ffffff;
        }

        /* Card Container Styling */
        .bg-dark-card {
            background-color: var(--dark-card);
            border: 1px solid var(--dark-border);
        }

        .border-dark-custom {
            border-color: var(--dark-border) !important;
        }

        /* Thumbnails Interactivity */
        .thumb-btn {
            background-color: var(--dark-card);
            border: 1px solid var(--dark-border);
            border-radius: 0.75rem;
            padding: 0.5rem;
            transition: all 0.2s ease;
            text-align: left;
            width: 100%;
        }

        .thumb-btn:hover {
            border-color: rgba(59, 130, 246, 0.5);
        }

        .thumb-btn.active-thumb {
            border-color: var(--brand-500) !important;
            box-shadow: 0 0 0 2px var(--brand-500);
        }

        .thumb-btn .thumb-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(59, 130, 246, 0.1);
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .thumb-btn:hover .thumb-overlay {
            opacity: 1;
        }

        .thumb-btn img {
            transition: transform 0.3s ease;
        }

        .thumb-btn:hover img {
            transform: scale(1.05);
        }

        /* Lightbox Modal */
        #lightbox-modal {
            position: fixed;
            inset: 0;
            z-index: 1050;
            background-color: rgba(2, 6, 23, 0.95);
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        #lightbox-modal.d-none {
            display: none !important;
        }

        /* Element initial state for GSAP */
        .animate-hero {
            opacity: 0;
            transform: translateY(24px);
        }

        .animate-viewer {
            opacity: 0;
            transform: scale(0.95);
        }

        .animate-thumbs {
            opacity: 0;
            transform: translateY(24px);
        }

        .animate-sidebar {
            opacity: 0;
            transform: translateX(24px);
        }
    </style>

    @php
        $preview = is_object($templateThemeInner)
            ? ($templateThemeInner->preview ?? null)
            : ($templateThemeInner['preview'] ?? null);

        if (is_string($preview)) {
            $previews = json_decode($preview, true) ?? [];
        } elseif (is_array($preview)) {
            $previews = $preview;
        } else {
            $previews = [];
        }

        $previews = is_array($previews) ? $previews : [];

        $previewImage = $previews[0] ?? null;
        $countPreviews = count($previews);

        $themeName = is_object($templateThemeInner)
            ? ($templateThemeInner->name ?? '')
            : ($templateThemeInner['name'] ?? '');

        $themeSlug = is_object($templateThemeInner)
            ? ($templateThemeInner->slug ?? \Illuminate\Support\Str::slug($themeName))
            : ($templateThemeInner['slug'] ?? \Illuminate\Support\Str::slug($themeName));
    @endphp

    <!-- Main Content Container -->
    <div class="container-xl px-3 px-sm-4 py-4 mt-5">
        <!-- Hero Title Section -->
        <div class="animate-hero mt-5 mb-4 d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3">
            <a href="{{ route('templates') }}" class="btn-faq-cta">
                Voltar
            </a>

            <div>
                <h1 class="fw-bold text-white fs-2 tracking-tight mb-0">
                    {{ $templateThemeInner->title }}
                </h1>

                <p class="text-white-50 mt-2 mb-0 text-base" style="max-width: 672px;">
                    {{ $templateThemeInner->description }}
                </p>
            </div>
        </div>

        <div class="row g-4 items-start">

            <!-- Left Side: Interactive Preview Section -->
            <div class="col-12 col-lg-8 d-flex flex-column gap-4">

                <!-- Main Viewer Box -->
                <div class="animate-viewer bg-dark-card rounded-4 overflow-hidden shadow-lg position-relative">

                    <!-- Browser-like Top Bar -->
                    <div
                        class="bg-dark px-3 py-2.5 border-bottom border-dark-custom d-flex align-items-center justify-content-between"
                        style="background-color: rgba(15, 23, 42, 0.9) !important;"
                    >
                        <div class="d-flex align-items-center gap-1.5">
                            <span class="rounded-circle bg-danger d-inline-block" style="width: 10px; height: 10px;"></span>
                            <span class="rounded-circle bg-warning d-inline-block" style="width: 10px; height: 10px;"></span>
                            <span class="rounded-circle bg-success d-inline-block" style="width: 10px; height: 10px;"></span>
                        </div>

                        <span
                            id="page-indicator"
                            class="text-secondary font-monospace bg-dark border rounded px-2 py-0.5"
                            style="font-size: 0.75rem; border-color: rgba(255, 255, 255, 0.1) !important;"
                        >
                            Página 1 de {{ $countPreviews }}
                        </span>

                        <div class="d-flex align-items-center gap-2 text-secondary">
                            <button
                                id="btn-fullscreen"
                                type="button"
                                class="btn btn-link text-secondary p-0 hover-white"
                                title="Expandir Visualização"
                            >
                                <i data-lucide="maximize-2" style="width: 16px; height: 16px;"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Main Image Viewport -->
                    <div
                        class="position-relative bg-black overflow-y-auto custom-scrollbar d-flex justify-content-center p-3"
                        style="min-height: 420px; max-height: 750px;"
                    >
                        @if($previewImage)
                            <img
                                id="main-preview-image"
                                src="{{ asset('storage/' . $previewImage) }}"
                                alt="{{ $themeName }}"
                                class="w-100 h-auto rounded-3 shadow-sm transition-all object-top"
                                style="object-fit: contain"
                            />
                        @else
                            <div class="d-flex align-items-center justify-content-center text-secondary py-5">
                                <div class="text-center">
                                    <i data-lucide="image-off" style="width: 40px; height: 40px;"></i>
                                    <p class="mt-3 mb-0">Nenhuma imagem de preview disponível.</p>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

                <!-- Pages Thumbnails Carousel / Grid -->
                @if($countPreviews > 0)
                    <div class="animate-thumbs">

                        <h3
                            class="text-uppercase tracking-wider text-secondary mb-3 d-flex align-items-center gap-2 fw-semibold"
                            style="font-size: 0.85rem;"
                        >
                            <i data-lucide="layers" class="text-primary" style="width: 16px; height: 16px;"></i>
                            Páginas do Template
                        </h3>

                        <div class="row g-3">

                            @foreach($previews as $index => $preview)
                                <div class="col-6 col-sm-3">

                                    <button
                                        type="button"
                                        onclick="changePageImage('{{ asset('storage/' . $preview) }}', '', {{ $index + 1 }})"
                                        class="thumb-btn {{ $loop->first ? 'active-thumb' : '' }}"
                                        data-index="{{ $index + 1 }}"
                                    >
                                        <div class="ratio ratio-16x9 w-100 rounded-2 overflow-hidden bg-dark position-relative">

                                            <img
                                                src="{{ asset('storage/' . $preview) }}"
                                                alt="Preview {{ $index + 1 }}"
                                                class="object-fit-cover w-100 h-100"
                                            >

                                            <div class="thumb-overlay"></div>

                                        </div>
                                    </button>

                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif

            </div>

            <!-- Right Side: Details & Features Sidebar -->
            <div class="col-12 col-lg-4 d-flex flex-column gap-4 animate-sidebar">

                <!-- Specs Card -->
                <div class="bg-dark-card rounded-4 p-4 shadow-lg d-flex flex-column gap-4">

                    <h3 class="fs-6 fw-bold text-white border-bottom border-dark-custom pb-3 mb-0 d-flex align-items-center gap-2">
                        <i data-lucide="info" class="text-primary" style="width: 18px; height: 18px;"></i>
                        Informações do Template
                    </h3>

                    <div class="d-flex flex-column gap-2 text-sm" style="font-size: 0.875rem;">

                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-dark-custom">
                            <span class="text-secondary">Total de Páginas</span>
                            <span class="fw-semibold text-white">{{ $countPreviews }} PNGs inclusos</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-dark-custom">
                            <span class="text-secondary">Layout</span>
                            <span class="fw-semibold text-white">{{ $templateThemeInner->layout_type }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-dark-custom">
                            <span class="text-secondary">Atualizado em</span>
                            <span class="fw-semibold text-white">
                                {{ $templateThemeInner->updated_at->format('d/m/Y') }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center py-2">
                            <span class="text-secondary">Licença</span>
                            <span class="fw-semibold text-primary">Uso Comercial</span>
                        </div>

                    </div>

                    @if ($templateThemeInner->technology <> null)
                        <!-- Tech Badges -->
                        <div>
                            <h4
                                class="text-uppercase tracking-wider text-secondary fw-semibold mb-3"
                                style="font-size: 0.75rem;"
                            >
                                Tecnologias / Formatos
                            </h4>

                            <div class="d-flex flex-wrap gap-2">
                                @foreach(explode(',', $templateThemeInner->technology) as $technology)
                                    <span class="badge bg-dark text-secondary border border-dark-custom rounded-2 px-2.5 py-1.5 font-normal">
                                        {{ trim($technology) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>

                @if ($templateThemeInner->highlights <> null)
                    <!-- Highlight Features Card -->
                    <div class="bg-dark-card rounded-4 p-4 shadow-lg d-flex flex-column gap-3">

                        <h3 class="fs-6 fw-bold text-white mb-0 d-flex align-items-center gap-2">
                            <i data-lucide="check-circle-2" class="text-success" style="width: 18px; height: 18px;"></i>
                            Destaques
                        </h3>

                        <ul class="list-unstyled mb-0 d-flex flex-column gap-2.5 text-secondary" style="font-size: 0.875rem;">
                            @foreach(explode(',', $templateThemeInner->highlights) as $highlight)
                                <li class="d-flex align-items-start gap-2">
                                    <i data-lucide="check" class="text-success flex-shrink-0 mt-1" style="width: 16px; height: 16px;"></i>
                                    <span>{{ trim($highlight) }}</span>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                @endif

            </div>

        </div>

    </div>

    <!-- Fullscreen Lightbox Modal -->
    <div id="lightbox-modal" class="d-none p-3" style="z-index: 999999">

        <button
            id="btn-close-lightbox"
            type="button"
            class="btn btn-dark rounded-circle position-absolute top-0 end-0 m-4 p-2 text-white border-0 shadow"
            style="background-color: rgba(30, 41, 59, 0.8);"
        >
            <i data-lucide="x" style="width: 24px; height: 24px;"></i>
        </button>

        <div class="mw-100 mh-100 overflow-auto custom-scrollbar rounded-3">
            <img
                id="lightbox-image"
                src=""
                alt="Zoom Preview"
                class="img-fluid rounded-3"
            >
        </div>

    </div>

    <!-- JavaScript & GSAP Animations -->
    <script>

        // Inicializar Ícones Lucide
        lucide.createIcons();

        // Animação de Entrada com GSAP
        window.addEventListener('DOMContentLoaded', () => {
            const tl = gsap.timeline({
                defaults: {
                    ease: 'power3.out',
                    duration: 0.8
                }
            });

            tl.to('.animate-hero', {
                opacity: 1,
                y: 0
            })
            .to('.animate-viewer', {
                opacity: 1,
                scale: 1
            }, "-=0.5")
            .to('.animate-thumbs', {
                opacity: 1,
                y: 0
            }, "-=0.4")
            .to('.animate-sidebar', {
                opacity: 1,
                x: 0
            }, "-=0.6");
        });

        // Função para Alternar a Imagem Principal com Troca Suave GSAP
        function changePageImage(imageUrl, pageTitle, index) {
            const mainImg = document.getElementById('main-preview-image');
            const indicator = document.getElementById('page-indicator');
            const totalPages = {{ $countPreviews }};

            if (!mainImg) {
                return;
            }

            gsap.to(mainImg, {
                opacity: 0.2,
                scale: 0.98,
                duration: 0.2,
                onComplete: () => {

                    // Troca a fonte da imagem
                    mainImg.src = imageUrl;

                    // Atualiza indicador
                    indicator.textContent = `Página ${index} de ${totalPages}`;

                    // Animação de entrada da nova imagem
                    gsap.to(mainImg, {
                        opacity: 1,
                        scale: 1,
                        duration: 0.35,
                        ease: 'back.out(1.2)'
                    });

                }
            });

            // Atualiza o estado visual das thumbnails
            document.querySelectorAll('.thumb-btn').forEach(btn => {
                btn.classList.remove('active-thumb');
            });

            const activeBtn = document.querySelector(`.thumb-btn[data-index="${index}"]`);

            if (activeBtn) {
                activeBtn.classList.add('active-thumb');
            }
        }

        // Lightbox Modal Interatividade
        const lightboxModal = document.getElementById('lightbox-modal');
        const lightboxImg = document.getElementById('lightbox-image');
        const btnFullscreen = document.getElementById('btn-fullscreen');
        const btnCloseLightbox = document.getElementById('btn-close-lightbox');

        if (btnFullscreen) {
            btnFullscreen.addEventListener('click', () => {
                const currentImg = document.getElementById('main-preview-image');

                if (!currentImg) {
                    return;
                }

                lightboxImg.src = currentImg.src;
                lightboxModal.classList.remove('d-none');

                gsap.to(lightboxModal, {
                    opacity: 1,
                    duration: 0.3
                });
            });
        }

        function closeLightbox() {
            gsap.to(lightboxModal, {
                opacity: 0,
                duration: 0.2,
                onComplete: () => {
                    lightboxModal.classList.add('d-none');
                }
            });
        }

        if (btnCloseLightbox) {
            btnCloseLightbox.addEventListener('click', closeLightbox);
        }

        if (lightboxModal) {
            lightboxModal.addEventListener('click', (e) => {
                if (e.target === lightboxModal) {
                    closeLightbox();
                }
            });
        }

    </script>

@endsection