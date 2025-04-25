<?php
header('Content-Type: application/json');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/taches':
        require 'controllers/TacheController.php';
        break;
    default:
        echo json_encode(['message' => 'Route non trouvée']);
}
?>
<!DOCTYPE html>
<html lang="fr">    
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<title>Dashboard</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="max-w-md mx-auto bg-white shadow-xl rounded-2xl p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Bienvenue, <?= htmlspecialchars($user['nom']) ?> 👋</h1>
    <a href="logout.php" class="text-red-500 font-semibold">Déconnexion</a>
  </div>

<div class="max-w-md mx-auto bg-white shadow-xl rounded-2xl p-6">
  <h2 class="text-xl font-bold text-gray-800 mb-4">Ajouter une tâche</h2>
  <input type="text" placeholder="Titre de la tâche"
         class="w-full p-2 border border-gray-300 rounded-lg mb-3" />
  <textarea placeholder="Description"
            class="w-full p-2 border border-gray-300 rounded-lg mb-3"></textarea>
  <select class="w-full p-2 border border-gray-300 rounded-lg mb-3">
    <option>Tâche simple</option>
    <option>Tâche complexe</option>
    <option>Tâche récurrente</option>
  </select>
  <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">
    Créer
  </button>
</div>
</body>
</html>