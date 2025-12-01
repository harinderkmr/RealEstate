document.addEventListener("DOMContentLoaded", function () {
  const popup     = document.getElementById("custom-popup");
  const content   = popup?.querySelector(".popup-content");
  const closeBtn  = popup?.querySelector(".popup-close");
  const thanksBtn = document.getElementById("popup-thanks-btn");

  function openPopup() {
    if (!popup) return;
    popup.classList.remove("closing");

    // reset popIn animation only for MODAL
    if (popup.classList.contains("modal") && content) {
      content.style.animation = "none";
      void content.offsetWidth; // reflow
      content.style.animation = "";
    }

    requestAnimationFrame(() => popup.classList.add("active"));
  }

  function closePopup() {
    if (!popup) return;

    // For modal, trigger popOut
    if (popup.classList.contains("modal")) {
      popup.classList.remove("active");
      void popup.offsetWidth; // reflow
      popup.classList.add("closing");
    } else {
      // banner + slide-in: just remove active
      popup.classList.remove("active");
    }
  }

  // Only MODAL uses animationend cleanup
  popup?.addEventListener("animationend", (e) => {
    if (!popup.classList.contains("modal")) return;
    if (e.target !== popup) return;
    if (popup.classList.contains("closing")) {
      popup.classList.remove("closing");
    }
  });

  closeBtn?.addEventListener("click", closePopup);
  thanksBtn?.addEventListener("click", closePopup);

  // show immediately on page load (or trigger manually later)
  openPopup();

  // optional: close modal by clicking overlay
  popup?.addEventListener("click", (e) => {
    if (e.target === popup && popup.classList.contains("modal")) {
      closePopup();
    }
  });
});
