<?php


include '../controller/concertC.php';
include '../model/concert.php';

$error = "";
$concert = null;
$concertC = new concertC();
if (
    isset($_POST["date"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["etat"])
) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["etat"])
    ) {
        $concert = new concert(
            null,
            $_POST['date'],
            $_POST['lieu'],
            $_POST['etat']
        );
        $concertC->addconcert($concert);
        header('Location:listconcert.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> concert </title>
</head>

<body>
    <a href="listconcert.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="date">Date:</label></td>
                <td>
                    <input type="date" id="date" name="date" required>
                </td>
            </tr>
            <tr>
                <td><label for="lieu">Lieu :</label></td>
                <td>
                    <input type="text" id="lieu" name="lieu" />
                    <span id="erreurlieu" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="etat">Etat :</label></td>
                <td>
                    <input type="text" id="etat" name="etat" />
                    <span id="erreuretat" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
</body>

</html>

