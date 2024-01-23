<?php

session_start();
$currentUser = $_SESSION['username'];
$searchQuery = '%' . $_GET['search_query'] . '%';

include 'db_connect.php';

// utilisateurs
$stmt = $pdo->prepare("SELECT * FROM users WHERE USERNAME LIKE ?");
$stmt->execute([$searchQuery]);
$_SESSION['search_results']['users'] = $stmt->fetchAll();

// posts
$stmt = $pdo->prepare("SELECT * FROM post WHERE body LIKE ? OR username LIKE ?");
$stmt->execute([$searchQuery, $searchQuery]);
$_SESSION['search_results']['posts'] = $stmt->fetchAll();

// messages
$stmt = $pdo->prepare("SELECT * FROM messages WHERE (sender_username = ? OR receiver_username = ?) AND message_text LIKE ?");
$stmt->execute([$currentUser, $currentUser, $searchQuery]);
$_SESSION['search_results']['messages'] = $stmt->fetchAll();

// Stocker également la search query dans la session pour référence
$_SESSION['search_query'] = $_GET['search_query'];

header('Location: ../front/index.php?page=search_results');
exit();



