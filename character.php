<?php
require 'database.php';
session_start();
$idplayer = $_SESSION['id_player'];
$image = $_SESSION['avatar'];
$name = $_SESSION['name'];

//Hacemos una query que actualiza el avatar del jugador en la base de datos
if (!empty($_POST['avatar'])) {
  $sql1 = "UPDATE players SET avatar = :avatar WHERE id_player = $idplayer";
  //echo $sql1;
  $stmt1 = $conn->prepare($sql1);
  $stmt1->bindParam(':avatar', $_POST['avatar']);
  if ($stmt1->execute()) {
    $_SESSION['avatar'] = $_POST['avatar'];
    header("Location: pasarelaCero.php");
}
}

echo "<h2 style='display:inline;position:absolute;top:-20px;'>";
echo "<p>Cambiar personaje de $name</p>";
echo "</h2>";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="levels/youngest/styleLevels.css">
    <link rel="stylesheet" href="sinLogin/sinLoginStyle.css">
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
    <div>
    <div style="height: 200px;">
<!-- Esta es la imagen del niño actual -->
    <?php echo "<img id='inputAvatar' style='background-color: white;
    width: 150px;
    height: 150px;
    border-radius: 100px;
    border: 3px solid black;
    margin-left: 12%;
    margin-bottom: 1%;
    cursor: pointer;
    position: absolute;
    left: 43%;
    right: 0;
    margin: 5px;' src='../../$image>'>";?>
  </div>
  <form class="" action="character.php" method="post">

  <input type="text" name="avatar" id="avatar" value="" style="display:none;">

  <!-- Esta imagen es el candado que encima de todas las filas, pero con un id diferente por cada una, ya que son individuales -->
  <img src="../../images/pjBlock.png" alt="" style="

    width: 109px;
    height: 436px;
    left: 27.4%;
    z-index: 1;
    display: inline-block;
    position: absolute;" id="redColumn"  onclick="bloqPj1()">

  </img>
  <img src="../../images/pjBlock.png" alt="" style="

    width: 108px;
    height: 436px;
    left: 44.6%;
    z-index: 1;
    position: absolute;" id="blueColumn" onclick="bloqPj2()">

  </img>
  <img src="../../images/pjBlock.png" alt="" style="

    width: 108px;
    height: 436px;
    left: 61.7%;
    z-index: 1;
    position: absolute;" id="pinkColumn" onclick="bloqPj3()">

  </img>
  <img src="../../images/pjBlock.png" style="

    width: 108px;
    height: 436px;
    left: 78.83%;
    z-index: 1;
    position: absolute;" id="purpleColumn" onclick="bloqPj4()">

  </img>
  <!-- Aqui estan todas las imagenes disponibles para seleccionar, divididas en columnas -->
    <div class="">
    <img src="images/avatares/plutoCharacter/plutoWhite.png"  onclick="clickImagePluto()" class="imgCircle2" id="plutoWhite" value="">
    <img src="images/avatares/plutoCharacter/plutoRed.png"  onclick="clickImagePlutoRed()" class="imgCircle2" id="plutoRed" value="">
    <img src="images/avatares/plutoCharacter/plutoLightblue.png"  onclick="clickImagePlutoLightblue()" class="imgCircle2" id="plutoLightblue" value="">
    <img src="images/avatares/plutoCharacter/plutoPink.png"  onclick="clickImagePlutoPink()" class="imgCircle2" id="plutoPink" value="">
    <img src="images/avatares/plutoCharacter/plutoPurple.png"  onclick="clickImagePlutoPurple()" class="imgCircle2" id="plutoPurple" value="">
    <br>
    <img src="images/avatares/sullyCharacter/sullyWhite.png" onclick="clickImageSully()" class="imgCircle2" id="sullyWhite" value="">
    <img src="images/avatares/sullyCharacter/sullyRed.png" onclick="clickImageSullyRed()" class="imgCircle2" id="sullyRed" value="">
    <img src="images/avatares/sullyCharacter/sullyLightblue.png" onclick="clickImageSullyLightblue()" class="imgCircle2" id="sullyLightblue" value="">
    <img src="images/avatares/sullyCharacter/sullyPink.png" onclick="clickImageSullyPink()" class="imgCircle2" id="sullyPink" value="">
    <img src="images/avatares/sullyCharacter/sullyPurple.png" onclick="clickImageSullyPurple()" class="imgCircle2" id="sullyPurple" value="">
    <br>
    <img src="images/avatares/nemoCharacter/nemoWhite.png" onclick="clickImageNemo()" class="imgCircle2" id="nemoWhite" value="">
    <img src="images/avatares/nemoCharacter/nemoRed.png" onclick="clickImageNemoRed()" class="imgCircle2" id="nemoRed" value="">
    <img src="images/avatares/nemoCharacter/nemoLightblue.png" onclick="clickImageNemoLightblue()" class="imgCircle2" id="nemoLightblue" value="">
    <img src="images/avatares/nemoCharacter/nemoPink.png" onclick="clickImageNemoPink()" class="imgCircle2" id="nemoPink" value="">
    <img src="images/avatares/nemoCharacter/nemoPurple.png" onclick="clickImageNemoPurple()" class="imgCircle2" id="nemoPurple" value="">
    <br>
    <img src="images/avatares/marcianoCharacter/marcianoWhite.png" onclick="clickImageMarciano()" class="imgCircle2" id="marcianoWhite" value="">
    <img src="images/avatares/marcianoCharacter/marcianoRed.png" onclick="clickImageMarcianoRed()" class="imgCircle2" id="marcianoRed" value="">
    <img src="images/avatares/marcianoCharacter/marcianoLightblue.png" onclick="clickImageMarcianoLightblue()" class="imgCircle2" id="marcianoLightblue" value="">
    <img src="images/avatares/marcianoCharacter/marcianoPink.png" onclick="clickImageMarcianoPink()" class="imgCircle2" id="marcianoPink" value="">
    <img src="images/avatares/marcianoCharacter/marcianoPurple.png" onclick="clickImageMarcianoPurple()" class="imgCircle2" id="marcianoPurple" value="">
  </div>
