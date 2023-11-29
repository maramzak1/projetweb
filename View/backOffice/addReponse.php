<?php 
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/reponseC.php';
include 'C:/xampp/htdocs/ProjetWeb2A/Model/reponse.php';


$error = "";
// créer une réclamation
$reponse = null;

// create an instance of the controller
$reponseC = new reponseC();
?>


<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Reponses</title>
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
   
									
    <form action="addReponse.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="Reponse ">Reponse</label>
                    </td>
                    <td>
                        <textarea name="reponse" id="Reponse" ></textarea>
                    </td>
                </tr>
               
            </tbody>
        </table>
        <center>
            <input type="submit" value="Envoyer" >
			
        </center>
    </form>
					
	
					
		</div>   
    
    </center>
    

    <?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $reponse = $_POST['reponse'];
 
  
  $reponseC->addReponse($reponse);
  header("Location:listReponse.php");

}
?>
<footer>
    <p><b>Copyright &copy; 2023</b></p>
  </footer>
</body>

</html>


