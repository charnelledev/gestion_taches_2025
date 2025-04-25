<?php
require_once __DIR__ . '/../config/db.php';

class Tache {
    public static function getByUser($id_user) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Tache WHERE id_utilisateur = ?");
        $stmt->execute([$id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($titre, $desc, $type, $echeance, $id_user) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Tache (titre, description, type, échéance, id_utilisateur) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$titre, $desc, $type, $echeance, $id_user]);
    }
}