<?php

//Estas son las querys que lanzamos para coger el valor de score de cada nivel

$sql = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 11";
$stmt = $conn->prepare($sql);
$stmt -> execute();
$result = $conn->query($sql);
$total = $result->fetchColumn();;

$sql2 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 12";
$stmt2 = $conn->prepare($sql2);
$stmt2 -> execute();
$result2 = $conn->query($sql2);
$total2 = $result2->fetchColumn();;

$sql3 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 13";
$stmt3 = $conn->prepare($sql3);
$stmt3 -> execute();
$result3 = $conn->query($sql3);
$total3 = $result3->fetchColumn();;

$sql4 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 14";
$stmt4 = $conn->prepare($sql4);
$stmt4 -> execute();
$result4 = $conn->query($sql4);
$total4 = $result4->fetchColumn();;

// echo $total4;

//Aqui hacemos la comprobación esclonada para quitar los candados, si es 3 en la primera variable se quita, luego se comprueba, si la primera variable y la segunda
//son 3, y asi con todos

if ($total == 3) {
  echo "<script> document.getElementById('redColumn').style.display = 'none';";
  echo "</script>";


        if ($total2 == 3){
          echo "<script> document.getElementById('blueColumn').style.display = 'none';";
          echo "</script>";

          if ($total3 == 3){
            echo "<script> document.getElementById('pinkColumn').style.display = 'none';";
            echo "</script>";

            if ($total4 == 3) {
              echo "<script> document.getElementById('purpleColumn').style.display = 'none';";
              echo "</script>";
}}}
}



?>
    <a href="pasarelaCero.php" id="buttonRegister" style="text-align:center;text-decoration:none;position:absolute;margin:5px;bottom:0;left:25%;">VOLVER</a>
    <input type="submit" name="" value="CAMBIAR PERSONAJE" id="buttonRegister" style="
    text-align: center;
    text-decoration: none;
    position: absolute;
    margin: 5px;
    bottom: 0;
    left: 50%;
    ">
  </form>


  <script type="text/javascript">

