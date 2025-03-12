<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../back/post_show.php"; 

?>

<!-- Affichage des posts -->
<div class="flex flex-col h-[95%]">
<div class="overflow-y-auto">
<?php foreach ($posts as $post) : ?>
    <div class="rounded-3xl bg-[#f4edde] m-4 focus:outline-none mb-7 p-6 shadow">
        <div class="flex items-center border-b border-gray-400 pb-6">
            <img src="<?php echo $post['profilPic']; ?>" alt="profilPic" class="w-12 h-12 rounded-full" />
            <div class="flex items-start justify-between w-full">
                <div class="pl-3 w-full">
                <p class="focus:outline-none text-xl font-medium leading-5 text-gray-800">
                        <!-- Transformer le nom de l'auteur en lien -->
                        <a href="index.php?page=other&id=<?php echo $post['user_id']; ?>">
                            <?php echo $post['author']; ?>
                        </a>
                    </p>
                    <p class="focus:outline-none text-sm leading-normal pt-2 text-gray-500">
                        <?php echo $post['followerCount']; ?> followers
                    </p>
                </div>
            </div>
        </div>
        <div class="px-2">
            <p class="focus:outline-none text-sm leading-5 py-4 text-gray-600">
                <?php echo $post['body']; ?>
            </p>
            <p class="focus:outline-none text-xs leading-3 py-2 text-gray-500">
                <?php echo date('F j, Y, g:i a', strtotime($post['created'])); ?>
            </p>
        </div>
        <hr class="my-4 border-gray-400">
        <div class="flex">
            <!-- Icône pour les likes -->
            <div role="img" class="likeButton ml-2 flex cursor-pointer" data-post-id="<?php echo $post['ID']; ?>" data-is-liked="false" data-receiver-id="<?php echo $post['user_id']; ?>">
                <svg class="focus:outline-none fill-current text-[#2ECC71] <?php echo isset($likesByPost[$post['ID']]) && $likesByPost[$post['ID']] > 0 ? 'text-[#2ECC71]' : 'text-gray-400'; ?>" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 21.35l-1.45-1.32C5.4 16.18 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 7.68-8.55 11.54L12 21.35z" />
                </svg>
                <span id="likeCount-<?php echo $post['ID']; ?>"><?php echo isset($likesByPost[$post['ID']]) ? $likesByPost[$post['ID']] : 0; ?></span> Likes
            </div>
            <!-- Icône pour les commentaires -->
            <div role="img" class="ml-2 flex cursor-pointer commentButton" data-post-id="<?php echo $post['ID']; ?>" data-receiver-id="<?php echo $post['user_id']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM880-80 720-240H160q-33 0-56.5-23.5T80-320v-480q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v720ZM160-320h594l46 45v-525H160v480Zm0 0v-480 480Z"/></svg>
                <?php echo isset($commentsByPost[$post['ID']]) ? $commentsByPost[$post['ID']] : 0; ?>
            </div>
            <!-- Modal d'ajout de commentaire -->
            <?php include "modal_comment.php"; ?>

        </div>
    </div>
<?php endforeach; ?>
</div>
</div>
<script src="../js/post.js"></script>
