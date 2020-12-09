<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Inel Power System</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
Imprime y presenta estos detalles al abordar el autobús<br><br>
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content" style="width: 400px;">
<strong>Detalles de reserva de boletos</strong><br><br>
<?php
include('conexionDB.php');
$id=$_GET['id'];
$setnum=$_GET['setnum'];
$result = mysql_query("SELECT * FROM customer WHERE transactionum='$id'");
while($row = mysql_fetch_array($result))
	{
		echo 'Numero de trasaccion: '.$row['transactionum'].'<br>';
		echo 'Nombre: '.$row['fname'].' '.$row['lname'].'<br>';
		echo 'Direccion: '.$row['address'].'<br>';
		echo 'Contacto: '.$row['contact'].'<br>';
		echo 'Pago: '.$row['payable'].'<br>';
	}
$results = mysql_query("SELECT * FROM reserve WHERE transactionnum='$id'");
while($rows = mysql_fetch_array($results))
	{
		$ggagaga=$rows['bus'];
		echo 'Ruta y tipo de bus: ';
		$resulta = mysql_query("SELECT * FROM route WHERE id='$ggagaga'");
		while($rowa = mysql_fetch_array($resulta))
			{
			echo $rowa['route'].'     :'.$rowa['type'];
			$time=$rowa['time'];
			}
		echo '<br>';	
		echo 'Hora de salida: '.$time;
		echo '<br>';
		echo 'Numero de butaca: '.$setnum.'<br>';
		echo 'Fecha de viaje: '.$rows['date'].'<br>';
		
	}
?>
</div>
<a href="index.php">inicio</a>