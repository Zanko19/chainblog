<?php
header('Content-Type: application/json');
session_start();

include 'db_connect.php';

$userID = $_SESSION['user_id'];

$inputJSON = file_get_contents('php://input');

if ($inputJSON === false) {
    echo json_encode(['status' => 'error', 'message' => 'Error reading input data']);
    exit;
}

$input = json_decode($inputJSON, TRUE);

try {
    // Requête pour mettre à jour les données de l'utilisateur
    $stmt = $pdo->prepare("UPDATE users SET
                USERNAME = :USERNAME,
                PASSWORD = :PASSWORD,
                EMAIL = :EMAIL,
                name = :name,
                surname = :surname,
                alias = :alias,
                SecQ = :SecQ,
                SecA = :SecA,
                profilPic = :profilPic,
                bio = :bio,
                socials = :socials,
                location = :location
            WHERE ID = :userID");

    // Liaison des paramètres
    $stmt->bindParam(':USERNAME', $input['USERNAME']);
    $stmt->bindParam(':PASSWORD', $input['PASSWORD']); // Vous devrez peut-être hasher le mot de passe
    $stmt->bindParam(':EMAIL', $input['EMAIL']);
    $stmt->bindParam(':name', $input['name']);
    $stmt->bindParam(':surname', $input['surname']);
    $stmt->bindParam(':alias', $input['alias']);
    $stmt->bindParam(':SecQ', $input['SecQ']);
    $stmt->bindParam(':SecA', $input['SecA']);
    $stmt->bindParam(':profilPic', $input['profilPic']);
    $stmt->bindParam(':bio', $input['bio']);
    $stmt->bindParam(':socials', $input['socials']);
    $stmt->bindParam(':location', $input['location']);
    $stmt->bindParam(':userID', $userID);

    $stmt->execute();

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
