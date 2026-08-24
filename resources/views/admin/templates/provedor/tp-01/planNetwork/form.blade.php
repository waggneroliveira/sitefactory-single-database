<div class="col-12 col-lg-12">
    <div class="row">
        <div class="mb-3 col-12 col-lg-6 d-flex align-items-start flex-column">
            <label for="category-select" class="form-label">Categoria(s) <span class="text-danger">*</span></label>
            @php
                $currentCategory = isset($plan) ? $planNetwork->plan_category : null;
            @endphp
        
            <select name="plan_category" class="form-select" id="category-select" required>
                <option value="" disabled selected>Selecione o Cliente</option>
                @foreach ($planNetworkCategory as $categoryValue => $categoryLabel)
                    <option value="{{ $categoryValue }}" {{ $categoryValue == $currentCategory ? 'selected' : '' }}>
                        {{ $categoryLabel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 col-12 col-lg-6">
            <label for="price" class="form-label">Preço</label>
            <input type="text" name="price" class="form-control price-mask" id="price{{isset($planNetwork->id)?$planNetwork->id:''}}" value="{{ isset($plan) ? number_format($planNetwork->price, 2, ',', '.') : '' }}" placeholder="Preço">
        </div>

        <div class="mb-3 col-12 col-lg-6">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" class="form-control" id="title{{isset($planNetwork->id)?$planNetwork->id:''}}" value="{{isset($plan)?$planNetwork->title:''}}" placeholder="Digite o título">
        </div>

        <div class="mb-3 col-12 col-lg-6">
            <label for="subtitle" class="form-label">Subtítulo</label>
            <input type="text" name="subtitle" class="form-control" id="subtitle{{isset($planNetwork->id)?$planNetwork->id:''}}" value="{{isset($plan)?$planNetwork->subtitle:''}}" placeholder="Digite o subtitulo">
        </div>
    </div>
    
    <div class="row">
        <div class="mb-3 col-12 col-lg-6">
            <label for="bandwidth_limit" class="form-label">Largura de banda</label>
            <input type="text" name="bandwidth_limit" class="form-control" id="bandwidth_limit{{isset($planNetwork->id)?$planNetwork->id:''}}" value="{{isset($plan)?$planNetwork->bandwidth_limit:''}}" placeholder="Ex: 300">
        </div>
        <div class="mb-3 col-12 col-lg-6">
            <label for="bandwidth_unit" class="form-label">Unidade da largura de banda </label>
            <input type="text" name="bandwidth_unit" class="form-control" id="bandwidth_unit{{isset($planNetwork->id)?$planNetwork->id:''}}" value="{{isset($plan)?$planNetwork->bandwidth_unit:''}}" placeholder="Ex: Mb, Gb">
        </div>
    </div>
    
    <div class="mb-3 col-12 d-flex align-items-start flex-column">
        <label for="{{ $textareaId }}" class="form-label">Texto</label>
        <textarea name="description" class="form-control col-12" id="{{ $textareaId }}" rows="5">
            {!!isset($plan)?$planNetwork->description:''!!}
        </textarea>
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input name="active" {{ isset($planNetwork->active) && $planNetwork->active == 1 ? 'checked' : '' }} type="checkbox" class="form-check-input" id="invalidCheck{{isset($planNetwork->id)?$planNetwork->id:''}}" />
            <label class="form-check-label" for="invalidCheck">{{__('dashboard.active')}}?</label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('{{ $textareaId }}', {
        allowedContent: false,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
            { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
            { name: 'tools', items: ['Maximize'] }
        ],
        height: 260
    });
</script>

