@if($products->isEmpty())
    <div class="col-12 mt-5 text-center">
        <div class="alert alert-warning font-changa">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Nenhum produto encontrado para 
            <strong>{{ $title }}</strong>.
        </div>

        <div class="step-actions mt-3 d-flex justify-content-center">
            <a href="{{ route('products') }}" class="rounded-pill px-4 btn font-changa bg-green text-white font-15 font-medium text-decoration-none" rel="noopener noreferrer">
                Limpar filtros
                <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="#0E523E"/>
                </svg>
            </a>
        </div>
    </div>
@else
    @foreach ($products as $product)
        <div class="col-6 col-sm-6 col-lg-4">
            <div class="product-card">
                <div class="image border rounded-3 position-relative mb-3">
                    <a href="{{ route('client.product', ['category' => $product->category->slug, 'slug' => $product->slug]) }}">
                        <span class="btn btn-view font-changa font-16 font-medium opacity-0 col-10 col-lg-5">
                            Ver Produto
                        </span>
                        <img src="{{asset('storage/' . $product->path_image)}}" alt="{{$product->title}}">
                    </a>
                </div>
                <h6 class="font-changa font-18 font-semibold color-green">{{$product->title}}</h6>
                <p class="color-grey font-changa font-18 font-medium">{{$product->description}}</p>
            </div>
        </div>
    @endforeach
@endif