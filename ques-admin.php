<?php 


session_start();

require_once './template/topo.php'; 
include_once  './dao/DaoUsuario.php';
include_once './entidades/Usuario.php';
include_once './banco/Conexao.php';

?>



<script type="text/javascript">
    
    function teste()
    {
        
              
       
        
    }
    
    $('#btnLogar').click(function () {
        
         alert("foi sim");
        
    });
    
   
    
    
</script>


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 5%; margin-bottom: 5%; " >
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    
    <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top: 1%; margin-bottom: 5%;" >

        <div class="jumbotron" style=" background: white; border: 2px #e7e7e7 solid;" >
            
            <fieldset>
                <legend><h3 style="color: graytext;">Login</h3></legend>
                <center>
                <h5 style="color: graytext;">
                    Informe seu e-mail e sua senha
                </h5>
                </center>
                <br />
                
                <!-- MENSSAGEM DE ERRO -->
                <div id="messageError"></div>
                
                <form id="frmLogin" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" role="form"  >
                    <input type="hidden" name="acao" value="login" />
                    <div class="form-group">
                        <label for="email">Seu email:</label>
                        <input type="email" required="true" placeholder="Insere o seu email" class="form-control" id="email" name="email" />
                    </div>
                    <div class="form-group">
                        <label for="email">Sua senha:</label>
                        <input type="password" required="true" placeholder="Insere sua senha" class="form-control" id="senha" name="senha" />
                    </div>
                    <center>
                        <div class="btn-group">
                            <button id="btnLogar" id="btnLogar" type="submit" class="btn btn-success btn-lg">
                                <span class="glyphicon glyphicon-ok"></span>
                                Logar</button>                             
                        </div>
                    </center>
                </form>
            </fieldset>  
            <hr>
            <div style="float: right;">
                <a href="index.php" title="Voltar a pagina incial" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-share"></span>
                                Pagina inicial</a>
            </div>
        </div>
        

    </div>
    
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
</div> 

<?php

require_once './visao/componentes.php';
require_once './template/rodape.php';

//logar usuario
if(isset($_POST['acao'])){
        
        if($_POST['acao'] == "login")
        {

            
            //VALIDAÇÃO DOS DADOS
            if(isset($_POST["email"])){
                $email = $_POST["email"];
            }

            if(isset($_POST["senha"])){
                $senha = $_POST["senha"];
            }

            //USUARIO MASTER
            if($email == "ifpr@edu.br" && $senha == "root"){


                $_SESSION['nome'] = "Moderador";

                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;

                //VARIAVEL DE VERIFICAÇÃO DO LOGI... saber se é adm ou usuario
                $_SESSION['tipo'] = "adm";

                echo "ifpr";

            }
            else{

            try{

            $dao = new DaoUsuario();
            $user = $dao->buscarPorEmailSenha($email, $senha);


            if($user->getId() > 0){

                //ENVIO DE DADOS PELA SEÇÃO
                $_SESSION['nome'] = $user->getNome();
                $_SESSION['id'] = $user->getId(); 
                $_SESSION['senha'] = $user->getSenha();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['cpf'] = $user->getCpf();
                $_SESSION['telefone'] = $user->getTelefone();
                $_SESSION['liberado'] = $user->getLiberado();
               // $_SESSION['tipo'] = $user->getTipo();
                $_SESSION['qtdResponde'] = $user->getQtdResponde();
                $_SESSION['idCurso'] = $user->getIdCurso();



                //VARIAVEL DE VERIFICAÇÃO DO LOGI... saber se é adm ou usuario
                $_SESSION['tipo'] = "adm";


               // echo "sucess";
                
                echo "<script type='text/javascript'>";
    
                echo "location.href='http://localhost/questionario/adm/gerenciar.php';";

                echo "</script>";



            }
            else
            {

                unset ($_SESSION['email']);
                unset ($_SESSION['senha']);

               // echo "erro";
                
                echo "<script type='text/javascript'>";
                
                echo "$('#modalMsgErroLogin').modal('show');";
                //echo "alert('Login incorreto, tente novamente!');";
               // echo "location.href='http://localhost/questionario/ques-admin.php';";

                echo "</script>";


            }


            } 
            catch (Exception $e){

               //echo "erroException";
                
                echo "<script type='text/javascript'>";
                
                echo "$('#modalMsgErroException').modal('show');";
                //echo "alert('Estamos com problemas, tente mais tarde!');";
                echo "location.href='http://localhost/questionario/ques-admin.php';";

                echo "</script>";
            }
            }
            
        }
        
        
        
    }

?>

