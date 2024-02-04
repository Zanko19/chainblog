
document.addEventListener("DOMContentLoaded", function () {
    const likeButtons = document.querySelectorAll(".likeButton");
    likeButtons.forEach(likeButton => {
        likeButton.addEventListener('click', function() {
            const postID = likeButton.getAttribute("data-post-id");
            const isLiked = likeButton.getAttribute("data-is-liked") === "true";
            const receiverUserID = likeButton.getAttribute("data-receiver-id");

            if (isLiked) {
                removeLike(postID, likeButton);
            } else {
                addLike(postID, likeButton, receiverUserID);
            }
        });

        const postID = likeButton.getAttribute("data-post-id");
        updateLikeCount(postID);
    });

function addLike(postID, button, receiverUserID) {
    fetch('../back/like_add.php', {
        method: 'POST',
        body: JSON.stringify({ postID: postID, receiverUserID: receiverUserID }),
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
        var userID = $(this).data("user-id");  // Récupérer l'ID de l'utilisateur
        $("#commentModal").removeClass("hidden");
        $("#addCommentBtn").data("post-id", postID);
        $("#addCommentBtn").data("user-id", userID);  

        $.ajax({
            type: "GET",
            url: "../back/comment_get.php", 
            dataType: "json",
            data: {
                postID: postID
            },
            success: function(response) {
                if (response.status === "success") {
                    var comments = response.comments;
                    var commentsHtml = '';

                    for (var i = 0; i < comments.length; i++) {
                        var comment = comments[i];
                        commentsHtml += '<div class="border-t border-gray-200 py-2">';
                        commentsHtml += '<div class="font-semibold">' + comment.author + '</div>'; // Afficher le nom de l'auteur en gras
                        commentsHtml += '<div class="text-gray-500 text-xs">' + comment.date + '</div>'; // Afficher la date du commentaire en gris et plus petite
                        commentsHtml += '<div>' + comment.comment_body + '</div>'; // Afficher le corps du commentaire
                        commentsHtml += '</div>';
                    }

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
    var receiverUserID = $(this).data("receiver-id"); 

    if (commentBody.trim() === "") {
        alert("Le commentaire ne peut pas être vide.");
        return;
    }

    var commentData = {
        postID: postID,
        commentBody: commentBody,
        receiverUserID: receiverUserID 
    };

    $.ajax({
        type: "POST",
        url: "../back/comment_add.php",
        dataType: "json",
        data: JSON.stringify(commentData),
        contentType: "application/json; charset=utf-8",
        success: function(response) {
            if (response.status === "success") {
                alert("Commentaire ajouté avec succès.");
                $("#commentInput").val("");
                $("#commentModal").addClass("hidden");
            } else {
                alert("Erreur lors de l'ajout du commentaire : " + response.message);
            }
        },
        error: function() {
            alert("Erreur lors de l'ajout du commentaire.");
        }
    });
});

});
