<?php
session_start();
include('config/db.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Récupérer les tâches de l'utilisateur connecté
$stmt = $pdo->prepare("SELECT * FROM Tache WHERE id_utilisateur = :id_utilisateur");
$stmt->bindParam(':id_utilisateur', $user_id);
$stmt->execute();
$taches = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-6 mt-10 rounded-lg shadow-lg">
        <nav class="flex justify-between items-center mb-6">
            <div class="text-xl font-bold text-gray-700">
                Bienvenue, <?= htmlspecialchars($_SESSION['user_name']); ?>
            </div>
            <div>
                <a href="logout.php" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">Se déconnecter</a>
            </div>
        </nav>

        <h2 class="text-xl font-bold text-gray-700 mb-4">Mes Tâches</h2>

        <div class="mb-4">
            <a href="tasks_add.php" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Ajouter une tâche</a>
        </div>

        <div class="mb-4">
            <a href="tasks.php" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Voir mes tâches</a>
        </div>

        <ul>
            <?php foreach ($taches as $tache) : ?>
                <li class="border-b py-2">
                    <strong><?= htmlspecialchars($tache['titre']) ?></strong> - <?= htmlspecialchars($tache['description']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
