{{-- resources/views/admin/templates/show.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $template->title ?? 'Detalhes do Template' }} - Marketplace</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

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
</head>
<body>

    <!-- Header Navigation -->
    <header class="sticky-top glass-panel px-3 px-md-4 py-3">
        <div class="container-xl d-flex align-items-center justify-content-between">
            <a href="" class="d-inline-flex align-items-center gap-2 text-decoration-none text-secondary hover-white text-sm group">
                <i data-lucide="arrow-left" class="transition-transform" style="width: 16px; height: 16px;"></i>
                <span>Voltar para Galeria</span>
            </a>
            <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-pill px-3 py-2 text-primary border" style="background-color: rgba(59, 130, 246, 0.1); border-color: rgba(59, 130, 246, 0.2) !important;">
                    {{ $template->category ?? 'Web Design' }}
                </span>
            </div>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="container-xl px-3 px-sm-4 py-4">
        
        <!-- Hero Title Section -->
        <div class="animate-hero mb-4 d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3">
            <div>
                <h1 class="fw-bold text-white fs-2 tracking-tight mb-0">
                    {{ $template->title ?? 'SaaS Dashboard Pro Template' }}
                </h1>
                <p class="text-secondary mt-2 mb-0 text-base" style="max-width: 672px;">
                    {{ $template->short_description ?? 'Interface responsiva moderna para aplicações web e SaaS com suporte a temas escuro e claro.' }}
                </p>
            </div>
            <div class="d-flex align-items-center gap-3 flex-shrink-0">
                <a href="{{ $template->demo_url ?? '#' }}" target="_blank" class="btn btn-dark-card rounded-3 px-4 py-2 fw-medium text-sm d-flex align-items-center gap-2 shadow">
                    <i data-lucide="external-link" style="width: 16px; height: 16px;"></i>
                    <span>Preview Ao Vivo</span>
                </a>
                <button class="btn btn-brand rounded-3 px-4 py-2 fw-semibold text-sm d-flex align-items-center gap-2 shadow">
                    <i data-lucide="download" style="width: 16px; height: 16px;"></i>
                    <span>Baixar Template</span>
                </button>
            </div>
        </div>

        <div class="row g-4 items-start">
            
            <!-- Left Side: Interactive Preview Section (8 cols) -->
            <div class="col-12 col-lg-8 d-flex flex-column gap-4">
                
                <!-- Main Viewer Box -->
                <div class="animate-viewer bg-dark-card rounded-4 overflow-hidden shadow-lg position-relative">
                    <!-- Browser-like Top Bar -->
                    <div class="bg-dark px-3 py-2.5 border-bottom border-dark-custom d-flex align-items-center justify-content-between" style="background-color: rgba(15, 23, 42, 0.9) !important;">
                        <div class="d-flex align-items-center gap-1.5">
                            <span class="rounded-circle bg-danger d-inline-block" style="width: 10px; height: 10px;"></span>
                            <span class="rounded-circle bg-warning d-inline-block" style="width: 10px; height: 10px;"></span>
                            <span class="rounded-circle bg-success d-inline-block" style="width: 10px; height: 10px;"></span>
                        </div>
                        <span id="page-indicator" class="text-secondary font-monospace bg-dark border rounded px-2 py-0.5" style="font-size: 0.75rem; border-color: rgba(255, 255, 255, 0.1) !important;">
                            Página 1 de {{ count($template->pages ?? [1,2,3,4]) }}
                        </span>
                        <div class="d-flex align-items-center gap-2 text-secondary">
                            <button id="btn-fullscreen" class="btn btn-link text-secondary p-0 hover-white" title="Expandir Visualização">
                                <i data-lucide="maximize-2" style="width: 16px; height: 16px;"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Main Image Viewport -->
                    <div class="position-relative bg-black overflow-y-auto custom-scrollbar d-flex justify-content-center p-3" style="min-height: 420px; max-height: 750px;">
                        <img 
                            id="main-preview-image"
                            src="{{ $template->pages[0]->image_url ?? 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80' }}" 
                            alt="Visualização do Template"
                            class="w-100 h-auto rounded-3 shadow-sm transition-all object-top"
                        />
                    </div>
                </div>

                <!-- Pages Thumbnails Carousel / Grid -->
                <div class="animate-thumbs">
                    <h3 class="text-uppercase tracking-wider text-secondary mb-3 d-flex align-items-center gap-2 fw-semibold" style="font-size: 0.85rem;">
                        <i data-lucide="layers" class="text-primary" style="width: 16px; height: 16px;"></i>
                        Páginas do Template (Clique para visualizar)
                    </h3>
                    
                    <div class="row g-3">
                        @php
                            $pages = $template->pages ?? [
                                (object)['name' => 'Dashboard Principal', 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80'],
                                (object)['name' => 'Analytics & Relatórios', 'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80'],
                                (object)['name' => 'Perfil do Usuário', 'image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=1600&q=80'],
                                (object)['name' => 'Configurações', 'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=1600&q=80'],
                            ];
                        @endphp

                        @foreach($pages as $index => $page)
                            <div class="col-6 col-sm-3">
                                <button 
                                    onclick="changePageImage('{{ $page->image }}', '{{ $page->name }}', {{ $index + 1 }})"
                                    class="thumb-btn {{ $loop->first ? 'active-thumb' : '' }}"
                                    data-index="{{ $index + 1 }}"
                                >
                                    <div class="ratio ratio-16x9 w-100 rounded-2 overflow-hidden bg-dark mb-2 position-relative">
                                        <img src="{{ $page->image }}" alt="{{ $page->name }}" class="object-fit-cover w-100 h-100">
                                        <div class="thumb-overlay"></div>
                                    </div>
                                    <p class="text-truncate text-secondary mb-0 px-1 fw-medium" style="font-size: 0.75rem;">
                                        {{ $page->name }}
                                    </p>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Right Side: Details & Features Sidebar (4 cols) -->
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
                            <span class="fw-semibold text-white">{{ count($pages) }} PNGs inclusos</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-dark-custom">
                            <span class="text-secondary">Resolução</span>
                            <span class="fw-semibold text-white">Full HD (1920x1080)</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-dark-custom">
                            <span class="text-secondary">Atualizado em</span>
                            <span class="fw-semibold text-white">{{ $template->updated_at ?? 'Setembro, 2026' }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <span class="text-secondary">Licença</span>
                            <span class="fw-semibold text-primary">Uso Comercial</span>
                        </div>
                    </div>

                    <!-- Tech Badges -->
                    <div>
                        <h4 class="text-uppercase tracking-wider text-secondary fw-semibold mb-3" style="font-size: 0.75rem;">Tecnologias / Formatos</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-dark text-secondary border border-dark-custom rounded-2 px-2.5 py-1.5 font-normal">Blade PHP</span>
                            <span class="badge bg-dark text-secondary border border-dark-custom rounded-2 px-2.5 py-1.5 font-normal">Bootstrap 5</span>
                            <span class="badge bg-dark text-secondary border border-dark-custom rounded-2 px-2.5 py-1.5 font-normal">PNG HD</span>
                            <span class="badge bg-dark text-secondary border border-dark-custom rounded-2 px-2.5 py-1.5 font-normal">Figma Source</span>
                        </div>
                    </div>
                </div>

                <!-- Highlight Features Card -->
                <div class="bg-dark-card rounded-4 p-4 shadow-lg d-flex flex-column gap-3">
                    <h3 class="fs-6 fw-bold text-white mb-0 d-flex align-items-center gap-2">
                        <i data-lucide="check-circle-2" class="text-success" style="width: 18px; height: 18px;"></i>
                        Destaques
                    </h3>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2.5 text-secondary" style="font-size: 0.875rem;">
                        <li class="d-flex align-items-start gap-2">
                            <i data-lucide="check" class="text-success flex-shrink-0 mt-1" style="width: 16px; height: 16px;"></i>
                            <span>Layout 100% Responsivo e Mobile First</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i data-lucide="check" class="text-success flex-shrink-0 mt-1" style="width: 16px; height: 16px;"></i>
                            <span>Animações suaves prontas com GSAP</span>
                        </li>
                        <li class="d-flex align-items-start gap-2">
                            <i data-lucide="check" class="text-success flex-shrink-0 mt-1" style="width: 16px; height: 16px;"></i>
                            <span>Estruturação limpa e de fácil integração no Laravel</span>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </main>

    <!-- Fullscreen Lightbox Modal -->
    <div id="lightbox-modal" class="d-none p-3">
        <button id="btn-close-lightbox" class="btn btn-dark rounded-circle position-absolute top-0 end-0 m-4 p-2 text-white border-0 shadow" style="background-color: rgba(30, 41, 59, 0.8);">
            <i data-lucide="x" style="width: 24px; height: 24px;"></i>
        </button>
        <div class="mw-100 mh-100 overflow-auto custom-scrollbar rounded-3">
            <img id="lightbox-image" src="" alt="Zoom Preview" class="img-fluid rounded-3">
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript & GSAP Animations -->
    <script>
        // Inicializar Ícones Lucide
        lucide.createIcons();

        // Animação de Entrada com GSAP
        window.addEventListener('DOMContentLoaded', () => {
            const tl = gsap.timeline({ defaults: { ease: 'power3.out', duration: 0.8 } });

            tl.to('.animate-hero', { opacity: 1, y: 0 })
              .to('.animate-viewer', { opacity: 1, scale: 1 }, "-=0.5")
              .to('.animate-thumbs', { opacity: 1, y: 0 }, "-=0.4")
              .to('.animate-sidebar', { opacity: 1, x: 0 }, "-=0.6");
        });

        // Função para Alternar a Imagem Principal com Troca Suave GSAP
        function changePageImage(imageUrl, pageTitle, index) {
            const mainImg = document.getElementById('main-preview-image');
            const indicator = document.getElementById('page-indicator');
            const totalPages = {{ count($pages) }};

            // Animação de saída da imagem atual
            gsap.to(mainImg, {
                opacity: 0.2,
                scale: 0.98,
                duration: 0.2,
                onComplete: () => {
                    // Troca a fonte da imagem
                    mainImg.src = imageUrl;
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

        btnFullscreen.addEventListener('click', () => {
            const currentImg = document.getElementById('main-preview-image').src;
            lightboxImg.src = currentImg;
            
            lightboxModal.classList.remove('d-none');
            gsap.to(lightboxModal, { opacity: 1, duration: 0.3 });
        });

        function closeLightbox() {
            gsap.to(lightboxModal, {
                opacity: 0,
                duration: 0.2,
                onComplete: () => lightboxModal.classList.add('d-none')
            });
        }

        btnCloseLightbox.addEventListener('click', closeLightbox);
        lightboxModal.addEventListener('click', (e) => {
            if (e.target === lightboxModal) closeLightbox();
        });
    </script>
</body>
</html>