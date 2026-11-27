<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="agenda.css">
</head>

<?php

require_once '../back/bdd.php';

?>

<body>

<?php 

require("./header.php");
?>

    
    <section class="section">
        <div class="container">
            <h1 class="title">Agenda</h1>

            <div class="agenda-grid">
                <div class="day-header" style="grid-column: 2 / 4; grid-row: 1;">Lundi</div>
                <div class="day-header" style="grid-column: 4 / 6; grid-row: 1;">Mardi</div>
                <div class="day-header" style="grid-column: 6 / 8; grid-row: 1;">Mercredi</div>
                <div class="day-header" style="grid-column: 8 / 10; grid-row: 1;">Jeudi</div>
                <div class="day-header" style="grid-column: 10 / 12; grid-row: 1;">Vendredi</div>

                <div class="hall-header" style="grid-column: 2; grid-row: 2;">Hall 1</div>
                <div class="hall-header" style="grid-column: 3; grid-row: 2;">Hall 2</div>
                
                <div class="hall-header" style="grid-column: 4; grid-row: 2;">Hall 1</div>
                <div class="hall-header" style="grid-column: 5; grid-row: 2;">Hall 2</div>

                <div class="hall-header" style="grid-column: 6; grid-row: 2;">Hall 1</div>
                <div class="hall-header" style="grid-column: 7; grid-row: 2;">Hall 2</div>

                <div class="hall-header" style="grid-column: 8; grid-row: 2;">Hall 1</div>
                <div class="hall-header" style="grid-column: 9; grid-row: 2;">Hall 2</div>

                <div class="hall-header" style="grid-column: 10; grid-row: 2;">Hall 1</div>
                <div class="hall-header" style="grid-column: 11; grid-row: 2;">Hall 2</div>

                <div class="day-header" style="grid-column: 2 / 12; grid-row: 13;">Soirée spéciale au hall 1</div>

                <div class="hour-label" style="grid-column: 1; grid-row: 3;">8h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 4;">9h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 5;">10h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 6;">11h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 7;">12h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 8;">13h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 9;">14h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 10;">15h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 11;">16h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 12;">17h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 14;">18h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 15;">19h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 16;">20h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 17;">21h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 18;">22h</div>
                <div class="hour-label" style="grid-column: 1; grid-row: 19;">23h</div>

                <article class="notification is-primary event" data-jour="Mardi" data-hall="1">
                    <p class="title is-size-6">Test 1</p>
                    <p class="subtitle is-size-7">8:00 - 10:00</p>
                </article>

                <article class="notification is-info event" data-jour="Lundi" data-hall="2">
                    <p class="title is-size-6">Test 2</p>
                    <p class="subtitle is-size-7">11:00 - 13:00</p>
                </article>
            </div>
        </div>
    </section>
    <script src="agenda.js"></script>
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
