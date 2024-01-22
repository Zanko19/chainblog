<?php
session_start();

// Vérifier si l'utilisateur est connecté (vous pouvez ajuster cela en fonction de votre système d'authentification)
if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour accéder à vos messages.";
    exit;
}

try {
    // Établir la connexion à la base de données (ajustez les paramètres de connexion)
    $pdo = new PDO('mysql:host=localhost;dbname=blogchain', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer l'ID de l'utilisateur connecté à partir de la session
    $userId = $_SESSION['user_id'];

    // Requête pour sélectionner les messages de l'utilisateur connecté
    $sql = "SELECT * FROM messages WHERE sender_id = :userId OR receiver_id = :userId ORDER BY sent_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Requête pour obtenir les informations de l'utilisateur correspondant au nom d'utilisateur
    $sqlUserInfo = "SELECT * FROM users WHERE username = :username";
    $stmtUserInfo = $pdo->prepare($sqlUserInfo);

} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

?>