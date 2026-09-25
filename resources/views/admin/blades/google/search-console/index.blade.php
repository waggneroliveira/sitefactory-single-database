@extends('admin.core.admin')

@section('content')

<style>
    .nav-tabs .nav-link.active {
        background-color: #cbff4d;
    }

    .nav-link {
        color: #000;
    }

    .trend-up {
        color: #198754;
    }

    .trend-down {
        color: #dc3545;
    }

    .trend-neutral {
        color: #6c757d;
    }

    .comparison-card {
        min-height: 100%;
    }

    .metric-info {
        font-size: 11px;
        font-weight: 400;
    }

    .metric-info i {
        font-size: 10px;
    }

    .section-info {
        font-size: 11px;
        font-weight: 400;
    }

    .trend-info {
        font-size: 11px;
        font-weight: 400;
    }
</style>

<div class="scroll" style="overflow-x:hidden; overflow-y:auto; height:635px;">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 my-3">
        <div class="col-12 col-lg-12 d-flex justify-content-between align-items-center">
            <div class="row col-12 col-lg-10">
                <h1 class="h4 mb-1 d-flex align-items-center gap-2">
                    <i class="bi bi-google"></i>
                    Google Search Console
                </h1>
    
                <p class="text-muted mb-0">
                    Acompanhe o desempenho orgânico dos sites no Google.
                </p>
            </div>

            <a href="{{ route('google.search-console.connect') }}"
                class="btn btn-primary text-dark"
            >
                <i class="bi bi-google me-1"></i>
                Conectar ao Google
            </a>
        </div>

        <span class="badge bg-light text-dark border text-wrap text-start p-2" style="line-height: 16px;">
            <i class="bi bi-info-circle me-1"></i>
            Os dados apresentados são obtidos diretamente do Google Search Console e organizados pelo WHI WEB para facilitar o acompanhamento do desempenho do site. As consultas consideram o período selecionado e o fuso horário de Brasília (America/Sao_Paulo). Pequenas variações em relação ao painel do Google podem ocorrer devido aos períodos, filtros e critérios de processamento utilizados na consulta.
        </span>
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
                        class="btn btn-primary w-100 text-dark"
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
                    <div class="card-body d-flex justify-content-center align-items-center py-0 px-3">

                        <div class="d-flex align-items-center flex-wrap">

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

                                <p class="mb-2 text-muted">
                                    Cliques na pesquisa
                                </p>

                            </div>

                            <div class="avatar-sm">
                                <span class="avatar-title bg-primary-subtle text-primary rounded">
                                    <i class="ri-cursor-line font-24"></i>
                                </span>
                            </div>

                            <span class="badge bg-light text-secondary metric-info text-wrap text-start col-12">
                                <i class="bi bi-info-circle me-1"></i>
                                Total de acessos gerados pelos resultados do Google.
                            </span>
                        </div>

                    </div>
                </div>
            </div>

            {{-- IMPRESSÕES --}}
            <div class="col-xl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body d-flex justify-content-center align-items-center py-0 px-3">

                        <div class="d-flex align-items-center flex-wrap">

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

                                <p class="mb-2 text-muted">
                                    Exibições na pesquisa
                                </p>
                            </div>

                            <div class="avatar-sm">
                                <span class="avatar-title bg-success-subtle text-success rounded">
                                    <i class="ri-eye-line font-24"></i>
                                </span>
                            </div>
                            <span class="badge bg-light text-secondary metric-info text-wrap text-start col-12">
                                <i class="bi bi-info-circle me-1"></i>
                                Quantidade de vezes que uma página apareceu no Google.
                            </span>
                        </div>

                    </div>
                </div>
            </div>

            {{-- CTR --}}
            <div class="col-xl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body d-flex justify-content-center align-items-center py-0 px-3">

                        <div class="d-flex align-items-center flex-wrap">

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

                                <p class="mb-2 text-muted">
                                    Taxa de cliques
                                </p>

                            </div>

                            <div class="avatar-sm">
                                <span class="avatar-title bg-info-subtle text-info rounded">
                                    <i class="ri-percent-line font-24"></i>
                                </span>
                            </div>

                            <span class="badge bg-light text-secondary metric-info col-12">
                                <i class="bi bi-calculator me-1"></i>
                                Cliques ÷ impressões × 100.
                            </span>

                        </div>

                    </div>
                </div>
            </div>

            {{-- POSIÇÃO --}}
            <div class="col-xl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-body d-flex justify-content-center align-items-center py-0 px-3">

                        <div class="d-flex align-items-center flex-wrap">

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

                                <p class="mb-2 text-muted">
                                    Posição nos resultados
                                </p>

                            </div>

                            <div class="avatar-sm">
                                <span class="avatar-title bg-warning-subtle text-warning rounded">
                                    <i class="ri-bar-chart-line font-24"></i>
                                </span>
                            </div>

                            <span class="badge bg-light text-secondary metric-info text-wrap text-start col-12">
                                <i class="bi bi-info-circle me-1"></i>
                                Média das posições em que o site apareceu.
                            </span>

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

                        <p class="text-muted small mb-2">
                            Cliques e impressões por dia.
                        </p>

                        <span class="badge bg-light text-secondary section-info">
                            <i class="bi bi-info-circle me-1"></i>
                            Os dados são agrupados por dia dentro do período selecionado.
                        </span>

                    </div>

                </div>

                <div style="height:350px;">
                    <canvas id="searchConsoleChart"></canvas>
                </div>

            </div>
        </div>

        {{-- DESEMPENHO DETALHADO --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>

                        <h5 class="mb-1">
                            Desempenho detalhado
                        </h5>

                        <p class="text-muted small mb-2">
                            Consulte os principais resultados do período selecionado.
                        </p>

                        <span class="badge bg-light text-secondary section-info">
                            <i class="bi bi-info-circle me-1"></i>
                            Os resultados são organizados pelas métricas registradas pelo Google Search Console.
                        </span>

                    </div>

                </div>

                {{-- ABAS --}}
                <ul
                    class="nav nav-tabs nav-bordered mb-3"
                    role="tablist"
                >

                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="queries-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#queriesContent"
                            type="button"
                            role="tab"
                            aria-controls="queriesContent"
                            aria-selected="true"
                        >
                            <i class="ri-search-line me-1"></i>
                            Principais consultas
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="pages-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#pagesContent"
                            type="button"
                            role="tab"
                            aria-controls="pagesContent"
                            aria-selected="false"
                        >
                            <i class="ri-pages-line me-1"></i>
                            Principais páginas
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="devices-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#devicesContent"
                            type="button"
                            role="tab"
                            aria-controls="devicesContent"
                            aria-selected="false"
                        >
                            <i class="ri-smartphone-line me-1"></i>
                            Dispositivos
                        </button>
                    </li>

                </ul>

                <div class="tab-content">

                    {{-- CONSULTAS --}}
                    <div
                        class="tab-pane fade show active"
                        id="queriesContent"
                        role="tabpanel"
                        aria-labelledby="queries-tab"
                    >

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>

                                <h6 class="mb-1">
                                    Principais consultas
                                </h6>

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
                                        <th class="text-end">Cliques</th>
                                        <th class="text-end">Impressões</th>
                                        <th class="text-end">CTR</th>
                                        <th class="text-end">Posição</th>
                                    </tr>
                                </thead>

                                <tbody id="queriesTable"></tbody>

                            </table>

                        </div>

                    </div>

                    {{-- PÁGINAS --}}
                    <div
                        class="tab-pane fade"
                        id="pagesContent"
                        role="tabpanel"
                        aria-labelledby="pages-tab"
                    >

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>

                                <h6 class="mb-1">
                                    Principais páginas
                                </h6>

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
                                        <th class="text-end">Cliques</th>
                                        <th class="text-end">Impressões</th>
                                        <th class="text-end">CTR</th>
                                        <th class="text-end">Posição</th>
                                    </tr>
                                </thead>

                                <tbody id="pagesTable"></tbody>

                            </table>

                        </div>

                    </div>

                    {{-- DISPOSITIVOS --}}
                    <div
                        class="tab-pane fade"
                        id="devicesContent"
                        role="tabpanel"
                        aria-labelledby="devices-tab"
                    >

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <div>

                                <h6 class="mb-1">
                                    Dispositivos
                                </h6>

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
                                        <th class="text-end">Cliques</th>
                                        <th class="text-end">Impressões</th>
                                        <th class="text-end">CTR</th>
                                        <th class="text-end">Posição</th>
                                    </tr>
                                </thead>

                                <tbody id="devicesTable"></tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        {{-- TENDÊNCIAS --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">

                <div class="mb-4">

                    <h5 class="mb-1">
                        Tendências de pesquisa
                    </h5>

                    <p class="text-muted small mb-2">
                        Compare o período atual com o período anterior de mesma duração.
                    </p>

                    <span class="badge bg-light text-secondary section-info">
                        <i class="bi bi-calculator me-1"></i>
                        A variação é calculada comparando os cliques do período atual com o período anterior equivalente.
                    </span>

                </div>

                <div class="row g-4">

                    {{-- SEU CONTEÚDO --}}
                    <div class="col-12 col-lg-12">

                        <div class="card border h-100 comparison-card">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center mb-3">

                                    <div>

                                        <h5 class="mb-1">
                                            Seu conteúdo
                                        </h5>

                                        <p class="text-muted small mb-2">
                                            Desempenho das páginas do site.
                                        </p>

                                        <span class="badge bg-light text-secondary trend-info">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Superior = mais cliques · Em alta = aumento de cliques · Em baixa = redução de cliques.
                                        </span>

                                    </div>

                                    <i class="ri-pages-line fs-4 text-success"></i>

                                </div>

                                <ul
                                    class="nav nav-tabs mb-3"
                                    role="tablist"
                                >

                                    <li class="nav-item">
                                        <button
                                            class="nav-link active"
                                            data-bs-toggle="tab"
                                            data-bs-target="#pagesTop"
                                            type="button"
                                        >
                                            Superior
                                        </button>
                                    </li>

                                    <li class="nav-item">
                                        <button
                                            class="nav-link"
                                            data-bs-toggle="tab"
                                            data-bs-target="#pagesUp"
                                            type="button"
                                        >
                                            Em alta
                                        </button>
                                    </li>

                                    <li class="nav-item">
                                        <button
                                            class="nav-link"
                                            data-bs-toggle="tab"
                                            data-bs-target="#pagesDown"
                                            type="button"
                                        >
                                            Em baixa
                                        </button>
                                    </li>

                                </ul>

                                <div class="tab-content">

                                    <div
                                        class="tab-pane fade show active"
                                        id="pagesTop"
                                    >
                                        <div
                                            class="table-responsive"
                                            id="pagesTopTable"
                                        ></div>
                                    </div>

                                    <div
                                        class="tab-pane fade"
                                        id="pagesUp"
                                    >
                                        <div
                                            class="table-responsive"
                                            id="pagesUpTable"
                                        ></div>
                                    </div>

                                    <div
                                        class="tab-pane fade"
                                        id="pagesDown"
                                    >
                                        <div
                                            class="table-responsive"
                                            id="pagesDownTable"
                                        ></div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- CONSULTAS --}}
                    <div class="col-12 col-lg-12">

                        <div class="card border h-100 comparison-card">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center mb-3">

                                    <div>

                                        <h5 class="mb-1">
                                            Consultas que levam ao seu site
                                        </h5>

                                        <p class="text-muted small mb-2">
                                            Termos que geram tráfego orgânico.
                                        </p>

                                        <span class="badge bg-light text-secondary trend-info">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Superior = mais cliques · Em alta = aumento de cliques · Em baixa = redução de cliques.
                                        </span>

                                    </div>

                                    <i class="ri-search-line fs-4 text-primary"></i>

                                </div>

                                <ul
                                    class="nav nav-tabs mb-3"
                                    role="tablist"
                                >

                                    <li class="nav-item">
                                        <button
                                            class="nav-link active"
                                            data-bs-toggle="tab"
                                            data-bs-target="#queriesTop"
                                            type="button"
                                        >
                                            Superior
                                        </button>
                                    </li>

                                    <li class="nav-item">
                                        <button
                                            class="nav-link"
                                            data-bs-toggle="tab"
                                            data-bs-target="#queriesUp"
                                            type="button"
                                        >
                                            Em alta
                                        </button>
                                    </li>

                                    <li class="nav-item">
                                        <button
                                            class="nav-link"
                                            data-bs-toggle="tab"
                                            data-bs-target="#queriesDown"
                                            type="button"
                                        >
                                            Em baixa
                                        </button>
                                    </li>

                                </ul>

                                <div class="tab-content">

                                    <div
                                        class="tab-pane fade show active"
                                        id="queriesTop"
                                    >
                                        <div
                                            class="table-responsive"
                                            id="queriesTopTable"
                                        ></div>
                                    </div>

                                    <div
                                        class="tab-pane fade"
                                        id="queriesUp"
                                    >
                                        <div
                                            class="table-responsive"
                                            id="queriesUpTable"
                                        ></div>
                                    </div>

                                    <div
                                        class="tab-pane fade"
                                        id="queriesDown"
                                    >
                                        <div
                                            class="table-responsive"
                                            id="queriesDownTable"
                                        ></div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        {{-- GRÁFICO DE COMPARAÇÃO --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">

                <div class="mb-4">

                    <h5 class="mb-1">
                        Comparativo de tráfego
                    </h5>

                    <p class="text-muted small mb-2">
                        Cliques do período atual comparados ao período anterior.
                    </p>

                    <span class="badge bg-light text-secondary section-info">
                        <i class="bi bi-calculator me-1"></i>
                        Compara o volume de cliques entre os dois períodos equivalentes.
                    </span>

                </div>

                <div style="height:320px;">
                    <canvas id="comparisonChart"></canvas>
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
    let comparisonChart = null;

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

        renderComparisons(data.comparison || {});

        dashboard.classList.remove('d-none');
    }

    function renderChart(rows) {
        const canvas = document.getElementById('searchConsoleChart');

        if (!canvas) {
            return;
        }

        const sortedRows = [...rows].sort(function (a, b) {
            return String(a.keys?.[0] || '').localeCompare(
                String(b.keys?.[0] || '')
            );
        });

        const labels = sortedRows.map(function (row) {
            const date = String(row.keys?.[0] || '');

            if (/^\d{4}-\d{2}-\d{2}$/.test(date)) {
                const [year, month, day] = date.split('-');

                return `${day}/${month}/${year}`;
            }

            return date;
        });

        const clicks = sortedRows.map(function (row) {
            return row.clicks || 0;
        });

        const impressions = sortedRows.map(function (row) {
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
                    x: {
                        reverse: false
                    },

                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function renderComparisons(comparison) {
        const pages = comparison.pages || {};
        const queries = comparison.queries || {};

        const pageData = buildComparison(
            pages.current || [],
            pages.previous || []
        );

        const queryData = buildComparison(
            queries.current || [],
            queries.previous || []
        );

        renderComparisonTable(
            'pagesTopTable',
            pageData.top,
            'Página'
        );

        renderComparisonTable(
            'pagesUpTable',
            pageData.up,
            'Página'
        );

        renderComparisonTable(
            'pagesDownTable',
            pageData.down,
            'Página'
        );

        renderComparisonTable(
            'queriesTopTable',
            queryData.top,
            'Consulta'
        );

        renderComparisonTable(
            'queriesUpTable',
            queryData.up,
            'Consulta'
        );

        renderComparisonTable(
            'queriesDownTable',
            queryData.down,
            'Consulta'
        );

        renderComparisonChart(
            pageData,
            queryData
        );
    }

    function buildComparison(currentRows, previousRows) {
        const previousMap = {};

        previousRows.forEach(function (row) {
            const key = String(row.keys?.[0] || '');

            if (key) {
                previousMap[key] = row;
            }
        });

        const items = currentRows.map(function (row) {
            const key = String(row.keys?.[0] || '');
            const previous = previousMap[key] || {};

            const currentClicks = Number(
                row.clicks || 0
            );

            const previousClicks = Number(
                previous.clicks || 0
            );

            const currentImpressions = Number(
                row.impressions || 0
            );

            const previousImpressions = Number(
                previous.impressions || 0
            );

            const currentCtr = Number(
                row.ctr || 0
            );

            const previousCtr = Number(
                previous.ctr || 0
            );

            const currentPosition = Number(
                row.position || 0
            );

            const previousPosition = Number(
                previous.position || 0
            );

            let variation = 0;

            if (previousClicks > 0) {
                variation =
                    ((currentClicks - previousClicks) /
                    previousClicks) * 100;

            } else if (currentClicks > 0) {
                variation = 100;
            }

            return {
                key: key,
                clicks: currentClicks,
                previousClicks: previousClicks,
                impressions: currentImpressions,
                previousImpressions: previousImpressions,
                ctr: currentCtr,
                previousCtr: previousCtr,
                position: currentPosition,
                previousPosition: previousPosition,
                variation: variation
            };
        });

        const top = [...items]
            .sort(function (a, b) {
                return b.clicks - a.clicks;
            })
            .slice(0, 10);

        const up = [...items]
            .filter(function (item) {
                return item.variation > 0;
            })
            .sort(function (a, b) {
                return b.variation - a.variation;
            })
            .slice(0, 10);

        const down = [...items]
            .filter(function (item) {
                return item.variation < 0;
            })
            .sort(function (a, b) {
                return a.variation - b.variation;
            })
            .slice(0, 10);

        return {
            top: top,
            up: up,
            down: down
        };
    }

    function renderComparisonTable(
        elementId,
        rows,
        label
    ) {
        const element = document.getElementById(elementId);

        if (!element) {
            return;
        }

        if (!rows.length) {
            element.innerHTML = `
                <div class="text-center text-muted py-4">
                    Nenhum dado disponível.
                </div>
            `;

            return;
        }

        element.innerHTML = `
            <table class="table table-hover table-centered mb-0">

                <thead>
                    <tr>
                        <th>
                            ${label}
                        </th>

                        <th class="text-end">
                            Cliques
                        </th>

                        <th class="text-end">
                            Impressões
                        </th>

                        <th class="text-end">
                            Variação
                        </th>
                    </tr>
                </thead>

                <tbody>

                    ${rows.map(function (row) {

                        const variation = row.variation;

                        const trendClass =
                            variation > 0
                                ? 'trend-up'
                                : variation < 0
                                    ? 'trend-down'
                                    : 'trend-neutral';

                        const icon =
                            variation > 0
                                ? '↑'
                                : variation < 0
                                    ? '↓'
                                    : '—';

                        return `
                            <tr>

                                <td>

                                    <div
                                        class="text-truncate"
                                        style="max-width:320px;"
                                        title="${escapeHtml(row.key)}"
                                    >
                                        ${escapeHtml(row.key)}
                                    </div>

                                </td>

                                <td class="text-end">
                                    ${formatNumber(row.clicks)}
                                </td>

                                <td class="text-end">
                                    ${formatNumber(row.impressions)}
                                </td>

                                <td class="text-end">

                                    <span class="${trendClass} fw-semibold">
                                        ${icon}
                                        ${formatVariation(variation)}
                                    </span>

                                </td>

                            </tr>
                        `;

                    }).join('')}

                </tbody>

            </table>
        `;
    }

    function renderComparisonChart(pageData, queryData) {
        const canvas = document.getElementById(
            'comparisonChart'
        );

        if (!canvas) {
            return;
        }

        const pages = pageData.top.slice(0, 5);
        const queries = queryData.top.slice(0, 5);

        const labels = [
            ...pages.map(function (item) {
                return item.key;
            }),

            ...queries.map(function (item) {
                return item.key;
            })
        ];

        const current = [
            ...pages.map(function (item) {
                return item.clicks;
            }),

            ...queries.map(function (item) {
                return item.clicks;
            })
        ];

        const previous = [
            ...pages.map(function (item) {
                return item.previousClicks;
            }),

            ...queries.map(function (item) {
                return item.previousClicks;
            })
        ];

        if (comparisonChart) {
            comparisonChart.destroy();
        }

        comparisonChart = new Chart(canvas, {
            type: 'bar',

            data: {
                labels: labels,

                datasets: [
                    {
                        label: 'Período atual',
                        data: current
                    },
                    {
                        label: 'Período anterior',
                        data: previous
                    }
                ]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: true
                    }
                },

                scales: {
                    x: {
                        ticks: {
                            display: false
                        }
                    },
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
            desktop: 'Computador',
            mobile: 'Celular',
            tablet: 'Tablet'
        };

        return labels[String(device).toLowerCase()] || device;
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

    function formatVariation(value) {
        const number = Number(value || 0);

        return (
            Math.abs(number).toLocaleString(
                'pt-BR',
                {
                    minimumFractionDigits: 1,
                    maximumFractionDigits: 1
                }
            ) + '%'
        );
    }
});
</script>