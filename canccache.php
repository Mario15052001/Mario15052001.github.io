<?php
session_start();
$_SESSION['id']=NULL;
var_dump($_SESSION['id']);
header('location: property-grid.php');
 ?>
