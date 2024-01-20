<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../back/post_show.php"; 
?>

<!-- Affichage des posts -->
<?php foreach ($posts as $post) : ?>
    <div class="rounded-3xl bg-[#f4edde] m-4 focus:outline-none mb-7 p-6 shadow">
        <div class="flex items-center border-b border-gray-400 pb-6">
            <img src="<?php echo $post['profilPic']; ?>" alt="profilPic" class="w-12 h-12 rounded-full" />
            <div class="flex items-start justify-between w-full">
                <div class="pl-3 w-full">
                    <p class="focus:outline-none text-xl font-medium leading-5 text-gray-800">
                        <?php echo $post['author']; ?>
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
            <div role="img" class="likeButton ml-2 flex cursor-pointer" data-post-id="<?php echo $post['ID']; ?>" data-is-liked="false">
                <svg class="focus:outline-none fill-current text-[#2ECC71] <?php echo isset($likesByPost[$post['ID']]) && $likesByPost[$post['ID']] > 0 ? 'text-[#2ECC71]' : 'text-gray-400'; ?>"
                    width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 21.35l-1.45-1.32C5.4 16.18 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 7.68-8.55 11.54L12 21.35z" />
                </svg>
                <span id="likeCount-<?php echo $post['ID']; ?>"><?php echo isset($likesByPost[$post['ID']]) ? $likesByPost[$post['ID']] : 0; ?></span> Likes
            </div>
            <!-- Icône pour les commentaires -->
            <div role="img" class="ml-2 flex">
                <svg class="focus:outline-none fill-current text-[#2ECC71]"
                    width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-1v-1h1v1zm0-3h-1v-7h1v7z" />
                </svg>
                <?php echo isset($commentsByPost[$post['ID']]) ? $commentsByPost[$post['ID']] : 0; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Récupérer tous les boutons de like et mettre à jour le compteur de likes au démarrage
    const likeButtons = document.querySelectorAll(".likeButton");
    likeButtons.forEach(likeButton => {
        const postID = likeButton.getAttribute("data-post-id");
        
        // Mise à jour initiale du nombre de likes pour chaque post
        updateLikeCount(postID);

        // Ajouter un écouteur d'événements pour les clics sur les boutons de like
        likeButton.addEventListener("click", function () {
            const isLiked = this.getAttribute("data-is-liked") === "true";

            if (!isLiked) {
                addLike(postID, this);
                // Changer la couleur du SVG en vert après avoir liké
                this.querySelector('svg').classList.add('text-[#2ECC71]');
            } else {
                removeLike(postID, this);
                // Retirer la couleur verte du SVG après avoir unliké
                this.querySelector('svg').classList.remove('text-[#2ECC71]');
            }
        });
    });

    // Fonction pour ajouter un like
    function addLike(postID, button) {
        fetch('../back/like_add.php', {
            method: 'POST',
            body: JSON.stringify({ postID: postID }),
            headers: { 'Content-type': 'application/json; charset=UTF-8' }
        })
        .then(response => response.json())
        .then(json => {
            if (json.status === 'success') {
                button.setAttribute("data-is-liked", "true");
                updateLikeCount(postID);
            }
            console.log('addLike response:', json);
        })
        .catch(error => console.error('Error in addLike:', error));
    }

    // Fonction pour supprimer un like
    function removeLike(postID, button) {
        fetch('../back/like_delete.php', {
            method: 'POST',
            body: JSON.stringify({ postID: postID }),
            headers: { 'Content-type': 'application/json; charset=UTF-8' }
        })
        .then(response => response.json())
        .then(json => {
            if (json.status === 'success') {
                button.setAttribute("data-is-liked", "false");
                updateLikeCount(postID);
            }
            console.log('removeLike response:', json);
        })
        .catch(error => console.error('Error in removeLike:', error));
    }

    // Fonction pour mettre à jour le compteur de likes
    function updateLikeCount(postID) {
        fetch('../back/get_like_count.php?postID=' + postID)
        .then(response => response.json())
        .then(data => {
            console.log('Updating like count for postID:', postID, 'New count:', data.likeCount);
            document.getElementById('likeCount-' + postID).textContent = data.likeCount;
        })
        .catch(error => console.error('Error in updateLikeCount:', error));
    }
});




</script>