<?php
session_start();
require_once __DIR__ . '/../models/Utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        Utilisateur::register($_POST['nom'], $_POST['email'], $_POST['mot_de_passe']);
        header('Location: ../views/login.php');
    }

    if (isset($_POST['login'])) {
        $user = Utilisateur::login($_POST['email'], $_POST['mot_de_passe']);
        if ($user) {
            $_SESSION['user'] = $user;
            header('Location: ../views/dashboard.php');
        } else {
            echo "Identifiants incorrects.";
        }
    }
}
