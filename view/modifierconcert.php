<?php

include '../controller/concertC.php';
include '../model/cncert.php';
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
       
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $concert = new concert(
            null,
            $_POST['date'],
            $_POST['lieu'],
            $_POST['etat']
        );
        var_dump($concert);
        
        $concertC->modifierconcert($concert, $_POST['id']);

        header('Location:listconcert.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listconcert.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $concert = $concertC->showconcert($_POST['id']);
        
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="date">id :</label></td>
                    <td>
                        <input type="date" id="id" name="id" value="<?php echo $_POST['id'] ?>" />
                        <span id="erreurdate" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="lieu">lieu:</label></td>
                    <td>
                        <input type="text" id="lieu" name="lieu" value="<?php echo $concert['lieu'] ?>" />
                        <span id="erreurlieu" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="etat">etat :</label></td>
                    <td>
                        <input type="text" id="etat" name="etat" value="<?php echo $concert['etat'] ?>" />
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
    <?php
    }
    ?>
</body>

</html>
