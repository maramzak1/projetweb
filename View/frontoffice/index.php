<?php
session_start();
include '../../Controller/UtilisateurC.php';
include '../../Model/Utilisateur.php';
include '../../Controller/concertC.php';
include '../../Model/concert.php';

$ctC = new concertC;
$ct = $ctC->listconcert();

$error = "";
$utilisateur = null;
$utilisateurC = new UtilisateurC();

$idUtilisateur = isset($_GET['idUtilisateur']) ? intval($_GET['idUtilisateur']) : 0;
$concertC = new concertC();
$concerts = $concertC-> getConcertsByUserId($idUtilisateur);

// Utilisez la liste $concerts pour afficher les informations dans votre page

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


            <div class="concerts parallax-three pad" id="concerts">
                <div class="container">
                    <div class="default-heading-shadow">
                        <h2>Coming concerts</h2>
						
						<?php
            // Check if the connected user ID matches the ID in the URL
            if ($idUtilisateur && isset($_GET['idUtilisateur']) && $idUtilisateur == $_GET['idUtilisateur']) {
                echo '<button class="btn btn-sm btn-theme" onclick="window.location.href=\'addconcert.php\'">Ajouter un Concert</button>';
            }
            ?>
                        <!-- events element -->
                        <style>

							.concerts-item  {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 30);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }

  .lieu {
    color: grey;
    font-size: 22px;
  }

  .concerts button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }

  .concerts button:hover {
    opacity: 0.7;
  }

	
    .concert-cell {
        padding-right: 100px; /* Ajustez la valeur selon vos besoins */
        margin-bottom: 100px; /* Ajout de marge entre chaque concert */
    }
</style>


<div class="concerts-element">
    <div class="row">
        <table>
            <?php $counter = 0; ?>
            <?php foreach ($concerts as $concert) { ?>
                <?php if ($counter % 3 == 0) { ?>
                    <!-- Nouvelle ligne pour chaque troisième concert -->
                    <tr>
                <?php } ?>

                <td class="concert-cell">
                    <div class="concerts-item">
                        <!-- concert date -->
                        <div class="figure">
                            <div class="concert-date">
                                <strong style="color:white; font-size: 30px;"><?php echo $concert['date']; ?></strong>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <!-- concert location -->
                        <div class="figure">
                            <span class="concert-location">
                                <i class="fa fa-map-marker" style="font-size: 30px; color: red;">
                                    <strong style="color:black; font-size: 30px;"><?php echo $concert['lieu']; ?></strong>
                                </i>
                            </span>
                        </div>

                        <!-- image -->
                        <div class="figure">
                            <img class="img-responsive" src="../../Assets/frontoffice/img/event/<?php echo $concert['image']; ?>" alt="" />
                            <!-- image hover -->
                            <div class="img-hover">
                                <!-- hover icon -->
                                <a href="#"><i class="fa fa-play-circle"></i></a>
                            </div>
                        </div>

                        <!-- concert information -->
                        <div class="figure">
                            <div class="concert-info">
                                <strong style="color:black; font-size: 30px;"><?php echo $concert['etat']; ?></strong>
                            </div>
                        </div>

                        <!-- concert title -->
                        <div class="figure">
                            <button class="btn btn-lg btn-theme" onclick="window.location.href='afficheticket.php?id_concert=<?= $concert['id_concert']; ?>'">Book Ticket</button>
                        </div>
                    </div>
                </td>

                <?php $counter++; ?>

                <?php if ($counter % 3 == 0) { ?>
                    <!-- Fermer la ligne après chaque troisième concert -->
                    </tr>
                <?php } ?>
            <?php } ?>

            <?php
            // Si le nombre total de concerts n'est pas un multiple de 3, fermer la dernière ligne
            if ($counter % 3 != 0) {
                echo '</tr>';
            }
            ?>

        </table>
    </div>
</div>
<div style ="height: 130px;"></div>
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

</body>	
</html>


