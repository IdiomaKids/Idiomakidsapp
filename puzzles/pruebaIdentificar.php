<!DOCTYPE html>
<?php
require '../database.php';
$records = $conn->prepare('SELECT jsondata FROM `games` WHERE id_game = 111');
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
   <audio id="square2" src="https://raw.githubusercontent.com/IdiomaKids/Idiomakidsapp/rescate/audios/cuadrado.mp3">

   </audio>
  <img src="../images/Identificar/Cuadrado/square.png" alt="" class="fondo" id="fondoCorrect" solution="correct">

  <div class="" style="display: block;transform: translateX(-50%);transform: translateY(-50%);position: absolute;left: 20%;top: 70%;">
    <img src="" alt="" id="square" class="img" onclick="verBueno()">
    <img src="" alt="" id="triangle" class="img" onclick="verMalo()">
    <img src="" alt="" id="circle" class="img" onclick="verMalo()">
    <img src="" alt="" id="house" class="img" onclick="verMalo()">
  </div>

  <div id="no" width="100%" height="-webkit-fill-available">
  </div>

  <div id="n">
    <h1 class="center">CUADRADO</h1>
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;left:100px;"alt="">
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;right:100px;"alt="">
  </div>

  <div id="i">
    <h1 class="center">INCORRECTO</h1>
  </div>

<p style="display:none;" value="0" id="contador"></p>
  <script>
    var myJSON = <?= $jsonP['jsondata']; ?>

    var win = document.getElementById("win");


    if (myJSON[0].shape == "square.png") {
      //  window.alert("soy un cuadrado")

      document.getElementById("square").src = "../images/Identificar/Cuadrado/square.png";
      document.getElementById("square").setAttributeNS('','solution', myJSON[0].solution);


    }

    if (myJSON[1].shape == "triangle.png") {
      //    window.alert("soy un triangulo")
      document.getElementById("triangle").src = "../images/Identificar/Cuadrado/triangle.png";
      document.getElementById("triangle").setAttributeNS('','solution', myJSON[1].solution);
    }

    if (myJSON[2].shape == "circle.png") {
      //  window.alert("soy un circulo")
      document.getElementById("circle").src = "../images/Identificar/Cuadrado/circle.png";
      document.getElementById("circle").setAttributeNS('','solution', myJSON[2].solution);
    }

    if (myJSON[3].shape == "house.png") {
      //    window.alert("soy una casa")
      document.getElementById("house").src = "../images/Identificar/Cuadrado/house.png";
      document.getElementById("house").setAttributeNS('','solution', myJSON[3].solution);
    }


    function verBueno(){
      // var contador = 1;
      document.getElementById('contador').value = 1;
      // window.alert(document.getElementById('contador').value);
      document.getElementById("no").id="yes";
      document.getElementById("fondoCorrect").style.opacity = 1;
      square2.play();
      setTimeout(win.play(), 1000);
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
