<?php
// Iniciar sesión
session_start();

// Desarma las variables almacenadas en la sesión
unset($_SESSION['SESS_MEMBER_ID']);
?>
<!DOCTYPE html >
<html >
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
    <h5><a href="index.php"><img src="xres/images/logo6.png" class="logo" alt="ONLINE BUS RESERVATION" width="220" height="220"/></a></h5>
      <ul id="mainnav">
          <li class="current"><a href="index.php">Inicio</a></li>
          <li><a href="galeria.php">Galería</a></li>
          <li><a href="historia.php">Historia</a></li>
          <li><a href="rutas.php">Rutas</a></li>
          <li><a href="ubicacion.php">ubicación</a></li>
          <li><a href="contacto.php">Contáctenos</a></li>
      </ul>
  </div>
  <div id="content">
    <div id="rotator">
            <ul>
                  <li class="show"><img src="xres/images/6.jpg" width="861" height="379"  alt="" /></li>
                  <li><img src="xres/images/5.jpg" width="861" height="379"  alt="" /></li>
                  <li><img src="xres/images/4.jpg" width="861" height="379"  alt="" /></li>
                  <li><img src="xres/images/3.jpg" width="861" height="379"  alt="" /></li>
            </ul>
      
      <div id="logo" style="left: 600px; height: auto; top: 23px; width: 260px; position: absolute; z-index:4;">        
        <h2 class="accordion-header" style="height: 18px; margin-bottom: 15px; color: rgb(255, 255, 255); background: none repeat scroll 0px 0px rgb(53, 48, 48);">Venta de Boletos</h2>
        <div class="accordion-content" style="margin-bottom: 15px;">
          <form action="selecruta.php" method="post" style="margin-bottom:none;">
            <span style="margin-right: 11px;">Seleccionar ruta: 
            <select name="route" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;"/>
              <?php
              include('conexionDB.php');
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
      <div class="item"> <a href="#"><img src="xres/images/20.jpg" width="200" height="120" alt="" /></a>
          <h3><a href="#">Ofertas</a></h3>
          <p><a href="#"><strong>Buses Bolivia</strong><br/>
          Ya viajaste en los<br /> Suite de Naser <br /> Ven y disfruta !</a></p>  
      </div>
      <div class="item"> <a href="#"><img src="xres/images/21.jpg" width="200" height="120" alt="" /></a>
          <h3><a href="#">Nuevas Rutas</a></h3>
          <p><a href="#"><strong>Asia el Salar de Uyuni</strong><br />
          Pase una dia relajante en el Majestuoso Salar de uyuni. </a></p>  
      </div>
      
    </div>
  </div>
  <div id="footer">
    <h2><a href="#"> <font color="Gold" face="Courier New">Asociacion de Transporte Libre (ATL) - Marizol & Ramon</font></a></h2>
    <h2><p><font color="Gold" face="Courier New">Horas de atencion&nbsp;&nbsp;&bull;&nbsp;&nbsp;Lunes -Domingo: 06:00 am - 20:00 pm</font></p>
    <a href="index.php"></a>
    <p><font color="Gold" face="Courier New">&copy; Tecnologia Emergentes I</font><br /></p></h2>
  </div>
</div>
</body>
</html>
