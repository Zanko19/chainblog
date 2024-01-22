<?php

if (!isset($_SESSION['username'])) {
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=blogchain', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

$pdo = null;


