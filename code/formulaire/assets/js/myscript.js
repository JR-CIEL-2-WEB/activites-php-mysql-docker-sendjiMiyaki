let prenom = document.querySelector('[placeholder="Name"]');  // Name field
let nom = document.querySelector('[placeholder="First name"]');  // First name field
let email = document.querySelector('[placeholder="Email"]');  // Email field
let mdp = document.querySelector('[placeholder="password"]');  // Password field
let message = document.querySelector('[placeholder="Message"]');  // Message field

/*email et mdp conditions*/
let maj = /[A-Z]/; //alphabet en majuscule
let special = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/; //tous les caractères spéciaux

/*selectionner la case à cocher et le texte à côté*/
let cocher = document.getElementById('formCheck-1');
let age = document.querySelector('label[for="formCheck-1"]');

/*afficher le message invisible pour le mdp*/
let messageErreur = document.querySelector(".text-danger");

function verifierFormulaire() {
    if (prenom.value === "") {
      prenom.style.borderColor = "red";
      return false;
    } else {
      prenom.style.borderColor = "green";
    }

    if (nom.value === "") {
      nom.style.borderColor = "red";
      return false;
    } else {
      nom.style.borderColor = "green";
    }
    
    /*condition : si email.value contient "@"*/
    if (email.value === "" || !email.value.includes("@")) {
      email.style.borderColor = "red";
      return false;
    } else if (email.value.includes("@")) {
      email.style.borderColor = "green";
    }

    /*condition : mdp > 8 caractères, une majuscule et un caractère spécial sinon affichage de "text-danger invisible"*/
    if (mdp.value === "" || mdp.value.length < 8 || !mdp.value.match(special) || !mdp.value.match(maj)) {
      mdp.style.borderColor = "red";
      messageErreur.classList.remove("invisible");
      return false;
    } else if (mdp.value.length >= 8 && mdp.value.match(special) && mdp.value.match(maj)) {
      mdp.style.borderColor = "green";
      messageErreur.classList.add("invisible");
    }

    if (message.value === "") {
      message.style.borderColor = "red";
      return false;
    } else {
      message.style.borderColor = "green";
    }

    if (!cocher.checked) {
      age.style.color = "red";
      return false;
    } else if (cocher.checked) {
      age.style.color = "green";
    }

    v
}