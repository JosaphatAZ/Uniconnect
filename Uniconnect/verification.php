<?php
session_start();
require_once 'includes/config.php';

$token   = $_GET['token'] ?? '';
$success = false;
$message = '';

if (empty($token)) {
    $success = false;
    $message = "Aucun token n'a été fourni.<br>Veuillez utiliser le lien complet reçu par email.";
} else {
    try {
        $stmt = $pdo->prepare("UPDATE etudiant 
                               SET email_verifie = 1, 
                                   statut = 'actif', 
                                   token_verification = NULL,
                                   date_verification = NOW()
                               WHERE token_verification = ? AND email_verifie = 0");
        $stmt->execute([$token]);

        if ($stmt->rowCount() > 0) {
            $success = true;
            $message = "Votre compte a été activé avec succès !<br>Bienvenue sur UniConnect 🎉";
        } else {
            $success = false;
            $message = "Ce lien a déjà été utilisé ou est expiré.<br>Si vous n'avez pas encore activé votre compte, veuillez vous réinscrire.";
        }
    } catch (PDOException $e) {
        $success = false;
        $message = "Erreur technique lors de la vérification.<br>Veuillez réessayer ou contacter le support.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UniConnect — Vérification du compte</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,700;1,9..144,400&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/forms-insc.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="icon" href="assets/img/logo.png" type="image/png"/>
  <style>
    .verif-card {
      background: var(--card-bg, #1e2133);
      border: 1px solid var(--border, #2a2e4a);
      border-radius: 24px;
      padding: 80px 50px;
      text-align: center;
      box-shadow: 0 20px 60px rgba(0,0,0,0.4);
      max-width: 560px;
      margin: 60px auto;
    }
    .verif-icon { font-size: 110px; margin-bottom: 30px; }
    .verif-title { 
      font-family: 'Fraunces', serif; 
      font-size: 34px; 
      margin-bottom: 20px;
      color: var(--text);           /* Adapté au thème (clair/sombre) */
    }
  </style>
</head>
<body>
  <?php include 'includes/header.php'; ?>

  <div class="page-header">
    <h1>Vérification <span>UniConnect</span></h1>
    <p>Activation de votre compte étudiant</p>
  </div>

  <div class="wrapper">
    <div class="verif-card">

      <?php if ($success): ?>
        <div class="verif-icon" style="color:#16a34a;">
          <i class="fa fa-check-circle"></i>
        </div>
        <h2 class="verif-title">Compte activé !</h2>
        <p style="font-size:18px; color:#4f46e5; line-height:1.7;"><?= $message ?></p>
        
        <a href="connexion.php" class="btn-submit" style="margin-top:50px; padding:18px 70px; font-size:17px;">
          SE CONNECTER MAINTENANT
        </a>
      <?php else: ?>
        <div class="verif-icon" style="color:#ef4444;">
          <i class="fa fa-times-circle"></i>
        </div>
        <h2 class="verif-title">Lien invalide</h2>
        <p style="font-size:17.5px; color:#6b7280; max-width:460px; margin:25px auto 50px; line-height:1.7;">
          <?= $message ?>
        </p>
        
        <a href="inscription.php" class="btn-submit" style="background:#ef4444; padding:18px 60px;">
          Retour à l’inscription
        </a>
      <?php endif; ?>

    </div>

    <div class="page-footer">
      <a href="index.php">Accueil</a> · 
      <a href="#">Conditions d'utilisation</a> · 
      <a href="#">Contact</a>
    </div>
  </div>
</body>
</html>