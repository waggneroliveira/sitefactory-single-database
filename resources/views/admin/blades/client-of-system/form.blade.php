{{-- ============================================================
DADOS DO TENANT / CLIENTE
============================================================ --}}

<div class="row g-3">


{{-- ========================================================
PLANO
======================================================== --}}

<div class="mb-3 col-12">

    <label
        for="plan_id{{ isset($tenant->id) ? $tenant->id : '' }}"
        class="form-label"
    >
        Plano
    </label>

    <select
        name="plan_id"
        id="plan_id{{ isset($tenant->id) ? $tenant->id : '' }}"
        class="form-select @error('plan_id') is-invalid @enderror"
    >

        <option value="">
            Selecione um plano
        </option>

        @foreach ($plans as $planOption)

            <option
                value="{{ $planOption->id }}"
                {{ old(
                    'plan_id',
                    isset($tenant) ? $tenant->plan_id : ''
                ) == $planOption->id ? 'selected' : '' }}
            >
                {{ $planOption->name }}
            </option>

        @endforeach

    </select>

    @error('plan_id')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

    @enderror

</div>


</div>

{{-- ============================================================
LIMITES PERSONALIZADOS
============================================================ --}}

<div class="row mt-3">


<div class="col-12">

    <hr>

    <h5 class="mb-1">
        Limites personalizados
    </h5>

    <p class="text-muted mb-3">
        Personalize os limites de conteúdo deste cliente.
        Quando um limite não for informado, será utilizado o limite
        definido pelo plano.
    </p>

</div>

{{-- 
@foreach ($availableModules as $module => $moduleName)

    @php
        $customLimit = $tenantModuleLimits[$module] ?? null;
    @endphp

    <div class="mb-3 col-12 col-md-6 col-lg-4">

        <label
            for="limit_{{ $module }}{{ isset($tenant->id) ? $tenant->id : '' }}"
            class="form-label"
        >
            {{ $moduleName }}
        </label>

        <input
            type="number"
            name="limits[{{ $module }}]"
            class="form-control @error('limits.' . $module) is-invalid @enderror"
            id="limit_{{ $module }}{{ isset($tenant->id) ? $tenant->id : '' }}"
            value="{{ old(
                'limits.' . $module,
                $customLimit
            ) }}"
            min="0"
            placeholder="Usar limite do plano"
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

@endforeach --}}

@foreach ($availableModules as $module => $moduleName)
    <div class="mb-3 col-12 col-md-4 col-lg-3">
        <label for="limit_{{ $module }}" class="form-label">
            {{ $moduleName }}
        </label>

        <input
            type="number"
            name="limits[{{ $module }}]"
            class="form-control @error('limits.' . $module) is-invalid @enderror"
            id="limit_{{ $module }}"
            value="{{ old('limits.' . $module, $tenantModuleLimits[$module]->limit ?? '') }}"
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

{{-- ============================================================
INFORMAÇÃO SOBRE HERANÇA DO PLANO
============================================================ --}}

<div class="row mt-2">


<div class="col-12">

    <div class="alert alert-info mb-0">

        <div class="d-flex align-items-start">

            <i class="mdi mdi-information-outline font-20 me-2"></i>

            <div>

                <strong>
                    Como funcionam os limites?
                </strong>

                <p class="mb-0 mt-1">

                    Os limites personalizados definidos aqui têm
                    prioridade sobre os limites do plano.

                    Se um campo ficar vazio, o cliente utilizará
                    automaticamente o limite definido no plano.

                </p>

            </div>

        </div>

    </div>

</div>


</div>

{{-- ============================================================
STATUS
============================================================ --}}

@if (isset($tenant))


<div class="row mt-3">

    <div class="col-12">

        <div class="form-check">

            <input
                name="active"
                value="1"
                type="checkbox"
                class="form-check-input"
                id="active{{ $tenant->id }}"
                {{ old(
                    'active',
                    $tenant->active
                ) ? 'checked' : '' }}
            >

            <label
                class="form-check-label"
                for="active{{ $tenant->id }}"
            >
                Cliente ativo?
            </label>

        </div>

    </div>

</div>

@endif
