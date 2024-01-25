<?php
include '../back/get_messages.php';

$groupKey = isset($_GET['group']) ? $_GET['group'] : '';
if (!isset($groupedMessages[$groupKey])) {
    echo "Conversation introuvable.";
    exit;
}

$messages = $groupedMessages[$groupKey];

$participants = explode('-', $groupKey);
$sender = $participants[0];
$receiver = $participants[1];

if ($_SESSION['username'] === $sender) {
    $otherUser = $receiver;
} else {
    $otherUser = $sender;
}
?>

<div class="flex flex-col h-screen">
    <div class="conversation-details p-10 flex-1 overflow-y-auto">
        <h1 class="group-title text-xl font-semibold text-center fixed left-[50%]"><?php echo '@' . $otherUser; ?></h1>
        <?php foreach (array_reverse($messages) as $index => $message): ?>
    <?php


            $senderUsername = htmlspecialchars($message['sender_username']);
            $receiverUsername = htmlspecialchars($message['receiver_username']);
            $messageText = htmlspecialchars($message['message_text']);
            $sentAt = htmlspecialchars($message['sent_at']);

            // Nouveaux noms de variables pour le format de conception
            $isCurrentUser = ($senderUsername === $_SESSION['username']);
            $avatarPlaceholder = 'https://placehold.co/200x/ffa8e4/ffffff.svg?text=' . substr($senderUsername, 0, 1) . '&font=Lato';
            $messageBackgroundColor = $isCurrentUser ? 'bg-[#2ECC71] text-white' : 'bg-[#f4edde]';
            $avatarImage = $isCurrentUser ? 'https://placehold.co/200x/b7a8ff/ffffff.svg?text=ME&font=Lato' : $avatarPlaceholder;
            ?>
<div class="flex mt-10 <?php echo $isCurrentUser ? 'justify-end' : ''; ?>" <?php if ($index === 0) echo 'id="lastMessage"'; ?>>                <?php if (!$isCurrentUser) : ?>
                    <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                        <img src="<?php echo $avatarImage; ?>" alt="User Avatar" class="w-8 h-8 rounded-full">
                    </div>
                <?php endif; ?>
                <div class="flex max-w-96 <?php echo $messageBackgroundColor; ?> rounded-lg p-3 gap-3">
                    <p><?php echo $messageText; ?></p>
                </div>
                <?php if ($isCurrentUser) : ?>
                    <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                        <img src="<?php echo $avatarImage; ?>" alt="My Avatar" class="w-8 h-8 rounded-full">
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php

    $currentUser = $_SESSION['username'];
    $isCurrentUserSender = ($currentUser === $sender);

    $responseReceiver = $isCurrentUserSender ? $receiver : $sender;

    ?>



    <div class="send-message-container px-10 mb-3">
        <form id="sendMessageForm" action="../back/message_chat.php" method="post">
            <div class="mb-4">
                <label for="message" class="block text-gray-600"></label>
                <textarea id="message" name="message" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-400" placeholder="Tapez votre message ici" rows="4" required></textarea>
            </div>
            <input type="hidden" id="receiver" name="receiver" value="<?php echo htmlspecialchars($responseReceiver); ?>" />
            <input type="hidden" id="sender" name="sender" value="<?php echo htmlspecialchars($currentUser); ?>" />

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700">Envoyer</button>
            </div>
        </form>
    </div>
</div>

