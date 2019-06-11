<?php
require 'database.php';
session_start();
//Aqui definimos las variables que vamos a utilizar para mandar el correo
$destino= $_POST['email'];
$from= "From: idiomakids@idiomakids.com";
$reason = "Cambio de contraseña";
// $token = bin2hex(random_bytes(64));
$text = "Para restablecer la contraseña vaya al siguiente enlace https://www.idiomakids.com/confirmRecover.php?mail=$destino

Muchas gracias.

El equipo de IdiomaKids

";


//Si existe destino, es decir, que la url contenga el email, pasamos el if y lo realizamos
if (isset($destino)) {
//Aqui hacemos una comprobación en la base de datos para ver si el eamil existe, si no existe, notofica al usuario de que ese email no existe, si no, el correo se manda
  $_SESSION['email'] = $_POST['email'];
  $sql4 = "SELECT COUNT(email) FROM users WHERE email = '$destino'";
  // var_dump($sql4);
  $result4 = $conn->query($sql4);
  $total4 = $result4->fetchColumn();
  // echo $total4;
  if ($total4 != 0) {
    mail($destino,$reason,$text,$from);
    header("Location: /index.php");
  }else {
    $message = 'Lo sentimos, el correo no existe';

}
}


 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style.css">
     <link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
     <title>IdiomaKids</title>
   </head>
   <body class="bodyBack">
     <h1 style="text-align:center;">CAMBIO DE CONTRASEÑA</h1>
     <img src="images/LogoApp.png" style="width:33%;margin-top:1%;margin-left:33%;"></img>
     <form class="" action="recover.php" method="post">
       <p style="text-align:center;font-size:20px;font-family:sans-serif;">Introduce tu correo</p>
       <input type="text" name="email" style="margin-left:42%;"id="email" required>
       <?php if(!empty($message)): ?>
         <p style="text-align:center;"> <?= $message ?></p>
       <?php endif; ?>
       <a href="recover.php" style="text-align:center;display:block;" id="send"onclick="reload()">¿No has recibido el correo?</a>
       <input type="submit" name="" value="ENVIAR" style="position:absolute;bottom:90px;transform:translateX(-50%);left:40%;"id="buttonRegister">
       <a href="index.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" style="position:absolute;bottom:90px;transform:translateX(-50%);left:61%;" id="buttonRegister" style="margin-right:5%;">VOLVER</button></a>
</form>
<script type="text/javascript">
  function reload(){
    document.getElementById('send').style.display = 'none';
  }
</script>
   </body>
 </html>
