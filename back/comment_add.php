<?php
header('Content-Type: application/json');
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=blogchain', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    $stmt = $pdo->prepare("INSERT INTO post_comments (post_id, user_id, username, comments_body, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$postID, $userID, $username, $commentBody]);

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>

