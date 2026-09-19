@if (isset($slides) && $slides->count() > 0)
    <section class="hero">
        <div class="swiper main-swiper">

            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <!-- Slide -->
                    <div class="swiper-slide">
                        <div class="hero-slide">

                            <!-- Imagem full -->
                            <div class="hero-bg">
                                <picture>
                                    <source srcset="{{ asset('storage/' . $slide->path_image_mobile) }}" media="(max-width: 530px)">
                                    <img src="{{ asset('storage/' . $slide->path_image) }}" alt="{{$slide->title}}" title="{{$slide->title}}">
                                </picture>
                            </div>

                            <!-- Conteúdo -->
                            <div class="hero-content mt-5 mt-lg-0">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <span class="hero-subtitle font-changa font-15 font-regular">
                                                {!!$slide->description!!}
                                            </span>

                                            <h1 class="hero-title font-changa font-40 font-bold">
                                                {{$slide->title}}
                                            </h1>

                                            <div class="hero-actions d-flex">
                                                @if ($slide->link <> null)                                    
                                                    <a href="{{$slide->link}}" target="_blank" rel="noopener noreferrer" class="btn-one rounded-2 py-2 px-3 px-lg-5 btn-hero font-changa bg-button-one color-button-one font-15 font-medium text-decoration-none hover-zoom">
                                                        {{$slide->btn_title}}
                                                        <svg width="11" height="9" viewBox="0 0 11 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.77699 8.90909L5.01136 8.15341L8.16335 5.00142H0V3.90767H8.16335L5.01136 0.765624L5.77699 -7.15256e-07L10.2315 4.45454L5.77699 8.90909Z" fill="var(--color-button-one)"/>
                                                        </svg>
                                                    </a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Paginação -->
            <div class="swiper-pagination news"></div>
        </div>
    </section>
@endif