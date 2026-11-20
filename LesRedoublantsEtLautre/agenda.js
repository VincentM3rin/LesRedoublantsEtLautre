document.addEventListener("DOMContentLoaded", () => {
    const colonnesJours = {
        "Lundi": 2,
        "Mardi": 4,
        "Mercredi": 6,
        "Jeudi": 8,
        "Vendredi": 10
    };

    function heureVersLigne(heure) {
        if (heure < 18) {
            return heure - 8 + 3;
        } else {
            return heure - 8 + 4;
        }
    }

    const events = document.querySelectorAll(".event");

    events.forEach(event => {
        const texteHeure = event.querySelector(".subtitle").textContent.trim();
        const [debutStr, finStr] = texteHeure.split("-").map(s => s.trim());
        const heureDebut = parseInt(debutStr.split(":")[0], 10);
        const heureFin = parseInt(finStr.split(":")[0], 10);

        const ligneDebut = heureVersLigne(heureDebut);
        const ligneFin = heureVersLigne(heureFin);
        event.style.gridRow = `${ligneDebut} / ${ligneFin}`;

        const jour = event.dataset.jour;
        const hall = parseInt(event.dataset.hall, 10) || 1;

        if (colonnesJours[jour]) {
            const colonne = colonnesJours[jour] + (hall - 1);
            event.style.gridColumn = colonne;
        }
    });
});
