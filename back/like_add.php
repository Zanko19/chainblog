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

if (!isset($input['postID']) || !isset($input['receiverUserID'])) {
    echo json_encode(['status' => 'error', 'message' => 'postID and receiverUserID are required']);
    exit;
}

$receiverUserID = $input['receiverUserID'];
$postID = $input['postID'];
$userID = $_SESSION['user_id']; 
$username = $_SESSION['username']; // Make sure the username is stored in the session

if (!isset($userID) || empty($userID)) {
    echo json_encode(['status' => 'error', 'message' => 'User not authenticated']);
    exit;
}

try {
    $pdo->beginTransaction();

    // Check if the user has already liked this post
    $stmtCheck = $pdo->prepare("SELECT * FROM post_likes WHERE post_id = ? AND user_id = ?");
    $stmtCheck->execute([$postID, $userID]);

    if ($stmtCheck->rowCount() > 0) {
        // User has already liked this post, send an appropriate response
        echo json_encode(['status' => 'error', 'message' => 'User has already liked this post']);
        $pdo->commit(); // Commit the transaction
        exit;
    }

    // Insert into post_likes
    $stmt = $pdo->prepare("INSERT INTO post_likes (post_id, user_id, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$postID, $userID]);

    // Update the 'likes' column in the 'post' table
    $stmt = $pdo->prepare("UPDATE post SET likes = likes + 1 WHERE ID = ?");
    $stmt->execute([$postID]);

    // Insert into notifications
    $actionType = 'post_like';
    $sqlNotification = "INSERT INTO notifications (user_id, action_type, action_username, created_at) VALUES (?, ?, ?, NOW())";
    $stmtNotification = $pdo->prepare($sqlNotification);
    $stmtNotification->execute([$receiverUserID, $actionType, $username]);

    $pdo->commit(); // Commit the transaction

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    $pdo->rollBack(); // Rollback the transaction in case of an error
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
