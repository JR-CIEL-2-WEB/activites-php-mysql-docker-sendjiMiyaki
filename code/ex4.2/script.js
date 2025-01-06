let tableau = [];

// Ajouter un entier au tableau
document.getElementById("addNumber").addEventListener("click", function () {
    const inputNumber = document.getElementById("inputNumber").value;
    const number = parseInt(inputNumber);

    if (number < 0) {
        alert("Fin de la saisie.");
        return;
    }

    tableau.push(number);

    // Afficher le tableau mis à jour
    document.getElementById("arrayDisplay").textContent = JSON.stringify(tableau);
    document.getElementById("inputNumber").value = ""; // Effacer l'input
});

// Envoyer le tableau au serveur mock
document.getElementById("sendArray").addEventListener("click", async function () {
    try {
        const response = await fetch("https://<id_du_mock>.mockapi.io/tableau", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ tableau: tableau }),
        });

        const data = await response.json();
        console.log("Réponse mockée :", data);

        // Afficher la médiane dans le DOM
        document.getElementById("mediane").textContent = `Médiane : ${data.mediane}`;
    } catch (error) {
        console.error("Erreur lors de la requête :", error);
    }
});
