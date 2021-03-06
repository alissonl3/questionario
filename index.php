
<?php 

        
session_start();
 


require_once './template/topo.php';

include_once  './dao/DaoUsuario.php';
include_once './entidades/Usuario.php';

include_once  './dao/DaoFormulario.php';
include_once './entidades/Formulario.php';

include_once './banco/Conexao.php';

$daoUsuario = new DaoUsuario();
$daoFormulario = new DaoFormulario();

?>

<script type="text/javascript">
    // Use jQuery com a variavel $j(...)
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        
    $j('#irParaResponderFormulario').click(function() {
    //$j('body,html').animate({scrollTop:0},600);
    });
        
        
    });
</script>
    

<script>
var $ = jQuery.noConflict();
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        html: true,
        content: function() {
      return $('#pergunta').html();
    }
    });   
});
</script>   
 

<div class="row" style="margin-bottom: 20px; margin-top: 3%;" >     
<div class="col-md-12 col-sm-12 col-xs-12">      
    <center>
        <img src="./resources/img/teste4.png"  class="img-rounded img-responsive" />
    </center>
</div>
</div>

<div style="clear: both;"></div>
<div class="email" style="float: right; margin-right: 50px;">
 <a href="#" title="Email" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEmail">
                                <span class="glyphicon glyphicon-envelope"></span>
                                E-mail</a></div>
<div class="responder" style="float: right; margin-right: 5px;">
    <button class="btn btn-success btn-sm" data-toggle="popover" data-placement="top" >Responder Questionário</button>                              
</div>
<div style="clear: both;"></div>

<div id="modalEmail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
                     <button type="button" style="border-radius: 20px;" disabled="true" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-envelope"></span></button>                                  
        </h4>
      </div>
      <div class="modal-body">
          <div class="jumbotron" style=" background: white; color: graytext;">
              
        <form method="POST" role="form" >
            <input type="hidden" name="acao" value="enviarEmail" />
            <div class="form-group">
                <label  for="remetente">De:</label>
                <input type="text" placeholder="Infome seu email" required="true" class="form-control" name="remetente" />
            </div>   
            <div class="form-group">
                <label  for="assunto">Assunto:</label>
                <input type="text" placeholder="Informe o assunto" required="true" class="form-control" name="assunto" />
            </div>  
            <div class="form-group">
                <label  for="msg">Menssagem:</label>
                <textarea  placeholder="Escreva a menssagem aqui" required="true" class="form-control" name="msg" ></textarea>
            </div>
            <center>
                <div class="btn-group">
                <button type="submit" class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-ok"></span>
                    Enviar</button>
                <a href="index.php" class="btn btn-danger btn-lg">
                    <span class="glyphicon glyphicon-remove"></span>
                    Cancelar</a>
                </div>
            </center>
        </form>
          
          </div>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div style="display: none;">
   <div id="pergunta" style="color: graytext; min-width: 500px;">
            <center>
                
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
</div>



<?php

require_once './visao/componentes.php';
require_once './email/EmailEnviar.php';



if(isset($_POST['acao'])){
        
        if($_POST['acao'] == "liberarQuestionario")
        {

            
            if(validaCPF($_POST['cpfInformar']))
            {
            
                try
                {

                $user = $daoUsuario->buscarPorCPF($_POST['cpfInformar']);

                if($user->getId() != null && $user->getId() != 0)
                {
                  
                  //  $quantidadeFormulario = $daoFormulario->buscarPorIdDoUsuario($user->getId());
                    $quantidadeFormulario = $user->getQtdResponde();
                    
                    if($quantidadeFormulario == null)
                    {
                       $quantidadeFormulario = 0; 
                    }
                    
                    if($quantidadeFormulario <= 5)
                    {

                        //ENVIO DE DADOS PELA SEÇÃO
                        $_SESSION['nome'] = $user->getNome();
                        $_SESSION['id'] = $user->getId(); 
                        $_SESSION['senha'] = $user->getSenha();
                        $_SESSION['email'] = $user->getEmail();
                        $_SESSION['cpf'] = $user->getCpf();
                        $_SESSION['telefone'] = $user->getTelefone();
                        $_SESSION['liberado'] = $user->getLiberado();
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
                            echo "$('#modalMsgErroQtdFormulario').modal('show');";
                        echo "</script>";
                        
                    }
                    

                }
                else
                {

                    unset ($_SESSION['email']);
                    unset ($_SESSION['senha']);

                    echo "<script type='text/javascript'>";
                    echo "var $ = jQuery.noConflict();";
                    echo "$('#modalMsgErroLoginCpf').modal('show');";
                    //echo "alert('Cpf inválido!');";

                    echo "</script>";

                }


                }
                catch (Exception $erro)
                {

                 echo "<script type='text/javascript'>";
                 echo "var $ = jQuery.noConflict();";
                 echo "$('#modalMsgErroException').modal('show');";
                 //echo "alert('Estamos com prblemas, tente mais tarde!');";

                 echo "</script>";


                }
            }
            else
            {
                
                    unset ($_SESSION['email']);
                    unset ($_SESSION['senha']);

                    echo "<script type='text/javascript'>";
                    echo "var $ = jQuery.noConflict();";
                    echo "$('#modalMsgErroLoginCpf').modal('show');";
                    //echo "alert('Cpf inválido!');";

                    echo "</script>";
                
            }
            
        }
        
        
        if($_POST['acao'] == "enviarEmail")
        {
            
          try
          {
          
          $enviar =  new EmailEnviar($_POST['remetente'], "youteacher2015@gmail.com", $_POST['assunto'], $_POST['msg']);
          //VERIFICAR SE O EMAIL FOI ENVIADO
          if($enviar->send())
          {
              
               echo "<script type='text/javascript'>";
                    
                    echo "var $ = jQuery.noConflict();
                     $(document).ready(function() {
                     $('#modalMsgSucessoEmail').modal('show');
                         });";

                echo "</script>";
      
              
          }
          else
          {
               
              echo "<script type='text/javascript'>";
                   echo "var $ = jQuery.noConflict();
                     $(document).ready(function() {
                     $('#modalMsgErroEmail').modal('show');
                         });";


                echo "</script>";
              
          }
          }catch (Exception $ex) {

              echo "<script type='text/javascript'>";
                   echo "var $ = jQuery.noConflict();
                     $(document).ready(function() {
                     $('#modalMsgErroException').modal('show');
                         });";


                echo "</script>";
              
          }
            
        }
        
        
        
    }
    
    
    function validaCPF($cpf = null) {
 
    // Verifica se um número foi informado
    if(empty($cpf)) {
        return false;
    }
 
    // Elimina possivel mascara
//    $cpf = ereg_replace('[^0-9]', '', $cpf);
//    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
 
        return true;
    }
}

require_once './template/rodape.php';
?>

