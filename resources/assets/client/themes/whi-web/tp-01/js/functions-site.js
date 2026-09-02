function copyToClipboard(t, e) {
    navigator.clipboard && navigator.clipboard.writeText(t).then(() => {
        const t = document.getElementById("cta-toast"),
            o = document.getElementById("toast-message");
        t && o && (o.textContent = e, t.classList.add("show"), setTimeout(() => {
            t.classList.remove("show")
        }, 2500))
    }).catch(t => {
        console.error("Erro ao copiar texto: ", t)
    })
}

document.addEventListener("DOMContentLoaded", function() {
    // ----------------------------------------------------
    // Tópicos / WhatsApp Button
    // ----------------------------------------------------
    const t = document.querySelectorAll(".topic-chip"),
        e = document.getElementById("whatsapp-btn");
    t.length > 0 && e && t.forEach(o => {
        o.addEventListener("click", function() {
            t.forEach(t => t.classList.remove("active")), this.classList.add("active");
            const o = this.getAttribute("data-subject"),
                n = encodeURIComponent(`Olá, gostaria de saber mais sobre: ${o}`);
            e.setAttribute("href", `https://wa.me/5571992768360?text=${n}`)
        })
    });

    // ----------------------------------------------------
    // Galeria de Vídeos
    // ----------------------------------------------------
    const o = document.querySelector(".video-section");
    if (o) {
        const u = Array.from(o.querySelectorAll(".video-item")),
            m = o.querySelector("#videoPlayer");

        function n(t) {
            return t ? t.startsWith("//") ? window.location.protocol + t : t : ""
        }

        function a(t) {
            try {
                const e = new URL(t);
                return "youtu.be" === e.hostname.replace(/^www\./, "") ? e.pathname.split("/")[1] : e.pathname.startsWith("/embed/") || e.pathname.startsWith("/shorts/") ? e.pathname.split("/")[2] || e.pathname.split("/")[1] : e.searchParams.get("v")
            } catch {
                return null
            }
        }

        function c(t) {
            const e = n(t);
            if (!e) return "";
            const o = a(e);
            if (o) return `https://www.youtube-nocookie.com/embed/${o}?autoplay=1&rel=0`;
            const c = function(t) {
                try {
                    const e = new URL(t);
                    if (!e.hostname.includes("vimeo.com")) return null;
                    return e.pathname.split("/").filter(Boolean).find(t => /^\d+$/.test(t)) || null
                } catch {
                    return null
                }
            }(e);
            return c ? `https://player.vimeo.com/video/${c}?autoplay=1` : function(t) {
                try {
                    const e = new URL(t).pathname.toLowerCase();
                    return /\.(mp4|webm|ogg|mov|m4v)(?:$|\?)/.test(e)
                } catch {
                    return !1
                }
            }(e) ? e : ""
        }

        u.forEach((t, e) => {
            const o = t.getAttribute("data-video"),
                s = t.querySelector(".video-thumb-img");
            s && (s.src = function(t) {
                const e = n(t);
                if (!e) return "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=150&q=80";
                const o = a(e);
                return o ? `https://img.youtube.com/vi/${o}/mqdefault.jpg` : "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=150&q=80"
            }(o), s.loading = "lazy"), t.addEventListener("click", () => {
                ! function(t, e = !1) {
                    if (t < 0 || t >= u.length) return;
                    u.forEach(t => t.classList.remove("active"));
                    const o = u[t];
                    o.classList.add("active");
                    const n = c(o.getAttribute("data-video"));
                    e && n && (m.src = n, o.scrollIntoView({
                        behavior: "smooth",
                        block: "nearest"
                    }))
                }(e, !0)
            })
        }), u.length > 0 && (u[0].classList.add("active"), m.removeAttribute("src"))
    }

    // ----------------------------------------------------
    // Accordion de FAQ
    // ----------------------------------------------------
    const s = document.querySelectorAll(".faq-card");
    s.length > 0 && s.forEach(t => {
        const e = t.querySelector(".faq-header"),
            o = t.querySelector(".faq-body");
        e && o && e.addEventListener("click", () => {
            const e = t.classList.contains("active");
            s.forEach(t => {
                t.classList.remove("active");
                const e = t.querySelector(".faq-body");
                e && (e.style.display = "none")
            }), e || (t.classList.add("active"), o.style.display = "block")
        })
    });

    // ----------------------------------------------------
    // Preços / Toggle Mensal e Anual (Ajustado para Anual Fixo)
    // ----------------------------------------------------
    const r = document.getElementById("pricingToggle"),
        i = document.querySelectorAll(".amount"),
        l = document.getElementById("label-monthly"),
        d = document.getElementById("label-yearly");

    // Força a exibição do preço Anual (data-yearly) no carregamento
    if (i.length > 0) {
        i.forEach(e => {
            const yearlyValue = e.getAttribute("data-yearly");
            if (yearlyValue) {
                e.textContent = yearlyValue;
            }
        });
    }

    // Mantém o toggle desabilitado e marcado como Anual
    if (r) {
        r.checked = true;
        r.disabled = true;
    }

    // Marca o label Anual como ativo e desativa o Mensal visualmente
    if (d && l) {
        d.classList.add("active");
        l.classList.remove("active");
        l.style.cursor = "not-allowed";
        d.style.cursor = "default";
    }

    // ----------------------------------------------------
    // Carrossel de Depoimentos (Swiper)
    // ----------------------------------------------------
    "undefined" != typeof Swiper && document.querySelector(".testimonialSwiper") && new Swiper(".testimonialSwiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: !0,
        autoplay: {
            delay: 4e3,
            disableOnInteraction: !1
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            }
        }
    })
});