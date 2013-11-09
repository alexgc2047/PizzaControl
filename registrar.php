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
    session_start();
	include ('funciones.php');
	header('Content-Type: text/html; charset=utf-8');
	
	 $f = new funciones();
       $f->timeOut();
       echo $f->printHeader();
			
    $bd = new bd();
    
	
    $nombre = $_POST['nombre'];
    $calle = $_POST['calle'];
	$numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
	$codigoP = $_POST['codigo'];
    $telefono = $_POST['telefono'];
	$horario = $_POST['horario'];
	$salario = $_POST['salario'];
    $rol = $_POST['rol'];
	///echo $rol;
	
    $bd->load();
    $bd->query("SET NAMES 'utf8' ");
		
    $q = "INSERT INTO `empleado` (`EmpleadoPK`, `Nombre`, `Calle`, `Numero`, `Colonia`, `Telefono`, `CP`, `Horario`, `Salario`, `TipoFK`) VALUES ('', '".$nombre."', '".$calle."',".$numero.", '".$colonia."', '".$telefono."', ".$codigoP.", '".$horario."', '".$salario."',".$rol.")";
		  
    $bd->query($q);
	
	$error=mysql_error();
	
	if($error){
		
		echo '<br /><div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>Error!</h4>
                        <p>
                                Error Empleado No Registrado
                        </p>
                    </div>';
		echo $error;			
		}
		else{
		  echo '<div class="alert alert-success fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4>Satisfactorio!</h4>
                        <p>
                                Empleado Registrado Satisfactoriamente
                        </p>
                    </div>';
			}
												
?>

<div class="container">
    	<h2 class="modal-title" style="text-align:center"><button class="btn btn-default" type="button" onClick="backTo('main.php');">Registrar Empleado</button></h2>
    </div>
</body>
</html>