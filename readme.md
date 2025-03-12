# Clone de réseau social

Un clone de Twitter développé avec PHP, MySQL et jQuery pour l'interactivité. Cette application permet aux utilisateurs de publier des messages, de suivre des contacts, de liker et commenter des posts, et de charger une photo de profil.

## Fonctionnalités

- **Authentification utilisateur** : Inscription, connexion et déconnexion.
- **Messagerie** : Envoyer et recevoir des messages entre utilisateurs.
- **Système de suivi** : Suivre et ne plus suivre d'autres utilisateurs.
- **Publication de posts** : Créer des posts qui peuvent être likés et commentés.
- **Photo de profil** : Charger une photo de profil.
- **Like et commentaire** : Liker et commenter des posts.
- **Interactions en temps réel** : jQuery utilisé pour les mises à jour et l'interactivité en temps réel.

## Installation

1. **Cloner le dépôt** :
    ```sh
    git clone https://github.com/Eneuem/chainblog.git
    ```

2. **Naviguer dans le répertoire du projet** :
    ```sh
    cd chainblog
    ```

3. **Configurer la base de données** :
    - Créer une base de données MySQL.
    - Importer le fichier `database.sql` pour configurer les tables nécessaires.
    - Mettre à jour la configuration de la base de données dans `config.php`.

4. **Configurer votre environnement** :
    - Complétez le fichier `db_connect` et ajoutez vos identifiants de base de données :
      ```plaintext
      DB_SERVERNAME=your_servername
      DB_USERNAME=your_username
      DB_PASSWORD=your_password
      DB_NAME=your_database
      ```

5. **Démarrer le serveur PHP** :
    ```sh
    php -S localhost:8000
    ```

6. **Ouvrir votre navigateur et naviguer vers** :
    ```plaintext
    http://localhost:8000
    ```

## Dépendances

- **PHP** : Logique backend et scripts côté serveur.
- **MySQL** : Gestion de base de données.
- **jQuery** : Interactivité et mises à jour en temps réel sur le frontend.
- **Bootstrap** : (Optionnel) Pour un design réactif et des composants UI.

## Utilisation

### Authentification utilisateur

1. **Inscription** : Créer un nouveau compte en s'inscrivant.
2. **Connexion** : Accéder à votre compte en vous connectant.

### Gestion du profil

1. **Mettre à jour la photo de profil** : Charger une photo de profil depuis les paramètres de votre profil.
2. **Suivre des utilisateurs** : Suivre d'autres utilisateurs pour voir leurs posts sur votre timeline.

### Publication et interaction

1. **Créer des posts** : Partager vos pensées en créant un post.
2. **Liker des posts** : Liker des posts pour montrer votre appréciation.
3. **Commenter des posts** : Participer à des discussions en commentant des posts.

### Messagerie

1. **Envoyer des messages** : Communiquer avec d'autres utilisateurs en envoyant des messages.
2. **Recevoir des messages** : Consulter votre boîte de réception pour voir les nouveaux messages.

## Contribution

N'hésitez pas à forker ce dépôt et à soumettre des pull requests. Pour les changements majeurs, veuillez ouvrir une issue d'abord pour discuter de ce que vous souhaitez modifier.
