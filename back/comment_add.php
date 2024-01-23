<?php
header('Content-Type: application/json');
session_start();

include 'db_connect.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
    exit;
}

if (!isset($input['postID']) || !isset($input['commentBody'])) {
    echo json_encode(['status' => 'error', 'message' => 'postID and commentBody are required']);
    exit;
}

$postID = $input['postID'];
$commentBody = $input['commentBody'];
$userID = $_SESSION['user_id'];
$username = $_SESSION['username']; // Récupérer le nom d'utilisateur de la session

if (!isset($userID) || empty($userID) || !isset($username) || empty($username)) {
    echo json_encode(['status' => 'error', 'message' => 'User not authenticated']);
    exit;
}

try {
    // Démarrez une transaction
    $pdo->beginTransaction();

    // Insertion du commentaire
    $stmt = $pdo->prepare("INSERT INTO post_comments (post_id, user_id, username, comments_body, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$postID, $userID, $username, $commentBody]);

    // Définissez le type d'action et le nom d'utilisateur pour la notification
    $actionType = 'post_comment';
    $actionUsername = $username;  // ou un autre nom d'utilisateur pertinent pour la notification

    // Insertion de la notification
    $stmt_notification = $pdo->prepare("INSERT INTO notifications (user_id, action_type, action_username, created_at) VALUES (?, ?, ?, NOW())");
    $stmt_notification->execute([$userID, $actionType, $actionUsername]);

    // Validez la transaction
    $pdo->commit();

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    // Si une erreur se produit, annulez la transaction
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}


