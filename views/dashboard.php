

<form method="POST" enctype="multipart/form-data" action="../controllers/UploadController.php">
  <input type="file" name="image_profil" />
  <button class="bg-green-500 text-white px-4 py-2">Uploader</button>
</form>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-bold text-blue-600">Bienvenue, <?= htmlspecialchars($user['nom']) ?> 👋</h1>
      <a href="logout.php" class="text-red-500 font-semibold">Déconnexion</a>
    </div>

    <?php if ($user['image_profil']): ?>
      <img src="../uploads/<?= htmlspecialchars($user['image_profil']) ?>" class="w-24 h-24 rounded-full border mb-4">
    <?php else: ?>
      <p class="text-sm text-gray-500">Pas encore d’image de profil</p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" action="../controllers/UploadController.php" class="mb-6">
      <label class="block font-semibold mb-2">Changer l’image de profil :</label>
      <input type="file" name="image_profil" class="mb-2" />
      <button class="bg-green-500 text-white px-4 py-2 rounded">Uploader</button>
    </form>

    <h2 class="text-xl font-semibold mb-2">Tes tâches</h2>
    <div id="tacheContainer" class="space-y-2">
      <!-- Les tâches seront affichées ici via JS -->
    </div>
  </div>

  <script>
    fetch('../controllers/TacheController.php?id_user=<?= $user["id"] ?>')
      .then(res => res.json())
      .then(data => {
        const container = document.getElementById('tacheContainer');
        if (data.length === 0) {
          container.innerHTML = "<p class='text-gray-500'>Aucune tâche pour l'instant.</p>";
          return;
        }
        data.forEach(t => {
          const div = document.createElement('div');
          div.className = 'p-4 bg-gray-100 rounded shadow';
          div.innerHTML = `<h3 class="text-lg font-semibold">${t.titre}</h3><p>${t.description}</p><p class="text-sm text-gray-500">${t.type} - échéance : ${t.échéance ?? 'Aucune'}</p>`;
          container.appendChild(div);
        });
      });
  </script>
</body>
</html>



