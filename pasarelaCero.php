<?php
require ("database.php");
session_start();
$idplayer = $_SESSION['id_PLAYER'];
$birth = $_SESSION['birthday'];
$name = $_SESSION['name'];
$iduser = $_SESSION['id_user'];
$avatar = $_SESSION['avatar'];

$actual = date("Y-d-j");
$result = date("Y", strtotime($actual)) - date("Y", strtotime($birth));;
echo $result;

if ($result <=5 ) {
//header("Location: levels/youngest/youngest.php");
echo "<p> in progress 5";
echo "</p>";
}

else if ($result > 9) {
  //header("Location: levels/oldest/oldest.php");
  echo "<p> in progress 9";
  echo "</p>";
}

else if ($result >= 6 || $result <=8) {
  //header("Location: levels/middle/middle.php");
  echo "<p> in progress 8";
  echo "</p>";
}

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


echo "<br>";
echo $idplayer;
echo "<br>";
echo $result;
echo "<br>";
echo $name;
echo "<br>";
echo $iduser;
echo "<br>";
echo $avatar;




 ?>
