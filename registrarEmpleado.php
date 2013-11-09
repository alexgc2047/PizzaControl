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
<title>Registro de Empleados</title>
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
             <h2 class="text-center">Registro de un Nuevo Empleado</h2>
             <h4 class="text-center">Informaci&oacute;n</h4>
        <div>
        <form action="registrar.php" method="post">
            <br /><br /><div class="row"><div class="col-xs-2"><input class="form-control" name="nomb" id="disabledInput" type="text" value="Nombre Completo:" disabled></div><div class="col-xs-4"> <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Ingresar Nombre Completo" required autofocus /></div></div>
            <br /><div class="row"><div class="col-xs-6"><h5 class="text-center"><input class="form-control" name="domicilio" id="disabledInput" type="text" value="Domicilio:" style="text-align:center" disabled></h5></div></div>
                <div class="row"><div class="col-xs-4"> <h5 class="text-center">Calle:</h5></div><div class="col-xs-2"> <h5 class="text-center">Numero:</h5></div></div>
                  <div class="row"><div class="col-xs-4"><input id="calle" name="calle" type="text" class="form-control" placeholder="Ingresar Nombre de Calle" required autofocus /></div><div class="col-xs-2"><input id="numero" name="numero" type="text" class="form-control" placeholder="Ingresar Numero" required autofocus /></div></div>
            <br /><div class="row"><div class="col-xs-4"> <h5 class="text-center">Colonia:</h5></div><div class="col-xs-2"> <h5 class="text-center">Codigo Postal:</h5></div></div>
                  <div class="row"><div class="col-xs-4"><input id="colonia" name="colonia" type="text" class="form-control" placeholder="Ingresar Nombre de Colonia" required autofocus /></div><div class="col-xs-2"><input id="codigo" name="codigo" type="text" class="form-control" placeholder="Ingresar Codigo Postal" required autofocus /></div></div>
            <br /><div class="row"><div class="col-xs-2"><input class="form-control" name="numtel" id="disabledInput" type="text" value="Numero Telefonico:" disabled></div><div class="col-xs-4"> <input id="telefono" name="telefono" type="text" class="form-control" placeholder="Ingresar Numero Telefonico" required autofocus /></div></div>
            <br /><div class="row"><div class="col-xs-3"><input class="form-control" name="horario" id="disabledInput" type="text" value="Horario de Trabajo:" disabled></div><div class="col-xs-3"> <input id="horario" name="horario" type="text" class="form-control" placeholder="Asignacion de Horario" required autofocus /></div></div>
            <br /><div class="row"><div class="col-xs-2"><input class="form-control" name="salario" id="disabledInput" type="text" value="Salario:" disabled></div><div class="col-xs-2"> <input id="salario" name="salario" type="text" class="form-control" placeholder="Ingresar Salario" required autofocus /></div></div>
            <br /><div class="row"><div class="col-xs-6"><h5 class="text-center"><input class="form-control" name="rol" id="disabledInput" type="text" value="ROL:" style="text-align:center" disabled></h5></div></div>
            <br /><div class="row"><div class="col-xs-2"><input type="radio" name="rol" id="Administrador" value="1"><label for="Administrador"><h5 class="text-center">Administrador</h5></label></div><div class="col-xs-2"><input type="radio" name="rol" id="Cajero" value="2"><label for="Cajero"><h5 class="text-center">Cajero</h5></label></div><div class="col-xs-2"><input type="radio" name="rol" id="Repartidor" value="3"><label for="Repartidor"><h5 class="text-center">Repartidor</h5></label></div></div>
            <br /><div class="row"><div class="col-xs-4"></div><div class="col-xs-2"><button class="btn btn-default" type="submit">Registrar Empleado</button></div></div>
                 </form>   
            </div>
      </div>
     	
</body>
</html>