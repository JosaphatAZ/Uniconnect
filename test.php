<?php
require_once 'includes/email-config.php';
require 'assets/PHPMailer/src/Exception.php';
require 'assets/PHPMailer/src/PHPMailer.php';
require 'assets/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);
try {
  $mail->isSMTP();
  $mail->Host       = SMTP_HOST;
  $mail->SMTPAuth   = true;
  $mail->Username   = SMTP_USERNAME;
  $mail->Password   = SMTP_PASSWORD;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = SMTP_PORT;

    $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
    $mail->addAddress("farelahdk@gmail.com");  // Email de l'entité (remplace par $email pour envoyer à l'utilisateur)
    $mail->isHTML(true);
    $mail->Subject = "Demande d'inscription UniConnect reçue";
    $mail->Body = '
    <div style="background:#f7f6ff;padding:40px;font-family:Inter,sans-serif;">
        <div style="max-width:600px;margin:auto;background:white;border-radius:24px;padding:40px;box-shadow:0 10px 40px rgba(124,58,237,0.15);">
            <h2 style="color:#7c3aed;">Merci pour votre demande !</h2>
            <p>Bonjour,</p>
            <p>Votre inscription pour <strong>' . htmlspecialchars($nom) . '</strong> (' . htmlspecialchars($type) . ') a bien été reçue.</p>
            <p>Nous la traiterons dans les <strong>48h ouvrées</strong> et vous enverrons un email dès validation de votre compte.</p>
            <p style="color:#6b7280;font-size:13px;">Cordialement,<br>L’équipe UniConnect</p>
        </div>
    </div>';

  $mail->send();
  echo "Email test envoyé avec succès !";

} catch (Exception $e) {
  echo "Erreur : " . $mail->ErrorInfo;
}
?>