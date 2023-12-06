<?php
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/reclamationC.php';
include 'C:/xampp/htdocs/ProjetWeb2A/Model/reclamation.php';
$error = "";
// create reclamation
$reclamation = null;
// create an instance of the controller
$reclamationC = new reclamationC();

if (
    isset($_POST["idReclamation"]) &&
    isset($_POST["etat"])
) {
    if (
        !empty($_POST['idReclamation']) &&
        !empty($_POST['etat'])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        $reclamationC->changerEtat($_POST['idReclamation'], $_POST['etat']);
        header('Location:index.php');
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
    <button><a href="index.php">Back to list</a></button>
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
                    <td><label for="etat">etat:</label></td>
                    <td>
                        <select name="etat">
                            <option value="en attente">En attente</option>
                            <option value="traitee">Traitee</option>
                            <option value="rejetee">Rejetee</option>
                        </select>
                        <span id="erreurStatut" style="color: red"></span>
                    </td>
                </tr>
                
                   


                <td>
                    <input type="submit" value="Update">
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