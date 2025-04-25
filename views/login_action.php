<?php
session_start();
include('config/db.php');

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification dans la base de données
    $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        // Mot de passe valide, création de la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['rôle']; // admin ou user
        $_SESSION['user_name'] = $user['nom'];

        // Redirection selon le rôle
        if ($user['rôle'] == 'admin') {
            header("Location: admin_dashboard.php"); // Page pour l'admin
        } else {
            header("Location: tasks.php"); // Page pour l'utilisateur normal
        }
        exit();
    } else {
        // Si l'authentification échoue
        $_SESSION['error'] = 'Email ou mot de passe incorrect';
        header("Location: login.php");
        exit();
    }
}
?>
