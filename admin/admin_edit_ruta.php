<?php
	include('../conexionDB.php');
	$roomid = $_POST['roomid'];
	$type=$_POST['type'];
	$route=$_POST['route'];
	$price=$_POST['price'];
	$seat=$_POST['seat'];
	$time=$_POST['time'];
	mysql_query("UPDATE route SET type='$type', price='$price', route='$route', numseats='$seat', time='$time' WHERE id='$roomid'");
	header("location: ruta.php");
?>