    
    <?php
require_once './config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
    $role = 'user';
    
    // Gestion image
    $image = null;
    if (isset($_FILES['image_profil']) && $_FILES['image_profil']['error'] === 0) {
        $image = 'uploads/' . uniqid() . '_' . $_FILES['image_profil']['name'];
        move_uploaded_file($_FILES['image_profil']['tmp_name'], $image);
    }
    
    $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, email, mot_de_passe, rôle, image_profil) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $email, $password, $role, $image]);
    
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  

<form action="" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg mt-10">
    <h2 class="text-2xl font-bold mb-4">Créer un compte</h2>
    <input type="text" name="nom" placeholder="Nom" class="w-full p-2 mb-3 border rounded" required>
    <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-3 border rounded" required>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" class="w-full p-2 mb-3 border rounded" required>
    <input type="file" name="image_profil" class="w-full p-2 mb-3 border rounded">
    <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">S'inscrire</button>
</form>


</body>
</html>