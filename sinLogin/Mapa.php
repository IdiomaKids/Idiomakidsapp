<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <link rel="stylesheet" href="sinLoginStyle.css">
  </head>
  <body style="background-color:lightgreen;overflow-y:initial;margin:0%;padding:0%;">
    <script type="text/javascript">
    function reg(){
    document.getElementById("float").id = "float2";

    }


    </script>

    <div id="float">
      <h1 class="center">Solo disponible al registrarse</h1>
      <br><br>
      <button type="button" name="button"class="botonN"> <a href="../../signup.php" style="text-decoration:none;color:black;">Registrarse</a> </button>
    </div>
    <img src="../../Granja/GranjaFull.png" style="width:100%;height:100%;position:absolute;">
    <a href="sinLogin.php" style="    text-decoration: none;
    color: black;
    position: absolute;
    bottom: 0;
    margin: 5px;"><button type="button" name="buttonR" id="back" style="margin-right:5%;">VOLVER</button></a>
    <div class="primer" onclick="openGame()" id="unoM" style="width: 150px;
    height: 240px;
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 5px;
    /* background-color: black; */
    z-index: 1;
    cursor: pointer;">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s0"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s1"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;" id="1s2"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;" id="1s3"alt="">
    </div>
    <div class="" onclick="reg()" style="width: 150px;
    height: 240px;
    position: absolute;
    bottom: 120px;
    right: 100;
    left: 51px;
    margin: 5px;
    /* background-color: black; */
    z-index: 1;
    cursor: pointer;
    display:none;" id="reg2">

    </div>
    <dialog id="dialog" style="width:90%;height:90%;top:3%;z-index:2;"value="0">
          <p value="-1" id="score2" style="display:none;">hey</p>
      <iframe src="../../puzzles/pruebaIdentificar.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame1"></iframe>

      <script type="text/javascript">
      var contador = 0;
      function boton() {
        var y = document.getElementById('frame1').contentWindow.document.getElementById('fondoCorrect').style.opacity
        if (y == 1) {
          document.getElementById('frame1').src = "../../puzzles/cowPuzzle.php";
          document.getElementById('boton').style.display = "none";
          document.getElementById('boton2').style.display = "inline-block";
          contador = contador + 1;
        }
        document.getElementById('frame1').src = "../../puzzles/cowPuzzle.php";
        document.getElementById('boton').style.display = "none";
        document.getElementById('boton2').style.display = "inline-block";
      }

      function boton2() {

        document.getElementById('frame1').src = "../../puzzles/identifcarMano.php";
        var x = document.getElementById('frame1').contentWindow.document.getElementById('valor').value
          document.getElementById('boton2').style.display = "none";
          document.getElementById('boton3').style.display = "inline-block";
        if (x == 4) {
          document.getElementById('boton2').style.display = "none";
          document.getElementById('boton3').style.display = "inline-block";
          contador = contador + 1;

        }
      }

      function boton3(){


        var z = document.getElementById('frame1').contentWindow.document.getElementById('fondoCorrect').style.opacity

        if (z == 1) {

          document.getElementById('boton2').style.display = "none";
          document.getElementById('boton3').style.display = "inline-block";
          contador = contador + 1;

          closeDialog();
          if (contador == 0) {
            document.getElementById('1s0').style.display = "inline-block";
          }

        }
        if (contador == 0) {
          document.getElementById('1s0').style.display = "inline-block";
        }else if (contador == 1) {
          document.getElementById('1s1').style.display = "inline-block";
          document.getElementById('image').style.left = '50px'
          document.getElementById('image').style.bottom = '120px'
          document.getElementById('reg2').style.display = 'inline-block'
        }else if (contador == 2) {
          document.getElementById('1s2').style.display = "inline-block";
          document.getElementById('image').style.left = '50px'
          document.getElementById('image').style.bottom = '120px'
            document.getElementById('reg2').style.display = 'inline-block'
        }else if(contador == 3){
          document.getElementById('1s3').style.display = "inline-block";
          document.getElementById('image').style.left = '50px'
          document.getElementById('image').style.bottom = '120px'
            document.getElementById('reg2').style.display = 'inline-block'
        }
        if (contador == 0) {
          document.getElementById('1s0').style.display = "inline-block";
        }else if (contador == 1) {
          document.getElementById('1s1').style.display = "inline-block";
          document.getElementById('image').style.left = '50px'
          document.getElementById('image').style.bottom = '120px'
            document.getElementById('reg2').style.display = 'inline-block'
        }else if (contador == 2) {
          document.getElementById('1s2').style.display = "inline-block";
          document.getElementById('image').style.left = '50px'
          document.getElementById('image').style.bottom = '120px'
            document.getElementById('reg2').style.display = 'inline-block'
        }else if(contador == 3){
          document.getElementById('1s3').style.display = "inline-block";
          document.getElementById('image').style.left = '50px'
          document.getElementById('image').style.bottom = '120px'
            document.getElementById('reg2').style.display = 'inline-block'
        }
        closeDialog();

      }


      function closeDialog(){
          dialog.close();
        }
        function openGame(){
          dialog.show();
        }


      </script>

      <button type="button" name="button" onclick="boton()" id="boton" class="botonN"style="display:inline-block;">Siguiente</button>
      <button type="button" name="button" onclick="boton2()" id="boton2" class="botonN"style="display:none;">Siguiente</button>
      <button type="button" name="button" onclick="boton3()" id="boton3" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>

      <button type="button" name="button" onclick="closeDialog()"style="display:inline-block;position:absolute;top:0;left:0;margin:5px;">Cerrar</button>
      <img src="../../images/Cerrar.png" style="display:inline-block;position:absolute;top:0;left:0;margin:5px;" onclick="closeDialog()"alt="">

    </dialog>
    <img id='image' style='background-color: white;
    width: 150px;
    height: 150px;
    border-radius: 100px;
    border: 3px solid black;
    margin-left: 12%;
    margin-bottom: 1%;
    cursor: pointer;
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 5px;' src='../../images/avatares/avatar.png>'>
  </body>
</html>
