<?php
require 'database.php';
session_start();
$parent = $_SESSION['id_user'];
$emailParent = $_SESSION['email'];
//Aqui hacemos el insert en la BBDD del niñi que esta asociado al tutor que tenga en la variable de sesion
  if (!empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['avatar'])) {

    $sql = "INSERT INTO players (name, id_user, birthday, avatar) VALUES (:name, :id_user, :birthday, :avatar)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':birthday', $_POST['birthday']);
    $stmt->bindParam(':avatar', $_POST['avatar']);
    $stmt->bindParam(':id_user', $parent);
    //Si la query se ejecuta mandamos el jugador a la pantalla de adminPLayer.php junto con los otros niños
    if ($stmt->execute()) {
      header("Location: /configurationn/adminPlayer.php");
      $message = 'Usuario creado correctamente';
    } else {
      $message = 'El correo introducido ya existe. Por favor, introduzca uno válido';
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dialog.css">
    <link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
  </head>
  <body class="bodyBack">
    <a href="../../logout.php">
    <img src="../../images/logout.png" alt="" style="
    width: 50px;
    position: absolute;
    right: 0;
    top: 0;
    margin: 5px;
    "></a>
    <form class="" action="guardarPlayer.php" method="post">

    <h1 style="text-align:center;margin-bottom:10%;">Añadir jugador</h1>
    <div class="estiloNombreJugador">
      <h1 style="display:inline-block">Nombre</h1>
      <input type="text" name="name" id="name" style="border: 1px solid black; height: 45px; font-size: 20px; text-align:center; margin-left:8%;" required>
    </div>

<h1 style="text-align:center;margin-bottom:10%;">Selecciona un avatar</h1>
    <button type="button" name="button" onclick="showDialog()" id="buttonSelectImg"><img src="images/avatares/avatar.png" alt="" class="imgCircleSet" id="inputAvatar" name="inputAvatar" value=""></button>
    <dialog id="dialog">
            <p style="text-align:center;font-size:15px;">Selecciona un avatar</p>
        <img src="images/avatares/marciano.png"  class="imgCircle" id="marciano" onclick="clickImageMarciano()" value="">
        <img src="images/avatares/pluto.png" class="imgCircle" id="pluto" onclick="clickImagePluto()" value="">
        <br>
        <img src="images/avatares/sully.png" class="imgCircle" id="sully" onclick="clickImageSully()" value="">
        <img src="images/avatares/nemo.png" class="imgCircle" id="nemo" onclick="clickImageNemo()" value="">
        <br>
        <button onclick="closeDialog()" id="button" class="buttonDialog">Clic para cerrar</button>
    </dialog>
    <input type="text" name="avatar" id="avatar" value="" style="display:none;" required>
    <h1 style="text-align:center;margin-top:13%;">Fecha de nacimiento</h1>

    <input type="date" name="birthday" class="birthdayDate" id="birthday" name="birthday" required>

    <br>
    <br>
    <a href="configurationn/adminPlayer.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;" class="buttonBack">VOLVER</button></a>
    <input type="submit" name="buttonR" id="buttonRegister" value="REGISTRAR JUGADOR"></input>
  </form>

    <script type="text/javascript">
    var dialog = document.getElementById("dialog");
    var buttonOpen = document.getElementById("button");
        //Esta funcion cierra el dialog
      function closeDialog(){
          dialog.close();
        }

        // Esta funcion abre un dialog para seleccionar el personaje que quiere tener el niño
        function showDialog(){
        dialog.show();
      }
        //Estas funciones son las que ponen el personaje en el circulo del avatar
      function clickImageMarciano(){
        var marciano = "images/avatares/marciano.png"
        console.log("Has seleccionado marciano " + marciano);
        document.getElementById('inputAvatar').src = "images/avatares/marciano.png";
        document.getElementById('avatar').value = "images/avatares/marciano.png";
        console.log(document.getElementById('avatar').value);
        dialog.close();
      }

      function clickImagePluto(){
        var pluto = "images/avatares/pluto.png"
        console.log("Has seleccionado pluto " + pluto);
        document.getElementById('inputAvatar').src = "images/avatares/pluto.png";
        document.getElementById('avatar').value = "images/avatares/pluto.png";
        console.log(document.getElementById('avatar').value);
        dialog.close();

      }

      function clickImageSully(){
        var sully = "images/avatares/sully.png"
        console.log("Has seleccionado sully " + sully);
        document.getElementById('inputAvatar').src = "images/avatares/sully.png";
        document.getElementById('avatar').value = "images/avatares/sully.png";
        console.log(document.getElementById('avatar').value);
        dialog.close();
      }

      function clickImageNemo(){
        var nemo = "images/avatares/nemo.png"
        console.log("Has seleccionado nemo " + nemo);
        document.getElementById('inputAvatar').src = "images/avatares/nemo.png";
        document.getElementById('avatar').value = "images/avatares/nemo.png ";
        console.log(document.getElementById('avatar').value);
        dialog.close();

      }

    </script>

</body>
</html>
