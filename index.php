
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

<!--<script language="javascript">

function aumenta(obj){
        obj.height=obj.height*1.2;
	obj.width=obj.width*1.2;
}
 
function diminui(obj){
	obj.height=obj.height/1.2;
	obj.width=obj.width/1.2;
}
//
</script>-->

<script type="text/javascript">
    // Use jQuery com a variavel $j(...)
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        
    $j('#irParaResponderFormulario').click(function() {
    //$j('body,html').animate({scrollTop:0},600);
    });
        
        
    });
</script>
    
    
    

<div class="row" style="margin-bottom: 20px;" >    
<div class="col-md-12 col-sm-12 col-xs-12">      
    <center>
        <img src="./resources/img/teste4.png"  class="img-rounded img-responsive" />
    </center>
</div>
</div>
 
    
<!--<div style="width: 100%; height: 15%;">-->
<div id="responderFormulario"></div>
<div class="row" style=" border-bottom: 2px solid #e7e7e7; border-top: 2px solid #e7e7e7;" >
    <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: #5cb85c; color: white;">
       <center>
           <h1><b>RESPONDA O NOSSO FORMULÁRIO</b></h1>          
       </center> 
    </div>     
</div>

<div class="row" >
    <div class="col-md-12 col-sm-12 col-xs-12">
       <center>
           <br/>
           <button id="irParaResponderFormulario" style="border-radius: 50px;" class="btn btn-info btn-lg"
                   onclick="$j('html,body').animate({scrollTop: $j('#responderFormulario').offset().top}, 2000);">
                                <span class="glyphicon glyphicon-arrow-down"> </span>
            </button>    
       </center> 
    </div>     
</div>
<!--</div>-->


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 10%; margin-bottom: 5%; " >
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

