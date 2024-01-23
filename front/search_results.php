<?php include '../back/get_search_result.php'; ?>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Résultats de la recherche pour "<?php echo htmlspecialchars($searchQuery); ?>"</h1>

        <!-- Section Utilisateurs -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Utilisateurs</h2>
            <?php if (count($users) > 0): ?>
                <ul class="list-disc ml-4">
                    <?php foreach ($users as $user): ?>
                        <li>
                            <a href="index.php?page=other&id=<?php echo $user['ID']; ?>" class="text-blue-500 hover:underline">
                                <?php echo htmlspecialchars($user['USERNAME']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun utilisateur trouvé.</p>
            <?php endif; ?>
        </section>

        <!-- Section Posts -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Posts</h2>
            <?php if (count($posts) > 0): ?>
                <ul>
                    <?php foreach ($posts as $post): ?>
                        <li class="rounded-lg bg-white p-4 mb-4 shadow">
                            <a href="index.php?page=singlePost&id=<?php echo $post['ID']; ?>" class="text-blue-500 hover:underline">
                                <p class="text-lg font-medium text-gray-800"><?php echo $post['username']; ?></p>
                            </a>
                            <p class="text-sm text-gray-600"><?php echo $post['body']; ?></p>
                            <p class="text-xs text-gray-500"><?php echo date('F j, Y, g:i a', strtotime($post['created'])); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun post trouvé.</p>
            <?php endif; ?>
        </section>

        <!-- Section Messages -->
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Messages</h2>
            <?php if (count($messages) > 0): ?>
                <ul>
                    <?php foreach ($messages as $message): ?>
                        <li class="rounded-lg bg-white p-4 mb-4 shadow">
                            <a href="index.php?page=message-details&group=<?php echo htmlspecialchars($message['group_key']); ?>" class="text-blue-500 hover:underline">
                                <p class="text-lg font-medium text-gray-800">De <?php echo htmlspecialchars($message['sender_username']); ?></p>
                            </a>
                            <p class="text-sm text-gray-600">à <?php echo htmlspecialchars($message['receiver_username']); ?></p>
                            <p class="text-xs text-gray-500"><?php echo htmlspecialchars($message['message_text']); ?></p>
                            <p class="text-xs text-gray-500"><?php echo date('F j, Y, g:i a', strtotime($message['sent_at'])); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun message trouvé.</p>
            <?php endif; ?>
        </section>
    </div>
</body>

