
<?php session_start();?>
<?php ob_start() ?> 
<?

include('Connections/banco.php');

$conex = conectar();

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <title>Hipogrifo</title>
    <style>
      body{
        background: #697279
      }
      .bg-azul{
        background: #0a1635;
      }
    </style>
  </head>
  <body>
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4   text-light"> 
               <div class="bg-azul text-center mt-4 p-4 rounded-start">
               
               <img src="img/hipogrifo_logo.svg" alt="logo" />
                <p class="h4 fw-bold py-4">
                    Entre com suas informações pessoais, para começar sua jornada conosco !
                </p>
                <a href="cadastro.php">
                    <a href="login.php"  class="btn btn-light btn-lg">Login</a>
                </a></div>



        
        </div>
        <div class="col-md-6">
        
        <div class="bg-light  mt-4 p-4 rounded-end">
               
              
         <h1 class="text-center">Cadastro</h1>    


<?php 	
      if(@$_POST['nome']){
								 //Capturando arquivos do Formulário
	      $tipo	    =   $_POST['tipo'];
	      $nome		  =   $_POST['nome'];
	      $cpf		  =   $_POST['cpf'];
	      $email		=   $_POST['email'];
	      $senha		=   md5($_POST['senha']);
	     
    
	      
		  //Inserir dados no banco     
		$dadosAdd = $conex->prepare('INSERT INTO usuario (cpf, nome, email, senha, tipo, status) VALUES (?, ?, ?,  ?, ?, 1 )');
		$dadosAdd ->bindValue(1, $cpf, PDO::PARAM_STR);
		$dadosAdd ->bindValue(2, $nome, PDO::PARAM_STR);
		$dadosAdd ->bindValue(3, $email, PDO::PARAM_STR);
		$dadosAdd ->bindValue(4, $senha, PDO::PARAM_STR);
		$dadosAdd ->bindValue(5, $tipo, PDO::PARAM_STR);
		 
		 
		$dadosAdd ->execute();
		
		if($dadosAdd->rowCount() > 0){
 
			  header("Location: login.php?salvo=ok");
 
		} else {  
				echo '<div class="alert alert-danger" role="alert">
       Erro ao salvar as informações
      </div>';
			  
			 print_r($dadosAdd->errorInfo());

		};
	 
 
							 
				 }
?>



<form class="row g-3 needs-validation" novalidate  method="post" >
  <div class="col-md-12">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text" name="nome" class="form-control" id="nome" value="" required>
  
  </div>
  <div class="col-md-12">
    <label for="cpf" class="form-label">*CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="" required>
 
  </div>
   
  <div class="col-md-6">
    <label for="email" class="form-label">*Email</label>
    <input type="email" name="email" class="form-control" id="email" required>
 
  </div>
  
  <div class="col-md-6">
    <label for="senha" class="form-label">*Senha</label>
    <input type="password" name="senha" class="form-control" id="senha" required>
   
  </div>

  <div class="col-md-12">
    <label for="tipo" class="form-label">Tipo</label>
    <select class="form-select" name="tipo" id="tipo" required>
      <option value="">Selecione...</option>
      <option value="1">Administrador</option>
      <option value="2">Aluno</option>
      <option value="3">Professor</option>
    </select>
     
  </div>

 
  <div class="col-12 text-center">
  <div class="d-grid gap-2">
    <button class="btn btn-primary bnt-lg" type="submit"> <i class="fas fa-save"></i> Salvar</button>
  </div>
  </div>
</form>





      </div>
    </div>


    <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
  
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.mask.js"></script> 

      <script>


$(document).ready(function(){
    
    $('#cpf').mask('000.000.000-00' , {clearIfNotMatch: true} );  
    
});
  

      // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>