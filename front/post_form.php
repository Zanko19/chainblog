<div class="max-w-md mx-auto my-12 bg-white p-6 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold mb-6">Créer un post</h1>
    <form action="../back/post_process.php" method="POST">
        <div class="mb-4">
            <label for="body" class="block text-gray-700">Contenu du post:</label>
            <textarea id="body" name="body" rows="4" required
                class="w-full px-3 py-2 mt-1 text-gray-700 border rounded-md focus:outline-none focus:border-[#2ECC71]"></textarea>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
        <button type="submit"
            class="w-full py-2 mt-6 font-semibold text-white bg-[#2ECC71] rounded-md hover:bg-[#28A745] focus:outline-none focus:ring focus:ring-[#2ECC71]">Poster</button>
    </form>
</div>