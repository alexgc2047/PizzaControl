<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
<script language="javascript" type="text/javascript" src="js/jQuery.js"></script>
<script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/funciones.js"></script>
<title>Sistema de Control</title>
<?php 
	if (!isset ($_SESSION['user']))
	{
		header("location:index.php?inf=err2");
	}
?>
</head>

<body>
	<div class="container" style="border:groove">
        <div>
        	<h5 class="text-left">
				<?php 
                    echo "<span class='glyphicon glyphicon-user'>&nbsp;</span><b>Ahora en sesi&oacute;n:</b> ".$_SESSION['name'];
                ?>
            </h5>
        </div>
        <div class="navbar-form" align="right">
             <form action="logout.php" method="post">
                
                <button type="submit" class="btn btn-danger">Cerrar Sesi&oacute;n</button>
             </form>
        </div>
    </div>
    <br /> <br />
	<?php
		if ($_SESSION['tipo'] == 1)
		{
			?>
            <!-- INICIO DEL PANEL DE REGISTRO DE NUEVO PEDIDO -->
            <div class="modal fade" id="pedidos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">REGISTRAR NUEVO PEDIDO</h4>
                  </div>
                  <div class="modal-body">
                  	Seleccione la opci&oacute;n deseada.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-lg" onClick="buscarCliente();">Buscar Cliente</button>
                    <button type="button" class="btn btn-primary btn-lg" onClick="registrarCliente();">Registrar Nuevo Cliente</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- INICIO DEL PANEL DE REGISTRO/CONSULTA DE COMPRAS -->
            <div class="modal fade" id="compras" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">MEN&Uacute; COMPRAS</h4>
                  </div>
                  <div class="modal-body">
                  	Seleccione la opci&oacute;n deseada.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-lg" onClick="consultar();">Consultar/Imprimir Informaci&oacute;n</button>
                    <button type="button" class="btn btn-primary btn-lg" onClick="registrarCompra();">Registrar Nueva Compra</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- INICIO DEL MENU PRINCIPAL DE CAJERO -->
            <div class="container" align="center">
            	<h2 class="modal-title"><span class="glyphicon glyphicon-tasks"></span>&nbsp;MEN&Uacute; CAJERO</h2>
                <br /><br /><br />
            	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#pedidos">&nbsp;PEDIDOS&nbsp;</button>
                &nbsp; &nbsp;
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#compras">&nbsp;COMPRAS&nbsp;</button>
            </div>
            <?php
		}
		else if($_SESSION['tipo'] == 2)
		{
			?>
			<div class="container" align="center">
            	<h2 class="modal-title"><span class="glyphicon glyphicon-tasks"></span>&nbsp;MEN&Uacute; CAJERO</h2>
                <br /><br /><br />
            	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#">&nbsp;INVENTARIO PEDIDOS&nbsp;</button>
                &nbsp; &nbsp;
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#">&nbsp;EMPLEADOS&nbsp;</button>
            </div>
            <?php
		}
     ?>
</body>
</html>