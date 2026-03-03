<?php 
session_start();
if (isset($_SESSION['etudiant_id'])) {
    header("Location: etudiant/");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Toutes les informations universitaires au même endroit</title>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
  <style>
    /* MODAL DEMANDE D'INSCRIPTION */
    .modal-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(15, 10, 30, .6);
      z-index: 9999;
      align-items: center;
      justify-content: center;
      padding: 16px;
      backdrop-filter: blur(5px);
    }

    /* Thème sombre pour le modal */
    .modal-box {
      background: var(--surface-1);
      color: var(--text);
      border-radius: 24px;
      padding: 40px 38px 34px;
      max-width: 520px;
      width: 100%;
      max-height: 92vh;
      overflow-y: auto;
      position: relative;
      animation: mPop .28s cubic-bezier(.34, 1.56, .64, 1) both;
      box-shadow: 0 24px 80px var(--shadow-lg);
      border: 1px solid var(--border);
    }
    .modal-logo-text,
    .modal-title,
    .type-name,
    .recap-box .recap-line strong {
      color: var(--white);
    }
    .modal-sub,
    .type-desc,
    .mf-label,
    .recap-box .recap-line {
      color: var(--text-mid);
    }
    .modal-close {
      background: var(--surface-3);
      color: var(--text-mid);
      border-color: var(--border);
    }
    .modal-close:hover {
      background: var(--purple-pale);
      color: var(--purple-light);
      border-color: var(--purple-border);
    }
    .type-card {
      background: var(--surface-2);
      border: 2px solid var(--border);
    }
    .type-card:hover {
      border-color: var(--purple);
      background: var(--purple-pale);
      box-shadow: 0 6px 20px var(--shadow-md);
    }
    .step-badge {
      background: var(--purple-pale);
      color: var(--purple-light);
    }
    .mf-input,
    .mf-select {
      background: var(--surface-2);
      color: var(--text);
      border: 1.5px solid var(--border);
    }
    .mf-input:focus,
    .mf-select:focus {
      border-color: var(--purple);
      background: var(--surface-1);
      box-shadow: 0 0 0 3px var(--purple-glow);
    }
    .mf-error {
      background: var(--purple-pale);
      border: 1px solid var(--purple-border);
      color: var(--purple);
    }
    .mf-submit {
      background: linear-gradient(135deg, var(--purple), var(--purple-dark));
      color: var(--white);
    }
    .recap-box {
      background: var(--surface-3);
    }
    /* Scrollbar personnalisée selon le thème */
    body::-webkit-scrollbar,
    .modal-box::-webkit-scrollbar {
      width: 8px;
      background: var(--surface-1);
    }
    body::-webkit-scrollbar-thumb,
    .modal-box::-webkit-scrollbar-thumb {
      background: var(--purple-border);
      border-radius: 8px;
    }
    body::-webkit-scrollbar-thumb:hover,
    .modal-box::-webkit-scrollbar-thumb:hover {
      background: var(--purple);
    }
    /* Firefox */
    body,
    .modal-box {
      scrollbar-color: var(--purple-border) var(--surface-1);
      scrollbar-width: thin;
    }

    .modal-overlay.open {
      display: flex;
      animation: mFade .22s ease both;
    }

    @keyframes mFade {
      from {
        opacity: 0
      }

      to {
        opacity: 1
      }
    }

    .modal-box {
      background: var(--surface-1);
      color: var(--text);
      border-radius: 24px;
      padding: 40px 38px 34px;
      max-width: 520px;
      width: 100%;
      max-height: 92vh;
      overflow-y: auto;
      position: relative;
      animation: mPop .28s cubic-bezier(.34, 1.56, .64, 1) both;
      box-shadow: 0 24px 80px var(--shadow-lg);
      border: 1px solid var(--border);
    }

    @keyframes mPop {
      from {
        opacity: 0;
        transform: scale(.9) translateY(20px)
      }

      to {
        opacity: 1;
        transform: scale(1) translateY(0)
      }
    }

    .modal-close {
      position: absolute;
      top: 16px;
      right: 18px;
      width: 33px;
      height: 33px;
      border-radius: 50%;
      border: 1.5px solid var(--border);
      background: var(--surface-3);
      color: var(--text-mid);
      font-size: 14px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background .18s, color .18s, border-color .18s;
    }

    .modal-close:hover {
      background: var(--purple-pale);
      color: var(--purple-light);
      border-color: var(--purple-border);
    }

    .modal-logo {
      display: flex;
      align-items: center;
      gap: 9px;
      margin-bottom: 22px;
    }

    .modal-logo-icon {
      width: 32px;
      height: 32px;
      border-radius: 9px;
      overflow: hidden;
    }

    .modal-logo-icon img {
      width: 100%;
      display: block;
    }

    .modal-logo-text {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1rem;
      color: var(--white);
    }

    .modal-title {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1.55rem;
      color: var(--white);
      margin-bottom: 6px;
    }

    .modal-sub {
      font-size: .88rem;
      color: var(--text-mid);
      margin-bottom: 22px;
      line-height: 1.6;
    }

    /* Étape 1 : choix type */
    .type-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .type-card {
      border: 2px solid var(--border);
      border-radius: 15px;
      padding: 20px 14px;
      text-align: left;
      background: var(--surface-2);
      cursor: pointer;
      font-family: 'DM Sans', sans-serif;
      transition: border-color .18s, background .18s, transform .15s, box-shadow .18s;
    }

    .type-card:hover {
      border-color: var(--purple);
      background: var(--purple-pale);
      transform: translateY(-2px);
      box-shadow: 0 6px 20px var(--shadow-md);
    }

    .type-icon {
      font-size: 28px;
      margin-bottom: 10px;
      display: block;
    }

    .type-name {
      font-weight: 700;
      font-size: .9rem;
      color: var(--white);
      margin-bottom: 4px;
    }

    .type-desc {
      font-size: .75rem;
      color: var(--text-mid);
      line-height: 1.45;
    }

    /* Étape 2 : formulaire */
    .modal-back {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: none;
      border: none;
      cursor: pointer;
      font-family: 'DM Sans', sans-serif;
      font-size: .82rem;
      font-weight: 600;
      color: #7c3aed;
      padding: 0;
      margin-bottom: 6px;
    }

    .step-badge {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: var(--purple-pale);
      color: var(--purple-light);
      padding: 5px 13px;
      border-radius: 20px;
      font-size: .76rem;
      font-weight: 700;
      margin-bottom: 14px;
    }

    .mf-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }

    .mf-group {
      margin-bottom: 14px;
    }

    .mf-label {
      display: block;
      font-size: .79rem;
      font-weight: 600;
      color: var(--text-mid);
      margin-bottom: 6px;
    }

    .mf-label span {
      color: #ef4444;
    }

    .mf-input,
    .mf-select {
      width: 100%;
      padding: 10px 13px;
      border: 1.5px solid var(--border);
      border-radius: 10px;
      font-family: 'DM Sans', sans-serif;
      font-size: .88rem;
      color: var(--text);
      background: var(--surface-2);
      outline: none;
      box-sizing: border-box;
      transition: border-color .2s, box-shadow .2s, background .2s;
    }

    .mf-input:focus,
    .mf-select:focus {
      border-color: var(--purple);
      background: var(--surface-1);
      box-shadow: 0 0 0 3px var(--purple-glow);
    }

    .mf-icon-wrap {
      position: relative;
    }

    .mf-icon-wrap i {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-soft);
      font-size: 13px;
      pointer-events: none;
    }

    .mf-icon-wrap .mf-input {
      padding-left: 33px;
    }

    .mf-error {
      display: none;
      background: var(--purple-pale);
      border: 1px solid var(--purple-border);
      border-radius: 8px;
      padding: 10px 13px;
      font-size: .81rem;
      color: var(--purple);
      margin-bottom: 14px;
    }

    .mf-submit {
      width: 100%;
      padding: 13px;
      border: none;
      border-radius: 11px;
      background: linear-gradient(135deg, var(--purple), var(--purple-dark));
      color: var(--white);
      font-family: 'DM Sans', sans-serif;
      font-size: .94rem;
      font-weight: 700;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 9px;
      transition: opacity .2s, transform .15s;
    }

    .mf-submit:hover {
      opacity: .9;
      transform: translateY(-1px);
    }

    .mf-note {
      text-align: center;
      font-size: .76rem;
      color: var(--text-soft);
      margin-top: 9px;
    }

    /* Étape 3 : succès */
    .step-success {
      text-align: center;
      padding: 8px 0;
    }

    .step-success .s-emoji {
      font-size: 54px;
      display: block;
      margin-bottom: 16px;
    }

    .step-success h3 {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1.45rem;
      color: var(--white);
      margin-bottom: 8px;
    }

    .step-success p {
      font-size: .88rem;
      color: var(--text-mid);
      margin-bottom: 20px;
      line-height: 1.65;
      max-width: 340px;
      margin-left: auto;
      margin-right: auto;
    }

    .recap-box {
      background: var(--surface-3);
      border-radius: 13px;
      padding: 16px 18px;
      text-align: left;
      margin-bottom: 22px;
    }

    .recap-box .recap-title {
      font-size: .72rem;
      font-weight: 700;
      color: var(--purple-light);
      text-transform: uppercase;
      letter-spacing: .06em;
      margin-bottom: 9px;
    }

    .recap-box .recap-line {
      font-size: .84rem;
      color: var(--text-mid);
      line-height: 1.85;
    }

    .recap-box .recap-line strong {
      color: var(--white);
    }

    @media(max-width:500px) {
      .modal-box {
        padding: 28px 18px 24px;
      }

      .type-grid {
        grid-template-columns: 1fr 1fr;
        gap: 8px;
      }

      .type-card {
        padding: 14px 10px;
      }

      .type-icon {
        font-size: 22px;
      }

      .mf-row {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>

  <?php include 'includes/header.php'; ?>

  <!-- Mobile menu -->
  <div class="mobile-menu" id="mobile-menu">
    <div class="mobile-menu-header">
      <a href="#" class="nav-logo">
        <div class="nav-logo-icon"><img src="assets/img/logo.png" width="100%" style="border-radius: 20px;"></div>
        <span class="nav-logo-text">UniConnect</span>
      </a>
      <button class="mobile-close" onclick="toggleMenu()">✕</button>
    </div>
    <a href="#" onclick="toggleMenu()">Accueil</a>
    <a href="#about" onclick="toggleMenu()">À propos</a>
    <a href="contact.php" onclick="toggleMenu()">Contact</a>
    <div class="mobile-btns">
      <button class="btn-outline" onclick="toggleMenu()">Connexion</button>
      <button class="btn-primary" onclick="toggleMenu()">Inscription gratuite</button>
    </div>
  </div>

  <!-- HERO  -->
  <section class="hero" id="home">
    <div class="container">
      <div class="hero-inner">
        <div class="hero-badge">
          <span class="hero-badge-dot"></span>
          Plateforme universitaire Béninoise
        </div>
        <h1 class="hero-title">
          Toutes les informations<br />universitaires <em>au même endroit</em>
        </h1>
        <p class="hero-sub">
          Actualités, annales d'examens et programmes universitaires — accessibles gratuitement.
        </p>
        <p class="hero-trust">
          <span>✓ Accès gratuit</span>
          <span class="hero-trust-divider"></span>
          <span>Aucune carte bancaire requise</span>
        </p>
      </div>
    </div>
  </section>

  <!-- PROPOSITION DE VALEUR -->
  <section class="section section-alt" id="about">
    <div class="container">
      <div class="text-center reveal">
        <span class="section-label">✦ Pourquoi nous choisir</span>
        <h2 class="section-title">Pourquoi utiliser UniConnect ?</h2>
        <p class="section-sub">Une plateforme pensée pour tous les acteurs de l'enseignement supérieur.</p>
      </div>
      <div class="value-grid">
        <div class="value-card reveal reveal-delay-1">
          <div class="value-card-icon"><i class="fa fa-graduation-cap"></i></div>
          <h3>Pour les étudiants</h3>
          <p>Accédez aux actualités, épreuves d'examens et programmes de votre université en un seul endroit, gratuitement.</p>
        </div>
        <div class="value-card reveal reveal-delay-2">
          <div class="value-card-icon"><i class="fa fa-university"></i></div>
          <h3>Pour les universités/écoles/facultés</h3>
          <p>Diffusez vos informations à tous vos étudiants simplement et bien plus. Gérez vos publications, annales et actualités depuis un tableau de bord unique.</p>
        </div>
        <div class="value-card reveal reveal-delay-3">
          <div class="value-card-icon"><i class="fa fa-search"></i></div>
          <h3>Gratuit et ouvert</h3>
          <p>Pas besoin de compte pour consulter les publications publiques. L'inscription est uniquement nécessaire pour accéder aux contenus privés.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- COMMENT CA MARCHE  -->
  <section class="section">
    <div class="container">
      <div class="text-center reveal">
        <span class="section-label">⚡ Simple et rapide</span>
        <h2 class="section-title">Comment ça marche ?</h2>
        <p class="section-sub">En trois étapes, accédez à toutes les ressources de votre établissement.</p>
      </div>
      <div class="steps-grid">
        <div class="step-card reveal reveal-delay-1">
          <div class="step-num"><span class="step-icon"><i class="fa fa-search"></i></span></div>
          <h3>Recherchez votre université</h3>
          <p>Tapez le nom de votre établissement dans la barre de recherche et trouvez-le instantanément</p>
        </div>
        <div class="step-card reveal reveal-delay-2">
          <div class="step-num"><span class="step-icon"><i class="fa fa-list"></i></span></div>
          <h3>Consultez ses publications</h3>
          <p>Parcourez librement les actualités, annales d'examens et programmes d'études publiés par votre université.</p>
        </div>
        <div class="step-card reveal reveal-delay-3">
          <div class="step-num"><span class="step-icon"><i class="fa fa-lock"></i></span></div>
          <h3>Accédez aux contenus privés</h3>
          <p>Inscrivez-vous gratuitement pour débloquer les ressources privées, les notifications et votre espace personnel.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA BANNER -->
  <section class="section">
    <div class="container">
      <div class="cta-banner reveal">
        <h2>Vous êtes une université ?<br />Rejoignez UniConnect</h2>
        <p>Rejoignez plus de 200 établissements qui font confiance à UniConnect pour diffuser leurs informations.</p>
        <a href="contact.php" class="btn-white" type="button"><i class="fa fa-handshake"></i> Nous contacter</a>
        <p class="cta-note">
          <span>✓ Gratuit</span> &nbsp;·&nbsp; <span>✓ Validation sous 48h</span> &nbsp;·&nbsp; Sans engagement
        </p>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <!-- SCRIPTS -->
  <script>

    document.addEventListener('DOMContentLoaded', () => {
      const navLink = document.getElementsByClassName('inde');
      navLink[0].classList.add('active');
    });
    /* ── Sticky header ── */
    window.addEventListener('scroll', () => {
      document.getElementById('main-header').classList.toggle('scrolled', window.scrollY > 20);
    });

    /* ── Mobile menu ── */
    function toggleMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('open');
      document.body.style.overflow = menu.classList.contains('open') ? 'hidden' : '';
    }

    /* ── Scroll reveal ── */
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          e.target.classList.add('visible');
          observer.unobserve(e.target);
        }
      });
    }, {
      threshold: 0.12
    });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    /* MODAL LOGIQUE */
    let selectedType = '';

    function ouvrirModal() {
      document.getElementById('modalDemande').classList.add('open');
      document.body.style.overflow = 'hidden';
      afficherStep(1);
    }

    function fermerModal() {
      document.getElementById('modalDemande').classList.remove('open');
      document.body.style.overflow = '';
    }

    function clickOverlay(e) {
      if (e.target === document.getElementById('modalDemande')) fermerModal();
    }

    function afficherStep(n) {
      [1, 2, 3].forEach(i => {
        const el = document.getElementById('step' + i);
        if (el) el.style.display = (i === n) ? 'block' : 'none';
      });
    }

    function choisirType(type, emoji) {
      selectedType = type;
      document.getElementById('stepBadgeLabel').innerHTML = emoji + ' ' + type;
      afficherStep(2);
      ['mfNom', 'mfEmail', 'mfSite', 'mfResponsable', 'mfTel'].forEach(id => document.getElementById(id).value = '');
      document.getElementById('mfPays').selectedIndex = 0;
      document.getElementById('mfErr').style.display = 'none';
    }

    function retour() {
      afficherStep(1);
    }

    function envoyerDemande() {
      const nom = document.getElementById('mfNom').value.trim();
      const email = document.getElementById('mfEmail').value.trim();
      const pays = document.getElementById('mfPays').value;
      const site = document.getElementById('mfSite').value.trim();
      const resp = document.getElementById('mfResponsable').value.trim();
      const err = document.getElementById('mfErr');

      if (!nom || !email || !pays || !site || !resp) {
        err.style.display = 'block';
        return;
      }
      err.style.display = 'none';

      // Récap
      const tel = document.getElementById('mfTel').value.trim();
      document.getElementById('recapBox').innerHTML = `
              <div class="recap-title">Récapitulatif de votre demande</div>
              <div class="recap-line">
                <strong>Type :</strong> ${selectedType}<br>
                <strong>Établissement :</strong> ${nom}<br>
                <strong>Email :</strong> ${email}<br>
                <strong>Pays :</strong> ${pays}<br>
                <strong>Site web :</strong> ${site}<br>
                <strong>Responsable :</strong> ${resp}
                ${tel ? '<br><strong>Téléphone :</strong> ' + tel : ''}
              </div>
            `;
      afficherStep(3);
    }

    /* Fermer avec Échap */
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') fermerModal();
    });
  </script>
</body>

</html>