<?php
include '../controller/commentaireC.php'; // Inclure le fichier du contrôleur
include '../model/commentaire.php';  
 
 
$error = "";

// Créer une instance du commentaire
$commentaire = null;

// Créer une instance du contrôleur
$commentaireC = new commentaireC();


if (
    isset($_POST["comment_text"]) && 
    isset($_POST["author"]) &&
    isset($_POST["created_at"])
) {
    // Vérifier si les champs ne sont pas vides
    if (
        !empty($_POST['comment_text']) &&
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

        // Utiliser $commentaire au lieu de $commentaireC pour ajouter le commentaire  
        $commentaireC->addcommentaire($commentaire); 
        // Rediriger vers la liste des commentaires
       //header('Location: listecommentaire.php'); 
       // exit(); // Ajout de exit() pour arrêter l'exécution après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
 
 
 <!DOCTYPE html>
<html lang="en">
 
<?php include '../assets/frontoffice/melodi/HTML/index.html'; ?>  
                            
                            <center>
                            <form method="POST" action="addcommentaire.php">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="comment_text"><strong>Texte du Commentaire:</strong></label>
                </td>
                <td>
                    <textarea name="comment_text" id="comment_text" cols="40" rows="5"></textarea>
                </td>
            </tr>
         
            <tr>
                <td>
                    <label for="author"><strong>Auteur:</strong></label>
                </td>
                <td>
                    <input type="text" id="author" name="author" required>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="created_at"><strong>Date de création:</strong></label>
                </td>
                <td>
                    <input type="datetime-local" id="created_at" name="created_at" required>
                </td>
            </tr>
            
        </tbody>
        <tr>
        <td colspan="2"><br></td>
    </tr>
    <center>
        <tr>
             
            <td>
                <input type="submit"  class="btn btn-lg btn-theme" value="Envoyer" onclick="return validateForm()">
            </td>
            <td>
                <input type="reset" class="btn btn-lg btn-theme"  value="Reset">
            </td>
        </tr>
    </center>
    </table>
</form>  

                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        
    </body>
</html>


 