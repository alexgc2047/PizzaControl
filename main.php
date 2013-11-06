<?php 
    session_start(); 
    include('funciones.php');
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
<title>Sistema de Control</title>
<?php 
    if (!isset ($_SESSION['user']))
    {
        header("location:index.php?inf=err2");
    }
?>
</head>

<body>
    <?php
        $f = new funciones();
        $f->timeOut();
        echo $f->printHeader();
        echo $f->checkSession($_SESSION['tipo']);
     ?>
</body>
</html>