
    
<?php
session_start();
include "../../Controller/RegionC.php";
include "../../Controller/UtilisateurC.php";
include "../../Model/Utilisateur.php";
include "../../Controller/FolkloreC.php";
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


if (isset($_GET['id_region'])) {
    $id_region = $_GET['id_region'];

    $folkloreC = new FolkloreC();
    $folkloreDetails = $folkloreC->getFolkloresByRegion($id_region);}


	
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






			l'affichage 	<!-- L AFFICHAAAAGE -->
<div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php foreach ($folkloreDetails as $folklore) { ?>
				 
                <div class="item active" style="background-image: url('../../Assets/frontoffice/img/banner/<?php echo $folklore['banner']; ?>');">
                    <div class="container" style="padding-left: 0; padding-right: 0;">

                        <!-- banner caption -->
                        <div class="carousel-caption slide-one" style="left: 5%; right: 0; text-align: left; padding-top: 110px;"> <!-- Ajout de marge en haut -->
    <!-- heading -->
    <br>
    <br>
    <h2 class="animated fadeInLeftBig" style="margin-bottom: 10px; top: 40px;"><i class="fa fa-music"></i> <?php echo $folklore['nom']; ?></h2>
    <?php
$histoire = $folklore['histoire'];
$caracteresParLigne = 50;

// Utilisation de chunk_split pour ajouter un saut de ligne tous les 55 caractères
$histoireWrapped = chunk_split($histoire, $caracteresParLigne, "<br>");
?>

<h3 class="animated fadeInRightBig" style="margin-bottom: 20px; top: 40px; padding-bottom: 300px;">
    <?php echo $histoireWrapped; ?>
</h3>

    <!-- video frame -->
    <div style="width: 45%; height: 400px; position: absolute; top: 140px; right: 15%; overflow: hidden; border: 8px solid #000; box-sizing: border-box; border-radius: 10px;"> <!-- Ajustez le top en fonction de vos besoins -->
        <!-- video -->
        <video controls autoplay loop style="width: 100%; height: 100%; object-fit: cover;">
            <source src="../../Assets/frontoffice/img/video/<?php echo $folklore['chanson']; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>


    <!-- Chanteur -->
    <a href="ecouterchonson.php?idUtilisateur=<?php echo $folklore['artiste']; ?>" class="animated fadeIn btn btn-theme">On a écouté pour vous</a>
    




    <!-- Formulaire de notation -->
    <form id="ratingForm" action="submit_rating.php" method="post" class="rating-form" style="position: absolute; top: 530px; right: -10%; width: 45%;">
        <label for="rating">Notez ce folklore :</label>
        <div class="rating-stars">
            <!-- Create stars dynamically with JavaScript -->
        </div>
        <input type="hidden" name="folklore_id" value="<?php echo $folklore['id_folklore']; ?>">
        <button type="button" onclick="submitRating()">Soumettre la note</button>
    </form>

    <!-- Message de succès -->
    <div id="ratingSuccessMessage" class="animated fadeInRightBig" style="position: absolute; top: 580px; right: -10%; width: 45%;"></div>

    <!-- Total Rating -->
    <?php
    $folkloreId = isset($folklore['id_folklore']) ? $folklore['id_folklore'] : null;
    if ($folkloreId !== null) {
        $folkloreC = new FolkloreC();
        $totalRating = $folkloreC->getFolkloreRating($folkloreId);
       // echo '<h3 id="totalRating" class="animated fadeInRightBig" style="position: absolute; top: 600px; right: -10%; width: 45%;">Note:  : ' . number_format($totalRating, 2) . '/5</h3>';
    } else {
        echo '<h3 class="animated fadeInRightBig" >Erreur : ID du folklore non défini.</h3>';
    }
    ?>
</div>
                    </div>
                </div>
				
    
            <?php } ?>
        </div>
    </div>
</div>
<!--/ banner end -->


<style>
	.rating-form {
    margin-top: 20px;
}

.rating-stars {
    display: inline-block;
    font-size: 24px;
}

.rating-stars input {
    display: none;
}

.rating-stars label {
    color: #ffd700; /* couleur or pour les étoiles pleines */
    cursor: pointer;
}

.rating-stars label:hover,
.rating-stars label:hover ~ label {
    color: #f5f5f5; /* couleur grise pour les étoiles vides au survol */
}

.rating-stars label.selected {
    color: #ffd700; /* couleur or pour l'étoile pleine */}
</style>

<script>
	// Obtenir l'élément contenant les étoiles
	var ratingStarsContainer = document.querySelector('.rating-stars');

// Créer 5 étoiles
for (var i = 1; i <= 5; i++) {
    var starInput = document.createElement('input');
    starInput.type = 'radio';
    starInput.name = 'rating';
    starInput.value = i;
    starInput.id = 'star' + i; // Ajout d'un ID unique pour chaque étoile

    var starLabel = document.createElement('label');
    starLabel.htmlFor = 'star' + i; // Associer le label à l'input correspondant
    starLabel.innerHTML = '★'; // Utilisez un caractère étoile pleine

    // Ajouter l'étoile à l'élément conteneur
    ratingStarsContainer.appendChild(starInput);
    ratingStarsContainer.appendChild(starLabel);

    // Écouter les clics sur l'étoile pour mettre à jour la valeur de l'input caché
    starLabel.addEventListener('click', function () {
        document.querySelector('.rating-form input[name="rating"]').value = this.previousElementSibling.value;
    });
}
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function submitRating() {
        // Récupérer les données du formulaire
        var formData = $('#ratingForm').serialize();

        // Effectuer la requête AJAX
        $.ajax({
            type: 'POST',
            url: 'submit_rating.php',
            data: formData,
            dataType: 'json',
            success: function (response) {
                console.log(response);

                var ratingSuccessMessage = document.getElementById('ratingSuccessMessage');
                var ratingValue = document.querySelector('.rating-form input[name="rating"]:checked').value;
                ratingSuccessMessage.innerHTML = 'Vous avez évalué ce folklore avec la note : ' + ratingValue + '/5';

                // Mettre à jour le rating total si l'élément existe
                var totalRatingContainer = document.getElementById('totalRating');
                if (totalRatingContainer) {
                    totalRatingContainer.innerHTML = 'Rating total : ' + response.totalRating.toFixed(2);
                }

                // Ajouter une classe à l'étoile sélectionnée
                var selectedStar = document.querySelector('.rating-form input[name="rating"]:checked + label');

                if (selectedStar) {
                    $(selectedStar).addClass('selected');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>





<!-- block for animate navigation menu -->
<div class="nav-animate"></div>

<script src="js/jquery.js"></script>
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
<script src="js/custom.js"></script>
</body>
</html>






<!-- block for animate navigation menu -->
<div class="nav-animate"></div>

<script src="js/jquery.js"></script>
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
<script src="js/custom.js"></script>
</body>
</html>

