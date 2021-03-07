<?php
			$email  		= 	@$_SESSION['email'] ;
			$codigo 		= 	@$_SESSION['codigo'];


try{
		 
		$stmt = $conex->prepare('SELECT * FROM usuario WHERE email = ?  AND valida = ?'); 
		$stmt->bindValue(1, $email,PDO::PARAM_STR);
		$stmt->bindValue(2, $codigo,PDO::PARAM_STR);
 
		$stmt->execute();
 
		if($stmt->rowCount() == 1){
			 
					  
				while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
					
				 
					   
					
						$id_usuario 			= $user['id'];
						$nome_usuario 			= $user['nome'];
						$email_usuario 			= $user['email']; 
						$tipo_usuario			= $user['tipo'];
					  
			  
						
					
				 }
			
			
		} else {
			
			$logoutGoTo = "login.php";
			header("Location: ". $logoutGoTo );
			exit(0);
	 
		}
		 
		
	}
	catch(PDOException $e) {
		return  '503 - Erro com banco de dados ';
	}