<?php
session_start();
session_destroy();
header("Location: ../front/index.php"); // Remplacez 'login.php' par le chemin de la page de connexion
exit();
?>
