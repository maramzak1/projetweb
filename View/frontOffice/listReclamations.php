<?php
include "C:/xampp/htdocs/ProjetWeb2A/Controller/reclamationC.php";

$c = new reclamationC();
$tab = $c->listReclamations();

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
			background-image: url('../../assets/frontoffice/img/backg5.jpeg');
           
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
								<img class="img-responsive" src="../../assets/frontoffice/assets/img/logo/tunisika.png" alt="" />
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
    </div>
  </div>
</div>
    
</body>
</html>

