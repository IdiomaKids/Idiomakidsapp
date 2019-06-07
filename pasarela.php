<?php
require ("database.php");
session_start();
//En esta pantalla cogemos los datos que nos han mandado de la anterior panrtalla que es la pantalla de whoareyouSetS.php y mandarlos a la pantalla correspondiente en funcion de la edad recibida
$idplayer = $_GET['id'];
$birth = $_GET['birth'];
$name = $_GET['name'];
$iduser = $_GET['iduser'];
$avatar = $_GET['avatar'];

if ($birth <=5 ) {
header("Location: levels/youngest/youngest.php");
echo "<p> in progress 5";
echo "</p>";
}
else if ($birth >= 9) {
  header("Location: levels/oldest/oldest.php");
  echo "<p> in progress 9";
  echo "</p>";
}
else if ($birth >= 6 || $birth <=8) {
  header("Location: levels/middle/middle.php");
  echo "<p> in progress 8";
  echo "</p>";
}

//Según los datos recibidos, con el id_player hacemos un select para pasar todos los datos a la siguiente pantalla con las variables de sesion
$sql = "SELECT id_player, name, id_user, birthday, avatar FROM players WHERE id_player = $idplayer";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_user', $_SESSION['id_user']);
$idu = $_SESSION["name"];
echo $idu;
var_dump($idu);
$_SESSION["name"] = $name;
$_SESSION["birthday"] = $birth;
$_SESSION["avatar"] = $avatar;
$_SESSION["id_user"] = $iduser;
$_SESSION["id_player"] = $idplayer;
$stmt->execute();


// echo "<br>";
// echo $idplayer;
// echo "<br>";
// echo $birth;
// echo "<br>";
// echo $name;
// echo "<br>";
// echo $iduser;
// echo "<br>";
// echo $avatar;



 ?>
