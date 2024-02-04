<div id="messageModal" class="hidden fixed inset-0 z-50 overflow-y-auto flex items-center justify-center">
    <div class="bg-white p-4 rounded-lg shadow-md w-full sm:w-96">
        <h1 class="text-xl font-semibold mb-4">Nouveau Message</h1>
        <form action="#" method="post">
            <div class="mb-4">
                <label for="message" class="block text-gray-600">Message :</label>
                <textarea id="message" name="message" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-400" placeholder="Tapez votre message ici" rows="6" required></textarea>
            </div>
            <input type="text" id="receiver" class="hidden" value="<?php echo $user['USERNAME']; ?>"/>
            <input type="text" id="sender" class="hidden" value="<?php echo $_SESSION['username']; ?>"/>
        

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700">Envoyer</button>
           
            <button id="closeModalMessBtn" class="mt-2 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Annuler
            </button>
            </div>
        </form>
    </div>
</div>
<script>

    const openModalBtn = document.getElementById('openModalBtn');
    const messageModal = document.getElementById('messageModal');
    const messageForm = messageModal.querySelector('form');
    const receiverUsername = document.getElementById('receiver');

    openModalBtn.addEventListener('click', () => {
        messageModal.classList.remove('hidden');
    });
    ////////////////////////////////
    messageForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const receiver = messageForm.querySelector('#receiver').value; // Utiliser le nom d'utilisateur
    const message = messageForm.querySelector('#message').value;

    // Créez un objet FormData et ajoutez les données du formulaire
    const formData = new FormData();
    formData.append('receiver', receiver);
    formData.append('message', message);

    fetch('../back/message_send.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
            messageModal.classList.add('hidden');
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Erreur lors de la requête AJAX :', error);
        alert('Une erreur est survenue lors de l\'envoi du message.');
    });
});





    $("#closeModalMessBtn").click(function() {
        $("#messageModal").addClass("hidden");
    });
</script>

