<?php
class Tache {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addTask($titre, $description, $type, $id_utilisateur) {
        $stmt = $this->pdo->prepare("INSERT INTO Tache (titre, description, type, id_utilisateur) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titre, $description, $type, $id_utilisateur]);
    }

    public function getTasksByUser($id_utilisateur) {
        $stmt = $this->pdo->prepare("SELECT * FROM Tache WHERE id_utilisateur = ?");
        $stmt->execute([$id_utilisateur]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
