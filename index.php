<?php session_start();?>
<?php ob_start() ?>


<?php include ('Connections/banco.php');   ?>
<?php $conex = conectar(); ?>

<?php include ('VerificarSession.php');  ?>


<?php 
 $logoutAction = "index.php?doLogout=true";

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){

	  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_Cod'] = NULL;
 
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_Cod']);
 
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
	
} 


?>


<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="css/lista-de-usuarios.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <!--load all styles -->

    <title>Hipogrifo</title>
    <style>
    .bg-azul {
        background: #0a1635;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3   text-light">
                <div class="bg-azul  mt-4 p-4 rounded-start">

                    <img src="img/hipogrifo_logo.svg" class="img-fluid" alt="logo" />
                    <p class="text-center mt-4"> Olá
                        <? echo $nome_usuario ?>
                    </p>

                    <div class="list-group mt-4">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            MENU
                        </a>
                         <a href="index.php?pag=usuarios" class="list-group-item list-group-item-action">Usuários</a>
                        <a href="index.php?pag=matrizes" class="list-group-item list-group-item-action">Matrizes</a>
                        <a href="index.php?doLogout=true" class="list-group-item list-group-item-action"><i
                                class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>





                </div>




            </div>
            <div class="col-md-9">

                <div class="bg-light  mt-4 p-4 rounded-end">

                    <?php
 
                        if (!empty($_GET['pag'])){
                        $pagina = "includes/" . $_GET['pag'].".php";
                        if (empty($pagina)) include "includes/404.php";
                        else {
                        if (file_exists($pagina)) include $pagina;
                        else { include "includes/404.php"; }
                            }
                        }
                        else {
                            include "includes/resumo.php";
                            }
                    ?>


                </div>
            </div>

            <!-- Optional JavaScript; choose one of the two! -->
            <script src="https://code.jquery.com/jquery-2.2.4.js"
                integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>


            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="bootstrap/js/bootstrap.bundle.min.js""></script>
    <script src=" js/jquery.mask.js"></script>

            <script>
            $(document).ready(function() {

                $('#cpf').mask('000.000.000-00', {
                    clearIfNotMatch: true
                });

            });

            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
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