<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    include 'db_connect.php'; // Inclure le fichier de connexion à la base de données

    // Requête SQL pour obtenir les 5 posts les plus likés
    $stmt = $pdo->query('SELECT * FROM post ORDER BY likes DESC, ID DESC LIMIT 5'); 
    $topPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $json_data = json_encode([
        'status' => 'success',
        'data' => $topPosts
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?><?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    include '../back/db_connect.php'; // Inclure le fichier de connexion à la base de données

    // Requête SQL pour obtenir les 5 posts les plus likés
    $stmt = $pdo->query('SELECT * FROM post ORDER BY likes DESC, ID DESC LIMIT 5'); 
    $topPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Gérer l'exception
    echo "Erreur: " . $e->getMessage();
    exit;
}
?>

