<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../back/get_posts_data.php'; 

?>

<div id="topPosts" class="divide-y divide-gray-300 bg-slate-800 p-2 rounded-lg">
    <?php if (is_array($topPosts) && !empty($topPosts)): ?>
        <?php foreach (array_slice($topPosts, 0, 5) as $post): ?>
            <div class="py-4 flex items-center space-x-4">
                <div class="flex-grow">
                    <h2 class="font-semibold text-white"><?php echo htmlspecialchars($post['username']); ?></h2>
                    <p class="text-gray-400 text-sm">Posted on: <?php echo htmlspecialchars($post['created']); ?></p>
                    <p class="text-white text-sm font-semibold mt-2">Likes: <?php echo htmlspecialchars($post['likes']); ?></p>
                </div>
                <a href="index.php?page=singlePost&id=<?php echo htmlspecialchars($post['ID']); ?>" class="text-blue-400 hover:text-blue-500 transition duration-300">Voir le post</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-white">No posts available.</p>
    <?php endif; ?>
</div>

