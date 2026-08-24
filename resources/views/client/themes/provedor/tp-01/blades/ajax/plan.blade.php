@foreach ($plans as $plan)  
    @php
        $price = str_replace('.', ',', $plan->price);
    @endphp
    <div class="swiper-slide plan-ajax-hidden">
        <div class="card-plan bg-white rounded-3 p-3 w-100">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="title">
                    <h4 class="montserrat-medium text-black font-18 mb-1">{{ $plan->title }}</h4>
                    <h5 class="subtitle-plan montserrat-bold font-18 mb-0">{{ $plan->subtitle }}</h5>
                </div>
                <div class="qtd-mb">
                    <span class="subtitle-plan montserrat-bold font-20 lh-sm">{{ $plan->bandwidth_limit }}</span>
                    <p class="montserrat-medium font-15 text-black mb-0 lh-sm">{{ $plan->bandwidth_unit }}</p>
                </div>
            </div>
            <div class="p-0 mt-4 list">
                {!! $plan->description !!}
            </div>
            @if ($price <> "0,00")
                <div class="price">
                    <span class="montserrat-semiBold font-25 text-red d-block text-center">R$ {{ $price }}</span>
                </div>
            @endif

            <div class="call-to-action mt-3 text-center">
                @if (isset($contact) && $contact->phone_one <> null)
                    @php
                        // Remove caracteres não numéricos do telefone
                        $phone = preg_replace('/\D/', '', $contact->phone_one);

                        // Monta mensagem com ícones e quebras de linha
                        $mensagem = "Olá! Tenho interesse no plano:%0A"
                                . "📌 Plano: {$plan->title} {$plan->subtitle}%0A"
                                . "🚀 Velocidade: {$plan->bandwidth_limit} {$plan->bandwidth_unit}%0A"
                                . "💲 Preço: R$ {$price}";
                    @endphp

                    <a 
                        href="https://wa.me/55{{ $phone }}?text={{ $mensagem }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="btn background-red rounded-5 px-5 py-2 text-white montserrat-semiBold font-15"
                    >
                        Quero esse
                    </a>
                @endif
            </div>
        </div>
    </div>
@endforeach
