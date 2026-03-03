<?php
// =============================================
// inscription-entite-traitement.php — VERSION FINALE
// Gestion complète avec universite + type (ecole/faculte)
// =============================================
ini_set('pcre.jit', 0);
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../../includes/config.php';
require_once '../../includes/email-config.php';

// PHPMailer (version manuelle)
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $response['message'] = "Méthode non autorisée";
    echo json_encode($response);
    exit();
}

// Récupération des champs
$universite = trim($_POST['ec-universite'] ?? '');
$type       = trim($_POST['ec-type'] ?? '');           // faculte ou ecole
$nom        = trim($_POST['ec-nom'] ?? '');
$sigle      = trim($_POST['ec-sigle'] ?? '');
$email      = filter_var(trim($_POST['ec-email'] ?? ''), FILTER_SANITIZE_EMAIL);
$pwd        = $_POST['ec-pwd'] ?? '';
$pwd2       = $_POST['ec-pwd2'] ?? '';
$site_web   = trim($_POST['ec-web'] ?? '');
$telephone  = trim($_POST['ec-tel'] ?? '');

$errors = [];
if (empty($universite)) $errors[] = "Veuillez sélectionner une université";
if (!in_array($type, ['faculte', 'ecole'])) $errors[] = "Veuillez choisir le type d'entité (École ou Faculté)";
if (empty($nom)) $errors[] = "Nom de l'établissement obligatoire";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Adresse email invalide";
if (strlen($pwd) < 8) $errors[] = "Mot de passe : 8 caractères minimum";
if ($pwd !== $pwd2) $errors[] = "Les mots de passe ne correspondent pas";

if (!empty($errors)) {
    $response['message'] = implode("<br>", $errors);
    echo json_encode($response);
    exit();
}

$password_hash = password_hash($pwd, PASSWORD_DEFAULT);
$token = bin2hex(random_bytes(32));

try {
    $sql = "INSERT INTO entite (
                universite, type, nom, sigle, email, password_hash,
                site_web, telephone, statut, token_verification, date_inscription
            ) VALUES (
                :universite, :type, :nom, :sigle, :email, :password_hash,
                :site_web, :telephone, 'en_attente', :token, NOW()
            )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':universite'    => $universite,
        ':type'          => $type,
        ':nom'           => $nom,
        ':sigle'         => $sigle,
        ':email'         => $email,
        ':password_hash' => $password_hash,
        ':site_web'      => $site_web,
        ':telephone'     => $telephone,
        ':token'         => $token
    ]);

    // Envoi email de confirmation
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;

    $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
    $mail->addAddress($email);
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

    $response['success'] = true;
    $response['message'] = "<i class='fa fa-check-circle'></i> Demande envoyée avec succès !<br>Nous traiterons votre inscription sous 48h ouvrées.";

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        $response['message'] = "Cet email est déjà utilisé par un autre établissement.";
    } else {
        $response['message'] = "Erreur technique. Veuillez réessayer plus tard.";
    }
} catch (Exception $e) {
    $response['message'] = "Demande enregistrée mais l'email de confirmation n'a pas pu être envoyé.";
}

echo json_encode($response);
exit();
?>