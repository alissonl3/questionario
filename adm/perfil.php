  <?php require '../template/topoadm.php';
  
  include_once  '../dao/DaoCurso.php';
  include_once '../entidades/Curso.php';
  include_once '../banco/Conexao.php';
  
  include_once  '../dao/DaoUsuario.php';
  include_once '../entidades/Usuario.php';
    
  $daoCurso = new DaoCurso();
  
  $cursos = $daoCurso->buscarTodos();
  
  ?>


<script type="text/javascript">


$(document).ready(function ()
{
    
    $("#campoSenha").hide();
    
    $("#opNao").click(function (){
        $("#campoSenha").hide();
    });
    
    $("#opSim").click(function (){
        $("#campoSenha").show();
    }); 
});
        
</script>
           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >

        <div  class="jumbotron" style=" background: white; border: 2px #e7e7e7 solid; ">
         <div style="float: left;">
                <button  title="Ajuda" class="btn btn-info btn-sm" style="border-radius: 30px;" data-toggle="modal" data-target="#modalAjuda">
                                <span class="glyphicon glyphicon-comment"></span>
                                 </button>
         </div>
         <div style="clear: both;"></div> 
         
         <!--MODAL DE AJUDA-->
            <div id="modalAjuda" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal corpo-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">
                                   <button type="button" style="border-radius: 20px;" disabled="true" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-comment"></span></button>                                  
                      </h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">      
                               <center>
                                   <img src="../resources/img/ajuda.png" style="max-height: 100px;"  class="img-rounded img-responsive" />
                               </center>
                              <hr />
                              <p>Alterar:</p>
                              <ul>
                                  <li>Nessa tela você poderá alterar os seus dados</li>
                              </ul>
                              
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Entendi</button>
                    </div>
                  </div>
                </div>
              </div>
         
         <center>
                <center>
                    <img src="../resources/img/perfil.png" style="max-height: 100px;"  class="img-rounded img-responsive" />
                </center>
                <br />
         </center>
            
        <div id="alterarAdm">   
                <form id="frmAlterarAdm" method="POST" role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <input type="hidden" name="acao" value="alterarAdm" />
                    <div class="form-group">
                        <label  for="nome">*Nome:</label>
                        <input type="text" placeholder="Insere o seu nome" value="<?php echo $logado; ?>" required="true" class="form-control" name="nome" />
                    </div>
                    <div class="form-group">
                        <label  for="nome">*CPF:</label>
                        <input type="text" placeholder="Insere o seu cpf" value="<?php echo $logadoCpf; ?>" name="cpf" id="cpf" required="true" class="form-control" maxlength="14">
                    </div>
                    <div class="form-group">
                        <label  for="email">*Email:</label>
                        <input type="email" placeholder="Insere o seu email" value="<?php echo $logadoEmail; ?>" required="true" class="form-control" name="email" />
                    </div>
                    <div class="form-group">
                        <label  for="telefone">*Telefone:</label>
                        <input type="tel" placeholder="Insere o seu telefone" required="true" value="<?php echo $logadoTelefone; ?>" class="form-control" name="telefone" />
                    </div>
                    <div class="form-group">
                        <label  for="telefone">Alterar senha:</label>
                        <div class="radio">
                            <label><input id="opSim"  type="radio" name="opAlterarSenha" value="sim">Sim</label>
                        </div>
                        <div class="radio">
                            <label><input id="opNao" type="radio" name="opAlterarSenha" value="nao">Nao</label>
                        </div>
                    </div>
                    <div id="campoSenha">
                    <div  class="form-group">
                        <label  for="senhaAntiga">Senha atual:</label>
                        <input type="password" placeholder="Insere a sua senha antiga" class="form-control" name="senhaAntiga" />
                    </div>
                    <div  class="form-group">
                        <label  for="senhaNova">Nova senha:</label>
                        <input type="password" placeholder="Insere a sua nova senha" class="form-control" name="senhaNova" />
                    </div>
                    </div>
                    <center>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success btn-lg">
                             <span class="glyphicon glyphicon-ok"></span>
                            Alterar</button>
                        <button type="reset" class="btn btn-danger btn-lg">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar</button>
                        </div>
                    </center>
        </form>
        </div>
        
            
     <?php   require_once '../visao/componentes.php';     ?>  
       
        
    </div>
    </div> 
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    </div>  
    
    
    
   
        
