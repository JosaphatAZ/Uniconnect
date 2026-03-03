<script src="assets/js/theme.js"></script>
<header id="main-header">

  <div class="container">
    <nav>

      <!-- Logo -->
      <a href="index.php" class="nav-logo">
        <div class="nav-logo-icon">
          <img src="assets/img/logo.png" width="100%" style="border-radius:6px">
        </div>
        <span class="nav-logo-text">UniConnect</span>
      </a>

      <!-- Liens desktop -->
      <ul class="nav-links">
        <li><a class="inde" href="index.php">Accueil</a></li>
        <li><a class="about" href="index.php#about">À propos</a></li>
        <li><a class="cont" href="contact.php">Contact</a></li>
      </ul>

      <!-- Actions desktop -->
      <div class="nav-actions">
        <a href="connexion.php"   class="btn-outline">Connexion Etudiant</a>
        <a href="inscription.php" class="btn-primary">Inscription Etudiant</a>
      </div>

      <!-- Theme toggle — toujours visible (desktop + mobile) -->
      <button class="theme-toggle" id="themeToggle" aria-label="Changer le thème">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon">
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
        </svg>
      </button>

      <!-- Hamburger mobile -->
      <button class="nav-hamburger" onclick="toggleMenu()" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
      </button>

    </nav>
  </div>
</header>