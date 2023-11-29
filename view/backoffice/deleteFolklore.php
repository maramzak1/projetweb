<?php
include '../../Controller/FolkloreC.php';
$FolkloreC = new FolkloreC();
$FolkloreC->deleteFolklore($_GET["id"]);
header('Location:listFolklore.php');
