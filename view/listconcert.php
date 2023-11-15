<?php
include "../controller/concertC.php";

$c = new concertC();
$tab = $c->listconcert();
?>
<html>
<center>
    <h1>List of concerts</h1>
    <h2>
        <a href="addconcert.php">Add concert</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id concert</th>
        <th>date</th>
        <th>lieu</th>
        <th>Etat</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $concert) {
    ?>




        <tr>
            <td><?= $concert['id']; ?></td>
            <td><?= $concert['date']; ?></td>
            <td><?= $concert['lieu']; ?></td>
            <td><?= $concert['etat']; ?></td>
            <td align="center">
                <form method="POST" action="updateconcert.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $concert['id']; ?> name="idconcert">
                </form>
            </td>
            <td>
                <a href="deleteconcert.php?id=<?php echo $concert['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</html>
</table>
