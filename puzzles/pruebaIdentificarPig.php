<!DOCTYPE html>
<?php
require '../database.php';
$records = $conn->prepare('SELECT jsondata FROM `games` WHERE id_game = 122');
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
  <img src="../images/Identificar/Cerdo/pig.png" alt="" class="fondo" id="fondoCorrect" solution="correct" style="top:15%;">

  <div class="" style="display: block;transform: translateX(-50%);transform: translateY(-50%);position: absolute;left: 18%;top: 70%;">
    <img src="" alt="" id="pink" class="img" onclick="verBueno()">
    <img src="" alt="" id="orange" class="img" onclick="verMalo()">
    <img src="" alt="" id="green" class="img" onclick="verMalo()">
    <img src="" alt="" id="purple" class="img" onclick="verMalo()">
  </div>

  <div id="no" width="100%" height="-webkit-fill-available">
  </div>

  <div id="n">
    <h1 class="center">CERDO</h1>
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;left:100px;"alt="">
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;right:100px;"alt="">
  </div>

  <div id="i">
    <h1 class="center">INCORRECTO</h1>
  </div>


  <script>
    var myJSON = <?= $jsonP['jsondata']; ?>

    var win = document.getElementById("win");


    if (myJSON[0].shape == "pigCorrect.png") {
      //  window.alert("soy un cuadrado")

      document.getElementById("pink").src = "../images/Identificar/Cerdo/pigCorrect.png";
      document.getElementById("pink").setAttributeNS('','solution', myJSON[0].solution);


    }

    if (myJSON[1].shape == "pigIncorrectOrange.png") {
      //    window.alert("soy un triangulo")
      document.getElementById("orange").src = "../images/Identificar/Cerdo/pigIncorrectOrange.png";
      document.getElementById("orange").setAttributeNS('','solution', myJSON[1].solution);
    }

    if (myJSON[2].shape == "pigIncorrectGreen.png") {
      //  window.alert("soy un circulo")
      document.getElementById("green").src = "../images/Identificar/Cerdo/pigIncorrectGreen.png";
      document.getElementById("green").setAttributeNS('','solution', myJSON[2].solution);
    }

    if (myJSON[3].shape == "pigIncorrectPurple.png") {
      //    window.alert("soy una casa")
      document.getElementById("purple").src = "../images/Identificar/Cerdo/pigIncorrectPurple.png";
      document.getElementById("purple").setAttributeNS('','solution', myJSON[3].solution);
    }


    function verBueno(){
      document.getElementById("no").id="yes";
      document.getElementById("fondoCorrect").src = "../images/Identificar/Cerdo/pigCorrect.png";
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
