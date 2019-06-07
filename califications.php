<?php
require 'database.php';
session_start();
$idplayer = $_GET['id'];
echo $idplayer;

$sql4 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 11";
$result4 = $conn->query($sql4);
$total4 = $result4->fetchColumn();

$sql5 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 12";
$result5 = $conn->query($sql5);
$total5 = $result5->fetchColumn();

$sql6 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 13";
$result6 = $conn->query($sql6);
$total6 = $result6->fetchColumn();

$sql7 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 14";
$result7 = $conn->query($sql7);
$total7 = $result7->fetchColumn();


echo "<p id='total4' style='display:none;'>$total4";
echo "</p>";

echo "<p id='total5' style='display:none;'>$total5";
echo "</p>";

echo "<p id='total6' style='display:none;'>$total6";
echo "</p>";

echo "<p id='total7' style='display:none;'>$total7";
echo "</p>";

 ?>

<style media="screen">
  p{
    font-family: sans-serif;
  }
  .buttonStyle {
    font-family: sans-serif;
    padding: 15px;
    position: absolute;
    left: 42%;
    /* margin-bottom: 15%; */
    width: 200px;
    font-size: 20px;
    color: black;
    background-color: #b9e65d;
    border: 1px solid black;
  }
</style>
 <!DOCTYPE html>
 <html>
<link rel="shortcut icon" type="image/png" href="images/LogoApp.ico"/>
 <body onload="show()" style="background-color:#f5bc51">
   <div style="text-align:center;">
<h1 style="text-align:center;font-family:sans-serif;">CAIFICACIONES</h1>
 <div class="w3-container">

 <p>Nivel 1</p>

 <div class="w3-light-grey" style="background-color:#eaeaea ;width:70%;left:15%;position:absolute;">
   <div id="myBar" class="w3-container w3-green" style="height:24px;width:0%;background-color:#b9e65d;"></div>
   </div>
   <br>

   <p id="demo">0%</p>
 </div>
 <br>

 <script>
 function move() {
   var elem = document.getElementById("myBar");
   var elem2 = document.getElementById("total4").innerHTML;
   var resultInner= 0;
   //window.alert(elem2);

   if (elem2 == 1) {
     resultInner = 33;
     document.getElementById("demo").innerHTML = resultInner * 1  + '%';
   }
   else if(elem2 == 2){
     resultInner = 66;
     document.getElementById("demo").innerHTML = resultInner * 1  + '%';
   }
   else if(elem2 == 3){
     resultInner = 100;
     document.getElementById("demo").innerHTML = resultInner * 1  + '%';
   }
   else if(elem2 == 0){
     resultInner = 0;
     document.getElementById("demo").innerHTML = resultInner * 1  + '%';
   }

   var width = 0;
   var id = setInterval(frame, 10);
   function frame() {
     if (width >= 100) {
       clearInterval(id);
     } else {
       width++;
       elem.style.width = resultInner + '%';
       document.getElementById("demo").innerHTML = resultInner * 1  + '%';
     }
   }
 }
 </script>
