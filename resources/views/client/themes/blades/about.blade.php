@extends('client.core.client')

@section('content')
    <div class="banner-inner container-fluid d-flex justify-content-center align-items-center flex-column position-relative" style="--banner-bg: url('../images/banner-sobre.png');">
        <span class="color-yellow font-changa font-16 font-bold position-relative z-3">Quem somos? </span>
        <h1 class="font-mobi font-changa font-40 font-bold text-white position-relative z-3 mt-2">Somos a Girollato</h1>
        <p class="font-changa font-15 font-regular text-white position-relative z-3">Conheça um pouco sobre a gente aqui!</p>
    </div>
@if ($topics->count() > 0)
    <section id="topic" class="topics py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @foreach ($topics as $topic)   
                    <div class="col-6 col-md-4 col-lg-2 topic-col">
                        @if ($topic->link <> null)
                            <a href="{{$topic->link}}" class="topic-item d-block" rel="noopener noreferrer">
                                <img src="{{asset('storage/'.$topic->path_image)}}" alt="Tópico 1" class="img-fluid d-block m-auto" loading="lazy">
                            </a>
                            @else
                            <a class="topic-item d-block">
                                <img src="{{asset('storage/'.$topic->path_image)}}" alt="Tópico 1" class="img-fluid d-block m-auto" loading="lazy">
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@if (isset($about) && $about <> null)
    <section class="about">
        <div class="container-fluid">
            <div class="row align-items-center">
            @if (isset($about->path_image) && $about->path_image <> null)                    
                <!-- IMAGEM (fora do container) -->
                <div class="col-12 col-lg-6 p-0 about-image">
                    <img
                    src="{{asset('storage/'.$about->path_image)}}"
                    alt="Sobre a Girollato"
                    class="img-fluid w-100"
                    loading="lazy"
                    >
                </div>
            @endif
            <!-- TEXTO (dentro do container) -->
            <div class="col-12 col-lg-5 mt-4 mt-lg-0 z-3">
                <div class="container position-relative">
                    <img src="{{asset('build/client/images/firula-about.svg')}}" alt="Firula" class="position-absolute left-0 firula-about">

                    <span class="about-subtitle color-yellow font-changa font-16 font-bold d-block mb-2">
                        Quem Somos?
                    </span>

                    <h3 class="about-title font-changa font-50 font-bold mb-3 text-black">
                        {{$about->title}} <span class="color-green">{{$about->subtitle}}</span>
                    </h3>

                    <!-- Conteúdo adicional opcional -->
                    <div class="description">
                        {!! $about->text !!}
                    </div>

                    @if ($about->link <> null)                        
                        <div class="btn-about my-4 d-flex justify-content-center justify-content-lg-start">
                            <a href="{{$about->link}}" class="rounded-pill px-4 btn font-changa bg-green text-white font-18 font-medium text-decoration-none" rel="noopener noreferrer">
                                Saiba mais
                                <svg class="ms-2" width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.78794 12.474L8.02494 6.237L1.78794 -1.90735e-06L0.02079 1.76715L4.46985 6.237L0 10.7068L1.78794 12.474Z" fill="#0E523E"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            </div>
        </div>
    </section>
@endif

