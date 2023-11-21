<?php
include '../../Controller/RegionC.php';
$RegionC = new RegionC();
$RegionC->deleteRegion($_GET["id"]);
header('Location:listRegion.php');
