<?php
function conectar(){
	
	 try
		{
			$conex = new PDO('mysql:host=127.0.0.1;dbname=hipogrifo', 'javaApp', '123456789');	
			$conex -> exec("SET CHARACTER SET utf8");
			date_default_timezone_set('America/Sao_Paulo');
		}
	catch(PDOException $e)
		{
			throw new PDOException($e);
		} 
		return $conex;
}
  