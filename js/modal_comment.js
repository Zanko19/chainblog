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