@if ($benefitTopics->count())
    <section id="stats-section" class="stats-section py-5 position-relative container-fluid overflow-hidden">
        <img src="{{asset('build/client/images/firula-count.svg')}}" alt="Firula" class="position-absolute top-0 left-0 firula-count">

        <div class="container">
            <div class="row text-center align-items-center g-4">
                @foreach ($benefitTopics as $parametro)                
                    <div class="col-6 col-md-3">
                        <div class="stat-item">
                            <h3 class="stat-number font-changa font-bold font-44" data-target="{{$parametro->number}}">0</h3>
                            <p class="font-changa font-bold font-16 color-green">{{$parametro->title}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@if ($reports->count())
    <section class="mvw-section d-flex justify-content-center align-items-end" id="mvwSection">
        <div class="mvw-overlay"></div>
        <div class="container">
            <div class="mvw-cards row justify-content-center flex-wrap">
                @foreach ($reports as $report)                    
                    <div class="col-12 col-lg-4 mvw-card d-flex justify-content-center align-items-start active" data-bg="{{asset('storage/' . $report->path_image)}}">
                        @if ($report->path_file <> null)                            
                            <div class="icon rounded-circle bg-white d-flex justify-content-center align-items-center">
                                <img src="{{asset('storage/' . $report->path_file)}}" alt="{{$report->title}}">
                            </div>
                        @endif
                        <div class="description ms-2 col-8">
                            <h4 class="font-mobi color-yellow font-changa font-30 font-semibold text-start">{{$report->title}}</h4>
                            <p class="text-white font-changa font-16 font-regular mb-0 font-mobi-12">{{$report->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@if ($directions->count())
    <section id="team-section" class="team-section py-5 position-relative">
        <img src="{{asset('build/client/images/firula-blog.svg')}}" alt="Firula blog" class="firula-blog position-absolute top-0 left-0">
        <div class="container z-3 position-relative">
            <span class="blog-subtitle color-yellow font-changa font-16 font-bold d-block mb-2 m-auto me-0">
                Equipe
            </span>

            <h3 class="about-title font-changa font-50 font-bold color-green mb-3 text-center">
                Respresentantes 
            </h3>
            <div class="row g-4">
                <!-- Card -->
                @foreach ($directions as $representative)                    
                    <div class="col-6 col-sm-6 col-lg-3">
                        <div class="team-card position-relative">
                            <div class="team-image">
                                <img src="{{asset('storage/' . $representative->path_image)}}" alt="{{$representative->title}}">
                            </div>
                            <div class="team-body text-center position-absolute col-11 z-3 bg-white py-2 py-lg-3 px-1 px-lg-2">
                                <h6 class="mb-0 font-changa font-medium font-18 color-green">{{$representative->title}}</h6>
                                <small class="color-grey font-changa font-15 font-regular d-block mb-2">{{$representative->description}}</small>
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    @if ($representative->email <> null || $representative->whatsapp <> null)                                        
                                        <span class="color-green font-changa font-16 font-medium w-100 mb-2">Enviar mensagem</span>
                                        @if ($representative->email <> null)
                                            <a href="mailto:{{$representative->email}}" target="_blank" rel="noopener noreferrer" class="me-1 btn btn-team bg-green text-white font-changa font-15 font-regular rounded-pill d-flex justify-content-center align-items-center" style="width: 35px; height:35px">
                                                <i class="bi bi-envelope"></i>
                                            </a>
                                        @endif
                                        @if ($representative->whatsapp <> null)                                        
                                            <a href="tel:{{$representative->whatsapp}}" target="_blank" rel="noopener noreferrer" class="btn btn-team bg-green text-white font-changa font-15 font-regular rounded-pill d-flex justify-content-center align-items-center" style="width: 35px; height:35px">
                                                <i class="bi bi-whatsapp"></i>
                                            </a>
                                        @endif
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@if (isset($video) && $video->link <> null)
    <section class="video-section">
        <div class="video-container position-relative" 
            data-video="{{$video->link}}">
            
            <img
                alt="Vídeo institucional"
                class="video-thumb"
                loading="eager"
            >

            <button class="video-play-btn" aria-label="Reproduzir vídeo"></button>

        </div>
    </section>
@endif
@if (isset($serviceLocation))
    <section id="coverage-section" class="coverage-section py-5 position-relative">
        <div class="container">
            <div class="row align-items-center gy-4">
                <!-- MAPA -->
                <div class="col-12 col-lg-6 text-center">
                    <div class="text-center text-lg-end mb-4 col-12 col-lg-11">
                        <span class="about-subtitle color-yellow font-changa font-16 font-bold d-block mb-2 text-end m-0 z-3 position-relative w-100">
                            Distribuição
                        </span>

                        <h3 class="about-title font-changa font-50 font-bold color-green mb-3 position-relative">                            
                            {{$serviceLocation->title}}
                        </h3>
                    </div>
                    <img 
                        src="{{asset('storage/' .$serviceLocation->path_image)}}" 
                        alt="Mapa de cobertura"
                        class="img-fluid coverage-map"
                        >
                </div>
                <!-- LISTAS -->
                <div class="col-12 col-lg-6 mt-0">
                    <!-- BAHIA -->
                    <div class="state-block mb-4">
                        <div class="row list-service col-11 col-lg-12 m-auto">
                            {!! $serviceLocation->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('build/client/images/firula-about.svg')}}" alt="Firula" class="position-absolute bottom-0 start-0">
    </section>
@endif


    <script>
        // Normaliza URL
        function norm(url) {
            if (!url) return "";
            return url.startsWith("//") ? window.location.protocol + url : url;
        }

        // Converte para embed (YouTube / Vimeo)
        function toEmbed(rawUrl) {
            const urlStr = norm(rawUrl);
            if (!urlStr) return "";

            let u;
            try { u = new URL(urlStr); } catch { return urlStr; }

            const host = u.hostname.replace(/^www\./, "");

            // YouTube
            if (host.includes("youtube.com") || host.includes("youtu.be")) {

                if (u.pathname.startsWith("/embed/")) return u.toString();

                if (host === "youtu.be" && u.pathname.length > 1) {
                    const id = u.pathname.split("/")[1];
                    return `https://www.youtube.com/embed/${id}?autoplay=1`;
                }

                if (u.pathname.startsWith("/shorts/")) {
                    const id = u.pathname.split("/")[2] || u.pathname.split("/")[1];
                    return `https://www.youtube.com/embed/${id}?autoplay=1`;
                }

                const v = u.searchParams.get("v");
                if (v) return `https://www.youtube.com/embed/${v}?autoplay=1`;

                const parts = u.pathname.split("/").filter(Boolean);
                if (parts.length >= 1) {
                    const id = parts.pop();
                    return `https://www.youtube.com/embed/${id}?autoplay=1`;
                }
            }

            // Vimeo
            if (host.includes("vimeo.com")) {

                if (host === "player.vimeo.com") return u.toString();

                const parts = u.pathname.split("/").filter(Boolean);
                const last = parts[parts.length - 1];
                if (/^\d+$/.test(last)) {
                    return `https://player.vimeo.com/video/${last}?autoplay=1`;
                }
            }

            return urlStr;
        }

        // Video youtube
        const playBtn = document.querySelector('.video-play-btn');

        if (playBtn) {
            playBtn.addEventListener('click', function () {

                const container = this.closest('.video-container');
                const rawUrl = container.getAttribute('data-video');
                const embedUrl = toEmbed(rawUrl);

                container.innerHTML = `
                    <iframe
                        src="${embedUrl}?autoplay=1"
                        frameborder="0"
                        allow="autoplay; encrypted-media"
                        allowfullscreen
                        style="width:100%; height:100%;">
                    </iframe>
                `;
            });
        }


            function getYouTubeId(url) {
            try {
                const u = new URL(url);
                const host = u.hostname.replace(/^www\./, "");

                if (host === "youtu.be") {
                    return u.pathname.split("/")[1];
                }

                if (u.pathname.startsWith("/shorts/")) {
                    return u.pathname.split("/")[2] || u.pathname.split("/")[1];
                }

                const v = u.searchParams.get("v");
                if (v) return v;

                const parts = u.pathname.split("/").filter(Boolean);
                return parts.pop();
            } catch {
                return null;
            }
        }

        document.addEventListener("DOMContentLoaded", function () {

            const container = document.querySelector(".video-container");

            // evita erro se não existir
            if (!container) return;

            const img = container.querySelector(".video-thumb");

            // verifica se a imagem existe também
            if (!img) return;

            const rawUrl = container.getAttribute("data-video");

            if (!rawUrl) return;

            const videoId = getYouTubeId(rawUrl);

            if (videoId) {
                img.src = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
            }

        });

        const section = document.getElementById("mvwSection");
        const cards = document.querySelectorAll(".mvw-card");

        function changeBackground(card) {
            const bg = card.getAttribute("data-bg");
            section.style.backgroundImage = `url(${bg})`;

            cards.forEach(c => c.classList.remove("active"));
            card.classList.add("active");
        }

        cards.forEach(card => {
            card.addEventListener("mouseenter", () => {
                if (window.innerWidth > 768) {
                    changeBackground(card);
                }
            });
        });

        cards.forEach(card => {
            card.addEventListener("click", () => {
                if (window.innerWidth <= 768) {
                    changeBackground(card);
                }
            });
        });
    </script>
@endsection