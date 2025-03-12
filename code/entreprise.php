<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Requêtes sur les Employés et Salaires</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;700&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 20px;
        }

        h1, h2 {
            font-family: 'Barlow', sans-serif;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Requêtes sur les Employés et Salaires</h1>

<form method="post">
    <label for="requete">Choisissez une requête :</label>
    <select name="requete" id="requete">
        <option value="tous_employes">Tous les employés</option>
        <option value="tous_salaires">Tous les salaires</option>
        <option value="salaires_par_employe">Salaires par employé</option>
        <option value="total_salaire_par_employe">Salaire total par employé</option>
        <option value="max_salaire_par_employe">Salaire maximum par employé</option>
        <option value="min_salaire_par_employe">Salaire minimum par employé</option>
        <option value="nombre_salaires_par_employe">Nombre de salaires par employé</option>
        <option value="employes_salaire_sup_10000">Employés avec salaire > 10000</option>
    </select>
    <button type="submit">Exécuter la requête</button>
</form>

<?php
// Informations de connexion à la base de données
$servername = "172.16.15.74";

$username = "root";
$password = "root";
$dbname = "entreprise";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedRequete = $_POST['requete'];

    // Fonction pour exécuter une requête et afficher les résultats
    function executerRequete($conn, $requete, $titre) {
        $result = $conn->query($requete);
        if ($result->num_rows > 0) {
            echo "<h2>$titre</h2>";
            echo "<table><tr>";
            // Afficher les en-têtes
            while ($field = $result->fetch_field()) {
                echo "<th>" . $field->name . "</th>";
            }
            echo "</tr>";
            // Afficher les données
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $data) {
                    echo "<td>" . $data . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<h2>$titre</h2>";
            echo "<p>Aucun résultat trouvé.</p>";
        }
    }

    // Exécuter la requête sélectionnée
    switch ($selectedRequete) {
        case "tous_employes":
            executerRequete($conn, "SELECT * FROM employes", "Tous les employés");
            break;
        case "tous_salaires":
            executerRequete($conn, "SELECT * FROM salaires", "Tous les salaires");
            break;
        case "salaires_par_employe":
            executerRequete($conn, "SELECT e.nom, s.salaire FROM employes e JOIN salaires s ON e.id = s.employes_id", "Salaires par employé");
            break;
        case "total_salaire_par_employe":
            executerRequete($conn, "SELECT e.nom, SUM(s.salaire) AS total_salaire FROM employes e JOIN salaires s ON e.id = s.employes_id GROUP BY e.id, e.nom", "Salaire total par employé");
            break;
        case "max_salaire_par_employe":
            executerRequete($conn, "SELECT e.nom, MAX(s.salaire) AS max_salaire FROM employes e JOIN salaires s ON e.id = s.employes_id GROUP BY e.id, e.nom", "Salaire maximum par employé");
            break;
        case "min_salaire_par_employe":
            executerRequete($conn, "SELECT e.nom, MIN(s.salaire) AS min_salaire FROM employes e JOIN salaires s ON e.id = s.employes_id GROUP BY e.id, e.nom", "Salaire minimum par employé");
            break;
        case "nombre_salaires_par_employe":
            executerRequete($conn, "SELECT e.nom, COUNT(s.id) AS nombre_de_salaires FROM employes e JOIN salaires s ON e.id = s.employes_id GROUP BY e.id, e.nom", "Nombre de salaires par employé");
            break;
        case "employes_salaire_sup_10000":
            executerRequete($conn, "SELECT DISTINCT e.nom FROM employes e JOIN salaires s ON e.id = s.employes_id WHERE s.salaire > 10000", "Employés avec salaire > 10000");
            break;
    }

    // Fermer la connexion
    $conn->close();
}
?>

</body>
</html>
