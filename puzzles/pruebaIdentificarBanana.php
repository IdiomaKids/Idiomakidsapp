<!DOCTYPE html>
<?php
require '../database.php';
$records = $conn->prepare('SELECT jsondata FROM `games` WHERE id_game = 142');
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
// var_dump($results);
//print json_encode($results);
$jsonP=null;
$jsonP=$results;
 ?>

<html>
<link rel="stylesheet" href="styleIdenifier.css">
<body>


 <audio id="win" src="https://raw.githubusercontent.com/IdiomaKids/Idiomakidsapp/rescate/audios/clap2.mp3"></audio>
   <audio id="lose" src="https://raw.githubusercontent.com/IdiomaKids/Idiomakidsapp/rescate/audios/lose.mp3"></audio>
  <img src="../images/Identificar/Platano/bananaFondo.png" alt="" class="fondo" id="fondoCorrect" solution="correct" style="top:10%">

  <div class="" style="display: block;transform: translateX(-50%);transform: translateY(-50%);position: absolute;left: 16%;top: 70%;">
    <img src="" alt="" id="yellow" class="img" onclick="verBueno()">
    <img src="" alt="" id="blue" class="img" onclick="verMalo()">
    <img src="" alt="" id="red" class="img" onclick="verMalo()">
    <img src="" alt="" id="gray" class="img" onclick="verMalo()">
  </div>

  <div id="no" width="100%" height="-webkit-fill-available">
  </div>

  <div id="n">
    <h1 class="center">PLÁTANO</h1>
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;left:100px;"alt="">
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;right:100px;"alt="">
  </div>

  <div id="i">
    <h1 class="center">INCORRECTO</h1>
  </div>


  <script>
    var myJSON = <?= $jsonP['jsondata']; ?>

    var win = document.getElementById("win");


    if (myJSON[0].shape == "correctBanana.png") {
      //  window.alert("soy un cuadrado")

      document.getElementById("yellow").src = "../images/Identificar/Platano/correctBanana.png";
      document.getElementById("yellow").setAttributeNS('','solution', myJSON[0].solution);


    }

    if (myJSON[1].shape == "incorrectBananaBlue.png") {
      //    window.alert("soy un triangulo")
      document.getElementById("blue").src = "../images/Identificar/Platano/incorrectBananaBlue.png";
      document.getElementById("blue").setAttributeNS('','solution', myJSON[1].solution);
    }

    if (myJSON[2].shape == "incorrectBananaRed.png") {
      //  window.alert("soy un circulo")
      document.getElementById("red").src = "../images/Identificar/Platano/incorrectBananaRed.png";
      document.getElementById("red").setAttributeNS('','solution', myJSON[2].solution);
    }

    if (myJSON[3].shape == "incorrectBananaGray.png") {
      //    window.alert("soy una casa")
      document.getElementById("gray").src = "../images/Identificar/Platano/incorrectBananaGray.png";
      document.getElementById("gray").setAttributeNS('','solution', myJSON[3].solution);
    }


    function verBueno(){
      document.getElementById("no").id="yes";
      document.getElementById("fondoCorrect").src = "../images/Identificar/Platano/correctBanana.png";
      document.getElementById("fondoCorrect").style.opacity = 1;
      win.play();
      document.getElementById("n").id= "voluble";
      setTimeout(function(){ document.getElementById("voluble").id = "n"; }, 3000);
    }

    function verMalo(){
        lose.play();
      document.getElementById("i").id = "voluble2";

      setTimeout(function(){ document.getElementById("voluble2").id = "i"; }, 2000);
    }

  </script>

</body>

</html>
