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

<body>
    <h1>Résultats de la recherche pour "<?php echo htmlspecialchars($searchQuery); ?>"</h1>

    <section>
        <h2>Utilisateurs</h2>
        <?php if (count($users) > 0): ?>
            <ul>
                <?php foreach ($users as $user): ?>
                    <li><?php echo htmlspecialchars($user['USERNAME']); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun utilisateur trouvé.</p>
        <?php endif; ?>
    </section>

    <!-- Affichage des posts -->
    <section>
        <h2>Posts</h2>
        <?php if (count($posts) > 0): ?>
            <ul>
                <?php foreach ($posts as $post): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($post['username']); ?>:</strong>
                        <?php echo htmlspecialchars($post['body']); ?>
                        <em>Posté le <?php echo htmlspecialchars($post['created']); ?></em>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun post trouvé.</p>
        <?php endif; ?>
    </section>

    <!-- Affichage des messages -->
    <section>
        <h2>Messages</h2>
        <?php if (count($messages) > 0): ?>
            <ul>
                <?php foreach ($messages as $message): ?>
                    <li>
                        <strong>De <?php echo htmlspecialchars($message['sender_username']); ?></strong> 
                        à <?php echo htmlspecialchars($message['receiver_username']); ?>: 
                        <?php echo htmlspecialchars($message['message_text']); ?>
                        <em>Envoyé le <?php echo htmlspecialchars($message['sent_at']); ?></em>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun message trouvé.</p>
        <?php endif; ?>
    </section>

</body>