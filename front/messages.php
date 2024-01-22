<?php include '../back/get_messages.php' ?>

<?php foreach ($messages as $message): ?>
            <?php
                $senderUsername = htmlspecialchars($message['sender_username']);
                $receiverUsername = htmlspecialchars($message['receiver_username']);
                $messageText = htmlspecialchars($message['message_text']);
                $sentAt = htmlspecialchars($message['sent_at']);
            ?>

            <!-- Vous pouvez formater et afficher les détails du message ici -->
            <div class="message flex items-center mb-4 cursor-pointer hover:bg-[#07ed5c] p-2 rounded-md m-2 bg-[#2ECC71]">
    <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
        <!-- Vous pouvez ajouter une image de profil ici -->
        <!-- <img src="chemin_vers_l_image" alt="User Avatar" class="w-12 h-12 rounded-full"> -->
    </div>
    <div class="flex-1">
        <h2 class="text-lg font-semibold">De : <?php echo $senderUsername; ?></h2>
        <h2 class="text-lg font-semibold">À : <?php echo $receiverUsername; ?></h2>
        <p class="text-gray-600">Message : <?php echo $messageText; ?></p>
        <p class="text-gray-600">Envoyé à : <?php echo $sentAt; ?></p>
    </div>
</div>

        <?php endforeach; ?>