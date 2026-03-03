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
  <title>UniConnect — Connexion</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="icon" href="assets/img/logo.png" type="image/png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/forms-con.css">
</head>

<body>

  <!-- ═══ TOPBAR ═══ -->
<?php include 'includes/header.php'; ?>

  <div class="main">
    <div class="login-wrap">

      <div class="page-header">
        <h1>Bon retour sur <span>UniConnect</span></h1>
        <p>Connectez-vous pour accéder à votre espace</p>
      </div>

      <div class="tabs-wrap">
        <button class="tab-btn active" id="tab-etudiant">
          <span class="t-icon"><i class="fa fa-user-graduate"></i></span>
          <span class="t-label">Étudiant</span>
        </button>
      </div>

      <div class="card active" id="card-etudiant">
        <div class="card-header">
          <span class="card-icon"><i class="fa fa-user-graduate"></i></span>
          <div class="card-title">
            <h2>Espace de Connexion</h2>
            <p>Accédez à vos ressources Universitaires</p>
          </div>
        </div>

        <!-- Message d'erreur global -->
        <div id="global-error" style="display:none; background:#4c1d95; color:#f8fafc; padding:16px 22px; border-radius:12px; margin:20px 0; border-left:5px solid #e11d48; font-weight:600; box-shadow:0 4px 15px rgba(225,29,72,0.25);">
        </div>

        <div class="field">
          <label for="e-email">Adresse e-mail</label>
          <div class="input-wrap">
            <span class="input-icon"><i class="fa fa-envelope"></i></span>
            <input type="email" id="e-email" name="email" placeholder="prenomnom@gmail.com" autocomplete="email" required />
          </div>
          <p class="error-msg" id="err-e-email">Adresse email invalide</p>
        </div>

        <div class="field">
          <label for="e-pwd">Mot de passe</label>
          <div class="input-wrap">
            <span class="input-icon"><i class="fa fa-lock"></i></span>
            <input type="password" id="e-pwd" name="pwd" placeholder="Votre mot de passe" autocomplete="current-password" class="has-right" required />
            <button class="input-eye" onclick="togglePwd('e-pwd',this)" type="button"><i class="fa fa-eye"></i></button>
          </div>
          <p class="error-msg" id="err-e-pwd">Ce champ est requis</p>
        </div>

        <div class="row-between">
          <div class="checkbox-wrap">
            <input type="checkbox" id="e-remember" name="remember" />
            <label for="e-remember">Se souvenir de moi</label>
          </div>
          <a href="#" class="link" onclick="openModal();return false;">Mot de passe oublié ?</a>
        </div>

        <button class="btn-submit" id="btn-etudiant" type="button" onclick="doLogin()">
          <span id="e-lbl">Se connecter</span>
          <span class="spinner" id="e-spin"></span>
        </button>

        <div class="card-footer">
          <p>Pas encore de compte ? <a href="inscription.php">S'inscrire gratuitement</a></p>
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
  </div>

  <!-- ═══ FORGOT PASSWORD MODAL ═══ -->
  <div class="modal-overlay" id="modal-overlay" onclick="handleOverlayClick(event)">
    <div class="modal">
      <button class="modal-close" onclick="closeModal()">✕</button>

      <div id="modal-form-wrap">
        <h3><i class="fa fa-key"></i> Mot de passe oublié</h3>
        <p>Saisissez votre adresse e-mail. Nous vous enverrons un lien pour réinitialiser votre mot de passe.</p>

        <div class="field">
          <label for="reset-email">Adresse e-mail</label>
          <div class="input-wrap">
            <span class="input-icon"><i class="fa fa-envelope"></i></span>
            <input type="email" id="reset-email" placeholder="votre@email.fr" />
          </div>
          <p class="error-msg" id="err-reset">Adresse email invalide</p>
        </div>

        <button class="btn-submit" onclick="doReset()" id="reset-btn" style="margin-top:8px">
          <span id="reset-lbl">Envoyer le lien</span>
          <span class="spinner" id="reset-spin"></span>
        </button>
      </div>

      <div class="modal-success" id="modal-success">
        <div class="s-icon"><i class="fa fa-envelope-open-text"></i></div>
        <h4>Email envoyé !</h4>
        <p>Un lien de réinitialisation a été envoyé. Vérifiez aussi vos spams.</p>
        <button class="btn-submit" onclick="closeModal()" style="margin-top:20px; padding:12px">
          Fermer
        </button>
      </div>
    </div>
  </div>

  <script>
    /* ── Tabs ── */


    /* ── Password toggle ── */
    function togglePwd(id, btn) {
      const inp = document.getElementById(id);
      inp.type = inp.type === 'password' ? 'text' : 'password';
      btn.innerHTML = inp.type === 'password' ? '<i class="fa fa-eye"></i>' : '<i class="fa fa-eye-slash"></i>';
    }

    /* ── Validation ── */
    function isEmail(v) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
    }

    function setErr(id, show) {
      document.getElementById('err-' + id)?.classList.toggle('show', show);
      document.getElementById(id)?.classList.toggle('error', show);
    }

    /* ── Login handler ── */
    function doLogin(type) {
      const p = type === 'etudiant' ? 'e' : 'p';
      const em = document.getElementById(p + '-email').value.trim();
      const pw = document.getElementById(p + '-pwd').value;
      let ok = true;

      document.getElementById('alert-' + type).classList.remove('show');
      if (!isEmail(em)) {
        setErr(p + '-email', true);
        ok = false;
      } else setErr(p + '-email', false);
      if (!pw) {
        setErr(p + '-pwd', true);
        ok = false;
      } else setErr(p + '-pwd', false);
      if (!ok) return;

      const btn = document.getElementById('btn-etudiant');
      const lbl = document.getElementById('e-lbl');
      const spinner = document.getElementById('e-spin');

      lbl.style.display = 'none';
      spinner.style.display = 'block';
      btn.disabled = true;

      const formData = new FormData();
      formData.append('email', document.getElementById('e-email').value);
      formData.append('pwd', document.getElementById('e-pwd').value);
      formData.append('remember', document.getElementById('e-remember').checked ? '1' : '0');

      fetch('assets/php/login-traitement.php', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          window.location.href = data.redirect;   // Redirection uniquement si succès
        } else {
          lbl.textContent = 'Se connecter';
          lbl.style.display = arrow.style.display = 'block';
          btn.disabled = false;
          document.getElementById('alert-' + type).classList.add('show');
          document.getElementById(p + '-pwd').classList.add('error');
        }
      }, 1700);
      window.location.href = 'etudiant/index.php';
    }

    /* ── Modal ── */
    function openModal() {
      const overlay = document.getElementById('modal-overlay');
      overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
      document.getElementById('modal-form-wrap').style.display = 'block';
      document.getElementById('modal-success').classList.remove('show');
      document.getElementById('reset-email').value = '';
      document.getElementById('err-reset').classList.remove('show');
      document.getElementById('reset-email').classList.remove('error');
      const btn = document.getElementById('reset-btn');
      btn.disabled = false;
      document.getElementById('reset-lbl').style.display = 'block';
      document.getElementById('reset-spin').style.display = 'none';
    }

    function closeModal() {
      document.getElementById('modal-overlay').classList.remove('open');
      document.body.style.overflow = '';
    }

    function handleOverlayClick(e) {
      if (e.target === document.getElementById('modal-overlay')) closeModal();
    }

    function doReset() {
      const email = document.getElementById('reset-email').value.trim();
      if (!isEmail(email)) {
        document.getElementById('err-reset').classList.add('show');
        document.getElementById('reset-email').classList.add('error');
        return;
      }
      document.getElementById('err-reset').classList.remove('show');
      document.getElementById('reset-email').classList.remove('error');

      const btn = document.getElementById('reset-btn');
      document.getElementById('reset-lbl').style.display = 'none';
      document.getElementById('reset-spin').style.display = 'block';
      btn.disabled = true;

      setTimeout(() => {
        document.getElementById('modal-form-wrap').style.display = 'none';
        document.getElementById('modal-success').classList.add('show');
      }, 1500);
    }

    function isEmail(v) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
    }

    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') closeModal();
    });
  </script>
</body>

</html>