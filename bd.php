<?php
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