<?php

if (!isset($_SESSION['search_results'])) {
    // Renvoie à la page de recherche si aucun résultat n'est stocké dans la session
    header('Location: search.php');
    exit();
}

// Récupérer la search query et les résultats de la recherche à partir des variables de session
$searchQuery = $_SESSION['search_query'];
$users = $_SESSION['search_results']['users'];
$posts = $_SESSION['search_results']['posts'];
$messages = $_SESSION['search_results']['messages'];

// Vous pouvez vider les résultats de recherche et la search query de la session après les avoir récupérés si vous le souhaitez
unset($_SESSION['search_results']);
unset($_SESSION['search_query']);

?>