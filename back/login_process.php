<?php
session_start();

try {
    include 'db_connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour récupérer l'utilisateur par son nom d'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM users WHERE USERNAME = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe hashé
    if ($user && password_verify($password, $user['PASSWORD'])) {
        // Authentification réussie
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['username'] = $user['USERNAME'];
        header('Location: ../front/index.php'); // Rediriger vers la page principale
        exit();
    } else {
        // Authentification échouée, afficher un message d'erreur
        echo 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
?>
