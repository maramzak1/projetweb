
<?php
session_start();


include "../../Controller/UtilisateurC.php";
include "../../Model/Utilisateur.php";

$utilisateur = null;
$utilisateurC = new UtilisateurC(); 

$message = "";
if (isset($_POST["email"]) && isset($_POST["password_"])) {
    echo "Avant la vérification des données du formulaire.";
    if (!empty($_POST["email"]) && !empty($_POST["password_"])) {
        $message = $utilisateurC->connexionUser($_POST["email"], $_POST["password_"]);
        $_SESSION['e'] = $_POST["email"];

        if ($message != 'pseudo ou le mot de passe est incorrect') {
            header('Location: profiluser.php');
        } else {
            $message = 'pseudo ou le mot de passe est incorrect';
        }
    } else {
        $message = "Missing information";
    }
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
        <!-- Description, Keywords and Author -->
      <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your description">
        <meta name="keywords" content="Your,Keywords">
        <meta name="author" content="HimanshuGupta">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/frontoffice/css/bootstrap.min.css" rel="stylesheet">   
        <!-- Animate CSS -->
        <link href="../../assets/frontoffice/css/css/animate.min.css" rel="stylesheet">
        <!-- Basic stylesheet -->
        <link rel="stylesheet" href="../../assets/frontoffice/css/css/owl.carousel.css">
        <!-- Font awesome CSS -->
        <link href="../../assets/frontoffice/css/font-awesome.min.css" rel="stylesheet">        
        <!-- Custom CSS -->
        <link href="../../assets/frontoffice/css/style.css" rel="stylesheet">
        <link href="../../assets/frontoffice/css/style-color.css" rel="stylesheet">
        
<style>   body {
            background-color: #ffffff;
            background-image: url('../../Assets/frontoffice/img/media/arabic (1).jpg');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            color: #1a1a1a;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #000080;
            text-align: center;
        }

        form {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            opacity: 0.8;
            padding: 20px;
            border-radius: 10px;
            margin-left: 50%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #1a1a1a;
            font-weight: bold; /* Ajout du style gras */
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #808080;
            background-color: #dcdcdc;
            color: #1a1a1a;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #8B4513;
            color: #ffffff;
            cursor: pointer;
            width: 100%;
            height: 40px;
            margin: 15px 0; /* Ajustement de la marge */
        }

        input[type="submit"]:hover {
            background-color: #542828;
        }

        table {
            width: 100%;
            border-spacing: 10px;
        }

        td {
            vertical-align: top;
        }

        .h2,
        h2 {
            font-size: 30px;
        }

        .welcome-message {
            font-size: 20px;
            font-weight: bold;
            color: #404040;
            text-align: right;
            margin-bottom: 20px;
            margin-right: 50%;
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

    .main {
    margin-left: 30%; /* Ajoutez la marge à gauche que vous souhaitez */
}

.login {
    max-width: 600px;
    text-align: center;
}
.text-center {
    color: #fff; /* Ajoutez cette ligne pour définir la couleur du texte en blanc */
}


        
    </style>
    <script src="add.js"></script>
</head>

<body>
    <!-- Your HTML body content -->
<!--
    <div class="contact pad" id="contact">
        <div class="container">
            <div class="logo-container">
                <a href="index.php">
                    <img src="../../assets/frontoffice/img/logo/logologin.png" alt="Logo" class="app-brand-logo demo">
                </a>
            </div>
            <p class="welcome-message">Veuillez vous connecter à votre compte et commencer l'aventure</p>
            <div class="default-heading">
                <br>
                <br>
                <h2 style="margin-left: 80%; color: #542828; font-size: 23px;">connecter</h2>
            </div>

            <form action="index.php" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label for="titre">Email</label>
                            </td>
                            <td>
                                <input type="email" name="email" placeholder="Email" required="" class="login-input">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="titre">Mot de passe</label>
                            </td>
                            <td>
                                <input type="password" name="password_" placeholder="password" id="password">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center">
                    <span>Nouveau sur notre plateforme?</span>
                    <a href="addUtilisateur.php">
                        <span>Créer un compte</span>
                    </a>
                </p>

                <center>
                    <input type="submit" value="Terminer" class="btn btn-primary d-grid w-100" onclick="return validateForm()">
                </center>
            </form>
        </div>
    </div>
      -->
      <div class="main">
      <div class="logo-container" style="margin-left: auto; margin-top:-200px; margin-right: -300px;">
        <a href="Region.php">
            <img src="../../Assets/frontoffice/img/logo/ok.png" alt="Logo" class="app-brand-logo demo">
        </a>
    </div>
      
      
        <div class="login">
        <h2 style="color: white; text-align: right; font-size: 24px; margin-bottom: 210px;margin-right:-70px;">Connectez-vous !</h2>
        
              <form name="frmUser" method="post" action="">
              <div class="message">
        <?php if($message!="") { echo $message; } ?>
      </div>
            <label for="chk" aria-hidden="true"style="color: white;;font-size: 18px;">Entrer votre E-mail:</label>
            <input type="email" name="email" placeholder="Email" required="" class="login-input">

            <label for="chk" aria-hidden="true"style="color: white;;font-size: 18px;">Entrer votre mot de passe:</label>
            <input type="password" name="password_" placeholder="password" required="" class="login-input">
            <p class="text-center">
                <span>Nouveau sur notre plateforme?</span>
                <a href="addUtilisateur.php">
                  <span>Créer un compte</span>
                  <input type="submit" value="Terminer" class="login-input" onclick="return validateForm()">
                    </div>
                   
              
          </form>
        </div>
    </div>
</body>

</html>