// Aqui estan las funciones que activan los mensajes de error por si seleccionas un personaje que no tienes desbloqueado

  function bloqPj1(){
  document.getElementById("float").id = "float2";
  gone();
}
function bloqPj2(){
document.getElementById("floatL1").id = "float3";
gone2();
}
function bloqPj3(){
document.getElementById("floatL2").id = "float4";
gone3();
}
function bloqPj4(){
document.getElementById("floatL3").id = "float5";
gone4();
}
  function gone() {
    setTimeout(function(){ document.getElementById("float2").id = "float"; }, 3000);
  }
  function gone2() {
    setTimeout(function(){ document.getElementById("float3").id = "floatL1"; }, 3000);
  }
  function gone3() {
    setTimeout(function(){ document.getElementById("float4").id = "floatL2"; }, 3000);
  }
  function gone4() {
    setTimeout(function(){ document.getElementById("float5").id = "floatl3"; }, 3000);
  }
  </script>
  <div id="float">
    <h1 class="center">Disponibles solo al completar el nivel 1 con tres estrellas</h1>
  </div>
  <div id="floatL1">
    <h1 class="center">Disponibles solo al completar los niveles 1 y 2 con tres estrellas</h1>
  </div>
  <div id="floatL2">
    <h1 class="center">Disponibles solo al completar los niveles 1, 2 y 3 con tres estrellas</h1>
  </div>
  <div id="floatL3">
    <h1 class="center">Disponibles solo al completar los niveles 1, 2, 3 y 4 con tres estrellas</h1>
  </div>
  </body>