<div class="w3-container">
 <p>Nivel 2</p>

 <div class="w3-light-grey" style="background-color:#eaeaea ;width:70%;left:15%;position:absolute;">
   <div id="myBar3" class="w3-container w3-green" style="height:24px;width:0%;background-color:#b9e65d;"></div>
   </div>
   <br>

   <p id="demo3">0%</p>
   <br>
 </div>

 <script>
 function move2() {
   var elem4 = document.getElementById("myBar3");
   var elem3 = document.getElementById("total5").innerHTML;
   var resultInner3= 0;
   //window.alert(elem2);

   if (elem3 == 1) {
     resultInner3 = 33;
     document.getElementById("demo3").innerHTML = resultInner3 * 1  + '%';

   }
   else if(elem3 == 2){
     resultInner3 = 66;
     document.getElementById("demo3").innerHTML = resultInner3 * 1  + '%';
   }
   else if(elem3 == 3){
     resultInner3 = 100;
     document.getElementById("demo3").innerHTML = resultInner3 * 1  + '%';
   }
   else if(elem3 == 0){
     resultInner3 = 0;
     document.getElementById("demo3").innerHTML = resultInner3 * 1  + '%';
   }


   var width = 0;
   var id = setInterval(frame, 10);
   function frame() {
     if (width >= 100) {
       clearInterval(id);
     } else {
       width++;
       elem4.style.width = resultInner3 + '%';
       document.getElementById("demo3").innerHTML = resultInner3 * 1  + '%';
       move();
     }
   }
 }
 </script>
 <div class="w3-container">
 <p>Nivel 3</p>

 <div class="w3-light-grey" style="background-color:#eaeaea ;width:70%;left:15%;position:absolute;">
   <div id="myBar4" class="w3-container w3-green" style="height:24px;width:0%;background-color:#b9e65d;"></div>
   </div>
   <br>

   <p id="demo4">0%</p>
   <br>
 </div>

 <script>
 function move3() {
   var elem5 = document.getElementById("myBar4");
   var elem4 = document.getElementById("total6").innerHTML;
   var resultInner4= 0;
   //window.alert(elem2);

   if (elem4 == 1) {
     resultInner4 = 33;
     document.getElementById("demo4").innerHTML = resultInner4 * 1  + '%';

   }
   else if(elem4 == 2){
     resultInner4 = 66;
     document.getElementById("demo4").innerHTML = resultInner4 * 1  + '%';
   }
   else if(elem4 == 3){
     resultInner4 = 100;
     document.getElementById("demo4").innerHTML = resultInner4 * 1  + '%';
   }
   else if(elem4 == 0){
     resultInner4 = 0;
     document.getElementById("demo4").innerHTML = resultInner4 * 1  + '%';
   }


   var width = 0;
   var id = setInterval(frame, 10);
   function frame() {
     if (width >= 100) {
       clearInterval(id);
     } else {
       width++;
       elem5.style.width = resultInner4 + '%';
       document.getElementById("demo4").innerHTML = resultInner4 * 1  + '%';
       move();
     }
   }
 }
 </script>
 <div class="w3-container">
 <p>Nivel 4</p>

 <div class="w3-light-grey" style="background-color:#eaeaea ;width:70%;left:15%;position:absolute;">
   <div id="myBar5" class="w3-container w3-green" style="height:24px;width:0%;background-color:#b9e65d;"></div>
   </div>
   <br>

   <p id="demo5">0%</p>
   <br>
 </div>

 <script>
 function move4() {
   var elem6 = document.getElementById("myBar5");
   var elem5 = document.getElementById("total7").innerHTML;
   var resultInner5= 0;
   //window.alert(elem2);

   if (elem5 == 1) {
     resultInner5 = 33;
     document.getElementById("demo5").innerHTML = resultInner5 * 1  + '%';

   }
   else if(elem5 == 2){
     resultInner5 = 66;
     document.getElementById("demo5").innerHTML = resultInner5 * 1  + '%';
   }
   else if(elem5 == 3){
     resultInner5 = 100;
     document.getElementById("demo5").innerHTML = resultInner5 * 1  + '%';
   }
   else if(elem5 == 0){
     resultInner5 = 0;
     document.getElementById("demo5").innerHTML = resultInner5 * 1  + '%';
   }


   var width = 0;
   var id = setInterval(frame, 10);
   function frame() {
     if (width >= 100) {
       clearInterval(id);
     } else {
       width++;
       elem6.style.width = resultInner5 + '%';
       document.getElementById("demo5").innerHTML = resultInner5 * 1  + '%';
       move();
     }
   }
 }
 </script>
 <script type="text/javascript">
 function show(){
   move();
   move2();
   move3();
   move4();
 }
 </script>

</div>
<a onclick="javascript:history.back(1)" class="buttonStyle" style="text-align:center;text-decoration:none;">VOLVER</a>
 </body>
 </html>
