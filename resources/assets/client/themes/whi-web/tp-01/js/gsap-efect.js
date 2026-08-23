document.addEventListener("DOMContentLoaded", () => {
    /*====================== Slides ====================== */

    // Registra uma linha do tempo GSAP
    const tl = gsap.timeline({
        defaults: {
            ease: "power3.out",
            duration: 0.9
        }
    });

    // 1. Imagem de fundo em zoom out suave
    tl.from("#hero img", {
        scale: 1.15,
        opacity: 0,
        duration: 1.2
    })
    // 2. Elementos de texto surgindo com stagger (efeito cascata)
    .from([
        ".hero-badge",
        ".type-wrap",
        ".hero-title",
        ".description",
        ".banner_text + div a", // Anima os botões de ação
    ], {
        y: 40,
        opacity: 0,
        stagger: 0.25
    }, "-=0.6") // Começa 0.6s antes do fim da animação anterior

    // 3. Imagem da coluna da direita surgindo
    .from(".hero_img img", {
        y: 50,
        opacity: 0,
        scale: 0.75,
        duration: 1
    }, "-=0.6")

    // 4. Estatísticas subindo suavemente
    .from(".hero-stats-item", {
        y: 30,
        opacity: 0,
        stagger: 0.1
    }, "-=0.5");

    /*====================== Topicos ====================== */

    gsap.registerPlugin(ScrollTrigger);
    // Linha do tempo acionada quando a seção entra na tela
    const sectionTl = gsap.timeline({
        scrollTrigger: {
            trigger: "#how_sec",
            start: "top 75%",
            toggleActions: "play none none none"
        }
    });

    // 1. Entrada fluida dos elementos de iluminação de fundo (Glow effect)
    sectionTl.from("#how_sec .blure_shape", {
        scale: 0.3,
        opacity: 0,
        duration: 1.6,
        stagger: 0.3,
        ease: "power2.out"
    })

    // 2. Animação elegante dos Cards de Tópicos (Cascata 3D leve)
    .from("#how_sec .af_block", {
        y: 60,
        opacity: 0,
        scale: 0.92,
        duration: 1,
        stagger: 0.35,
        ease: "back.out(1.5)" // Dá um leve efeito 'elastic' na chegada
    }, "-=1.2")

    // 3. Surgimento elegante do Device na parte inferior
    .from("#how_sec .device img", {
        y: 100,
        opacity: 0,
        scale: 0.9,
        duration: 1.2,
        ease: "power3.out"
    }, "-=0.6");

    // BONUS: Efeito Parallax suave no Device durante a rolagem da página
    gsap.to("#how_sec .device img", {
        y: -30,
        ease: "none",
        scrollTrigger: {
            trigger: "#how_sec",
            start: "top bottom",
            end: "bottom top",
            scrub: true
        }
    });

    /*====================== Personalize seu projeto ====================== */
    // Timeline sincronizada com a rolagem para a seção #why_sec
    const whyTl = gsap.timeline({
        scrollTrigger: {
            trigger: "#why_sec",
            start: "top 75%",
            toggleActions: "play none none none"
        }
    });

    // 1. Título e Badge surgindo do topo com suavidade
    whyTl.from("#why_sec .section_title", {
        y: -40,
        opacity: 0,
        duration: 0.8,
        ease: "power3.out"
    })

    // 2. Blocos de etapas (01 a 04) vindo da esquerda (Fade-Right) em cascata
    .from("#why_sec .why_data_block", {
        x: -60,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2, // Anima cada bloco sequencialmente
        ease: "power2.out"
    }, "-=0.4")

    // 3. Efeito Pop-In nos números das etapas (01, 02, 03, 04)
    .from("#why_sec .why_data_block .number", {
        scale: 0,
        rotation: -20,
        duration: 0.5,
        stagger: 0.2,
        ease: "back.out(1.8)"
    }, "-=1.0")

    // 4. Imagem principal do painel (GIF/Preview) vindo da direita (Fade-Left)
    .from("#why_sec .why_us_new_img", {
        y: 80,
        opacity: 0,
        scale: 0.95,
        duration: 1,
        ease: "power3.out"
    }, "-=1.2")

    // 5. Tablet surgindo da direita-inferior com profundidade
    .from("#why_sec img[src*='tablet.png']", {
        x: 50,
        y: 30,
        opacity: 0,
        duration: 0.8,
        ease: "back.out(1.4)"
    }, "-=0.6")

    // 6. Smartphone surgindo da esquerda-inferior encaixando na composição
    .from("#why_sec img[src*='phone-login.png']", {
        x: -40,
        y: 30,
        opacity: 0,
        duration: 0.8,
        ease: "back.out(1.4)"
    }, "-=0.6");
});