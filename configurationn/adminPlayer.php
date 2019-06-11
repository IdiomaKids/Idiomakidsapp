<?php
require '../database.php';
session_start();
$iduser = $_SESSION['id_user'];
$email = $_SESSION['email'];
$idplayer2 = $_SESSION['id_player'];
$name = $_SESSION['name'];
$birth = $_SESSION["birthday"];
$avatar = $_SESSION["avatar"];

//Este archivo es el que muestra los jugadores que tiene el tutor, pero con la opción de borrar o añadir jugadores

//Primero en esta query accedemos a la tabla players, que es donde estan todos los jugadores almacenados
  $sql = "SELECT id_player, name, id_user, birthday, avatar FROM players WHERE id_user = $iduser";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id_user', $_SESSION['id_user']);
  $stmt->execute();

//Lo segundo que hacemos aqui es contar cuantos usuarios tiene asociados el tutor y sacar el numero
  $sql3 = "SELECT COUNT(id_player) FROM players WHERE id_user = $iduser";
  $result = $conn->query($sql3);
  $total = $result->fetchColumn();

//Empezamos a organizar los resultados, y los guardamos en un section donde van a ir siendo pintados
echo "<section class='scsec'>";

//Con este foreach lo que hacemos es coger la query que hemos hecho antes en el primer paso para conseguir uno a uno los datos que tiene cada usuario,
//con $fila lo que hacemos es lo que hemos explicado antes, coger uno a uno los datos, y con la variable fila ir pintandolos
foreach ($conn->query($sql) as $fila) {
  $playerBirthday = $fila["birthday"];
  $name = $fila['name'];
  $iduser = $fila['id_user'];
  $idplayer = $fila['id_player'];
  $avatar = $fila['avatar'];
  $actual = date("Y-d-j");
  $result = date("Y", strtotime($actual)) - date("Y", strtotime($playerBirthday));

           $_SESSION["birthday"] = $fila["birthday"];
           echo "<a style='text-decoration:none;color:black;' href='#?id=$idplayer&birth=$result&name=$name&iduser=$iduser&avatar=$avatar'>";
           echo "</a>";
           echo "<div style='width:200px;display:inline-block;margin-top:5%;'>";
           echo "<img style='background-color:white;width: 150px;height: 150px;border-radius: 100px;border: 3px solid black;margin-left: 12%;margin-bottom: 1%;cursor: pointer;' src='../".$fila["avatar"]."'>";
           echo "<img>";
           echo "<p style='text-align:center;text-decoration:none;'>$name";
           echo "</p>";
           echo "<a id = 'comp' style='display:block;text-align:center;text-decoration:none;color:red;'href='adminPlayer.php?id=$idplayer'>Borrar";
           echo "</a>";
           echo "</a>";
           echo "</div>";
        extract($_GET);

//Aqui es donde utilizamos la query del count, hacemos una comprobación de que si el numero total de jugadores es 1, no se pueda borrar el único jugador asociado
//En caso contrario se podrian borrar los usuarios que queramos
if ($total == 1) {
  echo "<script>document.getElementById('comp').style.display = 'none'</script>";
}else{

        if($id==$idplayer && $result!=1){
            $sql3 = "DELETE FROM player_data_map WHERE id_player=$id;";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->execute();

            $sql4 = "DELETE FROM score where id_player = $id";
            $stmt4 = $conn->prepare($sql4);
            $stmt4->execute();

            $sql2 = "DELETE FROM players where id_player = $id";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
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
   <link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
   <meta charset="utf-8">
   <title>IdiomaKids</title>
 </head>

 <body class="bodyBack">
   <h1 style="text-align:center;">ADMINISTRAR JUGADOR</h1>
   <a href="../../logout.php">
     <img src="../../images/logout.png" alt="" style="
    width: 50px;
    position: absolute;
    right: 0;
    top: 0;
    margin: 5px;
 "></a>
   <h1 style="text-align:center;"></h1>
   <container style="position: relative;
     /* width: 90%; */
     bottom: -590px;
     margin: 5px;
     left: 28%;" class="buttonStyle">
     <a href="../guardarPlayer.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">AÑADIR</button></a>
     <a href="configScreen.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">VOLVER</button></a>
   </container>
 </body>

 </html>
