<?php
session_start();
require 'database.php';
//var_dump($_SESSION['id_user']);
$message = '';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $email = $_POST['email'];
    $stmt->bindParam(':password', $_POST['password']);

    $pass1 = $_POST['password'];
    $pass2 = $_POST['passwordR'];

if ($pass1 == $pass2) {
  if ($stmt->execute()) {
    header("Location: /guardarPlayerCero.php");
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
  $_SESSION['id_user'] = $last_id;
  $_SESSION['email'] = $_POST['email'];
    $message = 'Usuario creado correctamente';

  } else {
    $message = 'El correo introducido ya existe. Por favor, introduzca uno válido';
  }
}else {
  $message = 'Las contraseñas no son iguales';
}


  }
 ?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body class="bodyBack">

    <center>
      <h1>REGISTRO</h1>

<img src="images/LogoApp.png" style="width:33%;margin-top:1%;"></img>

<br>
<br>
<form class="" action="signup.php" method="post">
  <container class="containerFields">

    <section class="emailField">
        <h4 style="font-size:25px;display:table-row;">Email</h4>
        <input type="email" name="email" id="email">

    </section>
    <section class="passwordField">
      <h4 style="font-size:25px;display:table-row;">Contraseña</h4>
      <input type="password" name="password" id="password">
    </section>

    <section class="passwordField">
        <h4 style="font-size:25px;margin-bottom: 0%;">Repetir contraseña</h4>
        <input type="password" name="passwordR" id="passwordR">
    </section>
<script type="text/javascript">
    var pass1 = document.getElementById('passwordR');
    var pass2 = document.getElementById('password');
  if (pass1.value != pass2.value) {
    window.alert("No voy a pasar a la siguiente pagina")
  }
</script>
  </container>
  <br>
  <br>
  <?php if(!empty($message)): ?>
    <?= $message ?>
  <?php endif; ?>
  <div class="buttonGroup">
    <a href="index.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">VOLVER</button></a>
    <input type="submit" name="buttonR" id="buttonRegister" value="AÑADIR JUGADOR"></input>
    <div class="">
      <input type="checkbox" name="button" required></input>
      <p style="display:inline-block;">He leido y acepto la <a href="dataProtection.html">política de protección de datos</a> de IdiomaKids</p>

    </div>
  </div>
</form>


<br>
<br>
    </center>
  </body>
</html>
