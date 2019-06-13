<!DOCTYPE html>
<html>
<link rel="stylesheet" href="styleIdenifier.css">
<body>
<!-- En este juego no necesitamos un json, ya que con solo dos capas podemos realizar el juego -->

 <audio id="win" src="https://raw.githubusercontent.com/IdiomaKids/Idiomakidsapp/rescate/audios/clap2.mp3"></audio>
   <audio id="lose" src="https://raw.githubusercontent.com/IdiomaKids/Idiomakidsapp/rescate/audios/lose.mp3"></audio>

<!-- Cargamos el fondo de referencia del cuerpo humano -->
  <img src="../images/Identificar/ManoIzq/body.png" alt="" class="fondobody" id="fondoCorrect2" solution="correct" usemap="#image-map" style="left:70%;">
  <img src="../images/Identificar/ManoIzq/head.png" alt="" style="    position: absolute;
      left: 25%;
      top: 20%;width:200px;">
      <!-- Cargamos los dos divs que usaremos de activadores de los eventos -->
  <map name="image-map">
      <area target="" style="
      /* border: 1px solid black; */
      left: 62.8%;
      padding: 85px;
      position: absolute;
      top: 6%;
      padding-left: 123px;"alt="" title="" coords="500,252,50" shape="circle" onclick="verBueno()">
  </map>
  <area target="" style="
      /* border: 1px solid black; */
      left: 54.7%;
    padding: 150px;
    position: absolute;
    top: 32%;
    padding-left: 255px;
    height: 30px;
      " alt="" title="" coords="500,252,50" shape="circle" onclick="verMalo()">
  <div id="no" width="100%" height="-webkit-fill-available">
  </div>

  <div id="n">
    <h1 class="center">CABEZA</h1>
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;left:100px;"alt="">
    <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;right:100px;"alt="">
  </div>

  <div id="i">
    <h1 class="center">INCORRECTO</h1>
  </div>


  <script>

//Los eventos que deciden si esta bien o mal la respuesta, en el primer function cargamos la respuesta correcta y en el segundo la incorrecta, si te equivocas, puedes volver a intentarlo
    function verBueno(){
      document.getElementById("no").id="yes";
      document.getElementById("fondoCorrect2").style.opacity = 1;
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
