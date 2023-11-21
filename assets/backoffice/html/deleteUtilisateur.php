<?php
include '../Controller/UtilisateurC.php';
$clientC = new UtilisateurC();
$clientC->deleteUtilisateur($_GET["idUtilisateur"]);
header('listeUtilisateurs.php');
