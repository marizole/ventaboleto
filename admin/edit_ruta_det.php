<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<?php
	include('../conexionDB.php');
	$id=$_GET['id'];
	$result = mysql_query("SELECT * FROM route where id='$id'");
		while($row = mysql_fetch_array($result))
			{
				$type=$row['type'];
				$route=$row['route'];
				$price=$row['price'];
				$seat=$row['numseats'];
				$time=$row['time'];
			}
?>
<form action="admin_edit_ruta.php" method="post">
	<input type="hidden" name="roomid" value="<?php echo $id=$_GET['id'] ?>">
	Tipo de bus:<br><input type="text" name="type" value="<?php echo $type ?>" class="ed"><br>
	Ruta:<br><input type="text" name="route" value="<?php echo $route ?>" class="ed"><br>
	Precio:<br><textarea name="price" class="ed"><?php echo $price ?></textarea><br>
	fecha:<br><input type="text" name="seat" value="<?php echo $seat ?>" class="ed"><br>
	tiempo:<br><input type="time" name="time" value="<?php echo $time ?>" class="ed"><br>
	<input type="submit" value="Edit" id="button1">
</form>