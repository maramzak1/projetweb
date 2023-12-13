<?php
session_start();
include "../../Controller/RegionC.php";
include "../../Controller/UtilisateurC.php";
include "../../Model/Utilisateur.php";
include '../../Controller/reclamationC.php';
include '../../Model/reclamation.php';
include_once "../../Controller/postC.php";
include_once "../../Controller/commentaireC.php";



$reclamationC = new reclamationC();




$error = "";
$utilisateur = null;
$utilisateurC = new UtilisateurC();

// Vérifier si la variable de session existe et contient une valeur
if(isset($_SESSION['e']) && !empty($_SESSION['e'])) 
    // Obtenez la configuration de l'utilisateur
    $configUtilisateur = $utilisateurC->getConfigurationUtilisateur($_SESSION['e']);

    
    if (isset($_SESSION['e'])) {
        $idUtilisateur = $utilisateurC->id_de_email($_SESSION['e']);
      } else {
        $idUtilisateur = null;
      }

    // Obtenez les informations de l'utilisateur à partir de son ID
    $utilisateur = $utilisateurC->getUtilisateurParID($idUtilisateur);
	$RgC = new RegionC;
$Rg = $RgC->listRegion();

// Fetch all rows as an associative array
$regions = $Rg->fetchAll(PDO::FETCH_ASSOC);





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titre = $_POST['titre'];
	$description = $_POST['description'];

	// Ajouter la réclamation en attente
	$reclamationC->addReclamation($titre, $description, "en attente", $idUtilisateur);
	// Rediriger vers la page de l'historique des réclamations
	header("Location: listReclamations.php");
	exit(); // Assurez-vous de terminer le script après la redirection
}

?>

    
   







<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Tounizika</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="HimanshuGupta">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="../../Assets/frontoffice/css/bootstrap.min.css" rel="stylesheet">	
		<!-- Animate CSS -->
		<link href="../../Assets/frontoffice/css/animate.min.css" rel="stylesheet">
		<!-- Basic stylesheet -->
		<link rel="stylesheet" href="../Assets/frontoffice/css/owl.carousel.css">
		<!-- Font awesome CSS -->
		<link href="../../Assets/frontoffice/css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="../../Assets/frontoffice/css/style.css" rel="stylesheet">
		<link href="../../Assets/frontoffice/css/style-color.css" rel="stylesheet">

		<!-- Favicon -->
		<link rel="shortcut icon" href="../../Assets/frontoffice/img/logo/favicon.ico">
		


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="add.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>

	<body>




		<!-- modal for booking ticket form -->
		<div class="modal fade" id="bookTicket" tabindex="-1" role="dialog" aria-labelledby="BookTicket">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Name of The Event &nbsp; <small><span class="label label-success">Available</span> &nbsp; <span class="label label-danger">Not Available</span></small></h4>
					</div>
					<!-- form for events ticket booking -->
					<form>
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Email</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="example@mail.com">
							</div>
							<div class="form-group">
								<label for="exampleInputContact">Contact</label>
								<input type="text" class="form-control" id="exampleInputContact" placeholder="+91 55 5555 5555">
							</div>
							<div class="form-group">
								<label for="exampleInputSeats">Number of Tickets</label>
								<select class="form-control" id="exampleInputSeats">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox"> I accept the Terms of Service
								</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<!-- link to payment gatway here -->
							<button type="button" class="btn btn-primary">Book Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- wrapper -->
		<div class="wrapper" id="home">

			<!-- header area -->
			<header>
				<!-- secondary menu -->
				<nav class="secondary-menu">
					<div class="container">
						<!-- secondary menu left link area -->
						<div class="sm-left">
							<strong>Phone</strong>:&nbsp; <a href="#">555 555 555</a>&nbsp;&nbsp;&nbsp;&nbsp;
							<strong>E-mail</strong>:&nbsp; <a href="#">Tounizika@gmail.tn</a>
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
						<!-- Ajoutez ceci où vous voulez dans votre code -->
						<!-- Ajoutez ceci où vous voulez dans votre code 
