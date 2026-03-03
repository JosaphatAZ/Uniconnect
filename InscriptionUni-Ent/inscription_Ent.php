<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Inscription École / Faculté</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/forms-insc.css">
  <link rel="icon" href="../assets/img/logo.png" type="image/png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <script src="assets/js/theme.js"></script>
  <header id="main-header">

    <div class="container">
      <nav>

        <!-- Logo -->
        <a href="index.php" class="nav-logo">
          <div class="nav-logo-icon">
            <img src="../assets/img/logo.png" width="100%" style="border-radius:6px">
          </div>
          <span class="nav-logo-text">UniConnect</span>
        </a>

        <!-- Liens desktop -->
        <ul class="nav-links">
          <li><a class="inde" href="../index.php">Accueil</a></li>
          <li><a class="about" href="../index.php#about">À propos</a></li>
          <li><a class="cont" href="../contact.php">Contact</a></li>
        </ul>

        <!-- Actions desktop -->
        <div class="nav-actions">
          <a href="../connexion.php" class="btn-outline">Connexion Etudiant</a>
          <a href="../inscription.php" class="btn-primary">Inscription Etudiant</a>
        </div>

        <!-- Theme toggle — toujours visible (desktop + mobile) -->
        <button class="theme-toggle" id="themeToggle" aria-label="Changer le thème">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="themeIcon">
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
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
  <div class="page-header">
    <h1>Inscription <span>École / Faculté</span></h1>
    <p>Rejoignez UniConnect — Votre demande sera traitée sous 48h</p>
  </div>

  <div class="wrapper">
    <div class="form-card active" id="card-ecole">

      <div class="form-title-row">
        <span class="form-title-icon"><i class="fa fa-building"></i></span>
        <div class="form-title-text">
          <h2>Inscription École / Faculté</h2>
          <p>Complétez les informations ci-dessous. Votre demande sera validée sous 48h ouvrées.</p>
        </div>
      </div>

      <form id="form-ecole" autocomplete="off" onsubmit="submitForm(); return false;">

        <!-- Université -->
        <div class="field">
          <label>Université d'appartenance <span class="req">*</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-university"></i></span>
            <select id="ec-universite" required onchange="toggleTypeField(this.value)">
              <option value="">Sélectionnez votre université</option>
              <option value="UNSTIM">UNSTIM — Université des Sciences et Technologies</option>
              <option value="UA">UA — Université d'Abomey</option>
              <option value="UP">UP — Université de Parakou</option>
              <option value="UNA">UNA — Université Nationale d'Agriculture</option>
            </select>
          </div>
          <p class="error-msg" id="err-ec-universite">Veuillez sélectionner votre université</p>
        </div>

        <!-- Type d'entité (École ou Faculté) - avec select option -->
        <div class="field" id="field-type" style="display:none;">
          <label>Type d'entité <span class="req">*</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-layer-group"></i></span>
            <select id="ec-type" required>
              <option value="">Choisissez le type</option>
              <option value="faculte">Faculté</option>
              <option value="ecole">École</option>
            </select>
          </div>
          <p class="error-msg" id="err-ec-type">Veuillez choisir le type d'entité</p>
        </div>

        <!-- Nom de l'entité -->
        <div class="field">
          <label>Nom complet de l'établissement <span class="req">*</span></label>
          <input type="text" id="ec-nom" placeholder="ex: Faculté des Sciences, École Polytechnique..." required />
          <p class="error-msg" id="err-ec-nom">Ce champ est requis</p>
        </div>

        <!-- Sigle -->
        <div class="field">
          <label>Sigle / Acronyme <span class="opt">(optionnel)</span></label>
          <input type="text" id="ec-sigle" placeholder="ex: FD, EP, IUTT" />
        </div>

        <div class="form-divider"></div>
        <p class="form-section-label">Compte administrateur</p>

        <!-- Email -->
        <div class="field">
          <label>Email officiel <span class="req">*</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-envelope"></i></span>
            <input type="email" id="ec-email" placeholder="contact@faculte.universite.fr" required />
          </div>
          <p class="error-msg" id="err-ec-email">Adresse email invalide</p>
        </div>

        <!-- Mot de passe -->
        <div class="field">
          <label>Mot de passe <span class="req">*</span></label>
          <div class="input-wrap has-icon has-icon-right">
            <span class="input-icon"><i class="fa fa-lock"></i></span>
            <input type="password" id="ec-pwd" placeholder="8 caractères minimum" oninput="checkStrength(this,'ec-str')" required />
            <button class="input-icon-right" onclick="togglePwd('ec-pwd',this)" type="button"><i class="fa fa-eye"></i></button>
          </div>
          <div class="strength-wrap">
            <div class="strength-bars" id="ec-str"><span></span><span></span><span></span><span></span></div>
            <span class="strength-label">Force : </span>
          </div>
          <p class="error-msg" id="err-ec-pwd">Minimum 8 caractères requis</p>
        </div>

        <!-- Confirmation -->
        <div class="field">
          <label>Confirmer le mot de passe <span class="req">*</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-lock"></i></span>
            <input type="password" id="ec-pwd2" placeholder="Répétez votre mot de passe" required />
          </div>
          <p class="error-msg" id="err-ec-pwd2">Les mots de passe ne correspondent pas</p>
        </div>

        <div class="form-divider"></div>
        <p class="form-section-label">Informations complémentaires</p>

        <!-- Site web -->
        <div class="field">
          <label>Site web <span class="opt">(optionnel)</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-globe"></i></span>
            <input type="url" id="ec-web" placeholder="https://www.faculte.universite.fr" />
          </div>
        </div>

        <!-- Téléphone -->
        <div class="field">
          <label>Téléphone <span class="opt">(optionnel)</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-phone"></i></span>
            <input type="tel" id="ec-tel" placeholder="+229 01 40 40 40 40" />
          </div>
        </div>

        <div class="form-divider"></div>

        <!-- CGU -->
        <div class="field">
          <div class="checkbox-wrap">
            <input type="checkbox" id="ec-terms" required />
            <label for="ec-terms">J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a>. Je certifie représenter légalement cet établissement. <span class="req">*</span></label>
          </div>
          <p class="error-msg" id="err-ec-terms">Vous devez accepter les conditions</p>
        </div>

        <button class="btn-submit" type="submit">
          <span id="ec-btn-label">Envoyer ma demande d'inscription</span>
          <span class="spinner" id="ec-spinner"></span>
        </button>

      </form>

      <!-- Succès -->
      <div class="success-box" id="success-ecole">
        <div class="success-icon"><i class="fa fa-check-circle"></i></div>
        <h3>Demande envoyée avec succès !</h3>
        <p>Votre demande a été reçue. Elle sera examinée sous <strong>48h ouvrées</strong>.<br>Un email de confirmation vous sera envoyé dès validation.</p>
      </div>

      <div class="form-bottom">
        <p>Déjà inscrit ? <a href="connexion.php">Se connecter</a></p>
        <p>Un problème ? <a href="#">Contactez-nous</a></p>
      </div>

    </div>

    <div class="page-footer">
      <a href="index.php">Accueil</a><span>·</span>
      <a href="#">Conditions d'utilisation</a><span>·</span>
      <a href="#">Confidentialité</a><span>·</span>
      <a href="#">Aide</a>
    </div>

  </div>

  <script>
    /* ── Affichage du champ type après choix université ── */
    function toggleTypeField(value) {
      document.getElementById('field-type').style.display = value ? 'block' : 'none';
    }

    /* ── Toggle mot de passe ── */
    function togglePwd(id, btn) {
      const inp = document.getElementById(id);
      inp.type = inp.type === 'password' ? 'text' : 'password';
      btn.innerHTML = inp.type === 'password' ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
    }

    /* ── Password strength ── */
    function checkStrength(input, barId) {
      const val = input.value;
      const bar = document.getElementById(barId);
      bar.className = 'strength-bars';
      if (!val) return;
      let score = 0;
      if (val.length >= 8) score++;
      if (/[A-Z]/.test(val)) score++;
      if (/[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;
      if (score > 0) bar.classList.add('s' + score);
    }

    /* ── Helpers validation ── */
    function showErr(id, show) {
      document.getElementById('err-' + id)?.classList.toggle('show', show);
      document.getElementById(id)?.classList.toggle('error', show);
    }

    function validateEmail(v) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
    }

    /* ── Soumission AJAX ── */
    function submitForm() {
      const universite = document.getElementById('ec-universite').value;
      const type = document.getElementById('ec-type').value;
      const nom = document.getElementById('ec-nom').value.trim();
      const sigle = document.getElementById('ec-sigle').value.trim();
      const email = document.getElementById('ec-email').value.trim();
      const pwd = document.getElementById('ec-pwd').value;
      const pwd2 = document.getElementById('ec-pwd2').value;
      const site_web = document.getElementById('ec-web').value.trim();
      const telephone = document.getElementById('ec-tel').value.trim();
      const terms = document.getElementById('ec-terms').checked;
      let valid = true;

      if (!universite) {
        showErr('ec-universite', true);
        valid = false;
      } else showErr('ec-universite', false);
      if (!type) {
        showErr('ec-type', true);
        valid = false;
      } else showErr('ec-type', false);
      if (!nom) {
        showErr('ec-nom', true);
        valid = false;
      } else showErr('ec-nom', false);
      if (!validateEmail(email)) {
        showErr('ec-email', true);
        valid = false;
      } else showErr('ec-email', false);
      if (pwd.length < 8) {
        showErr('ec-pwd', true);
        valid = false;
      } else showErr('ec-pwd', false);
      if (pwd !== pwd2) {
        showErr('ec-pwd2', true);
        valid = false;
      } else showErr('ec-pwd2', false);
      if (!terms) {
        showErr('ec-terms', true);
        valid = false;
      } else showErr('ec-terms', false);

      if (!valid) return;

      const btn = document.getElementById('ec-btn-label').closest('button');
      const spinner = document.getElementById('ec-spinner');
      const label = document.getElementById('ec-btn-label');

      label.style.display = 'none';
      spinner.style.display = 'block';
      btn.disabled = true;

      const formData = new FormData();
      formData.append('ec-universite', universite);
      formData.append('ec-type', type);
      formData.append('ec-nom', nom);
      formData.append('ec-sigle', sigle);
      formData.append('ec-email', email);
      formData.append('ec-pwd', pwd);
      formData.append('ec-pwd2', pwd2);
      formData.append('ec-web', site_web);
      formData.append('ec-tel', telephone);
      formData.append('terms', terms);

      fetch('../assets/php/inscription-entite-traitement.php', {
          method: 'POST',
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            document.getElementById('form-ecole').style.display = 'none';
            document.getElementById('success-ecole').classList.add('show');
          } else {
            const globalError = document.getElementById('global-error');
            globalError.style.display = 'block';
            globalError.innerHTML = data.message;
          }
        })
        .catch(() => {
          const globalError = document.getElementById('global-error');
          globalError.style.display = 'block';
          globalError.innerHTML = 'Erreur de connexion au serveur. Réessayez.';
        })
        .finally(() => {
          label.style.display = 'block';
          spinner.style.display = 'none';
          btn.disabled = false;
        });
    }
  </script>

</body>

</html>