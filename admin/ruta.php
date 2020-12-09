<?php
	require_once('auth.php');
?>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
</head>
<body>
	<div id="container">
		<div id="adminbar-outer" class="radius-bottom">
			<div id="adminbar" class="radius-bottom">
				<a id="logo" href="board.php"></a>
				<div id="details">
					<a class="avatar" href="javascript: void(0)">
					<img width="36" height="36" alt="avatar" src="img/avatar.jpg">
					</a>
					<div class="tcenter">
					Hi
					<strong>Admin</strong>
					!
					<br>
					<a class="alightred" href="../index.php">Cerrar sesion</a>
					</div>
				</div>
			</div>
		</div>
		<div id="panel-outer" class="radius" style="opacity: 1;">
			<div id="panel" class="radius">
				<ul class="radius-top clearfix" id="main-menu">
					<li>
						<a href="board.php">
							<img alt="Dashboard" src="img/m-dashboard.png">
							<span>Registros</span>
						</a>
					</li>
					
					<li>
						<a class="active" href="ruta.php">
							<img alt="Statistics" src="img/m-custom.png">
							<span>Bus</span>
						</a>
					</li>
					<li>
						<a href="inventario.php">
							<img alt="Statistics" src="img/m-statistics.png">
							<span>Butacas</span>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
				<div id="content" class="clearfix">
					
					<a rel="facebox" href="add_ruta.php">Agregar ruta</a>
					
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> Tipo de bus </th>
							<th> Ruta </th>
							<th> Numero de asiento </th>
							<th> Precio </th>
							<th> Tiempo </th>
							<th> Acci�n </th>
							</tr>
						</thead>
						<tbody>
						<?php
							include('../conexionDB.php');
							$result = mysql_query("SELECT * FROM route");
							while($row = mysql_fetch_array($result))
								{
									echo '<tr class="record">';
									echo '<td style="border-left: 1px solid #C1DAD7;">'.$row['type'].'</td>';
									echo '<td><div align="right">'.$row['route'].'</div></td>';
									echo '<td><div align="right">'.$row['numseats'].'</div></td>';
									echo '<td><div align="right">'.$row['price'].'</div></td>';
									echo '<td><div align="right">'.$row['time'].'</div></td>';
									echo '<td><div align="center"><a rel="facebox" href="edit_ruta_det.php?id='.$row['id'].'">edit</a> | <a href="#" id="'.$row['id'].'" class="delbutton" title="Click To Delete">borrar</a></div></td>';
									echo '</tr>';
								}
							?> 
						</tbody>
					</table>
				</div>
				<div id="footer" class="radius-bottom">
					2020
					<a class="afooter-link" href="">Asociacion de Transporte Libre ATL Marisol & Ramon</a>
					de
					<a class="afooter-link" href="">Tecnologia Emergentes I</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete_ruta.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>