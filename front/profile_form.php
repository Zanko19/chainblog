<?php

$pdo = new PDO('mysql:host=localhost;dbname=blogchain', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userID = $_SESSION['user_id'];

if (!isset($userID) || empty($userID)) {
    echo "L'utilisateur n'est pas authentifié.";
    exit;
}

try {
    // Requête pour récupérer les données de l'utilisateur connecté
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

<body class="bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white rounded-lg p-6 shadow-md">
    <h1 class="text-2xl font-semibold mb-6">Formulaire de Modification de Profil</h1>
    <form action="../back/profile_modify.php" method="POST">

        <!-- Champ USERNAME (pré-rempli avec la valeur actuelle) -->
        <label for="USERNAME" class="block text-gray-600">Nom d'utilisateur :</label>
        <input type="text" name="USERNAME" id="USERNAME" value="<?php echo $row['USERNAME']; ?>" required>
        
        <!-- Champ PASSWORD (pré-rempli avec la valeur actuelle) -->
        <label for="PASSWORD" class="block text-gray-600">Mot de passe :</label>
        <input type="password" name="PASSWORD" id="PASSWORD" value="<?php echo $row['PASSWORD']; ?>" required>
        
        <!-- Champ EMAIL (pré-rempli avec la valeur actuelle) -->
        <label for="EMAIL" class="block text-gray-600">Adresse e-mail :</label>
        <input type="email" name="EMAIL" id="EMAIL" value="<?php echo $row['EMAIL']; ?>" required>

        <!-- Champ name (pré-rempli avec la valeur actuelle) -->
        <label for="name" class="block text-gray-600">Prénom :</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>

        <!-- Champ surname (pré-rempli avec la valeur actuelle) -->
        <label for="surname" class="block text-gray-600">Nom :</label>
        <input type="text" name="surname" id="surname" value="<?php echo $row['surname']; ?>" required>

        <!-- Champ alias (pré-rempli avec la valeur actuelle) -->
        <label for="alias" class="block text-gray-600">Alias :</label>
        <input type="text" name="alias" id="alias" value="<?php echo $row['alias']; ?>" required>

        <!-- Champ SecQ (pré-rempli avec la valeur actuelle) -->
        <label for="SecQ" class="block text-gray-600">Question de sécurité :</label>
        <input type="text" name="SecQ" id="SecQ" value="<?php echo $row['SecQ']; ?>" required>

        <!-- Champ SecA (pré-rempli avec la valeur actuelle) -->
        <label for="SecA" class="block text-gray-600">Réponse à la question de sécurité :</label>
        <input type="text" name="SecA" id="SecA" value="<?php echo $row['SecA']; ?>" required>

        <!-- Champ profilPic (pré-rempli avec la valeur actuelle) -->
        <label for="profilPic" class="block text-gray-600">Photo de profil :</label>
        <input type="text" name="profilPic" id="profilPic" value="<?php echo $row['profilPic']; ?>" required>

        <!-- Champ bio (pré-rempli avec la valeur actuelle) -->
        <label for="bio" class="block text-gray-600">Biographie :</label>
        <input type="text" name="bio" id="bio" value="<?php echo $row['bio']; ?>" required>

        <!-- Champ socials (pré-rempli avec la valeur actuelle) -->
        <label for="socials" class="block text-gray-600">Réseaux sociaux :</label>
        <input type="text" name="socials" id="socials" value="<?php echo $row['socials']; ?>" >

        <input class="hidden" type="text" name="ID" id="ID" value="<?php echo $row['ID']; ?>" >

        <!-- Champ location (pré-rempli avec la valeur actuelle) -->
        <label for="location" class="block text-gray-600">Localisation :</label>
        <input type="text" name="location" id="location" value="<?php echo $row['location']; ?>" >
        <br><br>
        <input type="submit" value="Enregistrer les Modifications" class="bg-green-600 text-white font-semibold px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:bg-green-700 cursor-pointer">
    </form>
    </div>
</body>
