<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../back/post_user_show.php";
var_dump($user);

?>


<div class="rounded-3xl bg-[#f4edde] m-4 focus:outline-none mb-7 p-6 shadow">
    <div class="flex justify-between align-middle ">
        <img src="<?php echo $user['profilPic']; ?>" alt="coin avatar" class="w-1/2 md:w-1/6 rounded-full border-2 border-black mx-auto md:mx-0" />
        <div class="w-full pt-4 text-center">
            <p class="text-xl font-medium leading-5 text-gray-800">
                <?php echo $user['name'];
                echo ' ';
                echo $user['surname']; ?>
            </p>
            <p class="text-sm leading-normal text-gray-500 mb-2">
                @<?php echo $user['USERNAME']; ?>
            </p>
        </div>
        <!-- <div class="flex space-x-4">
            <button class="hover:scale-150 ">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M720-400v-120H600v-80h120v-120h80v120h120v80H800v120h-80Zm-360-80q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm80-80h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0-80Zm0 400Z"/></svg>          
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
            </button>
            <button class="hover:scale-150 ">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="fill-current hover:text-[#2ECC71]">
                    <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                </svg>
            </button>
        </div> -->
    </div>
    <div class="flex border border-green-500 rounded-full font-bold md:mt-4 px-2 justify-center">
        <div class="p-3 text-center">
            <span class="text-xl font-bold block tracking-wide text-black hover:text-[#07ed5c]"><?php echo $user['followerCount'] ?></span>
            <span class="text-sm text-slate-500">Followers</span>
        </div>
        <div class="p-3 text-center">
            <span class="text-xl font-bold block uppercase tracking-wide text-black hover:text-[#07ed5c]"><?php echo $user['followingCount'] ?></span>
            <span class="text-sm text-slate-500">Following</span>
        </div>
    </div>
    <div class="px-2">
        <p class="text-sm text-center leading-5 py-4 text-gray-600 font-bold">
            <?php echo $user['bio']; ?>
        </p>
        <div class="flex space-x-6 md:justify-end">
            <div class="px-2 text-xs leading-3 text-black">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960" width="22" class="">
                        <path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                    </svg>
                    <p class="font-semibold text-lg"><?php echo $user['location'] ?></p>
                </div>
            </div>
            <div class="px-2 text-xs leading-3 text-black">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
                    </svg>
                    <p class="font-semibold text-lg"><?php echo date('F Y', strtotime($user['Created'])); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

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
                <svg class="focus:outline-none fill-current text-[#2ECC71] <?php echo isset($likesByPost[$post['ID']]) && $likesByPost[$post['ID']] > 0 ? 'text-[#2ECC71]' : 'text-gray-400'; ?>" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 21.35l-1.45-1.32C5.4 16.18 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 7.68-8.55 11.54L12 21.35z" />
                </svg>
                <span id="likeCount-<?php echo $post['ID']; ?>"><?php echo isset($likesByPost[$post['ID']]) ? $likesByPost[$post['ID']] : 0; ?></span> Likes
            </div>
            <!-- Icône pour les commentaires -->
            <div role="img" class="ml-2 flex cursor-pointer commentButton" data-post-id="<?php echo $post['ID']; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M240-400h480v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM880-80 720-240H160q-33 0-56.5-23.5T80-320v-480q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v720ZM160-320h594l46 45v-525H160v480Zm0 0v-480 480Z"/></svg>
                <?php echo isset($commentsByPost[$post['ID']]) ? $commentsByPost[$post['ID']] : 0; ?>
            </div>

            <!-- Modal d'ajout de commentaire -->
            <?php include "modal_comment.php"; ?>
        </div>
    </div>
<?php endforeach; ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Récupérer tous les boutons de like et mettre à jour le compteur de likes au démarrage
        const likeButtons = document.querySelectorAll(".likeButton");
        likeButtons.forEach(likeButton => {
            const postID = likeButton.getAttribute("data-post-id");

            // Mise à jour initiale du nombre de likes pour chaque post
            updateLikeCount(postID);

            // Ajouter un écouteur d'événements pour les clics sur les boutons de like
            likeButton.addEventListener("click", function() {
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
                    body: JSON.stringify({
                        postID: postID
                    }),
                    headers: {
                        'Content-type': 'application/json; charset=UTF-8'
                    }
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
                    body: JSON.stringify({
                        postID: postID
                    }),
                    headers: {
                        'Content-type': 'application/json; charset=UTF-8'
                    }
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

    $(document).ready(function() {
    $(".commentButton").click(function() {
        var postID = $(this).data("post-id");
        $("#commentModal").removeClass("hidden");
        $("#addCommentBtn").data("post-id", postID);

        // Chargement des commentaires existants
        $.ajax({
            type: "GET",
            url: "../back/comment_get.php", // Remplacez par le chemin de votre script PHP pour récupérer les commentaires
            dataType: "json",
            data: {
                postID: postID
            },
            success: function(response) {
                if (response.status === "success") {
                    var comments = response.comments;
                    var commentsHtml = '';

                    // Génération du HTML pour les commentaires
                    for (var i = 0; i < comments.length; i++) {
                        var comment = comments[i];
                        commentsHtml += '<div class="border-t border-gray-200 py-2">';
                        commentsHtml += '<div class="font-semibold">' + comment.author + '</div>'; // Afficher le nom de l'auteur en gras
                        commentsHtml += '<div class="text-gray-500 text-xs">' + comment.date + '</div>'; // Afficher la date du commentaire en gris et plus petite
                        commentsHtml += '<div>' + comment.comment_body + '</div>'; // Afficher le corps du commentaire
                        commentsHtml += '</div>';
                    }

                    // Ajout des commentaires à la section
                    $("#commentsSection").html(commentsHtml);
                } else {
                    alert("Erreur lors de la récupération des commentaires : " + response.message);
                }
            },
            error: function() {
                alert("Une erreur s'est produite lors de la demande.");
            }
        });
    });

    $("#closeModalBtn").click(function() {
        $("#commentModal").addClass("hidden");
    });

    $("#addCommentBtn").click(function() {
        var commentBody = $("#commentInput").val();
        var postID = $(this).data("post-id");
        var userID = 1; // Remplacez par le véritable ID d'utilisateur ou récupérez-le depuis la session si nécessaire

        if (commentBody.trim() === "") {
            alert("Le commentaire ne peut pas être vide.");
            return;
        }

        // Créez un objet JSON avec les données à envoyer
        var commentData = {
            postID: postID,
            commentBody: commentBody,
            userID: userID
        };

        $.ajax({
            type: "POST",
            url: "../back/comment_add.php", // Remplacez par le chemin de votre script PHP pour ajouter un commentaire
            dataType: "json",
            data: JSON.stringify(commentData), // Convertissez l'objet JSON en chaîne JSON
            contentType: "application/json; charset=utf-8",
            success: function(response) {
                if (response.status === "success") {
                    alert("Commentaire ajouté avec succès.");
                    $("#commentInput").val("");
                    $("#commentModal").addClass("hidden");
                    // Rechargez la page ou mettez à jour la liste des commentaires
                } else {
                    alert("Erreur lors de l'ajout du commentaire : " + response.message);
                }
            },
            error: function() {
                alert("Une erreur s'est produite lors de la demande.");
            }
        });
    });
});

</script>