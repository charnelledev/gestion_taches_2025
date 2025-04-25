<!-- login.php -->
<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: tasks.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-6 mt-10 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4 text-center text-gray-700">Connexion</h2>
        <form action="login_action.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Se connecter</button>
        </form>
        <p class="mt-4 text-center text-gray-600">
            Pas encore de compte ? <a href="register.php" class="text-blue-500">Inscrivez-vous ici</a>
        </p>
    </div>
</body>
</html>
