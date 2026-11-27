<?php
session_start();
require('./back/bdd.php');

$message = "";

if (isset($_POST['btn_connexion'])) {
    $identifiant = trim($_POST['identifiant']);
    $mdp = $_POST['mdp'];

    if (!empty($identifiant) && !empty($mdp)) {
        $stmt = $sqli->prepare("SELECT idUser, nomUser, mdpUser FROM utilisateurs WHERE nomUser = ? OR emailUtil = ?");
        $stmt->bind_param("ss", $identifiant, $identifiant);
        $stmt->execute();
        $resultat = $stmt->get_result();

        if ($utilisateur = $resultat->fetch_assoc()) {
            if (hash('sha256', $mdp) === $utilisateur['mdpUser']) {
                $_SESSION['idUser'] = $utilisateur['idUser'];
                $_SESSION['nomUser'] = $utilisateur['nomUser'];
                header("Location: index.php");
                exit();
            } else {
                $message = "Mot de passe incorrect.";
            }
        } else {
            $message = "Aucun compte trouvé avec ce nom ou cet email.";
        }
        $stmt->close();
    } else {
        $message = "Veuillez remplir tous les champs pour vous connecter.";
    }
}

if (isset($_POST['btn_inscription'])) {
    $nom = trim($_POST['nom_inscr']);
    $email = trim($_POST['email_inscr']);
    $mdp = $_POST['mdp_inscr'];

    if (!empty($nom) && !empty($email) && !empty($mdp)) {
        $check = $sqli->prepare("SELECT idUser FROM utilisateurs WHERE nomUser = ? OR emailUtil = ?");
        $check->bind_param("ss", $nom, $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Ce nom d'utilisateur ou cet email est déjà utilisé.";
        } else {
            $mdpHash = hash('sha256', $mdp);
            
            $insert = $sqli->prepare("INSERT INTO utilisateurs (nomUser, emailUtil, mdpUser) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $nom, $email, $mdpHash);
            
            if ($insert->execute()) {
                $message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
            } else {
                $message = "Erreur lors de l'inscription.";
            }
            $insert->close();
        }
        $check->close();
    } else {
        $message = "Veuillez remplir tous les champs d'inscription.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>lesRedoublantsEtLautre</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <br><br><br><br>
    <div class="flex">
        <button onclick="window.location.href='index.php'">Accueil</button>
    </div>

    <?php if (!empty($message)): ?>
        <div class="flex">
            <p style="color: red; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
        </div>
    <?php endif; ?>

    <div class="flex">
        <div class="block" id="connect">
            <h2>Connexion</h2>
            <form method="POST" action="">
                <h1>Nom ou Mail : <input type="text" name="identifiant" required></h1>
                <h1>Mot de passe : <input type="password" name="mdp" required></h1>
                <button type="submit" name="btn_connexion">Se connecter</button>
            </form>
        </div>

        <div class="block" id="create">
            <h2>Inscription</h2>
            <form method="POST" action="" id="inscription">
                <h1>Nom : <input type="text" name="nom_inscr" required></h1>
                <h1>Mail : <input type="email" name="email_inscr" required></h1>
                <h1>Mot de passe : <input type="password" name="mdp_inscr" required></h1>
                <button type="submit" name="btn_inscription">S'inscrire</button>
            </form>
        </div>
    </div>

    <script src="./connectcreate.js"></script>

</body>
</html>
