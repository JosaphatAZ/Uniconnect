<?php
header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../../includes/config.php';

// Vérification session entité (ajuste selon ton système de login)
if (!isset($_SESSION['entite_id'])) {
    echo json_encode(['success' => false, 'message' => 'Session expirée. Veuillez vous reconnecter.']);
    exit();
}

$entite_id = $_SESSION['entite_id'];

$titre       = trim($_POST['titre'] ?? '');
$contenu     = trim($_POST['contenu'] ?? '');
$categorie   = trim($_POST['categorie'] ?? 'Vie');
$visibilite  = trim($_POST['visibilité'] ?? 'private');
$brouillon   = (int) ($_POST['brouillon'] ?? 0);

$errors = [];
if (empty($titre)) $errors[] = "Le titre est obligatoire";
if (empty($contenu)) $errors[] = "Le contenu est obligatoire";
if (empty($categorie)) $errors[] = "Veuillez choisir une catégorie";

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode("<br>", $errors)]);
    exit();
}

// Gestion de l'image
$image_path = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $upload_dir = '../uploads/actualites/';
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

    $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($file_ext, $allowed)) {
        echo json_encode(['success' => false, 'message' => "Format d'image non autorisé (JPG, PNG, WEBP)"]);
        exit();
    }

    $new_name = uniqid('act_') . '.' . $file_ext;
    $target = $upload_dir . $new_name;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $image_path = 'uploads/actualites/' . $new_name;
    } else {
        echo json_encode(['success' => false, 'message' => "Échec de l'upload de l'image"]);
        exit();
    }
}

try {
    $sql = "INSERT INTO actualites (titre, contenu, categorie, image, visibilité, brouillon, date_create, date_update) 
            VALUES (:titre, :contenu, :categorie, :image, :visibilite, :brouillon, NOW(), NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titre'      => $titre,
        ':contenu'    => $contenu,
        ':categorie'  => $categorie,
        ':image'      => $image_path,
        ':visibilite' => $visibilite,
        ':brouillon'  => $brouillon
    ]);

    echo json_encode([
        'success' => true,
        'message' => $brouillon ? "Brouillon enregistré avec succès !" : "Actualité publiée avec succès !"
    ]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => "Erreur base de données : " . $e->getMessage()]);
}
?>