<?php
	//Start session
	session_start();
	
	//Connect to mysql server
	require "conexionDB.php";
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['username']);
	$password = clean($_POST['password']);
	
	//Create query
	$qry="SELECT * FROM admin WHERE username='$login' AND password='$password'";
	$result=mysql_query($qry);
	//while($row = mysql_fetch_array($result))
//  {
//  $level=$row['position'];
//  }
	//Verifica si la consulta fue exitosa o no
	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Inicio de sesión correcto
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['username'];
			session_write_close();
			//if ($level="admin"){
			header("location: admin/board.php");
			exit();
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>