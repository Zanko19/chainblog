<?php

session_start();

include 'db_connect.php';

// Vérifier si l'utilisateur est connecté et si l'ID de l'utilisateur à suivre est fourni
if (isset($_SESSION['user_id']) && isset($_POST['follow_user_id'])) {
    $followerId = $_SESSION['user_id']; // ID de l'utilisateur connecté qui suit
    $followingId = $_POST['follow_user_id']; // ID de l'utilisateur à suivre, passé par POST
    $followerUsername = $_SESSION['username']; // Nom d'utilisateur de celui qui suit, supposé stocké dans la session

    // S'assurer qu'un utilisateur ne tente pas de se suivre lui-même
    if ($followerId == $followingId) {
        echo "Un utilisateur ne peut pas se suivre lui-même.";
        exit;
    }

    try {
        $pdo->beginTransaction();

        // Insérer la relation de suivi dans la table 'user_follows'
        $sqlFollow = "INSERT INTO user_follows (follower_id, following_id) VALUES (:followerId, :followingId)";
        $stmtFollow = $pdo->prepare($sqlFollow);
        $stmtFollow->execute(['followerId' => $followerId, 'followingId' => $followingId]);

        // Mettre à jour le 'followingCount' pour l'utilisateur qui suit
        $sqlUpdateFollowing = "UPDATE users SET followingCount = followingCount + 1 WHERE ID = :followerId";
        $stmtUpdateFollowing = $pdo->prepare($sqlUpdateFollowing);
        $stmtUpdateFollowing->execute(['followerId' => $followerId]);

        // Mettre à jour le 'followerCount' pour l'utilisateur qui est suivi
        $sqlUpdateFollower = "UPDATE users SET followerCount = followerCount + 1 WHERE ID = :followingId";
        $stmtUpdateFollower = $pdo->prepare($sqlUpdateFollower);
        $stmtUpdateFollower->execute(['followingId' => $followingId]);

        // Insérer une entrée dans la table 'notifications'
        $actionType = 'follow';
        $sqlNotification = "INSERT INTO notifications (user_id, action_type, action_username, created_at) VALUES (:followingId, :actionType, :followerUsername, NOW())";
        $stmtNotification = $pdo->prepare($sqlNotification);
        $stmtNotification->execute(['followingId' => $followingId, 'actionType' => $actionType, 'followerUsername' => $followerUsername]);

        $pdo->commit();
        echo "Suivi et notification réussis!";
        header('Location: ../front/index.php?page=other&id=' . $followingId);
    } catch (PDOException $e) {
        // En cas d'erreur, annuler la transaction
        $pdo->rollBack();
        echo 'Erreur lors du suivi : ' . $e->getMessage();
    }
} else {
    echo "Informations requises non fournies.";
    exit;
}
?>

