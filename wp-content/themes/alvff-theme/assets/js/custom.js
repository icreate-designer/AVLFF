/* ALVFF Theme – custom.js */

document.addEventListener('DOMContentLoaded', function () {

  // ── Donation button selector ────────────────────────────────────────────
  const buttons   = document.querySelectorAll('.donation-btn');
  const donateBtn = document.getElementById('donateBtn');

  if ( buttons.length && donateBtn ) {
    buttons.forEach(function (button) {
      button.addEventListener('click', function () {
        // Deactivate all
        buttons.forEach(function (btn) {
          btn.classList.remove('btn-danger');
          btn.classList.add('btn-outline-danger');
        });
        // Activate clicked
        button.classList.remove('btn-outline-danger');
        button.classList.add('btn-danger');
        // Update label
        const amount = button.getAttribute('data-amount');
        donateBtn.textContent = 'Faire un Don €' + amount;
      });
    });
  }

  // ── Navbar glass-scroll effect ─────────────────────────────────────────
  const navbar = document.getElementById('mainNavbar');

  if ( navbar ) {
    window.addEventListener('scroll', function () {
      if ( window.scrollY > 50 ) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  }

});
