<?php
header('Content-Type: application/json');
session_start();

include 'db_connect.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); // Convert JSON into array

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON']);
    exit;
}

if (!isset($input['postID']) || empty($input['postID'])) {
    echo json_encode(['status' => 'error', 'message' => 'postID is required']);
    exit;
}

$postID = $input['postID'];
$userID = $_SESSION['user_id']; 
$username = $_SESSION['username']; // Assurez-vous que le nom d'utilisateur est stocké dans la session

if (!isset($userID) || empty($userID)) {
    echo json_encode(['status' => 'error', 'message' => 'User not authenticated']);
    exit;
}

try {
    // Vérifiez d'abord si l'utilisateur a déjà liké ce post
    $stmtCheck = $pdo->prepare("SELECT * FROM post_likes WHERE post_id = ? AND user_id = ?");
    $stmtCheck->execute([$postID, $userID]);

    if ($stmtCheck->rowCount() > 0) {
        // L'utilisateur a déjà liké ce post, renvoyez une réponse appropriée
        echo json_encode(['status' => 'error', 'message' => 'User has already liked this post']);
        exit;
    }

    // Commencez une transaction pour vous assurer que toutes les requêtes sont exécutées correctement
    $pdo->beginTransaction();

    // Première requête : Insertion dans post_likes
    $stmt = $pdo->prepare("INSERT INTO post_likes (post_id, user_id, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$postID, $userID]);

    // Deuxième requête : Mise à jour de la colonne likes dans la table post
    // Remplacez 'post_table' par le nom réel de votre table de posts et 'likes' par le nom de la colonne qui contient le nombre de likes
    $stmt = $pdo->prepare("UPDATE post SET likes = likes + 1 WHERE ID = ?");
    $stmt->execute([$postID]);

    // Troisième requête : Insertion dans la table notifications
    $actionType = 'post_like';
    $sqlNotification = "INSERT INTO notifications (user_id, action_type, action_username, created_at) VALUES (?, ?, ?, NOW())";
    $stmtNotification = $pdo->prepare($sqlNotification);
    $stmtNotification->execute([$userID, $actionType, $username]);

    // Si tout va bien, validez la transaction
    $pdo->commit();

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    // En cas d'erreur, annulez la transaction
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
