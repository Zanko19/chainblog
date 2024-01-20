<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../back/post_user_show.php";

try {
    $pdo = new PDO('mysql:host=localhost;dbname=blogchain', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérez l'ID de l'utilisateur connecté depuis la session
    $userId = $_SESSION['user_id'];

    // Requête pour récupérer les informations de l'utilisateur connecté
    $sql = "SELECT * FROM users WHERE ID = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Créez une chaîne de caractères HTML avec les données de l'utilisateur
        $output = '
        <div class="justify-center items-center object-center flex md:w-[85%] md:m-auto ">
            <div class="inset-x-0 bottom-0">
                <div id="" class="rounded-3xl bg-[#f4edde] m-4 mb-7 p-6 shadow-2xl absolute inset-x-0 bottom-y-0 lg:m-0 md:w-[85%] lg:w-[70%] mx-auto">
                    <div class="absolute flex w-full justify-center pr-12 -top-8 lg:w-75 lg:-left-40 xl:-left-60">
                        <img src="' . $user['profilPic'] . '" alt="coin avatar" class="w-1/4 h-1/4 rounded-full border-2 border-black " />
                    </div>
                    <div class="flex items-start justify-between text-center w-full mt-6 pt-2">
                        <div class="absolute top-0 right-0 m-4">
                            <button class="hover:scale-150 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"
                                    class="fill-current hover:text-[#2ECC71]">
                                    <path
                                        d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                                </svg>
                            </button>
                        </div>
                        <div class="w-full">
                            <p class="text-xl font-medium leading-5 text-gray-800">
                                ' . $user['name'] . ' ' . $user['surname'] . '
                            </p>
                            <p class="text-sm leading-normal text-gray-500 mb-2">
                                @' . $user['USERNAME'] . '
                            </p>
                        </div>
                    </div>
                    <div class="flex border border-green-500 rounded-full font-bold px-2 justify-center">
                        <div class="p-3 text-center">
                            <span
                                class="text-xl font-bold block tracking-wide text-black hover:text-[#07ed5c]">' . $user['followerCount'] . '</span>
                            <span class="text-sm text-slate-500">Followers</span>
                        </div>

                        <div class="p-3 text-center">
                            <span
                                class="text-xl font-bold block uppercase tracking-wide text-black hover:text-[#07ed5c]">' . $user['followingCount'] . '</span>
                            <span class="text-sm text-slate-500">Following</span>
                        </div>
                    </div>

                    <div class="px-2">
                        <p class="text-sm text-center leading-5 py-4 text-gray-600 font-bold">
                            ' . $user['bio'] . '
                        </p>
                        <div class="flex space-x-6">
                            <div class="px-2 text-xs leading-3 text-black">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960"
                                        width="22" class="">
                                        <path
                                            d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                                    </svg>
                                    <p class="font-semibold text-lg">' . $user['location'] . '</p>
                                </div>
                            </div>
                            <div class="px-2 text-xs leading-3 text-black">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                        width="24">
                                        <path
                                            d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
                                    </svg>
                                    <p class="font-semibold text-lg">' . $user['Created'] . '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    } else {
        echo 'Utilisateur non trouvé.';
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
?>


<div class="rounded-3xl bg-[#f4edde] m-4 focus:outline-none mb-7 p-6 shadow">
    <div class="flex justify-center md:justify-start">
        <img src="<?php echo $user['profilPic']; ?>" alt="coin avatar" class="w-1/4 h-1/4 rounded-full border-2 border-black mx-auto md:mx-0" />
    </div>
    <div class="w-full pt-4">
        <p class="text-xl font-medium leading-5 text-gray-800">
            <?php echo $user['name']; 
                  echo ' ';
                  echo $user['surname']; ?>
        </p>
        <p class="text-sm leading-normal text-gray-500 mb-2">
            @<?php echo $user['USERNAME']; ?>
        </p>
    </div>
    <div class="flex border border-green-500 rounded-full font-bold px-2 justify-center">
        <div class="p-3 text-center">
            <span class="text-xl font-bold block tracking-wide text-black hover:text-[#07ed5c]"><?php echo $user['followerCount'] ?></span>
            <span class="text-sm text-slate-500">Followers</span>
        </div>
        <div class="p-3 text-center">
            <span class="text-xl font-bold block uppercase tracking-wide text-black hover:text-[#07ed5c]">'<?php echo $user['followingCount'] ?></span>
            <span class="text-sm text-slate-500">Following</span>
        </div>                
    </div>
    <div class="px-2">
        <p class="text-sm text-center leading-5 py-4 text-gray-600 font-bold">
            <?php echo $user['bio']; ?>
        </p>
        <div class="flex space-x-6">
            <div class="px-2 text-xs leading-3 text-black">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="22" viewBox="0 -960 960 960"
                                        width="22" class="">
                                        <path
                                            d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                                    </svg>
                                    <p class="font-semibold text-lg">' . $user['location'] . '</p>
                                </div>
                            </div>
                            <div class="px-2 text-xs leading-3 text-black">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                        width="24">
                                        <path
                                            d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
                                    </svg>
                                    <p class="font-semibold text-lg">' . $user['Created'] . '</p>
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
            <div role="img" class="ml-2 flex">
                <svg class="focus:outline-none fill-current text-[#2ECC71]" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-1v-1h1v1zm0-3h-1v-7h1v7z" />
                </svg>
                <?php echo isset($commentsByPost[$post['ID']]) ? $commentsByPost[$post['ID']] : 0; ?>
            </div>
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
</script>