CREATE TABLE users (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    USERNAME VARCHAR(255) UNIQUE NOT NULL,
    PASSWORD CHAR(60) NOT NULL, -- Utilisez CHAR(60) pour stocker les hashs de mot de passe (par exemple, avec bcrypt)
    EMAIL VARCHAR(255) UNIQUE NOT NULL, -- Contrainte d'unicité sur l'adresse e-mail
    name VARCHAR(255), -- Prénom de l'utilisateur
    surname VARCHAR(255), -- Nom de l'utilisateur
    alias VARCHAR(255), -- Alias de l'utilisateur
    SecQ VARCHAR(255), -- Question de sécurité
    SecA VARCHAR(255), -- Réponse à la question de sécurité
    Created DATETIME NOT NULL,
    Deleted DATETIME, -- Date de suppression du compte (NULL si non supprimé)
    is_deleted BOOLEAN DEFAULT FALSE, -- Marqueur de suppression (TRUE si le compte est supprimé)
    profilPic VARCHAR(255), -- URL de la photo de profil
    bio TEXT, -- Description de l'utilisateur (peut être plus longue)
    socials TEXT, -- Liens vers les réseaux sociaux (peut être stocké en tant que chaîne JSON, par exemple)
    followerCount INT DEFAULT 0,
    followingCount INT DEFAULT 0,
    slug VARCHAR(255) UNIQUE NOT NULL -- Slug (URL conviviale) unique pour chaque utilisateur
);
