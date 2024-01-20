<?php
session_start();

var_dump($_SESSION);

if (!isset($_SESSION['user_id'])) {
    header('Location: login.html'); 
    exit();
}


echo ('Bienvenue, ' . $_SESSION['username'] . '!'); 
