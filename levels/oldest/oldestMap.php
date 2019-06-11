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
		<img src="../../Granja/SpaceFuul.png" style="width:100%;height:100%;position:absolute;">
		<a href="../../pasarelaCero.php" class="volver"><button type="button" name="buttonR" id="back" style="margin-right:5%;">VOLVER</button></a>
		<div class="primer" onclick="openGame()" id="unoM">
			<img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s0"alt="">
			<img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s1"alt="">
			<img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;" id="1s2"alt="">
			<img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;" id="1s3"alt="">
			<script type="text/javascript">
				function enviar(){
				  document.location.href = "oldestMap.php?contador=" + contador + "&positionMap=1";
				  closeDialog();
				}
			</script>
			<?php
				//Con el extract cogemos la varaible contador que pasamos por la url cuando le damos a  fin completamos el ultimo juego
				extract($_GET);
				$PHPvariable ="0";
				$PHPvariable0 = "0";

				//Aqui comprobamos que el usuario existe en la base de datos
				$sqlCheckUserInBBDD = "SELECT COUNT(id_player) FROM player_data_map WHERE id_player = $idplayer";
				$result = $conn->query($sqlCheckUserInBBDD);
				$total = $result->fetchColumn();

				//Esta seria la segunda parte de la query, ya que si recibimos un resultado igual a 0, ejecutamos la query. Tenemos este tipo de comprobacion ya que la tabla no tiene una clave primaria y los datos se pueden repetir
				$sql = "INSERT INTO player_data_map (id_map, id_player, player_character_position, enable) VALUES (3, $idplayer, 1, 0)";
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
					//La query que hacemos aqui es para luego en funcion del score de la base de datos, pintar una estrella u otra
					$sqlSelectScoreUserLevel1Map3 = "SELECT score from score where id_player = $idplayer and id_level = 31";
					$resultSelectScoreUserLevel1Map3 = $conn->query($sqlSelectScoreUserLevel1Map3);
					$totalSelectScoreUserLevel1Map3 = $resultSelectScoreUserLevel1Map3->fetchColumn();
					   ?>
						 //Definimos aqui las variables control que vamos a utilizar
				   var contador = 0;//Esta es la que nos va a decri que puntuacuón final tiene el jugador
				   var square = 0;//Se utiliza para que cuando esta variable se ponga a 1, no haga su reload correspondiente, se veran mas adelante
				   var cow = 0;//"
				   var hand = 0;//"
					 //Definimos aquui la variable que va llevar el control del reload cada segundo
				   var rs = setInterval('reloadSquare()',1000);
					 //Esta funcion es la que va a estar comprobando que la variagle tenga el valor correspondiente
				   function reloadSquare(){
						 //Si la variable y en este caso es 1, y square es 0, entra en el if y hace lo que le hayamos puesto
				     var y = document.getElementById('frame1').contentWindow.document.getElementById('fondoCorrect').style.opacity
				     if (y == 1 && square==0) {
							 //Ponemos square a 1, para que no vuelva a hacer este reload
				       square = 1;
				       contador = contador + 1;
							 //Con esto estamos haciendo una cuanta atras para que de tiempo a hacer los eventos de cada juego, antes de que cambie de juego
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
				       setTimeout('enviar()', 4000);

				     }
				   }

				       <?php
							 //Para guardar la puntuacion en la base de datos, actualizamos el campo score de la tabla score, pero solo se actuliza si la puntuacion de contador es mayor a la que hay en la base de datos
					$sqlUpdateScoreMap3Level1 = "UPDATE score SET score = $contador WHERE id_player = $idplayer AND id_level = 31";
					$stmtUpdateScoreMap3Level1 = $conn->prepare($sqlUpdateScoreMap3Level1);
					if ($totalSelectScoreUserLevel1Map3<$contador) {
					  $sqlUpdatePointsMap3Level1 = "UPDATE score SET points = 300 WHERE id_player = $idplayer AND id_level = 31";
					  $stmtUpdatePointsMap3Level1 = $conn->prepare($sqlUpdatePointsMap3Level1);
					  $stmtUpdatePointsMap3Level1 -> execute();
					  $stmtUpdateScoreMap3Level1->execute();
					}
					?>

				      function handButton(){
				   enviar();
				   }


			</script>
			<button type="button" name="button" onclick="squareButton()" id="idSquareButton" class="botonN"style="display:inline-block;">Siguiente</button>
			<button type="button" name="button" onclick="cowButton()" id="idCowButton" class="botonN"style="display:none;">Siguiente</button>
			<button type="button" name="button" onclick="handButton()" id="idHandButton" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>
		</dialog>
		<div class="segundo" id="2" onclick="openGame2()">
			<img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="2s0"alt="">
			<img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="2s1"alt="">
			<img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="2s2"alt="">
			<img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="2s3"alt="">
		</div>
		<script type="text/javascript">
			function enviar2(){
			  document.location.href = "oldestMap.php?contador2=" + contador2 + "&positionMap=2";
			  closeDialog();
			}
		</script>
		<dialog id="dialog2" style="width:90%;height:90%;top:3%;z-index:2;"value="0">
			<p value="-1" id="score2" style="display:none;">hey</p>
			<iframe src="../../puzzles/applePuzzle.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame2"></iframe>
			<script type="text/javascript">
				<?php
					extract($_GET);
					$sqlSelectScoreUserLevel2Map3 = "SELECT score from score where id_player = $idplayer and id_level = 32";
					$resultSelectScoreUserLevel2Map3 = $conn->query($sqlSelectScoreUserLevel2Map3);
					$totalSelectScoreUserLevel2Map3 = $resultSelectScoreUserLevel2Map3->fetchColumn();
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
				    document.getElementById('idAppleButton').style.display = "none";
				  setTimeout("document.getElementById('idPigButton').style.display = 'inline-block'", 3500);
				}
				}
				function appleButton() {
				  document.getElementById('frame2').src = "../../puzzles/pruebaIdentificarPig.php";
				    document.getElementById('idAppleButton').style.display = "none";
				    document.getElementById('idPigButton').style.display = "inline-block";

				}

				var rp = setInterval('reloadPig()',1000);
				function reloadPig(){
				var y = document.getElementById('frame2').contentWindow.document.getElementById('fondoCorrect').style.opacity
				if (y == 1 && pig == 0) {
				pig = 1;
				contador2 = contador2 +1;
				setTimeout("document.getElementById('frame2').src = '../../puzzles/threePuzzle.php'",3500);
				document.getElementById('idPigButton').style.display = "none";
				setTimeout("document.getElementById('idThreeButton').style.display = 'inline-block'", 3500);
				}
				}
				function pigButton() {
				  document.getElementById('frame2').src = "../../puzzles/threePuzzle.php";
				  document.getElementById('idPigButton').style.display = "none";
				  document.getElementById('idThreeButton').style.display = "inline-block";
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
					$sqlUpdateScoreMap3Level2 = "UPDATE score SET score = $contador2 WHERE id_player = $idplayer AND id_level = 32";
					$stmtUpdateScoreMap3Level2 = $conn->prepare($sqlUpdateScoreMap3Level2);
					if ($totalSelectScoreUserLevel2Map3<$contador2) {
					  $sqlUpdatePointsMap3Level2 = "UPDATE score SET points = 300 WHERE id_player = $idplayer AND id_level = 32";
					  $stmtUpdatePointsMap3Level2 = $conn->prepare($sqlUpdatePointsMap3Level2);
					  $stmtUpdatePointsMap3Level2 -> execute();
					  $stmtUpdateScoreMap3Level2->execute();
					}
					?>
				function threeButton(){
				enviar2();
				}


			</script>
			<button type="button" name="button" onclick="appleButton()" id="idAppleButton" class="botonN"style="display:inline-block;">Siguiente</button>
			<button type="button" name="button" onclick="pigButton()" id="idPigButton" class="botonN"style="display:none;">Siguiente</button>
			<button type="button" name="button" onclick="threeButton()" id="idThreeButton" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>
		</dialog>
		<div class="tercero" id="3" onclick="openGame3()">
			<img src="../../images/Identificar/-0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="3s0"alt="">
			<img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="3s1"alt="">
			<img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="3s2"alt="">
			<img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="3s3"alt="">
		</div>
		<script type="text/javascript">
			function enviar3(){
			  document.location.href = "oldestMap.php?contador3=" + contador3 + "&positionMap=3";
			  closeDialog();

			}
		</script>
		<dialog id="dialog3" style="width:90%;height:90%;top:3%;z-index:2;"value="0">
			<p value="-1" id="score2" style="display:none;">hey</p>
			<iframe src="../../puzzles/pruebaIdentificarArbol.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame3"></iframe>
			<script type="text/javascript">
				<?php
					extract($_GET);
					$sqlSelectScoreUserLevel3Map3 = "SELECT score from score where id_player = $idplayer and id_level = 33";
					$resultSelectScoreUserLevel3Map3 = $conn->query($sqlSelectScoreUserLevel3Map3);
					$totalSelectScoreUserLevel3Map3 = $resultSelectScoreUserLevel3Map3->fetchColumn();
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
				    document.getElementById('idTreeButton').style.display = "none";
				    setTimeout("document.getElementById('idHorseButton').style.display = 'inline-block'", 3500);
				  }
				}
				function treeButton() {
				  document.getElementById('frame3').src = "../../puzzles/horsePuzzle.php";
				    document.getElementById('idTreeButton').style.display = "none";
				    document.getElementById('idHorseButton').style.display = 'inline-block';
				}
				var rh = setInterval('reloadHorse()', 1000);
				function reloadHorse(){
				var y = document.getElementById('frame3').contentWindow.document.getElementById('valor').value
				if (y == 4 && horse == 0) {
				horse = 1;
				contador3 = contador3 + 1;
				setTimeout("document.getElementById('frame3').src = '../../puzzles/identifcarCabeza.php'",3500);
				document.getElementById('idHorseButton').style.display = "none";
				setTimeout("document.getElementById('idHeadButton').style.display = 'inline-block'", 3500);
				}
				}
				function horseButton() {
				  document.getElementById('frame3').src = "../../puzzles/identifcarCabeza.php";
				  document.getElementById('idHorseButton').style.display = "none";
				  document.getElementById('idHeadButton').style.display = "inline-block";
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
					$sqlUpdateScoreMap3Level3 = "UPDATE score SET score = $contador3 WHERE id_player = $idplayer AND id_level = 33";
					$sqlUpdateScoreMap3Level3 = $conn->prepare($sqlUpdateScoreMap3Level3);
					if ($totalSelectScoreUserLevel3Map3<$contador3) {
					  $sqlUpdatePointsMap3Level3 = "UPDATE score SET points = 300 WHERE id_player = $idplayer AND id_level = 33";
					  $stmtUpdatePointsMap3Level3 = $conn->prepare($sqlUpdatePointsMap3Level3);
					  $stmtUpdatePointsMap3Level3 -> execute();
					  $sqlUpdateScoreMap3Level3->execute();
					}
					?>
				function headButton(){
				enviar3();
				}


			</script>
			<button type="button" name="button" onclick="treeButton()" id="idTreeButton" class="botonN"style="display:inline-block;">Siguiente</button>
			<button type="button" name="button" onclick="horseButton()" id="idHorseButton" class="botonN"style="display:none;">Siguiente</button>
			<button type="button" name="button" onclick="headButton()" id="idHeadButton" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>
		</dialog>
		<div class="cuarto" id="4" onclick="openGame4()">
			<img src="../../images/Identificar/0estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="4s0"alt="">
			<img src="../../images/Identificar/1estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="4s1"alt="">
			<img src="../../images/Identificar/2estrellas.png" width="150px" style="position:absolute;top:0;display:none;"id="4s2"alt="">
			<img src="../../images/Identificar/3estrella.png" width="150px" style="position:absolute;top:0;display:none;"id="4s3"alt="">
		</div>
		<script type="text/javascript">
			function enviar4(){
			  document.location.href = "oldestMap.php?contador4=" + contador4 + "&positionMap=4";
			  closeDialog();

			}

		</script>
		<dialog id="dialog4" style="width:90%;height:90%;top:3%;z-index:2;"value="0">
			<p value="-1" id="score2" style="display:none;">hey</p>
			<iframe src="../../puzzles/carrotPuzzle.php" width="-webkit-fill-available" height="-webkit-fill-available" style="border:none;width:-webkit-fill-available;height:-webkit-fill-available;"id="frame4"></iframe>
			<script type="text/javascript">
				<?php
					extract($_GET);
					$sqlSelectScoreUserLevel4Map3 = "SELECT score from score where id_player = $idplayer and id_level = 34";
					$resultSelectScoreUserLevel4Map3 = $conn->query($sqlSelectScoreUserLevel4Map3);
					$totalSelectScoreUserLevel4Map3 = $resultSelectScoreUserLevel4Map3->fetchColumn();
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
				    document.getElementById('idCarrotButton').style.display = "none";
				    setTimeout("document.getElementById('idBananaButton').style.display = 'inline-block'", 3500);
				  }
				}
				function carrotButton() {
				  document.getElementById('frame4').src = "../../puzzles/pruebaIdentificarBanana.php";

				    document.getElementById('idCarrotButton').style.display = "none";
				    document.getElementById('idBananaButton').style.display = "inline-block";

				}

				setInterval('reloadBanana()', 1000);
				function reloadBanana(){
				var y = document.getElementById('frame4').contentWindow.document.getElementById('fondoCorrect').style.opacity
				if (y == 1 && banana == 0) {
				banana = 1;
				contador4 = contador4 + 1;
				setTimeout("document.getElementById('frame4').src = '../../puzzles/sevenPuzzle.php'",3500);
				document.getElementById('idBananaButton').style.display = "none";
				setTimeout("document.getElementById('idSevenButton').style.display = 'inline-block'", 3500);
				}
				}
				function bananaButton() {
				  document.getElementById('frame4').src = "../../puzzles/sevenPuzzle.php";
				  document.getElementById('idBananaButton').style.display = "none";
				  document.getElementById('idSevenButton').style.display = "inline-block";
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
					$sqlUpdateScoreMap3Level4 = "UPDATE score SET score = $contador4 WHERE id_player = $idplayer AND id_level = 34";
					$stmtUpdateScoreMap3Level4 = $conn->prepare($sqlUpdateScoreMap3Level4);
					if ($totalSelectScoreUserLevel4Map3<$contador4) {
					  $sqlUpdatePointsMap3Level4 = "UPDATE score SET points = 300 WHERE id_player = $idplayer AND id_level = 34";
					  $stmtUpdatePointsMap3Level4 = $conn->prepare($sqlUpdatePointsMap3Level4);
					  $stmtUpdatePointsMap3Level4 -> execute();
					  $stmtUpdateScoreMap3Level4->execute();
					}
					?>

				function sevenButton(){
				enviar4();
				}


			</script>
			<button type="button" name="button" onclick="carrotButton()" id="idCarrotButton" class="botonN"style="display:inline-block;">Siguiente</button>
			<button type="button" name="button" onclick="bananaButton()" id="idBananaButton" class="botonN"style="display:none;">Siguiente</button>
			<button type="button" name="button" onclick="sevenButton()" id="idSevenButton" onclick="closeDialog()" class="botonN"style="display:none;">Fin</button>
		</dialog>
		<script type="text/javascript">
		//Estas son las funciones que abren y cierran los dialog donde estan los juegos
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
			    margin-left: 32%;
			    margin-bottom: 1%;
			    cursor: pointer;
			    position: absolute;
			    bottom: 0;
			    right: 0;
			    margin: 5px;' src='../../$image>'>";?>
		<?php
		//En esta query hacemos lo mismo que en la query de insercion en la base de datos de la posicion en el mapa, como no tenemos clave primaria lo hemos decido hacer aasi
			$sqlCountId_PlayerMap3Level1 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 31";
			$resultCountId_PlayerMap3Level1 = $conn->query($sqlCountId_PlayerMap3Level1);
			$totalCountId_PlayerMap3Level1 = $resultCountId_PlayerMap3Level1->fetchColumn();

			$sqlInsertFirstScoreMap3Level1 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 31, 0)";
			$stmtInsertFirstScoreMap3Level1 = $conn->prepare($sqlInsertFirstScoreMap3Level1);
			if ($totalCountId_PlayerMap3Level1 == $PHPvariable0) {
			  $stmtInsertFirstScoreMap3Level1->execute();
			}else if ($totalCountId_PlayerMap3Level1!=$PHPvariable0){

			}
			//Cuando actualizamos la puntuacion, la recogemos con un select de la base de datos
			$sqlSelectScoreID_PlayerLevel1Map3 = "SELECT score from score where id_player = $idplayer and id_level = 31";
			$resultSelectScoreID_PlayerLevel1Map3 = $conn->query($sqlSelectScoreID_PlayerLevel1Map3);
			$totalSelectScoreID_PlayerLevel1Map3 = $resultSelectScoreID_PlayerLevel1Map3->fetchColumn();
			//Compribamos el score, y en funcion del score, pintamos las estrellas
			if ($totalSelectScoreID_PlayerLevel1Map3) {
			echo "<script> document.getElementById('1s".$totalSelectScoreID_PlayerLevel1Map3."').style.display = 'inline-block' </script>";
			}
			//Si la puntuacion es mayor a 0, pasamos al siguiente nivel y hacemos todos los pasos anteriores, actualizar la posicion, la puntuacion...
			   if ($totalSelectScoreID_PlayerLevel1Map3 > 0) {
			     // echo $totalSelectScoreID_PlayerLevel1Map3;

			     echo "<script> document.getElementById('image').style.left = '50px'";
			     echo "</script>";
			     echo " <script> document.getElementById('image').style.bottom = '120px'";
			     echo "</script>";

			     $sqlUpdateMapPosition2Id_Map3 = "UPDATE player_data_map SET player_character_position = 2 WHERE id_player = $idplayer AND id_map = 3";
			     $stmtUpdateMapPosition2Id_Map3 = $conn->prepare($sqlUpdateMapPosition2Id_Map3);
			     if ($totalSelectScoreID_PlayerLevel1Map3>0) {
			     $stmtUpdateMapPosition2Id_Map3->execute();
			       if ($stmtUpdateMapPosition2Id_Map3->execute()) {
			         $sqlCountId_PlayerMap3Level2 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 32";
			         $resultCountId_PlayerMap3Level2 = $conn->query($sqlCountId_PlayerMap3Level2);
			         $totalCountId_PlayerMap3Level2 = $resultCountId_PlayerMap3Level2->fetchColumn();

			         $sqlInsertFirstScoreMap3Level2 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 32, 0)";
			         $stmtInsertFirstScoreMap3Level2 = $conn->prepare($sqlInsertFirstScoreMap3Level2);
			           if ($totalCountId_PlayerMap3Level2 == $PHPvariable0) {
			             $stmtInsertFirstScoreMap3Level2->execute();
			           }else if ($totalCountId_PlayerMap3Level2!=$PHPvariable0){

			           }

			       $sqlSelectScoreID_PlayerLevel2Map3 = "SELECT score from score where id_player = $idplayer and id_level = 32";
			       $resultSelectScoreID_PlayerLevel2Map3 = $conn->query($sqlSelectScoreID_PlayerLevel2Map3);
			       $totalSelectScoreID_PlayerLevel2Map3 = $resultSelectScoreID_PlayerLevel2Map3->fetchColumn();
			       // echo $totalSelectScoreID_PlayerLevel2Map3;
			       echo "<script> document.getElementById('2s".$totalSelectScoreID_PlayerLevel2Map3."').style.display = 'inline-block' </script>";

			       }
			     }

			   }

			   if ($totalSelectScoreID_PlayerLevel2Map3 > 0) {
			   echo "<script> document.getElementById('image').style.left = '665px'";
			   echo "</script>";
			   echo " <script> document.getElementById('image').style.bottom = '340px'";
			   echo "</script>";
			   $sqlUpdateMapPosition3Id_Map3 = "UPDATE player_data_map SET player_character_position = 3 WHERE id_player = $idplayer AND id_map = 3";
			   $stmtUpdateMapPosition3Id_Map3 = $conn->prepare($sqlUpdateMapPosition3Id_Map3);
			     if ($totalSelectScoreID_PlayerLevel2Map3>0) {
			       $stmtUpdateMapPosition3Id_Map3->execute();
			         if ($stmtUpdateMapPosition3Id_Map3->execute()) {
			           $sqlCountId_PlayerMap3Level3 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 33";
			           $resultCountId_PlayerMap3Level3 = $conn->query($sqlCountId_PlayerMap3Level3);
			           $totalCountId_PlayerMap3Level3 = $resultCountId_PlayerMap3Level3->fetchColumn();

			           $sqlInsertFirstScoreMap3Level3 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 33, 0)";
			           $stmtInsertFirstScoreMap3Level3 = $conn->prepare($sqlInsertFirstScoreMap3Level3);
			             if ($totalCountId_PlayerMap3Level3 == $PHPvariable0) {
			               $stmtInsertFirstScoreMap3Level3->execute();
			             }else if ($totalCountId_PlayerMap3Level3!=$PHPvariable0){

			             }

			       $sqlSelectScoreID_PlayerLevel3Map3 = "SELECT score from score where id_player = $idplayer and id_level = 33";
			       $resultSelectScoreID_PlayerLevel3Map3 = $conn->query($sqlSelectScoreID_PlayerLevel3Map3);
			       $totalSelectScoreID_PlayerLevel3Map3 = $resultSelectScoreID_PlayerLevel3Map3->fetchColumn();
			       // echo $totalSelectScoreID_PlayerLevel3Map3;
			       echo "<script> document.getElementById('3s".$totalSelectScoreID_PlayerLevel3Map3."').style.display = 'inline-block' </script>";

			       }
			     }
			   }

			   if ($totalSelectScoreID_PlayerLevel3Map3 > 0) {

			     echo "<script> document.getElementById('image').style.left = '85.5%'";
			     echo "</script>";
			     echo " <script> document.getElementById('image').style.bottom = '452px'";
			     echo "</script>";
			     echo "<script> document.getElementById('image').style.right = '69px'";
			     echo "</script>";
			     $sqlUpdateMapPosition4Id_Map3 = "UPDATE player_data_map SET player_character_position = 4 WHERE id_player = $idplayer AND id_map = 3";
			     $stmtUpdateMapPosition4Id_Map3 = $conn->prepare($sqlUpdateMapPosition4Id_Map3);
			       if ($totalSelectScoreID_PlayerLevel3Map3>0) {
			           $stmtUpdateMapPosition4Id_Map3->execute();
			             if ($stmtUpdateMapPosition4Id_Map3->execute()) {
			               $sqlCountId_PlayerMap3Level4 = "SELECT COUNT(id_player) FROM score WHERE id_player = $idplayer and id_level = 34";
			               $resultCountId_PlayerMap3Level4 = $conn->query($sqlCountId_PlayerMap3Level4);
			               $totalCountId_PlayerMap3Level4 = $resultCountId_PlayerMap3Level4->fetchColumn();

			               $sqlInsertFirstScoreMap3Level4 = "INSERT INTO score (id_player, id_level, score) VALUES ($idplayer, 34, 0)";
			               $stmtInsertFirstScoreMap3Level4 = $conn->prepare($sqlInsertFirstScoreMap3Level4);
			                 if ($totalCountId_PlayerMap3Level4 == $PHPvariable0) {
			                   $stmtInsertFirstScoreMap3Level4->execute();
			                 }else if ($totalCountId_PlayerMap3Level4!=$PHPvariable0){

			                 }

			     $sqlSelectScoreID_PlayerLevel4Map3 = "SELECT score from score where id_player = $idplayer and id_level = 34";
			     $resultSelectScoreID_PlayerLevel4Map3 = $conn->query($sqlSelectScoreID_PlayerLevel4Map3);
			     $totalSelectScoreID_PlayerLevel4Map3 = $resultSelectScoreID_PlayerLevel4Map3->fetchColumn();
			     // echo $total7231;
			     echo "<script> document.getElementById('4s".$totalSelectScoreID_PlayerLevel4Map3."').style.display = 'inline-block' </script>";

			       }
			     }
			   }
				 //Estas funciones son las que activan los divs qeu lanzan los dialogs, que tienen los juegos
			   if ($totalSelectScoreID_PlayerLevel1Map3 < 1) {
			   echo "<script> document.getElementById('2').style.display = 'none' </script>";
			       }else {
			         echo "<script> document.getElementById('2').style.display = 'block' </script>";
			       }
			   if ($totalSelectScoreID_PlayerLevel2Map3 < 1) {
			     echo "<script> document.getElementById('3').style.display = 'none' </script>";
			       }else {
			         echo "<script> document.getElementById('3').style.display = 'block' </script>";
			       }
			   if ($totalSelectScoreID_PlayerLevel3Map3 < 1) {
			     echo "<script> document.getElementById('4').style.display = 'none' </script>";
			       }else {
			         echo "<script> document.getElementById('4').style.display = 'block' </script>";
			       }
						 //Para darle movimiento al personaje y que vaya por los niveles desbloqueados por donde quiera, hemoes hecho esta comprobacion con la base de datos, esxplicaremos mas adelante como funcinona
			$sqlCountMapPosition33 = "SELECT position3 FROM player_data_map WHERE id_player = $idplayer AND id_map = 3";
			$resultCountMapPosition33 = $conn->query($sqlCountMapPosition33);
			$totalCountMapPosition33 = $resultCountMapPosition33->fetchColumn();

			$sqlCountMapPosition34 = "SELECT position4 FROM player_data_map WHERE id_player = $idplayer AND id_map = 3";
			$resultCountMapPosition34 = $conn->query($sqlCountMapPosition34);
			$totalCountMapPosition34 = $resultCountMapPosition34->fetchColumn();

			$sqlCountMapPosition31 = "SELECT position1 FROM player_data_map WHERE id_player = $idplayer AND id_map = 3";
			$resultCountMapPosition31 = $conn->query($sqlCountMapPosition31);
			$totalCountMapPosition31 = $resultCountMapPosition31->fetchColumn();

			$sqlCountMapPosition32 = "SELECT position2 FROM player_data_map WHERE id_player = $idplayer AND id_map = 3";
			$resultCountMapPosition32 = $conn->query($sqlCountMapPosition32);
			$totalCountMapPosition32 = $resultCountMapPosition32->fetchColumn();
