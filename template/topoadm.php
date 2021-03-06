<html >
    <head>
        <title>Questionário de Egressos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../resources/js/jspdf.debug.js"></script>
        <script src="../resources/js/html2canvas.js"></script>
        <script src="../resources/js/paginacao.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        

        <?php
        // esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php. 
            session_start();
        
        if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('location:http://localhost/questionario/index.php');
        }
      

        $logado = $_SESSION['nome'];
        $logadoSenha = $_SESSION['senha'];
        $logadoId = $_SESSION['id'];
        $logadoCpf = $_SESSION['cpf'];
        $logadoEmail = $_SESSION['email'];
        $logadoTelefone = $_SESSION['telefone'];
        
        
        ?>

        


    </head>
    <body  >
        <div class="container-fluid " style="background-color: #f8f8f8;" >

            <!-- Pagina do menubar -->
            <div class="row" >
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header" style="min-height: 100px;">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBarUser">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span> 
                                </button>
                                <a class="navbar-brand" style="color: teal;" href="#"><img  src="../resources/img/questionario_logo.png" alt="Questionário de Egressos" style="max-height: 64px;" class="img-responsive" /></a>
                            </div>
                            <div class="collapse navbar-collapse" id="navBarUser">

                                <ul class="nav navbar-nav navbar-right" style="margin-top: 50px;" >
                                    <li><a href="#"><span class="label" style="color: black;"><?php echo "Seja Bem vindo $logado"; ?></span></a></li>
                                    <li><a href="../adm/perfil.php"><span class="glyphicon glyphicon-user" style="color: teal;">Perfil</span></a></li>                                           
                                    <li><a href="../visao/logout.php"><span class="glyphicon glyphicon-log-out" style="color: teal;">Sair</span></a></li>            
                                </ul>
                            </div>

                        </div>
                    </nav>                                    
                    <br />
                    <ul class="nav nav-tabs nav-justified">
                        <li role="presentation"><a href="../adm/gerenciar.php"><span class="glyphicon glyphicon-home"> </span> Principal</a></li>
                        <li role="presentation"><a href=../adm/cadastro.php><span class="glyphicon glyphicon-pencil"></span> Cadastrar</a></li>                   
                        <li role="presentation"><a href="../adm/respostas.php"><span class="glyphicon glyphicon-search"> </span>  Visualizar</a></li>
                       <li role="presentation"><a href="../adm/email.php"><span class="glyphicon glyphicon-envelope"> </span>  Email</a></li>                 
                    </ul>
                    
                </div>
            </div>  
            
