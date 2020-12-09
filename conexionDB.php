<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "123";
$mysql_database = "db_bus";
$prefix = "";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
/*
$db = new mysqli ($mysql_hostname, $mysql_user, $mysql_password);
if($db->connect_error > 0){
    die('ERROR DE CONEXION [' . $db->connect_error. ']');
}*/

?>