<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Destruction de la session
    session_destroy();
    // Redirection vers la page de connexion
    header("Location: login.php");
    exit;
} else {
    // Redirection vers la page de connexion
    header("Location: login.php");
    exit;
}
?>