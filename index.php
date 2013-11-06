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
    include ('funciones.php');
    $f = new funciones();
    if(isset ($_REQUEST['inf']))
    {
         echo $f->checkLogin($_REQUEST['inf']);
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
