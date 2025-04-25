<?php
class Utilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($nom, $email, $mot_de_passe) {
        $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO Utilisateur (nom, email, mot_de_passe) VALUES (?, ?, ?)");
        $stmt->execute([$nom, $email, $hashedPassword]);
    }

    public function login($email, $mot_de_passe) {
        $stmt = $this->pdo->prepare("SELECT * FROM Utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            return $user;
        }

        return false;
    }
}
?>
