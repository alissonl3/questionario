
<?php 

        
session_start();
 


require_once './template/topo.php';
include_once  './dao/DaoUsuario.php';
include_once './entidades/Usuario.php';
include_once './banco/Conexao.php';

$daoUsuario = new DaoUsuario();

?>


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 5%; margin-bottom: 5%; " >
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    
    <div class="col-md-8 col-sm-8 col-xs-8" style="background-color: white; border: 2px #e7e7e7 solid; border-radius: 10px; padding: 20px; margin-top: 10px;" >
        
        <div id="pergunta" style="color: graytext;">
            <center>
                <div style="float: left;">
                <button  title="Ajuda" class="btn btn-info btn-sm" style="border-radius: 30px;">
                                <span class="glyphicon glyphicon-comment"></span>
                                 </button>
         </div>
         <div style="clear: both;"></div>
         <br />
                <p style="color: red;">
                    Para desbloquear o acesso ao formulário informe seu cpf abaixo
                </p>
                <form id="fmrLiberarQuestionario" method="POST" role="form" >
                    <input type="hidden" name="acao" value="liberarQuestionario" />
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">CPF</span>
                            <input type="text" required="true" class="form-control" placeholder="informe o cpf" name="cpfInformar" aria-describedby="basic-addon1">
                        </div> 
                        <br />
                        <center>
                            <div class="btn-group">
                                <button type="submit"  class="btn btn-success btn-lg">
                                <span class="glyphicon glyphicon-ok"></span>
                                Confirmar</button>
                            </div>
                            
                        </center>
                    </form>
            </center>
            
        </div>
        
        <div id="modalResponder" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal corpo-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">VALIDAÇÃO</h4>
                </div>
                <div class="modal-body">
                    
                 
                    
          
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        
        
        <br />


        <hr />
        
        <div id="email" style="color: graytext; float: right;"  >
            
            <div style="float: left;">
            <a href="email.php" title="Recuperar sua senha" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-envelope"></span>
                                E-mail</a>
            </div>
           
        
        </div>
        

    </div>
    
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
</div> 

<?php

require_once './visao/componentes.php';

if(isset($_POST['acao'])){
        
        if($_POST['acao'] == "liberarQuestionario")
        {

            try
            {
                
            $user = $daoUsuario->buscarPorCPF($_POST['cpfInformar']);
            
            if($user->getId() != null && $user->getId() != 0)
            {
                
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
                $_SESSION['tipo'] = "aluno";


               // echo "sucess";
                
                echo "<script type='text/javascript'>";
    
                //echo "alert('Cpf valido!');";
                echo "location.href='http://localhost/questionario/aluno/formulario.php';";

                echo "</script>";
                
            }
            else
            {
                
                unset ($_SESSION['email']);
                unset ($_SESSION['senha']);
                
                echo "<script type='text/javascript'>";
               
                echo "$('#modalMsgErroLoginCpf').modal('show');";
                //echo "alert('Cpf inválido!');";

                echo "</script>";
                
            }
            
            
            }
            catch (Exception $erro)
            {
             
             echo "<script type='text/javascript'>";
    
             echo "$('#modalMsgErroException').modal('show');";
             //echo "alert('Estamos com prblemas, tente mais tarde!');";

             echo "</script>";
                
                
            }
            
        }
        
        
        
    }

require_once './template/rodape.php';
?>

