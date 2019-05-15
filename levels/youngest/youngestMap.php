<?php
require "../../database.php";
session_start();
$image = $_SESSION['avatar'];
$idplayer = $_SESSION['id_player'];

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>IdiomaKids</title>
    <link rel="stylesheet" href="styleLevels.css">
  </head>
  <body style="background-color:lightgreen;overflow-y:initial;margin:0%;padding:0%;z-index:5;"id="body1" onload="buenoL()">
    <img src="../../Granja/GranjaFull.png" style="width:100%;height:100%;position:absolute;">
    <a href="../../pasarelaCero.php" style="    text-decoration: none;
    color: black;
    position: absolute;
    bottom: 0;
    margin: 5px;"><button type="button" name="buttonR" id="back" style="margin-right:5%;">VOLVER</button></a>
    <div class="primer" onclick="openGame()" id="unoM">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s0"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s1"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;" id="1s2"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;" id="1s3"alt="">
      <script type="text/javascript">
      var myVar;
      function enviar(){
        document.location.href = "youngestMap.php?contador=" + contador;


      }
      function buenoL(){
        // if (window.location = "youngestMap.php?contador=1") {
        //     setTimeout(function(){ window.location = "youngestMap.php"; }, 10000);
        // }

      }
      </script>
      <?php
      extract($_GET);
      $PHPvariable ="0";
      $PHPvariable0 = "0";



$sql7 = "SELECT score from score where id_player = $idplayer and id_level = 11";
$result7 = $conn->query($sql7);
$total7 = $result7->fetchColumn();
//echo $total7;
//echo $idplayer;
if ($total7 == 0) {

echo "<script> document.getElementById('1s0').style.display = 'inline-block' </script>";

}
else if($total7 == 1){

  echo "<script> document.getElementById('1s1').style.display = 'inline-block' </script>";
}
else if ($total7 == 2){

  echo "<script> document.getElementById('1s2').style.display = 'inline-block' </script>";
}
else if ($total7 == 3){

  echo "<script> document.getElementById('1s3').style.display = 'inline-block' </script>";
}

      $sql3 = "SELECT COUNT(id_player) FROM player_data_map WHERE id_player = $idplayer";
      $result = $conn->query($sql3);
      $total = $result->fetchColumn();
      $sql = "INSERT INTO player_data_map (id_map, id_player, player_character_position, enable) VALUES (1, $idplayer, 1, 0)";
      $stmt = $conn->prepare($sql);
      if ($total == $PHPvariable) {
        $stmt->execute();
      }else if ($total!=$PHPvariable){

      }

      $sql4 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer";
      $result4 = $conn->query($sql4);
      $total4 = $result4->fetchColumn();

      $sql5 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 11, 0)";
      $stmt5 = $conn->prepare($sql5);
      if ($total4 == $PHPvariable0) {
        $stmt5->execute();
        header("Location: youngestMap.php");
      }else if ($total4!=$PHPvariable0){

      }
      ?>


    </div>

    <dialog id="dialog" style="width:90%;height:90%;top:3%;z-index:1;"value="0">
          <p value="-1" id="score2" style="display:none;">hey</p>
      <iframe src="../../cowPuzzle.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame1"></iframe>

      <script type="text/javascript">
      var contador = 0;
      function boton() {
        document.getElementById('frame1').src = "../../pruebaIdentificar.php";
        var x = document.getElementById('frame1').contentWindow.document.getElementById('valor').value
          document.getElementById('boton').style.display = "none";
          document.getElementById('boton2').style.display = "inline-block";
        if (x == 4) {
          document.getElementById('boton').style.display = "none";
          document.getElementById('boton2').style.display = "inline-block";
          contador = contador + 1;

        }
      }

      function boton2() {
        var y = document.getElementById('frame1').contentWindow.document.getElementById('fondoCorrect').style.opacity
        if (y == 1) {
          document.getElementById('frame1').src = "../../carrotPuzzle.php";
          document.getElementById('boton2').style.display = "none";
          document.getElementById('boton3').style.display = "inline-block";
          contador = contador + 1;
        }
        document.getElementById('frame1').src = "../../carrotPuzzle.php";
        document.getElementById('boton2').style.display = "none";
        document.getElementById('boton3').style.display = "inline-block";
      }

      function boton3(){


        var z = document.getElementById('frame1').contentWindow.document.getElementById('valor').value



          <?php
          if ($contador == 1) {
            $sql13 = "UPDATE score SET score = $contador WHERE id_player = $idplayer AND id_level = 11";
            $stmt13 = $conn->prepare($sql13);
            if ($total7<2) {
              $stmt13->execute();
            }

            var_dump($sql13);
          }
           ?>

          <?php
          if ($contador == 2) {
            $sql14 = "UPDATE score SET score = $contador WHERE id_player = $idplayer AND id_level = 11";
            $stmt14 = $conn->prepare($sql14);
            if ($total7<3) {
                $stmt14->execute();
                header("Location: youngestMap.php");
            }

          }
           ?>


          <?php
          if ($contador == 3){
            $sql15 = "UPDATE score SET score = $contador WHERE id_player = $idplayer AND id_level = 11";
            $stmt15 = $conn->prepare($sql15);
            $stmt15->execute();
          }
           ?>


        if (z == 4) {

          document.getElementById('boton2').style.display = "none";
          document.getElementById('boton3').style.display = "inline-block";
          contador = contador + 1;

          closeDialog();


        }

enviar();
        closeDialog();
      }


      </script>

      <button type="button" name="button" onclick="boton()" id="boton" class="botonN"style="display:inline-block;">Siguiente</button>
      <button type="button" name="button" onclick="boton2()" id="boton2" class="botonN"style="display:none;">Siguiente</button>
      <button type="button" name="button" onclick="boton3()" id="boton3" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>

      <button type="button" name="button" onclick="closeDialog()"style="display:inline-block;position:absolute;top:0;left:0;margin:5px;">Cerrar</button>
<img src="../../images/Cerrar.png" style="display:inline-block;position:absolute;top:0;left:0;margin:5px;" onclick="closeDialog()"alt="">

    </dialog>

    <div class="segundo" id="2">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
    </div>
    <div class="tercero" id="3">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
    </div>
    <div class="cuarto" id="4">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"alt="">
    </div>

    <script type="text/javascript">
      function openGame(){
        dialog.show();
      }

      function closeDialog(){
          dialog.close();
        }
function onload1(){

}


    </script>
    <?php
//echo $idplayer;
    echo "<img id='image' style='background-color: white;
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
    <?php
    if ($total7 > 0) {
    echo "<script> document.getElementById('image').style.left = '50px'";
    echo "</script>";
    echo " <script> document.getElementById('image').style.bottom = '120px'";
    echo "</script>";
    

    }
     ?>
  </body>
</html>
