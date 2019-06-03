<?php
session_start();
require 'database.php';
$email = $_GET['mail'];
$emailRecover = $_POST['email'];
$password2 = $_POST['password'];


//Aqui comprobamos que el email existe en la BBDD para no mandar emails a gente que no este registrada en la web
$sql4 = "SELECT id_user FROM users WHERE email = '$email'";
$result4 = $conn->query($sql4);
$total4 = $result4->fetchColumn();

//La password nueva tambien tiene que estar encriptada, por lo que la encriptamos aqui
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

//Actualizamos aqui la password
$sql15 = "UPDATE users SET users.password = '$password' WHERE id_user = $total4";
$stmt15 = $conn->prepare($sql15);

//Comprobamos que el campo de la password no este vacio, y si no lo esta ejecuta la query
if (!empty($_POST['password'])) {
  $stmt15->execute();
  header("Location: index.php");
}

 ?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
    <script type="text/javascript" src="script.js"></script>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body class="bodyBack">

    <center>
      <h1>CAMBIO DE CONTRASEÑA</h1>

<img src="images/LogoApp.png" style="width:33%;margin-top:1%;"></img>

<br>
<br>
<form class="" action="confirmRecover.php?mail=<?= $email ?>" method="post">
  <container class="containerFields">
    <section class="passwordField">
      <h4 style="font-size:25px;display:table-row;">Contraseña</h4>
      <input type="password" name="password" value="" minlength = 6 id="password" required>
    </section>

    <section class="passwordField">
        <h4 style="font-size:25px;margin-bottom: 0%;">Repetir contraseña</h4>
        <input type="password" name="passwordR" minlength = 6 id="passwordR" onfocusout="passCheck()" onmouseout="passCheck()" required>
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
  <script type="text/javascript">
  //Aqui hacemos la comprobacion de que las dos contraseñas sean iguales sacando un mensaje de que no son iguales si no lo son, y habilitando
  //el boton si lo sson
    function passCheck(){
      var x = document.getElementById('password').value;
      var y = document.getElementById('passwordR').value;

      if (x == y && x >1 && y>1) {
        document.getElementById('MessageCheck').style.display = 'none';
        document.getElementById('buttonRegister2').id = 'buttonRegisterCheck';

      }else{
        document.getElementById('MessageCheck').style.display = 'inline-block';
        document.getElementById('buttonRegisterCheck').id = 'buttonRegister2';

      }
    }
  </script>
  <p style="display:none;" id="MessageCheck">Las contraseñas no son iguales</p>
  <div class="buttonGroup">
    <input type="submit" name="buttonR" id="buttonRegister2" value="RESETEAR CONTRASEÑA"></input>

  </div>
</form>

<br>
<br>
    </center>
  </body>
</html>
