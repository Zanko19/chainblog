<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="../back/registration_process.php" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="name">Prénom:</label>
        <input type="text" id="name" name="name"><br>

        <label for="surname">Nom:</label>
        <input type="text" id="surname" name="surname"><br>

        <label for="alias">Alias:</label>
        <input type="text" id="alias" name="alias"><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="secQ">Question de sécurité:</label>
        <select id="secQ" name="secQ" required>
            <option value="Nom du premier animal">Nom du premier animal</option>
            <option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
            <option value="Ville de naissance">Ville de naissance</option>
            <option value="Nom de votre école primaire">Nom de votre école primaire</option>
        </select><br>


        <label for="secA">Réponse à la question de sécurité:</label>
        <input type="text" id="secA" name="secA" required><br>

        <label for="profilPic">URL de la photo de profil:</label>
        <input type="text" id="profilPic" name="profilPic"><br>

        <label for="bio">Description:</label>
        <textarea id="bio" name="bio"></textarea><br>

        <label for="socials">Links</label>
        <input type="text" id="socials" name="socials"><br>

        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
