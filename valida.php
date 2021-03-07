<?php session_start();?>
<?php ob_start() ?> 
<?

include('Connections/banco.php'); 
$conex = conectar();

 
function cod($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
{
	$lmin = 'abcdefghijklmnopqrstuvwxyz';
	$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$num = '1234567890';
	$simb = '!@#%*-';
	$retorno = '';
	$caracteres = '';

	$caracteres .= $lmin;
	if ($maiusculas) $caracteres .= $lmai;
	if ($numeros) $caracteres .= $num;
	if ($simbolos) $caracteres .= $simb;

	$len = strlen($caracteres);
	for ($n = 1; $n <= $tamanho; $n++) {
	$rand = mt_rand(1, $len);
	$retorno .= $caracteres[$rand-1];
	}
	return $retorno;
}


 
if (isset($_POST['email'])) {
	 

  $email			=	addslashes(trim($_POST['email']));
  $senha			=	md5($_POST['senha']);
	 

  $MM_cod 					= cod(15, true, true, true);
  $data 					= date("Y-m-d H:i:s");  
 	 
	
	
	$dados = $conex->prepare('SELECT email, senha FROM usuario WHERE email = ?  AND senha = ?');
  
	$dados->bindValue(1, $email, PDO::PARAM_STR);
	$dados->bindValue(2, $senha, PDO::PARAM_STR);
	$dados->execute();

 	if($dados->rowCount() > 0){
			
		    $_SESSION['email']  	= $email;
			$_SESSION['codigo'] 		= $MM_cod;	
		
		
		
		$dadosUp = $conex->prepare('UPDATE usuario SET  valida = ? WHERE email = ? '); 
		$dadosUp ->bindValue(1, $MM_cod, PDO::PARAM_STR);
		$dadosUp ->bindValue(2, $email, PDO::PARAM_STR);
		 
		$dadosUp ->execute(); 
		if($dadosUp->rowCount() > 0){
			 header("Location: index.php" );
		}
		
		
		
		
		
	} else {
	 
		
		 header("Location: login.php?login=false" );
	}
  
} else {
	echo '404 - Erro';
}	
 