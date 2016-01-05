  <?php require '../template/topoadm.php';
  
  include_once  '../dao/DaoCurso.php';
  include_once '../entidades/Curso.php';
  include_once '../banco/Conexao.php';
  
  $daoCurso = new DaoCurso();
  
  $cursos = $daoCurso->buscarTodos();
  
  ?>


<script type="text/javascript">
    

function cadastrarAluno(){
$(document).ready(function (){    
    
     $("#msgSucesso").show();

});
}

$(document).ready(function (){
     
     
    
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
                    <div class="form-group">
                        <label  for="nome">*Nome:</label>
                        <input type="text" placeholder="Insere o seu nome" required="true" class="form-control" name="nome" />
                    </div>
                    <div class="form-group">
                        <label  for="nome">*Curso:</label>
                        <select>
                            <option value="0">Selecione</option>
                            <?php
                            
                                foreach ($cursos as $value) 
                                    {
                                    echo "<option value=".$value->getNome().">".$value->getNome()."</option>";
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
                            <button  type="submit" class="btn btn-success btn-lg">
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
        
            
            <!-- Modal de visualiziação  -->
            <div id="modalMsgSucesso" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal corpo-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sucesso</h4>
                  </div>
                  <div class="modal-body">
                      
                      <p>Painel de sucesso!</p>
                        
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
       
        
    </div>
    </div> 
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    </div>  
    
    
    
   
        
   <?php require '../template/rodape.php'; ?>

