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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listReclamations.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

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