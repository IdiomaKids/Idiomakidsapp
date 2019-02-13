<?php
require 'database.php';
$email = $_GET['email'];
  if (!empty($_POST['name']) && !empty($_POST['birthday']) && !empty($_POST['avatar'])) {

    $sql = "INSERT INTO players (name, id_user, birthday, avatar) VALUES (:name, :(SELECT id_user FROM users WHERE email = $email), :birthday, :avatar)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':id_user', $_POST['id_user']);
    $stmt->bindParam(':birthday', $_POST['birthday']);
    $stmt->bindParam(':avatar', $_POST['avatar']);
    if ($stmt->execute()) {
      $message = 'Usuario creado correctamente';
      header("Location: /xampp/IdiomaKidsWeb/guardarPlayer.php?email=$email");
    } else {
      $message = 'El correo introducido ya existe. Por favor, introduzca uno válido';
    }
  }



 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="pruebaDialog/dialog-con-estilo.css">
  </head>
  <body class="bodyBack">

    <form class="" action="guardarPlayer.php" method="post">

    <h1 style="text-align:center;margin-bottom:10%;">Añadir jugador</h1>
    <div class="estiloNombreJugador">
      <h1 style="display:inline-block">Nombre</h1>
      <input type="text" name="name" id="name" style="border: 1px solid black; height: 45px; font-size: 20px; text-align:center; margin-left:8%;">
    </div>
<?php echo "<p style='display:inline-block;'>Bienvenido, ";
echo  $_GET['email'];
echo "</p>";
?>
<h1 style="text-align:center;margin-bottom:10%;">Selecciona un avatar</h1>
    <button type="button" name="button" onclick="showDialog()" id="buttonSelectImg"><img src="images/avatares/avatar.png" alt="" class="imgCircleSet" id="avatar" name="avatar" value=""></button>
    <!-- <img src="images/avatares/avatar.png" alt="" class="imgCircleSet" id="setImage"> -->
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
    <h1 style="text-align:center;margin-top:13%;">Fecha de nacimiento</h1>yhhbl

    <input type="date" name="birthday" class="birthdayDate" id="birthday" name="birthday">
    <br>
    <br>
    <a href="login.php" style="text-decoration:none;color:black;"><button type="button" name="buttonR" id="buttonRegister" style="margin-right:5%;" class="buttonBack">VOLVER</button></a>
    <input type="submit" name="buttonR" id="buttonRegister" value="REGISTRAR JUGADOR"></input>
  </form>

    <script type="text/javascript">
    var dialog = document.getElementById("dialog");
    var buttonOpen = document.getElementById("button");

      function closeDialog(){
          dialog.close();
        }
        function showDialog(){
        dialog.show();
      }

      function clickImageMarciano(){
        var marciano = "images/avatares/marciano.png"
        console.log("Has seleccionado marciano " + marciano);
        document.getElementById('avatar').src = "images/avatares/marciano.png";
        document.getElementById('avatar').value = "images/avatares/marciano.png";
        console.log(document.getElementById('avatar').value);
        dialog.close();
      }

      function clickImagePluto(){
        var pluto = "images/avatares/pluto.png"
        console.log("Has seleccionado pluto " + pluto);
        document.getElementById('avatar').src = "images/avatares/pluto.png";
        document.getElementById('avatar').value = "images/avatares/pluto.png";
        console.log(document.getElementById('avatar').value);
        dialog.close();

      }

      function clickImageSully(){
        var sully = "images/avatares/sully.png"
        console.log("Has seleccionado sully " + sully);
        document.getElementById('avatar').src = "images/avatares/sully.png";
        document.getElementById('avatar').value = "images/avatares/sully.png";
        console.log(document.getElementById('avatar').value);
        dialog.close();
      }

      function clickImageNemo(){
        var nemo = "images/avatares/nemo.png"
        console.log("Has seleccionado nemo " + nemo);
        document.getElementById('avatar').src = "images/avatares/nemo.png";
        document.getElementById('avatar').value = "images/avatares/nemo.png ";
        console.log(document.getElementById('avatar').value);
        dialog.close();

      }

    </script>

</body>
</html>
