    <?php 
    session_start();
    include ('funciones.php');
    header('Content-Type: text/html; charset=utf-8');
    $numero = $_REQUEST['num'];
    $bd = new bd();
    $bd->load();
    $bd->query("SET NAMES 'utf8' ");
    $q = 'SELECT * FROM `cliente` WHERE `Telefono` ="'.$numero.'" LIMIT 1';
    $r = $bd->query($q);
    $n = $bd->rows($r);
    if ($n == 1)
    {
        $cliente = $bd->toObject($r);
        $q = 'SELECT * FROM `pedido` WHERE `ClienteFK`='.$cliente->ClientePK;
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
                    <h2 class="text-center">INFORMACI&Oacute;N DEL CLIENTE</h2>
                    <div>
                        <div class="row"><div class="col-xs-1"><h5>ID: </h5></div><div class="col-xs-4"><input class="form-control" name="ClientePK" id="disabledInput" type="text" value="'.$cliente->ClientePK.'" disabled></div></div>
                        <br /><div class="row"><div class="col-xs-1"><h5>Nombre: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$cliente->Nombre.'" disabled></div></div>
                        <br /><div class="row"><div class="col-xs-1"><h5>Domicilio: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$cliente->Calle.' '.$cliente->Numero.', '.$cliente->Colonia.', CP: '.$cliente->CP.'" disabled></div></div>
                        <br /><h5>Historial: </h5><textarea cols="40" rows="5" class="form-control" id="disabledInput">'.$temp.'</textarea disabled>
                        <br /><div class="row"><div class="col-xs-1"><h5>Telefono: </h5></div><div class="col-xs-4"><input class="form-control" id="disabledInput" type="text" value="'.$cliente->Telefono.'" disabled></div></div>
                    </div>
                    <br />
                    <form action="pedidos.php" method="post">
                        <button type="submit" class="btn btn-default">Siguiente</button>
                    </form>
            </div>';
    }
    else
    {
        echo '<br /><div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>Error!</h4>
                        <p>
                                Error Usuario No Registrado
                        </p>
                    </div>';
    }
?>