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
$username = $_SESSION['username'];

if (!isset($userID) || empty($userID) || !isset($username) || empty($username)) {
    echo json_encode(['status' => 'error', 'message' => 'User not authenticated']);
    exit;
}

try {
    $pdo->beginTransaction();

    // Fetch post data based on postID
    $stmt_post = $pdo->prepare("SELECT user_id FROM post WHERE ID = ?");
    $stmt_post->execute([$postID]);
    $post = $stmt_post->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        echo json_encode(['status' => 'error', 'message' => 'Post not found']);
        exit;
    }

    $receiverUserID = $post['user_id'];

    // Insertion du commentaire
    $stmt = $pdo->prepare("INSERT INTO post_comments (post_id, user_id, username, comments_body, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$postID, $userID, $username, $commentBody]);

    // Variables notifications
    $actionType = 'post_comment';
    $actionUsername = $username;

    // Insertion de la notification
    $stmt_notification = $pdo->prepare("INSERT INTO notifications (user_id, action_type, action_username, created_at) VALUES (?, ?, ?, NOW())");
    $stmt_notification->execute([$receiverUserID, $actionType, $actionUsername]);

    $pdo->commit();

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
