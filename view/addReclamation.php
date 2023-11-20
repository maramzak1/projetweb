<?php 
include 'C:/xampp/htdocs/ProjetWeb2A/Controller/reclamationC.php';
include 'C:/xampp/htdocs/ProjetWeb2A/Model/reclamation.php';
//include 'C:/xampp/htdocs/ProjetWeb2A/View/tunisika.html';
include 'C:/xampp/htdocs/ProjetWeb2A/View/index.html';
$error = "";
// créer une réclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();
?>


<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Réclamation</title>
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
    <script>
        function validateForm() {
            // Récupère la valeur des champs de saisie
            var Titre = document.getElementById("Titre").value;
            var Description = document.getElementById("description").value;

            // Vérifie que le champ "Titre" est rempli
            if (Titre === "") {
                // Affiche un message d'erreur
                alert("Veuillez saisir l'objet de la réclamation.");
                // Renvoie false pour empêcher l'envoi du formulaire
                return false;
            }

            // Vérifie que le champ "Description" est rempli
            if (Description === "") {
                // Affiche un message d'erreur
                alert("Veuillez saisir le contenu.");
                // Renvoie false pour empêcher l'envoi du formulaire
                return false;
            }

            // Si toutes les vérifications sont passées, renvoie true
            return true;
}
    </script>
</head>

<body>
    <center>
        
    <p style="font-size: 20px">Si vous avez une réclamation, n'hésitez pas à nous contacter !</p>
    </center>
    
    <form action="addReclamation.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="Titre ">Titre</label>
                    </td>
                    <td>
                        <textarea name="titre" id="Titre" ></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td>
                        <input type="text" id="description" name="description" cols="40" rows="5">
                    </td>
                </tr>
            </tbody>
        </table>
        <center>
            <input type="submit" value="Envoyer" onclick="return validateForm()">
        </center>
    </form>

    <?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  
  $reclamationC->addReclamation($titre, $description,"en attente");
  //header("Location:listReclamations.php");

}
?>
<footer>
    <p><b>Copyright &copy; 2023</b></p>
  </footer>
</body>

</html>


