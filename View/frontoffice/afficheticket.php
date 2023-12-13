<?php
session_start();
include "../../Controller/ticketC.php";
include '../../Controller/UtilisateurC.php';
include '../../Model/Utilisateur.php';

$error = "";
$utilisateur = null;
$utilisateurC = new UtilisateurC();
if (isset($_GET['id_concert']))
{
$id_concert = $_GET['id_concert'];
$ticketC = new ticketC();
$ticketDetails = $ticketC->getticketByconcert($id_concert);

if ($ticketDetails === false) {
    die('Error fetching ticket details.');
}



}

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







?>





<!DOCTYPE html>
<html lang="en">
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
    <link rel="shortcut icon" href="../../Assets/frontoffice/img/logo/logo.png">

     


    <!-- Style for the background image -->
	
	<style>
		.ticket-det::after {
    content: '';
    display: block;
    width: 100%;
    height: 3px;  /* Hauteur de la bordure */
    background-color:black;  /* Couleur de la bordure */
    position: absolute;
    bottom: -2px;  /* Ajustez la position selon vos besoins */
    left: 0;
}

        /* Ajouter du style pour le ticket */
        .ticket-item {
            background-color: #fff;
            border: 5px solid #ddd;
            border-radius: 15px;
            margin: 30px;
            padding: 5px;
        }

        .ticket-details {
            margin-bottom: 43px;
			font-size: 16px;
        }

        .ticket-details p {
            margin: 5px 0;
			color: #333;
        }

        .btn-book-ticket {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-book-ticket:hover {
            background-color: #2980b9;
        }
    
body {
    background-image: url('../../Assets/frontoffice/img/media/ticket.jpg');
    background-size: cover; /* Pour couvrir l'ensemble de la fenêtre du navigateur */
    background-position: center center; /* Pour centrer l'image */
    background-attachment: fixed; /* Pour que l'image reste fixe pendant le défilement */
}
</style>

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
						<li><a href="#Acceuil">Nos coups de coeur</a></li>
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

<div style="height: 130px;"></div>
<!-- ... le reste de votre code HTML ... -->


<div class="container">
        <div class="row">
        <!-- Wrapper for slides -->
		
		<?php foreach ($ticketDetails as $ticket)
{ ?>
  
			<div class="ticket-item col-md-4">
					<div class="tickets-item">
						<!-- Box pour le ticket avec superposition d'informations -->
						<div class="ticket-box" style="position: relative; overflow: hidden; border: 1px solid #ccc; border-radius: 10px;">
							<!-- Image du ticket avec effet de flou -->
							<img class="img-responsive blurred-image" src="../../Assets/frontoffice//img/ticket/1.jpg" alt="Image du ticket" style="width: 100%; height: auto;">

							<!-- Superposition d'informations -->
							<div class="ticket-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; text-align: center; color: white; padding: 20px; box-sizing: border-box;">
								<!-- concert date en haut à gauche -->
								<div class="ticket-details" >
									<strong style="color: black;font-family: 'Montserrat'; font-size: 18px; position: absolute; bottom: 115px; left: 270px; font-weight: bold;"><?php echo $ticket['date']; ?></strong>
								</div>

								<!-- concert information au milieu -->
								<div class="ticket-details" style="text-align: center;">
									
									<i class="fa fa-map-marker" style="color: black; font-size: 18px; position: absolute; bottom: 33px; left: 160px; font-weight: bold;"></i>
									<strong style="color: black; font-family: 'Montserrat';font-size: 18px; position: absolute; bottom: 30px; left: 170px; font-weight: bold;"><?php echo $ticket['lieu']; ?></strong>
									<br>
									<strong style="color: blue;  font-family: 'Montserrat';font-size: 18px; position: absolute; bottom: 5px; left: 90px; font-weight: bold;">doors opening at: <?php echo $ticket['heure']; ?>h</strong>
								</div>

								<!-- concert location (prix) en bas en gras -->
								<div class="ticket-details" style="color: black; font-size: 18px; position: absolute; bottom: 18px; left: 85px; font-weight: bold;">
									<strong> <?php echo $ticket['prix']; ?>DT</strong>
							</div>
							<div class="ticket-details" style="color: blue; font-family: 'Montserrat';font-size: 20px; position: absolute; bottom: 60px; left: 100px; font-weight: bold; ">
    								EVENT TICKET
									
							</div>
							<div class="ticket-det" style="color: black; font-family: 'Montserrat';font-size: 20px; position: absolute; bottom: 65px; left: 150px; font-weight: bold; ">
    								FELL THE MUSIC 
									
							</div>
							
  								


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
				<div class="btn" style="margin-left: 150px;">
					
						<button class="btn btn-lg btn-theme" onclick="window.location.href='test_mail.php'">RESERVER TICKET</button>
                        
                    </div>
				
		  		
<?php } ?>
</body>
<div style="height: 130px;"></div>
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
</html>



