<?php
include "C:/xampp/htdocs/ProjetWeb2A/Controller/reclamationC.php";

$c = new reclamationC();
$tab = $c->listReclamations();

?>

<center>
    <h1>Liste des reclamations </h1>
    <h2>
        <a href="addReclamation.php">Add reclamation</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id reclamation </th>
        <th>titre </th>
        <th>description </th>
        <th>date d'enregistrement</th>
        <th>etat</th>
        
    </tr>


    <?php
    foreach ($tab as $reclamation) {
    ?>




        <tr>
            <td><?= $reclamation['idReclamation']; ?></td>
            <td><?= $reclamation['titre']; ?></td>
            <td><?= $reclamation['description']; ?></td>
            <td><?= $reclamation['dateEnregistrement']; ?></td>
            <td><?= $reclamation['etat']; ?></td>
            <td align="center">
                <form method="POST" action="updateReclamation.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $reclamation['idReclamation']; ?> name="idReclamation">
                </form>
            </td>
            <td>
                <a href="deleteReclamation.php?id=<?php echo $reclamation['idReclamation']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</table>

