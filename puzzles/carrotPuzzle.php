<?php
require '../database.php';
$records = $conn->prepare('SELECT jsondata FROM `games` WHERE id_game = 141');
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
// var_dump($results);
//print json_encode($results);
$jsonP=null;
$jsonP=$results;
 ?>

 <!DOCTYPE html>
 <html lang="en" >
 <head>
   <meta charset="UTF-8">
   <title>Cow puzzle</title>
       <link rel="stylesheet" href="style.css">
 </head>
 <body>
   <!-- <div class="res" width="547" height="523" id="entorno" style="display:none;border:0px solid black;"> -->

   <svg width="95%" height="600" id="entorno">
    <g id="fondo" style="border:1px solid black"><image xlink:href="../images/Puzzle/Carrot/fondocarrot.png" width="350" height="334" x="500" y="17" style="border:1px solid black" viewBox="0 0 100 100"></g>
  <g class="padre" id="0"><image xlink:href="" class="movil" id="demo11" x="738" y="325"></g>
  <g class="padre" id="1"><image xlink:href="" class="movil" id="demo12" x="1027" y="311"></g>
  <g class="padre" id="2"><image xlink:href="" class="movil" id="demo21" x="94" y="255"></g>
  <g class="padre" id="3"><image xlink:href="" class="movil" id="demo22" x="383" y="327"></g>
 </svg>
<p style="display:none;" id="valor"></p>
 <!-- </div> -->

 <div id="float">
   <h1 class="center">ZANAHORIA</h1>
   <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;left:100px;"alt="">
   <img src="../../../images/emoticones-de-pollo-aplaudiendo.gif" style="position:absolute;right:100px;"alt="">
 </div>

 <div id="noClick"></div>
 <audio id="win" src="https://raw.githubusercontent.com/IdiomaKids/Idiomakidsapp/rescate/audios/clap2.mp3"></audio>
  <audio id="carrot" src="https://raw.githubusercontent.com/IdiomaKids/Idiomakidsapp/rescate/audios/zanahoroa.mp3"></audio>
 </body>

 </html>

 <script>
 var myObj, myJSON, text, obj;

 myObj =
  <?= $jsonP['jsondata']; ?>

 myJSON = JSON.stringify(myObj);
 localStorage.setItem("testJSON", myJSON);

 // Retrieving data:
 text = localStorage.getItem("testJSON");
 obj = JSON.parse(text);
 var url1 = '../images/Puzzle/Carrot/carrot1.png';
 var url2 = '../images/Puzzle/Carrot/carrot2.png';
 var url3 = '../images/Puzzle/Carrot/carrot3.png';
 var url4 = '../images/Puzzle/Carrot/carrot4.png';

 if (obj.position11 == "carrot11.png") {
 document.getElementById('demo11').setAttributeNS('', 'href', url1);

} if (obj.position12 == "carrot12.png"){
 document.getElementById('demo12').setAttributeNS('', 'href', url2);
 }

 if (obj.position21 == "carrot21.png") {
 document.getElementById('demo21').setAttributeNS('', 'href', url3);

} if (obj.position22 == "carrot22.png"){
 document.getElementById('demo22').setAttributeNS('', 'href', url4);
 }



 var piezas = document.getElementsByClassName('movil');

 var tamWidh = [236.5,180,180,239.1];
 var tamHeight = [262,350,355,270];

 for(var i=0;i<piezas.length;i++){
 	piezas[i].setAttribute("width", tamWidh[i]);
 	piezas[i].setAttribute("height",tamHeight[i]);
 	piezas[i].setAttribute("onmousedown","seleccionarElemento(evt)");
  piezas[i].setAttribute("cursor", "grab");
 }

 var elementSelect = 0;
 var currentX = 0;
 var currentY = 0;
 var currentPosX = 0;
 var currentPosY = 0;

 function seleccionarElemento(evt) {
 	elementSelect = reordenar(evt);
 	currentX = evt.clientX;
 	currentY = evt.clientY;
 	currentPosx = parseFloat(elementSelect.getAttribute("x"));
 	currentPosy = parseFloat(elementSelect.getAttribute("y"));
 	elementSelect.setAttribute("onmousemove","moverElemento(evt)");
 }

 function moverElemento(evt){
 	var dx = evt.clientX - currentX;
 	var dy = evt.clientY - currentY;
 	currentPosx = currentPosx + dx;
 	currentPosy = currentPosy + dy;
 	elementSelect.setAttribute("x",currentPosx);
 	elementSelect.setAttribute("y",currentPosy);
 	currentX = evt.clientX;
 	currentY = evt.clientY;
 	elementSelect.setAttribute("onmouseout","deseleccionarElemento(evt)");
 	elementSelect.setAttribute("onmouseup","deseleccionarElemento(evt)");
 	iman();
 }

 function deseleccionarElemento(evt){
 	testing();
 	if(elementSelect != 0){
 		elementSelect.removeAttribute("onmousemove");
 		elementSelect.removeAttribute("onmouseout");
 		elementSelect.removeAttribute("onmouseup");
 		elementSelect = 0;
 	}
 }

 var entorno = document.getElementById('entorno');

 function reordenar(evt){
 	var padre = evt.target.parentNode;
 	var clone = padre.cloneNode(true);
 	var id = padre.getAttribute("id");
 	entorno.removeChild(document.getElementById(id));
 	entorno.appendChild(clone);
 	return entorno.lastChild.firstChild;
 }

 var origX = [499,671,499,612];
 var origY = [-30,-45.7,60,130];

 function iman(){
 	for(var i=0;i<piezas.length;i++){
 		if (Math.abs(currentPosx-origX[i])<15 && Math.abs(currentPosy-origY[i])<15) {
 			var count = 0;
 			elementSelect.setAttribute("x",origX[i]);
 			elementSelect.setAttribute("y",origY[i]);
 		}
 	}
 }

 var win = document.getElementById("win");

 function testing() {
 	var bien_ubicada = 0;
 	var padres = document.getElementsByClassName('padre');
 	for(var i=0;i<piezas.length;i++){
 		var posx = parseFloat(padres[i].firstChild.getAttribute("x"));
 		var posy = parseFloat(padres[i].firstChild.getAttribute("y"));

 		ide = padres[i].getAttribute("id");
 		if(origX[ide] == posx && origY[ide] == posy){
   			// padres[i].firstChild.removeAttribute("onmousedown");
   			// padres[i].firstChild.removeAttribute("onmousemove");
 			bien_ubicada = bien_ubicada + 1;
       console.log(bien_ubicada);
 		}
 	}
 	if(bien_ubicada == 4){
    var bien = document.getElementById('valor').value = '4';
    //window.alert(bien);
    carrot.play();
 		setTimeout('win.play()', 500);
 		//document.getElementsByClassName("movil").pointer-events="none";

 		document.getElementById("float").id = "float2";
 		document.getElementById("noClick").id = "noClick2";
 		gone();

 		padres[i].firstChild.removeAttribute("onmousedown");
 		padres[i].firstChild.removeAttribute("onmousemove");
 		padres[i].firstChild.removeAttribute("onmouseup");
 		padres[i].firstChild.removeAttribute("onmouseout");
 	}
 }

 function gone() {
   setTimeout(function(){ document.getElementById("float2").id = "float"; }, 3000);
 }

 </script>
