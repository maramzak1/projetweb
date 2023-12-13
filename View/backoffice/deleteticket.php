<?php
include '../../Controller/ticketC.php';
$clientC = new ticketC();
$clientC->deleteticket($_GET["id"]);
header('Location:listticketbf.php');
?>
