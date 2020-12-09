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
<form action="admin_edit_estado.php" method="post">
	<input type="hidden" name="roomid" value="<?php echo $id=$_GET['id'] ?>">
	Estado:<br>
	<select name="status" class="ed">
	<option>A bordo</option>
	<option>No válido</option>
	</select>
	<br>
	<input type="submit" value="Edit" id="button1">
</form>