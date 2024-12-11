<?php
// Configuration de l'en-tête pour permettre les requêtes CORS et définir le type de contenu en JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Vérifier si un id est fourni via la requête GET
if (isset($_GET['id'])) {
    $idDemande = $_GET['id']; // Récupérer l'id de la requête

    // Chemin vers le fichier JSON contenant les données des courses
    $fichierJson = 'courses.json';

    // Vérifier si le fichier JSON existe
    if (file_exists($fichierJson)) {
        // Lire le contenu du fichier JSON
        $contenuJson = file_get_contents($fichierJson);

        // Convertir le contenu JSON en tableau PHP
        $donnees = json_decode($contenuJson, true);

        // Vérifier que la conversion JSON a réussi
        if ($donnees === null) {
            echo json_encode(["error" => "Erreur lors de la lecture du fichier JSON."]);
            exit;
        }

        // Parcourir les données pour trouver la course correspondante
        foreach ($donnees as $course) {
            if ($course['id'] == $idDemande) {
                // Retourner les informations de la course demandée
                echo json_encode([
                    "name" => $course['name'],
                    "markers" => $course['markers']
                ]);
                exit;
            }
        }

        // Si aucune course ne correspond à l'id, retourner une erreur
        echo json_encode(["error" => "Course non trouvée pour l'id fourni."]);
    } else {
        // Si le fichier JSON n'existe pas, retourner une erreur
        echo json_encode(["error" => "Le fichier JSON est introuvable."]);
    }
} else {
    // Si aucun id n'est fourni, retourner une erreur
    echo json_encode(["error" => "Aucun id fourni dans la requête."]);
}
?>