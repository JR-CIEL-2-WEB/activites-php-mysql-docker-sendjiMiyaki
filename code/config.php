<?php
// Bloc try-catch pour la connexion à la base de données (exemple avec PDO)
try {
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=nom_base', 'eleve', 'eleve');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Inclusion des fichiers nécessaires pour les calculs
    include 'ex0/moyenne.php';  // Fichier qui contient la fonction pour calculer la moyenne
    include 'ex0/statistique.php';   // Fichier qui contient la fonction pour calculer la médiane
    include 'ex4.1/tri_selection.php';     // Fichier qui contient la fonction pour trier les salaires

    // Récupération des salaires dans la base de données
    $sql = "SELECT salaire FROM employees"; // Exemple de requête pour récupérer les salaires
    $stmt = $pdo->query($sql);
    $salaires = [];

    // Stockage des salaires dans le tableau $salaires
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $salaires[] = $row['salaire'];
    }

    // Appel à la fonction pour calculer la médiane
    $mediane = calculerMediane($salaires);
    
    // Appel à la fonction pour calculer la moyenne
    $moyenne = calculerMoyenne($salaires);
    
    // Appel à la fonction pour trier les salaires
    trierSalaires($salaires);

    // Affichage des résultats
    echo "Médiane des salaires : " . $mediane . "<br>";
    echo "Moyenne des salaires : " . $moyenne . "<br>";
    echo "Salaires triés : <br>";
    print_r($salaires);
    
} catch (PDOException $e) {
    // En cas d'erreur dans la connexion à la base de données
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Exemple de fonctions (à adapter dans les fichiers inclus)

function calculerMediane($salaires) {
    sort($salaires); // Trier les salaires
    $count = count($salaires);
    $middle = floor($count / 2);
    
    if ($count % 2) {
        return $salaires[$middle]; // Médiane pour un nombre impair
    } else {
        return ($salaires[$middle - 1] + $salaires[$middle]) / 2; // Médiane pour un nombre pair
    }
}

function calculerMoyenne($salaires) {
    return array_sum($salaires) / count($salaires);
}

function trierSalaires(&$salaires) {
    sort($salaires); // Trier les salaires par ordre croissant
}
?>
