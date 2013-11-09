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
<title>Inventario de Pedidos</title>
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
     	<h2 class="text-center">Inventario de Pedidos</h2>
        <h4 class="text-center">Detalles</h4>
        
     </div>
        
</body>
</html>