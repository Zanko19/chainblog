<?php include '../back/get_messages.php'; ?>

<div class="conversations-list  md:w[75%]">
    <?php foreach ($groupedMessages as $groupKey => $messages): ?>
        <!-- Utiliser data-group-key pour stocker la clé du groupe de conversation -->
        <div class="conversation-summary p-4 mb-4 cursor-pointer hover:bg-[#07ed5c] rounded-lg bg-[#2ECC71] text-white w-auto md:w-3/4 mx-auto" data-group-key="<?php echo $groupKey; ?>">
            Conversation entre <?php echo str_replace('-', ' et ', $groupKey); ?>
            <!-- Vous pouvez ajouter plus de détails ici si vous voulez -->
        </div>
    <?php endforeach; ?>
</div>


<script>
    // Ajouter un écouteur d'événements pour rediriger l'utilisateur vers la page de conversation
    document.querySelectorAll('.conversation-summary').forEach(item => {
        item.addEventListener('click', function() {
            const groupKey = this.getAttribute('data-group-key');
            // Rediriger vers la page de détail de conversation
            window.location.href = 'index.php?page=message-details&group=' + encodeURIComponent(groupKey);
        });
    });
</script>
