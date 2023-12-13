<?php
include '../../Controller/UtilisateurC.php';
include '../../Controller/reclamationC.php';
include '../../Model/reclamation.php';

session_start();
$error = "";
$utilisateur = null;
$utilisateurC = new UtilisateurC();
$reclamationC = new reclamationC();

// Vérifier si la variable de session existe et contient une valeur
if(isset($_SESSION['e']) && !empty($_SESSION['e'])) {
    // Obtenez la configuration de l'utilisateur
    $idUtilisateur = $utilisateurC->id_de_email($_SESSION['e']);

    // Obtenez les informations de l'utilisateur à partir de son ID
    $utilisateur = $utilisateurC->getUtilisateurParID($idUtilisateur);

    // Vérifier si le formulaire de réclamation a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titre = $_POST['titre'];
        $description = $_POST['description'];

        // Ajouter la réclamation en attente
        $reclamationC->addReclamation($titre, $description, "en attente", $idUtilisateur);
        // Rediriger vers la page de l'historique des réclamations
        header("Location: listReclamations.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Réclamation</title>
    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="../../assets/frontoffice/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="../../assets/frontoffice/css/animate.min.css" rel="stylesheet">
    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="../../assets/frontoffice/css/owl.carousel.css">
    <!-- Font awesome CSS -->
    <link href="../../assets/frontoffice/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../assets/frontoffice/css/style.css" rel="stylesheet">
    <link href="../../assets/frontoffice/css/style-color.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../assets/frontoffice/assets/img/logo/favicon.ico">
    <style>
        body {
            background-color: #ffffff;
            background-image: url('../../assets/frontoffice/img/backg1.jpeg');

            background-size: cover; /* Pour couvrir toute la surface du body */
            background-position: center center; /* Centrer l'image horizontalement et verticalement */
            background-attachment: fixed; /* L'image reste fixe pendant le défilement de la page */
            color: #1a1a1a;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;

        }


        h1 {
            color: #000080; /* Couleur du titre */
            text-align: center;

        }

        form {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            /*background-color: #D2B48C; /* Couleur du fond du formulaire */
            opacity: 0.8; /* Ajoute une légère transparence */
            padding: 20px;
            border-radius: 10px;
            margin-left: 50%; /* Ajustez cette valeur pour le décalage vers la droite */

        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #1a1a1a; /* Couleur du texte des étiquettes */
        }

        textarea,
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #808080;/* Couleur de la bordure des champs */
            background-color: #dcdcdc; /* Couleur du fond des champs */
            color: #1a1a1a; /* Couleur du texte dans les champs */
            border-radius: 5px;

        }

        input[type="submit"] {
            background-color: #8B4513;
            color: #ffffff;
            cursor: pointer;
            width: 610px; /* Largeur du bouton */
            height: 40px; /* Hauteur du bouton */
            margin-left: 150px; /* Ajustez la valeur selon vos besoins */
        }

        input[type="submit"]:hover {
            background-color: #542828; /* Remplacez par la couleur rouge foncé de votre choix */
        }

        table {
            width: 100%;
            border-spacing: 10px;
        }

        td {
            vertical-align: top;
        }

        /* Ajouter le style personnalisé ici */
        .h2,
        h2 {
            font-size: 30px;
        }
    </style>
    <script src="add.js"></script>

</head>

<body>

    <header>
        <!-- secondary menu -->
        <nav class="secondary-menu">
            <div class="container">
                <!-- secondary menu left link area -->
                <div class="sm-left">
                    <strong>Phone</strong>:&nbsp; <a href="#">555 555 555</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong>E-mail</strong>:&nbsp; <a href="#">music.site@melodi.com</a>
                </div>
                <!-- secondary menu right link area -->
                <div class="sm-right">
                    <!-- social link -->
                    <div class="sm-social-link">
                        <a class="h-facebook" href="#"><i class="fa fa-facebook"></i></a>
                        <a class="h-twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a class="h-google" href="#"><i class="fa fa-google-plus"></i></a>
                        <a class="h-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </nav>
        <!-- primary menu -->
        <nav class="navbar navbar-fixed-top navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- logo area -->
                    <a class="navbar-brand" href="#home">
                        <!-- logo image -->
                        <img class="img-responsive" src="../../assets/frontoffice/assets/img/logo/tunisika.png"
                            alt="" />
                    </a>
                </div>


                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#latestalbum">Accueil</a></li>
                        <li><a href="#featuredalbum">Regions</a></li>
                        <li><a href="#joinus">A propos</a></li>
                        <li><a href="listReclamations.php">Historique de réclamations</a></li>
                        <li><a href="listReponse.php">Réclamations traitées</a></li>
                        <li><a href="#">events</a></li>
                        <li><a href="addReclamation.php">Contact</a></li>
                        <li><a href="#team">Aide</a></li>
                        <li><a href="#team">Se connecter</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    <div class="contact pad" id="contact">
        <div class="container">
            <!-- default heading -->
            <div class="default-heading">
                <!-- heading -->
                <br>
                <br>

                <h2 style="margin-left: 80%; color: #542828; font-size: 23px;">Report to Us</h2>

                <p style="font-size: 20px; font-weight: bold; color: #404040; text-align: right; margin-left: 65%; white-space: nowrap;">Si
                    vous avez une réclamation, n'hésitez pas à nous contacter !</p>
            </div>

            <form action="addReclamation.php" method="post">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label for="titre">Titre</label>
                            </td>
                            <td>
                                <input type="text" name="titre" id="Titre">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description">Description</label>
                            </td>
                            <td>
                                <textarea id="description" name="description" cols="40" rows="5"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <center>
                    <input type="submit" value="Envoyer" onclick="return validateForm()">
                </center>
            </form>

            <div class="row" style="margin-left: 700px;">
                <div class="col-md-4 col-sm-4">
                    <!-- contact item -->
                    <div class="contact-item" style="margin-right: 40px; margin-bottom: 20px;">
                        <!-- big icon -->
                        <i class="fa fa-street-view"></i>
                        <!-- contact details  -->
                        <span class="contact-details"
                            style="color: #ffffff; font-size: 20px;">ElGhazela</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <!-- contact item -->
                    <div class="contact-item"
                        style="margin-left: 80px; margin-right: 40px; margin-bottom: 20px;">
                        <!-- big icon -->
                        <i class="fa fa-wifi"></i>
                        <!-- contact details  -->
                        <span class="contact-details"
                            style="color: #ffffff; font-size: 18px;">tunisika@melodi.com</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <!-- contact item -->
                    <div class="contact-item" style="margin-left: 200px; margin-bottom: 100px;">
                        <!-- big icon -->
                        <i class="fa fa-phone"></i>
                        <!-- contact details  -->
                        <span class="contact-details"
                            style="color: #ffffff; font-size: 20px;">5555555555</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



