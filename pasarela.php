<?php
session_start();
$playerBirthday = $_SESSION["birthday"];
$actual = date("Y-d-j");
$result = date("Y", strtotime($actual)) - date("Y", strtotime($playerBirthday));

echo $result;

if ($result <=5 ) {
header("Location: /xampp/IdiomaKidsWeb/sinLogin/sinLogin.html");
}

if ($result > 5 || $result <=8) {
  // code...
  echo "<p> in progress ";
  echo "</p>";
}

if ($result > 9) {
  // code...
  echo "<p> in progress ";
  echo "</p>";
}
 ?>
