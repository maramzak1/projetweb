<?php
include_once '../controller/postC.php';
include_once '../model/post.php';

$error = "";
$post = null;
$postC = new postC();

if (
    isset($_POST["content"]) &&
    isset($_POST["title"]) &&
    isset($_POST["date"])
) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_POST["content"]) &&
        !empty($_POST["title"]) &&
        !empty($_POST["date"])
    ) {
        // Créer une instance de Commentaire
        $post = new post(
            null,
            $_POST['content'],
            $_POST['title'],
            $_POST['date']
        );

        // Tenter de mettre à jour le commentaire
        $postC->updatepost($post, $_POST['id']);
        
        // Redirection après la mise à jour
        header('Location: listepost.php');
        exit(); // Assurez-vous de quitter le script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/boostrap.css">
    <title>posts</title>
     
</head>

<body>
    <button><a href="listepost.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $post= $postC->showpost($_POST['id']);
    ?>

        <form action="updatepost.php" method="POST">
            <table>
                <tr>
                    <td><label for="id">ID du post :</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="content">Texte du post :</label></td>
                    <td>
                        <textarea id="content" name="content" rows="4" cols="50"><?php echo $post['content'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="title">titre :</label></td>
                    <td>
                        <input type="text" id="title" name="title" value="<?php echo $post['title'] ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label for="date">Créé le :</label></td>
                    <td>
                        <input type="datetime-local" id="date" name="date" value="<?php echo $post['date'] ?>" />
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
       
    <?php
    }
    ?>
     <script>
            function validateForm() {
                var content = document.getElementById("content").value;
                var title = document.getElementById("title").value;
                var date = document.getElementById("date").value;

                if (content == "" || title == "" || date == "") {
                    alert("Tous les champs doivent être remplis.");
                    return false;
                }

                return true;
            }
        </script>
       
</body>
<html>
<style>
body {
    background-color: #fff; /* White */
    color: #000; /* Black */
    font-family: Arial, sans-serif;
}

form {
    margin: 20px;
}

label {
    color: #0000ff; /* Blue */
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
    background-color: #0000ff; /* Blue */
    color: #fff; /* White */
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
    background-color: #0066ff; /* Dark blue */
}

table {
    width: 100%;
}

td {
    padding: 10px;
}

#error {
    color: #0000ff; /* Blue */
    font-weight: bold;
    margin: 10px;
}

a {
    text-decoration: none;
    color: #000; /* Black */
}

button {
    background-color: #0000ff; /* Blue */
    color: #fff; /* White */
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 20px;
}

button:hover {
    background-color: #0066ff; /* Dark blue */
}
</style>