<?php
require '../../database.php';
session_start();
$name = $_SESSION['name'];
$birth = $_SESSION["birthday"];
$avatar = $_SESSION["avatar"];
$iduser = $_SESSION["id_user"];
$idplayer = $_SESSION["id_player"];

echo "<h2>Bienvenido, $name";
echo "</h2>";
 ?>

<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <link rel="stylesheet" href="styleLevels.css">
    <link rel="shortcut icon" type="image/png" href="../../images/LogoApp.ico"/>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body class="bodyMiddle">
    <img src="../../images/generalData.png" style="width:99%;height:100%;position:absolute;top:0;">
    <a href="../../logout.php">
    <img src="../../images/logout.png" alt="" style="
   width: 50px;
   position: absolute;
   right: 0;
   top: 0;
   margin: 5px;
"></a>
<!-- //Al ser divs individuales, hemos decidido poner los estilos directamente en el Html -->
<div style="width: 24%;
    height: 350px;
    position: absolute;
    left: 7%;
    top: 5%;
    border-radius: 58px;
    cursor: pointer;
    " onclick="map()">

</div>
<div style="    width: 24%;
    height: 388px;
    position: absolute;
    left: 28%;
    bottom: 0;
    border-radius: 130px;
    cursor: pointer;" onclick="pj()">

</div>
<div style="    width: 24%;
    height: 388px;
    position: absolute;
    left: 51%;
    top: 30px;
    border-radius: 58px;
cursor: pointer;
    " onclick="changePj()">

</div>
<div style="    width: 22%;
    height: 345px;
    position: absolute;
    left: 70%;
    bottom: 0;
    border-radius: 230px;
cursor: pointer;
    " onclick="checkUser()">

</div>
<script type="text/javascript">
//Los diferentes sitios a los que se puede ir al pulsar en los divs
  function map(){
    window.location.href="middleMap.php";
  }
  function pj(){
    window.location.href="../../character.php";
  }
  function changePj(){
    window.location.href="../../whoareyouSetS.php";
  }
  function checkUser(){
    window.location.href="../../checkUser.php";
  }
</script>
  </body>
</html>
