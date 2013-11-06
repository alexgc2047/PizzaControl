<?php
class funciones
{
    function timeOut()
    {
        if (($_SESSION['hora'] + 600) < time())
        {
            session_unset();
            session_destroy();
            header('location:index.php?inf=err3');
        }
        else
        {
            $_SESSION['hora']=time();
        } 
    }
    function checkLogin($inf)
    {
        if($inf == 'err')
        {
            return '<div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>Error de Autenticación!</h4>
                        <p>
                                Error de Usuario/Contraseña. <br />Inserta nuevamente tu información y asegurate que sea correcta.
                        </p>
                    </div>';
        }
        else if ($inf == 'err2')
        {
            return '<div class="alert alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4>Error de Autenticación!</h4>
                            <p>
                                No ha iniciado sesión.
                                Por favor, escriba su información y de clic en Iniciar Sesión.
                            </p>
                    </div>';
        }
        else if ($inf == 'err3')
        {
            return '<div class="alert alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4>Error de Autenticación!</h4>
                        <p>
                            El tiempo de sesión terminó.
                            Por favor, introduzca su información y haga clic en Iniciar Sesión.
                        </p>
                    </div>';
        }
        else if($inf == 'out')
        {
            return '<div class="alert alert-success fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4>Cierre Sesi&oacute;n!</h4>
                        <p>
                            Sesión terminada.<br /> Para volver a entrar al sistema escriba su informaci&oacute; nuevamente.
                        </p>
                    </div>';
        }
    }
    function checkSession($tipo)
    {
        if ($tipo == 1)
        {
            return '<!-- INICIO DEL PANEL DE REGISTRO DE NUEVO PEDIDO -->
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
                                    <button type="button" class="btn btn-primary btn-lg" onClick="registrarCliente();">Registrar Nuevo Cliente</button>
                                    <button type="button" class="btn btn-primary btn-lg" onClick="Cliente();">Buscar Cliente</button>
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
                    </div>';
        }
        else if($tipo == 2)
        {
            return '<div class="container" align="center">
                    <h2 class="modal-title"><span class="glyphicon glyphicon-tasks"></span>&nbsp;MEN&Uacute; ADMINISTRADOR</h2>
                    <br /><br /><br />
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#">&nbsp;INVENTARIO PEDIDOS&nbsp;</button>
                    &nbsp; &nbsp;
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#">&nbsp;EMPLEADOS&nbsp;</button>
                </div>';
        }
    }
    function printHeader()
    {
        return '<div class="container" style="border:double">
                <div>
                    <h5 class="text-left"> 
                        <span class=\'glyphicon glyphicon-user\'>&nbsp;</span><b>Ahora en sesi&oacute;n:</b> '.$_SESSION['name'].'
                    </h5>
                </div>
                <div class="navbar-form" align="right">
                    <form action="logout.php" method="post">
                        <button type="submit" class="btn btn-danger">Cerrar Sesi&oacute;n</button>
                    </form>
                </div>
            </div>
            <br /> <br />';
    }
}
class bd
{
    //Atributos
    var $conexion;
    var $baseDeDatos;
    var $server;
    function open($servidor = 'localhost')
    {
        $this->conexion = mysqli_connect($servidor, 'AlexGC', 'alex123');
    }
    function load()
    {
        $this->open();
        $this->selectBD('pizza');
    }
    function selectBD($nombre)
    {
        if($this->conexion !=null)
            mysqli_select_db($this->conexion, $nombre);
    }
    function close()
    {
        mysqli_close($this->conexion);
    }
    function query($q)
    {
        return mysqli_query($this->conexion, $q);
    }
    function toObject($r)
    {
        return mysqli_fetch_object($r);
    }
    function rows($r)
    {
        return mysqli_num_rows($r);
    }
}
?>