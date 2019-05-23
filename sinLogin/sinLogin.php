<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <link rel="stylesheet" href="sinLoginStyle.css">
    <meta charset="utf-8">
    <title>IdiomaKids</title>
  </head>
  <body>
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
    <div class="group">
      <a href="../SinLogin/Mapa.php" style="text-align:center;text-decoration:none;" class="buttonStyle">MAPA</a>
      <button type="button" name="button" class="buttonStyle2" onclick="click2()"title="Solo disponible al registrarse">PERSONAJE</button>
      <button type="button" name="button" class="buttonStyle2" onclick="click2()"title="Solo disponible al registrarse">CONFIGURACIÓN PADRES</button>
      <button type="button" name="button" class="buttonStyle2" onclick="click2()"title="Solo disponible al registrarse">CAMBIAR JUGADOR</button>
      <a href="../index.php" class="buttonStyle" style="text-align:center;text-decoration:none;">SALIR</a>

    </div>

  </body>
</html>
