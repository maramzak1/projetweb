<?php
include '..\..\Controller\UtilisateurC.php';
include '..\..\Model\Utilisateur.php';
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
header('Location:Region.php');
exit(); 
        }
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../Assets/frontoffice/css/bootstrap.min.css">
    <!-- Your additional styles -->
    <link rel="stylesheet" href="../../Assets/frontoffice/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #ffffff;
            background-image: url('../../Assets/frontoffice/img/media/arabic (1).jpg');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            color: #1a1a1a;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            opacity: 0.8;
            padding: 20px;
            border-radius: 10px;
            margin-left: auto; /* Décaler le formulaire vers la droite */
            margin-right: 20px; /* Marge à droite pour l'espacement */
        }

        .title {
            text-align: center;
            color: #000080;
        }

        .content {
            margin-top: 20px;
        }

        .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .input-box {
            width: 48%;
            margin-bottom: 20px;
        }

        .input-box span {
            display: block;
            margin-bottom: 8px;
            color: #1a1a1a;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #808080;
            background-color: #dcdcdc;
            color: #1a1a1a;
            border-radius: 5px;
        }

        textarea,
        input {
            width: 100%;
            padding: 30px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #808080;/* Couleur de la bordure des champs */
            background-color: #dcdcdc; /* Couleur du fond des champs */
            color: #1a1a1a; /* Couleur du texte dans les champs */
            border-radius: 5px;

        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .button {
            text-align: center;
            margin-top: 10px;
        }

        .button input {
        background-color: #8B4513;
        color: #ffffff;
        cursor: pointer;
        width: 250px; /* Ajustez la largeur selon vos préférences */
        height: 40px;
        font-size: 18px; /* Ajustez la taille du texte selon vos préférences *
        text-align: center; /* Centre le texte à l'intérieur du bouton */
        line-height: 10px; 
    }

        .button input:hover {
            background-color: #542828;
        }


        .welcome-message {
    font-weight: bold;
    font-style: italic;
}

.logo-container {
        margin-left: auto;
        margin-right: 20px;
        text-align: right; /* Aligner le texte à droite */
    }

    .app-brand-logo {
        max-width: 100px; /* Réduire la taille maximale du logo à 100 pixels */
        height: auto; /* Maintenir les proportions de l'image */
    }


    /* Ajoutez ces styles pour ajuster la taille et la couleur des noms des labels */
    .details {
        display: block;
        margin-bottom: 8px;
        color: #fff !important;
        font-size: 16px;
        font-weight: bold; /* Mettre en gras */
    }

     .welcome-message,
    .default-heading {
        font-weight: bold;
        font-style: italic;
        font-size: 20px; /* Ajustez la taille du texte selon vos préférences */
        color: #ffffff; /* Couleur du texte en blanc */
    }

    /* Autres styles restent inchangés */
</style>




    </style>
    <script>
        function validateForm(form) {
            var nom = form["nom"].value.trim();
            var prenom = form["prenom"].value.trim();
            var email = form["email"].value.trim();
            var tel = form["Telephone"].value.trim();
            var password = form["password"].value.trim();

            var errorMessage = "";

            // Check if any field is empty
            if (nom === '' || prenom === '' || email === '' || tel === '' || password === '') {
                errorMessage += "Tous les champs sont obligatoires.\n";
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
</head>

<body>
        <div class="container">
        <div class="logo-container" style="margin-left: auto; margin-right: 20px;">
        <a href="Region.php">
            <img src="../../Assets/frontoffice/img/logo/ok.png" alt="Logo" class="app-brand-logo demo">
        </a>
    </div>
    <br>
    <p class="welcome-message" style="font-weight: bold; font-style: italic;">Inscrivez-vous sur notre site et devenez membre de notre communauté dynamique !</p>
    <div class="default-heading">
        <br>
        <br>
    </div>
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
                        <span class="details ">Email</span>
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
                    <input type="submit" value="S'inscire!">
                </div>
                <p class="error-message"><?php echo $error; ?></p>
            </form>
        </div>
    </div>
</body>
</html>
