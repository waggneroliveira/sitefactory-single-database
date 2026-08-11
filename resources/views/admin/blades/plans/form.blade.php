<div class="row g-3">
    <div class="mb-3 col-12 col-md-8">
        <label for="name{{ isset($plan->id) ? $plan->id : '' }}" class="form-label">
            Nome do plano
        </label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            id="name{{ isset($plan->id) ? $plan->id : '' }}"
            value="{{ old('name', isset($plan) ? $plan->name : '') }}"
            placeholder="Ex.: Plano Profissional"
            required
        >

        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-12 col-md-4">
        <label for="price{{ isset($plan->id) ? $plan->id : '' }}" class="form-label">
            Preço mensal
        </label>

        <div class="input-group">
            <span class="input-group-text">R$</span>

            <input
                type="number"
                name="price"
                class="form-control @error('price') is-invalid @enderror"
                id="price{{ isset($plan->id) ? $plan->id : '' }}"
                value="{{ old('price', isset($plan) ? $plan->price : '0.00') }}"
                placeholder="0,00"
                min="0"
                step="0.01"
            >
        </div>

        @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3 col-12">
        <label for="slug{{ isset($plan->id) ? $plan->id : '' }}" class="form-label">
            Slug
        </label>

        <input
            type="text"
            name="slug"
            class="form-control @error('slug') is-invalid @enderror"
            id="slug{{ isset($plan->id) ? $plan->id : '' }}"
            value="{{ old('slug', isset($plan) ? $plan->slug : '') }}"
            placeholder="Ex.: plano-profissional"
        >

        <small class="text-muted">
            Identificador interno do plano.
        </small>

        @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="mb-3 col-12">
    <div class="form-check">
        <input
            name="active"
            value="1"
            type="checkbox"
            class="form-check-input"
            id="active{{ isset($plan->id) ? $plan->id : '' }}"
            {{ old('active', isset($plan) ? $plan->active : true) ? 'checked' : '' }}
        >

        <label class="form-check-label" for="active{{ isset($plan->id) ? $plan->id : '' }}">
            Plano ativo?
        </label>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <hr>

        <h5 class="mb-1">
            Limites de conteúdo
        </h5>

        <p class="text-muted mb-3">
            Defina a quantidade máxima de registros permitida para cada módulo deste plano.
        </p>
    </div>

    @foreach ($availableModules as $module => $moduleName)
        <div class="mb-3 col-12 col-md-4 col-lg-2">
            <label
                for="limit_{{ $module }}{{ isset($plan->id) ? $plan->id : '' }}"
                class="form-label"
            >
                {{ $moduleName }}
            </label>

            <input
                type="number"
                name="limits[{{ $module }}]"
                class="form-control @error('limits.' . $module) is-invalid @enderror"
                id="limit_{{ $module }}{{ isset($plan->id) ? $plan->id : '' }}"
                value="{{ old('limits.' . $module, $currentLimits[$module] ?? '') }}"
                min="0"
                placeholder="Ex.: 10"
            >

            <small class="text-muted">
                {{ $module }}
            </small>

            @error('limits.' . $module)
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    @endforeach
</div>

