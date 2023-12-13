<?php
session_start();
include "../../Controller/UtilisateurC.php";
include "../../Controller/FolkloreC.php";
include "../../Controller/ChansonC.php";
include "../../Model/Chanson.php";

$c = new UtilisateurC();
$error = "";
$utilisateur = null;
$utilisateurC = new UtilisateurC();

$listeUtilisateurs = $utilisateurC->listUtilisateurs();

// Récupérer l'ID de l'utilisateur depuis l'URL
if (isset($_GET['idUtilisateur'])) {
    $idUtilisateur = $_GET['idUtilisateur'];

    // Récupérer les informations de l'utilisateur à partir de la base de données
    $utilisateur = $c->getUtilisateurParID($idUtilisateur);
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
    $utilisateurd = $utilisateurC->getUtilisateurParID($idUtilisateur);







$chansonC = new ChansonC();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les champs sont non vides
    if (!empty($_POST['lien']) && !empty($_POST['utilisateur'])  ) {
        // Créer un objet Folklore avec les données du formulaire
        $chanson = new Chanson(
            null,
            $_POST['lien'],
            $_POST['utilisateur'],
           
            
        );

        // Ajouter le folklore à la base de données
        $chansonC->addChanson($chanson );

        // Rediriger vers la liste des folklores
        header('Location: ecouterchonson.php');
        exit();
    } else {
        // Afficher une erreur si des informations sont manquantes
        $error = "Missing information";
    }
}




$c = new ChansonC();
$listeChansons = $c->listChanson();

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tounizika</title>
    <!-- Description, Keywords, Author, Viewport, and other meta tags... -->

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
      .item {
   background-size: cover;
   background-position: center;
   height:900px; /* Ajustez la hauteur selon vos besoins */
   width: 1700px; 
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
		
        echo '<li><a href="profiluser.php">' . $utilisateurd['nom'] . ' ' . $utilisateurd['prenom'] . '</a></li>';
        
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
				
   

			

    <!-- Custom Styles -->
    <style>
        .audio-player i.fa-play {
            display: inline-block;
        }

        .audio-player i.fa-pause {
            display: none;
        }
        body {
        background-color: #f5f5dc;  /* Fond blanc */
        background-image: url('../../Assets/frontoffice/img/banner/1.png' );

        background-size: cover;
        background-position: center;
        height: 100%; /* Ajustez la hauteur selon vos besoins */
        width: 100%;
        margin: 0;
        padding: 0;
    }
    

    

    </style>

<script>
    function toggleAudio(playerId) {
        var audio = document.getElementById(playerId);
        var playIcon = document.querySelector("#" + playerId + " + i.fa.fa-play");
        var pauseIcon = document.querySelector("#" + playerId + " + i.fa.fa-pause");

        if (audio.paused) {
            audio.play();
            playIcon.style.display = "none";
            pauseIcon.style.display = "inline-block";
        } else {
            audio.pause();
            playIcon.style.display = "inline-block";
            pauseIcon.style.display = "none";
        }
    }
</script>

</head>

<body>

<!-- Hero block area -->
<div id="Acceuil" class="hero pad">
    <div class="container">
    
        <!-- hero content -->
        <div class="hero-content">
            <!-- heading -->
            <?php if ($utilisateur) : ?>
                <h2>Les chansons les plus connues de <?= $utilisateur['nom'] ?></h2>
            <?php else : ?>
                <h2>Les chansons les plus connues</h2>
            <?php endif; ?>
            <hr>
            <!-- paragraph -->
            <p>Voici une <strong class="theme-color">vaste</strong> sélection de chansons en espérant que vous <strong
                        class="theme-color">apprécierez</strong>.</p>
        </div>
        <!-- hero play list -->
        <div class="hero-playlist">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <!-- music album image -->
                    <div class="figure">
                        <!-- image -->
                        <img class="img-responsive" src="../../assets/frontoffice/img/album/semi.jpg" alt=""/>
                    </div>
                    <!-- album details -->
                    <div class="album-details">
                        <!-- title -->

                        <!-- composed by -->
                        <h5></h5>
                        <!-- paragraph -->
                        <p></p>

                        <!-- button -->
                        <button><a href="index.php">retour au acceuil</a></button>
                    </div>
                    
                    
                    
                  












</div>
<div class="col-md-6 col-sm-6">
    <!-- play list -->
    <div class="playlist-content">
        <ul class="list-unstyled">
            <?php if (!empty($listeChansons)): ?>
                <?php foreach ($listeChansons as $chanson) : ?>
                    <li class="playlist-number">
                        <!-- song information -->
                        <div class="song-info">
                            <!-- song title -->
                            <h4><?= $chanson['lien']; ?></h4>
                            <p>
                                <strong>Singer</strong>: <?= $chanson['utilisateur']; ?></p>
                        </div>
                        <!-- audio element -->
                        <div class="audio-player">
                            <i class="fa fa-play" onclick="toggleAudio('audio<?= $chanson['id_chanson']; ?>')"></i>
                            <i class="fa fa-pause" onclick="toggleAudio('audio<?= $chanson['id_chanson']; ?>')"></i>
                            <audio id="audio<?= $chanson['id_chanson']; ?>" src="<?= $chanson['lien']; ?>" type="audio/mp3"></audio>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Aucune chanson disponible.</li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- Chanteur -->
    <a href="index.php?idUtilisateur=<?php echo  $utilisateur['idUtilisateur']?>" class="animated fadeIn btn btn-theme">Vous aimez notre séléction ? Assistez à notre artiste en live!</a>
</div>




<!-- Javascript files -->
<!-- jQuery -->
<script src="../../assets/frontoffice/js/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="../../assets/frontoffice/js/bootstrap.min.js"></script>
<!-- WayPoints JS -->
<script src="../../assets/frontoffice/js/waypoints.min.js"></script>
<!-- Include js plugin -->
<script src="../../assets/frontoffice/js/owl.carousel.min.js"></script>
<!-- One Page Nav -->
<script src="../../assets/frontoffice/js/jquery.nav.js"></script>
<!-- Respond JS for IE8 -->
<script src="../../assets/frontoffice/js/respond.min.js"></script>
<!-- HTML5 Support for IE -->
<script src="../../assets/frontoffice/js/html5shiv.js"></script>
<!-- Custom JS -->
<script src="../../assets/frontoffice/js/custom.js"></script>
</body>
</html>
