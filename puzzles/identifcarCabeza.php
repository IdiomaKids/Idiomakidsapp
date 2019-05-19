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


<audio id="win" src="https://raw.githubusercontent.com/NestorPlasencia/PikaPuzzle/master/media/win.mp3"></audio>
<!-- <img src="../images/Identificar/ManoIzq/body.png" alt="" class="fondobody" id="fondoCorrect" solution="correct"> -->
<h1 style="text-align:center;font-family:sans-serif;">SEÑALA LA CABEZA</h1>
  <img src="../images/Identificar/ManoIzq/body.png" alt="" class="fondobody" id="fondoCorrect" solution="correct" usemap="#image-map">

  <map name="image-map">
      <area target="" style="
      /* border: 1px solid black; */
    left: 43.7%;
    padding: 100px;
    position: absolute;
    top: 10%;"alt="" title="" coords="500,252,50" shape="circle" onclick="verBueno()">
  </map>
  <div id="no" width="100%" height="-webkit-fill-available">
  </div>

  <div id="n">
    <h1 class="center">CABEZA</h1>
  </div>

  <div id="i">
    <h1 class="center">INCORRECTO</h1>
  </div>


  <script>


    function verBueno(){
      document.getElementById("no").id="yes";
      document.getElementById("fondoCorrect").style.opacity = 1;
      win.play();
      document.getElementById("n").id= "voluble";
      setTimeout(function(){ document.getElementById("voluble").id = "n"; }, 3000);
    }



  </script>

</body>

</html>
