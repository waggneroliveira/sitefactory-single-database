@if($products->isEmpty())
    <div class="col-12 mt-5 text-center">
        <div class="alert alert-warning font-changa">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Nenhum produto encontrado para 
            <strong>{{ $title }}</strong>.
        </div>

        <div class="step-actions mt-3 d-flex justify-content-center">
            <a href="{{ route('products') }}" class="hover-zoom rounded-pill px-4 py-2 font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none" rel="noopener noreferrer">
                Limpar filtros
                <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="var(--color-button-two)"/>
                </svg>
            </a>
        </div>
    </div>
@else
    @foreach ($products as $product)
        <div class="col-6 col-lg-4 mb-4 product">
            <div class="product-card bg-white shadow-sm rounded-3 p-0 position-relative">
                <div class="image position-relative mb-0">
                    <img src="{{asset('storage/' . $product->path_image)}}" alt="{{$product->title}}" loading="lazy">
                </div>
                <div class="p-3 pb-2">
                    <h6 class="font-changa font-18 font-semibold text-dark text-start">{{$product->title}}</h6>
                    <p class="color-grey font-changa font-16 font-regular mb-0 text-start lh-sm">{{substr(strip_tags($product->description), 0, 70)}}</p>
                </div>
                <div class="row flex-wrap justify-content-center mt-0">
                    <div class="btn-group m-auto m-lg-0 col-10 px-0 justify-content-center justify-content-lg-start" role="group">
                        @php
                            if (is_string($product->sizes)) {
                                $sizes = json_decode($product->sizes, true);
                            } else {
                                $sizes = $product->sizes;
                            }

                            // Garante que seja array
                            $sizes = is_array($sizes) ? $sizes : [];

                            // Remove null, '', false etc
                            $sizes = collect($sizes)
                            ->filter()
                            ->values()
                            ->toArray();
                        @endphp

                        @if (!empty($sizes))
                            @foreach($sizes as $size)
                                @php
                                    preg_match('/^(\d+(?:[.,]\d+)?)\s*(.*)$/u', trim($size), $matches);
                                @endphp

                                <button class="btn d-flex flex-column text-dark font-changa btn-sm me-2">
                                    @if(isset($matches[1]))
                                        <span class="fw-bold font-15">{{ $matches[1] }}</span>
                                        @if(!empty($matches[2]))
                                            <span class="font-12">{{ $matches[2] }}</span>
                                        @endif
                                    @else
                                        {{ $size }}
                                    @endif
                                </button>
                            @endforeach
                        @else
                            <i class="bi bi-exclamation-circle text-muted me-2"></i>
                            <p class="text-dark text-center text-lg-start font-changa font-16 font-medium">
                                Não disponível
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center mt-0">
                    <div class="d-flex flex-wrap justify-content-between align-items-center col-10 px-0 pb-3 mt-3">
                        <div class="user-card col-7">
                            <div class="avatar">
                                {{-- <img src="caminho-da-imagem.jpg" alt="Foto do usuário"> --}}
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.4107 34.8214C27.0264 34.8214 34.8214 27.0264 34.8214 17.4107C34.8214 7.79504 27.0264 0 17.4107 0C7.79504 0 0 7.79504 0 17.4107C0 27.0264 7.79504 34.8214 17.4107 34.8214Z" fill="#E5E7EB"/>
                                <path d="M17.41 17.4104C20.6152 17.4104 23.2136 14.812 23.2136 11.6068C23.2136 8.40157 20.6152 5.80322 17.41 5.80322C14.2048 5.80322 11.6064 8.40157 11.6064 11.6068C11.6064 14.812 14.2048 17.4104 17.41 17.4104Z" fill="#9CA3AF"/>
                                <path d="M5.80371 29.0176C5.80371 20.8926 11.6073 20.8926 17.4109 20.8926C23.2144 20.8926 29.018 20.8926 29.018 29.0176H5.80371Z" fill="#9CA3AF"/>
                                </svg>
                            </div>
                            <div class="user-info text-start">
                                <h3 class="user-name font-changa font-10 font-bold text-dark mb-0">TAMILES ALVES</h3>
                                <span class="user-role font-changa font-10 font-medium text-dark">Professora de Inglês</span>
                            </div>
                        </div>
                        
                        @php
                            $isExternal = $product->link_type === 'external';

                            $href = $isExternal
                                ? $product->link
                                : route('client.product', [
                                    'category' => $product->category->slug,
                                    'slug' => $product->slug
                                ]);
                        @endphp

                        <a href="{{ $href }}"
                        class="col-4"
                        @if($isExternal) target="_blank" rel="noopener noreferrer" @endif>

                            <span class="bg-button-one color-button-one rounded-2 py-2 px-2 btn-view font-changa font-11 font-medium col-12 d-flex align-items-center justify-content-center mb-0">
                                Garantir agora
                            </span>

                        </a>
                    </div>
                        
                </div>
            </div>
        </div>
    @endforeach
@endif