<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "haslostudenta";
$db_name = "quizz";
// Create connection
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
if($mysqli->connect_error){
   printf("Connection failed: %s\n", $mysqli->connect_error);
   exit();
}
?>