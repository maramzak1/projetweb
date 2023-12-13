<?php
include("../../Controller/UtilisateurC.php");
$clientC = new UtilisateurC();
$clientC->deleteUtilisateur($_GET["id"]);
header('Location:tables-basic.php');
