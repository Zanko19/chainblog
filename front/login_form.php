<script src="https://cdn.tailwindcss.com"></script>
<div class="max-w-md mx-auto my-12 bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-6">Connexion</h1>
    <form action="../back/login_process.php" method="POST">
        <div class="mb-4">
            <label for="username" class="block text-gray-700">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required
                class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Mot de passe:</label>
            <input type="password" id="password" name="password" required
                class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
        </div>

        <button type="submit"
            class="w-full py-2 mt-6 font-semibold text-white bg-[#2ECC71] rounded-md hover:bg-[#28A745] focus:outline-none focus:ring focus:ring-[#2ECC71]">Se
            connecter</button>
    </form>

    <div class="mt-4 text-center">
        <p class="text-gray-600">Pas encore inscrit ? <a href="registration_form.php" class="text-[#2ECC71]">Inscrivez-vous</a></p>
        <p class="text-gray-600">Mot de passe oublié ? <a href="mot_de_passe_oublie.php" class="text-[#2ECC71]">Réinitialisez-le</a></p>
    </div>
</div>