//Con la variable que pasamos por la url con la posicion, cogemos el valor, y dependiendo de un valor u otro hace un if
			           if ($positionMap == 1) {
									 //Para poder volver a los anteriores niveles dentro del mapa sin necesidad de pasarte todos los niveles, hemos creado este comprobador. En la bbdd estan los campos position1, 2, 3 y 4 seteados a 0,
									//al estar en esa posicion, los if no se van a ejecutar, asi no alteran el orden de los juegos, haciendo que cuando te pasas uno pasas al siguiente nivel, si quitamos esta comprobacion, cuando jugamos un nivel
									//se queda de forma estatica en ese nivel, ya que detectaria el valor que tendria $positionMap en ese momento. Y para evitar eso, hacemos que cuadndo detecte un valor en esa variable haga el update
			             $sqlUpdateMapPosition1Id_Map3 = "UPDATE player_data_map SET player_character_position = 1 WHERE id_player = $idplayer AND id_map = 3";
			             $stmtUpdateMapPosition1Id_Map3 = $conn->prepare($sqlUpdateMapPosition1Id_Map3);
			             $stmtUpdateMapPosition1Id_Map3->execute();

			             $sqlUpdateMapPosition31Id_Map3 = "UPDATE player_data_map SET position1 = 1 WHERE id_player = $idplayer AND id_map = 3";
			             $stmtUpdateMapPosition31Id_Map3 = $conn->prepare($sqlUpdateMapPosition31Id_Map3);
			             $stmtUpdateMapPosition31Id_Map3->execute();
									 //Este if lo que hace es que cuando vuelves a pulsar este nivel el personaje se mueva hasta dicho nivel. Como el update se ejecuta despues de pasar al sigueinte nivel, no se queda en el ultimo nivel jugado
									 //el personaje
			           if ($totalCountMapPosition31 == 1) {
			             echo "<script> document.getElementById('image').style.right = '0px'";
			             echo "</script>";
			             echo "<script> document.getElementById('image').style.left = '89%'";
			             echo "</script>";
			             echo " <script> document.getElementById('image').style.bottom = '0px'";
			             echo "</script>";
			           }

			           }
			           else if ($positionMap == 2) {
			             $sqlUpdateMapPosition1Id_Map3 = "UPDATE player_data_map SET player_character_position = 2 WHERE id_player = $idplayer AND id_map = 3";
			             $stmtUpdateMapPosition1Id_Map3 = $conn->prepare($sqlUpdateMapPosition1Id_Map3);
			             $stmtUpdateMapPosition1Id_Map3->execute();

									 $sqlUpdateMapPosition32Id_Map3 = "UPDATE player_data_map SET position2 = 1 WHERE id_player = $idplayer AND id_map = 3";
			             $stmtUpdateMapPosition32Id_Map3 = $conn->prepare($sqlUpdateMapPosition32Id_Map3);
			             $stmtUpdateMapPosition32Id_Map3->execute();

			             if ($totalCountMapPosition32==1) {

			             echo "<script> document.getElementById('image').style.left = '50px'";
			             echo "</script>";
			             echo " <script> document.getElementById('image').style.bottom = '320px'";
			             echo "</script>";
			           }
			           }
			           else if ($positionMap == 3 ) {
			             $sqlUpdateMapPosition1Id_Map3 = "UPDATE player_data_map SET player_character_position = 3 WHERE id_player = $idplayer AND id_map = 3";
			             $stmtUpdateMapPosition1Id_Map3 = $conn->prepare($sqlUpdateMapPosition1Id_Map3);
			             $stmtUpdateMapPosition1Id_Map3->execute();

			             $sqlUpdateMapPosition32Id_Map3 = "UPDATE player_data_map SET position2 = 1 WHERE id_player = $idplayer AND id_map = 3";
			             $stmtUpdateMapPosition32Id_Map3 = $conn->prepare($sqlUpdateMapPosition32Id_Map3);
			             $stmtUpdateMapPosition32Id_Map3->execute();

			             if ($totalCountMapPosition33==1) {


			             echo "<script> document.getElementById('image').style.left = '665px'";
			             echo "</script>";
			             echo " <script> document.getElementById('image').style.bottom = '340px'";
			             echo "</script>";
			           }
			         }
			           else if ($positionMap == 4) {
			             $sqlUpdateMapPosition1Id_Map3 = "UPDATE player_data_map SET player_character_position = 4 WHERE id_player = $idplayer AND id_map = 3";
			             $stmtUpdateMapPosition1Id_Map3 = $conn->prepare($sqlUpdateMapPosition1Id_Map3);
			             $stmtUpdateMapPosition1Id_Map3->execute();

									 $sqlUpdateMapPosition34Id_Map3 = "UPDATE player_data_map SET position4 = 1 WHERE id_player = $idplayer AND id_map = 3";
			             $stmtUpdateMapPosition34Id_Map3 = $conn->prepare($sqlUpdateMapPosition34Id_Map3);
			             $stmtUpdateMapPosition34Id_Map3->execute();
									 if ($totalCountMapPosition34==1) {
			             echo "<script> document.getElementById('image').style.left = '85.5%'";
			             echo "</script>";
			             echo " <script> document.getElementById('image').style.bottom = '452px'";
			             echo "</script>";
			             echo "<script> document.getElementById('image').style.right = '69px'";
			             echo "</script>";
			           }
							 }


			    ?>
	</body>
</html>
