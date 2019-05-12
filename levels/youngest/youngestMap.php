<?php
require "../../database.php";
session_start();
$image = $_SESSION['avatar'];
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <link rel="stylesheet" href="styleLevels.css">
  </head>
  <body style="background-color:lightgreen;overflow-y:initial;margin:0%;padding:0%;z-index:5;">
    <img src="../../Granja/GranjaFull.png" style="width:100%;height:100%;position:absolute;">
    <div class="primer" onclick="openGame()">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s0"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s1"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;" id="1s2"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;" id="1s3"alt="">
    </div>
    <dialog id="dialog" style="width:90%;height:90%;top:3%;z-index:1;"value="0">
      <iframe src="../../cowPuzzle.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame1"></iframe>

      <script type="text/javascript">
      function boton() {
        document.getElementById('frame1').src = "../../pruebaIdentificar.php";
        var x = document.getElementById('frame1').contentWindow.document.getElementById('valor').value

        if (document.getElementById('frame1').src = "../../pruebaIdentificar.php") {
          document.getElementById('boton').style.display = "none";
          document.getElementById('boton2').style.display = "inline-block";
        }
        if (document.getElementById('frame1').src = "../../carrotPuzzle.php") {

        }
        if (x == 4) {
          document.getElementById('1s1').style.display = "inline-block";
          window.alert(x);
          document.getElementById('boton').style.display = "none";
          document.getElementById('boton2').style.display = "inline-block";

        }
      }
      function boton2() {
        document.getElementById('frame1').src = "../../carrotPuzzle.php";
        document.getElementById('boton2').style.display = "none";
        document.getElementById('boton3').style.display = "inline-block";
      }
      function boton3(){
        closeDialog();
      }
      </script>
      <button type="button" name="button" onclick="boton()" id="boton" class="botonN"style="display:inline-block;">Siguiente</button>
      <button type="button" name="button" onclick="boton2()" id="boton2" class="botonN"style="display:none;">Siguiente</button>
      <button type="button" name="button" onclick="boton3()" id="boton3" class="botonN"style="display:none;">Fin</button>

      <button type="button" name="button" onclick="closeDialog()"style="display:inline-block;position:absolute;top:0;left:0;margin:5px;">Cerrar</button>
<img src="../../images/Cerrar.png" style="display:inline-block;position:absolute;top:0;left:0;margin:5px;" onclick="closeDialog()"alt="">
    </dialog>

    <div class="segundo">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
    </div>
    <div class="tercero">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
    </div>
    <div class="cuarto">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
    </div>
    <!-- <img src="../../Granja/GranjaFull.png" style="width:100%;height:100%;position:absolute;" usemap="#mapa1"> -->

    <script type="text/javascript">
      function openGame(){
        dialog.show();
        // document.getElementById('frame1').contentWindow.document.getElementById('valor').value
      }

      function closeDialog(){
        location.reload();
          dialog.close();
        }


    </script>
    <?php

    echo "<img style='background-color: white;
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
    margin: 5px;' src='../../$image>'>";?>
  </body>
</html>
