<?php
function conectar(){
	
	 try
		{
			$conex = new PDO('mysql:host=localhost;dbname=lsmsys66_hipogrifopg', 'lsmsys66_lukas', 'LAs3s1sup0rt3');	
			$conex -> exec("SET CHARACTER SET utf8");
			date_default_timezone_set('America/Sao_Paulo');
		}
	catch(PDOException $e)
		{
			throw new PDOException($e);
		} 
		return $conex;
}
  