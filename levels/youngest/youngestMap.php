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





      $sql3 = "SELECT COUNT(id_player) FROM player_data_map WHERE id_player = $idplayer";
      $result = $conn->query($sql3);
      $total = $result->fetchColumn();

      $sql = "INSERT INTO player_data_map (id_map, id_player, player_character_position, enable) VALUES (1, $idplayer, 1, 0)";
      $stmt = $conn->prepare($sql);
      if ($total == $PHPvariable) {
        $stmt->execute();
      }else if ($total!=$PHPvariable){

      }

      $sql4 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 11";
      $result4 = $conn->query($sql4);
      $total4 = $result4->fetchColumn();


      $sql5 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 11, 0)";
      $stmt5 = $conn->prepare($sql5);
      if ($total4 == $PHPvariable0) {
        $stmt5->execute();
        header("Location: youngestMap.php");
      }else if ($total4!=$PHPvariable0){

      }
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
      ?>
    </div>

    <dialog id="dialog" style="width:90%;height:90%;top:3%;z-index:1;"value="0">
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


        if (z == 1) {

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

    <div class="segundo" id="2" onclick="openGame2()">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="2s0"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="2s1"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="2s2"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="2s3"alt="">
    </div>
    <script type="text/javascript">
    function enviar2(){
      document.location.href = "youngestMap.php?contador2=" + contador2;


    }
    </script>
    <dialog id="dialog2" style="width:90%;height:90%;top:3%;z-index:1;"value="0">
          <p value="-1" id="score2" style="display:none;">hey</p>
          <iframe src="../../puzzles/applePuzzle.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame2"></iframe>

      <script type="text/javascript">
      <?php
extract($_GET);
$sql72 = "SELECT score from score where id_player = $idplayer and id_level = 12";
$result72 = $conn->query($sql72);
$total72 = $result72->fetchColumn();
       ?>
      var contador2 = 0;
      function boton11() {
        document.getElementById('frame2').src = "../../puzzles/pruebaIdentificarPig.php";
        var x = document.getElementById('frame2').contentWindow.document.getElementById('valor').value
          document.getElementById('boton11').style.display = "none";
          document.getElementById('boton21').style.display = "inline-block";
        if (x == 4) {
          document.getElementById('boton11').style.display = "none";
          document.getElementById('boton21').style.display = "inline-block";
          contador2 = contador2 + 1;
          window.alert(contador2);
        }
      }

      function boton21() {
        var y = document.getElementById('frame2').contentWindow.document.getElementById('fondoCorrect').style.opacity
        if (y == 1) {
          document.getElementById('frame2').src = "../../puzzles/threePuzzle.php";
          document.getElementById('boton21').style.display = "none";
          document.getElementById('boton31').style.display = "inline-block";
          contador2 = contador2 + 1;
          window.alert(contador2);
        }
        document.getElementById('frame2').src = "../../puzzles/threePuzzle.php";
        document.getElementById('boton21').style.display = "none";
        document.getElementById('boton31').style.display = "inline-block";
      }

      function boton31(){


        var z = document.getElementById('frame2').contentWindow.document.getElementById('valor').value



          <?php
          if ($contador2 == 1) {
            $sql13 = "UPDATE score SET score = $contador2 WHERE id_player = $idplayer AND id_level = 12";
            $stmt13 = $conn->prepare($sql13);
            if ($total72<2) {
              $stmt13->execute();
            }

            var_dump($sql13);
          }
           ?>

          <?php
          if ($contador2 == 2) {
            $sql14 = "UPDATE score SET score = $contador2 WHERE id_player = $idplayer AND id_level = 12";
            $stmt14 = $conn->prepare($sql14);
            if ($total72<3) {
                $stmt14->execute();
            }

          }
           ?>


          <?php
          if ($contador2 == 3){
            $sql15 = "UPDATE score SET score = $contador2 WHERE id_player = $idplayer AND id_level = 12";
            $stmt15 = $conn->prepare($sql15);
            $stmt15->execute();
          }
           ?>


        if (z == 4) {

          document.getElementById('boton21').style.display = "none";
          document.getElementById('boton31').style.display = "inline-block";
          contador2 = contador2 + 1;

          closeDialog();


        }

enviar2();
        closeDialog();
      }


      </script>

      <button type="button" name="button" onclick="boton11()" id="boton11" class="botonN"style="display:inline-block;">Siguiente</button>
      <button type="button" name="button" onclick="boton21()" id="boton21" class="botonN"style="display:none;">Siguiente</button>
      <button type="button" name="button" onclick="boton31()" id="boton31" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>

      <button type="button" name="button" onclick="closeDialog()"style="display:inline-block;position:absolute;top:0;left:0;margin:5px;">Cerrar</button>
      <img src="../../images/Cerrar.png" style="display:inline-block;position:absolute;top:0;left:0;margin:5px;" onclick="closeDialog()"alt="">

    </dialog>
    <div class="tercero" id="3" onclick="openGame3()">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="3s0"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="3s1"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="3s2"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="3s3"alt="">
    </div>
    <script type="text/javascript">
    function enviar3(){
      document.location.href = "youngestMap.php?contador3=" + contador3;


    }
    </script>
    <dialog id="dialog3" style="width:90%;height:90%;top:3%;z-index:1;"value="0">
          <p value="-1" id="score2" style="display:none;">hey</p>
          <iframe src="../../puzzles/pruebaIdentificarArbol.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame3"></iframe>

      <script type="text/javascript">
      <?php
extract($_GET);
$sql723 = "SELECT score from score where id_player = $idplayer and id_level = 13";
$result723 = $conn->query($sql723);
$total723 = $result723->fetchColumn();
       ?>
      var contador3 = 0;
      function boton111() {
        document.getElementById('frame3').src = "../../puzzles/horsePuzzle.php";
        var x = document.getElementById('frame3').contentWindow.document.getElementById('fondoCorrect').style.opacity
          document.getElementById('boton111').style.display = "none";
          document.getElementById('boton211').style.display = "inline-block";
        if (x == 1) {
          document.getElementById('boton111').style.display = "none";
          document.getElementById('boton211').style.display = "inline-block";
          contador3 = contador3 + 1;
          window.alert(contador3);
        }
      }

      function boton211() {
        var y = document.getElementById('frame3').contentWindow.document.getElementById('valor').value
        if (y == 4) {
          document.getElementById('frame3').src = "../../puzzles/identifcarCabeza.php";
          document.getElementById('boton211').style.display = "none";
          document.getElementById('boton311').style.display = "inline-block";
          contador3 = contador3 + 1;
          window.alert(contador3);
        }
        document.getElementById('frame3').src = "../../puzzles/identifcarCabeza.php";
        document.getElementById('boton211').style.display = "none";
        document.getElementById('boton311').style.display = "inline-block";
      }

      function boton311(){


        var z = document.getElementById('frame3').contentWindow.document.getElementById('fondoCorrect').style.opacity



          <?php
          if ($contador3 == 1) {
            $sql13 = "UPDATE score SET score = $contador3 WHERE id_player = $idplayer AND id_level = 13";
            $stmt13 = $conn->prepare($sql13);
            if ($total723<2) {
              $stmt13->execute();
            }

            var_dump($sql13);
          }
           ?>

          <?php
          if ($contador3 == 2) {
            $sql14 = "UPDATE score SET score = $contador3 WHERE id_player = $idplayer AND id_level = 13";
            $stmt14 = $conn->prepare($sql14);
            if ($total723<3) {
                $stmt14->execute();
            }

          }
           ?>


          <?php
          if ($contador3 == 3){
            $sql15 = "UPDATE score SET score = $contador3 WHERE id_player = $idplayer AND id_level = 13";
            $stmt15 = $conn->prepare($sql15);
            $stmt15->execute();
          }
           ?>


        if (z == 1) {

          document.getElementById('boton211').style.display = "none";
          document.getElementById('boton311').style.display = "inline-block";
          contador3 = contador3 + 1;

          closeDialog();


        }

enviar3();
        closeDialog();
      }


      </script>

      <button type="button" name="button" onclick="boton111()" id="boton111" class="botonN"style="display:inline-block;">Siguiente</button>
      <button type="button" name="button" onclick="boton211()" id="boton211" class="botonN"style="display:none;">Siguiente</button>
      <button type="button" name="button" onclick="boton311()" id="boton311" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>

      <button type="button" name="button" onclick="closeDialog()"style="display:inline-block;position:absolute;top:0;left:0;margin:5px;">Cerrar</button>
      <img src="../../images/Cerrar.png" style="display:inline-block;position:absolute;top:0;left:0;margin:5px;" onclick="closeDialog()"alt="">

    </dialog>
    <div class="cuarto" id="4" onclick="openGame4()">
      <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="4s0"alt="">
      <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="4s1"alt="">
      <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="4s2"alt="">
      <img src="../../images/Identificar/3estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="4s3"alt="">
    </div>
<script type="text/javascript">
function enviar4(){
  document.location.href = "youngestMap.php?contador4=" + contador4;


}

</script>
<dialog id="dialog4" style="width:90%;height:90%;top:3%;z-index:1;"value="0">
      <p value="-1" id="score2" style="display:none;">hey</p>
      <iframe src="../../puzzles/carrotPuzzle.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame4"></iframe>

  <script type="text/javascript">
  <?php
extract($_GET);
$sql7234 = "SELECT score from score where id_player = $idplayer and id_level = 14";
$result7234 = $conn->query($sql7234);
$total7234 = $result7234->fetchColumn();
   ?>
  var contador4 = 0;
  function boton1111() {
    document.getElementById('frame4').src = "../../puzzles/pruebaIdentificar.php";
    var x = document.getElementById('frame4').contentWindow.document.getElementById('valor').value
      document.getElementById('boton1111').style.display = "none";
      document.getElementById('boton2111').style.display = "inline-block";
    if (x == 4) {
      document.getElementById('boton1111').style.display = "none";
      document.getElementById('boton2111').style.display = "inline-block";
      contador4 = contador4 + 1;
      window.alert(contador4);
    }
  }

  function boton2111() {
    var y = document.getElementById('frame4').contentWindow.document.getElementById('fondoCorrect').style.opacity
    if (y == 1) {
      document.getElementById('frame4').src = "../../puzzles/cowPuzzle.php";
      document.getElementById('boton2111').style.display = "none";
      document.getElementById('boton3111').style.display = "inline-block";
      contador4 = contador4 + 1;
      window.alert(contador4);
    }
    document.getElementById('frame4').src = "../../puzzles/cowPuzzle.php";
    document.getElementById('boton2111').style.display = "none";
    document.getElementById('boton3111').style.display = "inline-block";
  }

  function boton3111(){


    var z = document.getElementById('frame4').contentWindow.document.getElementById('valor').value



      <?php
      if ($contador4 == 1) {
        $sql13 = "UPDATE score SET score = $contador4 WHERE id_player = $idplayer AND id_level = 14";
        $stmt13 = $conn->prepare($sql13);
        if ($total7234<2) {
          $stmt13->execute();
        }

        var_dump($sql13);
      }
       ?>

      <?php
      if ($contador4 == 2) {
        $sql14 = "UPDATE score SET score = $contador4 WHERE id_player = $idplayer AND id_level = 14";
        $stmt14 = $conn->prepare($sql14);
        if ($total7234<3) {
            $stmt14->execute();
        }

      }
       ?>


      <?php
      if ($contador4 == 3){
        $sql15 = "UPDATE score SET score = $contador4 WHERE id_player = $idplayer AND id_level = 14";
        $stmt15 = $conn->prepare($sql15);
        $stmt15->execute();
      }
       ?>


    if (z == 4) {

      document.getElementById('boton2111').style.display = "none";
      document.getElementById('boton3111').style.display = "inline-block";
      contador4 = contador4 + 1;

      closeDialog();


    }

enviar4();
    closeDialog();
  }


  </script>

  <button type="button" name="button" onclick="boton1111()" id="boton1111" class="botonN"style="display:inline-block;">Siguiente</button>
  <button type="button" name="button" onclick="boton2111()" id="boton2111" class="botonN"style="display:none;">Siguiente</button>
  <button type="button" name="button" onclick="boton3111()" id="boton3111" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>

  <button type="button" name="button" onclick="closeDialog()"style="display:inline-block;position:absolute;top:0;left:0;margin:5px;">Cerrar</button>
  <img src="../../images/Cerrar.png" style="display:inline-block;position:absolute;top:0;left:0;margin:5px;" onclick="closeDialog()"alt="">

</dialog>
    <script type="text/javascript">
      function openGame(){
        dialog.show();
      }
      function openGame2(){
        dialog2.show();
      }
      function openGame3(){
        dialog3.show();
      }
      function openGame4(){
        dialog4.show();
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
      echo $total7;
    echo "<script> document.getElementById('image').style.left = '50px'";
    echo "</script>";
    echo " <script> document.getElementById('image').style.bottom = '120px'";
    echo "</script>";
    $sql20 = "UPDATE player_data_map SET player_character_position = 2 WHERE id_player = $idplayer AND id_map = 1";
    $stmt20 = $conn->prepare($sql20);
    if ($total7>0) {
      $stmt20->execute();
      if ($stmt20->execute()) {
        $sql21 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 12";
        $result21 = $conn->query($sql21);
        $total21 = $result21->fetchColumn();

        $sql22 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 12, 0)";
        $stmt22 = $conn->prepare($sql22);
        if ($total21 == $PHPvariable0) {
          $stmt22->execute();
        }else if ($total4!=$PHPvariable0){

        }

        $sql72 = "SELECT score from score where id_player = $idplayer and id_level = 12";
        $result72 = $conn->query($sql72);
        $total72 = $result72->fetchColumn();
        echo $total72;
        if ($total72 == 0) {

        echo "<script> document.getElementById('2s0').style.display = 'inline-block' </script>";

        }
        else if($total72 == 1){

          echo "<script> document.getElementById('2s1').style.display = 'inline-block' </script>";
        }
        else if ($total72 == 2){

          echo "<script> document.getElementById('2s2').style.display = 'inline-block' </script>";
        }
        else if ($total72 == 3){

          echo "<script> document.getElementById('2s3').style.display = 'inline-block' </script>";
        }

      }
    }

    var_dump($sql20);

    }

    if ($total72 > 0) {
      echo $total72;
    echo "<script> document.getElementById('image').style.left = '665px'";
    echo "</script>";
    echo " <script> document.getElementById('image').style.bottom = '340px'";
    echo "</script>";
    $sql201 = "UPDATE player_data_map SET player_character_position = 3 WHERE id_player = $idplayer AND id_map = 1";
    $stmt201 = $conn->prepare($sql201);
    if ($total72>0) {
      $stmt201->execute();
      if ($stmt201->execute()) {
        $sql212 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 13";
        $result212 = $conn->query($sql212);
        $total212 = $result212->fetchColumn();

        $sql222 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 13, 0)";
        $stmt222 = $conn->prepare($sql222);
        if ($total212 == $PHPvariable0) {
          $stmt222->execute();
        }else if ($total4!=$PHPvariable0){

        }

        $sql721 = "SELECT score from score where id_player = $idplayer and id_level = 13";
        $result721 = $conn->query($sql721);
        $total721 = $result721->fetchColumn();
        echo $total721;
        if ($total721 == 0) {

        echo "<script> document.getElementById('3s0').style.display = 'inline-block' </script>";

        }
        else if($total721 == 1){

          echo "<script> document.getElementById('3s1').style.display = 'inline-block' </script>";
        }
        else if ($total721 == 2){

          echo "<script> document.getElementById('3s2').style.display = 'inline-block' </script>";
        }
        else if ($total721 == 3){

          echo "<script> document.getElementById('3s3').style.display = 'inline-block' </script>";
        }

      }
    }
  }

  if ($total721 > 0) {

  echo "<script> document.getElementById('image').style.left = '85.5%'";
  echo "</script>";
  echo " <script> document.getElementById('image').style.bottom = '452px'";
  echo "</script>";
  echo "<script> document.getElementById('image').style.right = '69px'";
  echo "</script>";
  $sql2011 = "UPDATE player_data_map SET player_character_position = 4 WHERE id_player = $idplayer AND id_map = 1";
  $stmt2011 = $conn->prepare($sql2011);
  if ($total721>0) {
    $stmt2011->execute();
    if ($stmt2011->execute()) {
      $sql2121 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 14";
      $result2121 = $conn->query($sql2121);
      $total2121 = $result2121->fetchColumn();

      $sql2221 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 14, 0)";
      $stmt2221 = $conn->prepare($sql2221);
      if ($total2121 == $PHPvariable0) {
        $stmt2221->execute();
      }else if ($total4!=$PHPvariable0){

      }

      $sql7211 = "SELECT score from score where id_player = $idplayer and id_level = 14";
      $result7211 = $conn->query($sql7211);
      $total7211 = $result7211->fetchColumn();
      echo $total7211;
      if ($total7211 == 0) {

      echo "<script> document.getElementById('4s0').style.display = 'inline-block' </script>";

      }
      else if($total7211 == 1){

        echo "<script> document.getElementById('4s1').style.display = 'inline-block' </script>";
      }
      else if ($total7211 == 2){

        echo "<script> document.getElementById('4s2').style.display = 'inline-block' </script>";
      }
      else if ($total7211 == 3){

        echo "<script> document.getElementById('4s3').style.display = 'inline-block' </script>";
      }

    }
  }
}
     ?>
  </body>
</html>
