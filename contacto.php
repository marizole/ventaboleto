<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Venta</title>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<link rel="icon" type="image/png" href="xres/images/favicon.png" />
<link type="text/css" href="css/styles.css" rel="stylesheet" media="all" />
</head>

<body>
<div id="wrapper">
	<div id="header">
    <h5><a href="index.php"><img src="xres/images/BLOG.png" class="logo" alt="ONLINE BUS RESERVATION" width="200" height="200"/></a></h5>
        <ul id="mainnav">
			<li><a href="index.php">Inicio</a></li>
            <li><a href="galeria.php">Galería</a></li>
            <li><a href="historia.php">Historia</a></li>
            <li><a href="rutas.php">Rutas</a></li>
            <li><a href="location.php">Ubicación</a></li>
            <li class="current"><a href="contacto.php">Contáctenos</a></li>
    	</ul>
	</div>
    <div id="content">
    	<div id="gallerycontainer">
			<div class="portfolio-area" style="margin:0 auto; padding:140px 20px 20px 20px; width:820px;">	
				
				<div id="contactright">
					<h1><font color="Crimson" face="Comic Sans MS">Contactanos llenando el formulario</font></h1><BR>
					<form class="validate" action="messageexec.php" method="POST">
                        <p>
                            <label for="name" class="required label"><font color="DarkGreen" face="Comic Sans MS" size="4">Nombre:</font></label><br>
                            <input id="name" class="contactform" type="text" name="name" />
                        </p>
                        <p>
                            <label for="email" class="required label"><font color="DarkGreen" face="Comic Sans MS" size="4">Email:</font></label><br>
                            <input id="email" class="contactform" placeholder="Example: zole@gob.com" type="text" name="email" />
                        </p>
                        <p>
                            <label for="subject" class="required label"><font color="DarkGreen" face="Comic Sans MS" size="4">Tema:</font></label><br>
                            <input id="subject" class="contactform" type="text" name="subject" />
                        </p>
                        <p>
                            <label id="message-label" for="message" class="required label"><font color="DarkGreen" face="Comic Sans MS" size="4">Mensaje:</font></label><br>
                            <textarea id="message" class="contactform" name="message" cols="28" rows="5"></textarea>
                        </p>
                        <BR>
                        <p>
                            <label bgcolor="blue"></label>
                            <input class="contactform" id="submit-button" type="submit" name="Submit" value="Enviar" style="height: 35px;" />

                        </p>
                    </form>
				</div>
               	<div class="column-clear"></div>
            </div>
			<div class="clearfix"></div>
        </div>
    </div>
    <div id="footer">
        <h2><a href="#"> <font color="Gold" face="Courier New">Asociacion de Transporte Libre (ATL) - Marizol & Ramon</font></a></h2>
        <h2><p><font color="Gold" face="Courier New">Horarios de atencion de &nbsp;&nbsp;&bull;&nbsp;&nbsp;Lunes - Domingo: 06:00 am - 20:00 pm</font></p>
        <a href="index.php"></a>
        <p><font color="Gold" face="Courier New">&copy; Tecnologia Emergentes I</font><br /></p></h2>
    </div>

</div>
</body>	
</html>

