@extends('admin.core.admin')

@section('content')

<div class="scroll" style="overflow-x:hidden; overflow-y:auto; height:635px;">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

        <div>
            <h1 class="h4 mb-1">
                Google Search Console
            </h1>

            <p class="text-muted mb-0">
                Acompanhe o desempenho orgânico dos sites no Google.
            </p>
        </div>

        <a
            href="{{ route('google.search-console.connect') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-google me-1"></i>
            Conectar ao Google
        </a>

    </div>

    {{-- FILTROS --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">

            <div class="row align-items-end g-3">

                <div class="col-lg-6">
                    <label for="tenant" class="form-label">
                        Site
                    </label>

                    <select id="tenant" class="form-select">
                        <option value="">
                            Selecione um site
                        </option>

                        @foreach($tenants as $tenant)
                            <option value="{{ $tenant->id }}">
                                {{ $tenant->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3">
                    <label for="period" class="form-label">
                        Período
                    </label>

                    <select id="period" class="form-select">
                        <option value="7">
                            Últimos 7 dias
                        </option>

                        <option value="28" selected>
                            Últimos 28 dias
                        </option>

                        <option value="90">
                            Últimos 3 meses
                        </option>

                        <option value="180">
                            Últimos 6 meses
                        </option>
                    </select>
                </div>

                <div class="col-lg-3">
                    <button
                        type="button"
                        id="loadSearchConsole"
                        class="btn btn-primary w-100"
                    >
                        <i class="bi bi-arrow-repeat me-1"></i>
                        Consultar dados
                    </button>
                </div>

            </div>

        </div>
    </div>

    {{-- LOADING --}}
    <div
        id="searchConsoleLoading"
        class="text-center py-5 d-none"
    >
        <div class="spinner-border text-primary mb-3"></div>

        <div class="text-muted">
            Consultando dados do Google Search Console...
        </div>
    </div>

    {{-- ESTADO VAZIO --}}
    <div
        id="searchConsoleEmpty"
        class="card border-0 shadow-sm"
    >
        <div class="card-body text-center py-5">

            <div class="mb-3">
                <i class="bi bi-bar-chart-line fs-1 text-muted"></i>
            </div>

            <h5 class="mb-2">
                Selecione um site
            </h5>

            <p class="text-muted mb-0">
                Selecione um site acima para consultar os dados
                do Google Search Console.
            </p>

        </div>
    </div>

    {{-- DASHBOARD --}}
    <div
        id="searchConsoleDashboard"
        class="d-none"
    >

        {{-- MÉTRICAS --}}
        <div class="row g-3 mb-4">

            {{-- CLIQUES --}}
            <div class="col-xl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body">

                        <div class="d-flex align-items-center">

                            <div class="flex-grow-1">

                                <h5 class="text-muted fw-normal mt-0 mb-2">
                                    Cliques
                                </h5>

                                <h3
                                    id="metricClicks"
                                    class="my-1"
                                >
                                    0
                                </h3>

                                <p class="mb-0 text-muted">
                                    Cliques na pesquisa
                                </p>

                            </div>

                            <div class="avatar-sm">
                                <span class="avatar-title bg-primary-subtle text-primary rounded">
                                    <i class="ri-cursor-line font-24"></i>
                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            {{-- IMPRESSÕES --}}
            <div class="col-xl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body">

                        <div class="d-flex align-items-center">

                            <div class="flex-grow-1">

                                <h5 class="text-muted fw-normal mt-0 mb-2">
                                    Impressões
                                </h5>

                                <h3
                                    id="metricImpressions"
                                    class="my-1"
                                >
                                    0
                                </h3>

                                <p class="mb-0 text-muted">
                                    Exibições na pesquisa
                                </p>

                            </div>

                            <div class="avatar-sm">
                                <span class="avatar-title bg-success-subtle text-success rounded">
                                    <i class="ri-eye-line font-24"></i>
                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            {{-- CTR --}}
            <div class="col-xl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body">

                        <div class="d-flex align-items-center">

                            <div class="flex-grow-1">

                                <h5 class="text-muted fw-normal mt-0 mb-2">
                                    CTR
                                </h5>

                                <h3
                                    id="metricCtr"
                                    class="my-1"
                                >
                                    0%
                                </h3>

                                <p class="mb-0 text-muted">
                                    Taxa de cliques
                                </p>

                            </div>

                            <div class="avatar-sm">
                                <span class="avatar-title bg-info-subtle text-info rounded">
                                    <i class="ri-percent-line font-24"></i>
                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            {{-- POSIÇÃO --}}
            <div class="col-xl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body">

                        <div class="d-flex align-items-center">

                            <div class="flex-grow-1">

                                <h5 class="text-muted fw-normal mt-0 mb-2">
                                    Posição média
                                </h5>

                                <h3
                                    id="metricPosition"
                                    class="my-1"
                                >
                                    0
                                </h3>

                                <p class="mb-0 text-muted">
                                    Posição nos resultados
                                </p>

                            </div>

                            <div class="avatar-sm">
                                <span class="avatar-title bg-warning-subtle text-warning rounded">
                                    <i class="ri-bar-chart-line font-24"></i>
                                </span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        {{-- GRÁFICO --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h5 class="mb-1">
                            Desempenho
                        </h5>

                        <p class="text-muted small mb-0">
                            Cliques e impressões por dia.
                        </p>
                    </div>

                </div>

                <div style="height:350px;">
                    <canvas id="searchConsoleChart"></canvas>
                </div>

            </div>

        </div>

        {{-- CONSULTAS E PÁGINAS --}}
        <div class="row g-4 mb-4">

            {{-- CONSULTAS --}}
            <div class="col-xl-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>
                                <h5 class="mb-1">
                                    Principais consultas
                                </h5>

                                <p class="text-muted small mb-0">
                                    Termos que geraram tráfego para o site.
                                </p>
                            </div>

                            <span class="badge bg-primary-subtle text-primary">
                                Google
                            </span>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0">

                                <thead>
                                    <tr>
                                        <th>Consulta</th>
                                        <th class="text-end">
                                            Cliques
                                        </th>
                                        <th class="text-end">
                                            Impressões
                                        </th>
                                        <th class="text-end">
                                            CTR
                                        </th>
                                        <th class="text-end">
                                            Posição
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="queriesTable">
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>

            </div>

            {{-- PÁGINAS --}}
            <div class="col-xl-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>
                                <h5 class="mb-1">
                                    Principais páginas
                                </h5>

                                <p class="text-muted small mb-0">
                                    Páginas que receberam tráfego orgânico.
                                </p>
                            </div>

                            <span class="badge bg-success-subtle text-success">
                                Páginas
                            </span>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0">

                                <thead>
                                    <tr>
                                        <th>Página</th>
                                        <th class="text-end">
                                            Cliques
                                        </th>
                                        <th class="text-end">
                                            Impressões
                                        </th>
                                        <th class="text-end">
                                            CTR
                                        </th>
                                        <th class="text-end">
                                            Posição
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="pagesTable">
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- DISPOSITIVOS --}}
        <div class="row g-4 mb-4">

            <div class="col-xl-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>
                                <h5 class="mb-1">
                                    Dispositivos
                                </h5>

                                <p class="text-muted small mb-0">
                                    Desempenho do site por tipo de dispositivo.
                                </p>
                            </div>

                            <span class="badge bg-info-subtle text-info">
                                Dispositivos
                            </span>

                        </div>

                        <div class="table-responsive">

                            <table class="table table-hover table-centered mb-0">

                                <thead>
                                    <tr>
                                        <th>Dispositivo</th>
                                        <th class="text-end">
                                            Cliques
                                        </th>
                                        <th class="text-end">
                                            Impressões
                                        </th>
                                        <th class="text-end">
                                            CTR
                                        </th>
                                        <th class="text-end">
                                            Posição
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="devicesTable">
                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        const tenant = document.getElementById('tenant');
        const period = document.getElementById('period');
        const button = document.getElementById('loadSearchConsole');

        const loading = document.getElementById('searchConsoleLoading');
        const empty = document.getElementById('searchConsoleEmpty');
        const dashboard = document.getElementById('searchConsoleDashboard');

        const metricClicks = document.getElementById('metricClicks');
        const metricImpressions = document.getElementById('metricImpressions');
        const metricCtr = document.getElementById('metricCtr');
        const metricPosition = document.getElementById('metricPosition');

        const queriesTable = document.getElementById('queriesTable');
        const pagesTable = document.getElementById('pagesTable');
        const devicesTable = document.getElementById('devicesTable');

        let chart = null;

        button.addEventListener('click', async function () {

            if (!tenant.value) {
                alert('Selecione um site.');
                return;
            }

            loading.classList.remove('d-none');
            empty.classList.add('d-none');
            dashboard.classList.add('d-none');

            const url =
                '{{ url('/painel/dashboard/google/search-console/performance') }}/' +
                tenant.value +
                '?days=' +
                period.value;

            try {

                const response = await fetch(url);

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(
                        data.message ||
                        'Não foi possível consultar o Search Console.'
                    );
                }

                renderDashboard(data);

            } catch (error) {

                console.error(error);

                alert(error.message);

                empty.classList.remove('d-none');

            } finally {

                loading.classList.add('d-none');

            }

        });

        function renderDashboard(data) {

            const overview = data.overview || {};

            metricClicks.textContent = formatNumber(
                overview.clicks || 0
            );

            metricImpressions.textContent = formatNumber(
                overview.impressions || 0
            );

            metricCtr.textContent = formatPercent(
                overview.ctr || 0
            );

            metricPosition.textContent = formatNumber(
                overview.position || 0,
                1
            );

            renderChart(data.daily || []);

            renderQueries(data.queries || []);

            renderPages(data.pages || []);

            renderDevices(data.devices || []);

            dashboard.classList.remove('d-none');

        }

        function renderChart(rows) {

            const canvas = document.getElementById(
                'searchConsoleChart'
            );

            if (!canvas) {
                return;
            }

            const labels = rows.map(function (row) {
                return row.keys?.[0] || '';
            });

            const clicks = rows.map(function (row) {
                return row.clicks || 0;
            });

            const impressions = rows.map(function (row) {
                return row.impressions || 0;
            });

            if (chart) {
                chart.destroy();
            }

            chart = new Chart(canvas, {

                type: 'line',

                data: {
                    labels: labels,

                    datasets: [
                        {
                            label: 'Cliques',
                            data: clicks,
                            tension: 0.3
                        },
                        {
                            label: 'Impressões',
                            data: impressions,
                            tension: 0.3
                        }
                    ]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    interaction: {
                        mode: 'index',
                        intersect: false
                    },

                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }

            });

        }

        function renderQueries(rows) {

            if (!rows.length) {

                queriesTable.innerHTML = emptyTable(
                    5,
                    'Nenhuma consulta encontrada.'
                );

                return;
            }

            queriesTable.innerHTML = rows.map(function (row) {

                const query = row.keys?.[0] || '-';

                return `
                    <tr>
                        <td>
                            <span class="fw-medium">
                                ${escapeHtml(query)}
                            </span>
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.clicks || 0)}
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.impressions || 0)}
                        </td>

                        <td class="text-end">
                            ${formatPercent(row.ctr || 0)}
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.position || 0, 1)}
                        </td>
                    </tr>
                `;

            }).join('');

        }

        function renderPages(rows) {

            if (!rows.length) {

                pagesTable.innerHTML = emptyTable(
                    5,
                    'Nenhuma página encontrada.'
                );

                return;
            }

            pagesTable.innerHTML = rows.map(function (row) {

                const page = row.keys?.[0] || '-';

                return `
                    <tr>
                        <td style="max-width:260px;">
                            <div
                                class="text-truncate"
                                title="${escapeHtml(page)}"
                            >
                                ${escapeHtml(page)}
                            </div>
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.clicks || 0)}
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.impressions || 0)}
                        </td>

                        <td class="text-end">
                            ${formatPercent(row.ctr || 0)}
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.position || 0, 1)}
                        </td>
                    </tr>
                `;

            }).join('');

        }

        function renderDevices(rows) {

            if (!rows.length) {

                devicesTable.innerHTML = emptyTable(
                    5,
                    'Nenhum dispositivo encontrado.'
                );

                return;
            }

            devicesTable.innerHTML = rows.map(function (row) {

                const device = row.keys?.[0] || '-';

                return `
                    <tr>
                        <td>
                            ${getDeviceLabel(device)}
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.clicks || 0)}
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.impressions || 0)}
                        </td>

                        <td class="text-end">
                            ${formatPercent(row.ctr || 0)}
                        </td>

                        <td class="text-end">
                            ${formatNumber(row.position || 0, 1)}
                        </td>
                    </tr>
                `;

            }).join('');

        }

        function getDeviceLabel(device) {

            const labels = {
                desktop: 'Desktop',
                mobile: 'Mobile',
                tablet: 'Tablet'
            };

            return labels[device] || device;

        }

        function emptyTable(columns, message) {

            return `
                <tr>
                    <td
                        colspan="${columns}"
                        class="text-center text-muted py-4"
                    >
                        ${message}
                    </td>
                </tr>
            `;

        }

        function escapeHtml(value) {

            return String(value)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');

        }

        function formatNumber(value, decimals = 0) {

            return Number(value).toLocaleString(
                'pt-BR',
                {
                    minimumFractionDigits: decimals,
                    maximumFractionDigits: decimals
                }
            );

        }

        function formatPercent(value) {

            return (
                Number(value) * 100
            ).toLocaleString(
                'pt-BR',
                {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }
            ) + '%';

        }

    });

</script>
