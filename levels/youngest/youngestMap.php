<?php
require "../../database.php";
session_start();

$image = $_SESSION['avatar'];

var_dump($image);
echo "<img class='image1' style='position:absolute;bottom:0;right:0;margin:5px;' src=../../$image>";
echo "</img>";







 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styleLevels.css">
  </head>
  <body style="background-color:lightgreen;overflow-y:initial;margin:0%;padding:0%;z-index:5;">
    <img src="../../Granja/GranjaFull.png" style="width:100%;height:100%;position:absolute;">
  </body>
</html>
