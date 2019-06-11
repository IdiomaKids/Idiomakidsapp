<?php
  session_start();

  require 'database.php';
  //Aqui comprobamos que los datos introducidos en los campos no esten vacios, y si no lo estan ejecuta la query
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_user, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    //Si los datos introducidos son correctos pasamaos a la siguiente pantalla de seleccion de jugador
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['id_user'] = $results['id_user'];
      $_SESSION['email'] = $results['email'];


      header("Location: /whoareyou.php");
    } else {
      $message = 'Lo sentimos, el usuario no existe';
    }
  }

  //Aqui comprobamos que si hay una sesion abierta coja el numero total de usuarios y los muestra en la pantalla de whoareyouSetS.php estilo Netflix, en caso de no
  //tener te manda la pantalla guardarPlayerCero.php para crear uno, para darse esta ultima situacion el usuario solo creo la cuenta y no asigno ningun usuario a la misma

  if (isset($_SESSION['id_user'])) {
    $iduser2 = $_SESSION['id_user'];
    $sql212 = "SELECT COUNT(id_player) FROM players WHERE id_user = $iduser2";
    $result212 = $conn->query($sql212);
    $total212 = $result212->fetchColumn();
    if ($total212 == 0) {
      header("Location: /guardarPlayerCero.php");
    }else{
    header("Location: /whoareyouSetS.php");
  }

  }
?>


<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
    <script type="text/javascript" src="script.js"></script>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <meta name="description" content="Aprender jugando nunca habia sido tan divertido. Con IdiomaKids podrás aprender mientras juegas, y completamente gratis.">
  </head>
  <body class="bodyBack">


    <center>
<img src="images/LogoApp.png" style="width:35%;margin-top:3%;"></img>

<br>
<br>
<form class="" action="index.php" method="post">
  <container class="containerFields">

    <section class="emailField">
        <h4 style="font-size:25px;display:table-row;">Email</h4>
        <input type="email" name="email" id="email" required>
    </section>
    <section class="passwordField">
      <h4 style="font-size:25px;display:table-row;">Contraseña</h4>
      <input type="password" name="password" id="password" required>
    </section>

  </container>
  <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
  <?php endif; ?>
  <div class="buttonGroup">
    <input type="submit" name="buttonL" id="buttonLogin" value="LOGIN"></input>
</form>
<a href="signup.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">CREAR CUENTA</button></a>
<a href="sinLogin/sinLogin.php" style="text-decoration:none;color:black;"><button type="button" name="buttonWA" id="buttonAccessWithoutAccount">ACCEDER SIN CUENTA</button></a>

</div>
<a href="recover.php"><p style="text-align:center;margin-left:-4%;">He olvidado mi contraseña</p></a>
<br>
<br>

    </center>
  </body>
</html>
