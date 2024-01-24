<?php
header('Content-Type: application/json');

try {
    include 'db_connect.php'; // Inclure le fichier de connexion à la base de données

    // Requête SQL pour obtenir les 5 posts les plus likés
    $stmt = $pdo->query('SELECT * FROM post ORDER BY likes DESC LIMIT 5'); 
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $json_data = json_encode([
        'status' => 'success',
        'data' => $posts
    ]);

    echo $json_data;

} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>
