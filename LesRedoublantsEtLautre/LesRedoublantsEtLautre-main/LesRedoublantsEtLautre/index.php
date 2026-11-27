<?php
require_once '../back/bdd.php';

$resPop = $sqli->query("SELECT * FROM evenement LIMIT 3");
$populaires = $resPop->fetch_all(MYSQLI_ASSOC);

$resPlaces = $sqli->query("SELECT * FROM evenement ORDER BY `nombrePlaceLimité` ASC LIMIT 3");
$dernieresPlaces = $resPlaces->fetch_all(MYSQLI_ASSOC);

$resNew = $sqli->query("SELECT * FROM evenement ORDER BY idEvenement DESC LIMIT 3");
$nouveautes = $resNew->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>lesRedoublantsEtLautre</title>
    <link rel="stylesheet" href="index.css">
</head>

<?php require("./header.php"); ?>

<body>

    <h1 class="titre">Marseille Game mounth</h1>
    <br>
    <h1>Les évènements les plus populaire</h1>
    
    <div class="flex">
        <?php foreach ($populaires as $event): ?>
            <div class="block">
                <img class="event" src="<?= htmlspecialchars($event['imgEvenement']) ?>" alt="<?= htmlspecialchars($event['nomEvenement']) ?>">
                <h1 class="titre"><?= htmlspecialchars($event['nomEvenement']) ?></h1>
                <button>Information</button>
                <button>S'inscrire</button>
            </div>
        <?php endforeach; ?>
    </div>

    <p class="ligne"></p>
    <h1>Dernières places !</h1>
    
    <div class="flex">
        <?php foreach ($dernieresPlaces as $event): ?>
            <div class="block">
                <img class="event" src="<?= htmlspecialchars($event['imgEvenement']) ?>" alt="<?= htmlspecialchars($event['nomEvenement']) ?>">
                <h1 class="titre"><?= htmlspecialchars($event['nomEvenement']) ?></h1>
                <button>Information</button>
                <button>S'inscrire</button>
                <?php if ($event['nombrePlaceLimité'] <= 20): ?>
                    <p class="danger"><?= htmlspecialchars($event['nombrePlaceLimité']) ?> places</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <p class="ligne"></p>
    <h1>Les nouveautés</h1>
    
    <div class="flex">
        <?php foreach ($nouveautes as $event): ?>
            <div class="block">
                <img class="event" src="<?= htmlspecialchars($event['imgEvenement']) ?>" alt="<?= htmlspecialchars($event['nomEvenement']) ?>">
                <h1 class="titre"><?= htmlspecialchars($event['nomEvenement']) ?></h1>
                <button>Information</button>
                <button>S'inscrire</button>
            </div>
        <?php endforeach; ?>
    </div>

    <footer>
        <div class="foot">
            <h1 class="titre">Nom de l'hotel</h1>
            <h1 class="titre">53-61 Rue de la Commune de Paris, 93300 Aubervilliers</h1>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.2614256246184!2d2.37777677541522!3d48.91041129704538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66c248416c5b7%3A0xf33aa3cdc0fea273!2sibis%20budget%20Paris%20Aubervilliers!5e0!3m2!1sfr!2sfr!4v1795183343810!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            <h1 class="titre">07 82 64 78 11</h1>
            <h1 class="titre">Email.mail@email.com</h1>
            <br>
        </div>
    </footer>
</body>
</html>
