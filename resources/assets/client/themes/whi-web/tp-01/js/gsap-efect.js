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
            start: "top 80%",
            toggleActions: "play none none reverse",
            id: "howSec"
        }
    });

    // 1. Entrada fluida dos elementos de iluminação de fundo (Glow effect)
    sectionTl.from("#how_sec .blure_shape", {
        scale: 0.3,
        opacity: 0,
        duration: 1.2,
        stagger: 0.2,
        ease: "power2.out"
    }, 0)

    // 2. Animação elegante dos Cards de Tópicos (Cascata 3D leve)
    .from("#how_sec .af_block", {
        y: 60,
        opacity: 0,
        scale: 0.92,
        duration: 0.9,
        stagger: 0.25,
        ease: "back.out(1.5)" // Dá um leve efeito 'elastic' na chegada
    }, "-=0.8")

    // 3. Surgimento elegante do Device na parte inferior
    .from("#how_sec .device img", {
        y: 100,
        opacity: 0,
        scale: 0.9,
        duration: 1.0,
        ease: "power3.out"
    }, "-=0.5");

    // BONUS: Efeito Parallax suave no Device durante a rolagem da página
    gsap.to("#how_sec .device img", {
        y: -30,
        ease: "none",
        scrollTrigger: {
            trigger: "#how_sec",
            start: "top bottom",
            end: "bottom top",
            scrub: 1.5
        }
    });

    /*====================== Personalize seu projeto ====================== */
    // Timeline sincronizada com a rolagem para a seção #why_sec
    const whyTl = gsap.timeline({
        scrollTrigger: {
            trigger: "#why_sec",
            start: "top 78%",
            toggleActions: "play none none reverse",
            id: "whySec"
        }
    });

    // 1. Título e Badge surgindo do topo com suavidade (CORRIGIDO)
    whyTl.from("#why_sec .section_title", {
        y: 50,
        opacity: 0,
        duration: 0.9,
        ease: "power3.out"
    }, 0)

    // 2. Blocos de etapas (01 a 04) vindo da esquerda (Fade-Right) em cascata
    .from("#why_sec .why_data_block", {
        x: -60,
        opacity: 0,
        duration: 0.8,
        stagger: 0.15,
        ease: "power2.out"
    }, "-=0.5")

    // 3. Efeito Pop-In nos números das etapas (01, 02, 03, 04)
    .from("#why_sec .why_data_block .number", {
        scale: 0,
        rotation: -20,
        duration: 0.5,
        stagger: 0.15,
        ease: "back.out(1.8)"
    }, "-=0.8")

    // 4. Imagem principal do painel (GIF/Preview) vindo da direita (Fade-Left)
    .from("#why_sec .why_us_new_img", {
        y: 80,
        opacity: 0,
        scale: 0.95,
        duration: 0.9,
        ease: "power3.out"
    }, "-=1.0")

    // 5. Tablet surgindo da direita-inferior com profundidade
    .from("#why_sec img[src*='tablet.png']", {
        x: 50,
        y: 30,
        opacity: 0,
        duration: 0.8,
        ease: "back.out(1.4)"
    }, "-=0.5")

    // 6. Smartphone surgindo da esquerda-inferior encaixando na composição
    .from("#why_sec img[src*='phone-login.png']", {
        x: -40,
        y: 30,
        opacity: 0,
        duration: 0.8,
        ease: "back.out(1.4)"
    }, "-=0.5");

    /*====================== Vantagens ====================== */
    
    // =============================================
    // SECTION TITLE ANIMATION
    // =============================================
    gsap.from('.service_section .section_title', {
        scrollTrigger: {
            trigger: '.service_section .section_title',
            start: 'top 80%',
            toggleActions: 'play none none reverse',
            id: "serviceTitle"
        },
        y: 60,
        opacity: 0,
        duration: 0.9,
        ease: 'power3.out'
    });

    // =============================================
    // BENEFIT BLOCKS ANIMATION (3 blocks)
    // =============================================
    const benefitBlocks = document.querySelectorAll('.service_blocks');

    benefitBlocks.forEach((block, index) => {
        // Get elements inside each block
        const textContent = block.querySelector('.service_text');
        const imageBlock = block.querySelector('.inner_block');
        const listItems = block.querySelectorAll('.design_block li');
        const button = block.querySelector('.btn_block a, .service_text > a');

        // Determine animation direction based on layout
        const isReversed = block.classList.contains('flex-row-reverse');
        const textX = isReversed ? 60 : -60;
        const imageX = isReversed ? -60 : 60;

        // Create a timeline for each block with increased delay between blocks
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: block,
                start: 'top 78%',
                toggleActions: 'play none none reverse',
                id: `benefitBlock${index}`
            }
        });

        // Animate text content
        tl.from(textContent, {
            x: textX,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out'
        }, 0)
        // Animate image
        .from(imageBlock, {
            x: imageX,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out'
        }, '-=0.4')
        // Animate list items with stagger
        .from(listItems, {
            x: -30,
            opacity: 0,
            duration: 0.5,
            stagger: 0.08,
            ease: 'power2.out'
        }, '-=0.3')
        // Animate button
        .from(button, {
            y: 20,
            opacity: 0,
            duration: 0.6,
            ease: 'power2.out'
        }, '-=0.2');
    });

    // =============================================
    // TITLE BADGES STAGGER ANIMATION
    // =============================================
    const titleBadges = document.querySelectorAll('.service_section .title_badge');

    titleBadges.forEach((badge, index) => {
        gsap.from(badge, {
            scrollTrigger: {
                trigger: badge,
                start: 'top 85%',
                toggleActions: 'play none none reverse',
                id: `badge${index}`
            },
            scale: 0,
            opacity: 0,
            duration: 0.6,
            delay: index * 0.15,
            ease: 'back.out(1.7)'
        });
    });

    // =============================================
    // MAIN TITLE SPAN HIGHLIGHT ANIMATION
    // =============================================
    gsap.from('.service_section .section_title h2 span', {
        scrollTrigger: {
            trigger: '.service_section .section_title h2',
            start: 'top 80%',
            toggleActions: 'play none none reverse',
            id: "serviceSpan"
        },
        scale: 0.8,
        opacity: 0,
        duration: 0.8,
        ease: 'elastic.out(1, 0.5)',
        delay: 0.2
    });

    // =============================================
    // BLUR SHAPES PARALLAX EFFECT
    // =============================================
    const blurShapes = document.querySelectorAll('.service_section .blure_shape');

    blurShapes.forEach(shape => {
        gsap.to(shape, {
            scrollTrigger: {
                trigger: shape.closest('.service_section'),
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1.5
            },
            y: (i, target) => {
                return target.classList.contains('bs_1') ? -50 : 50;
            },
            opacity: 0.3,
            duration: 1
        });
    });

    // =============================================
    // IMAGE FADE IN WITH ROTATION EFFECT
    // =============================================
    const images = document.querySelectorAll('.service_section .inner_block .img img');

    images.forEach(image => {
        gsap.from(image, {
            scrollTrigger: {
                trigger: image.closest('.inner_block'),
                start: 'top 80%',
                toggleActions: 'play none none reverse',
                id: `serviceImage${Array.from(images).indexOf(image)}`
            },
            scale: 0.9,
            opacity: 0,
            duration: 0.9,
            rotation: 5,
            ease: 'power2.out'
        });
    });

    // =============================================
    // CHECK ICONS PULSE ANIMATION ON ENTER
    // =============================================
    const checkIcons = document.querySelectorAll('.service_section .bi-check-circle');

    checkIcons.forEach(icon => {
        gsap.from(icon, {
            scrollTrigger: {
                trigger: icon,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            scale: 0,
            opacity: 0,
            duration: 0.4,
            ease: 'back.out(2)',
            delay: 0.05
        });
    });

    // =============================================
    // BUTTON HOVER EFFECTS
    // =============================================
    const buttons = document.querySelectorAll('.service_section .bg-button-two');

    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            gsap.to(this.querySelector('span'), {
                x: 5,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        button.addEventListener('mouseleave', function() {
            gsap.to(this.querySelector('span'), {
                x: 0,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });

    // =============================================
    // CONTINUOUS PULSE ANIMATION FOR ARROW ICONS
    // =============================================
    const arrowIcons = document.querySelectorAll('.service_section .lucide-arrow-right');

    arrowIcons.forEach(arrow => {
        gsap.to(arrow, {
            x: 8,
            duration: 0.8,
            ease: 'power1.inOut',
            yoyo: true,
            repeat: -1
        });
    });

    // =============================================
    // SECTION ENTRANCE ANIMATION
    // =============================================
    gsap.from('.service_section', {
        scrollTrigger: {
            trigger: '.service_section',
            start: 'top 90%',
            toggleActions: 'play none none reverse',
            id: "serviceSection"
        },
        opacity: 0,
        duration: 0.5,
        ease: 'power2.out'
    });

    /*====================== Templates ====================== */

    // =============================================
    // HEADER BLOCK ANIMATION
    // =============================================
    gsap.from('.tpl-header-left', {
        scrollTrigger: {
            trigger: '.tpl-header-block',
            start: 'top 80%',
            toggleActions: 'play none none reverse',
            id: "tplHeaderLeft"
        },
        x: -80,
        opacity: 0,
        duration: 0.9,
        ease: 'power3.out'
    });

    gsap.from('.tpl-header-right', {
        scrollTrigger: {
            trigger: '.tpl-header-block',
            start: 'top 80%',
            toggleActions: 'play none none reverse',
            id: "tplHeaderRight"
        },
        x: 80,
        opacity: 0,
        duration: 0.9,
        delay: 0.2,
        ease: 'power3.out'
    });

    gsap.from('.tpl-badge', {
        scrollTrigger: {
            trigger: '.tpl-badge',
            start: 'top 85%',
            toggleActions: 'play none none reverse',
            id: "tplBadge"
        },
        scale: 0,
        opacity: 0,
        duration: 0.6,
        ease: 'back.out(1.7)'
    });

    gsap.from('.tpl-header-left h2 span', {
        scrollTrigger: {
            trigger: '.tpl-header-left h2',
            start: 'top 80%',
            toggleActions: 'play none none reverse',
            id: "tplSpan"
        },
        scale: 0.8,
        opacity: 0,
        duration: 0.8,
        ease: 'elastic.out(1, 0.5)',
        delay: 0.15
    });

    // =============================================
    // SCROLL TRACK CARDS ANIMATION
    // =============================================
    const cards = document.querySelectorAll('.tpl-card');
    
    cards.forEach((card, index) => {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse',
                id: `tplCard${index}`
            }
        });

        tl.from(card, {
            y: 0,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out',
            delay: index * 0.08
        }, 0)
        .from(card.querySelector('.tpl-card-topbar'), {
            y: -20,
            opacity: 0,
            duration: 0.5,
            ease: 'power2.out'
        }, '-=0.3')
        .from(card.querySelector('.tpl-preview'), {
            scale: 0.9,
            opacity: 0,
            duration: 0.6,
            ease: 'power2.out'
        }, '-=0.3')
        .from(card.querySelector('.tpl-card-body'), {
            y: 20,
            opacity: 0,
            duration: 0.5,
            ease: 'power2.out'
        }, '-=0.2');
    });

    // =============================================
    // CARD HOVER ANIMATIONS (3D Tilt Effect)
    // =============================================
    cards.forEach(card => {
        // Efeito mais simples - elevação suave com glow
        card.addEventListener('mouseenter', function() {
            gsap.to(this, {
                y: -8,
                scale: 1.02,
                duration: 0.4,
                ease: 'power2.out',
                boxShadow: '0 20px 60px rgba(0,0,0,0.15)',
                overwrite: 'auto'
            });
            
            // Overlay com fade suave
            const overlay = this.querySelector('.tpl-overlay');
            if (overlay) {
                gsap.to(overlay, {
                    opacity: 1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            }
            
            // Seta com movimento
            const arrow = this.querySelector('.tpl-arrow');
            if (arrow) {
                gsap.to(arrow, {
                    x: 8,
                    y: -8,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            }
            
            // Imagem com leve zoom
            const img = this.querySelector('.tpl-preview img');
            if (img) {
                gsap.to(img, {
                    scale: 1.05,
                    duration: 0.5,
                    ease: 'power2.out'
                });
            }
        });

        card.addEventListener('mouseleave', function() {
            gsap.to(this, {
                y: 0,
                scale: 1,
                duration: 0.4,
                ease: 'power2.out',
                boxShadow: 'none',
                overwrite: 'auto'
            });
            
            const overlay = this.querySelector('.tpl-overlay');
            if (overlay) {
                gsap.to(overlay, {
                    opacity: 0,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            }
            
            const arrow = this.querySelector('.tpl-arrow');
            if (arrow) {
                gsap.to(arrow, {
                    x: 0,
                    y: 0,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            }
            
            const img = this.querySelector('.tpl-preview img');
            if (img) {
                gsap.to(img, {
                    scale: 1,
                    duration: 0.5,
                    ease: 'power2.out'
                });
            }
        });
    });

    // =============================================
    // CARD PREVIEW OVERLAY ANIMATION
    // =============================================
    const previewButtons = document.querySelectorAll('.tpl-btn-preview');
    
    previewButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            gsap.to(this, {
                scale: 1.05,
                duration: 0.2,
                ease: 'power2.out'
            });
            
            gsap.to(this.querySelector('i'), {
                rotation: 45,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        button.addEventListener('mouseleave', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.2,
                ease: 'power2.out'
            });
            
            gsap.to(this.querySelector('i'), {
                rotation: 0,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });

    // =============================================
    // SCROLL TRACK HORIZONTAL SCROLL ANIMATION
    // =============================================
    gsap.from('.tpl-scroll-hint', {
        scrollTrigger: {
            trigger: '.tpl-scroll-hint',
            start: 'top 85%',
            toggleActions: 'play none none reverse',
            id: "tplHint"
        },
        x: 20,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out',
        delay: 0.4
    });

    gsap.to('.tpl-scroll-hint i', {
        x: 10,
        duration: 1,
        ease: 'power1.inOut',
        yoyo: true,
        repeat: -1
    });

    // =============================================
    // CARD TAGS PULSE ANIMATION
    // =============================================
    const tags = document.querySelectorAll('.tpl-tag');
    
    tags.forEach(tag => {
        gsap.to(tag, {
            scale: 1.05,
            duration: 1.5,
            ease: 'sine.inOut',
            yoyo: true,
            repeat: -1,
            delay: Math.random() * 0.5
        });
    });

    // =============================================
    // CTA BANNER ANIMATION
    // =============================================
    const ctaBanner = document.querySelector('.tpl-cta');
    
    gsap.from(ctaBanner, {
        scrollTrigger: {
            trigger: ctaBanner,
            start: 'top 85%',
            toggleActions: 'play none none reverse',
            id: "tplCta"
        },
        y: 60,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out'
    });

    gsap.from('.tpl-cta-text', {
        scrollTrigger: {
            trigger: '.tpl-cta',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
        },
        x: -40,
        opacity: 0,
        duration: 0.6,
        delay: 0.15,
        ease: 'power2.out'
    });

    gsap.from('.tpl-cta-btn', {
        scrollTrigger: {
            trigger: '.tpl-cta',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
        },
        x: 40,
        opacity: 0,
        duration: 0.6,
        delay: 0.3,
        ease: 'power2.out'
    });

    const ctaBtn = document.querySelector('.tpl-cta-btn');
    
    if (ctaBtn) {
        ctaBtn.addEventListener('mouseenter', function() {
            gsap.to(this, {
                scale: 1.05,
                duration: 0.3,
                ease: 'power2.out'
            });
            
            gsap.to(this, {
                boxShadow: '0 8px 25px rgba(0,0,0,0.2)',
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        ctaBtn.addEventListener('mouseleave', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
            
            gsap.to(this, {
                boxShadow: 'none',
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    }

    // =============================================
    // DOTS ANIMATION
    // =============================================
    const dots = document.querySelectorAll('.tpl-dots span');
    
    dots.forEach((dot, index) => {
        gsap.to(dot, {
            scale: 1.3,
            duration: 0.6,
            ease: 'sine.inOut',
            yoyo: true,
            repeat: -1,
            delay: index * 0.15
        });
    });

    // =============================================
    // PARALLAX EFFECT ON IMAGES
    // =============================================
    const previewImages = document.querySelectorAll('.tpl-preview img');
    
    previewImages.forEach(image => {
        gsap.to(image, {
            scrollTrigger: {
                trigger: image.closest('.tpl-card'),
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1.5
            },
            y: -20,
            ease: 'none'
        });
    });

    // =============================================
    // SECTION ENTRANCE ANIMATION
    // =============================================
    gsap.from('.tpl-modal-sec', {
        scrollTrigger: {
            trigger: '.tpl-modal-sec',
            start: 'top 95%',
            toggleActions: 'play none none reverse',
            id: "tplSection"
        },
        opacity: 0,
        duration: 0.5,
        ease: 'power2.out'
    });

    /*====================== Depoimentos ====================== */
    
    // =============================================
    // TESTIMONIALS SECTION ANIMATIONS
    // =============================================
    gsap.from('.testimonials-badge', {
        scrollTrigger: {
            trigger: '.testimonials-badge',
            start: 'top 85%',
            toggleActions: 'play none none reverse',
            id: "testBadge"
        },
        scale: 0,
        opacity: 0,
        duration: 0.6,
        ease: 'back.out(1.7)'
    });

    gsap.from('.testimonials-title', {
        scrollTrigger: {
            trigger: '.testimonials-title',
            start: 'top 80%',
            toggleActions: 'play none none reverse',
            id: "testTitle"
        },
        y: 50,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out',
        delay: 0.15
    });

    // Split title into words
    const titleWords = document.querySelectorAll('.testimonials-title');
    titleWords.forEach(title => {
        const words = title.textContent.split(' ');
        title.innerHTML = words.map(word => 
            `<span class="word" style="display:inline-block; opacity:0;">${word}</span>`
        ).join(' ');
        
        gsap.to(title.querySelectorAll('.word'), {
            scrollTrigger: {
                trigger: title,
                start: 'top 80%',
                toggleActions: 'play none none reverse'
            },
            y: 0,
            opacity: 1,
            duration: 0.6,
            stagger: 0.06,
            ease: 'power3.out',
            delay: 0.25
        });
    });

    // =============================================
    // METRICS BANNER ANIMATION
    // =============================================
    const metrics = document.querySelectorAll('.metric-number');
    
    metrics.forEach((metric, index) => {
        const targetValue = metric.textContent;
        const isPercentage = targetValue.includes('%');
        const isDecimal = targetValue.includes('/');
        const isK = targetValue.includes('k');
        const is24h = targetValue.includes('24/7');
        
        let endValue = parseFloat(targetValue.replace(/[^0-9.]/g, ''));
        
        if (isDecimal) endValue = 4.9;
        else if (is24h) endValue = 24;
        else if (isK) endValue = 10;
        
        gsap.from(metric, {
            scrollTrigger: {
                trigger: '.metrics-banner',
                start: 'top 80%',
                toggleActions: 'play none none reverse',
                id: `metric${index}`
            },
            textContent: 0,
            duration: 2,
            ease: 'power2.out',
            delay: 0.15 + (index * 0.08),
            snap: { textContent: 1 },
            onUpdate: function() {
                const currentValue = Math.floor(this.targets()[0].textContent);
                let displayText = currentValue;
                
                if (isDecimal) displayText = (currentValue / 10).toFixed(1) + '/5';
                else if (isPercentage) displayText = currentValue + '%';
                else if (isK) displayText = '+' + currentValue + 'k';
                else if (is24h) displayText = currentValue + '/7';
                
                metric.textContent = displayText;
            },
            onComplete: function() {
                if (isDecimal) metric.textContent = '4.9/5';
                else if (isPercentage) metric.textContent = '99%';
                else if (isK) metric.textContent = '+10k';
                else if (is24h) metric.textContent = '24/7';
            }
        });
    });

    gsap.from('.metric-label', {
        scrollTrigger: {
            trigger: '.metrics-banner',
            start: 'top 80%',
            toggleActions: 'play none none reverse'
        },
        y: 15,
        opacity: 0,
        duration: 0.6,
        stagger: 0.08,
        ease: 'power2.out',
        delay: 0.4
    });

    // =============================================
    // TESTIMONIAL CARDS ANIMATION
    // =============================================
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    
    testimonialCards.forEach((card, index) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse',
                id: `testCard${index}`
            },
            y: 0,
            opacity: 0,
            duration: 0.8,
            ease: 'power3.out',
            delay: index * 0.1
        });
        
        gsap.from(card.querySelector('.testimonial-quote-icon'), {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            scale: 0,
            opacity: 0,
            duration: 0.5,
            ease: 'back.out(1.7)',
            delay: 0.15 + (index * 0.1)
        });
        
        gsap.from(card.querySelector('.rating-stars'), {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            scale: 0.5,
            opacity: 0,
            duration: 0.5,
            ease: 'power2.out',
            delay: 0.2 + (index * 0.1)
        });
        
        gsap.from(card.querySelector('.testimonial-text'), {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            y: 20,
            opacity: 0,
            duration: 0.6,
            ease: 'power2.out',
            delay: 0.25 + (index * 0.1)
        });
        
        gsap.from(card.querySelector('.author-wrapper'), {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            x: -20,
            opacity: 0,
            duration: 0.6,
            ease: 'power2.out',
            delay: 0.3 + (index * 0.1)
        });
    });

    // =============================================
    // SWIPER INTEGRATION
    // =============================================
    if (typeof Swiper !== 'undefined') {
        const swiper = new Swiper('.testimonialSwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                }
            },
            on: {
                slideChange: function() {
                    const activeSlide = this.slides[this.activeIndex];
                    if (activeSlide) {
                        gsap.from(activeSlide.querySelector('.testimonial-card'), {
                            scale: 0.75,
                            opacity: 0,
                            duration: 0.6,
                            ease: 'power2.out'
                        });
                    }
                }
            }
        });
    }

    // =============================================
    // CTA BUTTON ANIMATION
    // =============================================
    gsap.from('.testimonials-section .btn_block', {
        scrollTrigger: {
            trigger: '.testimonials-section .btn_block',
            start: 'top 85%',
            toggleActions: 'play none none reverse',
            id: "testCta"
        },
        y: 40,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out',
        delay: 0.2
    });

    const ctaButton = document.querySelector('.testimonials-section .bg-button-two');
    if (ctaButton) {
        ctaButton.addEventListener('mouseenter', function() {
            gsap.to(this, {
                scale: 1.05,
                duration: 0.3,
                ease: 'power2.out',
                boxShadow: '0 10px 30px rgba(0,0,0,0.2)'
            });
            
            gsap.to(this.querySelector('span'), {
                x: 5,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        ctaButton.addEventListener('mouseleave', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out',
                boxShadow: 'none'
            });
            
            gsap.to(this.querySelector('span'), {
                x: 0,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    }

    const arrowIcon = document.querySelector('.testimonials-section .lucide-arrow-right');
    if (arrowIcon) {
        gsap.to(arrowIcon, {
            x: 8,
            duration: 0.8,
            ease: 'power1.inOut',
            yoyo: true,
            repeat: -1
        });
    }

    // =============================================
    // PARALLAX EFFECT ON TESTIMONIAL CARDS
    // =============================================
    testimonialCards.forEach(card => {
        gsap.to(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1.5
            },
            y: (i, target) => {
                const rect = target.getBoundingClientRect();
                return rect.height * 0.08;
            },
            ease: 'none'
        });
    });

    // =============================================
    // QUOTE ICON ROTATION ANIMATION
    // =============================================
    const quoteIcons = document.querySelectorAll('.testimonial-quote-icon');
    quoteIcons.forEach(icon => {
        gsap.to(icon, {
            rotation: 5,
            duration: 3,
            ease: 'sine.inOut',
            yoyo: true,
            repeat: -1
        });
    });

    // =============================================
    // RATING STARS GLOW EFFECT    // =============================================
    const ratingStars = document.querySelectorAll('.rating-stars');
    ratingStars.forEach(stars => {
        gsap.to(stars, {
            textShadow: '0 0 20px rgba(255, 193, 7, 0.3)',
            duration: 2,
            ease: 'sine.inOut',
            yoyo: true,
            repeat: -1
        });
    });

    // =============================================
    // METRIC CONTAINERS BOUNCE
    // =============================================
    const metricContainers = document.querySelectorAll('.col-6.col-md-3');
    metricContainers.forEach((container, index) => {
        gsap.from(container, {
            scrollTrigger: {
                trigger: '.metrics-banner',
                start: 'top 80%',
                toggleActions: 'play none none reverse'
            },
            y: 30,
            opacity: 0,
            duration: 0.5,
            delay: index * 0.08,
            ease: 'power2.out'
        });
    });

    // =============================================
    // SECTION ENTRANCE ANIMATION
    // =============================================
    gsap.from('.testimonials-section', {
        scrollTrigger: {
            trigger: '.testimonials-section',
            start: 'top 95%',
            toggleActions: 'play none none reverse',
            id: "testSection"
        },
        opacity: 0,
        duration: 0.5,
        ease: 'power2.out'
    });

    // =============================================
    // RESPONSIVE ADJUSTMENTS
    // =============================================
    function handleResponsiveAnimations() {
        const isMobile = window.innerWidth < 768;
        
        if (isMobile) {
            // Disable 3D tilt on mobile
            cards.forEach(card => {
                card.removeEventListener('mouseenter', card._mouseEnterHandler);
                card.removeEventListener('mouseleave', card._mouseLeaveHandler);
            });
            
            // Reduce parallax effects on mobile
            previewImages.forEach(image => {
                gsap.set(image, { clearProps: 'y' });
            });
            
            testimonialCards.forEach(card => {
                gsap.set(card, { clearProps: 'y' });
            });
            
            quoteIcons.forEach(icon => {
                gsap.set(icon, { rotation: 0 });
            });
        }
    }

    // Store event handlers for cleanup
    cards.forEach(card => {
        card._mouseEnterHandler = card._mouseEnterHandler || card._listeners?.mouseenter;
        card._mouseLeaveHandler = card._mouseLeaveHandler || card._listeners?.mouseleave;
    });

    // Initial check
    handleResponsiveAnimations();

    // Check on resize with debounce
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(handleResponsiveAnimations, 250);
    });

    // =============================================
    // REFRESH SCROLLTRIGGER
    // =============================================
    window.addEventListener('load', function() {
        ScrollTrigger.refresh();
    });

    window.addEventListener('orientationchange', function() {
        setTimeout(() => {
            ScrollTrigger.refresh();
        }, 300);
    });

    console.log('✨ All section animations initialized successfully!');
});