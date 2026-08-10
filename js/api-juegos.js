// ======================================================
// API JUEGOS - JAVASCRIPT
// Ranking Mundial
// ======================================================

document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".game-card");

  // ============================================
  // Animación de entrada
  // ============================================

  cards.forEach((card, index) => {
    card.style.opacity = "0";
    card.style.transform = "translateY(40px)";

    setTimeout(() => {
      card.style.transition = "all .6s ease";

      card.style.opacity = "1";

      card.style.transform = "translateY(0)";
    }, index * 60);
  });

  // ============================================
  // Efecto 3D al mover el mouse
  // ============================================

  cards.forEach((card) => {
    card.addEventListener("mousemove", (e) => {
      const rect = card.getBoundingClientRect();

      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      const rotateY = (x - centerX) / 20;
      const rotateX = -(y - centerY) / 20;

      card.style.transform = `
                perspective(900px)
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
                scale(1.03)
            `;
    });

    card.addEventListener("mouseleave", () => {
      card.style.transition = "transform .35s ease";

      card.style.transform = `
                perspective(900px)
                rotateX(0deg)
                rotateY(0deg)
                scale(1)
            `;
    });
  });

  // ============================================
  // Animación del badge TOP
  // ============================================

  const badges = document.querySelectorAll(".ranking-badge");

  badges.forEach((badge) => {
    badge.addEventListener("mouseenter", () => {
      badge.style.transform = "scale(1.1)";
      badge.style.transition = ".25s";
    });

    badge.addEventListener("mouseleave", () => {
      badge.style.transform = "scale(1)";
    });
  });

  // ============================================
  // Animación de imagen
  // ============================================

  const images = document.querySelectorAll(".game-img");

  images.forEach((img) => {
    img.addEventListener("mouseenter", () => {
      img.style.transition = ".4s";

      img.style.transform = "scale(1.05)";
    });

    img.addEventListener("mouseleave", () => {
      img.style.transform = "scale(1)";
    });
  });
});
