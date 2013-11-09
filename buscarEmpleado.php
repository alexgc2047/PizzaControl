<?php 
    session_start();
    include ('funciones.php');
    header('Content-Type: text/html; charset=utf-8');
    $nom = $_REQUEST['nombre'];
    $bd = new bd();
    $bd->load();
    $bd->query("SET NAMES 'utf8' ");
    $q = 'SELECT * FROM `empleado` e inner join `tipo` t on t.TipoPk=e.TipoFK WHERE `Nombre` ="'.$nom.'" LIMIT 1';
    $r = $bd->query($q);
    $n = $bd->rows($r);
    if ($n == 1)
    {
        $empleado = $bd->toObject($r);
        $q = 'SELECT * FROM `pedido` WHERE `EmpleadoFK`='.$empleado->EmpleadoPK;
        $r = $bd->query($q);
        $temp = "";
        if($bd->rows($r) > 0)
        {
            while($historial = $bd->toObject($r))
            {
                $temp .= $historial->Informacion;
                $temp .= " - ".$historial->Costo;
            }
            
        }
        else
        {
            $temp = "Sin información a presentar";
        }
            echo '<div class="container">
                    <h2 class="text-center">INFORMACI&Oacute;N DEL EMPLEADO</h2>
                    <div>
                        <div class="row"><div class="col-xs-1"><h5>ID: </h5></div><div class="col-xs-4"><input class="form-control" name="EmpleadoPK" id="disabledInput" type="text" value="'.$empleado->EmpleadoPK.'" disabled></div></div>
                        <br /><div class="row"><div class="col-xs-1"><h5>Nombre: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$empleado->Nombre.'" disabled></div></div>
                        <br /><div class="row"><div class="col-xs-1"><h5>Domicilio: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$empleado->Calle.' #'.$empleado->Numero.', '.$empleado->Colonia.', CP: '.$empleado->CP.'" disabled></div></div>
                        <br /><h5>Historial: </h5><textarea cols="40" rows="5" class="form-control" id="disabledInput">'.$temp.'</textarea disabled>
                        <br /><div class="row"><div class="col-xs-1"><h5>Telefono: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$empleado->Telefono.'" disabled></div></div>
					    <br /><div class="row"><div class="col-xs-1"><h5>Horario: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$empleado->Horario.'" disabled></div></div>
					    <br /><div class="row"><div class="col-xs-1"><h5>Salario: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$empleado->Salario.'" disabled></div></div>
					    <br /><div class="row"><div class="col-xs-1"><h5>Rol: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$empleado->Descripción.'" disabled></div></div>
                    </div>
            </div>';
    }
    else
    {
        echo '<br /><div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>Error!</h4>
                        <p>
                                Error Empleado No Registrado
                        </p>
                    </div>';
    }
?>