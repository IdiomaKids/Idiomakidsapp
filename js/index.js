/*Programacion de JavaScript*/
var myObj, myJSON, text, obj;

myObj =
{
'position11': 'cow11.png',
'position12': 'cow12.png',
'position21': 'cow21.png',
'position22': 'cow22.png'
};


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
	piezas[i].setAttribute("x", Math.floor((Math.random() * 100) + 1));
	piezas[i].setAttribute("y", Math.floor((Math.random() * 150) + 1));
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
			elementSelect.removeAttribute("onmousemove");
			elementSelect.removeAttribute("onmouseout");
			elementSelect.removeAttribute("onmouseup");
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

	if (piezas = [0,168,0,253]) {
		console.log("hola");
	}
	var bien_ubicada = 0;
	var padres = document.getElementsByClassName('padre');
	if(bien_ubicada == 4){
		window.alert("Bien hecho!!")
		win.play();
	}
}
