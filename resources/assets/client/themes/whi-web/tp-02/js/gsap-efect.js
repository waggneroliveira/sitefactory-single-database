document.addEventListener("DOMContentLoaded", () => {
    /* =============================================================
     * 1. SWIPER HERO (main-swiper)
     * ============================================================= */
    const swiper = new Swiper('.main-swiper', {
        loop: true,
        speed: 1200, // Transição do swiper mais lenta para acompanhar a suavidade
        pagination: {
            el: '.swiper-pagination.news',
            clickable: true,
        },
        on: {
            init: function () {
                animateSlideSmooth(this.slides[this.activeIndex]);
            },
            slideChangeTransitionStart: function () {
                animateSlideSmooth(this.slides[this.activeIndex]);
            }
        }
    });

    function animateSlideSmooth(activeSlide) {
        const bgImage = activeSlide.querySelector('.hero-bg img');
        const title = activeSlide.querySelector('.hero-title');
        const subtitle = activeSlide.querySelector('.hero-subtitle');
        const button = activeSlide.querySelector('.hero-actions');

        // 1. Reset instantâneo com posições Iniciais Suaves (sem sobressaltos)
        gsap.set(['.hero-title', '.hero-subtitle', '.hero-actions'], {
            opacity: 0,
            y: 45
        });

        gsap.set(bgImage, {
            scale: 1.12,
            filter: 'blur(12px) brightness(0.85)'
        });

        // 2. Timeline com curva de desaceleração ultra fluida (expo.out / power4.out)
        const tl = gsap.timeline({
            defaults: { ease: "expo.out" }
        });

        tl
            // Fundo: desfoque e brilho suavizam gradualmente + zoom out bem lento
            .to(bgImage, {
                scale: 1,
                filter: 'blur(0px) brightness(1)',
                duration: 2.2,
                ease: "power3.out"
            })
            // Título: entra flutuando de baixo para cima com longo movimento de desaceleração
            .to(title, {
                opacity: 1,
                y: 0,
                duration: 1.6,
            }, "-=1.8")

            // Subtítulo: segue a mesma linha
            .to(subtitle, {
                opacity: 1,
                y: 0,
                duration: 1.5,
            }, "-=1.3")

            // Botão: surge sem solavancos
            .to(button, {
                opacity: 1,
                y: 0,
                duration: 1.4,
            }, "-=1.1");
    }

    /* =============================================================
     * 2. TOPIC COLUMNS (#topic .topic-col)
     * ============================================================= */
    if (typeof gsap !== "undefined" && typeof ScrollTrigger !== "undefined") {
        gsap.registerPlugin(ScrollTrigger);
    }

    // Seleciona todas as colunas de tópicos
    const topicCols = document.querySelectorAll('#topic .topic-col');

    if (topicCols.length > 0) {
        gsap.from(topicCols, {
            scrollTrigger: {
                trigger: "#topic",
                start: "top 80%", // Inicia quando o topo da seção atinge 80% da tela
                toggleActions: "play none none none"
            },
            opacity: 0,
            y: 35,
            scale: 0.95,
            duration: 1.2,
            ease: "expo.out",
            stagger: 0.15 // Intervalo suave entre a entrada de cada tópico
        });
    }

    /* =============================================================
     * 3. ABOUT + LINHA DO TEMPO
     * ============================================================= */
    /* -------------------------------------------------------------
     * 1. ANIMAÇÃO DO BLOCO SOBRE (Imagem + Texto)
     * ------------------------------------------------------------- */
    const aboutSection = document.querySelector('.about');

    if (aboutSection) {
        const aboutImg = aboutSection.querySelector('.about-image img');
        const aboutTitle = aboutSection.querySelector('.about-title');
        const aboutDesc = aboutSection.querySelector('.description');
        const aboutBtn = aboutSection.querySelector('.btn-about');

        const tlAbout = gsap.timeline({
            scrollTrigger: {
                trigger: aboutSection,
                start: "top 75%",
                toggleActions: "play none none none"
            },
            defaults: { ease: "expo.out", duration: 1.4 }
        });

        // Imagem entra da esquerda para a direita com leve zoom
        if (aboutImg) {
            tlAbout.from(aboutImg, {
                x: -80,
                opacity: 0,
                scale: 0.95,
            });
        }

        // Textos entram em cascata logo em seguida
        tlAbout.from([aboutTitle, aboutDesc, aboutBtn], {
            y: 40,
            opacity: 0,
            stagger: 0.15,
            duration: 1.2
        }, "-=1.0");
    }

    /* -------------------------------------------------------------
     * 2. ANIMAÇÃO DA LINHA DO TEMPO (Cards 01, 02, 03, 04 + Ícones)
     * ------------------------------------------------------------- */
    const timelineSection = document.querySelector('.linha-do-tempo');

    if (timelineSection) {
        // Animação de entrada dos cards da linha do tempo
        const boxes = timelineSection.querySelectorAll('.works8-boxarea');
        const icons = timelineSection.querySelectorAll('.icons');

        // Mapeamento para garantir a sequência correta dos passos (01 -> 02 -> 03 -> 04)
        boxes.forEach((box) => {
            const stepNumber = box.querySelector('h5')?.innerText.trim();

            gsap.from(box, {
                scrollTrigger: {
                    trigger: box,
                    start: "top 85%",
                    toggleActions: "play none none none"
                },
                y: 50,
                opacity: 0,
                scale: 0.9,
                duration: 1.2,
                ease: "expo.out"
            });
        });

        // Animação com rotação e escala para os ícones flutuantes
        icons.forEach((icon) => {
            gsap.from(icon, {
                scrollTrigger: {
                    trigger: icon,
                    start: "top 88%",
                    toggleActions: "play none none none"
                },
                scale: 0,
                rotate: -20,
                opacity: 0,
                duration: 1,
                ease: "back.out(1.7)"
            });
        });

        // Animação da imagem decorativa de fundo ("firula")
        const firula = document.querySelector('.about > img.position-absolute');
        if (firula) {
            gsap.from(firula, {
                scrollTrigger: {
                    trigger: timelineSection,
                    start: "top 70%",
                    toggleActions: "play none none none"
                },
                x: -100,
                opacity: 0,
                duration: 1.8,
                ease: "power3.out"
            });
        }
    }

    /* =============================================================
     * 4. PILARES / TABS (section-container + pillar-card)
     * ============================================================= */
    // Busca a seção ou o contêiner dos pilares (ajuste a classe se necessário)
    const section = document.querySelector('.section-container') || document.body;

    const header = section.querySelector('.row.mb-5');
    const pillarCards = section.querySelectorAll('.pillar-card');
    const activePane = section.querySelector('.tab-pane.active');

    /* -------------------------------------------------------------
     * 1. ANIMAÇÃO INICIAL COM DEFAULTS SEGUROS (fromTo)
     * ------------------------------------------------------------- */
    const tlSection = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: "top 85%", // Dispara um pouco mais cedo para evitar atrasos
            toggleActions: "play none none none"
        },
        defaults: { ease: "expo.out", duration: 1.2 }
    });

    // Animação do cabeçalho (se existir)
    if (header) {
        tlSection.fromTo(header, { y: 40, opacity: 0 }, { y: 0, opacity: 1 });
    }

    // Animação dos cards/botões (garante que vão de opacity 0 para 1)
    if (pillarCards.length > 0) {
        tlSection.fromTo(
            pillarCards,
            { y: 30, opacity: 0 },
            { y: 0, opacity: 1, stagger: 0.12 },
            header ? "-=0.8" : 0
        );
    }

    // Animação do conteúdo da primeira aba ativa
    if (activePane) {
        tlSection.add(() => animatePaneContent(activePane), "-=0.4");
    }

    /* =============================================================
     * 5. EXHIBITIONS SECTION (.our-exhibitions)
     * ============================================================= */
    const exhibitionSection = document.querySelector('.our-exhibitions');

    if (exhibitionSection) {
        const title = exhibitionSection.querySelector('.section-title');
        const slides = exhibitionSection.querySelectorAll('.swiper-slide');
        const navButtons = exhibitionSection.querySelector('.swiper-navigation-wrapper');
        const firulaImg = exhibitionSection.querySelector('img[alt="firula exhibition"]');

        const tlExhibition = gsap.timeline({
            scrollTrigger: {
                trigger: exhibitionSection,
                start: "top 80%", // Dispara quando a seção entra 20% na tela
                toggleActions: "play none none none"
            },
            defaults: { ease: "expo.out", duration: 1.2 }
        });

        // Animação do Título e Botão do Topo
        if (title) {
            tlExhibition.fromTo(title,
                { y: 40, opacity: 0 },
                { y: 0, opacity: 1 }
            );
        }

        // Animação em Cascata dos Cards (Slides) do Swiper
        if (slides.length > 0) {
            tlExhibition.fromTo(slides,
                { y: 50, opacity: 0 },
                { y: 0, opacity: 1, stagger: 0.15 },
                title ? "-=0.8" : 0
            );
        }

        // Animação dos Botões de Navegação do Swiper
        if (navButtons) {
            tlExhibition.fromTo(navButtons,
                { y: 20, opacity: 0 },
                { y: 0, opacity: 1, duration: 0.8 },
                "-=0.6"
            );
        }

        // Animação da imagem decorativa lateral (Firula)
        if (firulaImg) {
            tlExhibition.fromTo(firulaImg,
                { x: -50, opacity: 0 },
                { x: 0, opacity: 1, duration: 1.4 },
                "-=1"
            );
        }
    }

    /* =============================================================
     * 6. SOLUTIONS SECTION (.solutions-section)
     * ============================================================= */
    const solutionsSection = document.querySelector('.solutions-section');

    if (solutionsSection) {
        const header = solutionsSection.querySelector('.row.align-items-end');
        const bannerCard = solutionsSection.querySelector('.banner-card');
        const sliderArea = solutionsSection.querySelector('.solutions-swiper');
        const navButtons = solutionsSection.querySelector('.row.mt-4');

        const tlSolutions = gsap.timeline({
            scrollTrigger: {
                trigger: solutionsSection,
                start: "top 80%", // Dispara quando a seção entra 20% na tela
                toggleActions: "play none none none"
            },
            defaults: { ease: "expo.out", duration: 1.2 }
        });

        // 1. Animação de entrada do Cabeçalho da Seção
        if (header) {
            tlSolutions.fromTo(header,
                { y: 40, opacity: 0 },
                { y: 0, opacity: 1 }
            );
        }

        // 2. Animação de entrada do Banner da Esquerda
        if (bannerCard) {
            tlSolutions.fromTo(bannerCard,
                { x: -40, opacity: 0 },
                { x: 0, opacity: 1 },
                header ? "-=0.8" : 0
            );
        }

        // 3. Animação de entrada da Área de Cards/Slider da Direita
        if (sliderArea) {
            tlSolutions.fromTo(sliderArea,
                { x: 40, opacity: 0 },
                { x: 0, opacity: 1 },
                bannerCard ? "-=1" : 0
            );
        }

        // 4. Animação de entrada dos Botões de Navegação do Swiper
        if (navButtons) {
            tlSolutions.fromTo(navButtons,
                { y: 20, opacity: 0 },
                { y: 0, opacity: 1, duration: 0.8 },
                "-=0.8"
            );
        }
    }

    /* =============================================================
     * 7. PRODUCTS SECTION (.products-section)
     * ============================================================= */
    const productsSection = document.querySelector('.products-section');

    if (productsSection) {
        const header = productsSection.querySelector('.my-5.my-lg-4');
        const productCards = productsSection.querySelectorAll('.products .product');
        const btnMore = productsSection.querySelector('.btn-product');

        const tlProducts = gsap.timeline({
            scrollTrigger: {
                trigger: productsSection,
                start: "top 80%", // Ativa quando o topo da seção atinge 80% da viewport
                toggleActions: "play none none none"
            },
            defaults: { ease: "power3.out", duration: 1 }
        });

        // 1. Entrada do Cabeçalho (Título e Descrição)
        if (header) {
            tlProducts.fromTo(header,
                { y: 30, opacity: 0 },
                { y: 0, opacity: 1 }
            );
        }

        // 2. Animação em cascata (Stagger) para cada card de produto
        if (productCards.length > 0) {
            tlProducts.fromTo(productCards,
                { y: 40, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    stagger: 0.12, // Intervalo entre a animação de cada card
                    duration: 0.8
                },
                header ? "-=0.6" : 0
            );
        }

        // 3. Entrada do Botão Principal do Rodapé da Seção
        if (btnMore) {
            tlProducts.fromTo(btnMore,
                { y: 20, opacity: 0 },
                { y: 0, opacity: 1, duration: 0.6 },
                "-=0.4"
            );
        }
    }

    /* =============================================================
     * 8. LETS GO + TEAM + DEPOIMENT
     * ============================================================= */
    /* -------------------------------------------------------------
     * 1. ANIMAÇÃO: SECTION LETS GO (.lets-go)
     * ------------------------------------------------------------- */
    const letsGoSection = document.querySelector('.lets-go');

    if (letsGoSection) {
        const letsGoImg = letsGoSection.querySelector('.content-left img');
        const letsGoTitle = letsGoSection.querySelector('.about-title');
        const letsGoDesc = letsGoSection.querySelector('p');
        const letsGoBtns = letsGoSection.querySelectorAll('.step-actions a');
        const firulaImg = letsGoSection.querySelector('img[alt="firula letsgo"]');

        const tlLetsGo = gsap.timeline({
            scrollTrigger: {
                trigger: letsGoSection,
                start: "top 80%",
                toggleActions: "play none none none"
            },
            defaults: { ease: "power3.out", duration: 0.9 }
        });

        // Animação da imagem da esquerda (caso exista)
        if (letsGoImg) {
            tlLetsGo.fromTo(letsGoImg, { x: -50, opacity: 0 }, { x: 0, opacity: 1 });
        }

        // Animação do conteúdo de texto
        if (letsGoTitle) {
            tlLetsGo.fromTo(letsGoTitle, { y: 30, opacity: 0 }, { y: 0, opacity: 1 }, letsGoImg ? "-=0.6" : 0);
        }
        if (letsGoDesc) {
            tlLetsGo.fromTo(letsGoDesc, { y: 20, opacity: 0 }, { y: 0, opacity: 1 }, "-=0.7");
        }

        // Animação em cascata (stagger) dos botões de redes sociais
        if (letsGoBtns.length > 0) {
            tlLetsGo.fromTo(letsGoBtns,
                { y: 20, opacity: 0 },
                { y: 0, opacity: 1, stagger: 0.15, duration: 0.6 },
                "-=0.5"
            );
        }

        // Animação do detalhe visual no canto inferior
        if (firulaImg) {
            tlLetsGo.fromTo(firulaImg, { scale: 0.8, opacity: 0 }, { scale: 1, opacity: 1, duration: 0.8 }, "-=0.6");
        }
    }

    /* -------------------------------------------------------------
     * 2. ANIMAÇÃO: TEAM SECTION (#team-section)
     * ------------------------------------------------------------- */
    const teamSection = document.querySelector('#team-section');

    if (teamSection) {
        const teamCards = teamSection.querySelectorAll('.team-card');

        if (teamCards.length > 0) {
            gsap.fromTo(teamCards,
                { y: 50, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.8,
                    ease: "power3.out",
                    stagger: 0.15, // Revelação sequencial dos membros do time
                    scrollTrigger: {
                        trigger: teamSection,
                        start: "top 80%",
                        toggleActions: "play none none none"
                    }
                }
            );
        }
    }

    /* -------------------------------------------------------------
     * 3. ANIMAÇÃO: DEPOIMENT SECTION (#depoiment)
     * ------------------------------------------------------------- */
    const depoimentSection = document.querySelector('#depoiment');

    if (depoimentSection) {
        const verticalText = depoimentSection.querySelector('.vertical-text');
        const titles = depoimentSection.querySelectorAll('h2');
        const swiperContainer = depoimentSection.querySelector('.testimonial-swiper');

        const tlDepoiment = gsap.timeline({
            scrollTrigger: {
                trigger: depoimentSection,
                start: "top 75%",
                toggleActions: "play none none none"
            },
            defaults: { ease: "power3.out", duration: 0.9 }
        });

        // Texto lateral vertical subindo suavemente
        if (verticalText) {
            tlDepoiment.fromTo(verticalText, { y: 40, opacity: 0 }, { y: 0, opacity: 1 });
        }

        // Entrada dos títulos principais
        if (titles.length > 0) {
            tlDepoiment.fromTo(titles,
                { y: 30, opacity: 0 },
                { y: 0, opacity: 1, stagger: 0.15 },
                verticalText ? "-=0.7" : 0
            );
        }

        // Entrada do slider Swiper
        if (swiperContainer) {
            tlDepoiment.fromTo(swiperContainer,
                { y: 40, opacity: 0 },
                { y: 0, opacity: 1, duration: 1 },
                "-=0.5"
            );
        }
    }
});

