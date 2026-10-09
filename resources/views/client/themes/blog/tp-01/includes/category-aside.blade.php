@if (isset($blogCategories) && $blogCategories->count() > 0)
    <!-- Categories Widget Start -->
    <div class="categories-aside-widget mb-4 overflow-hidden rounded-4">
        <div class="categories-card p-4">

            {{-- Cabeçalho do Widget --}}
            <div class="categories-header pb-3 mb-3 border-bottom d-flex align-items-center gap-2">
                <div class="categories-icon-badge">
                    <i class="bi bi-grid-fill"></i>
                </div>
                <h4 class="m-0 poppins-bold font-18 title-aside">Categorias</h4>
            </div>

            {{-- Lista de Badges de Categorias --}}
            <div class="d-flex flex-wrap gap-2">
                @foreach ($blogCategories as $category)
                    <a href="{{ route('blog', ['category' => $category->slug]) }}#news" 
                       class="category-badge-item poppins-medium font-12 text-decoration-none">
                        <span class="category-name">{{ $category->title }}</span>
                        @if(isset($category->posts_count))
                            <span class="category-count">{{ $category->posts_count }}</span>
                        @endif
                    </a>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Categories Widget End -->
@endif

<style>
    /* ===================================
       ESTILOS DO WIDGET DE CATEGORIAS
    =================================== */
    .categories-aside-widget {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
    }

    .categories-icon-badge {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: rgba(13, 110, 253, 0.1); /* Azul suave */
        color: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
    }

    /* Badges de Categoria (Pills) */
    .category-badge-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f8fafc;
        color: #334155;
        border: 1px solid #e2e8f0;
        padding: 6px 14px;
        border-radius: 10px;
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .category-badge-item:hover {
        background: var(--primary-color);
        color: #ffffff;
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.22);
    }

    /* Contador opcional de posts por categoria */
    .category-count {
        font-size: 11px;
        background: rgba(0, 0, 0, 0.06);
        color: #64748b;
        padding: 2px 6px;
        border-radius: 6px;
        transition: all 0.25s ease;
    }

    .category-badge-item:hover .category-count {
        background: rgba(255, 255, 255, 0.25);
        color: #ffffff;
    }
</style>