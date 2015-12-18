  <?php require '../template/topouser.php';
  
include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';
  
  ?>
           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 8%; margin-bottom: 10%;">
    <div class="col-md-2 col-sm-1 col-xs-2"></div>
    <div class="col-md-4 col-sm-5 col-xs-12" >
        <center>
        <div class="jumbotron" style=" background: white; border: 2px greenyellow solid;">
        <img src="../resources/img/formu.png" width="200px" height="200px" class="img-resposive"/>
        <a href="<?php 
        
        //VERIFICAR COMO ATUALIZAR OS DADOS DA SESSION
        $id =  $_SESSION['id'];
        
        $dao = new DaoUsuario();
        $user = $dao->buscarPorId($id);
        
        if($user->getRespondeu() === "sim"){
            
            echo "principal.php?respondeu=sim";
            
        }else{
           
             echo "formulario.php";
        }
        
        ?>" title="Responder o formulário" class="btn btn-success btn-lg">
        <span class="glyphicon glyphicon-pencil"></span>    
            Responder</a>
        </div>
        </center>
    </div>
    <div class="col-md-4 col-sm-5 col-xs-12" >
        <center>
            <div class="jumbotron" style=" background: white; border: 2px greenyellow solid;">
            <img src="../resources/img/lupa.png" width="200px" height="200px" class="img-resposive"/>
            <a href="respostas.php" title="Ver os resultados" class="btn btn-success btn-lg">
            <span class="glyphicon glyphicon-search"></span>    
                Visualizar</a>
            </div>
        </center>
    </div>
    <div class="col-md-2 col-sm-1 col-xs-2"></div>
    </div>  
    

        
    <?php require '../template/rodape.php'; ?>

        <?php 
    
        if(isset($_GET["respondeu"])){
            if($_GET["respondeu"] === "sim"){
                
                echo "<script type='text/javascript'>";
    
                       echo "alert('O Formulário ja foi respondido. Obrigado!');";
                       echo "location.href='http://localhost/questionario/aluno/principal.php';";

                echo "</script>";
              
            }
            
        }
    
    ?>

