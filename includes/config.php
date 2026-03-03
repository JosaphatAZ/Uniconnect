<?php
// includes/config.php — UniConnect PDO (silencieux)
$host = 'localhost';
$dbname = 'UniConnect';
$user = 'root';
$pass = 'root';          // change si ton mot de passe MySQL est différent

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // AUCUN echo ici → sinon les redirections cassent
} catch (PDOException $e) {
    die("Erreur DB : " . $e->getMessage());
}
?>