<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>lesRedoublantsEtLautre</title>
    <link rel="stylesheet" href="index.css">
</head>

<?php

require("./back/bdd.php");

?>
<body>
    <br><br><br><br>
    <div class="flex">
    <button onclick="window.location.href='index.php'">Accueil</button>
    </div>
    <div class="flex">
        <div class="block">
            <h1>Nom ou Mail: <input></h1>
            <h1>Mots de passe: <input></h1>
            <button>Se connecter</button>
            <button>S'inscrire</button>
        </div>
    </div>

</body>
</html>