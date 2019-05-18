<?php
session_start();
$idplayer = $_SESSION['id_player'];


$sql4 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 11";
$result4 = $conn->query($sql4);
$total4 = $result4->fetchColumn();

$sql5 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 12";
$result5 = $conn->query($sql5);
$total5 = $result5->fetchColumn();

$sql6 = "SELECT score FROM score WHERE id_player = $idplayer AND id_level = 13";
$result6 = $conn->query($sql6);
$total6 = $result6->fetchColumn();


echo $total4;

 ?>
