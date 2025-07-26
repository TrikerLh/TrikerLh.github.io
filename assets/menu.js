document.addEventListener('DOMContentLoaded', function() {
  const menuContainer = document.getElementById('menu-container');
  if (menuContainer) {
    fetch('menu.html')
      .then(response => response.text())
      .then(html => {
        menuContainer.innerHTML = html;
        // Esperar a que el menú se agregue al DOM
        setTimeout(() => {
          const menuToggle = menuContainer.querySelector('.menu-toggle');
          const menuList = menuContainer.querySelector('.main-nav ul');
          if (menuToggle && menuList) {
            menuToggle.addEventListener('click', function() {
              const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
              menuToggle.setAttribute('aria-expanded', !expanded);
              menuList.classList.toggle('open');
            });
          }
        }, 100);
      });
  }
});
