<?php
session_start();

// Assurez-vous que l'utilisateur est connecté et que son ID de session est disponible
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Vous devez être connecté pour voir les notifications.']);
    exit;
}

$userId = $_SESSION['user_id']; // L'ID de l'utilisateur actuellement connecté

include 'db_connect.php';

try {
    // Préparer et exécuter la requête pour récupérer les notifications de l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$userId]);

    $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier s'il y a des notifications
    if (count($notifications) > 0) {
        echo json_encode(['status' => 'success', 'notifications' => $notifications]);
    } else {
        echo json_encode(['status' => 'info', 'message' => 'Aucune notification pour le moment.']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erreur lors de la récupération des notifications : ' . $e->getMessage()]);
}

// Fermer la connexion à la base de données
$pdo = null;
?>
