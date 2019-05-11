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

echo "<a class='downRight' href='../../logout.php'>Logout";
echo "</a>";

// echo $name;
// echo "<br>";
// echo $birth;
// echo "<br>";
// echo $avatar;
// echo "<br>";
// echo $iduser;
// echo "<br>";
// echo $idplayer;







 ?>

<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <link rel="stylesheet" href="styleLevels.css">
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body class="bodyMiddle">
    <div class="group">
      <a href="youngestMap.php" style="text-align:center;text-decoration:none;" class="buttonStyle">MAPA</a>
      <button type="button" name="button" class="buttonStyle">PERSONAJE</button>
      <a href="../../checkUser.php" class="buttonStyle" style="text-align:center;text-decoration:none;">CONFIGURACIÓN PADRES</a>
      <a href="../../whoareyou.php" class="buttonStyle" style="text-align:center;text-decoration:none;">CAMBIAR JUGADOR</a>
      <a href="../../whoareyou.php" class="buttonStyle" style="text-align:center;text-decoration:none;">SALIR</a>

    </div>
  </body>
</html>
