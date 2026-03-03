<?php
header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../../includes/config.php';

$response = ['success' => false, 'message' => '', 'redirect' => ''];

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $response['message'] = "Méthode non autorisée";
    echo json_encode($response);
    exit();
}

$email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
$pwd   = $_POST['pwd'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($pwd)) {
    $response['message'] = "Email ou mot de passe incorrect.";
    echo json_encode($response);
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT id, password_hash, email_verifie, statut FROM etudiant WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($pwd, $user['password_hash'])) {
        $response['message'] = "Email ou mot de passe incorrect.";
        echo json_encode($response);
        exit();
    }

    if ($user['email_verifie'] != 1) {
        $response['message'] = "Votre compte n'est pas encore vérifié.<br>Vérifiez votre boîte email.";
        echo json_encode($response);
        exit();
    }

    if ($user['statut'] !== 'actif') {
        $response['message'] = "Votre compte est inactif ou suspendu.";
        echo json_encode($response);
        exit();
    }

    // Connexion réussie
    $_SESSION['etudiant_id'] = $user['id'];
    $response['success'] = true;
    $response['redirect'] = 'dashboard-etudiant.php';
    $response['message'] = "Connexion réussie !";
} catch (PDOException $e) {
    $response['message'] = "Erreur technique. Réessayez plus tard.";
}

echo json_encode($response);
exit();
