<?php
include "../../Controller/reclamationC.php";
include '../../Controller/UtilisateurC.php';
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
    $utilisateur = $utilisateurC->getUtilisateurParID($idUtilisateur);}
$c = new reclamationC();
$tab = $c->listReclamationsUser($idUtilisateur);

?>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Historique</title>
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
			background-image: url('../../assets/frontoffice/img/reclamation/backg5.jpeg');
           
            background-size: cover; /* Pour couvrir toute la surface du body */
            background-position: center center; /* Centrer l'image horizontalement et verticalement */
            background-attachment: fixed; /* L'image reste fixe pendant le défilement de la page */
            color: #1a1a1a;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
			
        }

		.table-bordered {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 1rem;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 5px 15px 0px #bbb;
	background-color: rgba(245, 245, 220, 0.8); /* Couleur beige clair avec opacité */

}

.table-bordered th,
.table-bordered td {
    padding: 1.5rem;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
    transition: background-color 0.3s;
}

.table-bordered th {
    background-color: #f8f9fa;
}
 
    .table-bordered tbody tr:hover {
        background-color: #e9ecef;
    }
	
	h2 {
		color: #fff;
        text-shadow: 2px 4px 6px rgba(85, 107, 47, 0.7); /* Ombre verte militaire pour un effet d'éclat accentué */

        margin: 2rem 0rem 1rem;
    }
</style>

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
    <div class="contact pad" id="contact">
				<div class="container">
					<!-- default heading -->
					<div class="default-heading">
						<!-- heading -->
						<br>
                        <br>
						<br>
						<h2  >Historique de réclamations</h2>
					</div>
					
					
		  
    
   
<table border="1" align="center" width="70%">
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Date d'enregistrement</th>
            <th scope="col">Etat</th>
			
          </tr>
        </thead>
        <tbody>
        <?php
    foreach ($tab as $reclamation) {
    ?>




        <tr>
            <td><?= $reclamation['titre']; ?></td>
            <td><?= $reclamation['description']; ?></td>
            <td><?= $reclamation['dateEnregistrement']; ?></td>
            <td><?= $reclamation['etat']; ?></td>
			
            <td align="center">
                <form method="POST" action="updateReclamation.php">
                    
                    <button type="submit" class="btn btn-success" >Update</button>
                    <input type="hidden" value=<?PHP echo $reclamation['idReclamation']; ?> name="idReclamation">
                </form>
            </td>
            <td>
            <a href="deleteReclamation.php?id=<?php echo $reclamation['idReclamation']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
    <?php
    }
    ?>
        </tbody>
      </table>
	  <a href="listReponse.php" class="btn btn-warning" style="margin-left: 150px;">Voir les réclamations traitées</a>
	  <a href="Region.php" class="btn btn-info" style="margin-left: 150px;">Retour a la page acceuil</a>
    </div>
  </div>
</div>
    
</body>
</html>

