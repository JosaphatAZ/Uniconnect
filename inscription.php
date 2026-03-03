<?php 
// require_once __DIR__ . '/includes/config.php'; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Rejoindre la plateforme</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/forms-insc.css">
  <link rel="icon" href="assets/img/logo.png" type="image/png"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <?php include 'includes/header.php'; ?>

  <div class="page-header">
    <h1>Rejoindre <span>UniConnect</span></h1>
    <p>Créez votre compte gratuitement — Sélectionnez votre profil ci-dessous</p>
  </div>

  <div class="wrapper">
    <div class="tabs-wrap">
      <button class="tab-btn active" id="tab-etudiant">
        <span class="t-icon"><i class="fa fa-user-graduate"></i></span>
        <span class="t-label">Étudiant</span>
      </button>
    </div>

    <!-- ╔══════════════════════════════╗ 
         ║           ÉTUDIANT           ║
         ╚══════════════════════════════╝ -->
    <div class="form-card active" id="card-etudiant">
      <!-- GLOBAL ERROR -->
      <div id="global-error" style="display:none; background:#4c1d95; color:#f8fafc; padding:16px 22px; border-radius:12px; margin:20px 0; border-left:5px solid #e11d48; font-weight:600; box-shadow:0 4px 15px rgba(225,29,72,0.25);"></div>

      <div class="form-title-row">
        <span class="form-title-icon"><i class="fa fa-user-graduate"></i></span>
        <div class="form-title-text">
          <h2>Inscription Étudiant</h2>
          <p>Accédez aux ressources de votre université</p>
        </div>
      </div>

      <div class="banner banner-blue">
        <span class="banner-icon"><i class="fa fa-lightbulb"></i></span>
        <span>En tant qu'étudiant, vous pourrez consulter les actualités, télécharger les épreuves et contacter votre université.</span>
      </div>

      <form id="form-etudiant" method="post" action="assets/php/inscription-traitement.php" autocomplete="off">
        <!-- Email -->
        <div class="field">
          <label>Email académique <span class="opt">(recommandé)</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-envelope"></i></span>
            <input type="email" id="e-email" name="email" placeholder="prenom.nom@etudiant.universite.fr" required />
          </div>
          <p class="helper">Utilisez votre adresse institutionnelle</p>
          <p class="error-msg" id="err-e-email">Adresse email invalide</p>
        </div>

        <!-- Université -->
        <div class="field">
          <label>Université <span class="req">*</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-university"></i></span>
            <select id="e-universite" name="universite" required onchange="loadEntites(this.value)">
              <option value="">Sélectionnez une université</option>
              <option value="UNSTIM">UNSTIM — Université des Sciences et Technologies</option>
              <option value="UA">UA — Université d'Abomey</option>
              <option value="UP">UP — Université de Parakou</option>
              <option value="UNA">UNA — Université Nationale d'Agriculture</option>
            </select>
          </div>
          <p class="error-msg" id="err-e-universite">Veuillez sélectionner votre université</p>
        </div>

        <!-- Entité dynamique -->
        <div class="field" id="field-entite" style="display:none;">
          <label>Entité (Faculté ou École) <span class="req">*</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-building"></i></span>
            <select id="e-entite" name="entite_id" required>
              <option value="">Choisissez d'abord l'université</option>
            </select>
          </div>
          <p class="error-msg" id="err-e-entite">Veuillez sélectionner votre entité</p>
        </div>

        <!-- Password -->
        <div class="field">
          <label>Mot de passe <span class="req">*</span></label>
          <div class="input-wrap has-icon has-icon-right">
            <span class="input-icon"><i class="fa fa-lock"></i></span>
            <input type="password" id="e-pwd" name="pwd" placeholder="8 caractères minimum" oninput="checkStrength(this,'e-str'); validatePasswordMatch()" required />
            <button class="input-icon-right" onclick="togglePwd('e-pwd',this)" type="button"><i class="fa fa-eye"></i></button>
          </div>
          <div class="strength-wrap">
            <div class="strength-bars" id="e-str"><span></span><span></span><span></span><span></span></div>
            <span class="strength-label">Force : </span>
          </div>
          <p class="error-msg" id="err-e-pwd">Minimum 8 caractères requis</p>
        </div>

        <div class="field">
          <label>Confirmer le mot de passe <span class="req">*</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-lock"></i></span>
            <input type="password" id="e-pwd2" name="pwd2" placeholder="Répétez votre mot de passe" oninput="validatePasswordMatch()" required />
          </div>
          <p class="error-msg" id="err-e-pwd2">Les mots de passe ne correspondent pas</p>
        </div>

        <!-- Informations personnelles -->
        <div class="form-divider"></div>
        <p class="form-section-label">Informations personnelles</p>

        <div class="field-row">
          <div class="field">
            <label>Prénom <span class="req">*</span></label>
            <input type="text" id="e-prenom" name="prenom" placeholder="Jean" required />
            <p class="error-msg" id="err-e-prenom">Ce champ est requis</p>
          </div>
          <div class="field">
            <label>Nom <span class="req">*</span></label>
            <input type="text" id="e-nom" name="nom" placeholder="Dupont" required />
            <p class="error-msg" id="err-e-nom">Ce champ est requis</p>
          </div>
        </div>

        <div class="form-divider"></div>
        <p class="form-section-label">Niveau d'étude</p>

        <div class="field">
          <label>Niveau d'étude <span class="req">*</span></label>
          <div class="input-wrap has-icon">
            <span class="input-icon"><i class="fa fa-book"></i></span>
            <select id="e-niveau" name="niveau" required>
              <option value="">Sélectionnez votre niveau</option>
              <option>L1</option><option>L2</option><option>L3</option>
              <option>M1</option><option>M2</option><option>Doctorat</option>
              <option>Autre</option>
            </select>
          </div>
          <p class="error-msg" id="err-e-niveau">Veuillez sélectionner votre niveau</p>
        </div>

        <div class="form-divider"></div>

        <!-- Terms -->
        <div class="field">
          <div class="checkbox-wrap">
            <input type="checkbox" id="e-terms" name="terms" required />
            <label for="e-terms">J'accepte les <a href="#">conditions d'utilisation</a> et la <a href="#">politique de confidentialité</a> <span class="req">*</span></label>
          </div>
          <p class="error-msg" id="err-e-terms">Vous devez accepter les conditions</p>
        </div>

        <button class="btn-submit" type="submit">
          <span id="e-btn-label">CRÉER MON COMPTE ÉTUDIANT</span>
          <span class="spinner" id="e-spinner"></span>
        </button>
      </form>

      <div class="success-box" id="success-etudiant" style="display:none;">
        <div class="success-icon"><i class="fa fa-check-circle"></i></div>
        <h3>Compte créé avec succès !</h3>
        <p id="success-text"></p>
      </div>

      <div class="form-bottom">
        <p>Déjà inscrit ? <a href="connexion.php">Se connecter</a></p>
      </div>
    </div>

    <div class="page-footer">
      <a href="#">Conditions d'utilisation</a> · 
      <a href="#">Politique de confidentialité</a> · 
      <a href="index.php">Accueil</a>
    </div>
  </div>

  <script>








    /* ── Password toggle ── */
    function togglePwd(id, btn) {
      const inp = document.getElementById(id);
      if (!inp) return;
      inp.type = inp.type === 'password' ? 'text' : 'password';
      btn.innerHTML = inp.type === 'password' 
        ? '<i class="fa fa-eye"></i>' 
        : '<i class="fa fa-eye-slash"></i>';
    }

    /* ── Password Strength ── */
    function checkStrength(input, barId) {
      const val = input.value;
      const bar = document.getElementById(barId);
      if (!bar) return;
      bar.className = 'strength-bars';
      if (!val) return;

      let score = 0;
      if (val.length >= 8) score++;
      if (/[A-Z]/.test(val)) score++;
      if (/[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;

      if (score > 0) bar.classList.add('s' + score);
    }

    /* ── Chargement dynamique des entités selon l’université ── */
    const entitesData = {
      "UNSTIM": [
        {id: 1, nom: "Faculté des Sciences et Technologies"},
        {id: 2, nom: "École Polytechnique"},
        {id: 3, nom: "Faculté de Médecine"}
      ],
      "UA": [
        {id: 4, nom: "Faculté des Lettres et Sciences Humaines"},
        {id: 5, nom: "Faculté de Droit"},
        {id: 6, nom: "École Normale Supérieure"}
      ],
      "UP": [
        {id: 7, nom: "Faculté des Sciences Agronomiques"},
        {id: 8, nom: "Faculté de Médecine"},
        {id: 9, nom: "École Supérieure de Commerce"}
      ],
      "UNA": [
        {id: 10, nom: "Faculté d'Agriculture"},
        {id: 11, nom: "Faculté des Sciences Économiques"}
      ]
    };

    function loadEntites(univCode) {
      const field = document.getElementById('field-entite');
      const select = document.getElementById('e-entite');
      select.innerHTML = '<option value="">Sélectionnez votre entité</option>';

      if (univCode && entitesData[univCode]) {
        field.style.display = 'block';
        entitesData[univCode].forEach(ent => {
          const opt = document.createElement('option');
          opt.value = ent.id;
          opt.textContent = ent.nom;
          select.appendChild(opt);
        });
      } else {
        field.style.display = 'none';
      }
    }

    /* ── Validation avec highlight rouge ── */
    function showFieldError(id, show) {
      const err = document.getElementById('err-' + id);
      const inp = document.getElementById(id);
      if (err) err.classList.toggle('show', show);
      if (inp) inp.classList.toggle('error', show);
    }

    function validateEtudiant() {
      let valid = true;

      // Email
      if (!document.getElementById('e-email').value.trim()) {
        showFieldError('e-email', true); valid = false;
      } else showFieldError('e-email', false);

      // Université
      if (!document.getElementById('e-universite').value) {
        showFieldError('e-universite', true); valid = false;
      } else showFieldError('e-universite', false);

      // Entité
      if (!document.getElementById('e-entite').value) {
        showFieldError('e-entite', true); valid = false;
      } else showFieldError('e-entite', false);

      // Mot de passe
      const pwd = document.getElementById('e-pwd').value;
      if (pwd.length < 8) {
        showFieldError('e-pwd', true); valid = false;
      } else showFieldError('e-pwd', false);

      // Confirmation mot de passe
      const pwd2 = document.getElementById('e-pwd2').value;
      if (pwd !== pwd2 || !pwd2) {
        showFieldError('e-pwd2', true); valid = false;
      } else showFieldError('e-pwd2', false);

      // Prénom, Nom, Niveau
      ['e-prenom', 'e-nom', 'e-niveau'].forEach(id => {
        if (!document.getElementById(id).value.trim()) {
          showFieldError(id, true); valid = false;
        } else showFieldError(id, false);
      });

      // Terms
      if (!document.getElementById('e-terms').checked) {
        showFieldError('e-terms', true); valid = false;
      } else showFieldError('e-terms', false);

      return valid;
    }

    /* ── Soumission AJAX ── */
    document.getElementById('form-etudiant').addEventListener('submit', async function(e) {
      e.preventDefault();
      const globalError = document.getElementById('global-error');

      if (!validateEtudiant()) {
        globalError.style.display = 'block';
        globalError.innerHTML = '❌ Veuillez corriger les champs en rouge';
        return;
      }

      const btn = this.querySelector('.btn-submit');
      const label = document.getElementById('e-btn-label');
      const spinner = document.getElementById('e-spinner');

      label.style.display = 'none';
      spinner.style.display = 'block';
      btn.disabled = true;
      globalError.style.display = 'none';

      const formData = new FormData(this);

      try {
        const res = await fetch('assets/php/inscription-traitement.php', {
          method: 'POST',
          body: formData
        });
        const data = await res.json();

        if (data.success) {
          document.getElementById('form-etudiant').style.display = 'none';
          document.getElementById('success-etudiant').style.display = 'block';
          document.getElementById('success-text').innerHTML = data.message;
        } else {
          globalError.style.display = 'block';
          globalError.innerHTML = data.message;
        }
      } catch (err) {
        globalError.style.display = 'block';
        globalError.innerHTML = 'Erreur de connexion au serveur. Réessayez.';
      } finally {
        label.style.display = 'inline';
        spinner.style.display = 'none';
        btn.disabled = false;
      }
    });

    /* ── Initialisation ── */
    window.onload = () => {
      document.getElementById('e-universite').dispatchEvent(new Event('change'));
    };
  </script>
</body>
</html>