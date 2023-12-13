<?php
include 'C:\xampp\htdocs\projet_musique - Copie\controller\UtilisateurC.php';
include 'C:\xampp\htdocs\projet_musique - Copie\model\Utilisateur.php';
$error = "";
$utilisateur = null;
$utilisateurC = new UtilisateurC(); 

// Traitement du formulaire
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["password"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        isset($_POST["password"])
    ) {
         {
            // Création d'une instance de la classe Utilisateur avec les données du formulaire
            $utilisateur = new Utilisateur(
                null,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $_POST['tel'],
                $_POST['password']
            );

            // Ajout de l'utilisateur à la base de donnée
            $utilisateurC->addUtilisateur($utilisateur);
// Envoi de l'e-mail de bienvenue
$to = $_POST['email'];
$subject = 'Bienvenue sur TOUNIZIKA !';
$message = "Cher(e) {$_POST['prenom']},\n\n";
$message .= "Bienvenue sur TOUNIZIKA ! Nous sommes ravis de vous accueillir parmi nous. Merci de nous faire confiance pour le choix de la musique.\n\n";
$message .= "Votre compte a été créé avec succès, et vous pouvez désormais profiter de tous les avantages offerts par notre plateforme. Voici quelques informations utiles pour commencer :\n\n";
$message .= "Nom d'utilisateur : {$_POST['nom']}\n";
$message .= "Adresse e-mail associée : {$_POST['email']}\n\n";
$message .= "N'oubliez pas de garder ces informations en lieu sûr.\n\n";
$message .= "Nous espérons que vous apprécierez notre site web et que notre communauté vous apportera satisfaction.\n\n";
$message .= "Encore une fois, bienvenue parmi nous !\n\n";
$message .= "Cordialement,\nL'équipe Tounizika";

$headers = 'From: mayssamaoui@gmail.com'; // Mettez une adresse e-mail réelle ici

mail($to, $subject, $message, $headers);

// Redirection  après l'ajout
header('Location:index.php');
exit(); 
        }
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form  </title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<script>
    function validateForm(form) {
        var nom = form["nom"].value.trim();
        var prenom = form["prenom"].value.trim();
        var email = form["email"].value.trim();
        var tel = form["Telephone"].value.trim();
        var password = form["password"].value.trim();

        var errorMessage = "";

        // Check if any field is empty
        if (nom === '') {
            errorMessage += "Le champ 'Nom' est vide.\n";
        }

        if (prenom === '') {
            errorMessage += "Le champ 'Prenom' est vide.\n";
        }

        if (email === '') {
            errorMessage += "Le champ 'Email' est vide.\n";
        }

        if (tel === '') {
            errorMessage += "Le champ 'Telephone' est vide.\n";
        }

        if (password === '') {
            errorMessage += "Le champ 'Mot de passe' est vide.\n";
        }

        // Display error messages
        if (errorMessage !== "") {
            alert(errorMessage);
            return false; // Prevent form submission if there are empty fields
        }

        // Check if name contains only letters
        if (!/^[a-zA-Z]+$/.test(nom) || nom.length > 10) {
            alert("Le nom doit contenir uniquement des lettres et au maximum 10 caractères.");
            return false;
        }

        // Check if prenom contains only letters
        if (!/^[a-zA-Z]+$/.test(prenom) || prenom.length > 10) {
            alert("Le prénom doit contenir uniquement des lettres et au maximum 10 caractères.");
            return false;
        }

        // Check if email is valid
        if (!email.includes("@")) {
            alert("L'adresse email doit contenir @.");
            return false;
        }



        // Check if telephone contains 8 digits
        if (!/^\d{8}$/.test(tel)) {
            alert("Le numéro de téléphone doit contenir 8 chiffres.");
            return false;
        }

        // Check if password is at least 8 characters
        if (password.length < 8) {
            alert("Le mot de passe doit contenir au moins 8 caractères.");
            return false;
        }

        return true; // Allow form submission if all validations pass
    }
</script>

<div class="container">
    <div class="title">Registration</div>
    <div class="content">
        <form method="post" onsubmit="return validateForm(this)">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nom</span>
                    <input type="text" placeholder="Enter your last name" id="nom" name="nom">
                </div>
                <div class="input-box">
                    <span class="details">Prenom</span>
                    <input type="text" placeholder="Enter your first name" id="prenom" name="prenom">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your email" id="email" name="email">
                </div>
                <div class="error-message">
                    <?php echo $error; ?>
                </div>



                <div class="input-box">
                    <span class="details">Telephone</span>
                    <input type="text" placeholder="Enter your phone number" id="Telephone" name="tel">
                </div>
                <div class="input-box">
                    <span class="details">Mot de passe</span>
                    <input type="password" placeholder="Enter your password" id="password" name="password">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Register">
            </div>
            <p><?php echo $error; ?></p>
        </form>
    </div>
</div>
</body>
</html>
