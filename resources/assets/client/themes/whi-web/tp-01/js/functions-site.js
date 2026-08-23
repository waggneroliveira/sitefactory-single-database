  document.addEventListener("DOMContentLoaded", function () {
    
    /* ==========================================================================
       1. SELEÇÃO DE TÓPICOS E INTEGRAÇÃO COM WHATSAPP
       Ação: Atualiza dinamicamente o link do botão do WhatsApp com base no
       tópico/chip selecionado.
       ========================================================================== */
    const topicChips = document.querySelectorAll(".topic-chip");
    const whatsappBtn = document.getElementById("whatsapp-btn");
    const phoneBase = "5571992768360";

    if (topicChips.length > 0 && whatsappBtn) {
      topicChips.forEach((chip) => {
        chip.addEventListener("click", function () {
          topicChips.forEach((c) => c.classList.remove("active"));
          this.classList.add("active");

          const subject = this.getAttribute("data-subject");
          const message = encodeURIComponent(
            `Olá, gostaria de saber mais sobre: ${subject}`
          );

          whatsappBtn.setAttribute(
            "href",
            `https://wa.me/${phoneBase}?text=${message}`
          );
        });
      });
    }

    /* ==========================================================================
       2. GALERIA / PLAYER DE VÍDEOS (YOUTUBE E VIMEO)
       Ação: Gerencia a lista de vídeos, gera embeds/thumbnails e alterna o vídeo
       em reprodução no player central.
       ========================================================================== */
    const section = document.querySelector('.video-section');
    if (section) {
      const items = Array.from(section.querySelectorAll('.video-item'));
      const player = section.querySelector('#videoPlayer');

      // Normaliza URLs relativas
      function norm(url) {
        if (!url) return "";
        return url.startsWith("//") ? window.location.protocol + url : url;
      }

      // Extrai ID de vídeos do YouTube
      function getYouTubeId(urlStr) {
        try {
          const u = new URL(urlStr);
          const host = u.hostname.replace(/^www\./, "");

          if (host === "youtu.be") return u.pathname.split("/")[1];
          if (u.pathname.startsWith("/embed/") || u.pathname.startsWith("/shorts/")) {
            return u.pathname.split("/")[2] || u.pathname.split("/")[1];
          }
          return u.searchParams.get("v");
        } catch {
          return null;
        }
      }

      // Converte URL comum para formato de Embed do Player
      function toEmbed(rawUrl) {
        const urlStr = norm(rawUrl);
        if (!urlStr) return "";

        const ytId = getYouTubeId(urlStr);
        if (ytId) return `https://www.youtube.com/embed/${ytId}?autoplay=1`;

        // Vimeo
        if (urlStr.includes("vimeo.com")) {
          const parts = urlStr.split("/").filter(Boolean);
          const last = parts[parts.length - 1];
          if (/^\d+$/.test(last)) return `https://player.vimeo.com/video/${last}?autoplay=1`;
        }

        return urlStr;
      }

      // Gera a imagem de capa (Thumbnail)
      function getThumbnail(rawUrl) {
        const urlStr = norm(rawUrl);
        const ytId = getYouTubeId(urlStr);
        
        if (ytId) {
          return `https://img.youtube.com/vi/${ytId}/mqdefault.jpg`;
        }
        
        // Imagem fallback caso não seja YouTube
        return "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=150&q=80";
      }

      // Define e carrega o vídeo ativo no player
      function setActive(index, isUserClick = false) {
        if (index < 0 || index >= items.length) return;

        items.forEach(item => item.classList.remove('active'));
        const selectedItem = items[index];
        selectedItem.classList.add('active');

        const rawUrl = selectedItem.getAttribute('data-video');
        const embedUrl = toEmbed(rawUrl);

        // Evita autoplay automático no primeiro carregamento do site
        if (!isUserClick) {
          player.src = embedUrl.replace('?autoplay=1', '');
        } else {
          player.src = embedUrl;
          // Rola até o item apenas quando for um clique do usuário
          selectedItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
      }

      // Configura eventos e thumbnails dos itens
      items.forEach((item, index) => {
        const rawUrl = item.getAttribute('data-video');
        const imgTag = item.querySelector('.video-thumb-img');
        
        if (imgTag) {
          imgTag.src = getThumbnail(rawUrl);
        }

        item.addEventListener('click', () => setActive(index, true));
      });

      // Ativa o primeiro vídeo da lista por padrão sem forçar o scroll da tela
      if (items.length > 0) {
        setActive(0, false);
      }
    }

    /* ==========================================================================
       3. COMPONENTE DE ACORDEÃO / FAQ
       Ação: Controla a abertura e fechamento das perguntas frequentes (fecha
       outras abertas ao clicar em uma nova).
       ========================================================================== */
    const faqCards = document.querySelectorAll(".faq-card");

    if (faqCards.length > 0) {
      faqCards.forEach((card) => {
        const header = card.querySelector(".faq-header");
        const body = card.querySelector(".faq-body");

        if (header && body) {
          header.addEventListener("click", () => {
            const isActive = card.classList.contains("active");

            // Fecha todos os outros itens
            faqCards.forEach((otherCard) => {
              otherCard.classList.remove("active");
              const otherBody = otherCard.querySelector(".faq-body");
              if (otherBody) {
                otherBody.style.display = "none";
              }
            });

            // Abre o item atual caso não estivesse aberto
            if (!isActive) {
              card.classList.add("active");
              body.style.display = "block";
            }
          });
        }
      });
    }

    /* ==========================================================================
       4. TOGGLE DE PLANOS E PREÇOS (MENSAL / ANUAL)
       Ação: Alterna os valores exibidos nos cards de preço e atualiza os
       rótulos visuais.
       ========================================================================== */
    const toggle = document.getElementById("pricingToggle");
    const amounts = document.querySelectorAll(".amount");
    const labelMonthly = document.getElementById("label-monthly");
    const labelYearly = document.getElementById("label-yearly");

    if (toggle) {
      toggle.addEventListener("change", function () {
        const isYearly = this.checked;

        if (labelYearly && labelMonthly) {
          if (isYearly) {
            labelYearly.classList.add("active");
            labelMonthly.classList.remove("active");
          } else {
            labelMonthly.classList.add("active");
            labelYearly.classList.remove("active");
          }
        }

        // Animação suave na troca de valores
        amounts.forEach((amount) => {
          amount.style.opacity = "0";
          amount.style.transform = "translateY(-10px)";

          setTimeout(() => {
            const newValue = isYearly
              ? amount.getAttribute("data-yearly")
              : amount.getAttribute("data-monthly");

            amount.textContent = newValue;
            amount.style.opacity = "1";
            amount.style.transform = "translateY(0)";
          }, 200);
        });
      });

      // Torna as labels clicáveis para alternar o toggle
      if (labelMonthly) {
        labelMonthly.addEventListener("click", () => {
          if (toggle.checked) {
            toggle.checked = false;
            toggle.dispatchEvent(new Event("change"));
          }
        });
      }

      if (labelYearly) {
        labelYearly.addEventListener("click", () => {
          if (!toggle.checked) {
            toggle.checked = true;
            toggle.dispatchEvent(new Event("change"));
          }
        });
      }
    }

    /* ==========================================================================
       5. CARROSSEL DE DEPOIMENTOS (SWIPER JS)
       Ação: Inicializa a biblioteca Swiper.js para exibir depoimentos.
       ========================================================================== */
    if (typeof Swiper !== "undefined" && document.querySelector(".testimonialSwiper")) {
      new Swiper(".testimonialSwiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        },
      });
    }

  });

  /* ==========================================================================
     6. FUNÇÃO AUXILIAR DE COPIAR PARA A ÁREA DE TRABALHO
     Ação: Copia um texto e exibe uma notificação estilo Toast.
     Nota: Mantida no escopo global para permitir o uso em atributos 'onclick'.
     ========================================================================== */
  function copyToClipboard(text, successMessage) {
    if (!navigator.clipboard) return;

    navigator.clipboard.writeText(text).then(() => {
      const toast = document.getElementById("cta-toast");
      const toastMsg = document.getElementById("toast-message");

      if (toast && toastMsg) {
        toastMsg.textContent = successMessage;
        toast.classList.add("show");

        setTimeout(() => {
          toast.classList.remove("show");
        }, 2500);
      }
    }).catch(err => {
      console.error("Erro ao copiar texto: ", err);
    });
  }