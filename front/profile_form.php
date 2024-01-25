<?php

include '../back/db_connect.php';

$userID = $_SESSION['user_id'];

if (!isset($userID) || empty($userID)) {
    echo "L'utilisateur n'est pas authentifié.";
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE ID = ?");
    $stmt->execute([$userID]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "L'utilisateur n'a pas été trouvé.";
        exit;
    }
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des données de l'utilisateur : " . $e->getMessage();
    exit;
}


?>
<div class="flex flex-col h-[95%]">
<div class="overflow-y-auto">
<div class="bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white rounded-lg p-6 shadow-md">
    <h1 class="text-2xl font-semibold mb-6">Formulaire de Modification de Profil</h1>
    <form action="../back/profile_modify.php" method="POST">

        <label for="USERNAME" class="block text-gray-600">Nom d'utilisateur :</label>
        <input type="text" name="USERNAME" id="USERNAME" value="<?php echo $row['USERNAME']; ?>" required>
        
        <label for="PASSWORD" class="block text-gray-600">Mot de passe :</label>
        <input type="password" name="PASSWORD" id="PASSWORD" value="<?php echo $row['PASSWORD']; ?>" required>
        
        <label for="EMAIL" class="block text-gray-600">Adresse e-mail :</label>
        <input type="email" name="EMAIL" id="EMAIL" value="<?php echo $row['EMAIL']; ?>" required>

        <label for="name" class="block text-gray-600">Prénom :</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>

        <label for="surname" class="block text-gray-600">Nom :</label>
        <input type="text" name="surname" id="surname" value="<?php echo $row['surname']; ?>" required>

        <label for="alias" class="block text-gray-600">Alias :</label>
        <input type="text" name="alias" id="alias" value="<?php echo $row['alias']; ?>" required>

        <label for="SecQ" class="block text-gray-600">Question de sécurité :</label>
        <input type="text" name="SecQ" id="SecQ" value="<?php echo $row['SecQ']; ?>" required>

        <label for="SecA" class="block text-gray-600">Réponse à la question de sécurité :</label>
        <input type="text" name="SecA" id="SecA" value="<?php echo $row['SecA']; ?>" required>

        <label for="profilPic" class="block text-gray-600">Photo de profil :</label>
        <input type="text" name="profilPic" id="profilPic" value="<?php echo $row['profilPic']; ?>" required>

        <label for="bio" class="block text-gray-600">Biographie :</label>
        <input type="text" name="bio" id="bio" value="<?php echo $row['bio']; ?>" required>

        <label for="socials" class="block text-gray-600">Réseaux sociaux :</label>
        <input type="text" name="socials" id="socials" value="<?php echo $row['socials']; ?>" >

        <input class="hidden" type="text" name="ID" id="ID" value="<?php echo $row['ID']; ?>" >

        <label for="location" class="block text-gray-600">Localisation :</label>
        <input type="text" name="location" id="location" value="<?php echo $row['location']; ?>" >
        <br><br>
        <input type="submit" value="Enregistrer les Modifications" class="bg-green-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700 cursor-pointer">
    </form>
    </div>
</div>
</div>
</div>
