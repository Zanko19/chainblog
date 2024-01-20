document.addEventListener("DOMContentLoaded", function () {
    const likeButton = document.getElementById("likeButton");
    const likeCount = document.getElementById("likeCount");
    const postId = likeButton.getAttribute("data-post-id");
    let isLiked = false;

    // Vérifiez si l'utilisateur a déjà liké ce post (vous devrez implémenter cette fonction côté serveur)
    // Si le post a déjà été liké par l'utilisateur, définissez isLiked sur true ici.

    // Fonction pour gérer le clic sur le bouton de like/délike
    likeButton.addEventListener("click", function () {
        if (!isLiked) {
            // Si l'utilisateur n'a pas encore liké ce post, effectuez l'action de like
            // Vous devrez envoyer une requête au serveur pour ajouter le like à la base de données
            // Mettez à jour l'interface utilisateur pour refléter le nouveau nombre de likes
            isLiked = true;
            likeCount.textContent = parseInt(likeCount.textContent) + 1;
            // Vous devrez envoyer une requête au serveur pour ajouter le like
        } else {
            // Si l'utilisateur a déjà liké ce post, effectuez l'action de délike
            // Vous devrez envoyer une requête au serveur pour supprimer le like de la base de données
            // Mettez à jour l'interface utilisateur pour refléter le nouveau nombre de likes
            isLiked = false;
            likeCount.textContent = parseInt(likeCount.textContent) - 1;
            // Vous devrez envoyer une requête au serveur pour supprimer le like
        }
    });

    // Fonction pour mettre à jour le nombre de likes depuis le serveur
    function updateLikeCount(postID) {
        // Effectuez une requête AJAX pour obtenir le nombre de likes du serveur
        // Utilisez postID pour identifier le post spécifique
        // Mettez à jour l'élément HTML avec le nouveau nombre de likes
        // Vous pouvez utiliser la bibliothèque JavaScript de votre choix, comme Axios ou Fetch, pour effectuer la requête AJAX.
    }

    // Actualisez le compteur de likes toutes les X secondes
    const postID = <?php echo $post['ID']; ?>; // Obtenez l'ID du post actuel depuis PHP
    setInterval(function () {
        updateLikeCount(postID);
    }, 5000); // Actualisez toutes les 5 secondes (ajustez cet intervalle selon vos besoins)
});
