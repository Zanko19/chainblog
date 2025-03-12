<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-4 rounded-lg shadow-md w-full sm:w-96">
        <h1 class="text-xl font-semibold mb-4">Nouveau Message</h1>
        <form action="#" method="post">
            <div class="mb-4">
                <label for="receiver" class="block text-gray-600">Destinataire :</label>
                <input type="text" id="receiver" name="receiver" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-400" placeholder="Nom d'utilisateur du destinataire" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-600">Message :</label>
                <textarea id="message" name="message" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-400" placeholder="Tapez votre message ici" rows="4" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700">Envoyer</button>
            </div>
        </form>
    </div>
</body>