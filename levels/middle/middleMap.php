<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="shortcut icon" type="image/png" href="../../images/LogoApp.ico"/>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body style="background-color:lightgreen;overflow-y:initial;margin:0%;padding:0%;">
    <img src="../../Granja/GranjaFull.png" style="width:100%;height:100%;">
  </body>
</html>

<?php
require "../../database.php";
session_start();

$image = $_SESSION['avatar'];

var_dump($image);
echo "<img src=$image>";







 ?>
