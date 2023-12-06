<?php
include "C:/xampp/htdocs/ProjetWeb2A/Controller/reponseC.php";

$c = new reponseC();
$tab = $c->listReponses();

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
			.rating {
            display: flex;
        }

        .rating input {
            display: none;
        }

        .rating label {
            cursor: pointer;
            font-size: 24px;
        }

        .rating input:checked ~ label {
            color: orange;  /* Couleur pour représenter une étoile sélectionnée */
        }
            .container {
                padding: 2rem 0rem;
                }

                h4 {
                margin: 2rem 0rem 1rem;
                }

                .table-image {
                td, th {
                    vertical-align: middle;
                }
                }
                    </style>
					  <script>
        document.addEventListener('DOMContentLoaded', function () {
            const evaluationForms = document.querySelectorAll('.evaluation-form');
            
            evaluationForms.forEach(form => {
                form.addEventListener('change', function () {
                    form.submit();
                });
            });
        });
    </script>
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
						<h2>Liste des reponses</h2>
					</div>
					
					
					
					
		  
    
   
<table border="1" align="center" width="70%">
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
           
           
            <th scope="col">reponse</th>
            <th scope="col">Date de la reponse</th>
            <th scope="col">Réclamation associée</th>
			<th scope="col">Evaluation de la réponse</th>
          </tr>
        </thead>
        <tbody>
        <?php
    foreach ($tab as $reponse) {
		?>
	
		<tr>
			<td><?= $reponse['reponse']; ?></td>
			<td><?= $reponse['dateReponse']; ?></td>
			<td><?= $reponse['idReclamation']; ?></td>
			<td><?= $reponse['evaluation']; ?></td>
			<td>
				<form action="evaluation.php" method="post">
					<input type="hidden" name="idReponse" value="<?= $reponse['idReponse']; ?>">
					<!-- Affichage des étoiles -->
					<div class="rating">
						<input type="radio" id="star5_<?= $reponse['idReponse']; ?>" name="evaluation" value="5" <?= ($reponse['evaluation'] == 5) ? 'checked' : ''; ?>>
						<label for="star5_<?= $reponse['idReponse']; ?>" title="5 étoiles">&#9733;</label>
	
						<input type="radio" id="star4_<?= $reponse['idReponse']; ?>" name="evaluation" value="4" <?= ($reponse['evaluation'] == 4) ? 'checked' : ''; ?>>
						<label for="star4_<?= $reponse['idReponse']; ?>" title="4 étoiles">&#9733;</label>
	
						<input type="radio" id="star3_<?= $reponse['idReponse']; ?>" name="evaluation" value="3" <?= ($reponse['evaluation'] == 3) ? 'checked' : ''; ?>>
						<label for="star3_<?= $reponse['idReponse']; ?>" title="3 étoiles">&#9733;</label>
	
						<input type="radio" id="star2_<?= $reponse['idReponse']; ?>" name="evaluation" value="2" <?= ($reponse['evaluation'] == 2) ? 'checked' : ''; ?>>
						<label for="star2_<?= $reponse['idReponse']; ?>" title="2 étoiles">&#9733;</label>
	
						<input type="radio" id="star1_<?= $reponse['idReponse']; ?>" name="evaluation" value="1" <?= ($reponse['evaluation'] == 1) ? 'checked' : ''; ?>>
						<label for="star1_<?= $reponse['idReponse']; ?>" title="1 étoile">&#9733;</label>
					</div>
					<button type="submit" class="btn btn-info">Évaluer</button>
				</form>
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