/*Programacion de JavaScript*/
<?php
require 'database.php';

$records = $conn->prepare('SELECT jsondata FROM `games` WHERE id_game = 135');
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
echo results;
 ?>

<script>
var myObj, myJSON, text, obj;

myObj =

<?php

?>


myJSON = JSON.stringify(myObj);
localStorage.setItem("testJSON", myJSON);

// Retrieving data:
text = localStorage.getItem("testJSON");
obj = JSON.parse(text);
var url1 = 'images/Identificar/cow1.png';
var url2 = 'images/Identificar/cow2.png';
var url3 = 'images/Identificar/cow3.png';
var url4 = 'images/Identificar/cow4.png';

if (obj.position11 == "cow11.png") {
document.getElementById('demo11').setAttributeNS('', 'href', url1);

} if (obj.position12 == "cow12.png"){
document.getElementById('demo12').setAttributeNS('', 'href', url2);
}

if (obj.position21 == "cow21.png") {
document.getElementById('demo21').setAttributeNS('', 'href', url3);

} if (obj.position22 == "cow22.png"){
document.getElementById('demo22').setAttributeNS('', 'href', url4);
}



var piezas = document.getElementsByClassName('movil');

var tamWidh = [368,280,280,372];
var tamHeight = [262,350,355,270];

for(var i=0;i<piezas.length;i++){
	piezas[i].setAttribute("width", tamWidh[i]);
	piezas[i].setAttribute("height",tamHeight[i]);
	piezas[i].setAttribute("onmousedown","seleccionarElemento(evt)");
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

var origX = [0,0,267,175];
var origY = [0,168,0,253];

function iman(){

	for(var i=0;i<piezas.length;i++){

		if (Math.abs(currentPosx-origX[i])<15 && Math.abs(currentPosy-origY[i])<15) {
			var count = 0;
			elementSelect.setAttribute("x",origX[i]);
			elementSelect.setAttribute("y",origY[i]);
			count = count +1;
			console.log(count);

			if (count==4) {
				console.log("Lo has conseguido!!");
			}
		}
	}
}

var win = document.getElementById("win");

function testing() {

	if (piezas = [0,168,0,253] && [0,168,0,253]) {
		console.log("hola");
	}
	var bien_ubicada = 0;
	var padres = document.getElementsByClassName('padre');
	if(bien_ubicada == 4){
		window.alert("Bien hecho!!")
		win.play();
	}
}

</script>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Pikachu Puzzle</title>
      <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <svg width="100%" height="1000" id="entorno">
		<g id="fondo"><image xlink:href="images/Identificar/fondo.png" width="594" height="520" x="-23" y="4"></g>
	<g class="padre" id="0"><image xlink:href="" class="movil" id="demo11" x="0" y="590"></g>
	<g class="padre" id="1"><image xlink:href="" class="movil" id="demo12" x="622" y="307"></g>
	<g class="padre" id="2"><image xlink:href="" class="movil" id="demo21" x="374" y="500"></g>
	<g class="padre" id="3"><image xlink:href="" class="movil" id="demo22" x="531" y="29"></g>
</svg>
<audio id="win" src="https://raw.githubusercontent.com/NestorPlasencia/PikaPuzzle/master/media/win.mp3"></audio>
    <script  src="js/index.js"></script>
</body>

</html>
