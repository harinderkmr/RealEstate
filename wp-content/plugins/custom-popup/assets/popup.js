document.addEventListener("DOMContentLoaded", function () {
  const popup = document.getElementById("custom-popup");
  if (!popup) return;

  const content   = popup.querySelector(".popup-content");
  const closeBtn  = popup.querySelector(".popup-close");
  const thanksBtn = document.getElementById("popup-thanks-btn");

  // --- DATA ATTRIBUTES ---
  const promoTemplate = popup.dataset.promoTemplate || "default";
  const promoAuto     = popup.dataset.promoAuto || "";
  const freqKey       = popup.dataset.promoFreqKey || "";
  const freqTTL       = parseInt(popup.dataset.promoFreqTtl || "0") * 3600 * 1000;
  const promoEnd      = popup.dataset.promoEnd || "";

  // --- UTILITIES ---
  function setCookie(key, hours) {
    const now = Date.now();
    const ttl = now + hours;
    localStorage.setItem(key, ttl);
  }
  function hasCookie(key) {
    if (!key) return false;
    const ttl = localStorage.getItem(key);
    if (!ttl) return false;
    if (Date.now() > parseInt(ttl)) {
      localStorage.removeItem(key);
      return false;
    }
    return true;
  }

  // --- SHOW / HIDE ---
  function openPopup() {
    if (!popup) return;
    if (freqKey && hasCookie(freqKey)) return; // already seen

    popup.classList.remove("closing");

    if (popup.classList.contains("modal") && content) {
      content.style.animation = "none";
      void content.offsetWidth;
      content.style.animation = "";
    }

    requestAnimationFrame(() => popup.classList.add("active"));

    // set frequency cookie
    if (freqKey && freqTTL > 0) {
      setCookie(freqKey, freqTTL);
    }

    // start countdown if flash-sale
    if (promoTemplate === "flash-sale" && promoEnd) {
      startCountdown(promoEnd);
    }
  }

  function closePopup() {
    if (!popup) return;

    if (popup.classList.contains("modal")) {
      popup.classList.remove("active");
      void popup.offsetWidth;
      popup.classList.add("closing");
    } else {
      popup.classList.remove("active");
    }
  }

  // --- COUNTDOWN ---
  function startCountdown(endTime) {
    const end = new Date(endTime).getTime();
    const box = popup.querySelector(".countdown");
    if (!box) return;

    function tick() {
      const now = Date.now();
      const diff = end - now;
      if (diff <= 0) {
        box.textContent = "Expired";
        return;
      }
      const h = Math.floor(diff / (1000 * 60 * 60));
      const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const s = Math.floor((diff % (1000 * 60)) / 1000);
      box.textContent = `${h}h ${m}m ${s}s`;
      requestAnimationFrame(() => setTimeout(tick, 1000));
    }
    tick();
  }

  // --- TRIGGERS ---
  if (promoAuto === "pageload") {
    openPopup();
  } else if (promoAuto === "scroll50") {
    window.addEventListener("scroll", function onScroll() {
      if ((window.scrollY + window.innerHeight) / document.body.scrollHeight > 0.5) {
        openPopup();
        window.removeEventListener("scroll", onScroll);
      }
    });
  } else if (promoAuto === "exit") {
    document.addEventListener("mouseout", function onExit(e) {
      if (!e.toElement && !e.relatedTarget && e.clientY < 10) {
        openPopup();
        document.removeEventListener("mouseout", onExit);
      }
    });
  }

  // --- EVENTS ---
  closeBtn?.addEventListener("click", closePopup);
  thanksBtn?.addEventListener("click", closePopup);

  popup.addEventListener("animationend", (e) => {
    if (!popup.classList.contains("modal")) return;
    if (e.target !== popup) return;
    if (popup.classList.contains("closing")) {
      popup.classList.remove("closing");
    }
  });

  popup.addEventListener("click", (e) => {
    if (e.target === popup && popup.classList.contains("modal")) {
      closePopup();
    }
  });
});
