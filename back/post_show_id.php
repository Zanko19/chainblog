<?php
try {
    include 'db_connect.php';

    // Récupérer les informations du post spécifique en fonction de son ID
    if (!isset($_GET['id'])) {
        echo 'ID est requis.';
        exit;
    }
    
    $postID = $_GET['id'];

    $sql = "SELECT post.*, users.username as author, users.profilPic, users.followerCount
            FROM post
            LEFT JOIN users ON post.user_id = users.ID
            WHERE post.ID = :postID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':postID', $postID, PDO::PARAM_INT);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        echo 'Le post spécifié n\'existe pas.';
        exit;
    }
    
    $author = $post['author'];
    $body = $post['body'];
    $created = $post['created'];

    // Récupérer le nombre de likes pour ce post
    $sqlLikes = "SELECT COUNT(*) AS likeCount FROM post_likes WHERE post_id = :postID";
    $stmtLikes = $pdo->prepare($sqlLikes);
    $stmtLikes->bindParam(':postID', $postID, PDO::PARAM_INT);
    $stmtLikes->execute();
    $likeData = $stmtLikes->fetch(PDO::FETCH_ASSOC);
    $post['likeCount'] = $likeData['likeCount'];

    // Récupérer le nombre de commentaires pour ce post
    $sqlComments = "SELECT COUNT(*) AS commentCount FROM post_comments WHERE post_id = :postID";
    $stmtComments = $pdo->prepare($sqlComments);
    $stmtComments->bindParam(':postID', $postID, PDO::PARAM_INT);
    $stmtComments->execute();
    $commentData = $stmtComments->fetch(PDO::FETCH_ASSOC);
    $post['commentCount'] = $commentData['commentCount'];

    // Maintenant, vous avez toutes les informations du post dans le tableau $post
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
