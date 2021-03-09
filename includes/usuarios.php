<?
 
 
if (@$_GET['item'] == 'deletar' ) {  
	 
		$id 		= $_GET['id'];
		$queryDel 	= $conex->prepare('DELETE FROM usuario WHERE id = ?');
		$queryDel->bindValue(1, $id, PDO::PARAM_STR);
		if($queryDel->execute()){
			echo '<div class="alert alert-success" role="alert">
			Removido com sucesso.
			</div>';
		}
 				    
				
 }

?> 

<?php   if ($_GET['pag'] == 'usuarios' && @$_GET['item'] == 'editar' ) { ?>

<div class="content">
		
		<div class="container-fluid">
			     <div class="row justify-content-end">
                    <div class="col-md-12 text-end">
                       
                       <a href="index.php?pag=usuarios" >
                       <button class="btn btn-primary btn-fill pull-right">
                       <b><i class="fa fa-angle-left" aria-hidden="true"></i> VOLTAR PARA USUÁRIOS</b>
                       </button>

                       </a>
                 



					</div>
                  </div>
                   <br>
				 <div class="row">
            		<div class="col-md-12">
                	 
                            
                      
						<h4 class="title"><b>EDITAR USUÁRIO</b></h4><hr />
                          
							 

						<?php 	
						 
						$id = $_GET['id'];

						$result = "SELECT * FROM usuario WHERE id=$id";
						 

						$query = $conex->prepare($result);
						$query->execute();

						while($row = $query->fetch(PDO::FETCH_ASSOC)){  
								 
									$nome 			= $row['nome'];
									$email 			= $row['email']; 
									$tipo			= $row['tipo'];
									$cpf			= $row['cpf'];
									$senha			= $row['senha'];

						}

							if(@$_POST['atl']){
							  
							   $tipo  		= $_POST['tipo'];  
							   $nome    	= $_POST['nome'];
							   $email   	= $_POST['email'];
							   $cpf 		= $_POST['cpf']; 


						$dadosEdt = $conex->prepare('UPDATE usuario SET tipo = ?,  nome=?, email=?, cpf=? WHERE id=?');
						$dadosEdt->bindValue(1, $tipo, PDO::PARAM_STR);
						$dadosEdt->bindValue(2, $nome, PDO::PARAM_STR);
						$dadosEdt->bindValue(3, $email, PDO::PARAM_STR);
						$dadosEdt->bindValue(4, $cpf, PDO::PARAM_STR); 
					
						$dadosEdt->bindValue(5, $id, PDO::PARAM_STR);
						$dadosEdt->execute();


						if($dadosEdt->rowCount() > 0){

							header("Location: index.php?pag=usuarios&salvo=ok");


						} else {  

							echo '<div class="alert alert-danger" role="alert">
							Erro ao salvar as informações
						   </div>';
								   
							print_r($dadosEdt->errorInfo());

						}





							}	




						?>
						 
<form class="row g-3 needs-validation" novalidate  method="post" >
  <div class="col-md-12">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text" name="nome" class="form-control" id="nome" value="<? echo $nome ?>" required>
  
  </div>
  <div class="col-md-12">
    <label for="cpf" class="form-label">*CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="<? echo $cpf ?>" required>
 
  </div>
   
  <div class="col-md-12">
    <label for="email" class="form-label">*Email</label>
    <input type="email" name="email" class="form-control" id="email" value="<? echo $email ?>" required readonly>
 
  </div>
  
 

  <div class="col-md-12">
    <label for="tipo" class="form-label">Tipo</label>
    <select class="form-select" name="tipo" id="tipo" required>
      <option value="">Selecione...</option>
      <option value="1" <? if($tipo == 1) { echo 'selected'; } ?> >Administrador</option>
      <option value="2" <? if($tipo == 2) { echo 'selected'; } ?> >Aluno</option>
      <option value="3" <? if($tipo == 3) { echo 'selected'; } ?> >Professor</option>
    </select>
     
  </div>
						
					 
 
						
						
 
			 


			 
				<div class="col-md-9 mt-4">
				  <input type="submit" class="btn btn-primary btn-fill " name="atl"  value="ATUALIZAR">

				  <a href="?pag=usuario" class="btn btn-info btn-fill"> CANCELAR </a>  
				</div>
				 



					</form>




							</div>
						</div>
					</div>
		
				</div>
		</div>	
		
		
</div>


<?php } else if ($_GET['pag'] == 'usuarios' && @$_GET['item'] == 'senha' ) {  

			$id 	= $_GET['id'];  
			$query = $conex->prepare('SELECT * FROM usuario WHERE id= ?');
			$query->bindValue(1, $id, PDO::PARAM_INT);
			$query->execute(); 
	  		while($listar = $query->fetch(PDO::FETCH_ASSOC)){ 
		  			 $nome_edi	 	= 	$listar['nome']; 
				
			  }
		
			if(@$_POST['senha_seg']){
			 	
 
		 
 		$senha = md5($_POST['senha_seg']);
  
		$dadosAdd = $conex->prepare('UPDATE usuario  SET senha = ? WHERE id = ?');
 
 		$dadosAdd ->bindValue(1, $senha, PDO::PARAM_STR);
 	 
		$dadosAdd ->bindValue(2, $id, PDO::PARAM_STR);
 				
		$dadosAdd ->execute();

		if($dadosAdd->rowCount() > 0){

			header("Location: index.php?pag=usuarios&salvo=ok");


		} else {  

			echo '<div class="alert alert-danger" role="alert">
			Erro ao salvar as informações
		   </div>';
				   
			print_r($dadosEdt->errorInfo());

		}
				
 
				
			 
			 

 
			}	// send post
			
				  
		?>	
		
		

<div class="content">
			<div class="container-fluid">
			<div class="row justify-content-end">
				
				<div class="col-md-12 text-end">
					</div>
  						<div class="col-md-6 text-right">
							
							<a href="index.php?pag=usuarios">
								
						<button class="btn btn-primary btn-fill pull-right">   <b><i class="fa fa-angle-left" aria-hidden="true"></i> VOLTAR PARA USUÁRIOS</b>
                       </button>
							</a>	 

						</div>	
					</div>
			<br>
				<div class="row justify-content-center">
					 
					<div class="col-md-6">

 
                  
<h1><b>EDITAR SENHA</b></h1><hr />
                    




						 
<form class="row g-3 needs-validation" novalidate  method="post" >          
                                        	    
<div class="row">

	<div class="col-md-12">
		<div class="form-group">
			<label>Nome:</label>
			<input type="text" class="form-control" placeholder="..." name="nome" value="<? echo $nome_edi?>" required="" aria-required="true" disabled  >

		</div>
	</div>

</div>
 
 		
<div class="row">
	
	
	
	
<div class="col-md-12">
	<div class="form-group">
		<label>Senha:</label>
		<input type="password" id="password" class="form-control" placeholder="..." name="senha_pri" required="" aria-required="true"  >
		 
	</div>
</div>
	
	
	</div>		
 		
 <div class="row">
	
	
	
	
<div class="col-md-12">
	<div class="form-group">
		<label>confirmar a senha:</label>
		<input type="password" class="form-control" placeholder="..." name="senha_seg" >
		 
	</div>
</div>
	
	

  
                              
<div class="col-md-12 mt-4 ">
<input type="submit" class="btn btn-primary btn-fill " name="atl" value="ATUALIZAR">

<a href="?pag=usuarios" class="btn btn-info btn-fill"> CANCELAR </a>  
</div>

</div>	
	
	                                               
                                                             
                                                                               
                                 
                                    
                                    
								
                                    
                                    
	</form>       
                
             

						</div>
					</div>
				</div>	
			</div>
		</div> 

<?php } else if ($_GET['pag'] == 'usuarios') { ?>   
	 
 
		 
					<div class="row">
            		<div class="col-md-12">
             
                  
					<h1><b>USUÁRIOS</b></h1><hr />
                    

<? if(@$_GET['salvo'] == "ok" ) { ?>
<div class="alert alert-success" role="alert">
Usuário Salvo com sucesso.
</div>
<? } ?>

	 
         
   
                       
			  <table class="table">
         
              <thead>
                <tr>
                  <th>ID</th>
				  <th>Nome</th>
				  <th>Usuário</th>
				  <th>Nivel de acesso</th> 
				  <th>Ações</th>
                </tr>
              </thead>

<?php  
		$query = $conex->prepare("SELECT * FROM  usuario   ORDER BY id DESC");
		$query ->execute();
		while($listar = $query->fetch(PDO::FETCH_ASSOC)){  
	

		$id 			= $listar['id'];
		$nome	    	= $listar['nome'];
		$email		= $listar['email'];
		$tipo  			= $listar['tipo'];
	 
 
	if($tipo == 1){
		$tipo_user1 = "Administrador";
	}
	else if($tipo == 2){
		$tipo_user1 = "Aluno";
		}
	else if($tipo == 3){
		$tipo_user1 = "Professor";
	}	
 
?>                       

		<tbody>
			<tr>
				<td><?php echo $id ?></td>
				<td><?php echo $nome ?></td>
				<td><?php echo $email ?></td>
				<td><?php echo $tipo_user1 ?></td> 
				<td>
             
                    
                
                                                 
							<a href="index.php?pag=usuarios&item=senha&id=<?php echo $id ?>" title="Editar Senha" class="btn btn-primary ">  <i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</a> 


						 <a href="index.php?pag=usuarios&item=editar&id=<?php echo $id ?>" title="Editar Senha" class="btn btn-primary ">  <i class="fa fa-edit" aria-hidden="true"></i>
						 </a> 


		 				
				 
						  <a href="index.php?pag=usuarios&item=deletar&id=<?php echo $id ?>"  class="btn btn-warning " onclick="return confirm('Tem certeza que deseja apagar?')">
						  <i class="fas fa-trash-alt"></i>
						  </a>
					 
                                       
                    
                    
				</td>
			</tr>
		<?php	}  ?>        
		</tbody>
</table>
 
 	 
         
   
    
        	</div>
 
    	</div> 	
        
 
    
<?php } ?>
