<?php

if (!isset($_SESSION['username'])) {
    exit;
}

include 'db_connect.php';

$username = $_SESSION['username'];

$sql = "SELECT m.*, u_sender.username as sender_username, u_receiver.username as receiver_username
        FROM messages m
        LEFT JOIN users u_sender ON m.sender_username = u_sender.username
        LEFT JOIN users u_receiver ON m.receiver_username = u_receiver.username
        WHERE (m.sender_username = :username OR m.receiver_username = :username)
        ORDER BY m.sent_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username, PDO::PARAM_STR); 
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

$groupedMessages = [];

foreach ($messages as $message) {
    // Créer une clé unique pour chaque combinaison de sender et receiver
    $participants = [$message['sender_username'], $message['receiver_username']];
    sort($participants); // Assurez-vous que l'ordre des participants est toujours le même
    $key = implode('-', $participants);
    
    // Ajouter le message au groupe correspondant
    if (!isset($groupedMessages[$key])) {
        $groupedMessages[$key] = [];
    }
    $groupedMessages[$key][] = $message;
}

// Maintenant, $groupedMessages contient tous les messages groupés


$pdo = null;


