<?php
require 'database.php';
session_start();
$iduser = $_SESSION['id_user'];
$email = $_SESSION['email'];

//echo $iduser;
//Seleccionamos los jugadores asociados al tutor
  $sql = "SELECT id_player, name, id_user, birthday, avatar FROM players WHERE id_user = $iduser";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id_user', $_SESSION['id_user']);

  $stmt->execute();


//echo $row['name'];
//var_dump($sql);




echo "<section style='position: absolute;
    transform: translateX(-50%);
    left: 50%;
    display: inline-block;
    width: 1275px;
    top:8%;
    overflow-y:scroll;
    height:541px;' class='scsec'>";
    //Pintamos los datos con la variable $fila y por cada usuario se asigna en forma de estrellas la puntuacion de cada nivel de cada mapa
foreach ($conn->query($sql) as $fila) {
  $playerBirthday = $fila["birthday"];
  $name = $fila['name'];
  $iduser = $fila['id_user'];
  $idplayer = $fila['id_player'];
  $avatar = $fila['avatar'];

  $actual = date("Y-d-j");
  $result = $actual - date("Y", strtotime($playerBirthday));
  $sql4 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = (SELECT id_level WHERE id_player = $idplayer)";
  $result4 = $conn->query($sql4);
  $total4 = $result4->fetchColumn();


  $sql5 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = (SELECT id_level WHERE id_player = $idplayer)";
  $result5 = $conn->query($sql5);
  $total5 = $result5->fetchColumn();

  $sql6 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = (SELECT id_level WHERE id_player = $idplayer)";
  $result6 = $conn->query($sql6);
  $total6 = $result6->fetchColumn();

  $sql7 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = (SELECT id_level WHERE id_player = $idplayer)";
  $result7 = $conn->query($sql7);
  $total7 = $result7->fetchColumn();

           $_SESSION["birthday"] = $fila["birthday"];
           //var_dump($fila['id_player']);
           //echo "<a style='text-decoration:none;color:black;' href='califications.php?id=$idplayer&birth=$result&name=$name&iduser=$iduser&avatar=$avatar'>";
           echo "<div style='width:200px;display:inline-block;margin-top:3%;'>";
           if ($result<=5) {
             echo "<p style='text-align:center;'>Pequeños";
             echo "</p>";
           }
           else if ($result == 6 || $result <=8) {
             echo "<p style='text-align:center;'>Medianos";
             echo "</p>";
           }
           else if ($result >= 9) {
             echo "<p style='text-align:center;'>Mayores";
             echo "</p>";
           }
           echo "<img  style='background-color:white;width: 150px;height: 150px;border-radius: 100px;border: 3px solid black;margin-left: 12%;margin-bottom: 1%;cursor: pointer;' src=".$fila["avatar"].">";

           echo "</img>";
           echo "<p style='text-align:center;text-decoration:none;'>$name";


           echo "<p id='uno' style='display:none;'> 100";
           echo "</p>";
           echo "</p>";
           echo "<hr>";
           echo "</a>";

           echo "</div>";
           echo "<div style='display: inline-block;
    width: 220px;'>";
           if ($total4 == 0) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 1</p>";
           echo "<img src='../../images/Identificar/0Lestrella.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";

           }
           else if ($total4 == 1) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 1</p>";
           echo "<img src='../../images/Identificar/1Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total4 == 2) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 1</p>";
           echo "<img src='../../images/Identificar/2Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total4 == 3) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 1</p>";
           echo "<img src='../../images/Identificar/3Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           if ($total5 == 0) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 2</p>";
           echo "<img src='../../images/Identificar/0Lestrella.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total5 == 1) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 2</p>";
           echo "<img src='../../images/Identificar/1Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total5 == 2) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 2</p>";
           echo "<img src='../../images/Identificar/2Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total5 == 3) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 2</p>";
           echo "<img src='../../images/Identificar/3Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           if ($total6 == 0) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 3</p>";
           echo "<img src='../../images/Identificar/0Lestrella.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total6 == 1) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 3</p>";
           echo "<img src='../../images/Identificar/1Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total6 == 2) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 3</p>";
           echo "<img src='../../images/Identificar/2Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total6 == 3) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 3</p>";
           echo "<img src='../../images/Identificar/3Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           if ($total7 == 0) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 4</p>";
           echo "<img src='../../images/Identificar/0Lestrella.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total7 == 1) {

             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 4</p>";
           echo "<img src='../../images/Identificar/1Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total7 == 2) {
             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 4</p>";
           echo "<img src='../../images/Identificar/2Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
           }
           else if ($total7 == 3) {

             echo "<p style='display: inline-block;top: 25%; padding-right:13px; padding-right:13px; padding-right:13px;'>Nivel 4</p>";
           echo "<img src='../../images/Identificar/3Lestrellas.png' width='150px' style='top:9px;display:inline-block;position:relative;'>";
         }echo "<hr>";
echo "</div>";


        // echo $fila['id_player'];




}

echo "</section>";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body class="bodyBack">
    <a href="../../logout.php">
    <img src="../../images/logout.png" alt="" style="
   width: 50px;
   position: absolute;
   right: 0;
   top: 0;
   margin: 5px;
"></a>
<h1 style="text-align:center;">Calificaciones</h1>
  <a href="/configurationn/configScreen.php" style="text-decoration:none;color:black;position:absolute;bottom:0;transform:translateX(-50%);left:50%;margin-bottom:1%;"><button type="button" name="buttonR" class="salir" >VOLVER</button></a>
  </body>
</html>
