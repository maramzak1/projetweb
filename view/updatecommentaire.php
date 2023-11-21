<?php
include '../controller/commentaireC.php';
include '../model/commentaire.php';

$error = "";
$commentaire = null;
$commentaireC = new commentaireC();

if (
    
    isset($_POST["comment_text"]) &&
    isset($_POST["author"]) &&
    isset($_POST["created_at"])
) {
    // Vérifier si les champs ne sont pas vides
    if (
        
        !empty($_POST["comment_text"]) &&
        !empty($_POST["author"]) &&
        !empty($_POST["created_at"])
    ) {
        // Créer une instance de Commentaire
        $commentaire = new Commentaire(
            null,
           
            $_POST['comment_text'],
            $_POST['author'],
            $_POST['created_at']
        );

        // Afficher les données du commentaire pour le débogage
        echo "Commentaire avant mise à jour: ";
        var_dump($commentaire);


   
            // Tenter de mettre à jour le commentaire
            $commentaireC->updatecommentaire($commentaire, $_POST['comment_id']);
            echo "Commentaire mis à jour avec succès!";
            header('Location: listecommentaire.php');
            
    }  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/boostrap.css">
    <title>Commentaire</title>
     
</head>

<body>
    <button><a href="listecommentaire.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['comment_id'])) {
        $commentaire = $commentaireC->showcommentaire($_POST['comment_id']);
    ?>

        <form action="updatecommentaire.php" method="POST">
            <table>
                <tr>
                    <td><label for="comment_id">ID du commentaire :</label></td>
                    <td>
                        <input type="text" id="comment_id" name="comment_id" value="<?php echo $_POST['comment_id'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="comment_text">Texte du commentaire :</label></td>
                    <td>
                        <textarea id="comment_text" name="comment_text" rows="4" cols="50"><?php echo $commentaire['comment_text'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="author">Auteur :</label></td>
                    <td>
                        <input type="text" id="author" name="author" value="<?php echo $commentaire['author'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="created_at">Créé le :</label></td>
                    <td>
                        <input type="datetime-local" id="created_at" name="created_at" value="<?php echo $commentaire['created_at'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Enregistrer">
                    </td>
                    <td>
                        <input type="reset" value="Réinitialiser">
                    </td>
                </tr>
            </table>
        </form>
        <script>
            function validateForm() {
                var comment_text = document.getElementById("comment_text").value;
                var author = document.getElementById("author").value;
                var created_at = document.getElementById("created_at").value;

                if (comment_text == "" || author == "" || created_at == "") {
                    alert("Tous les champs doivent être remplis.");
                    return false;
                }

                return true;
            }
        </script>
    <?php
    }
    ?>
</body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff; /* Blanc */
            color: #000; /* Noir */
            font-family: Arial, sans-serif;
        }

        form {
            margin: 20px;
        }

        label {
            color: #ff0000; /* Rouge */
        }

        input[type="text"],
        textarea,
        input[type="datetime-local"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #ff0000; /* Rouge */
            color: #fff; /* Blanc */
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #cc0000; /* Rouge foncé */
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        #error {
            color: #ff0000; /* Rouge */
            font-weight: bold;
            margin: 10px;
        }

        a {
            text-decoration: none;
            color: #000; /* Noir */
        }

        button {
            background-color: #ff0000; /* Rouge */
            color: #fff; /* Blanc */
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px;
        }

        button:hover {
            background-color: #cc0000; /* Rouge foncé */
        }
    </style>
    <title>Commentaire</title>
</head>


</html>
