<?php
include("../../Controller/UtilisateurC.php");
include("../../Model/Utilisateur.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = "";
$utilisateurC = new UtilisateurC();

$idUtilisateur = isset($_POST['idUtilisateur']) ? $_POST['idUtilisateur'] : null;
 
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etat = isset($_POST['etat']) ? $_POST['etat'] : null;

    if (!is_null($idUtilisateur) && !is_null($etat)) {
        $utilisateurC->etatDuCompte($idUtilisateur, $etat);
        header('Location: tables-basic.php');
        exit();
    } else {
        $error = "Missing information";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Modifier rôle</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://raubaca.neocities.org/codepen/base.css'>
    <link rel="stylesheet" href="../../assets/backOffice/dist/style.css">
    <style>
        /* Ajoutez ici vos styles personnalisés ou utilisez un fichier externe */
        .button {
            text-align: center;
            margin-top: 20px;
        }

        .button input {
            background-color: #8B4513;
            color: #ffffff;
            cursor: pointer;
            width: 200px;
            height: 40px;
            font-size: 16px;
        }

        .button input:hover {
            background-color: #542828;
        }

        label {
            color: #8B4513;
            font-weight: bold;
            font-size: 16px;
            display: block;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
    <input type="hidden" name="idUtilisateur" value="<?php echo $idUtilisateur; ?>">
    <label for="etat">Activer ou désactiver le compte :</label>
    <select id="etat" name="etat">
        <option value="0">Activer</option>
        <option value="1">Désactiver</option>
    </select>
    <script src="../../assets/backOffice/dist/script.js"></script>

    <div class="button">
        <input type="submit" value="Save">
    </div>
</form>

    
</body>
</html>
