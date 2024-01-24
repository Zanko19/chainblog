<?php

header('Content-Type: application/json'); // Définir le type de contenu comme JSON

try {
    include 'db_connect.php'; // Inclure le fichier de connexion à la base de données

    $stmt = $pdo->query('SELECT * FROM post ORDER BY likes DESC LIMIT 5'); 
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'status' => 'success',
        'data' => $posts
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
