@extends($theme->core('client'))

@section('content')
    <div class="container-xl px-3 px-sm-4 py-5">
        <!-- Hero & Filter Section -->
        <section class="hero-section mx-auto my-5 col-12 col-lg-8">
            <h1 class="fw-bold text-white text-center display-5 tracking-tight">
                Explore Nossos Templates de Elite
            </h1>
            <p class="text-white-50 text-center mt-3 fs-6">
                Selecione interfaces de alta performance, totalmente responsivas e prontas para integração no seu projeto Laravel.
            </p>
    
            <!-- Category Pills -->
            <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap mt-5" id="theme-filters">
                <button class="badge-pill-custom active border-0 text-white-50" data-slug="all">Todos</button>
                @foreach($uniqueThemes as $slug => $name)
                    <button class="badge-pill-custom border-0" data-slug="{{ $slug }}">
                        {{ $name }}
                    </button>
                @endforeach
            </div>
        </section>

        <section class="tpl-modal-sec templates py-4">
            <div class="container">
                <!-- Trilho de Rolagem -->
                <div class="row g-4" id="template-cards-container">
                    @foreach($templateThemes as $templateTheme)
                        @php
                            $preview = is_object($templateTheme) ? ($templateTheme->preview ?? null) : ($templateTheme['preview'] ?? null);

                            if (is_string($preview)) {
                                $previews = json_decode($preview, true) ?? [];
                            } elseif (is_array($preview)) {
                                $previews = $preview;
                            } else {
                                $previews = [];
                            }

                            $previewImage = $previews[0] ?? null;
                            $countPreviews = count($previews);
                            $themeName = is_object($templateTheme) ? $templateTheme->name : $templateTheme['name'];
                            
                            // Obtém o slug real do registro ou gera a partir do nome
                            $themeSlug = is_object($templateTheme) 
                                ? ($templateTheme->slug ?? \Illuminate\Support\Str::slug($themeName)) 
                                : ($templateTheme['slug'] ?? \Illuminate\Support\Str::slug($themeName));
                        @endphp

                        <!-- Usando o $themeSlug diretamente -->
                        <div class="col-12 col-sm-6 col-lg-4 js-card-item" data-slug="{{ $themeSlug }}">
                            <article class="tpl-card h-100">
                                <div class="tpl-card-topbar">
                                    <div class="tpl-dots"><span></span><span></span><span></span></div>
                                    <span class="tpl-tag">{{ is_object($templateTheme) ? $templateTheme->layout_type : $templateTheme['layout_type'] }}</span>
                                </div>
                                <div class="tpl-preview">
                                    <img src="{{ asset('storage/' . $previewImage) }}" alt="{{ $themeName }}" loading="lazy">
                                    <div class="tpl-overlay">
                                        <a href="{{ route('template', ['slug' => $themeSlug, 'templateVariation' => $templateTheme->template_variation]) }}" class="tpl-btn-preview bg-secondary">
                                            <i data-lucide="eye" style="width: 14px; height: 14px;"></i> Ver Detalhes 
                                        </a>
                                    </div>
                                </div>
                                <div class="tpl-card-body">
                                    <div>
                                        <span class="tpl-category">{{ $themeName }}</span>
                                        <div class="d-flex align-items-center gap-2 text-secondary" style="font-size: 0.75rem;">
                                            @if ($countPreviews)                                                
                                                <span class="d-flex align-items-center gap-1">
                                                    <i data-lucide="layers" style="width: 14px; height: 14px;"></i>
                                                    {{ $countPreviews }} Páginas PNG
                                                </span>
                                            @endif
                                            @if ($templateTheme->technology <> null)                                                
                                                <span class="d-flex align-items-center gap-1">
                                                    <i data-lucide="code-2" style="width: 14px; height: 14px;"></i>
                                                    {{ strtoupper(is_object($templateTheme) ? ($templateTheme->technology ?? '') : ($templateTheme['technology'] ?? '')) }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tpl-arrow"><i class="bi bi-arrow-up-right"></i></div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                @if($templateThemes->hasPages())
                <div class="d-flex justify-content-center align-items-center flex-column">  
                    <div class="d-flex justify-content-center mt-5">
                        {{ $templateThemes->links('pagination::bootstrap-5') }}
                    </div>                  
                    <div class="mt-3">
                        <p class="pagination-info">
                            Exibindo
                            <span class="fw-semibold">{{ $templateThemes->firstItem() }}</span>
                            a
                            <span class="fw-semibold">{{ $templateThemes->lastItem() }}</span>
                            de
                            <span class="results-count">{{ $templateThemes->total() }}</span>
                            resultados
                        </p>
                    </div>                    
                </div>
                @endif
            </div>
        </section>
    </div>

    <style>
        .d-none.flex-sm-fill.d-sm-flex.align-items-sm-center.justify-content-sm-between p{
            display: none;
        }
        .pagination-info {
    color: #64748b !important;
    font-size: 0.8rem;
    font-weight: 500;
    margin: 0;
    letter-spacing: 0.01em;
}

.pagination-info .fw-semibold {
    color: #e2e8f0;
    font-weight: 600 !important;
}

.pagination-info .results-count {
    color: var(--secondary-color);
}

.pagination {
    gap: 8px;
    margin: 0;
}

.pagination .page-item .page-link {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 10px !important;
    background: rgba(255, 255, 255, 0.04);
    color: #94a3b8;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.25s ease;
    box-shadow: none;
}

.pagination .page-item .page-link:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(255, 255, 255, 0.16);
    transform: translateY(-2px);
}

.pagination .page-item.active .page-link {
    color: #10131C;
    background: var(--secondary-color);
    border-color: var(--secondary-color);
    box-shadow: 0 6px 20px rgba(203, 255, 77, 0.15);
}

.pagination .page-item.disabled .page-link {
    color: #475569;
    background: rgba(255, 255, 255, 0.02);
    border-color: rgba(255, 255, 255, 0.04);
    opacity: 0.6;
    cursor: not-allowed;
}

.pagination .page-link:focus {
    box-shadow: 0 0 0 3px rgba(203, 255, 77, 0.12);
    outline: none;
}

.pagination .page-item:first-child .page-link,
.pagination .page-item:last-child .page-link {
    font-size: 1rem;
}

@media (max-width: 575.98px) {
    .pagination {
        gap: 5px;
    }

    .pagination .page-item .page-link {
        width: 36px;
        height: 36px;
        font-size: 0.8rem;
        border-radius: 8px !important;
    }
}
    </style>
@endsection