

<script type="text/javascript">
  function id(){

  }
</script>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="bodyBack">
<h1 style="text-align:center;">¿Quién eres?</h1>
<?php
require 'database.php';
session_start();
$iduser = $_SESSION['id_user'];
$email = $_SESSION['email'];

//echo $iduser;

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
    width: 808px;'>";
foreach ($conn->query($sql) as $fila) {
  $playerBirthday = $fila["birthday"];
  $name = $fila['name'];
  $iduser = $fila['id_user'];
  $idplayer = $fila['id_player'];
  $avatar = $fila['avatar'];

  $actual = date("Y-d-j");
  $result = date("Y", strtotime($actual)) - date("Y", strtotime($playerBirthday));
  //echo $result;
           // print "Nombre: " .  $fila['name'] . "\n";
           // echo "<p>";
           // print "id player: " . $fila['id_player'] . "\n";
           $_SESSION["birthday"] = $fila["birthday"];
           $_SESSION["id_player"] = $fila["id_player"];
           //var_dump($fila['id_player']);
           echo "<a href='pasarela.php?id=".$fila["id_player"]."&birth=$result&name=$name&iduser=$iduser&avatar=$avatar'>";
           echo "<div style='width:200px;display:inline-block;'>";
           echo "<img alt=".$fila["id_player"]." style='background-color:white;width: 150px;height: 150px;border-radius: 100px;border: 3px solid black;margin-left: 12%;margin-bottom: 1%;cursor: pointer;' src=".$fila["avatar"].">";
           echo "</a>";
           echo "</div>";

        // echo $fila['id_player'];
}
echo "</section>";
 ?>


  <br> Welcome. <?= $_SESSION['email']; ?>
  <br>You are Successfully Logged In
  <a href="logout.php">
    Logout
  </a>
  </body>
</html>
