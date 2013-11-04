<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
<script language="javascript" type="text/javascript" src="js/jQuery.js"></script>
<script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
<title>Login</title>
</head>

<body>
<?php
	if(isset ($_REQUEST['inf']))
	{ 
		if ($_REQUEST['inf'] == 'err')
		{
			?><div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Error de Autenticación!</h4>
			<p>
				Error de Usuario/Contraseña. <br />Inserta nuevamente tu información y asegurate que sea correcta.
			</p>
		  </div>
		  <?php
		}
		if ($_REQUEST['inf'] == 'err2')
		{
			?><div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Error de Autenticación!</h4>
			<p>
				No ha iniciado sesión.
				Por favor, escriba su información y de clic en Iniciar Sesión.
			</p>
		  </div>
		  <?php
		}
		if ($_REQUEST['inf'] == 'out')
		{
			?><div class="alert alert-success fade in">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4>Cierre Sesi&oacute;n!</h4>
			<p>
				Sesión terminada.<br /> Para volver a entrar al sistema escriba su informaci&oacute; nuevamente.
			</p>
		  </div>
		  <?php
		}
	}
?>
	<div class="container">
    	<h2 class="modal-title" style="text-align:center"><b>BIENVENIDO!</b></h2>
    </div>
	<div class="container">
    	<form class="form-signin" action="login.php" method="post">
        	<div class="form-group" align="center">
            	<img class="img-thumbnail" src="images/logop.png" width="100" /> 
                <h4 class="form-signin-heading" style="text-align:center">Entrar al Sistema</h4>
                <input id="user" name="user" type="text" class="form-control" placeholder="Usuario" required autofocus />
                <input id="pass" name="pass" type="password" class="form-control" placeholder="Contraseña" required />
            </div>
            <button class="btn btn-default" type="submit">Iniciar Sesi&oacute;n</button>
         </form>
    </div>
</body>
</html>
