<?php
// Vérification que les données ont été envoyées via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Nettoyer et valider les données reçues
    $nom = isset($_POST['name']) ? trim($_POST['name']) : '';  // Utiliser trim() pour supprimer les espaces inutiles
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $mpd = isset($_POST['password']) ? trim($_POST['password']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Vous pouvez valider l'email côté serveur même si la validation a été effectuée côté client
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'email n'est pas valide !";
        exit;  // Arrêter l'exécution du script si l'email est invalide
    }

    // Si tout va bien, vous pouvez afficher les données ou les traiter
    echo "<h1>Données reçues :</h1>";
    echo "<p>Nom : " . htmlspecialchars($name) . "</p>";  // Sécuriser l'affichage
    echo "<p>Prénom : " . htmlspecialchars($prenom) . "</p>";
    echo "<p>Email : " . htmlspecialchars($email) . "</p>";
    echo "<p>Mot de Passe : " . htmlspecialchars($mpd) . "</p>";
    echo "<p>Message : " . htmlspecialchars($message) . "</p>";

    // Exemple d'insertion dans une base de données (optionnel, si vous en avez une)
    // Exemple pour une connexion avec MySQL
    // $conn = new mysqli("localhost", "user", "password", "database");
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, email) VALUES (?, ?)");
    // $stmt->bind_param("ss", $nom, $email);
    // $stmt->execute();
    // $stmt->close();
    // $conn->close();
} else {
    echo "Aucune donnée reçue. Veuillez soumettre le formulaire.";
}
?>
