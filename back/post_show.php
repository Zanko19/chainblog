<?php
try {
    include 'db_connect.php';

    // Récupérez les posts depuis la base de données, triés du plus récent au plus ancien, à l'exception de l'utilisateur connecté
    $userId = $_SESSION['user_id'];
    $sql = "SELECT post.*, users.username as author, users.profilPic, users.followerCount
            FROM post
            LEFT JOIN users ON post.user_id = users.ID
            WHERE post.user_id != :userId
            ORDER BY post.created DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}


$sqlLikes = "SELECT post_id, COUNT(*) AS likeCount FROM post_likes GROUP BY post_id";
$stmtLikes = $pdo->query($sqlLikes);
$likesData = $stmtLikes->fetchAll(PDO::FETCH_ASSOC);

// Créez un tableau associatif pour stocker les nombres de likes par post
$likesByPost = [];
foreach ($likesData as $like) {
    $likesByPost[$like['post_id']] = $like['likeCount'];
}

$sqlComments = "SELECT post_id, COUNT(*) AS commentCount FROM post_comments GROUP BY post_id";
$stmtComments = $pdo->query($sqlComments);
$commentsData = $stmtComments->fetchAll(PDO::FETCH_ASSOC);

// Créez un tableau associatif pour stocker les nombres de commentaires par post
$commentsByPost = [];
foreach ($commentsData as $comment) {
    $commentsByPost[$comment['post_id']] = $comment['commentCount'];
}

