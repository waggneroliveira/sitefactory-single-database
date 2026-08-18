<div class="col-12 col-sm-6 col-md-5 col-xl-3">
    <a href="{{ $route }}" class="text-decoration-none d-block">
        <div class="p-3 rounded-3 bg-light bg-opacity-50 hover-shadow border transition">
            <div class="d-flex align-items-center gap-3">
                <div class="flex-shrink-0">
                    <i class="mdi {{ $icon }} fs-2 text-primary"></i>
                </div>
                <div class="flex-grow-1 min-width-0">
                    <h6 class="mb-0 text-dark fw-semibold text-muted">
                        {{ $title }}
                    </h6>
                </div>
                <div class="flex-shrink-0 text-muted">
                    <i class="mdi mdi-chevron-right fs-5"></i>
                </div>
            </div>
        </div>
    </a>
</div>
<style>
/* Adicione no seu arquivo de estilos principal */
.hover-shadow {
    transition: all 0.2s ease-in-out;
    border: 1px solid transparent;
}

.hover-shadow:hover {
    background-color: #fff !important;
    border-color: #dee2e6;
    transform: translateX(4px);
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.transition {
    transition: all 0.2s ease-in-out;
}
</style>