<?php
require ("database.php");
session_start();

$idplayer = $_SESSION['id_player'];
$birth = $_SESSION['birthday'];
$name = $_SESSION['name'];
$iduser = $_SESSION['id_user'];
$avatar = $_SESSION['avatar'];

//echo $birth;

$actual = date("Y-d-j");
$result = date("Y", strtotime($actual)) - date("Y", strtotime($birth));;


$sql = "SELECT id_player, name, id_user, birthday, avatar FROM players WHERE id_player = $idplayer";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_user', $_SESSION['id_user']);

$_SESSION["id_user"] = $iduser;
$stmt->execute();

if ($result <=5 || $birth <=5) {
header("Location: levels/youngest/youngest.php");
echo "<p> in progress 5";
echo "</p>";
}

else if ($result == 6 || $result <=8 || $birth == 6 || $birth <= 8) {
  header("Location: levels/middle/middle.php");
  echo "<p> in progress 8";
  echo "</p>";
}

else if ($result > 9 || $birth > 9) {
  header("Location: levels/oldest/oldest.php");
  echo "<p> in progress 9";
  echo "</p>";
}






 ?>
