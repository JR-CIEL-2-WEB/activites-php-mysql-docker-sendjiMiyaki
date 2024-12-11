<?php
// vérifie si les données ont été envoyées par une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // nettoie et valide les données reçues, en supprimant les espaces inutiles autour
    $nom = isset($_POST['name']) ? trim($_POST['name']) : '';  // on récupère et nettoie le nom
    $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';  // on récupère et nettoie le prénom
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';  // on récupère et nettoie l'email
    $mpd = isset($_POST['password']) ? trim($_POST['password']) : '';  // on récupère et nettoie le mot de passe
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';  // on récupère et nettoie le message

    // on vérifie si l'email est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "L'email n'est pas valide !";  // si l'email n'est pas valide, on affiche un message d'erreur
        exit;  // on arrête le script ici si l'email est invalide
    }

    // on charge les données existantes depuis le fichier "data.json"
    $dataFile = 'data.json';
    if (file_exists($dataFile)) {
        // on essaie de lire le fichier JSON
        $dataJson = file_get_contents($dataFile);
        if ($dataJson === false) {
            echo json_encode(["status" => "error", "message" => "Erreur lors de la lecture du fichier des donnees."]);
            exit;  // si le fichier ne peut pas être lu, on affiche une erreur et on arrête le script
        }
        $data = json_decode($dataJson, true);  // on transforme le contenu JSON en tableau PHP
        if ($data === null) {
            echo json_encode(["status" => "error", "message" => "Erreur de decodage des donnees JSON."]);
            exit;  // si le JSON ne peut pas être décodé, on affiche une erreur
        }
    } else {
        $data = [];  // si le fichier n'existe pas, on initialise un tableau vide
    }

    // on vérifie si l'email existe déjà dans les données
    foreach ($data as $user) {
        if ($user['email'] === $email) {
            // si l'email existe déjà, on affiche un message d'erreur et on arrête
            echo json_encode(["status" => "error", "message" => "Ce compte existe deja avec cet email."]);
            exit;
        }
    }

    // si l'email n'existe pas, on prépare les données de l'utilisateur
    $newUser = [
        'nom' => $nom,  // on ajoute le nom
        'prenom' => $prenom,  // on ajoute le prénom
        'email' => $email,  // on ajoute l'email
        'password' => $mpd,  // on ajoute le mot de passe (en vrai, il faudrait le hasher pour plus de sécurité)
        'message' => $message  // on ajoute le message
        // 'password' => password_hash($mpd, PASSWORD_DEFAULT),  // on pourrait hasher le mot de passe pour le sécuriser
    ];

    // on ajoute les nouvelles données de l'utilisateur au tableau existant
    $data[] = $newUser;

    // on sauvegarde les données dans le fichier "data.json"
    if (file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
        echo json_encode(["status" => "success", "message" => "Compte cree avec succes !"]);  // si l'enregistrement réussit, on affiche un message de succès
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'enregistrement des données."]);  // si l'enregistrement échoue, on affiche une erreur
    }

    // on affiche les données reçues pour vérifier ce qui a été envoyé (sécurisé avec htmlspecialchars)
    echo "<h2>Données reçues :</h2>";
    echo "<p>Nom : " . htmlspecialchars($nom) . "</p>";  // on affiche le nom de façon sécurisée
    echo "<p>Prénom : " . htmlspecialchars($prenom) . "</p>";  // on affiche le prénom de façon sécurisée
    echo "<p>Email : " . htmlspecialchars($email) . "</p>";  // on affiche l'email de façon sécurisée
    // echo "<p>Mot de Passe : " . htmlspecialchars($mpd) . "</p>";  // on ne montre pas le mot de passe pour des raisons de sécurité
    echo "<p>Message : " . htmlspecialchars($message) . "</p>";  // on affiche le message de façon sécurisée

    // exemple d'insertion dans une base de données (commenté ici, pour montrer une possibilité)
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
    // si aucune donnée n'a été envoyée en POST, on affiche un message
    echo "Aucune donnée reçue. Veuillez soumettre le formulaire.";
}
?>