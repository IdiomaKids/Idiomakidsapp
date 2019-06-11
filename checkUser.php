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
// En esta query cogemos el email y la passaword en funcion del id, para hacer despues la comprobación de campos.
$message = '';
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
    $pass2 = password_verify($_POST['password'], $fila['password']);
  }
  // Si el dato introducido en los campos es difernete a estas comprobaciones con la BBDD, nos da error y vuelve a la misma pantalla
  // para volver a introducirlo
  if($email2 > 1 && $fila['email'] != $email2){
    $message = 'Email erroneo';
  }if($pass2 > 1 && $fila['password'] != $pass2){
      $message = 'Contraseña erronea';
  }
  // Si los datos son correctos se pasa a la siguiente pantalla
  if ($fila['email'] == $email2 && $fila['password'] == $pass2 ) {
    $_SESSION['id_player'] = $idplayer;
    header("Location: /configurationn/configScreen.php");
      echo "<p> Bienn";
      echo "</p>";
    }else{
      $message = 'Intorduzca el correo y la contraseña con la que inició sesión';
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
  </head>
  <body class="bodyBack">
    <h1 style="text-align:center;">Configuración padres</h1>
    <img src="images/LogoApp.png" style="width:33%;margin-top:1%;margin-left:33%;"></img>
    <a href="../../logout.php">
    <img src="../../images/logout.png" alt="" style="
   width: 50px;
   position: absolute;
   right: 0;
   top: 0;
   margin: 5px;
"></a>

    <form class="" action="checkUser.php" method="post">
      <container style="margin-left:9%;"class="containerFields">

        <section style="margin-left:30%;"class="emailField">
            <h4 style="font-size:25px;display:table-row;">Email</h4>
            <input type="email" name="email" id="email" required>
        </section>
        <section style="margin-left:355;"class="passwordField">

          <h4 style="font-size:25px;display:table-row;">Contraseña</h4>
          <input type="password" name="password" id="password" required>
        </section>

      </container>
      <?php if(!empty($message)): ?>
        <p style="text-align:center;"> <?= $message ?></p>
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
