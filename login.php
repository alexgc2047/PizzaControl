<?php 
    session_start();
    include('funciones.php');
    $bd = new bd();
    header('Content-Type: text/html; charset=utf-8');
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $bd->load();
    $bd->query("SET NAMES 'utf8' ");
    $q = "SELECT * FROM `empleado` WHERE `Usuario`='".$user."' AND `Password`='".$pass."' LIMIT 1";
    $r = $bd->query($q);
    $n = $bd->rows($r);
    if ($n == 1)
    {
        $inf = $bd->toObject($r);
        $_SESSION['user'] = $inf->Usuario;
        $_SESSION['name'] = $inf->Nombre;
        $_SESSION['tipo'] = $inf->TipoFK;
        $_SESSION['hora'] = time();
        $bd->close();
        header("location:main.php");
    }
    else
    {
        $bd->close();
        header("location:index.php?inf=err");
    }
?>