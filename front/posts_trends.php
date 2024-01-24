<?php

require_once('../back/get_posts_data.php');
// L'URL de votre API (modifiez cette URL par l'URL de votre API)
$api_url = '../back/get_posts_data.php';

// Récupérer les données JSON de l'API
$json_data = file_get_contents($api_url);
$response_data = json_decode($json_data, true);

// Vérifier si la réponse est valide avant de l'afficher
if ($response_data && isset($response_data['data'])) {
    $posts = $response_data['data'];
} else {
    // Gérer les erreurs si la réponse JSON n'est pas valide
    $posts = []; // Initialisez $posts avec un tableau vide ou gérez les erreurs autrement
}

var_dump($posts);
?>

<div>
<h1>Top 5 Posts</h1>
    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <p>Username: <?php echo htmlspecialchars($post['username']); ?></p>
                <p>Date: <?php echo htmlspecialchars($post['created']); ?></p>
                <p>Likes: <?php echo htmlspecialchars($post['likes']); ?></p>
                <a href="https://localhost/chainblog/front/index.php?page=singlePost&id=<?php echo htmlspecialchars($post['ID']); ?>">Voir le post</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
