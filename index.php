<?php
session_start();
include('config/db.php');
include('models/Utilisateur.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de gestion de tâches</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 flex justify-between items-center">
        <a href="#" class="text-white text-xl font-bold">Gestion des Tâches</a>
        <div class="space-x-4">
            <button id="btnLogin" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Connexion</button>
            <button id="btnRegister" class="text-white hover:bg-blue-700 px-4 py-2 rounded">Inscription</button>
        </div>
    </nav>

    <!-- Formulaire de Connexion -->
    <div id="loginForm" class="hidden max-w-md mx-auto mt-10 bg-white shadow-xl rounded-lg p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Connexion</h2>
        <input type="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-lg mb-3">
        <input type="password" placeholder="Mot de passe" class="w-full p-2 border border-gray-300 rounded-lg mb-3">
        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Se connecter</button>
    </div>

    <!-- Formulaire d'Inscription -->
    <div id="registerForm" class="hidden max-w-md mx-auto mt-10 bg-white shadow-xl rounded-lg p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Inscription</h2>
        <input type="text" placeholder="Nom" class="w-full p-2 border border-gray-300 rounded-lg mb-3">
        <input type="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded-lg mb-3">
        <input type="password" placeholder="Mot de passe" class="w-full p-2 border border-gray-300 rounded-lg mb-3">
        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">S'inscrire</button>
    </div>

    <script>
        // Cacher les formulaires au début
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        // Boutons
        const btnLogin = document.getElementById('btnLogin');
        const btnRegister = document.getElementById('btnRegister');

        // Afficher le formulaire de Connexion
        btnLogin.addEventListener('click', function() {
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
        });

        // Afficher le formulaire d'Inscription
        btnRegister.addEventListener('click', function() {
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
        });
    </script>

</body>
</html>
