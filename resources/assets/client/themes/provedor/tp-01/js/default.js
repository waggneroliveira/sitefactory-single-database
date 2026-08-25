! function() {
    "use strict";

    let e = document.querySelector("#preloader");
    e && window.addEventListener("load", (() => {
        e.remove()
    }));

    let n = document.querySelector(".scroll-top");
    n && n.addEventListener("click", (e => {
        e.preventDefault(), window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }));

    document.addEventListener("scroll", (function() {
        const header = document.getElementById("header");
        if (header) {
            if (window.scrollY > 50) {
                header.classList.add("bg-scroll");
            } else {
                header.classList.remove("bg-scroll");
            }
        }
        n && (window.scrollY > 100 ? n.classList.add("active") : n.classList.remove("active"))
    }));

    document.querySelectorAll(".skills-animation").forEach((e => {
        new Waypoint({
            element: e,
            offset: "80%",
            handler: function(t) {
                e.querySelectorAll(".progress .progress-bar").forEach((e => {
                    e.style.width = e.getAttribute("aria-valuenow") + "%"
                }))
            }
        })
    }));

    document.querySelectorAll(".isotope-layout").forEach((function(e) {
        let o, n = e.getAttribute("data-layout") ?? "masonry",
            i = e.getAttribute("data-default-filter") ?? "*",
            r = e.getAttribute("data-sort") ?? "original-order";
        imagesLoaded(e.querySelector(".isotope-container"), (function() {
            o = new Isotope(e.querySelector(".isotope-container"), {
                itemSelector: ".isotope-item",
                layoutMode: n,
                filter: i,
                sortBy: r
            })
        }));
        e.querySelectorAll(".isotope-filters li").forEach((function(n) {
            n.addEventListener("click", (function() {
                e.querySelector(".isotope-filters .filter-active").classList.remove("filter-active"), this.classList.add("filter-active"), o.arrange({
                    filter: this.getAttribute("data-filter")
                })
            }), !1)
        }))
    }));

    window.addEventListener("load", (function() {
        document.querySelectorAll(".init-swiper").forEach((function(e) {
            let t = JSON.parse(e.querySelector(".swiper-config").innerHTML.trim());
            e.classList.contains("swiper-tab") ? initSwiperWithCustomPagination(e, t) : new Swiper(e, t)
        }))
    }));

    window.addEventListener("load", (function(e) {
        window.location.hash && document.querySelector(window.location.hash) && setTimeout((() => {
            let e = document.querySelector(window.location.hash),
                t = getComputedStyle(e).scrollMarginTop;
            window.scrollTo({
                top: e.offsetTop - parseInt(t),
                behavior: "smooth"
            })
        }), 100)
    }));

    let i = document.querySelectorAll(".navmenu a");

    function r() {
        i.forEach((e => {
            if (!e.hash) return;
            let t = document.querySelector(e.hash);
            if (!t) return;
            let o = window.scrollY + 200;
            o >= t.offsetTop && o <= t.offsetTop + t.offsetHeight ? (document.querySelectorAll(".navmenu a.active").forEach((e => e.classList.remove("active"))), e.classList.add("active")) : e.classList.remove("active")
        }))
    }
    window.addEventListener("load", r);
    document.addEventListener("scroll", r);

    window.addEventListener("load", (function() {
        document.addEventListener("scroll", (function() {
            let e = document.querySelector(".laptop-parallax");
            if (!e) return;
            let t = document.querySelector(".content-project"),
                o = t.getBoundingClientRect().top;
            if (o < window.innerHeight && o > -t.offsetHeight) {
                let t = .3 * o;
                t = Math.max(-15, Math.min(15, t)), e.style.transform = `translateY(${t}px)`
            }
        }))
    }));

    // CORREÇÃO 1: Ignora disparadores do Bootstrap Modal na rolagem suave
    document.addEventListener("DOMContentLoaded", (function() {
        document.querySelectorAll('a[href^="#"]').forEach((function(e) {
            e.addEventListener("click", (function(evt) {
                // Se for um gatilho do Modal Bootstrap, deixa o Bootstrap gerenciar
                if (this.hasAttribute("data-bs-toggle") || this.hasAttribute("data-toggle")) return;

                evt.preventDefault();
                let t = this.getAttribute("href");
                if (t.length > 1) {
                    let target = document.querySelector(t);
                    target && window.scrollTo({
                        top: target.offsetTop,
                        behavior: "smooth"
                    })
                } else window.scrollTo({
                    top: 0,
                    behavior: "smooth"
                })
            }))
        }))
    }));

    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.announcement', {
            loop: true,
            speed: 1200,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            autoplay: { delay: 5000, disableOnInteraction: false },
        });
        new Swiper('.announcementVertical', {
            loop: true,
            speed: 1200,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            autoplay: { delay: 5000, disableOnInteraction: false },
        });
    });

    if (document.getElementById('socialLinks')) {
        document.getElementById('shareBtn').addEventListener('click', function() {
            const links = document.getElementById('socialLinks');
            links.classList.toggle('opacity-0');
        });
    }

    // CORREÇÃO 2: Ajuste no Menu Mobile para não travar o body permanentemente
    const s = document.getElementById("menu-toggle");
    const a = document.getElementById("menu-mobile");
    const c = document.getElementById("menu-close");

    if (s && a && c) {
        s.addEventListener("click", () => {
            const isActive = a.classList.toggle("active");
            document.body.style.overflow = isActive ? "hidden" : "";
        });

        c.addEventListener("click", () => {
            a.classList.remove("active");
            document.body.style.overflow = "";
        });

        a.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", function(e) {
                const href = this.getAttribute("href");
                if (href && href.startsWith("#")) {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({ behavior: "smooth" });
                    }
                }
                a.classList.remove("active");
                document.body.style.overflow = "";
            });
        });
    }

    // Máscara de telefone
    document.querySelectorAll(".phone").forEach(function(phoneInput) {
        phoneInput.addEventListener("input", function(e) {
            let t = e.target.value.replace(/\D/g, "");
            t.length > 11 && (t = t.slice(0, 11));
            t.length > 0 && (t = "(" + t);
            t.length > 3 && (t = t.slice(0, 3) + ") " + t.slice(3));
            t.length > 10 && (t = t.slice(0, 10) + "-" + t.slice(10));
            e.target.value = t;
        });
    });

    // CKEditor
    document.addEventListener('DOMContentLoaded', function () {
        const textarea = document.getElementById('message');
        if (textarea && typeof CKEDITOR !== "undefined" && !CKEDITOR.instances[textarea.id]) {
            CKEDITOR.replace(textarea.id, {
                toolbar: [
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', 'Blockquote'] }
                ],
                removePlugins: 'link,image,flash,table,iframe,uploadimage,uploadfile,mediaembed,cloudservices,ckbox,notification,clipboard'
            });
        }

        const form = document.querySelector('#commentForm');
        if (form) {
            form.addEventListener('submit', function () {
                if (typeof CKEDITOR !== "undefined") {
                    for (let instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }
                }
            });
        }
    });

    if (typeof jQuery !== "undefined") {
        $("body").on("click", ".dropify-clear", function () {
            var nameInput = $(this).parent().find("input:first").attr("name");
            $(this).parent().find(`input[name=delete_${nameInput}]`).remove();
            $(this).parent().find(`.preview-image`).css("background-image", "url()");
            $(this).parent().find(`.content-area-image-crop`).show();
            $(this).parent().append(`<input type="hidden" name="delete_${nameInput}" value="${nameInput}" />`);
        });
    }

    window.addEventListener("load", function () {
        const heroSwiperEl = document.querySelector(".hero-swiper");
        if (heroSwiperEl) {
            new Swiper(heroSwiperEl, {
                loop: false,
                effect: "fade",
                speed: 800,
                autoplay: { delay: 5000, disableOnInteraction: false },
                pagination: {
                    el: heroSwiperEl.querySelector(".swiper-pagination"),
                    clickable: true,
                },
                navigation: {
                    nextEl: heroSwiperEl.querySelector(".swiper-button-next"),
                    prevEl: heroSwiperEl.querySelector(".swiper-button-prev"),
                }
            });
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const elements = document.querySelectorAll(".animate-on-scroll");
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const animation = entry.target.dataset.animation;
                    setTimeout(() => {
                        entry.target.classList.add("animate__animated", animation, "animate__slow");
                    }, 100);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        elements.forEach(el => observer.observe(el));
    });

}();