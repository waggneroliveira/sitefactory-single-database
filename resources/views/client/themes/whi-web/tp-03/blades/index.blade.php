@extends($theme->core('client'))
@section('content')
    <div class="container py-3">
        <div class="row g-4">
            <div class="col-lg-3 order-lg-1 order-2">
                <div class="sidebar-card">
                    <div class="d-flex align-items-center mb-3 px-2">
                        <i class="bi bi-grid-3x3-gap-fill fs-5 text-primary me-2"></i>
                        <h6 class="fw-bold mb-0">Todas as ferramentas</h6>
                    </div>
                    <nav class="nav nav-pills flex-column" id="toolsNav">
                        <a class="nav-link active tool-item" data-tool="calc-juros" data-cat="calculadoras"
                            ><i class="bi bi-percent"></i> Calc. Juros</a
                        >
                        <a class="nav-link tool-item" data-tool="calc-porcentagem" data-cat="calculadoras"
                            ><i class="bi bi-calculator-fill"></i> Calc. Porcentagem</a
                        >
                        <a class="nav-link tool-item" data-tool="calc-financiamento" data-cat="calculadoras"
                            ><i class="bi bi-house"></i> Calc. Financiamento</a
                        >
                        <a class="nav-link tool-item" data-tool="format-json" data-cat="validadores"
                            ><i class="bi bi-braces"></i> Formatador JSON</a
                        >
                        <a class="nav-link tool-item" data-tool="gerar-cartao" data-cat="geradores"
                            ><i class="bi bi-credit-card"></i> Gerar Cartão</a
                        >
                        <a class="nav-link tool-item" data-tool="gerar-cpf" data-cat="geradores"
                            ><i class="bi bi-person-badge"></i> Gerar CPF</a
                        >
                        <a class="nav-link tool-item" data-tool="validar-cpf" data-cat="validadores"
                            ><i class="bi bi-check-circle"></i> Validar CPF</a
                        >
                        <a class="nav-link tool-item" data-tool="gerar-cnpj" data-cat="geradores"
                            ><i class="bi bi-building"></i> Gerar CNPJ</a
                        >
                        <a class="nav-link tool-item" data-tool="gerar-senhas" data-cat="geradores"
                            ><i class="bi bi-lock-fill"></i> Gerador Senhas</a
                        >
                        <a class="nav-link tool-item" data-tool="gerar-uuid" data-cat="geradores"
                            ><i class="bi bi-hash"></i> Gerador UUID</a
                        >
                        <a class="nav-link tool-item" data-tool="conversor-moedas" data-cat="conversores"
                            ><i class="bi bi-currency-dollar"></i> Conversor Moedas</a
                        >
                        <a class="nav-link tool-item" data-tool="contador-palavras" data-cat="calculadoras"
                            ><i class="bi bi-text-paragraph"></i> Contador Palavras</a
                        >
                        <a class="nav-link tool-item" data-tool="sorteador-numeros" data-cat="geradores"
                            ><i class="bi bi-dice-6"></i> Sorteador Números</a
                        >
                        <a class="nav-link tool-item" data-tool="conversor-unidades" data-cat="conversores"
                            ><i class="bi bi-rulers"></i> Conversor Unidades</a
                        >
                        <a class="nav-link tool-item" data-tool="gerador-qr" data-cat="geradores"
                            ><i class="bi bi-qr-code"></i> Gerador QR Code</a
                        >
                    </nav>
                    @if (isset($announcements['sidebar-left'])) 
                        <div class="ad-container mt-4">
                            <p><i class="bi bi-megaphone"></i> PUBLICIDADE</p>
                            <div class="ad-placeholder overflow-hidden">
                                <!-- Seu anúncio aqui<br>(Google Ads) -->
                                    @includeIf('client.components.announcement.sidebar-left', [
                                            'announcement' => $announcements['sidebar-left'] ?? null
                                        ]
                                    )
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 order-lg-2 order-1">
                <div class="main-content-card p-4 p-xl-4">
                    <div id="toolContent" class="fade-tool" style="opacity: 1">
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary"></div>
                            <p class="mt-3">Carregando ferramenta...</p>
                        </div>
                    </div>
                </div>
                @if (isset($announcements['center-bottom']))
                    <div class="ad-container mt-3">
                        <p><i class="bi bi-google"></i> ANÚNCIO RESPONSIVO</p>
                        <div class="ad-placeholder overflow-hidden" style="min-height: 100px">
                            <!-- Espaço para Banner Adsense -->
                            @includeIf('client.components.announcement.center-bottom',[
                                    'announcement' => $announcements['center-bottom'] ?? null
                                ]
                            )
                        </div>
                    </div>
                @endif
            </div>
            
            @if (isset($announcements['sidebar-right']))                
                <div class="col-lg-3 order-lg-3 order-3">
                    <div class="sidebar-card" style="background: white">
                        <div class="ad-container mb-3">
                            <p><i class="bi bi-display"></i> DESTAQUE</p>
                            <div class="ad-placeholder overflow-hidden" style="min-height: 250px">
                                <!-- Anúncio 300x250 -->  
                                @includeIf('client.components.announcement.sidebar-right',[
                                        'announcement' => $announcements['sidebar-right'] ?? null
                                    ]
                                )
                            </div>
                        </div>
                        <div class="mt-3 p-2 bg-light rounded-4 text-center small text-muted">
                            <i class="bi bi-shield-check text-success"></i> Processamento 100% local<br />Seus dados nunca saem
                            do seu dispositivo                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
