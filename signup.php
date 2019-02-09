<?php
require 'database.php';

$message = '';
  if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $_POST['email']);
    $email = $_POST['email'];
    $stmt->bindParam(':name', $_POST['name']);
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $_POST['password']);
    if ($stmt->execute()) {
      $message = 'Usuario creado correctamente';
      header("Location: /xampp/IdiomaKidsWeb/guardarPlayer.php?email=$email");
    } else {
      $message = 'El correo introducido ya existe. Por favor, introduzca uno válido';
    }
  }
 ?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="bodyBack">

    <center>
      <h1>REGISTRO</h1>

<img src="images/LogoApp.png" style="width:35%;margin-top:1%;"></img>

<br>
<br>
<form class="" action="signup.php" method="post">
  <container class="containerFields">
    <section class="userField">
        <h4 style="font-size:25px;margin-bottom: 0%;">Nombre</h4>
        <input type="text" name="name" id="name">
    </section>
    <section class="emailField">
        <h4 style="font-size:25px;display:table-row;">Email</h4>
        <input type="email" name="email" id="email" value="email">

    </section>
    <section class="passwordField">
      <h4 style="font-size:25px;display:table-row;">Contraseña</h4>
      <input type="password" name="password" id="password">
    </section>

  </container>
  <br>
  <br>
  <?php if(!empty($message)): ?>
    <?= $message ?>
  <?php endif; ?>
  <div class="buttonGroup">
    <a href="login.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">VOLVER</button></a>
    <input type="submit" name="buttonR" id="buttonRegister" value="CREAR CUENTA"></input>
  </div>
</form>


<br>
<br>
    </center>
  </body>
</html>
