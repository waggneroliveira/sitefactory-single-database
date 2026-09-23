@php
    $announcement = $announcement ?? null;

    $uid = $uid ?? ($announcement?->id ?? 'create');

    $textareaId = $textareaId ?? 'text' . $uid;

    /*
    |--------------------------------------------------------------------------
    | Público
    |--------------------------------------------------------------------------
    */

    $currentTarget = old(
        'target',
        $announcement?->target ?? 'all'
    );

    /*
    |--------------------------------------------------------------------------
    | Clientes selecionados
    |--------------------------------------------------------------------------
    */

    $selectedTenantIds = old('tenant_id');

    if ($selectedTenantIds === null) {
        $selectedTenantIds = $announcement
            ? $announcement->tenants->pluck('id')->toArray()
            : [];
    }

    $selectedTenantIds = array_map(
        'strval',
        (array) $selectedTenantIds
    );

    /*
    |--------------------------------------------------------------------------
    | Mapa de clientes selecionados
    |--------------------------------------------------------------------------
    */

    $announcementTenants = $announcement?->tenants ?? collect();

    $tenantsMap = collect($tenants ?? [])
        ->mapWithKeys(fn ($t) => [
            (string) $t->id => $t->name
        ])
        ->toArray();

    foreach ($announcementTenants as $t) {
        $key = (string) $t->id;

        if (!array_key_exists($key, $tenantsMap)) {
            $tenantsMap[$key] = $t->name;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Tipo
    |--------------------------------------------------------------------------
    */

    $currentType = old(
        'type',
        $announcement?->type ?? 'general'
    );

    /*
    |--------------------------------------------------------------------------
    | Local de exibição
    |--------------------------------------------------------------------------
    */

    $currentDisplayLocation = old(
        'display_location',
        $announcement?->display_location ?? 'web'
    );

    /*
    |--------------------------------------------------------------------------
    | Slots de anúncio selecionados
    |--------------------------------------------------------------------------
    */

    $selectedAdSlotIds = old('ad_slot_ids');

    if ($selectedAdSlotIds === null) {
        $selectedAdSlotIds = $announcement
            ? $announcement->adSlots->pluck('id')->toArray()
            : [];
    }

    $selectedAdSlotIds = array_map(
        'strval',
        (array) $selectedAdSlotIds
    );

    /*
    |--------------------------------------------------------------------------
    | Mapa dos slots
    |--------------------------------------------------------------------------
    */

    $adSlotsMap = collect($adSlots ?? [])
        ->mapWithKeys(fn ($slot) => [
            (string) $slot->id => [
                'name' => $slot->name,
                'exhibition' => $slot->exhibition,
            ]
        ])
        ->toArray();

    foreach (($announcement?->adSlots ?? collect()) as $slot) {
        $key = (string) $slot->id;

        if (!array_key_exists($key, $adSlotsMap)) {
            $adSlotsMap[$key] = [
                'name' => $slot->name,
                'exhibition' => $slot->exhibition,
            ];
        }
    }
@endphp

<div class="row">

    {{-- Público do anúncio --}}
    <div class="mb-3 col-12 col-lg-6">
        <label for="target-{{ $uid }}" class="form-label">
            Público do anúncio
            <span class="text-danger">*</span>
        </label>

        <select
            name="target"
            class="form-select"
            id="target-{{ $uid }}"
            required
        >
            <option
                value="all"
                @selected($currentTarget === 'all')
            >
                Todos os clientes
            </option>

            <option
                value="specific"
                @selected($currentTarget === 'specific')
            >
                Clientes específicos
            </option>
        </select>

        <small class="text-muted">
            Defina se o anúncio será exibido para todos os clientes ou apenas para clientes selecionados.
        </small>
    </div>

    {{-- Seleção de clientes --}}
    <div
        class="mb-3 col-12 col-lg-6"
        id="tenants-container-{{ $uid }}"
        style="{{ $currentTarget === 'specific' ? '' : 'display: none;' }}"
    >
        <label
            for="tenant-selector-{{ $uid }}"
            class="form-label"
        >
            Selecionar clientes
        </label>

        <select
            id="tenant-selector-{{ $uid }}"
            class="form-select"
        >
            <option value="">
                Selecione um cliente...
            </option>

            @foreach($tenants as $tenant)
                <option
                    value="{{ $tenant->id }}"
                    data-name="{{ $tenant->name }}"
                    @disabled(in_array((string) $tenant->id, $selectedTenantIds, true))
                >
                    {{ $tenant->name }}
                </option>
            @endforeach
        </select>

        <small class="text-muted">
            Selecione os clientes que receberão este anúncio.
        </small>

        {{-- Inputs hidden dos clientes selecionados --}}
        <div id="selected-tenants-inputs-{{ $uid }}"></div>

        {{-- Lista dos clientes selecionados --}}
        <div
            id="selected-tenants-{{ $uid }}"
            class="d-flex flex-wrap gap-2 mt-3"
        ></div>
    </div>

    {{-- Local de exibição --}}
    <div class="mb-3 col-md-6 col-12">
        <label
            for="display_location-{{ $uid }}"
            class="form-label"
        >
            Local de exibição
            <span class="text-danger">*</span>
        </label>

        <select
            name="display_location"
            class="form-select"
            id="display_location-{{ $uid }}"
            required
        >
            <option
                value="web"
                @selected($currentDisplayLocation === 'web')
            >
                Site
            </option>

            <option
                value="panel"
                @selected($currentDisplayLocation === 'panel')
            >
                Painel
            </option>

            <option
                value="both"
                @selected($currentDisplayLocation === 'both')
            >
                Site e Painel
            </option>
        </select>
    </div>

    {{-- Tipo --}}
    <div
        class="mb-3 col-md-6 col-12"
        id="type-container-{{ $uid }}"
    >
        <label
            for="type-{{ $uid }}"
            class="form-label"
        >
            Tipo
            <span class="text-danger">*</span>
        </label>

        <select
            name="type"
            class="form-select"
            id="type-{{ $uid }}"
            required
        >
            <option
                value="general"
                @selected($currentType === 'general')
            >
                Geral
            </option>

            <option
                value="maintenance"
                @selected($currentType === 'maintenance')
            >
                Manutenção
            </option>

            <option
                value="update"
                @selected($currentType === 'update')
            >
                Atualização
            </option>

            <option
                value="promotion"
                @selected($currentType === 'promotion')
            >
                Promoção
            </option>

            <option
                value="warning"
                @selected($currentType === 'warning')
            >
                Aviso
            </option>
        </select>
    </div>

    {{-- Espaços de anúncio --}}
    <div
        class="mb-3 col-12"
        id="ad-slots-container-{{ $uid }}"
    >
        <label
            for="ad-slot-selector-{{ $uid }}"
            class="form-label"
        >
            Espaços de anúncio
            <span class="text-danger">*</span>
        </label>

        <select
            id="ad-slot-selector-{{ $uid }}"
            class="form-select"
        >
            <option value="">
                Selecione um espaço de anúncio...
            </option>

            @foreach($adSlots as $adSlot)
                <option
                    value="{{ $adSlot->id }}"
                    data-name="{{ $adSlot->name }}"
                    data-exhibition="{{ $adSlot->exhibition }}"
                    @disabled(in_array((string) $adSlot->id, $selectedAdSlotIds, true))
                >
                    {{ $adSlot->name }}
                    -
                    @if($adSlot->exhibition === 'horizontal')
                        Horizontal Desktop
                    @elseif($adSlot->exhibition === 'mobile')
                        Horizontal Mobile
                    @elseif($adSlot->exhibition === 'vertical')
                        Vertical
                    @endif
                </option>
            @endforeach
        </select>

        <small class="text-muted">
            Selecione os espaços onde este anúncio poderá ser exibido.
        </small>

        {{-- Inputs hidden dos slots selecionados --}}
        <div id="selected-ad-slots-inputs-{{ $uid }}"></div>

        {{-- Lista dos slots selecionados --}}
        <div
            id="selected-ad-slots-{{ $uid }}"
            class="d-flex flex-wrap gap-2 mt-3"
        ></div>
    </div>

    {{-- Período de exibição --}}
    <div class="mb-3 col-md-6 col-12">
        <label
            for="starts_at-{{ $uid }}"
            class="form-label"
        >
            Início da exibição
        </label>

        <input
            type="datetime-local"
            name="starts_at"
            id="starts_at-{{ $uid }}"
            class="form-control"
            value="{{ old('starts_at', $announcement?->starts_at?->format('Y-m-d\TH:i') ?? '') }}"
        >

        <small class="text-muted">
            Deixe vazio para exibir imediatamente.
        </small>
    </div>

    <div class="mb-3 col-md-6 col-12">
        <label
            for="ends_at-{{ $uid }}"
            class="form-label"
        >
            Fim da exibição
        </label>

        <input
            type="datetime-local"
            name="ends_at"
            id="ends_at-{{ $uid }}"
            class="form-control"
            value="{{ old('ends_at', $announcement?->ends_at?->format('Y-m-d\TH:i') ?? '') }}"
        >

        <small class="text-muted">
            Deixe vazio para não definir uma data de término.
        </small>
    </div>

    {{-- Link --}}
    <div class="col-12 mb-3">
        <label
            for="link-{{ $uid }}"
            class="form-label"
        >
            Link
        </label>

        <input
            type="text"
            name="link"
            class="form-control"
            id="link-{{ $uid }}"
            value="{{ old('link', $announcement?->link ?? '') }}"
            placeholder="Link"
        >
    </div>

    {{-- Texto --}}
    <div class="col-12 mb-3">
        <label
            for="{{ $textareaId }}"
            class="form-label text-muted"
        >
            Texto
        </label>

        <textarea
            name="text"
            id="{{ $textareaId }}"
            placeholder="Texto"
            class="col-12"
            rows="10"
        >{!! old('text', $announcement?->text ?? '') !!}</textarea>
    </div>

    {{-- Imagem --}}
    <div class="col-12 mb-3">
        <label
            for="path_image-{{ $uid }}"
            class="form-label"
        >
            Imagem
            <span class="text-danger">*</span>
        </label>

        <input
            type="file"
            name="path_image"
            id="path_image-{{ $uid }}"
            data-plugins="dropify"
            data-default-file="{{ $announcement?->path_image ? url('storage/' . $announcement->path_image) : '' }}"
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
                value="1"
                type="checkbox"
                class="form-check-input"
                id="invalidCheck-{{ $uid }}"
                @checked(old('active', $announcement?->active ?? false))
            >

            <label
                class="form-check-label"
                for="invalidCheck-{{ $uid }}"
            >
                {{ __('dashboard.active') }}?
            </label>
        </div>
    </div>

</div>

<style>
    .selected-tenant-badge,
    .selected-ad-slot-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 10px;
        background: #f1f3f5;
        border: 1px solid #dee2e6;
        border-radius: 20px;
        font-size: 14px;
    }

    .selected-tenant-badge button,
    .selected-ad-slot-badge button {
        border: 0;
        background: transparent;
        padding: 0;
        margin: 0;
        color: #dc3545;
        cursor: pointer;
        line-height: 1;
    }

    .selected-tenant-badge button:hover,
    .selected-ad-slot-badge button:hover {
        color: #a71d2a;
    }

    .selected-ad-slot-badge small {
        color: #6c757d;
    }
</style>

<script>
    (function () {
        const uid = "{{ $uid }}";

        function initAnnouncementForm() {
            /*
            |--------------------------------------------------------------------------
            | Elementos
            |--------------------------------------------------------------------------
            */

            const target = document.getElementById('target-' + uid);

            const tenantsContainer = document.getElementById(
                'tenants-container-' + uid
            );

            const tenantSelector = document.getElementById(
                'tenant-selector-' + uid
            );

            const selectedTenants = document.getElementById(
                'selected-tenants-' + uid
            );

            const selectedTenantsInputs = document.getElementById(
                'selected-tenants-inputs-' + uid
            );

            const displayLocation = document.getElementById(
                'display_location-' + uid
            );

            const typeContainer = document.getElementById(
                'type-container-' + uid
            );

            const type = document.getElementById(
                'type-' + uid
            );

            const adSlotSelector = document.getElementById(
                'ad-slot-selector-' + uid
            );

            const selectedAdSlots = document.getElementById(
                'selected-ad-slots-' + uid
            );

            const selectedAdSlotsInputs = document.getElementById(
                'selected-ad-slots-inputs-' + uid
            );

            if (
                !target ||
                !tenantsContainer ||
                !tenantSelector ||
                !selectedTenants ||
                !selectedTenantsInputs ||
                !displayLocation ||
                !typeContainer ||
                !type ||
                !adSlotSelector ||
                !selectedAdSlots ||
                !selectedAdSlotsInputs
            ) {
                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Clientes
            |--------------------------------------------------------------------------
            */

            const tenantsMap = @json($tenantsMap);

            const selectedTenantIds = new Set(
                @json($selectedTenantIds)
            );

            function renderSelectedTenants() {
                selectedTenants.innerHTML = '';
                selectedTenantsInputs.innerHTML = '';

                selectedTenantIds.forEach(function (tenantId) {
                    tenantId = String(tenantId);

                    const option = tenantSelector.querySelector(
                        `option[value="${tenantId}"]`
                    );

                    const tenantName =
                        option?.dataset?.name ??
                        tenantsMap[tenantId] ??
                        null;

                    if (!tenantName) {
                        return;
                    }

                    const input = document.createElement('input');

                    input.type = 'hidden';
                    input.name = 'tenant_id[]';
                    input.value = tenantId;

                    selectedTenantsInputs.appendChild(input);

                    const badge = document.createElement('span');

                    badge.className = 'selected-tenant-badge';

                    badge.innerHTML = `
                        <span>${tenantName}</span>

                        <button
                            type="button"
                            title="Remover"
                            data-tenant-id="${tenantId}"
                        >
                            <i class="bi bi-x-lg"></i>
                        </button>
                    `;

                    selectedTenants.appendChild(badge);

                    if (option) {
                        option.disabled = true;
                    }
                });
            }

            tenantSelector.addEventListener('change', function () {
                const tenantId = this.value;

                if (!tenantId) {
                    return;
                }

                selectedTenantIds.add(String(tenantId));

                renderSelectedTenants();

                this.value = '';
            });

            selectedTenants.addEventListener('click', function (event) {
                const button = event.target.closest('[data-tenant-id]');

                if (!button) {
                    return;
                }

                const tenantId = String(
                    button.dataset.tenantId
                );

                selectedTenantIds.delete(tenantId);

                const option = tenantSelector.querySelector(
                    `option[value="${tenantId}"]`
                );

                if (option) {
                    option.disabled = false;
                }

                renderSelectedTenants();
            });

            function toggleTenants() {
                const show = target.value === 'specific';

                tenantsContainer.style.display =
                    show ? '' : 'none';
            }

            target.addEventListener(
                'change',
                toggleTenants
            );

            /*
            |--------------------------------------------------------------------------
            | Slots de anúncio
            |--------------------------------------------------------------------------
            */

            const selectedAdSlotIds = new Set(
                @json($selectedAdSlotIds)
            );

            function getExhibitionLabel(exhibition) {
                switch (exhibition) {
                    case 'horizontal':
                        return 'Horizontal Desktop';

                    case 'mobile':
                        return 'Horizontal Mobile';

                    case 'vertical':
                        return 'Vertical';

                    default:
                        return exhibition;
                }
            }

            function renderSelectedAdSlots() {
                selectedAdSlots.innerHTML = '';
                selectedAdSlotsInputs.innerHTML = '';

                selectedAdSlotIds.forEach(function (adSlotId) {
                    adSlotId = String(adSlotId);

                    const option = adSlotSelector.querySelector(
                        `option[value="${adSlotId}"]`
                    );

                    const slotData = @json($adSlotsMap)[adSlotId];

                    const slotName =
                        option?.dataset?.name ??
                        slotData?.name ??
                        null;

                    const exhibition =
                        option?.dataset?.exhibition ??
                        slotData?.exhibition ??
                        null;

                    if (!slotName) {
                        return;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Input hidden
                    |--------------------------------------------------------------------------
                    */

                    const input = document.createElement('input');

                    input.type = 'hidden';
                    input.name = 'ad_slot_ids[]';
                    input.value = adSlotId;

                    selectedAdSlotsInputs.appendChild(input);

                    /*
                    |--------------------------------------------------------------------------
                    | Badge
                    |--------------------------------------------------------------------------
                    */

                    const badge = document.createElement('span');

                    badge.className = 'selected-ad-slot-badge';

                    badge.innerHTML = `
                        <span>
                            ${slotName}
                            ${exhibition
                                ? `<small>(${getExhibitionLabel(exhibition)})</small>`
                                : ''
                            }
                        </span>

                        <button
                            type="button"
                            title="Remover"
                            data-ad-slot-id="${adSlotId}"
                        >
                            <i class="bi bi-x-lg"></i>
                        </button>
                    `;

                    selectedAdSlots.appendChild(badge);

                    if (option) {
                        option.disabled = true;
                    }
                });
            }

            adSlotSelector.addEventListener('change', function () {
                const adSlotId = this.value;

                if (!adSlotId) {
                    return;
                }

                selectedAdSlotIds.add(String(adSlotId));

                renderSelectedAdSlots();

                this.value = '';
            });

            selectedAdSlots.addEventListener('click', function (event) {
                const button = event.target.closest(
                    '[data-ad-slot-id]'
                );

                if (!button) {
                    return;
                }

                const adSlotId = String(
                    button.dataset.adSlotId
                );

                selectedAdSlotIds.delete(adSlotId);

                const option = adSlotSelector.querySelector(
                    `option[value="${adSlotId}"]`
                );

                if (option) {
                    option.disabled = false;
                }

                renderSelectedAdSlots();
            });

            /*
            |--------------------------------------------------------------------------
            | Tipo
            |--------------------------------------------------------------------------
            */

            function toggleWebFields() {
                typeContainer.style.display = '';
                type.required = true;
            }

            displayLocation.addEventListener(
                'change',
                toggleWebFields
            );

            /*
            |--------------------------------------------------------------------------
            | Inicialização
            |--------------------------------------------------------------------------
            */

            renderSelectedTenants();

            renderSelectedAdSlots();

            toggleTenants();

            toggleWebFields();

            /*
            |--------------------------------------------------------------------------
            | CKEditor
            |--------------------------------------------------------------------------
            */

            const textareaId = "{{ $textareaId }}";

            if (
                document.getElementById(textareaId) &&
                typeof CKEDITOR !== 'undefined'
            ) {
                if (CKEDITOR.instances[textareaId]) {
                    CKEDITOR.instances[textareaId].destroy(true);
                }

                CKEDITOR.replace(textareaId, {
                    toolbar: [
                        {
                            name: 'basicstyles',
                            items: [
                                'Bold',
                                'Italic',
                                'Underline'
                            ]
                        }
                    ],
                    height: 200
                });
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Inicialização
        |--------------------------------------------------------------------------
        */

        if (document.readyState === 'loading') {
            document.addEventListener(
                'DOMContentLoaded',
                initAnnouncementForm
            );
        } else {
            initAnnouncementForm();
        }
    })();
</script>