/* =============================================================
 * FUNÇÕES GLOBAIS (changeTab / animatePaneContent)
 * ============================================================= */
/* -------------------------------------------------------------
 * ANIMAÇÃO INTERNA DA ABA (TEXTOS, IMAGEM E BARRA)
 * ------------------------------------------------------------- */
function animatePaneContent(pane) {
    if (!pane) return;

    const title = pane.querySelector('h3');
    const desc = pane.querySelector('p');
    const progressContainer = pane.querySelector('.progress-container');
    const progressBar = pane.querySelector('.custom-progress-bar');
    const img = pane.querySelector('.content-image');

    // Recupera o valor da barra (ex: style="width: 90%")
    const targetWidth = progressBar ? progressBar.style.width : "0%";

    if (progressBar) gsap.set(progressBar, { width: "0%" });

    const tl = gsap.timeline({ defaults: { ease: "power3.out" } });

    const textElements = [title, desc, progressContainer].filter(Boolean);

    if (textElements.length > 0) {
        tl.fromTo(
            textElements,
            { y: 30, opacity: 0 },
            { y: 0, opacity: 1, duration: 0.8, stagger: 0.1 }
        );
    }

    if (img) {
        tl.fromTo(
            img,
            { x: 40, opacity: 0, scale: 0.95 },
            { x: 0, opacity: 1, scale: 1, duration: 1, ease: "expo.out" },
            "-=0.6"
        );
    }

    if (progressBar) {
        tl.to(progressBar, {
            width: targetWidth,
            duration: 1.2,
            ease: "power2.out"
        }, "-=0.8");
    }
}

/* -------------------------------------------------------------
 * FUNÇÃO DE TROCA DE ABAS (changeTab)
 * ------------------------------------------------------------- */
function changeTab(tabId, element) {
    const currentActivePane = document.querySelector('.tab-pane.active');
    const targetPane = document.getElementById(tabId);

    if (currentActivePane === targetPane) return;

    // Atualiza classe ativa dos botões
    document.querySelectorAll('.pillar-card').forEach(btn => btn.classList.remove('active'));
    if (element) element.classList.add('active');

    // Transição de saída e entrada das abas
    if (currentActivePane) {
        gsap.to(currentActivePane, {
            opacity: 0,
            y: -15,
            duration: 0.3,
            ease: "power2.in",
            onComplete: () => {
                currentActivePane.classList.remove('active');
                if (targetPane) {
                    targetPane.classList.add('active');
                    gsap.set(targetPane, { opacity: 1, y: 0 });
                    animatePaneContent(targetPane);
                }
            }
        });
    } else if (targetPane) {
        targetPane.classList.add('active');
        animatePaneContent(targetPane);
    }
}