<!-- Estas son las funciones que utilizamos para cambiar el personaje de forma visual antes de cambiarlo -->
  <script type="text/javascript">
  function clickImageMarciano(){
    var marciano = "images/avatares/marciano.png"
    console.log("Has seleccionado marciano " + marciano);
    document.getElementById('inputAvatar').src = "images/avatares/marciano.png";
    document.getElementById('avatar').value = "images/avatares/marciano.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageMarcianoRed(){
    var marciano = "images/avatares/marcianoCharacter/marcianoRed.png"
    console.log("Has seleccionado marciano " + marciano);
    document.getElementById('inputAvatar').src = "images/avatares/marcianoCharacter/marcianoRed.png";
    document.getElementById('avatar').value = "images/avatares/marcianoCharacter/marcianoRed.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageMarcianoLightblue(){
    var marciano = "images/avatares/marcianoCharacter/marcianoLightblue.png"
    console.log("Has seleccionado marciano " + marciano);
    document.getElementById('inputAvatar').src = "images/avatares/marcianoCharacter/marcianoLightblue.png";
    document.getElementById('avatar').value = "images/avatares/marcianoCharacter/marcianoLightblue.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageMarcianoPink(){
    var marciano = "images/avatares/marcianoCharacter/marcianoPink.png"
    console.log("Has seleccionado marciano " + marciano);
    document.getElementById('inputAvatar').src = "images/avatares/marcianoCharacter/marcianoPink.png";
    document.getElementById('avatar').value = "images/avatares/marcianoCharacter/marcianoPink.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageMarcianoPurple(){
    var marciano = "images/avatares/marcianoCharacter/marcianoPurple.png"
    console.log("Has seleccionado marciano " + marciano);
    document.getElementById('inputAvatar').src = "images/avatares/marcianoCharacter/marcianoPurple.png";
    document.getElementById('avatar').value = "images/avatares/marcianoCharacter/marcianoPurple.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImagePluto(){
    var pluto = "images/avatares/pluto.png"
    console.log("Has seleccionado pluto " + pluto);
    document.getElementById('inputAvatar').src = "images/avatares/pluto.png";
    document.getElementById('avatar').value = "images/avatares/pluto.png";
    console.log(document.getElementById('avatar').value);

  }

  function clickImagePlutoRed(){
    var pluto = "images/avatares/plutoCharacter/plutoRed.png"
    console.log("Has seleccionado pluto " + pluto);
    document.getElementById('inputAvatar').src = "images/avatares/plutoCharacter/plutoRed.png";
    document.getElementById('avatar').value = "images/avatares/plutoCharacter/plutoRed.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImagePlutoLightblue(){
    var pluto = "images/avatares/plutoCharacter/plutoLightblue.png"
    console.log("Has seleccionado pluto " + pluto);
    document.getElementById('inputAvatar').src = "images/avatares/plutoCharacter/plutoLightblue.png";
    document.getElementById('avatar').value = "images/avatares/plutoCharacter/plutoLightblue.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImagePlutoPink(){
    var pluto = "images/avatares/plutoCharacter/plutoPink.png"
    console.log("Has seleccionado pluto " + pluto);
    document.getElementById('inputAvatar').src = "images/avatares/plutoCharacter/plutoPink.png";
    document.getElementById('avatar').value = "images/avatares/plutoCharacter/plutoPink.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImagePlutoPurple(){
    var pluto = "images/avatares/plutoCharacter/plutoPurple.png"
    console.log("Has seleccionado pluto " + pluto);
    document.getElementById('inputAvatar').src = "images/avatares/plutoCharacter/plutoPurple.png";
    document.getElementById('avatar').value = "images/avatares/plutoCharacter/plutoPurple.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageSully(){
    var sully = "images/avatares/sully.png"
    console.log("Has seleccionado sully " + sully);
    document.getElementById('inputAvatar').src = "images/avatares/sully.png";
    document.getElementById('avatar').value = "images/avatares/sully.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageSullyRed(){
    var sully = "images/avatares/sullyCharacter/sullyRed.png"
    console.log("Has seleccionado sully " + sully);
    document.getElementById('inputAvatar').src = "images/avatares/sullyCharacter/sullyRed.png";
    document.getElementById('avatar').value = "images/avatares/sullyCharacter/sullyRed.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageSullyLightblue(){
    var sully = "images/avatares/sullyCharacter/sullyLightblue.png"
    console.log("Has seleccionado sully " + sully);
    document.getElementById('inputAvatar').src = "images/avatares/sullyCharacter/sullyLightblue.png";
    document.getElementById('avatar').value = "images/avatares/sullyCharacter/sullyLightblue.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageSullyPink(){
    var sully = "images/avatares/sullyCharacter/sullyPink.png"
    console.log("Has seleccionado sully " + sully);
    document.getElementById('inputAvatar').src = "images/avatares/sullyCharacter/sullyPink.png";
    document.getElementById('avatar').value = "images/avatares/sullyCharacter/sullyPink.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageSullyPurple(){
    var sully = "images/avatares/sullyCharacter/sullyPurple.png"
    console.log("Has seleccionado sully " + sully);
    document.getElementById('inputAvatar').src = "images/avatares/sullyCharacter/sullyPurple.png";
    document.getElementById('avatar').value = "images/avatares/sullyCharacter/sullyPurple.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageNemo(){
    var nemo = "images/avatares/nemo.png"
    console.log("Has seleccionado nemo " + nemo);
    document.getElementById('inputAvatar').src = "images/avatares/nemo.png";
    document.getElementById('avatar').value = "images/avatares/nemo.png ";
    console.log(document.getElementById('avatar').value);

  }

  function clickImageNemoRed(){
    var nemo = "images/avatares/nemoCharacter/nemoRed.png"
    console.log("Has seleccionado nemo " + nemo);
    document.getElementById('inputAvatar').src = "images/avatares/nemoCharacter/nemoRed.png";
    document.getElementById('avatar').value = "images/avatares/nemoCharacter/nemoRed.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageNemoLightblue(){
    var nemo = "images/avatares/nemoCharacter/nemoLightblue.png"
    console.log("Has seleccionado nemo " + nemo);
    document.getElementById('inputAvatar').src = "images/avatares/nemoCharacter/nemoLightblue.png";
    document.getElementById('avatar').value = "images/avatares/nemoCharacter/nemoLightblue.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageNemoPink(){
    var nemo = "images/avatares/nemoCharacter/nemoPink.png"
    console.log("Has seleccionado nemo " + nemo);
    document.getElementById('inputAvatar').src = "images/avatares/nemoCharacter/nemoPink.png";
    document.getElementById('avatar').value = "images/avatares/nemoCharacter/nemoPink.png";
    console.log(document.getElementById('avatar').value);
  }

  function clickImageNemoPurple(){
    var nemo = "images/avatares/nemoCharacter/nemoPurple.png"
    console.log("Has seleccionado nemo " + nemo);
    document.getElementById('inputAvatar').src = "images/avatares/nemoCharacter/nemoPurple.png";
    document.getElementById('avatar').value = "images/avatares/nemoCharacter/nemoPurple.png";
    console.log(document.getElementById('avatar').value);
  }




  </script>
</html>
