<?php
try {
    include 'db_connect.php';
    // Récupérer l'ID de l'utilisateur à partir de l'URL
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
    } else {
        echo "L'ID de l'utilisateur n'a pas été spécifié dans l'URL.";
        exit;
    }

    // Requête pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM users WHERE ID = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "Utilisateur non trouvé dans la base de données.";
        exit;
    }

    // Récupérer les posts de l'utilisateur
    $sqlPosts = "SELECT post.*, users.username as author, users.profilPic, users.followerCount
                 FROM post
                 LEFT JOIN users ON post.user_id = users.ID
                 WHERE post.user_id = :userId
                 ORDER BY post.created DESC";
    $stmtPosts = $pdo->prepare($sqlPosts);
    $stmtPosts->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmtPosts->execute();
    $posts = $stmtPosts->fetchAll(PDO::FETCH_ASSOC);

    // Récupérer les likes par post
    $sqlLikes = "SELECT post_id, COUNT(*) AS likeCount FROM post_likes GROUP BY post_id";
    $stmtLikes = $pdo->query($sqlLikes);
    $likesData = $stmtLikes->fetchAll(PDO::FETCH_ASSOC);

    // Créer un tableau associatif pour stocker les nombres de likes par post
    $likesByPost = [];
    foreach ($likesData as $like) {
        $likesByPost[$like['post_id']] = $like['likeCount'];
    }

    // Récupérer les commentaires par post
    $sqlComments = "SELECT post_id, COUNT(*) AS commentCount FROM post_comments GROUP BY post_id";
    $stmtComments = $pdo->query($sqlComments);
    $commentsData = $stmtComments->fetchAll(PDO::FETCH_ASSOC);

    // Créer un tableau associatif pour stocker les nombres de commentaires par post
    $commentsByPost = [];
    foreach ($commentsData as $comment) {
        $commentsByPost[$comment['post_id']] = $comment['commentCount'];
    }

} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}