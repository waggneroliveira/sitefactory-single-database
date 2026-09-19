<header id="header" class="shadow-sm position w-100">
    <nav class="navbar navbar-expand-lg navbar-light container py-1 py-lg-3 px-3 px-lg-0">         
        {{-- Pegar tamanho/proporção da logo --}}
        @php
            $logoPath = storage_path('app/public/' . $tenantTheme->path_image_logo_header);
            $dimensions = file_exists($logoPath) ? @getimagesize($logoPath) : null;
        @endphp
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
            <img src="{{ asset('storage/' . $tenantTheme->path_image_logo_header) }}" alt="{{ $tenantTheme->name }}" width="{{ $dimensions[0] ?? 200 }}" height="{{ $dimensions[1] ?? 60 }}" style="max-width:100%;height:auto;">
        </a>

        <!-- Toggle mobile -->
        <button class="navbar-toggler navbar navbar-expand-lg navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Abrir menu de navegação">
            <span class="navbar-toggler-icon" aria-hidden="true"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav justify-content-center align-items-center gap-4 w-100 mt-0">
                <li class="nav-item">
                    <a class="font-changa font-18 font-medium font-header text-color-header active" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="font-changa font-18 font-medium font-header text-color-header" href="{{ request()->routeIs('index') ? '#about' : route('index') . '#about' }}">Sobre Nós</a>
                </li>
                <li class="nav-item">
                    <a class="font-changa font-18 font-medium font-header text-color-header" href="{{route('products')}}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="font-changa font-18 font-medium font-header text-color-header" href="{{ request()->routeIs('index') ? '#faq' : route('index') . '#faq' }}">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="font-changa font-18 font-medium font-header text-color-header" href="{{ request()->routeIs('index') ? '#depoiment' : route('index') . '#depoiment' }}">Depoimentos</a>
                </li>                    
            </ul>

            <!-- Botão -->
            @if ($tenantTheme->link_header <> null)                    
                <div class="col-auto d-flex justify-content-center gap-2 align-items-center btn-header bg-button-one rounded-2 py-3 px-4 hover-zoom">
                    
                    <a href="{{$tenantTheme->link_header}}" target="_blank" rel="noopener noreferrer" class="bg-button-one color-button-one font-changa font-15 font-medium text-decoration-none color-button-one">
                        {{ $tenantTheme->btn_title_header }}
                    </a>

                    <svg width="11" height="9" viewBox="0 0 11 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.77699 8.90909L5.01136 8.15341L8.16335 5.00142H0V3.90767H8.16335L5.01136 0.765624L5.77699 -7.15256e-07L10.2315 4.45454L5.77699 8.90909Z" fill="var(--color-button-one)"/>
                    </svg>

                </div>
            @endif
        </div>
    </nav>
</header>