<!DOCTYPE html>
<?php
require '../database.php';
$records = $conn->prepare('SELECT jsondata FROM `games` WHERE id_game = 131');
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


 <audio id="win" src="https://raw.githubusercontent.com/NestorPlasencia/PikaPuzzle/master/media/win.mp3"></audio>
  <img src="../images/Identificar/Arbol/tree.png" alt="" class="fondo" id="fondoCorrect" solution="correct">

  <div class="" style="display: block;transform: translateX(-50%);transform: translateY(-50%);position: absolute;left: 20%;top: 70%;">
    <img src="" alt="" id="spoon" class="img" onclick="verMalo()" style="width:90px;">
    <img src="" alt="" id="tree2" class="img" onclick="verBueno()">
    <img src="" alt="" id="table" class="img" onclick="verMalo()">
    <img src="" alt="" id="chair" class="img" onclick="verMalo()">
  </div>

  <div id="no" width="100%" height="-webkit-fill-available">
  </div>

  <div id="n">
    <h1 class="center">ÁRBOL</h1>
  </div>

  <div id="i">
    <h1 class="center">INCORRECTO</h1>
  </div>


  <script>
    var myJSON = <?= $jsonP['jsondata']; ?>

    var win = document.getElementById("win");


    if (myJSON[0].shape == "spoon.png") {
      //  window.alert("soy un cuadrado")

      document.getElementById("spoon").src = "../images/Identificar/Arbol/spoon.png";
      document.getElementById("spoon").setAttributeNS('','solution', myJSON[0].solution);


    }

    if (myJSON[1].shape == "tree2.png") {
      //    window.alert("soy un triangulo")
      document.getElementById("tree2").src = "../images/Identificar/Arbol/tree2.png";
      document.getElementById("tree2").setAttributeNS('','solution', myJSON[1].solution);
    }

    if (myJSON[2].shape == "table.png") {
      //  window.alert("soy un circulo")
      document.getElementById("table").src = "../images/Identificar/Arbol/table.png";
      document.getElementById("table").setAttributeNS('','solution', myJSON[2].solution);
    }

    if (myJSON[3].shape == "chair.png") {
      //    window.alert("soy una casa")
      document.getElementById("chair").src = "../images/Identificar/Arbol/chair.png";
      document.getElementById("chair").setAttributeNS('','solution', myJSON[3].solution);
    }


    function verBueno(){
      document.getElementById("no").id="yes";
      document.getElementById("fondoCorrect").src = "../images/Identificar/Arbol/tree2.png";
      document.getElementById("fondoCorrect").style.opacity = 1;
      win.play();
      document.getElementById("n").id= "voluble";
      setTimeout(function(){ document.getElementById("voluble").id = "n"; }, 3000);
    }

    function verMalo(){
      document.getElementById("i").id = "voluble2";
      setTimeout(function(){ document.getElementById("voluble2").id = "i"; }, 1000);
    }

  </script>

</body>

</html>
