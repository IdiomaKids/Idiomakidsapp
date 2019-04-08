<?php
  session_start();
  if (isset($_SESSION['id_user'])) {
    var_dump($_SESSION['id_user']);
    header('Location: /xampp/IdiomaKidsFinalWeb/index.php');
  }
  require 'database.php';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_user, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && $_POST['password'] == $results['password']) {
      $_SESSION['id_user'] = $results['id_user'];
      header("Location: /xampp/IdiomaKidsWeb/index.php");
    } else {
      $message = 'Lo sentimos, el usuario no existe';
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
<img src="images/LogoApp.png" style="width:35%;margin-top:3%;"></img>

<br>
<br>
<form class="" action="login.php" method="post">
  <container class="containerFields">

    <section class="emailField">
        <h4 style="font-size:25px;display:table-row;">Email</h4>
        <input type="email" name="email" id="email">
    </section>
    <section class="passwordField">
      <h4 style="font-size:25px;display:table-row;">Contraseña</h4>
      <input type="password" name="password" id="password">
    </section>

  </container>
  <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
  <?php endif; ?>
  <div class="buttonGroup">
    <input type="submit" name="buttonL" id="buttonLogin" value="LOGIN"></input>
</form>
<a href="signup.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;">CREAR CUENTA</button></a>
<a href="sinLogin/sinLogin.html" style="text-decoration:none;color:black;"><button type="button" name="buttonWA" id="buttonAccessWithoutAccount">ACCEDER SIN CUENTA</button></a>
</div>
<br>
<br>

    </center>
  </body>
</html>
