window.addEventListener('scroll', function() {
    var header = document.querySelector('header');
    if (window.scrollY > 50) { // Altere '50' conforme necessário
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });
  