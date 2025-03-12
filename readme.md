# Clone de Réseau Social

Ce projet est un clone de Twitter développé avec PHP, MySQL et jQuery, permettant aux utilisateurs de publier des messages, de suivre des contacts, de liker et de commenter des posts, ainsi que de personnaliser leur profil avec une photo.

## Fonctionnalités

### Authentification utilisateur
- Inscription, connexion et déconnexion sécurisées.

### Messagerie
- Envoi et réception de messages directs entre utilisateurs.

### Système de suivi
- Suivi et désabonnement d'autres utilisateurs pour personnaliser le fil d'actualités.

### Publication de posts
- Création de posts texte avec possibilité de les liker et commenter.

### Photo de profil
- Possibilité de télécharger une photo de profil pour personnaliser l'apparence du profil.

### Interaction en temps réel
- Utilisation de jQuery pour les mises à jour et interactions en temps réel.

## Installation

1. **Cloner le dépôt** :
    ```bash
    git clone https://github.com/Zanko19/chainblog.git
    ```

2. **Accédez au répertoire du projet** :
    ```bash
    cd chainblog
    ```

3. **Configurer la base de données** :
    - Créez une base de données MySQL.
    - Importez le fichier `database.sql` pour créer les tables nécessaires.
    - Modifiez les informations de connexion à la base de données dans `config.php`.

4. **Configurer l'environnement** :
    - Mettez à jour le fichier `db_connect` avec vos identifiants MySQL :
      ```ini
      DB_SERVERNAME=your_servername
      DB_USERNAME=your_username
      DB_PASSWORD=your_password
      DB_NAME=your_database
      ```

5. **Démarrer le serveur PHP** :
    ```bash
    php -S localhost:8000
    ```

6. **Accéder à l'application** :
    Ouvrez votre navigateur et rendez-vous sur :
    ```plaintext
    http://localhost:8000
    ```

## Dépendances

- **PHP** : Langage utilisé pour la logique côté serveur et la gestion des requêtes HTTP.
- **MySQL** : Système de gestion de base de données pour stocker les utilisateurs, posts et messages.
- **jQuery** : Bibliothèque JavaScript utilisée pour rendre l'application interactive en temps réel.
- **Bootstrap** (optionnel) : Framework CSS utilisé pour le design réactif et les composants UI.

## Utilisation

### Authentification utilisateur
1. **Inscription** : Créez un nouveau compte en vous inscrivant.
2. **Connexion** : Connectez-vous à votre compte pour accéder à la timeline et interagir avec le contenu.

### Gestion du profil
1. **Photo de profil** : Chargez une image pour personnaliser votre profil.
2. **Suivre d'autres utilisateurs** : Suivez des utilisateurs pour voir leurs posts dans votre fil d'actualités.

### Publication et interaction
1. **Créer des posts** : Partagez des pensées et des mises à jour avec la communauté.
2. **Liker des posts** : Laissez un "like" pour apprécier un post.
3. **Commenter des posts** : Discutez et échangez avec d'autres utilisateurs via les commentaires.

### Messagerie
1. **Envoyer des messages** : Discutez en privé avec d'autres utilisateurs.
2. **Recevoir des messages** : Consultez votre boîte de réception pour les nouveaux messages.

## Contribution

Si vous souhaitez contribuer à ce projet, n'hésitez pas à forker le dépôt et à soumettre des pull requests. Pour les changements majeurs, veuillez ouvrir une issue pour discuter des modifications proposées.

## Auteurs

- **Zanko19 - Guillaume Dedeurwaerder** : Front-end
- **Eneuem - Naïm Chelbat** : Back-end

## Contact

Pour toute question, suggestion ou retour, vous pouvez me contacter à :  
[guillaumeddw@hotmail.com](mailto:guillaumeddw@hotmail.com)
