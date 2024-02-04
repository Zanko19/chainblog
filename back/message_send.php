<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Vous devez être connecté pour envoyer un message.']);
    exit;
}

$receiverUsername = $_POST['receiver']; 
$messageBody = $_POST['message']; 
$senderUserID = $_SESSION['user_id']; 
$senderUsername = $_SESSION['username']; 

if (empty($receiverUsername) || empty($messageBody)) {
    echo json_encode(['status' => 'error', 'message' => 'Veuillez remplir tous les champs.']);
    exit;
}

include 'db_connect.php';

$stmt = $pdo->prepare("SELECT ID FROM users WHERE username = ?");
$stmt->execute([$receiverUsername]);

$receiverRow = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$receiverRow) {
    echo json_encode(['status' => 'error', 'message' => 'Destinataire non trouvé.']);
    exit;
}

$receiverUserID = $receiverRow['ID'];

try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("INSERT INTO messages (sender_username, receiver_username, message_text, sent_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$senderUsername, $receiverUsername, $messageBody]);

    $actionType = 'new_message';
    $sqlNotification = "INSERT INTO notifications (user_id, action_type, action_username, created_at) VALUES (?, ?, ?, NOW())";
    $stmtNotification = $pdo->prepare($sqlNotification);
    $stmtNotification->execute([$receiverUserID, $actionType, $senderUsername]);

    $pdo->commit();

    echo json_encode(['status' => 'success', 'message' => 'Message envoyé avec succès.']);
} catch (PDOException $e) {
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'envoi du message : ' . $e->getMessage()]);
}

$pdo = null;
?>
