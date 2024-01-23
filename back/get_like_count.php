<?php
header('Content-Type: application/json');
session_start();

include 'db_connect.php';

if (!isset($_GET['postID']) || empty($_GET['postID'])) {
    echo json_encode(['status' => 'error', 'message' => 'postID is required']);
    exit;
}

$postID = $_GET['postID'];

try {
    // Remplacez 'post' par le nom réel de votre table et 'likes' par le nom de la colonne qui contient le nombre de likes
    $stmt = $pdo->prepare("SELECT likes AS likeCount FROM post WHERE ID = ?");
    $stmt->execute([$postID]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si le post a été trouvé
    if ($result) {
        echo json_encode(['likeCount' => $result['likeCount']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Post not found']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>

