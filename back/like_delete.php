<?php
include 'db_connect.php';

$postID = $_POST['postID'];
$userID = $_SESSION['userID']; // Assurez-vous que l'ID de l'utilisateur est stocké dans la session

try {
    $stmt = $pdo->prepare("DELETE FROM post_likes WHERE post_id = ? AND user_id = ?");
    $stmt->execute([$postID, $userID]);

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

