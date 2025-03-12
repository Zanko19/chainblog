<?php include "start.php"; ?>  
<div class="max-w-md mx-auto my-12 bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold mb-6">Inscription</h1>
        <form action="../back/registration_process.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Prénom:</label>
                <input type="text" id="name" name="name"
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="surname" class="block text-gray-700">Nom:</label>
                <input type="text" id="surname" name="surname"
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="alias" class="block text-gray-700">Alias:</label>
                <input type="text" id="alias" name="alias"
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700">Localisation:</label>
                <input type="text" id="location" name="location"
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de passe:</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="secQ" class="block text-gray-700">Question de sécurité:</label>
                <select id="secQ" name="secQ" required
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
                    <option value="Nom du premier animal">Nom du premier animal</option>
                    <option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
                    <option value="Ville de naissance">Ville de naissance</option>
                    <option value="Nom de votre école primaire">Nom de votre école primaire</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="secA" class="block text-gray-700">Réponse à la question de sécurité:</label>
                <input type="text" id="secA" name="secA" required
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="profilPic" class="block text-gray-700">URL de la photo de profil:</label>
                <input type="text" id="profilPic" name="profilPic"
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <div class="mb-4">
                <label for="bio" class="block text-gray-700">Description:</label>
                <textarea id="bio" name="bio"
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]"></textarea>
            </div>

            <div class="mb-4">
                <label for="socials" class="block text-gray-700">Liens vers les réseaux sociaux:</label>
                <input type="text" id="socials" name="socials"
                    class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]">
            </div>

            <button type="submit"
                class="w-full py-2 mt-6 font-semibold text-white bg-[#2ECC71] rounded-md hover:bg-[#28A745] focus:outline-none focus:ring focus:ring-[#2ECC71]">S'inscrire</button>
        </form>
    </div>