@extends('admin.core.admin')

@section('content') 
    <div class="container-fluid"> 
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4"> 
            <div> 
                <h1 class="h4 mb-1">Google Search Console</h1> 
                <p class="text-muted mb-0">Gerencie a integração do Google Search Console com o WHI WEB. </p> 
            </div>

            <a href="{{ route('google.search-console.connect') }}" class="btn btn-primary">
                <i class="bi bi-google me-1"></i>
                Conectar ao Google
            </a>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-search fs-1 text-muted"></i>
                </div>

                <h5 class="mb-2">Google Search Console</h5>

                <p class="text-muted mb-4">
                    Conecte sua conta Google para acessar as propriedades
                    disponíveis no Search Console.
                </p>

                <a href="{{ route('google.search-console.connect') }}" class="btn btn-primary">
                    <i class="bi bi-google me-1"></i>
                    Conectar conta Google
                </a>
            </div>
        </div>
    </div>
@endsection
