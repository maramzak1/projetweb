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

<body>


<header>
				
				<div class="container">
					<!-- default heading -->
					<div class="default-heading">
						<!-- heading -->
						<h2>liste des reponses</h2>
					</div>
					
					
		  
    
   
<table border="1" align="center" width="70%">
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
           
            <th scope="col">Id réponse</th>
            <th scope="col">reponse</th>
            <th scope="col">Date de la reponse</th>
           
          </tr>
        </thead>
        <tbody>
        <?php
    foreach ($tab as $reponse) {
    ?>




        <tr>
            
            <td><?= $reponse['idReponse']; ?></td>
            <td><?= $reponse['reponse']; ?></td>
            <td><?= $reponse['dateReponse']; ?></td>
            <td><?= $reponse['idReclamation']; ?></td>
            <td align="center">
                <form method="POST" action="updateReponse.php">
                    
                    <button type="submit" class="btn btn-success" >Update</button>
                    <input type="hidden" value=<?PHP echo $reponse['idReponse']; ?> name="idReponse">
                </form>
            </td>
            <td>
            <a href="deleteReponse.php?id=<?php echo $reponse['idReponse']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
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