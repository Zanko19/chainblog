<?php
try {
    include 'db_connect.php';

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $alias = $_POST['alias'];
    $secQ = $_POST['secQ'];
    $secA = $_POST['secA'];
    $profilPic = $_POST['profilPic'];
    $bio = $_POST['bio'];
    $socials = $_POST['socials'];
    $location = $_POST['location'];

    $sql = "INSERT INTO users (USERNAME, PASSWORD, EMAIL, name, surname, alias, SecQ, SecA, Created, profilPic, bio, socials, location)
            VALUES (:username, :password, :email, :name, :surname, :alias, :secQ, :secA, NOW(), :profilPic, :bio, :socials, :location)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':alias', $alias);
    $stmt->bindParam(':secQ', $secQ);
    $stmt->bindParam(':secA', $secA);
    $stmt->bindParam(':profilPic', $profilPic);
    $stmt->bindParam(':bio', $bio);
    $stmt->bindParam(':socials', $socials);
    $stmt->bindParam(':location', $location);

    $stmt->execute();

    header('Location: ../front/index.php');
    exit();
} catch (PDOException $e) {
    echo 'Erreur lors de l\'inscription : ' . $e->getMessage();
}
