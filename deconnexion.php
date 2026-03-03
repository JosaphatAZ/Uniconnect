<!DOCTYPE html>
<html lang="fr">
<?php

  session_start();
  session_destroy();

?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Déconnexion — UniConnect</title>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: #f8f7ff;
    }

    .logout-wrap {
      width: 100%;
      max-width: 440px;
      padding: 24px;
      animation: fadeUp .35s ease both;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(18px)
      }

      to {
        opacity: 1;
        transform: translateY(0)
      }
    }

    .logout-card {
      background: #fff;
      border: 1px solid #e8e8ec;
      border-radius: 22px;
      padding: 48px 40px;
      text-align: center;
      box-shadow: 0 10px 48px rgba(124, 58, 237, .08);
    }

    .logout-logo {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      text-decoration: none;
      margin-bottom: 32px;
    }

    .logout-logo-icon {
      width: 34px;
      height: 34px;
      border-radius: 9px;
      overflow: hidden;
    }

    .logout-logo-icon img {
      width: 100%;
      display: block;
    }

    .logout-logo-text {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1.1rem;
      color: #1a1a2e;
    }

    .logout-emoji {
      font-size: 52px;
      line-height: 1;
      margin-bottom: 18px;
      display: block;
    }

    .logout-title {
      font-family: 'Fraunces', serif;
      font-weight: 700;
      font-size: 1.65rem;
      color: #1a1a2e;
      margin-bottom: 8px;
    }

    .logout-sub {
      font-size: .92rem;
      color: #6b7280;
      line-height: 1.65;
      margin-bottom: 32px;
    }

    .btn-deconnect {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 9px;
      width: 100%;
      padding: 13px;
      border-radius: 11px;
      background: #dc2626;
      color: #fff;
      border: none;
      font-family: 'DM Sans', sans-serif;
      font-size: .95rem;
      font-weight: 700;
      cursor: pointer;
      margin-bottom: 12px;
      transition: background .2s, transform .15s;
    }

    .btn-deconnect:hover {
      background: #b91c1c;
      transform: translateY(-1px);
    }

    .btn-cancel {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 9px;
      width: 100%;
      padding: 13px;
      border-radius: 11px;
      background: transparent;
      color: #374151;
      border: 1.5px solid #e5e7eb;
      font-family: 'DM Sans', sans-serif;
      font-size: .95rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      transition: border-color .2s, background .2s;
    }

    .btn-cancel:hover {
      border-color: #9ca3af;
      background: #f9fafb;
    }

    /* État succès */
    .success-card {
      display: none;
      text-align: center;
    }

    .countdown-bar {
      height: 4px;
      background: #ede9fe;
      border-radius: 4px;
      margin-top: 22px;
      overflow: hidden;
    }

    .countdown-fill {
      height: 100%;
      width: 100%;
      background: linear-gradient(90deg, #7c3aed, #4f46e5);
      border-radius: 4px;
      animation: shrink 3s linear forwards;
    }

    @keyframes shrink {
      from {
        width: 100%
      }

      to {
        width: 0
      }
    }

    .back-link {
      display: inline-block;
      margin-top: 18px;
      font-size: .85rem;
      color: #7c3aed;
      font-weight: 600;
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
    }

    @media(max-width:480px) {
      .logout-card {
        padding: 36px 24px;
      }
    }
  </style>
</head>

<body>
  <div class="logout-wrap">

    <!-- Confirmation -->
    <div class="logout-card" id="confirmCard">
      <a href="index.php" class="logout-logo">
        <div class="logout-logo-icon"><img src="assets/img/logo.png" alt="UniConnect"></div>
        <span class="logout-logo-text">UniConnect</span>
      </a>
      <span class="logout-emoji">👋</span>
      <div class="logout-title">Vous déconnecter ?</div>
      <p class="logout-sub">Vous serez redirigé vers la page d'accueil.<br>Toutes vos données sont sauvegardées.</p>
      <button class="btn-deconnect" onclick="confirmer()">
        <i class="fa-solid fa-right-from-bracket"></i> Oui, me déconnecter
      </button>
      <a href="javascript:history.back()" class="btn-cancel">
        <i class="fa-solid fa-arrow-left"></i> Annuler et revenir
      </a>
    </div>

    <!-- Succès -->
    <div class="logout-card success-card" id="successCard">
      <a href="index.php" class="logout-logo">
        <div class="logout-logo-icon"><img src="assets/img/logo.png" alt="UniConnect"></div>
        <span class="logout-logo-text">UniConnect</span>
      </a>
      <span class="logout-emoji">✅</span>
      <div class="logout-title">Déconnexion réussie</div>
      <p class="logout-sub">Vous êtes bien déconnecté.<br>Redirection dans <strong id="cpt">3</strong>s…</p>
      <div class="countdown-bar">
        <div class="countdown-fill"></div>
      </div>
      <a href="index.php" class="back-link"><i class="fa-solid fa-house"></i> Aller à l'accueil maintenant</a>
    </div>

  </div>
  <script>
    function confirmer() {
      document.getElementById('confirmCard').style.display = 'none';
      const sc = document.getElementById('successCard');
      sc.style.display = 'block';
      let n = 3;
      const el = document.getElementById('cpt');
      const t = setInterval(() => {
        n--;
        el.textContent = n;
        if (n <= 0) {
          clearInterval(t);
          window.location.href = 'index.php';
        }
      }, 1000);
    }
  </script>
</body>

</html>