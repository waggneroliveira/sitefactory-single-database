@php
    $textareaId = $textareaId ?? 'text' . (isset($announcement->id) ? $announcement->id : '');
@endphp

<div class="row">
    {{-- Tipo --}}
    <div class="mb-3 col-md-6 col-12">
        <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>

        @php
            $currentType = isset($announcement) ? $announcement->type : 'general';
        @endphp

        <select name="type" class="form-select" id="type" required>
            <option value="general" {{ $currentType == 'general' ? 'selected' : '' }}>
                Geral
            </option>
            <option value="maintenance" {{ $currentType == 'maintenance' ? 'selected' : '' }}>
                Manutenção
            </option>
            <option value="update" {{ $currentType == 'update' ? 'selected' : '' }}>
                Atualização
            </option>
            <option value="promotion" {{ $currentType == 'promotion' ? 'selected' : '' }}>
                Promoção
            </option>
            <option value="warning" {{ $currentType == 'warning' ? 'selected' : '' }}>
                Aviso
            </option>
        </select>
    </div>

    {{-- Local de exibição --}}
    <div class="mb-3 col-md-6 col-12">
        <label for="display_location" class="form-label">
            Local de exibição <span class="text-danger">*</span>
        </label>

        @php
            $currentDisplayLocation = isset($announcement)
                ? $announcement->display_location
                : 'web';
        @endphp

        <select name="display_location" class="form-select" id="display_location" required>
            <option value="web" {{ $currentDisplayLocation == 'web' ? 'selected' : '' }}>
                Site
            </option>
            <option value="panel" {{ $currentDisplayLocation == 'panel' ? 'selected' : '' }}>
                Painel
            </option>
            <option value="both" {{ $currentDisplayLocation == 'both' ? 'selected' : '' }}>
                Site e Painel
            </option>
        </select>
    </div>

    {{-- Exhibition --}}
    <div class="mb-3 col-12" id="exhibition-container">
        <label for="exhibition" class="form-label">
            Tipo de anúncio <span class="text-danger">*</span>
        </label>

        @php
            $currentExhibition = isset($announcement)
                ? $announcement->exhibition
                : null;
        @endphp

        <select name="exhibition" class="form-select" id="exhibition">
            <option value="" disabled {{ !$currentExhibition ? 'selected' : '' }}>
                Selecione o tipo
            </option>

            <option value="mobile" {{ $currentExhibition == 'mobile' ? 'selected' : '' }}>
                Anúncio Horizontal Mobile (versão para celular)
            </option>

            <option value="horizontal" {{ $currentExhibition == 'horizontal' ? 'selected' : '' }}>
                Anúncio Horizontal Desktop (versão para computador)
            </option>

            <option value="vertical" {{ $currentExhibition == 'vertical' ? 'selected' : '' }}>
                Anúncio Vertical
            </option>
        </select>

        <div class="instructions mt-2">
            <h5>Resoluções recomendadas:</h5>
            <ol>
                <li>Versão para computador - <b class="text-danger">1137x171px</b></li>
                <li>Versão para celular - <b class="text-danger">576x111px</b></li>
                <li>Versão vertical - <b class="text-danger">355x433px</b></li>
            </ol>
        </div>
    </div>

    {{-- Período de exibição --}}
    <div class="mb-3 col-md-6 col-12">
        <label for="starts_at" class="form-label">
            Início da exibição
        </label>

        <input
            type="datetime-local"
            name="starts_at"
            id="starts_at"
            class="form-control"
            value="{{ isset($announcement->starts_at) && $announcement->starts_at ? $announcement->starts_at->format('Y-m-d\TH:i') : '' }}"
        >

        <small class="text-muted">
            Deixe vazio para exibir imediatamente.
        </small>
    </div>

    <div class="mb-3 col-md-6 col-12">
        <label for="ends_at" class="form-label">
            Fim da exibição
        </label>

        <input
            type="datetime-local"
            name="ends_at"
            id="ends_at"
            class="form-control"
            value="{{ isset($announcement->ends_at) && $announcement->ends_at ? $announcement->ends_at->format('Y-m-d\TH:i') : '' }}"
        >

        <small class="text-muted">
            Deixe vazio para não definir uma data de término.
        </small>
    </div>

    {{-- Link --}}
    <div class="col-12 mb-3">
        <label for="link" class="form-label">Link</label>

        <input
            type="text"
            name="link"
            class="form-control"
            id="link{{ isset($announcement->id) ? $announcement->id : '' }}"
            value="{{ isset($announcement) ? $announcement->link : '' }}"
            placeholder="Link"
        >
    </div>

    {{-- Texto --}}
    <div class="col-12 mb-3">
        <label for="{{ $textareaId }}" class="form-label text-muted">
            Texto
        </label>

        <textarea
            name="text"
            id="{{ $textareaId }}"
            placeholder="Texto"
            class="col-12"
            rows="10"
        >{!! isset($announcement->text) ? $announcement->text : '' !!}</textarea>
    </div>

    {{-- Imagem --}}
    <div class="col-12 mb-3">
        <label for="path_image" class="form-label">
            Imagem <span class="text-danger">*</span>
        </label>

        <input
            type="file"
            name="path_image"
            data-plugins="dropify"
            data-default-file="{{ isset($announcement) ? ($announcement->path_image != '' ? url('storage/' . $announcement->path_image) : '') : '' }}"
        />

        <p class="text-muted text-center mt-2 mb-0">
            {{ __('dashboard.text_img_size') }}
            <b class="text-danger">2 MB</b>.
        </p>
    </div>

    {{-- Ativo --}}
    <div class="col-12 mb-3">
        <div class="form-check">
            <input
                name="active"
                {{ isset($announcement->active) && $announcement->active == 1 ? 'checked' : '' }}
                type="checkbox"
                class="form-check-input"
                id="invalidCheck{{ isset($announcement->id) ? $announcement->id : '' }}"
            />

            <label
                class="form-check-label"
                for="invalidCheck{{ isset($announcement->id) ? $announcement->id : '' }}"
            >
                {{ __('dashboard.active') }}?
            </label>
        </div>
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
        const displayLocation = document.getElementById('display_location');
        const exhibitionContainer = document.getElementById('exhibition-container');
        const exhibition = document.getElementById('exhibition');

        function toggleExhibition() {
            const show = displayLocation.value === 'web' || displayLocation.value === 'both';

            exhibitionContainer.style.display = show ? '' : 'none';
            exhibition.required = show;

            if (!show) {
                exhibition.value = '';
            }
        }

        displayLocation.addEventListener('change', toggleExhibition);

        toggleExhibition();
    });

    document.addEventListener("DOMContentLoaded", function () {
        const textareaId = "{{$textareaId}}";

        if (document.getElementById(textareaId)) {
            CKEDITOR.replace(textareaId, {
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                ],
                height: 200
            });
        }
    });
</script>