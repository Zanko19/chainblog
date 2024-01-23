<?php
session_start();

// Vérifier si l'utilisateur est connecté (vous pouvez ajuster cela en fonction de votre système d'authentification)
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Vous devez être connecté pour envoyer un message.']);
    exit;
}

// Récupérer les données du formulaire
$receiverUsername = isset($_POST['receiver']) ? $_POST['receiver'] : '';
$messageText = isset($_POST['message']) ? $_POST['message'] : '';
$senderUsername = $_SESSION['username'];

// Valider les données (vous pouvez ajouter des validations supplémentaires selon vos besoins)
if (empty($receiverUsername) || empty($messageText)) {
    echo json_encode(['status' => 'error', 'message' => 'Veuillez remplir tous les champs.']);
    exit;
}

// Établir la connexion à la base de données (ajustez les paramètres de connexion)
include 'db_connect.php';

// Rechercher l'ID du destinataire en fonction de son nom d'utilisateur
$stmt = $pdo->prepare("SELECT ID FROM users WHERE username = ?");
$stmt->execute([$receiverUsername]);

$receiverRow = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$receiverRow) {
    echo json_encode(['status' => 'error', 'message' => 'Destinataire non trouvé.']);
    exit;
}

$receiverUserID = $receiverRow['ID'];

// Insérer le message dans la table des messages
try {
    $stmt = $pdo->prepare("INSERT INTO messages (sender_username, receiver_username, message_text, sent_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$senderUsername, $receiverUsername, $messageText]);
    echo json_encode(['status' => 'success', 'message' => 'Message envoyé avec succès.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'envoi du message : ' . $e->getMessage()]);
}

// Fermer la connexion à la base de données
$pdo = null;
?>
