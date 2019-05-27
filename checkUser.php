<?php
session_start();
$name = $_SESSION['name'];
$birth = $_SESSION["birthday"];
$avatar = $_SESSION["avatar"];
$iduser = $_SESSION["id_user"];
$idplayer = $_SESSION["id_player"];
// echo $idplayer;

require 'database.php';
//echo $iduser;
$sql = "SELECT email, password FROM users WHERE id_user = $iduser";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_user', $_SESSION['id_user']);
$stmt->execute();
$_SESSION['birth'] = $_POST['birth'];
  if ($stmt->execute()) {
    foreach ($conn->query($sql) as $fila) {
    //echo $fila['email'];
    //echo $fila['password'];
    $email2 = $_POST['email'];
    $pass2 = $_POST['password'];
  }

  if ($fila['email'] == $email2 && $fila['password'] == $pass2) {
    $_SESSION['id_player'] = $idplayer;
    header("Location: /configurationn/configScreen.php");
      echo "<p> Bienn";
      echo "</p>";
    }
    else {
      echo "<p> Mal";
      echo "</p>";
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="bodyBack">
    <h1 style="text-align:center;">Configuración padres</h1>
    <form class="" action="checkUser.php" method="post">
      <container style="margin-left:9%;"class="containerFields">

        <section style="margin-left:30%;"class="emailField">
            <h4 style="font-size:25px;display:table-row;">Email</h4>
            <input type="email" name="email" id="email">
        </section>
        <section style="margin-left:355;"class="passwordField">

          <h4 style="font-size:25px;display:table-row;">Contraseña</h4>
          <input type="password" name="password" id="password">
        </section>

      </container>
      <?php if(!empty($message)): ?>
        <p> <?= $message ?></p>
      <?php endif; ?>
      <div style="margin-left:35%;"class="buttonGroup">
        <input type="submit" name="buttonL" id="buttonLogin" value="CONFIRMAR"></input>
        <a href="pasarelaCero.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">VOLVER</button></a>

    </form>
    <script type="text/javascript">
      function check(){
        document.getElementById('email').value;
      }
    </script>
  </body>
</html>
