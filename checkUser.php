<?php
session_start();
$iduser = $_SESSION['id_user'];
require 'database.php';
//echo $iduser;

$sql = "SELECT email, password FROM users WHERE id_user = $iduser";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_user', $_SESSION['id_user']);
$stmt->execute();

  if ($stmt->execute()) {
    foreach ($conn->query($sql) as $fila) {
    //echo $fila['email'];
    //echo $fila['password'];
    $email2 = $_POST['email'];
    $pass2 = $_POST['password'];
  }

  if ($fila['email'] == $email2 && $fila['password'] == $pass2) {
      echo "<p> Bienn";
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
  <body>
    <form class="" action="checkUser.php" method="post">
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
        <a href="javascript:history.back(-1);">back</a>
    </form>
    <script type="text/javascript">
      function check(){
        document.getElementById('email').value;
      }
    </script>
  </body>
</html>
