<?php
require '../database.php';
session_start();
$iduser = $_SESSION['id_user'];
$email = $_SESSION['email'];
$idplayer2 = $_SESSION['id_player'];

$name = $_SESSION['name'];
$birth = $_SESSION["birthday"];
$avatar = $_SESSION["avatar"];


//echo $iduser;

  $sql = "SELECT id_player, name, id_user, birthday, avatar FROM players WHERE id_user = $iduser";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id_user', $_SESSION['id_user']);
  $stmt->execute();

  $sql3 = "SELECT COUNT(id_player) FROM players WHERE id_user = $iduser";
  $result = $conn->query($sql3); //$pdo sería el objeto conexión
  $total = $result->fetchColumn();
  // echo $total;
  // echo $sql3;

echo $avatar;
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
           echo "<a style='text-decoration:none;color:black;' href='#?id=".$fila["id_player"]."&birth=$result&name=$name&iduser=$iduser&avatar=$avatar'>";
           echo "</a>";


           // echo "<a style='display:inline-block;'href='adminPlayer.php?id=$idplayer'>Borrar";
           // echo "<p style='display:inline-block;' onclick='delete()'>Eliminar";
            // echo "</a>";
           // echo "</p>";
           echo "<div style='width:200px;display:inline-block;margin-top:10%;'>";
           echo "<img alt=".$fila["id_player"]." style='background-color:white;width: 150px;height: 150px;border-radius: 100px;border: 3px solid black;margin-left: 12%;margin-bottom: 1%;cursor: pointer;' src='../".$fila["avatar"]."'>";
           echo "<img>";
           //echo $fila["id_player"];
           echo "<p style='text-align:center;text-decoration:none;'>$name";

           echo "</p>";
           echo "<a style='display:block;text-align:center;text-decoration:none;color:red;'href='adminPlayer.php?id=$idplayer'>Borrar";
           echo "</a>";
           echo "</a>";
           echo "</div>";
//echo $idplayer;
        // echo $fila['id_player'];
        extract($_GET);


if ($total == 1) {
  echo "<p style='text-align:center;'> Al ser el único jugador no se puede borrar";
  echo "</p>";

}else{

        if($id==$idplayer && $result!=1){
            $sql2 = "DELETE FROM players WHERE id_player=$id";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
            //echo "<script>alert('ELIMINADO $id')</script>";
            echo "<script>location.href='adminPlayer.php'</script>";
        }
      }
}


echo "</section>";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body class="bodyBack">
<h1 style="text-align:center;">¿Quién eres?</h1>
<container style="position: relative;
    /* width: 90%; */
    bottom: -570px;
    margin: 5px;
    left: 28%;"class="buttonStyle">
<a href="../guardarPlayer.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">AÑADIR</button></a>
<a href="configScreen.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">SALIR SIN GUARDAR</button></a>
</container>
</body>
</html>
