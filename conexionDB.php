<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "123";
$mysql_database = "db_ventas";
$prefix = "";


$db = new mysqli ($mysql_hostname, $mysql_user, $mysql_password);
if($db->connect_error > 0){
    die('ERROR DE CONEXION [' . $db->connect_error. ']');
}

?>