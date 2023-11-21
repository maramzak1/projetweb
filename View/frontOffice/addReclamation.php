<?php 
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/reclamationC.php';
include 'C:/xampp/htdocs/ProjetWeb2A/Model/reclamation.php';


$error = "";
// créer une réclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();
?>


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
            background-color: #ffffff; /* Couleur de fond */
            color: #1a1a1a; /* Couleur du texte */
            font-family: 'Arial', sans-serif; /* Police de caractères */
            margin: 0;
            padding: 0;
        }

        h1 {
            color:  #000080; /* Couleur du titre */
            text-align: center;
        }

        form {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #D3D3D3; /* Couleur du fond du formulaire */
            padding: 20px;
            border-radius: 10px;
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
            border: 1px solid #555555; /* Couleur de la bordure des champs */
            background-color: #ffffff; /* Couleur du fond des champs */
            color: #1a1a1a; /* Couleur du texte dans les champs */
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #FF0000; /* Couleur du fond du bouton */
            color: #ffffff; /* Couleur du texte du bouton */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FF6600; /* Couleur du fond du bouton au survol */
        }

        table {
            width: 100%;
            border-spacing: 10px;
        }

        td {
            vertical-align: top;
        }
    </style>
    <script src="add.js" ></script>
       
</head>

<body>
    <center>
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
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- logo area -->
							<a class="navbar-brand" href="#home">
								<!-- logo image -->
								<img class="img-responsive" src="../../assets/frontoffice/assets/img/logo/tunisika.png" alt="" />
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="#latestalbum">Accueil</a></li>
								<li><a href="#featuredalbum">Regions</a></li>
								<li><a href="#joinus">A propos</a></li>
								<li><a href="listReclamations.php">Historique</a></li>
								<li><a href="#events">Evenements</a></li>
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
						<h2>Report to Us</h2>
					</div>
					<div class="row">	
						<div class="col-md-4 col-sm-4">
							<!-- contact item -->
							<div class="contact-item ">
								<!-- big icon -->
								<i class="fa fa-street-view"></i>
								<!-- contact details  -->
								<span class="contact-details">El Ghazela</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- contact item -->
							<div class="contact-item ">
								<!-- big icon -->
								<i class="fa fa-wifi"></i>
								<!-- contact details  -->
								<span class="contact-details">tunisika@melodi.com</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<!-- contact item -->
							<div class="contact-item ">
								<!-- big icon -->
								<i class="fa fa-phone"></i>
								<!-- contact details  -->
								<span class="contact-details">555 555 5555</span>
							</div>
						</div>
					</div>
					
		</div>   
    <p style="font-size: 20px">Si vous avez une réclamation, n'hésitez pas à nous contacter !</p>
    </center>
    
    <form action="addReclamation.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="Titre ">Titre</label>
                    </td>
                    <td>
                        <textarea name="titre" id="Titre" ></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td>
                        <input type="text" id="description" name="description" cols="40" rows="5">
                    </td>
                </tr>
            </tbody>
        </table>
        <center>
            <input type="submit" value="Envoyer" onclick="return validateForm()">
        </center>
    </form>

    <?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  
  $reclamationC->addReclamation($titre, $description,"en attente");
  //header("Location:listReclamations.php");

}
?>
<footer>
    <p><b>Copyright &copy; 2023</b></p>
  </footer>
</body>

</html>


