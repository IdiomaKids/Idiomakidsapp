<?php
require ("database.php");
session_start();
$variable = $_GET['id'];
$variable2 = $_GET['birth'];

$sql = "SELECT birthday FROM players WHERE id_player = $variable";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_user', $_SESSION['id_user']);


$stmt->execute();


echo "<br>";
echo $variable;
echo "<br>";
echo $variable2;



if ($variable2 <=5 ) {
header("Location: /xampp/IdiomaKidsWeb/sinLogin/sinLogin.html");
echo "<p> in progress 5";
echo "</p>";
}

else if ($variable2 > 9) {
  header("Location: /xampp/IdiomaKidsWeb/index.php");
  echo "<p> in progress 9";
  echo "</p>";
}

else if ($variable2 >= 6 || $variable2 <=8) {
  header("Location: /xampp/IdiomaKidsWeb/signup.php");
  echo "<p> in progress 8";
  echo "</p>";
}


 ?>
