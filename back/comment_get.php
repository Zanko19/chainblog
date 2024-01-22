<?php
header('Content-Type: application/json');
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=blogchain', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!isset($_GET['postID'])) {
    echo json_encode(['status' => 'error', 'message' => 'postID is required']);
    exit;
}

$postID = $_GET['postID'];

try {
    $stmt = $pdo->prepare("SELECT * FROM post_comments WHERE post_id = ?");
    $stmt->execute([$postID]);

    $comments = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $comments[] = [
            'comment_id' => $row['ID'],
            'comment_body' => $row['comments_body'],
            'author' => $row['username'], 
            'date' => $row['created_at'] 
            
        ];
    }

    echo json_encode(['status' => 'success', 'comments' => $comments]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

