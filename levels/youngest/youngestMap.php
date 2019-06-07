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
      <link rel="shortcut icon" type="image/png" href="../../images/LogoApp.ico"/>
   </head>
   <body style="background-color:lightgreen;overflow-y:initial;margin:0%;padding:0%;z-index:5;"id="body1">
      <a href="../../logout.php">
      <img src="../../images/logout.png" class="logout" alt=""></a>
      <img src="../../Granja/GranjaFull2.png" style="width:100%;height:100%;position:absolute;">
      <a href="../../pasarelaCero.php" class="volver"><button type="button" name="buttonR" id="back" style="margin-right:5%;">VOLVER</button></a>
      <div class="primer" onclick="openGame()" id="unoM">
         <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s0"alt="">
         <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s1"alt="">
         <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;" id="1s2"alt="">
         <img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s3"alt="">
         <script type="text/javascript">
            function enviar(){
              document.location.href = "youngestMap.php?contador=" + contador + "&positionMap=1";
              closeDialog();
            }
         </script>
         <?php
            extract($_GET);
            $PHPvariable ="0";
            $PHPvariable0 = "0";

            $sqlCheckUserInBBDD = "SELECT COUNT(id_player) FROM player_data_map WHERE id_player = $idplayer";
            $result = $conn->query($sqlCheckUserInBBDD);
            $total = $result->fetchColumn();

            $sql = "INSERT INTO player_data_map (id_map, id_player, player_character_position, enable) VALUES (1, $idplayer, 1, 0)";
            $stmt = $conn->prepare($sql);
            if ($total == 0) {
              $stmt->execute();
            }



            ?>
      </div>
      <dialog id="dialog" style="width:90%;height:90%;top:3%;z-index:2;"value="0">
         <p value="-1" id="score2" style="display:none;">hey</p>
         <iframe src="../../puzzles/pruebaIdentificar.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame1"></iframe>
         <script type="text/javascript">
            <?php
               extract($_GET);
               $sqlSelectScoreUserLevel1Map1 = "SELECT score from score where id_player = $idplayer and id_level = 11";
               $resultSelectScoreUserLevel1Map1 = $conn->query($sqlSelectScoreUserLevel1Map1);
               $totalSelectScoreUserLevel1Map1 = $resultSelectScoreUserLevel1Map1->fetchColumn();
                  ?>
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
                   document.getElementById('boton').style.display = "none";
                   setTimeout("document.getElementById('boton2').style.display = 'inline-block'", 3500);

                 }
                 } function boton1() {
                 document.getElementById('frame1').src = "../../puzzles/cowPuzzle.php";
                 document.getElementById('boton').style.display = "none";
                 document.getElementById('boton2').style.display = "inline-block";
               }
               var rC = setInterval('reloadCow()',1000);
               function reloadCow(){
                 var x = document.getElementById('frame1').contentWindow.document.getElementById('valor').value
                 if (x == 4 && cow==0) {
                   cow = 1;
                   contador = contador + 1;
                   setTimeout("  document.getElementById('frame1').src = '../../puzzles/identifcarMano.php'", 3500);
                   document.getElementById('boton2').style.display = "none";
                   setTimeout("document.getElementById('boton3').style.display = 'inline-block'", 3500);
                 }
               }
               function boton2() {

                 document.getElementById('frame1').src = "../../puzzles/identifcarMano.php";
                   document.getElementById('boton2').style.display = "none";
                   document.getElementById('boton3').style.display = "inline-block";

               }


               var rH = setInterval('reloadHand()',4000);
               function reloadHand(){
                 var z = document.getElementById('frame1').contentWindow.document.getElementById('fondoCorrect2').style.opacity
                 if (z == 1 && hand == 0) {
                   hand = 1;
                   contador = contador + 1;
                   setTimeout('enviar()', 4000);

                 }
               }

                   <?php
               $sqlUpdateScoreMap1Level1 = "UPDATE score SET score = $contador WHERE id_player = $idplayer AND id_level = 11";
               $stmtUpdateScoreMap1Level1 = $conn->prepare($sqlUpdateScoreMap1Level1);
               if ($totalSelectScoreUserLevel1Map1<$contador) {
                 $sqlUpdatePointsMap1Level1 = "UPDATE score SET points = 300 WHERE id_player = $idplayer AND id_level = 11";
                 $stmtUpdatePointsMap1Level1 = $conn->prepare($sqlUpdatePointsMap1Level1);
                 $stmtUpdatePointsMap1Level1 -> execute();
                 $stmtUpdateScoreMap1Level1->execute();
               }
               ?>

                  function boton3(){
               enviar();
               }


         </script>
         <button type="button" name="button" onclick="boton1()" id="boton" class="botonN"style="display:inline-block;">Siguiente</button>
         <button type="button" name="button" onclick="boton2()" id="boton2" class="botonN"style="display:none;">Siguiente</button>
         <button type="button" name="button" onclick="boton3()" id="boton3" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>
      </dialog>
      <div class="segundo" id="2" onclick="openGame2()">
         <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="2s0"alt="">
         <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="2s1"alt="">
         <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="2s2"alt="">
         <img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="2s3"alt="">
      </div>
      <script type="text/javascript">
         function enviar2(){
           document.location.href = "youngestMap.php?contador2=" + contador2 + "&positionMap=2";
           closeDialog();
         }
      </script>
      <dialog id="dialog2" style="width:90%;height:90%;top:3%;z-index:2;"value="0">
         <p value="-1" id="score2" style="display:none;">hey</p>
         <iframe src="../../puzzles/applePuzzle.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame2"></iframe>
         <script type="text/javascript">
            <?php
               extract($_GET);
               $sqlSelectScoreUserLevel2Map1 = "SELECT score from score where id_player = $idplayer and id_level = 12";
               $resultSelectScoreUserLevel2Map1 = $conn->query($sqlSelectScoreUserLevel2Map1);
               $totalSelectScoreUserLevel2Map1 = $resultSelectScoreUserLevel2Map1->fetchColumn();
                      ?>
            var contador2 = 0;
            var apple = 0;
            var pig = 0;
            var three = 0;
            var ra = setInterval('reloadApple()',1000);
            function reloadApple(){
              var x = document.getElementById('frame2').contentWindow.document.getElementById('valor').value
              if (x == 4 && apple ==0) {
              apple = 1;
              contador2 = contador2 + 1;
              setTimeout("  document.getElementById('frame2').src = '../../puzzles/pruebaIdentificarPig.php'", 3500);
                document.getElementById('boton11').style.display = "none";
              setTimeout("document.getElementById('boton21').style.display = 'inline-block'", 3500);
            }
            }
            function boton11() {
              document.getElementById('frame2').src = "../../puzzles/pruebaIdentificarPig.php";
                document.getElementById('boton11').style.display = "none";
                document.getElementById('boton21').style.display = "inline-block";

            }

            var rp = setInterval('reloadPig()',1000);
            function reloadPig(){
            var y = document.getElementById('frame2').contentWindow.document.getElementById('fondoCorrect').style.opacity
            if (y == 1 && pig == 0) {
            pig = 1;
            contador2 = contador2 +1;
            setTimeout("document.getElementById('frame2').src = '../../puzzles/threePuzzle.php'",3500);
            document.getElementById('boton21').style.display = "none";
            setTimeout("document.getElementById('boton31').style.display = 'inline-block'", 3500);
            }
            }
            function boton21() {
              document.getElementById('frame2').src = "../../puzzles/threePuzzle.php";
              document.getElementById('boton21').style.display = "none";
              document.getElementById('boton31').style.display = "inline-block";
            }
            var rt = setInterval('reloadThree()', 4000);
            function reloadThree(){
            var z = document.getElementById('frame2').contentWindow.document.getElementById('valor2').value
            if (z == 4 && three == 0) {
            three = 1;
            contador2 = contador2 + 1;
            setTimeout('enviar2()', 4000);
            }
            }
                <?php
               $sqlUpdateScoreMap1Level2 = "UPDATE score SET score = $contador2 WHERE id_player = $idplayer AND id_level = 12";
               $stmtUpdateScoreMap1Level2 = $conn->prepare($sqlUpdateScoreMap1Level2);
               if ($totalSelectScoreUserLevel2Map1<$contador2) {
                 $sqlUpdatePointsMap1Level2 = "UPDATE score SET points = 300 WHERE id_player = $idplayer AND id_level = 12";
                 $stmtUpdatePointsMap1Level2 = $conn->prepare($sqlUpdatePointsMap1Level2);
                 $stmtUpdatePointsMap1Level2 -> execute();
                 $stmtUpdateScoreMap1Level2->execute();
               }
               ?>
            function boton31(){
            enviar2();
            }


         </script>
         <button type="button" name="button" onclick="boton11()" id="boton11" class="botonN"style="display:inline-block;">Siguiente</button>
         <button type="button" name="button" onclick="boton21()" id="boton21" class="botonN"style="display:none;">Siguiente</button>
         <button type="button" name="button" onclick="boton31()" id="boton31" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>
      </dialog>
      <div class="tercero" id="3" onclick="openGame3()">
         <img src="../../images/Identificar/-0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="3s0"alt="">
         <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="3s1"alt="">
         <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="3s2"alt="">
         <img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="3s3"alt="">
      </div>
      <script type="text/javascript">
         function enviar3(){
           document.location.href = "youngestMap.php?contador3=" + contador3 + "&positionMap=3";
           closeDialog();

         }
      </script>
      <dialog id="dialog3" style="width:90%;height:90%;top:3%;z-index:2;"value="0">
         <p value="-1" id="score2" style="display:none;">hey</p>
         <iframe src="../../puzzles/pruebaIdentificarArbol.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame3"></iframe>
         <script type="text/javascript">
            <?php
               extract($_GET);
               $sqlSelectScoreUserLevel3Map1 = "SELECT score from score where id_player = $idplayer and id_level = 13";
               $resultSelectScoreUserLevel3Map1 = $conn->query($sqlSelectScoreUserLevel3Map1);
               $totalSelectScoreUserLevel3Map1 = $resultSelectScoreUserLevel3Map1->fetchColumn();
                      ?>
            var contador3 = 0;
            var tree = 0;
            var horse = 0;
            var head = 0;
            var rtr = setInterval('reloadTree()', 1000);
            function reloadTree(){
              var x = document.getElementById('frame3').contentWindow.document.getElementById('fondoCorrect').style.opacity
              if (x == 1 && tree == 0) {
                tree = 1;
                contador3 = contador3 + 1;
                setTimeout("document.getElementById('frame3').src = '../../puzzles/horsePuzzle.php'",3500);
                document.getElementById('boton111').style.display = "none";
                setTimeout("document.getElementById('boton211').style.display = 'inline-block'", 3500);
              }
            }
            function boton111() {
              document.getElementById('frame3').src = "../../puzzles/horsePuzzle.php";
                document.getElementById('boton111').style.display = "none";
                document.getElementById('boton211').style.display = 'inline-block';
            }
            var rh = setInterval('reloadHorse()', 1000);
            function reloadHorse(){
            var y = document.getElementById('frame3').contentWindow.document.getElementById('valor').value
            if (y == 4 && horse == 0) {
            horse = 1;
            contador3 = contador3 + 1;
            setTimeout("document.getElementById('frame3').src = '../../puzzles/identifcarCabeza.php'",3500);
            document.getElementById('boton211').style.display = "none";
            setTimeout("document.getElementById('boton311').style.display = 'inline-block'", 3500);
            }
            }
            function boton211() {
              document.getElementById('frame3').src = "../../puzzles/identifcarCabeza.php";
              document.getElementById('boton211').style.display = "none";
              document.getElementById('boton311').style.display = "inline-block";
            }

            var rc = setInterval('reloadHead()', 4000);
            function reloadHead(){
            var z = document.getElementById('frame3').contentWindow.document.getElementById('fondoCorrect2').style.opacity
            if (z == 1 && head == 0) {
            head = 1;
            contador3 = contador3 + 1;
            setTimeout('enviar3()', 4000);
            }
            }

                <?php
               $sqlUpdateScoreMap1Level3 = "UPDATE score SET score = $contador3 WHERE id_player = $idplayer AND id_level = 13";
               $sqlUpdateScoreMap1Level3 = $conn->prepare($sqlUpdateScoreMap1Level3);
               if ($totalSelectScoreUserLevel3Map1<$contador3) {
                 $sqlUpdatePointsMap1Level3 = "UPDATE score SET points = 300 WHERE id_player = $idplayer AND id_level = 13";
                 $stmtUpdatePointsMap1Level3 = $conn->prepare($sqlUpdatePointsMap1Level3);
                 $stmtUpdatePointsMap1Level3 -> execute();
                 $sqlUpdateScoreMap1Level3->execute();
               }
               ?>
            function boton311(){
            enviar3();
            }


         </script>
         <button type="button" name="button" onclick="boton111()" id="boton111" class="botonN"style="display:inline-block;">Siguiente</button>
         <button type="button" name="button" onclick="boton211()" id="boton211" class="botonN"style="display:none;">Siguiente</button>
         <button type="button" name="button" onclick="boton311()" id="boton311" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>
      </dialog>
      <div class="cuarto" id="4" onclick="openGame4()">
         <img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="4s0"alt="">
         <img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="4s1"alt="">
         <img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="4s2"alt="">
         <img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="4s3"alt="">
      </div>
      <script type="text/javascript">
         function enviar4(){
           document.location.href = "youngestMap.php?contador4=" + contador4 + "&positionMap=4";
           closeDialog();

         }

      </script>
      <dialog id="dialog4" style="width:90%;height:90%;top:3%;z-index:2;"value="0">
         <p value="-1" id="score2" style="display:none;">hey</p>
         <iframe src="../../puzzles/carrotPuzzle.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame4"></iframe>
         <script type="text/javascript">
            <?php
               extract($_GET);
               $sqlSelectScoreUserLevel4Map1 = "SELECT score from score where id_player = $idplayer and id_level = 14";
               $resultSelectScoreUserLevel4Map1 = $conn->query($sqlSelectScoreUserLevel4Map1);
               $totalSelectScoreUserLevel4Map1 = $resultSelectScoreUserLevel4Map1->fetchColumn();
                  ?>
            var contador4 = 0;
            var carrot = 0;
            var banana = 0;
            var seven = 0;
            setInterval('reloadCarrot()', 1000);
            function reloadCarrot(){
              var x = document.getElementById('frame4').contentWindow.document.getElementById('valor').value
              if (x == 4 && carrot == 0) {
                carrot = 1;
                contador4 = contador4 + 1;
                setTimeout("document.getElementById('frame4').src = '../../puzzles/pruebaIdentificarBanana.php'",3500);
                document.getElementById('boton1111').style.display = "none";
                setTimeout("document.getElementById('boton2111').style.display = 'inline-block'", 3500);
              }
            }
            function boton1111() {
              document.getElementById('frame4').src = "../../puzzles/pruebaIdentificarBanana.php";

                document.getElementById('boton1111').style.display = "none";
                document.getElementById('boton2111').style.display = "inline-block";

            }

            setInterval('reloadBanana()', 1000);
            function reloadBanana(){
            var y = document.getElementById('frame4').contentWindow.document.getElementById('fondoCorrect').style.opacity
            if (y == 1 && banana == 0) {
            banana = 1;
            contador4 = contador4 + 1;
            setTimeout("document.getElementById('frame4').src = '../../puzzles/sevenPuzzle.php'",3500);
            document.getElementById('boton2111').style.display = "none";
            setTimeout("document.getElementById('boton3111').style.display = 'inline-block'", 3500);
            }
            }
            function boton2111() {
              document.getElementById('frame4').src = "../../puzzles/sevenPuzzle.php";
              document.getElementById('boton2111').style.display = "none";
              document.getElementById('boton3111').style.display = "inline-block";
            }
            setInterval('reloadSeven()', 4000);
            function reloadSeven(){
            var z = document.getElementById('frame4').contentWindow.document.getElementById('valor2').value
            if (z==4 && seven == 0) {
            seven = 1;
            contador4 = contador4 + 1;
            setTimeout('enviar4()', 4000);
            }
            }

                <?php
               $sqlUpdateScoreMap1Level4 = "UPDATE score SET score = $contador4 WHERE id_player = $idplayer AND id_level = 14";
               $stmtUpdateScoreMap1Level4 = $conn->prepare($sqlUpdateScoreMap1Level4);
               if ($totalSelectScoreUserLevel4Map1<$contador4) {
                 $sqlUpdatePointsMap1Level4 = "UPDATE score SET points = 300 WHERE id_player = $idplayer AND id_level = 14";
                 $stmtUpdatePointsMap1Level4 = $conn->prepare($sqlUpdatePointsMap1Level4);
                 $stmtUpdatePointsMap1Level4 -> execute();
                 $stmtUpdateScoreMap1Level4->execute();
               }
               ?>

            function boton3111(){
            enviar4();
            }


         </script>
         <button type="button" name="button" onclick="boton1111()" id="boton1111" class="botonN"style="display:inline-block;">Siguiente</button>
         <button type="button" name="button" onclick="boton2111()" id="boton2111" class="botonN"style="display:none;">Siguiente</button>
         <button type="button" name="button" onclick="boton3111()" id="boton3111" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>
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
         $sqlCountId_PlayerMap1Level1 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 11";
         $resultCountId_PlayerMap1Level1 = $conn->query($sqlCountId_PlayerMap1Level1);
         $totalCountId_PlayerMap1Level1 = $resultCountId_PlayerMap1Level1->fetchColumn();

         $sqlInsertFirstScoreMap1Level1 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 11, 0)";
         $stmtInsertFirstScoreMap1Level1 = $conn->prepare($sqlInsertFirstScoreMap1Level1);
         if ($totalCountId_PlayerMap1Level1 == $PHPvariable0) {
           $stmtInsertFirstScoreMap1Level1->execute();
         }else if ($totalCountId_PlayerMap1Level1!=$PHPvariable0){

         }
         $sqlSelectScoreID_PlayerLevel1Map1 = "SELECT score from score where id_player = $idplayer and id_level = 11";
         $resultSelectScoreID_PlayerLevel1Map1 = $conn->query($sqlSelectScoreID_PlayerLevel1Map1);
         $totalSelectScoreID_PlayerLevel1Map1 = $resultSelectScoreID_PlayerLevel1Map1->fetchColumn();
         //echo $totalSelectScoreID_PlayerLevel1Map1;
         //echo $idplayer;
         if ($totalSelectScoreID_PlayerLevel1Map1) {
         echo "<script> document.getElementById('1s".$totalSelectScoreID_PlayerLevel1Map1."').style.display = 'inline-block' </script>";
         }
            if ($totalSelectScoreID_PlayerLevel1Map1 > 0) {
              // echo $totalSelectScoreID_PlayerLevel1Map1;

              echo "<script> document.getElementById('image').style.left = '50px'";
              echo "</script>";
              echo " <script> document.getElementById('image').style.bottom = '120px'";
              echo "</script>";

              $sqlUpdateMapPosition2Id_Map1 = "UPDATE player_data_map SET player_character_position = 2 WHERE id_player = $idplayer AND id_map = 1";
              $stmtUpdateMapPosition2Id_Map1 = $conn->prepare($sqlUpdateMapPosition2Id_Map1);
              if ($totalSelectScoreID_PlayerLevel1Map1>0) {
              $stmtUpdateMapPosition2Id_Map1->execute();
                if ($stmtUpdateMapPosition2Id_Map1->execute()) {
                  $sqlCountId_PlayerMap1Level2 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 12";
                  $resultCountId_PlayerMap1Level2 = $conn->query($sqlCountId_PlayerMap1Level2);
                  $totalCountId_PlayerMap1Level2 = $resultCountId_PlayerMap1Level2->fetchColumn();

                  $sqlInsertFirstScoreMap1Level2 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 12, 0)";
                  $stmtInsertFirstScoreMap1Level2 = $conn->prepare($sqlInsertFirstScoreMap1Level2);
                    if ($totalCountId_PlayerMap1Level2 == $PHPvariable0) {
                      $stmtInsertFirstScoreMap1Level2->execute();
                    }else if ($totalCountId_PlayerMap1Level2!=$PHPvariable0){

                    }

                $sqlSelectScoreID_PlayerLevel2Map1 = "SELECT score from score where id_player = $idplayer and id_level = 12";
                $resultSelectScoreID_PlayerLevel2Map1 = $conn->query($sqlSelectScoreID_PlayerLevel2Map1);
                $totalSelectScoreID_PlayerLevel2Map1 = $resultSelectScoreID_PlayerLevel2Map1->fetchColumn();
                // echo $totalSelectScoreID_PlayerLevel2Map1;
                echo "<script> document.getElementById('2s".$totalSelectScoreID_PlayerLevel2Map1."').style.display = 'inline-block' </script>";

                }
              }

            }

            if ($totalSelectScoreID_PlayerLevel2Map1 > 0) {
            echo "<script> document.getElementById('image').style.left = '665px'";
            echo "</script>";
            echo " <script> document.getElementById('image').style.bottom = '340px'";
            echo "</script>";
            $sqlUpdateMapPosition3Id_Map1 = "UPDATE player_data_map SET player_character_position = 3 WHERE id_player = $idplayer AND id_map = 1";
            $stmtUpdateMapPosition3Id_Map1 = $conn->prepare($sqlUpdateMapPosition3Id_Map1);
              if ($totalSelectScoreID_PlayerLevel2Map1>0) {
                $stmtUpdateMapPosition3Id_Map1->execute();
                  if ($stmtUpdateMapPosition3Id_Map1->execute()) {
                    $sqlCountId_PlayerMap1Level3 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 13";
                    $resultCountId_PlayerMap1Level3 = $conn->query($sqlCountId_PlayerMap1Level3);
                    $totalCountId_PlayerMap1Level3 = $resultCountId_PlayerMap1Level3->fetchColumn();

                    $sqlInsertFirstScoreMap1Level3 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 13, 0)";
                    $stmtInsertFirstScoreMap1Level3 = $conn->prepare($sqlInsertFirstScoreMap1Level3);
                      if ($totalCountId_PlayerMap1Level3 == $PHPvariable0) {
                        $stmtInsertFirstScoreMap1Level3->execute();
                      }else if ($totalCountId_PlayerMap1Level3!=$PHPvariable0){

                      }

                $sqlSelectScoreID_PlayerLevel3Map1 = "SELECT score from score where id_player = $idplayer and id_level = 13";
                $resultSelectScoreID_PlayerLevel3Map1 = $conn->query($sqlSelectScoreID_PlayerLevel3Map1);
                $totalSelectScoreID_PlayerLevel3Map1 = $resultSelectScoreID_PlayerLevel3Map1->fetchColumn();
                // echo $totalSelectScoreID_PlayerLevel3Map1;
                echo "<script> document.getElementById('3s".$totalSelectScoreID_PlayerLevel3Map1."').style.display = 'inline-block' </script>";

                }
              }
            }

            if ($totalSelectScoreID_PlayerLevel3Map1 > 0) {

              echo "<script> document.getElementById('image').style.left = '85.5%'";
              echo "</script>";
              echo " <script> document.getElementById('image').style.bottom = '452px'";
              echo "</script>";
              echo "<script> document.getElementById('image').style.right = '69px'";
              echo "</script>";
              $sqlUpdateMapPosition4Id_Map1 = "UPDATE player_data_map SET player_character_position = 4 WHERE id_player = $idplayer AND id_map = 1";
              $stmtUpdateMapPosition4Id_Map1 = $conn->prepare($sqlUpdateMapPosition4Id_Map1);
                if ($totalSelectScoreID_PlayerLevel3Map1>0) {
                    $stmtUpdateMapPosition4Id_Map1->execute();
                      if ($stmtUpdateMapPosition4Id_Map1->execute()) {
                        $sqlCountId_PlayerMap1Level4 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 14";
                        $resultCountId_PlayerMap1Level4 = $conn->query($sqlCountId_PlayerMap1Level4);
                        $totalCountId_PlayerMap1Level4 = $resultCountId_PlayerMap1Level4->fetchColumn();

                        $sqlInsertFirstScoreMap1Level4 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 14, 0)";
                        $stmtInsertFirstScoreMap1Level4 = $conn->prepare($sqlInsertFirstScoreMap1Level4);
                          if ($totalCountId_PlayerMap1Level4 == $PHPvariable0) {
                            $stmtInsertFirstScoreMap1Level4->execute();
                          }else if ($totalCountId_PlayerMap1Level4!=$PHPvariable0){

                          }

              $sqlSelectScoreID_PlayerLevel4Map1 = "SELECT score from score where id_player = $idplayer and id_level = 14";
              $resultSelectScoreID_PlayerLevel4Map1 = $conn->query($sqlSelectScoreID_PlayerLevel4Map1);
              $totalSelectScoreID_PlayerLevel4Map1 = $resultSelectScoreID_PlayerLevel4Map1->fetchColumn();
              // echo $total7211;
              echo "<script> document.getElementById('4s".$totalSelectScoreID_PlayerLevel4Map1."').style.display = 'inline-block' </script>";

                }
              }
            }

            if ($totalSelectScoreID_PlayerLevel1Map1 < 1) {
            echo "<script> document.getElementById('2').style.display = 'none' </script>";
                }else {
                  echo "<script> document.getElementById('2').style.display = 'block' </script>";
                }
            if ($totalSelectScoreID_PlayerLevel2Map1 < 1) {
              echo "<script> document.getElementById('3').style.display = 'none' </script>";
                }else {
                  echo "<script> document.getElementById('3').style.display = 'block' </script>";
                }
            if ($totalSelectScoreID_PlayerLevel3Map1 < 1) {
              echo "<script> document.getElementById('4').style.display = 'none' </script>";
                }else {
                  echo "<script> document.getElementById('4').style.display = 'block' </script>";
                }

                  // $sqlSelectPositionID_PlayerMap1 = "SELECT player_character_position from player_data_map where id_player = $idplayer";
                  // $resultSelectPositionID_PlayerMap1 = $conn->query($sqlSelectPositionID_PlayerMap1);
                  // $totalSelectPositionID_PlayerMap1 = $resultSelectPositionID_PlayerMap1->fetchColumn();
                  // echo $totalSelectPositionID_PlayerMap1;


                    if ($positionMap == 1) {
                      $sqlUpdateMapPosition1Id_Map1 = "UPDATE player_data_map SET player_character_position = 1 WHERE id_player = $idplayer AND id_map = 1";
                      $stmtUpdateMapPosition1Id_Map1 = $conn->prepare($sqlUpdateMapPosition1Id_Map1);
                      $stmtUpdateMapPosition1Id_Map1->execute();
                      echo "<script> document.getElementById('image').style.right = '0px'";
                      echo "</script>";
                      echo "<script> document.getElementById('image').style.left = '89%'";
                      echo "</script>";
                      echo " <script> document.getElementById('image').style.bottom = '0px'";
                      echo "</script>";
                    }
                    else if ($positionMap == 2) {
                      $sqlUpdateMapPosition1Id_Map1 = "UPDATE player_data_map SET player_character_position = 2 WHERE id_player = $idplayer AND id_map = 1";
                      $stmtUpdateMapPosition1Id_Map1 = $conn->prepare($sqlUpdateMapPosition1Id_Map1);
                      $stmtUpdateMapPosition1Id_Map1->execute();
                      echo "<script> document.getElementById('image').style.left = '50px'";
                      echo "</script>";
                      echo " <script> document.getElementById('image').style.bottom = '120px'";
                      echo "</script>";
                    }
                    else if ($positionMap == 3) {
                      $sqlUpdateMapPosition1Id_Map1 = "UPDATE player_data_map SET player_character_position = 3 WHERE id_player = $idplayer AND id_map = 1";
                      $stmtUpdateMapPosition1Id_Map1 = $conn->prepare($sqlUpdateMapPosition1Id_Map1);
                      $stmtUpdateMapPosition1Id_Map1->execute();
                      echo "<script> document.getElementById('image').style.left = '665px'";
                      echo "</script>";
                      echo " <script> document.getElementById('image').style.bottom = '340px'";
                      echo "</script>";
                    }
                    else if ($positionMap == 4) {
                      $sqlUpdateMapPosition1Id_Map1 = "UPDATE player_data_map SET player_character_position = 4 WHERE id_player = $idplayer AND id_map = 1";
                      $stmtUpdateMapPosition1Id_Map1 = $conn->prepare($sqlUpdateMapPosition1Id_Map1);
                      $stmtUpdateMapPosition1Id_Map1->execute();
                      echo "<script> document.getElementById('image').style.left = '85.5%'";
                      echo "</script>";
                      echo " <script> document.getElementById('image').style.bottom = '452px'";
                      echo "</script>";
                      echo "<script> document.getElementById('image').style.right = '69px'";
                      echo "</script>";
                    }


             ?>
   </body>
</html>
