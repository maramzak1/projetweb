<?php
  include('C:/xampp/htdocs/ProjetWeb2A/Controller/réclamationC.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $statut = $_POST['statut'];

    résoudreReclamation($id, $statut);

    header("Location: ListReclamations.php");
  }
  ?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Résoudre la réclamation</title>
</head>
<body>
  <h1>Résoudre la réclamation</h1>

  <form action="resoudreReclamation.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <select name="statut">
      <option value="En attente">En attente</option>
      <option value="Résolue">Résolue</option>
    </select>
    <input type="submit" value="Résoudre">
  </form>

</body>
</html>