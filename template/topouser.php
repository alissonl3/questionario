<html >
    <head>
        <title>Questionário de Egressos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="./resources/css/base.css" type="text/css" />
        <link rel="stylesheet" href="./resources/css/bootstrap.min.css">
        <script src="./resources/js/jquery-2.1.4.min.js"></script>
        <script src="./resources/js/bootstrap.min.js"></script>
        
        
        <!-- COUNTDOWN -->
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
        <link rel="stylesheet" href="assets/css/styles.css" />
        <link rel="stylesheet" href="assets/countdown/jquery.countdown.css" />
 

        <?php
        // esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php. 
        session_start();
        
        if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('location:http://localhost/questionario/index.php');
        }
        if($_SESSION['tipo'] === "adm"){
             header('location:http://localhost/questionario/index.php');
        }

        $logado = $_SESSION['nome'];
        $idFormularioTopUser = $_SESSION['idFormulario'];  
        $idUsuarioTopUser = $_SESSION['id']; 
        
        ?>

        


    </head>
    <body >
       
        <div class="container-fluid " style="background-image: url(../resources/img/fundo2.jpg); min-height: 100%; background-repeat: repeat; " >

            <!-- Pagina do menubar -->
            <div class="row" >
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBarUser">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span> 
                                </button>
                                <a class="navbar-brand" style="color: teal;" href="#"><img  src="../resources/img/questionario_logo.png" alt="Questionário de Egressos" class="img-resposive" /></a>
                            </div>
                            <div class="collapse navbar-collapse" id="navBarUser">

                                <ul class="nav navbar-nav navbar-right" >
                                    <li><a href="#"><span class="label" style="color: black;"><?php echo "Seja Bem vindo $logado"; ?></span></a></li>
                                    <li><a href="../visao/logout.php"><span class="glyphicon glyphicon-log-out" style="color: teal;">Sair</span></a></li>            
                                </ul>
                            </div>

                        </div>
                    </nav>       
                </div>
            </div>  

