// Sélectionner les éléments du formulaire en utilisant leur attribut placeholder pour les identifier
let prenom = document.querySelector('[placeholder="Name"]');  // champ pour le prénom
let nom = document.querySelector('[placeholder="First name"]');  // champ pour le nom
let email = document.querySelector('[placeholder="Email"]');  // champ pour l'email
let mdp = document.querySelector('[placeholder="password"]');  // champ pour le mot de passe
let message = document.querySelector('[placeholder="Message"]');  // champ pour le message

// Définir des expressions régulières pour vérifier des critères spécifiques
let maj = /[A-Z]/; // vérifie la présence de lettres majuscules
let special = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/; // vérifie la présence de caractères spéciaux

// Sélectionner la case à cocher et le texte d'erreur
let cocher = document.getElementById('formCheck-1');  // case à cocher
let messageErreur = document.getElementById("messageErreur");  // message d'erreur pour le mot de passe

// Fonction qui vérifie si les champs du formulaire sont valides
function verifierFormulaire() {
    let isValid = true; // on suppose que tout est valide au départ

    // Vérification du prénom
    if (prenom.value === "") {  // si le prénom est vide
        prenom.style.borderColor = "red";  // on colore le champ en rouge
        isValid = false;  // le formulaire n'est pas valide
    } else {
        prenom.style.borderColor = "green";  // sinon on colore le champ en vert
    }

    // Vérification du nom
    if (nom.value === "") {  // si le nom est vide
        nom.style.borderColor = "red";  // on colore le champ en rouge
        isValid = false;  // le formulaire n'est pas valide
    } else {
        nom.style.borderColor = "green";  // sinon on colore le champ en vert
    }

    // Vérification de l'email
    if (email.value === "" || !email.value.includes("@") || !email.value.includes(".")) {
        email.style.borderColor = "red";  // si l'email est vide ou incorrect
        isValid = false;  // le formulaire n'est pas valide
    } else {
        email.style.borderColor = "green";  // sinon on colore le champ en vert
    }

    // Vérification du mot de passe
    if (mdp.value === "" || mdp.value.length < 8 || !mdp.value.match(special) || !mdp.value.match(maj)) {
        mdp.style.borderColor = "red";  // si le mot de passe est vide, trop court ou ne contient pas de majuscule ou de caractère spécial
        messageErreur.classList.remove("invisible");  // on affiche le message d'erreur
        isValid = false;  // le formulaire n'est pas valide
    } else {
        mdp.style.borderColor = "green";  // sinon on colore le champ en vert
        messageErreur.classList.add("invisible");  // on cache le message d'erreur
    }

    // Vérification du message
    if (message.value === "") {  // si le message est vide
        message.style.borderColor = "red";  // on colore le champ en rouge
        isValid = false;  // le formulaire n'est pas valide
    } else {
        message.style.borderColor = "green";  // sinon on colore le champ en vert
    }

    // Vérification de la case à cocher
    if (!cocher.checked) {  // si la case n'est pas cochée
        cocher.style.borderColor = "red";  // on colore la case en rouge
        isValid = false;  // le formulaire n'est pas valide
    } else {
        cocher.style.borderColor = "green";  // sinon on colore la case en vert
    }

    // Si tout est valide, on soumet le formulaire
    if (isValid) {
        document.getElementById('formulaire').submit(); // soumettre le formulaire
    }

    return isValid;  // retourne vrai si le formulaire est valide, sinon faux
}
