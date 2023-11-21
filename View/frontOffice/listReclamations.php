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
						<h2>Historique de réclamations</h2>
					</div>
					
					
		  
    
   
<table border="1" align="center" width="70%">
    <tr>
        <th>Id reclamation </th>
        <th>titre </th>
        <th>description </th>
        <th>date d'enregistrement</th>
        <th>etat</th>
        
    </tr>


    <?php
    foreach ($tab as $reclamation) {
    ?>




        <tr>
            <td><?= $reclamation['idReclamation']; ?></td>
            <td><?= $reclamation['titre']; ?></td>
            <td><?= $reclamation['description']; ?></td>
            <td><?= $reclamation['dateEnregistrement']; ?></td>
            <td><?= $reclamation['etat']; ?></td>
            <td align="center">
                <form method="POST" action="updateReclamation.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $reclamation['idReclamation']; ?> name="idReclamation">
                </form>
            </td>
            <td>
                <a href="deleteReclamation.php?id=<?php echo $reclamation['idReclamation']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</table>
</body>
</html>

