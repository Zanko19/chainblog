<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login_form.php'); 
    exit();
}

// function slugify($text, $max_length = 28) {
//     $text = strtolower($text);
//     $text = preg_replace('/[^a-z0-9-]/', '-', $text);
//     $text = preg_replace('/-+/', '-', $text);
//     $text = trim($text, '-');

//     if (strlen($text) > $max_length) {
//         $text = substr($text, 0, $max_length);
//     }

//     return $text;
// }

try {
    include 'db_connect.php';

    // $slug = slugify($_POST['body']);
    $body = $_POST['body'];
    $created = date('Y-m-d H:i:s');
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];

    $sql = "INSERT INTO post (body, created, user_id, username, likes) VALUES (:body, :created, :user_id, :username, 0)";

    $stmt = $pdo->prepare($sql);

    // $stmt->bindParam(':slug', $slug);
    $stmt->bindParam(':body', $body);
    $stmt->bindParam(':created', $created);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':username', $username);

    $stmt->execute();

    header('Location: ../front/index.php');
    exit();
} catch (PDOException $e) {
    echo 'Erreur lors de la création du post : ' . $e->getMessage();
}
?>