<div id="sortRegions-container" class="sort-dropdown pull-right">
    <select id="sortRegions">
        <option value="asc">Tri alphabétique croissant</option>
        <option value="desc">Tri alphabétique décroissant</option>
    </select>
</div>-->





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
								<img class="img-responsive" src="../../Assets/frontoffice/img/logo/ok.png" alt="" />
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
						<li><a href="allposts.php">Nos coups de coeur</a></li>
						<li><a href="#Region.php">Régions</a></li>
						<li><a href="#joinus">Acceuil</a></li>
						<li><a href="#portfolio"></a></li>
    <?php
    if ($utilisateur) {
        // Si l'utilisateur est connecté, afficher ses boutons
		
        echo '<li><a href="profiluser.php">' . $utilisateur['nom'] . ' ' . $utilisateur['prenom'] . '</a></li>';
        
    } else {
        // Si l'utilisateur n'est pas connecté, afficher les boutons par défaut
        echo '<li><a href="auth-login-basic.php">Se connecter</a></li>';
        echo '<li><a href="addUtilisateur.php">Créer un compte</a></li>';
    }
    ?>
   
</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				
   

			</header>

			

 
			
			<!-- Page d acceuil -->
			<div class="banner">
			
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="../../Assets/frontoffice/img/banner/c1.jpg" alt="...">
							<div class="container">
								<!-- banner caption -->
								<div class="carousel-caption slide-one">
									<!-- heading -->
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<h2 class="animated fadeInLeftBig"><i class="fa fa-music"></i>Tounizika</h2>
									<!-- paragraph -->
									<h3 class="animated fadeInRightBig"> Un tunisien qui ne connait pas sa chanson est un tunisien bien malheureux !<br>Embarquez avec nous dans cette expérience musicale et
plongez vous dans la richesse méconnue de la musique tunisienne <br>Tounzika vous offre le folklore de toutes les 24 régions de la Tunisie!<br>Artistes locaux, tickets pour concerts inédits,  des chansons que vous écoutez  pour la première fois... <br>Tout au bout d'un clic. 
</h3>

									<!-- button -->
									<a href="allposts.php" class="animated fadeIn btn btn-theme btn-right">Concerts: nos coups de coeur!</a>
									<!-- button -->
                                    
                                    
</style>
                                    
									
								</div>
							</div>
						</div>
						<div class="item">
							<img src="../../Assets/frontoffice/img/banner/b2.jpg" alt="...">
							<div class="container">
								<!-- banner caption -->
								<div class="carousel-caption slide-two">
									<!-- heading -->
									<h2 class="animated fadeInLeftBig"><i class="fa fa-headphones"></i> Listen It...</h2>
									<!-- paragraph -->
									<h3 class="animated fadeInRightBig">Lorem ipsum dolor sit amet, consectetur elit.</h3>
									<!-- button -->
									<a href="#" class="animated fadeIn btn btn-theme">Listen Now</a>
								</div>
							</div>
						</div>
						
					</div>

					<!-- Controls -->
					
				</div>
			</div>
			<!--/ banner end -->
			
	
	
	
			<div class="nav-animate"></div>







			<!-- Page Region -->
