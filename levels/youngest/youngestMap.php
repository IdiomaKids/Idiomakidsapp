<?php
require "../../database.php";
session_start();
$image = $_SESSION['avatar'];
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <link rel="stylesheet" href="styleLevels.css">
  </head>
  <body style="background-color:lightgreen;overflow-y:initial;margin:0%;padding:0%;z-index:5;">
    <img src="../../Granja/GranjaFull.png" style="width:100%;height:100%;position:absolute;">
    <div class="primer" onclick="openGame()">

    </div>
    <div class="segundo">

    </div>
    <div class="tercero">

    </div>
    <div class="cuarto">

    </div>
    <!-- <img src="../../Granja/GranjaFull.png" style="width:100%;height:100%;position:absolute;" usemap="#mapa1"> -->

    <script type="text/javascript">
      function openGame(){
        window.open("../../cowPuzzle.php");
      }
    </script>
    <?php

    echo "<img style='background-color: white;
    width: 150px;
    height: 150px;
    border-radius: 100px;
    border: 3px solid black;
    margin-left: 12%;
    margin-bottom: 1%;
    cursor: pointer;
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 5px;' src='../../$image>'>";?>
  </body>
</html>