<?php require '../template/rodape.php';
   
   //EXECUTAR AÇÃO
if(isset($_POST['acao'])){
    
        //RESPONDER FORMULÁRIO 
        if($_POST['acao'] == "alterarAdm")
        {
            $senhaAntiga = "";
            $novaSenha = "";
            $user = new Usuario();

            $user->setId($logadoId);
            
            if(isset($_POST["nome"]))
                $user->setNome($_POST["nome"]);

            if(isset($_POST["email"]))
                $user->setEmail($_POST["email"]);

            if(isset($_POST["telefone"]))
                $user->setTelefone($_POST["telefone"]);

            if(isset($_POST["senha"]))
                $user->setSenha($_POST["senha"]);

            if(isset($_POST["cpf"]))
                $user->setCpf($_POST["cpf"]);
            
            if(isset($_POST["senhaAntiga"]))
                $senhaAntiga = $_POST["senhaAntiga"];
            
            if(isset($_POST["senhaNova"]))
                $novaSenha = $_POST["senhaNova"];
            
            

            $dao = new DaoUsuario();
            
            
            if($senhaAntiga === $logadoSenha)
            {
                $user->setSenha($novaSenha);
                $user->setStatus(1);
                $user->setTipo("adm");
                $user->setIdCurso(1);
                
            if(validaCPF($user->getCpf()))
            {
              
            $SameEmail = false;
            $SameCpf = false;
            $usuarioVerificacaoCPF = $dao->buscarPorCPF($user->getCpf());
            $usuarioVerificacaoEmail = $dao->buscarPorEmail($user->getEmail());
            
            
            if($user->getCpf() === $logadoCpf)
            {
                $SameCpf = true;
            }
            
            if($user->getEmail() === $logadoEmail)
            {
               $SameEmail = true; 
            }
           
            
            
                if($SameCpf || (!$usuarioVerificacaoCPF->getId() != null && !$usuarioVerificacaoCPF->getId() != 0)){

                    if($SameEmail || (!$usuarioVerificacaoEmail->getId() != null && !$usuarioVerificacaoEmail->getId() != 0)){
                    
                        try
                        {

                        $dao->atualizar($user);


                            echo "<script type='text/javascript'>";               
                                echo "$('#modalMsgSucesso').modal('show');";
                            echo "</script>";


                        } 
                        catch (Exception $e){

                            print "Erro " .$e;

                            echo "<script type='text/javascript'>";                
                                echo "$('#modalMsgErroException').modal('show');";            
                            echo "</script>";

                        }
                    } //FIM VERIFICAR EMAIL
                    else
                    {
                      
                        echo "<script type='text/javascript'>";                
                            echo "$('#modalMsgErroEmailJaExiste').modal('show');";            
                        echo "</script>"; 
                            
                    }
                    
                    
                }//FIM DE VERIFICAR USUARIO COM AQUELE CPF
                else
                {
                    
                    echo "<script type='text/javascript'>";                
                        echo "$('#modalMsgErroCPFJaExiste').modal('show');";            
                    echo "</script>"; 


                }
    
            } //FIM IF DE VALIDAR_CPF
            else
            {
               echo "<script type='text/javascript'>";                
                        echo "$('#modalMsgErroLoginCpf').modal('show');";            
               echo "</script>"; 
            }
            
            }
            else
            {
                echo "<script type='text/javascript'>";                
                        echo "$('#modalMsgErroSenhaNaoConfere').modal('show');";            
               echo "</script>";               
            }
            
            
        }
        
        
}//FIM DO EXECUTAR AÇÃO



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
   
   
   ?>

