document.addEventListener("DOMContentLoaded", function() {
  const mainContainer = document.querySelector(".main-container");

  if (!mainContainer) return;

  const signoNome = mainContainer.dataset.signo || "";

  const backgrounds = {
      "Áries": "#FFEBEE",
      "Touro": "#E8F5E9",
      "Gêmeos": "#E3F2FD",
      "Câncer": "#FFF3E0",
      "Leão": "#FFF8E1",
      "Virgem": "#F3E5F5",
      "Libra": "#EDE7F6",
      "Escorpião": "#FFEBEE",
      "Sagitário": "#E8F5E9",
      "Capricórnio": "#E0F2F1",
      "Aquário": "#E1F5FE",
      "Peixes": "#E8EAF6"
  };

  if (backgrounds[signoNome]) {
      mainContainer.style.backgroundColor = backgrounds[signoNome];
  }

  // Configuração do modal
  const modal = document.getElementById("signoModal");
  const btn = document.getElementById("btn-learn-more");
  const span = document.getElementsByClassName("close")[0];

  if (btn) {
      btn.onclick = function() {
          if (modal) modal.style.display = "block";
      }
  }

  if (span) {
      span.onclick = function() {
          if (modal) modal.style.display = "none";
      }
  }

  window.onclick = function(event) {
      if (event.target === modal) {
          modal.style.display = "none";
      }
  }
});
