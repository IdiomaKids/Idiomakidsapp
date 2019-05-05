<?php
$server = 'db5000068006.hosting-data.io';
$username = 'dbu19163';
$password = 'idiomaKids@2019';
$database = 'dbs62666';
try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>
