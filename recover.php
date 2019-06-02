<?php
require 'database.php';
session_start();
$destino= $_POST['email'];
$from= "From: idiomakids@gmail.com";
$reason = "Cambio de contraseña";
$text = "Para restablecer la contraseña vaya al siguiente enlace https://www.idiomakids.com/confirmRecover.php?mail=$destino

Muchas gracias.

El equipo de IdiomaKids

";



if (isset($destino)) {
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
    echo "no esxite";

}
}


 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="style.css">
     <title>IdiomaKids</title>
   </head>
   <body class="bodyBack">
     <img src="images/LogoApp.png" style="width:33%;margin-top:1%;margin-left:33%;"></img>
     <form class="" action="recover.php" method="post">
       <p style="text-align:center;font-size:20px;font-family:sans-serif;">Introduce tu correo</p>
       <input type="text" name="email" style="margin-left:42%;"id="email">
       <input type="submit" name="" value="ENVIAR" style="position:absolute;bottom:200px;transform:translateX(-50%);left:40%;"id="buttonRegister">
       <a href="index.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" style="position:absolute;bottom:200px;transform:translateX(-50%);left:61%;" id="buttonRegister" style="margin-right:5%;">VOLVER</button></a>
</form>
   </body>
 </html>
