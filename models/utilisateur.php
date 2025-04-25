<?php
require_once __DIR__ . '/../config/db.php';

class Utilisateur {
    public static function register($nom, $email, $mot_de_passe) {
        global $pdo;
        $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email, mot_de_passe, rôle) VALUES (?, ?, ?, 'user')");
        return $stmt->execute([$nom, $email, $hash]);
    }

    public static function login($email, $mot_de_passe) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            return $user;
        }
        return false;
    }
}
