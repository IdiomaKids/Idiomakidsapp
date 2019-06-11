<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <link rel="stylesheet" href="sinLoginStyle.css">
    <link rel="shortcut icon" type="image/png" href="../../../images/LogoApp.ico"/>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body>
    <img src="../../images/generalData.png" style="width:99%;height:100%;position:absolute;top:0;">
    <a href="../../logout.php">
    <img src="../../images/logout.png" alt="" style="
   width: 50px;
   position: absolute;
   right: 0;
   top: 0;
   margin: 5px;
"></a>
    <script type="text/javascript">
    function click2(){
    document.getElementById("float").id = "float2";
 		gone();
  }
    function gone() {
      setTimeout(function(){ document.getElementById("float2").id = "float"; }, 3000);
    }

    </script>

    <div id="float">
      <h1 class="center">Solo disponible al registrarse</h1>
    </div>
    <div style="width: 24%;
        height: 350px;
        position: absolute;
        left: 7%;
        top: 5%;
        border-radius: 58px;
        cursor: pointer;
        " onclick="map()">

    </div>
    <div style="    width: 24%;
        height: 388px;
        position: absolute;
        left: 28%;
        bottom: 0;
        border-radius: 130px;
        cursor: pointer;" onclick="click2()">

    </div>
    <div style="    width: 24%;
        height: 388px;
        position: absolute;
        left: 51%;
        top: 30px;
        border-radius: 58px;
    cursor: pointer;
        " onclick="click2()">

    </div>
    <div style="    width: 22%;
        height: 345px;
        position: absolute;
        left: 70%;
        bottom: 0;
        border-radius: 230px;
    cursor: pointer;
        " onclick="click2()">

    </div>
    <script type="text/javascript">
      function map(){
        window.location.href="Mapa.php";
      }
      // function pj(){
      //   window.location.href="../../character.php";
      // }
      // function changePj(){
      //   window.location.href="../../whoareyouSetS.php";
      // }
      // function checkUser(){
      //   window.location.href="../../checkUser.php";
      // }
    </script>
    <!-- <div class="group">
      <a href="../SinLogin/Mapa.php" style="text-align:center;text-decoration:none;" class="buttonStyle">MAPA</a>
      <button type="button" name="button" class="buttonStyle2" onclick="click2()"title="Solo disponible al registrarse">PERSONAJE</button>
      <button type="button" name="button" class="buttonStyle2" onclick="click2()"title="Solo disponible al registrarse">CONFIGURACIÓN PADRES</button>
      <button type="button" name="button" class="buttonStyle2" onclick="click2()"title="Solo disponible al registrarse">CAMBIAR JUGADOR</button>
      <a href="../index.php" class="buttonStyle" style="text-align:center;text-decoration:none;">SALIR</a>

    </div> -->

  </body>
</html>
