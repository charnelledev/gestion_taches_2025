<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if (isset($_FILES['image_profil']) && $_FILES['image_profil']['error'] === 0) {
    $filename = uniqid() . '_' . $_FILES['image_profil']['name'];
    move_uploaded_file($_FILES['image_profil']['tmp_name'], "../uploads/$filename");

    $stmt = $pdo->prepare("UPDATE Utilisateur SET image_profil = ? WHERE id = ?");
    $stmt->execute([$filename, $_SESSION['user']['id']]);
    $_SESSION['user']['image_profil'] = $filename;
    header("Location: ../views/dashboard.php");
}
