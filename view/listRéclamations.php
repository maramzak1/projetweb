<?php
include "C:/xampp/htdocs/ProjetWeb2A/Controller/réclamationC.php";

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
          
          
        </tr>
    <?php
    }
    ?>
</table>

