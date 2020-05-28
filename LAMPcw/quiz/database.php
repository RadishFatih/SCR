<?php
$db_host = "51.83.145.90:3306";
$db_user = "mysql4269";
$db_pass = "2HF1kJITbU";
$db_name = "mysql4269";
// Create connection
$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
if($mysqli->connect_error){
   printf("Connection failed: %s\n", $mysqli->connect_error);
   exit();
}
?>