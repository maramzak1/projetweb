<?php
include("../../Controller/UtilisateurC.php");
include("../../Model/Utilisateur.php");

$error = "";
$utilisateurC = new UtilisateurC();

$idUtilisateur = isset($_POST['idUtilisateur']) ? $_POST['idUtilisateur'] : null;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $configuration = isset($_POST['configuration']) ? $_POST['configuration'] : null;

    if (!is_null($idUtilisateur) && !is_null($configuration)) {
        $utilisateurC->updateUtilisateur($idUtilisateur, $configuration);
        header('Location: tables-basic.php');
        exit();
    } else {
        $error = "Missing information";
    }
}
?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>CModifier role</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://raubaca.neocities.org/codepen/base.css'><link rel="stylesheet" href="../../assets/backOffice/dist/style.css">

</head>
<body>
        <div class="button">
          <input type="submit" value="Retour au tableau">
        </div>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
    <input type="hidden" name="idUtilisateur" value="<?php echo $idUtilisateur; ?>">
    <label for="configuration">Configuration :</label>
    <select id="configuration" name="configuration">
        <option value="0">Administrateur</option>
        <option value="1">Utilisateur</option>
        <option value="2">Artiste</option>
    </select>
    <script  src="../../assets/backOffice/dist/script.js"></script>
    

    <div class="button">
          <input type="submit" value="Save">
        </div>
</form>

</body>
<style>
    body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: linear-gradient(135deg, #8E24AA, #039BE5); /* Bleu mauve */
}

form .button input {
    height: 150%;
    width: 150%;
    border-radius: 10px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #EFEBE9, #591ee9);
}</style>

</html>