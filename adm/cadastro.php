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
    
    $("#opTipoAluno").click(function (){
        $("#campoSenha").hide();
    });
    
    $("#opTipoAdm").click(function (){
        $("#campoSenha").show();
    }); 
});
        
</script>
           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 7%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >

        <div  class="jumbotron" style=" background: white; border: 2px #e7e7e7 solid; ">
         <div style="float: right;">
                <button  title="Ajuda" class="btn btn-info btn-sm" style="border-radius: 30px;">
                                <span class="glyphicon glyphicon-comment"></span>
                                 </button>
         </div>
         <div style="clear: both;"></div>   
            
        <div id="cadastroAluno">   
            <fieldset>
                <legend>Cadastrar Usuario</legend>
                <h5 style="color: graytext; color: red;">
                    * Campos obrigatórios
                </h5>
                <br />
                <br />
                <form id="frmCadastro" method="POST" role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <input type="hidden" name="acao" value="cadastrarUsuario" />
                    <div class="form-group">
                        <label  for="nome">*Nome:</label>
                        <input type="text" placeholder="Insere o seu nome" required="true" class="form-control" name="nome" />
                    </div>
                    <div class="form-group">
                        <label  for="curso">*Curso:</label>
                        <select name="curso" class="form-control">
                            <option value="0">Selecione</option>
                            <?php
                            
                                foreach ($cursos as $value) 
                                    {
                                        echo "<option name='opCurso' value=".$value->getId().">".$value->getNome()."</option>";
                                    }
                            
                            ?>
                          </select>
                    </div>
                    <div class="form-group">
                        <label  for="nome">*Cpf:</label>
                        <input type="text" placeholder="Insere o seu cpf" name="cpf" id="cpf" required="true" class="form-control" maxlength="14">
                    </div>
                    <div class="form-group">
                        <label  for="email">*Email:</label>
                        <input type="email" placeholder="Insere o seu email" required="true" class="form-control" name="email" />
                    </div>
                    <div class="form-group">
                        <label  for="telefone">*Telefone:</label>
                        <input type="tel" placeholder="Insere o seu telefone" required="true" class="form-control" name="telefone" />
                    </div>
                    <div class="form-group">
                        <label  for="tipo">*Tipo:</label>
                        <div class="radio">
                            <label><input id="opTipoAluno"  type="radio" name="opTipo" value="aluno">Aluno</label>
                        </div>
                        <div class="radio">
                            <label><input id="opTipoAdm" type="radio" name="opTipo" value="adm">Administrador</label>
                        </div>
                    </div>
                    <div id="campoSenha" class="form-group">
                        <label  for="senha">*Senha:</label>
                        <input type="password" placeholder="Insere a sua senha" class="form-control" name="senha" />
                    </div>
                    <center>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success btn-lg">
                             <span class="glyphicon glyphicon-ok"></span>
                            Cadastrar</button>
                        <button type="reset" class="btn btn-danger btn-lg">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar</button>
                        </div>
                    </center>
        </form>
                </fieldset>
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
        if($_POST['acao'] == "cadastrarUsuario")
        {
            
            $user = new Usuario();

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
            
            if(isset($_POST["opTipo"]))
                $user->setTipo($_POST["opTipo"]);

            if(isset($_POST["curso"]))
                $user->setIdCurso($_POST["curso"]);
            

            $dao = new DaoUsuario();
            
            
            if(validaCPF($user->getCpf()))
            {
                
            $usuarioVerificacaoCPF = $dao->buscarPorCPF($user->getCpf());
            $usuarioVerificacaoEmail = $dao->buscarPorEmail($user->getEmail());
            
            
                if(!$usuarioVerificacaoCPF->getId() != null && !$usuarioVerificacaoCPF->getId() != 0){

                    if(!$usuarioVerificacaoEmail->getId() != null && !$usuarioVerificacaoEmail->getId() != 0){
                    
                        try
                        {



                        $dao->inserir($user);


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

