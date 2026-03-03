
(function () {
  const STORAGE_KEY = 'uniconnect-theme';

  /* ── Icônes SVG (lune = sombre / soleil = clair) ── */
  const ICON_MOON = '<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>';
  const ICON_SUN  = '<path d="M12 3v1M12 20v1M4.22 4.22l.7.7M18.36 18.36l.7.7M3 12H4M20 12h1M4.22 19.78l.7-.7M18.36 5.64l.7-.7M12 8a4 4 0 100 8 4 4 0 000-8z"/>';

  /* ── État courant : sombre par défaut ── */
  let isDark = localStorage.getItem(STORAGE_KEY) !== 'light';

  /* ── Applique le thème (appevar(--purple);
      background: var(--pulé avant et après DOMContentLoaded) ── */
  function applyTheme() {
    document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');

    const icon = document.getElementById('themeIcon');
    if (icon) icon.innerHTML = isDark ? ICON_MOON : ICON_SUN;
  }

  /* Application immédiate pour éviter le FOUC */
  applyTheme();

  /* ── Branchement du bouton après chargement du DOM ── */
  document.addEventListener('DOMContentLoaded', function () {
    applyTheme(); /* Resync l'icône */

    const btn = document.getElementById('themeToggle');
    if (!btn) return;

    btn.addEventListener('click', function () {
      isDark = !isDark;
      localStorage.setItem(STORAGE_KEY, isDark ? 'dark' : 'light');
      applyTheme();
    });
  });
})();