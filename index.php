<?php
	// Iniciar sesión
	session_start();
	
	// Desarma las variables almacenadas en la sesión
	unset($_SESSION['SESS_MEMBER_ID']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>VENTA DE BOLETOS</title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<!--[if IE 6]><style type="text/css"> * html img { behavior: url("xres/iepngfix.htc") }</style><![endif]-->
<script type="text/javascript" src="xres/js/saslideshow.js"></script>
<script type="text/javascript" src="xres/js/slideshow.js"></script>
<script src="js/jquery-1.5.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vallenato/vallenato.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="vallenato/vallenato.css" type="text/css" media="screen" charset="utf-8">

		<script type="text/javascript">
		$("#slideshow > div:gt(0)").hide();

		setInterval(function() { 
		  $('#slideshow > div:first')
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#slideshow');
		},  3000);
	</script>
	<!--sa calendar-->	
		<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
		
		function makeTwoChars(inp) {
				return String(inp).length < 2 ? "0" + inp : inp;
		}

		function initialiseInputs() {
				// Borra los valores antiguos de las entradas (que el navegador podría almacenar en caché después de volver a cargar la página)
				document.getElementById("sd").value = "";
				document.getElementById("ed").value = "";

				// Agrega el controlador de eventos onchange a la entrada de fecha de inicio
				datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		var initAttempts = 0;

		function setReservationDates(e) {

				try {
						var sd = datePickerController.getDatePicker("sd");
						var ed = datePickerController.getDatePicker("ed");
				} catch (err) {
						if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
						return;
				}

				// Verifique que el valor de la entrada sea una fecha con el formato correcto
				var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

				// Si el valor de la entrada no se puede analizar como una fecha válida, regrese
				if(dt == 0) return;

				// En esta etapa tenemos una fecha AAAAMMDD válida

				// Toma el valor establecido dentro de la entrada endDate y analízalo usando el método dateFormat
				// N.B: El segundo parámetro de la función dateFormat, si es TRUE, le dice a la función que favorezca el formato de fecha m-d-y
				var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

				// Establecer el rango bajo del segundo datePicker para que sea la fecha analizada desde el primero
				ed.setRangeLow( dt );
				
				// Si ya hay un valor presente dentro de la entrada de fecha de finalización y es menor que la fecha de inicio
				// luego borra el valor de la fecha de finalización
				if(edv < dt) {
						document.getElementById("ed").value = "";
				}
		}

		function removeInputEvents() {
				// Elimina el controlador de eventos onchange establecido dentro de la función initialiseInputs
				datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
		}

		datePickerController.addEvent(window, 'load', initialiseInputs);
		datePickerController.addEvent(window, 'unload', removeInputEvents);

		//]]>
		</script> 

</head>

<body>
<div id="wrapper">
	<div id="header">
    <h5><a href="index.php"><img src="xres/images/logo.png" class="logo" alt="James Buchanan Pub and Restaurant" width="200" height="200"/></a></h5>
        <ul id="mainnav">
			<li class="current"><a href="index.php">Inicio</a></li>
            <li><a href="gallery.php">Galería</a></li>
            <li><a href="history.php">Historia</a></li>
            <li><a href="routes.php">Rutas</a></li>
            <li><a href="location.php">ubicación</a></li>
            <li><a href="contact.php">Contáctenos</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="rotator">
              <ul>
                    <li class="show"><img src="xres/images/jb2/0111.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/0222.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/0333.jpg" width="861" height="379"  alt="" /></li>
                    <li><img src="xres/images/jb2/0444.jpg" width="861" height="379"  alt="" /></li>
              </ul>
			  
			  <div id="logo" style="left: 600px; height: auto; top: 23px; width: 260px; position: absolute; z-index:4;">
					
					<h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Boleto de reserva</h2>
					<div class="accordion-content" style="margin-bottom: 15px;">
						<form action="selectset.php" method="post" style="margin-bottom:none;">
						<span style="margin-right: 11px;">Seleccionar ruta: 
						<select name="route" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						<?php
						include('db.php');
						$result = mysql_query("SELECT * FROM route");
						while($row = mysql_fetch_array($result))
							{
								echo '<option value="'.$row['id'].'">';
								echo $row['route'].'  :'.$row['type'].'  :'.$row['time'];
								echo '</option>';
							}
						?>
						</select>
						</span><br>
						<span style="margin-right: 11px;">Fecha: 
						<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" value="" maxlength="10" readonly="readonly" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
						</span><br>
						<span style="margin-right: 11px;">No. de pasajero: 
						<select name="qty" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						</select>
						</span><br><br>
						<input type="submit" id="submit" value="Next" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
						</form>
					</div>
					<h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Admin Login</h2>
					<div class="accordion-content" style="margin-bottom: 15px;">
						<form action="login.php" method="post" style="margin-bottom:none;">
						<span style="margin-right: 11px;">Usuario: <input type="text" name="username" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br>
						<span style="margin-right: 11px;">Password: <input type="password" name="password" style="width: 165px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/></span><br><br>
						<input type="submit" id="submit" class="medium gray button" value="Login" style="height: 34px; margin-left: 15px; width: 191px; padding: 5px; border: 3px double rgb(204, 204, 204);" />
						</form>
					</div>
				</div>
        </div>
		
    </div>
    <div id="featured">
        <div id="items">
            <div class="item"> <a href="main-course.php"><img src="xres/images/01_featurede.jpg" width="200" height="120" alt="" /></a>
            <h3><a href="main-course.php">Ofertas especiales</a></h3>
            <p><a href="#"><strong>Aircon Bus</strong><br />
			Entra y experimenta<br /> Nuestro nuevo tipo de autobús<br /> especiales hoy!</a></p>  
            </div>
            <div class="item"> <a href="lodging.php"><img src="xres/images/02_featurede.jpg" width="200" height="120" alt="" /></a>
            <h3><a href="lodging.php">Nueva ruta</a></h3>
            <p><a href="lodging.php"><strong>De El Alto a Pelechuco o Viceversa</strong><br />
			Pase una velada relajante en nuestro hotel de circa 1796, lleno de historia. </a></p>  
			</div>
			<div class="item" style="width: 860px;"> 
				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FFlorida-Bus%2F224961217554604%3Fref%3Dts%26fref%3Dts&amp;width=800&amp;height=290&amp;show_faces=true&amp;colorscheme=dark&amp;stream=false&amp;border_color&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:800px; height:290px;" allowTransparency="true"></iframe>
			</div>
        </div>
    </div>

	<div id="footer">
	<h4>+59175250201 &bull; <a href="contact-us.php">Ciudad de La Paz </a></h4>
	<p>Horas de operación&nbsp;&nbsp;&bull;&nbsp;&nbsp;Lunes -Domingo: 06:00 am - 12:00 am</p>
	<a href="index.php"><img src="xres/images/footer-logou.png" alt="ONLINE BUS RESERVATION" /></a>
	<p>&copy; Grupo 6 Ing. Software<br /></p>
</div>
</div>
</body>
</html>
