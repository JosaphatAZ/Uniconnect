<?php
// =============================================
// inscription-traitement.php — VERSION FINALE
// Utilise entite_id + validation propre
// =============================================
ini_set('pcre.jit', 0);
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/email-config.php';

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

// ================== RÉCUPÉRATION ==================
$email       = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$universite  = trim($_POST['universite'] ?? '');
$entite_id   = (int) ($_POST['entite_id'] ?? 0);
$prenom      = trim($_POST['prenom'] ?? '');
$nom         = trim($_POST['nom'] ?? '');
$niveau      = trim($_POST['niveau'] ?? '');
$pwd         = $_POST['pwd'] ?? '';
$pwd2        = $_POST['pwd2'] ?? '';
$terms       = isset($_POST['terms']);

$errors = [];

// Validation
if (!preg_match('/^[^@]+@(gmail|googlemail)\.com$/i', $email)) {
    $errors[] = "L'adresse email doit être une vraie adresse Gmail (@gmail.com)";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Format d'email invalide";
if (empty($universite)) $errors[] = "Université obligatoire";
if ($entite_id <= 0) $errors[] = "Veuillez sélectionner une entité (Faculté ou École)";
if (strlen($pwd) < 8) $errors[] = "Mot de passe : minimum 8 caractères";
if ($pwd !== $pwd2) $errors[] = "Les mots de passe ne correspondent pas";
if (empty($prenom) || empty($nom) || empty($niveau)) $errors[] = "Prénom, nom et niveau d'étude sont obligatoires";
if (!$terms) $errors[] = "Vous devez accepter les conditions";

if (!empty($errors)) {
    $response['message'] = implode("<br>", $errors);
    echo json_encode($response);
    exit();
}

// ================== INSERTION ==================
$token = bin2hex(random_bytes(32));
$password_hash = password_hash($pwd, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO etudiant (
                email, universite, entite_id, statut,
                password_hash, nom, prenom, niveau_etude,
                email_verifie, token_verification, date_inscription
            ) VALUES (
                :email, :universite, :entite_id, 'en_attente',
                :password_hash, :nom, :prenom, :niveau_etude,
                0, :token, NOW()
            )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email'         => $email,
        ':universite'    => $universite,
        ':entite_id'     => $entite_id,
        ':password_hash' => $password_hash,
        ':nom'           => $nom,
        ':prenom'        => $prenom,
        ':niveau_etude'  => $niveau,
        ':token'         => $token
    ]);

    // ================== ENVOI EMAIL ==================
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;

    $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
    $mail->addAddress($email, $prenom . ' ' . $nom);
    $mail->isHTML(true);
    $mail->Subject = "Confirmez votre compte UniConnect";
    $mail->Body = '
    <div style="background:#f7f6ff;padding:40px;font-family:Inter,sans-serif;">
        <div style="max-width:600px;margin:auto;background:white;border-radius:24px;padding:40px;box-shadow:0 10px 40px rgba(124,58,237,0.15);">
            <h2 style="color:#7c3aed;">Bienvenue sur UniConnect !</h2>
            <p>Bonjour <strong>' . htmlspecialchars($prenom) . '</strong>,</p>
            <p>Cliquez sur le bouton ci-dessous :</p>
            <a href="http://' . $_SERVER['HTTP_HOST'] . '/Hack_To_The_Future_HACKBYIFRI_2026/UniConnect/verification.php?token=' . $token . '" 
               style="display:inline-block;background:linear-gradient(135deg,#7c3aed,#4f46e5);color:white;padding:16px 40px;border-radius:12px;text-decoration:none;font-weight:700;">VÉRIFIER MON COMPTE</a>
            <p style="color:#6b7280;font-size:13px;">Le lien expire dans 24 heures.</p>
        </div>
    </div>';

    $mail->send();

    $response['success'] = true;
    $response['message'] = "<i class='fas fa-check-circle' style='color:#10b981;'></i> Compte créé avec succès !<br>Un email de vérification a été envoyé à <strong>" . htmlspecialchars($email) . "</strong>";

} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        $response['message'] = "Cet email est déjà utilisé.<br><a href='connexion.php' style='color:#c4b5fd;'>Se connecter</a>";
    } else {
        $response['message'] = "Erreur technique. Veuillez réessayer.";
    }
} catch (Exception $e) {
    $response['message'] = "Compte créé mais l'email n'a pas pu être envoyé.";
}

echo json_encode($response);
exit();
?>