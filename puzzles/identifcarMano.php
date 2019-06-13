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
   <audio id="lefthand2" src="https://raw.githubusercontent.com/IdiomaKids/Idiomakidsapp/rescate/audios/lefthand.mp3"></audio>
<!-- <img src="../images/Identificar/ManoIzq/body.png" alt="" class="fondobody" id="fondoCorrect" solution="correct"> -->
<!-- <h1 style="text-align:center;font-family:sans-serif;">SEÑALA LA MANO IZQUIERDA</h1> -->
  <img src="../images/Identificar/ManoIzq/body.png" alt="" class="fondobody" id="fondoCorrect2" solution="correct" usemap="#image-map" style="left:70%;">
<img src="../images/Identificar/ManoIzq/hand.png" alt="" style="    position: absolute;
    left: 25%;
    top: 22%;">
  <map name="image-map">
      <area target="" style="
      /* border: 1px solid black; */
    left: 80%;
    padding: 28px;
    position: absolute;
    top: 30%;
    height:10px;
    padding-right:35px;"alt="" title="" coords="500,252,50" shape="circle" onclick="verBueno()">
  </map>
  <area target="" style="
      /* border: 1px solid black; */
      left: 54.3%;
      padding: 170px;
      position: absolute;
      top: 7%;
      height: 164px;
      " alt="" title="" coords="500,252,50" shape="circle" onclick="verMalo()">
  <div id="no" width="100%" height="-webkit-fill-available">
  </div>

  <div id="n" style="padding:28px;">
    <h1 class="center" style="height:auto;">MANO IZQUIERDA</h1>
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;left:100px;"alt="">
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;right:100px;"alt="">
  </div>

  <div id="i">
    <h1 class="center">INCORRECTO</h1>
  </div>


  <script>


    function verBueno(){
      document.getElementById("no").id="yes";
      document.getElementById("fondoCorrect2").style.opacity = 1;
      setTimeout('win.play()', 1000);
      lefthand2.play();
      document.getElementById("n").id= "voluble";
      setTimeout(function(){ document.getElementById("voluble").id = "n"; }, 3000);
    }

    function verMalo(){
      lefthand.play();
        lose.play();
      document.getElementById("i").id = "voluble2";

      setTimeout(function(){ document.getElementById("voluble2").id = "i"; }, 2000);
    }

  </script>

</body>

</html>
