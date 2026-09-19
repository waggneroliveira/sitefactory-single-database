<header class="shadow-sm bg-header">
    <nav class="navbar navbar-expand-lg navbar-light container py-2 px-3 px-lg-0">            
        <!-- Logo -->
        @php
            $logoPath = storage_path('app/public/' . $tenantTheme->path_image_logo_header);
            $dimensions = file_exists($logoPath) ? @getimagesize($logoPath) : null;
        @endphp
        <a class="navbar-brand d-flex align-items-center p-0 m-0" href="{{route('index')}}">
            <img loading="lazy" src="{{asset('storage/' .$tenantTheme->path_image_logo_header)}}" class="logo-header" alt="{{ $tenantTheme->name }}" width="{{ $dimensions[0] ?? 200 }}" height="{{ $dimensions[1] ?? 60 }}" style="max-width:100%;height:auto;">
        </a>

        <!-- Toggle mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false"  aria-label="Abrir menu de navegação">
            <span class="navbar-toggler-icon" aria-hidden="true"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto m-auto me-4 mb-2 mb-lg-0 gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link font-changa font-16 font-semibold font-header text-color-header active" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-changa font-16 font-semibold font-header text-color-header" href="{{route('index')}}#about">Quem Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-changa font-16 font-semibold font-header text-color-header" href="{{route('index')}}#services">Serviços</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-changa font-16 font-semibold font-header text-color-header" href="{{ request()->routeIs('index') ? '#depoiment' : route('index') . '#depoiment' }}">Depoimentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-changa font-16 font-semibold font-header text-color-header" href="{{route('index')}}#faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-changa font-16 font-semibold font-header text-color-header" href="{{route('index')}}#contato">Contato</a>
                </li>
            </ul>

            <!-- Botão -->
            @if (isset($tenantTheme->link_header) && $tenantTheme->link_header <> null)                        
                <div class="d-flex justify-content-center gap-2 align-items-center btn-header bg-button-one py-2 px-4 hover-zoom">                        
                    <a href="{{$tenantTheme->link_header}}" target="_blank" class="font-changa font-15 font-medium text-decoration-none color-button-one">
                        {{$tenantTheme->btn_title_header}}
                    </a>
                    
                    <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-one)"></path>
                    </svg>
                </div>                    
            @endif
        </div>
    </nav>
</header>