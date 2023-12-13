<?php
session_start();
include '../../Controller/UtilisateurC.php';
include '../../Model/Utilisateur.php';
include '../../Controller/concertC.php';
include '../../Model/concert.php';

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

$error = "";
$Concert = null;
$ConcertC = new concertC();


$x = new UtilisateurC();
$tabb = $x->listUtilisateurs();
if (
    isset($_POST["date"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["etat"])&&
    isset($_POST["image"])&&
	isset($_POST["utilisateur"])
) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["etat"])&&
        !empty($_POST["image"])&&
		!empty($_POST["utilisateur"])
    ) {
        $Concert = new concert(
            null,
            $_POST['date'],
            $_POST['lieu'],
            $_POST['etat'],
            $_POST['image'],
			$_POST['utilisateur']
        );
        $ConcertC->addconcert($Concert);
        header('Location: index.php?idUtilisateur=' . $idUtilisateur);
    } else
        $error = "Missing information";
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
							

								<li><a href="#Region.php">Regions</a></li>
								<li><a href="#joinus">A propos</a></li>
								<li><a href="#portfolio">Contact</a></li>
								<li><a href="profiluser.php">Compte</a></li>
								<li><a href="addUtilisateur.php">Créer Compte</a></li>

								<li><a href="auth-login-basic.php">Se Connecter</a></li>
								<?php

if ($utilisateur) 
{
	// Si l'utilisateur est connecté, afficher son nom en tant que lien vers profiluser.php
	echo '<li><a href="profiluser.php">' . $utilisateur['nom'] . ' ' . $utilisateur['prenom'] . '</a></li>';
} else {
	// Si l'utilisateur n'est pas connecté, afficher un message invitant à se connecter ou créer un compte
	echo '<li></a></li>';
}
?>
							</ul>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
				
   

			</header>
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
							

								<li><a href="#Region.php">Regions</a></li>
								<li><a href="#joinus">A propos</a></li>
								<li><a href="#portfolio">Contact</a></li>
								<li><a href="profiluser.php">Compte</a></li>
								<li><a href="addUtilisateur.php">Créer Compte</a></li>

								<li><a href="auth-login-basic.php">Se Connecter</a></li>
								<?php

if ($utilisateur) 
{
	// Si l'utilisateur est connecté, afficher son nom en tant que lien vers profiluser.php
	echo '<li><a href="profiluser.php">' . $utilisateur['nom'] . ' ' . $utilisateur['prenom'] . '</a></li>';
} else {
	// Si l'utilisateur n'est pas connecté, afficher un message invitant à se connecter ou créer un compte
	echo '<li></a></li>';
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
                        <h2>Ajouter Concert</h2>


<body>
   
       <!-- ... Autres balises head et styles ... -->

	   
       <style>
body {
    background-color: #ffffff;
    background-image: url('../assets/frontoffice/img/promo/p1.jpg');
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
    width: 70%; /* Adjusted width */
    max-width: 800px;
    margin: 20px auto;
    background-color: rgba(210, 180, 140, 0); /* Background color with alpha for transparency */
    padding: 40px;
    border-radius: 10px;
    margin-left: 15%; /* Adjusted margin-left */
}

label {
    display: block;
    margin-bottom: 20px;
    color: #ffffff; /* White text for labels */
    font-weight: bold; /* Bold text for labels */
    font-size: 18px; /* Increased font size for labels */
}

textarea,
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #808080;
    background-color: #dcdcdc;
    color: #1a1a1a;
    border-radius: 5px;
    font-size: 16px; /* Increased font size for input fields */
}

input[type="submit"] {
    background-color: #8B4513;
    color: #ffffff;
    cursor: pointer;
    width: 100%; /* Full width */
    height: 40px;
    margin-top: 15px; /* Adjusted margin-top */
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
    color: #ffffff; /* White text for h2 */
    font-weight: bold; /* Bold text for h2 */
}
</style>


    <div class="container">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    
                    <div class="card-body">
                        <form class="form-horizontal" action="" method="POST">
                            <!-- Date concerts -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" style="color:white;font-family: 'Montserrat'; font-size: 20px;">Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" style="color:black;font-family: 'Montserrat'; font-size: 20px;" id="basic-default-name-date" name="date" placeholder="Date du concert" />
                                </div>
                            </div>

                            <!-- Lieu concert  -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" style="color: white; font-family: 'Montserrat';font-size: 20px;">Lieu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="color:black;font-family: 'Montserrat'; font-size: 20px;" id="basic-default-name" name="lieu" placeholder="Lieu du concert" />
                                </div>
                            </div>

                            <!-- État concert  -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" style="color: white; font-family: 'Montserrat';font-size: 20px;">État</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="basic-default-name" name="etat">
                                        <option value="en cours">En Cours</option>
                                        <option value="annule">Annulé</option>
                                        <option value="complet">Complet</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Concert Image -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" style="color: white; font-family: 'Montserrat';font-size: 20px;">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" id="basic-default-pic" accept="image/*" />
                                </div>
                            </div>
							
                            
                            
                            
                            <div class="row mb-3">
    <label class="col-sm-2 col-form-label" style="color: white; font-family: 'Montserrat'; font-size: 20px;">Artiste</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="utilisateur" id="basic-default-pic" value="<?php echo htmlspecialchars($idUtilisateur); ?>" readonly />
    </div>
</div>

                           


                            
                            
                            
                            
                            <!-- Submit Button -->
<div class="row justify-content-end">
    <div class="col-sm-15 text-right"> <!-- Use text-right class to align the button to the right -->
        <button type="submit" class="btn btn-warning">Save</button>
    </div>
</div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ... Autres balises footer et scripts ... -->

        
            
       
</body>	
</html>


