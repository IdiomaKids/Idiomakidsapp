<?php
require '../database.php';
session_start();
$idplayer = $_SESSION['id_player'];
// echo $idplayer;
 ?>

<!-- //Pagina que sirve de pasarela entre las diferentes opciones que tiene; Estan abajo detalladas -->
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <link rel="stylesheet" href="styleScreen.css">
    <link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body class="bodyScreen">
    <a href="../../logout.php">
    <img src="../../images/logout.png" alt="" style="
   width: 50px;
   position: absolute;
   right: 0;
   top: 0;
   margin: 5px;
"></a>
    <div class="group">
      <a href="../../content.php" style="text-align:center;text-decoration:none;" class="buttonStyle">CONTENIDO</a>
        <a href="adminPlayer.php" style="text-align:center;text-decoration:none;" class="buttonStyle">ADMINSTRAR JUGADOR</a>
      <a href="../../whoareyouCalifications.php" class="buttonStyle" style="text-align:center;text-decoration:none;">CALIFICACIONES</a>
      <br>
      <br>
      <br>
      <br>
      <a href="../whoareyouSetS.php" class="buttonStyle" style="text-align:center;text-decoration:none;">VOLVER</a>

    </div>
  </body>
</html>
