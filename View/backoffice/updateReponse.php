<?php

include 'C:/xampp/htdocs/ValidationFinale/Controller/reponseC.php';
include 'C:/xampp/htdocs/ValidationFinale/Model/reponse.php';
$error = "";
// create client
$reponse = null;
// create an instance of the controller
$reponseC = new reponseC();


if (
    isset($_POST["reponse"])
   
) {
    if (
        !empty($_POST['reponse']) 
        
        
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $reponse = new reponse(
            null,
            $_POST['reponse'],
           
            time(),
           
        );
        var_dump($reponse);
        
        $reponseC->updateReponse($reponse, $_POST['idReponse']);
       

        header('Location:listReponse.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
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
    <button><a href="listReponse.php">Back to list</a></button>
    <hr>
    
    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="contact pad" id="contact">
				<div class="container">
					<!-- default heading -->
					<div class="default-heading">
						<!-- heading -->
						<h2>Modifier une reponse</h2>
					</div>
					
					
		</div>   
    <?php
    if (isset($_POST['idReponse'])) {
        $reponse = $reponseC->showReponse($_POST['idReponse']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="idReponse">idReponse:</label></td>
                    <td>
                        <input type="text" id="idReponse" name="idReponse" value="<?php echo $_POST['idReponse'] ?>" readonly />
                        <span id="erreurId" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="reponse">reponse:</label></td>
                    <td>
                        <input type="text" id="reponse" name="reponse" value="<?php echo $reponse['reponse'] ?>" />
                        <span id="erreurReponse" style="color: red"></span>
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