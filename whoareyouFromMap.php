<?php
require 'database.php';
session_start();
$iduser = $_SESSION['id_user'];
$email = $_SESSION['email'];
$idplayer = $_SESSION['id_player'];


  $sql = "SELECT id_player, name, id_user, birthday, avatar FROM players WHERE id_user = $iduser";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id_user', $_SESSION['id_user']);

  $stmt->execute();


//echo $row['name'];
//var_dump($sql);

if (isset($_SESSION['id_player'])) {
  $idplayer = $_SESSION['id_player'];
  echo "<script> window.alert('soy $idplayer')";
  echo "</script>";
}


echo "<section style='position: absolute;
    transform: translateX(-50%);
    left: 50%;
    display: inline-block;
    width: 808px;'>";
foreach ($conn->query($sql) as $fila) {
  $playerBirthday = $fila["birthday"];
  $name = $fila['name'];
  $iduser = $fila['id_user'];
  $idplayer = $fila['id_player'];
  $avatar = $fila['avatar'];


  $actual = date("Y-d-j");
  $result = $actual - date("Y", strtotime($playerBirthday));
  // echo $result;
           // print "Nombre: " .  $fila['name'] . "\n";
           // echo "<p>";
           // print "id player: " . $fila['id_player'] . "\n";
           $_SESSION["birthday"] = $fila["birthday"];
           //var_dump($fila['id_player']);
           echo "<a style='text-decoration:none;color:black;' href='pasarela.php?id=$idplayer&birth=$result&name=$name&iduser=$iduser&avatar=$avatar'>";
           echo "<div style='width:200px;display:inline-block;margin-top:10%;'>";
           echo "<img style='background-color:white;width: 150px;height: 150px;border-radius: 100px;border: 3px solid black;margin-left: 12%;margin-bottom: 1%;cursor: pointer;' src=".$fila["avatar"].">";
           echo "<img>";
           echo "<p style='text-align:center;text-decoration:none;'>$name";
           echo "</p>";
           echo "</a>";
           echo "</div>";

        // echo $fila['id_player'];
}
echo "</section>";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body class="bodyBack">
<h1 style="text-align:center;">¿Quién eres?</h1>
<?php
// echo "<a href='pasarela.php?id=".$fila["id_player"]."&birth=$result&name=$name&iduser=$iduser&avatar=$avatar' style='text-decoration:none;color:black;position:absolute;bottom:0;transform:translateX(-50%);left:50%;margin-bottom:5%;'>";
// echo "<button type='button' name='buttonR' class='salir' >SALIR</button></a>";

 ?>

  <a onclick="javascript:history.back(1)" style="text-decoration:none;color:black;position:absolute;bottom:0;transform:translateX(-50%);left:50%;margin-bottom:5%;"><button type="button" name="buttonR" class="salir" >SALIR</button></a>
  </body>
</html>
