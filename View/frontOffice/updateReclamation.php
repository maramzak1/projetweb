<?php

include 'C:/xampp/htdocs/ProjetWeb2A/Controller/reclamationC.php';
include 'C:/xampp/htdocs/ProjetWeb2A/Model/reclamation.php';
$error = "";
// create client
$reclamation = null;
// create an instance of the controller
$reclamationC = new reclamationC();


if (
    isset($_POST["titre"]) &&
    isset($_POST["description"]) 
   
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["description"]) 
        
        
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $reclamation = new reclamation(
            null,
            $_POST['titre'],
            $_POST['description'],
            time(),
            "en attente"
           
        );
        var_dump($reclamation);
        
        $reclamationC->update($reclamation, $_POST['idReclamation']);
       

        header('Location:listReclamations.php');
    } else
        $error = "Missing information";
}



?>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Réclamation</title>
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
    <script src="add.js" ></script>
       
</head>

<body>
    <center>
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
						<h2>Modifier une réclamation</h2>
						
					</div>
                    <a href="listReclamations.php" class="btn btn-danger">Back to list</a>
   
    <?php
    if (isset($_POST['idReclamation'])) {
        $reclamation = $reclamationC->showReclamation($_POST['idReclamation']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="idReclamation">idReclamation:</label></td>
                    <td>
                        <input type="text" id="idReclamation" name="idReclamation" value="<?php echo $_POST['idReclamation'] ?>" readonly />
                        <span id="erreurId" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">titre:</label></td>
                    <td>
                        <input type="text" id="titre" name="titre" value="<?php echo $reclamation['titre'] ?>" />
                        <span id="erreurTitre" style="color: red"></span>
                    </td>
                </tr>
                
                <tr>
                    <td><label for="description">description :</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $reclamation['description'] ?>" />
                        <span id="erreurDescription" style="color: red"></span>
                    </td>
                </tr>
                
            
                   


                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
   
</body>

</html>