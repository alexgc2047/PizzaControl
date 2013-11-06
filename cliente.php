<?php 
    session_start();
    include('funciones.php');
    if (!isset ($_SESSION['user']))
    {
        header("location:index.php?inf=err2");
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
<script language="javascript" type="text/javascript" src="js/jQuery.js"></script>
<script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
<title>Informaci&oacute;n de Cliente - PEDIDOS</title>
</head>

<body>
	&nbsp;
    <button type="btn btn-primary" onClick="backTo('main.php');"><span class="glyphicon glyphicon-circle-arrow-left"></span>
</button>
    <?php
        $f = new funciones();
        $f->timeOut();
        echo $f->printHeader();
     ?>
     <div class="container">
     	<h2 class="text-center">PEDIDOS</h2>
        <h4 class="text-center">Informaci&oacute;n del Cliente</h4>
        <div class="row">
            <div class="col-xs-3">
            	<input id="num" class="form-control" type="text" placeholder="No. Telefonico Cliente" />
            </div>
            <div class="col-xs-2">
            	<button type="button" class="btn btn-primary" onClick="buscarCliente();">Buscar</button>
            </div>
        </div>
        <div id="info">
            <div id="pdiv" class="progress progress-striped active" style="visibility:hidden">
                <div id="pgb" class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span class="sr-only">0% Complete</span>
  		</div>
            </div>
        </div>
     </div>
</body>
</html>