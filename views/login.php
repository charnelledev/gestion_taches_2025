    
    <?php
require_once './config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    
    $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
    } else {
        $erreur = "Identifiants incorrects";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>connexion</title>
</head>
<body>
    

<form action="" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg mt-10">
    <h2 class="text-2xl font-bold mb-4">Connexion</h2>
    <?php if (isset($erreur)) echo "<p class='text-red-500'>$erreur</p>"; ?>
    <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-3 border rounded" required>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" class="w-full p-2 mb-3 border rounded" required>
    <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Se connecter</button>
</form>
</body>
</html>
