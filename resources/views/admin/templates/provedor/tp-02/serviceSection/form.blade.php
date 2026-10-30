@php
    $service = $serviceSection->get('service');
@endphp

<div class="row">
    <input type="hidden" name="section" value="service">

    <div class="mb-3 col-lg-6">
        <label for="title" class="form-label">Título</label>
        <input type="text"
               name="title"
               class="form-control"
               id="title"
               value="{{ $service?->title ?? '' }}"
               placeholder="Título">
    </div>

    <div class="mb-3 col-lg-6">
        <label for="subtitle" class="form-label">Subtitulo</label>
        <input type="text"
               name="subtitle"
               class="form-control"
               id="subtitle"
               value="{{ $service?->subtitle ?? '' }}"
               placeholder="Subtitulo">
    </div>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descrição breve</label>
    <input type="text"
           name="description"
           class="form-control"
           id="description"
           value="{{ $service?->description ?? '' }}"
           placeholder="Descrição">
</div>

<div class="mb-3">
    <div class="form-check">
        <input name="active"
               value="1"
               {{ $service?->active ? 'checked' : '' }}
               type="checkbox"
               class="form-check-input"
               id="active">

        <label class="form-check-label" for="active">
            {{ __('dashboard.active') }}?
        </label>
    </div>
</div>