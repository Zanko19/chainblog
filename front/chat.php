<?php include '../back/get_chat.php';

// Vérifier si l'utilisateur est connecté (vous pouvez ajuster cela en fonction de votre système d'authentification)
if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour accéder à vos messages.";
    exit;
}

// Récupérer la valeur du paramètre 'group' depuis l'URL
if (isset($_GET['group'])) {
    $groupParam = $_GET['group'];
    
    // Séparer les noms d'utilisateur en utilisant le tiret comme délimiteur
    $usernames = explode('-', $groupParam);
    
    // Vérifier s'il y a au moins deux noms d'utilisateur
    if (count($usernames) == 2) {
        // Le premier nom d'utilisateur est le sender (expéditeur)
        $senderUsername = $usernames[0];
        
        // Le deuxième nom d'utilisateur est le receiver (destinataire)
        $receiverUsername = $usernames[1];
        
        // Vous avez maintenant les deux noms d'utilisateur, que vous pouvez utiliser dans votre code
    } else {
        echo "URL invalide : le paramètre 'group' doit contenir deux noms d'utilisateur séparés par un tiret.";
    }
} else {
    echo "Le paramètre 'group' n'a pas été spécifié dans l'URL.";
    exit;
}
?>

<!-- Chat Messages -->
<div class="h-screen overflow-y-auto p-4 pb-36">
    <?php foreach ($messages as $message) : ?>
        <?php
        $senderUsername = $message['sender_username'];
        $receiverUsername = $message['receiver_username'];
        $messageText = $message['message_text'];
        $sentAt = $message['sent_at'];
        $isIncoming = ($receiverUsername === $_SESSION['username']);

        // Exécutez la requête pour obtenir les informations de l'expéditeur
        $stmtUserInfo->bindParam(':username', $senderUsername, PDO::PARAM_STR);
        $stmtUserInfo->execute();
        $senderUserInfo = $stmtUserInfo->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="flex mb-4 <?php echo $isIncoming ? '' : 'justify-end'; ?> cursor-pointer">
            <div class="w-9 h-9 rounded-full flex items-center justify-center <?php echo $isIncoming ? 'mr-2' : 'ml-2'; ?>">
                <!-- Affichez l'image de profil de l'expéditeur à partir de $senderUserInfo -->
                <img src="<?php echo $senderUserInfo['profilPic']; ?>" alt="User Avatar" class="w-8 h-8 rounded-full">
            </div>
            <div class="flex max-w-96 <?php echo $isIncoming ? 'bg-[#f4edde]' : 'bg-[#2ECC71] text-white'; ?> rounded-lg p-3 gap-3">
                <p><?php echo $messageText; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
// Fermer la connexion à la base de données
$pdo = null;
?>