<div class="featured pad" id="featuredalbum">
    <div class="container">
        <div class="default-heading">
            <h2>Choisissez votre destination !</h2>
        </div>
        <div class="featured-element">
            <?php $counter = 1; ?>
            <?php foreach ($regions as $region) { ?>
                <div class="col-md-4 col-sm-6">
                    <div class="featured-item">
                        <div class="figure">
                            <a href="folklorePage.php?id_region=<?php echo $region['id_region']; ?>">
                                <img class="img-responsive" src="../../Assets/frontoffice/img/media/<?php echo $region['image']; ?>" alt="" />
                                <p><?php echo $region['description']; ?></p>
                            </a>
                        </div>
                        <div class="featured-item-info">
                            <h4><?php echo $region['nom']; ?></h4>
                            <hr />
                        </div>
                    </div>
                </div>

                <?php
                // Ajouter la classe clearfix après chaque troisième élément
                if ($counter % 3 == 0) {
                    echo '<div class="clearfix"></div>';
                }
                $counter++;
                ?>
            <?php } ?>
        </div>

        <style>
            .featured.pad {
                background-image: url('../../Assets/frontoffice/img/banner/147.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }

            .featured-element .col-md-4 {
                margin-bottom: 30px; /* Ajustez selon vos préférences */
            }

            .featured-item img {
                border: 1px solid #fff;
                border-radius: 5px;
            }

            .featured-item p {
                background-color: #F5F5DC;
                padding: 10px;
                border-radius: 5px;
                margin: 0;
            }

            .featured-item-info h4 {
                background-color: rgba(255, 255, 255, 0.5);
                padding: 4px;
                border-radius: 10px;
                margin-bottom: 0;
            }
        </style>
    </div>
</div>









     

















































<div class="contact pad" id="contact">
        <div class="container">
            <!-- default heading -->
            <div class="default-heading" style="margin: 0; padding: 0;">
                <!-- heading -->
                <br>
                <br>

                <h2 style="margin-left: 0%; color: #542828; font-size: 23px;">Report to Us</h2>

                <p style="font-size: 20px; font-weight: bold; color: #404040; text-align: right; margin-left: 65%;">Si
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
                    <div class="contact-item" style="margin-left: 150px; margin-bottom: 100px;">
                        <!-- big icon -->
                        <i class="fa fa-phone"></i>
                        <!-- contact details  -->
                        <span class="contact-details"
                            style="color: #ffffff; font-size: 20px;">5555555555</span>
                    </div>
                </div>
            </div>
			<style>
        .contact.pad  {
            background-color: #ffffff;
            background-image: url('../../assets/frontoffice/img/reclamation/backg1.jpeg');

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
            margin-left: 40%; /* Ajustez cette valeur pour le décalage vers la droite */

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
    
        </div>
    </div>





			







			<!-- footer -->
			<footer>
				<div class="container">
					<!-- social media links -->
					<div class="social">
						<a class="h-facebook" href="#"><i class="fa fa-facebook"></i></a>
						<a class="h-google" href="#"><i class="fa fa-google-plus"></i></a>
						<a class="h-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
						<a class="h-twitter" href="#"><i class="fa fa-twitter"></i></a>
					</div>
					<!-- copy right -->
					<p class="copy-right">&copy; copyright 2018, All rights are reserved.</p>
				</div>
			</footer>
			<!-- footer end -->

			<!-- Scroll to top -->
			<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
			
		</div>


		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

		<!-- jQuery -->
		<script>
    // Fonction pour trier les régions par ordre alphabétique
    function sortRegions(order) {
        var regionsContainer = document.querySelector('.featured-element');
        var regions = Array.from(regionsContainer.children);

        regions.sort(function (a, b) {
            var regionA = a.querySelector('.featured-item-info h4').textContent.toUpperCase();
            var regionB = b.querySelector('.featured-item-info h4').textContent.toUpperCase();

            if (order === 'asc') {
                return (regionA < regionB) ? -1 : (regionA > regionB) ? 1 : 0;
            } else {
                return (regionA > regionB) ? -1 : (regionA < regionB) ? 1 : 0;
            }
        });

        regionsContainer.innerHTML = '';

        // Réinsérer les régions triées dans la div existante
        regions.forEach(function (region) {
            regionsContainer.appendChild(region);
        });
    }

    // Gestion de l'événement de changement dans le menu déroulant
    document.getElementById('sortRegions').addEventListener('change', function () {
        var selectedOrder = this.value;
        sortRegions(selectedOrder);
    });
</script>






		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- WayPoints JS -->
		<script src="js/waypoints.min.js"></script>
		<!-- Include js plugin -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- One Page Nav -->
		<script src="js/jquery.nav.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
	</body>	
</html>