<?php
include '../controller/concertC.php';
$clientC = new concertC();
$clientC->deleteconcert($_GET["id"]);
header('Location:listconcert - Copy.php');
?>
