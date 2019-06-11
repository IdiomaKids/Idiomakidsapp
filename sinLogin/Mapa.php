<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <link rel="stylesheet" href="sinLoginStyle.css">
    <link rel="shortcut icon" type="image/png" href="../../../images/LogoApp.ico"/>
  </head>
  <body style="background-color:lightgreen;overflow-y:initial;margin:0%;padding:0%;">
    <a href="../../logout.php">
    <img src="../../images/logout.png" alt="" style="
   width: 50px;
   position: absolute;
   right: 0;
   top: 0;
   margin: 5px;
   z-index: 1;
"></a>
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
    <img src="../../Granja/GranjaFull2.png" style="width:100%;height:100%;position:absolute;">
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
      <img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s3"alt="">
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
      var square = 0;
      var cow = 0;
      var hand = 0;
      var rs = setInterval('reloadSquare()',1000);
      function reloadSquare(){
        var y = document.getElementById('frame1').contentWindow.document.getElementById('fondoCorrect').style.opacity
        if (y == 1 && square==0) {
          square = 1;
          contador = contador + 1;
          setTimeout("document.getElementById('frame1').src = '../../puzzles/cowPuzzle.php'",3500);
          // document.getElementById('frame1').src = "../../puzzles/cowPuzzle.php";
          document.getElementById('idSquareButton').style.display = "none";
          setTimeout("document.getElementById('idCowButton').style.display = 'inline-block'", 3500);
         }
       }

        function squareButton() {
        document.getElementById('frame1').src = "../../puzzles/cowPuzzle.php";
        document.getElementById('idSquareButton').style.display = "none";
        document.getElementById('idCowButton').style.display = "inline-block";
      }


      var rC = setInterval('reloadCow()',1000);
      function reloadCow(){
        var x = document.getElementById('frame1').contentWindow.document.getElementById('valor').value
        if (x == 4 && cow==0) {
          cow = 1;
          contador = contador + 1;
          setTimeout("  document.getElementById('frame1').src = '../../puzzles/identifcarMano.php'", 3500);
          document.getElementById('idCowButton').style.display = "none";
          setTimeout("document.getElementById('idHandButton').style.display = 'inline-block'", 3500);
        }
      }

      function cowButton() {
       document.getElementById('frame1').src = "../../puzzles/identifcarMano.php";
       document.getElementById('idCowButton').style.display = "none";
       document.getElementById('idHandButton').style.display = "inline-block";
      }


      var rH = setInterval('reloadHand()',4000);
      function reloadHand(){
        var z = document.getElementById('frame1').contentWindow.document.getElementById('fondoCorrect2').style.opacity
        if (z == 1 && hand == 0) {
          hand = 1;
          contador = contador + 1;
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
          setTimeout('closeDialog()', 4000);

        }
      }

      function handButton(){

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

      <button type="button" name="button" onclick="squareButton()" id="idSquareButton" class="botonN"style="display:inline-block;">Siguiente</button>
			<button type="button" name="button" onclick="cowButton()" id="idCowButton" class="botonN"style="display:none;">Siguiente</button>
			<button type="button" name="button" onclick="handButton()" id="idHandButton" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>

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
