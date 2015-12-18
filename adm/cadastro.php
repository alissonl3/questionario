  <?php require '../template/topoadm.php'; ?>


<script type="text/javascript">
    // Use jQuery com a variavel $j(...)
    var $j = jQuery.noConflict();
   
        
        
    function cadastrar(){
            
            
            alert("Chamou");
            
//                $j.ajax({
//                    method: "post",
//                    url: "./visao/validarcadastro.php",
//                    data: $("#frmCadastro").serialize(),
//                success: function(data){
//                           
//                           
//                        if(data == "success")
//                        {   
//                           document.getElementById("frmCadastro").reset();
//                           $("#msg").html("<div class='alert alert-success' role='alert'>Cadastro Realizado com Sucesso!<a href='http://localhost/questionario/index.php'>Logar</a></div>");
//                        }                       
//                        else if(data == "erroException")
//                        {
//                            $("#msg").html("<div class='alert alert-danger' role='alert'>Estamos com problemas! Tente mais tarde.</div>");             
//                        }
//                }
//
//            });
//            }
    

</script>

           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 7%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        
        <div class="jumbotron" style=" background: white; border: 2px #e7e7e7 solid; ">
            <fieldset>
                <legend>Cadastrar</legend>
                <h5 style="color: graytext; color: red;">
                    * Campos obrigatórios
                </h5>
                <br />
                <div id="msg"></div>
                <br />
                <form id="frmCadastro" method="POST" role="form" onsubmit="cadastrar(); return false;" >
                    <div class="form-group">
                        <label  for="nome">*Nome:</label>
                        <input type="text" placeholder="Insere o seu nome" required="true" class="form-control" name="nome" />
                    </div>
                    <div class="form-group">
                        <label  for="nome">*Cpf:</label>
                        <input type="text" placeholder="Insere o seu cpf" required="true" class="form-control" name="cpf" />
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
                        <label  for="senha">*Senha:</label>
                        <input type="password" placeholder="Insere a sua senha" required="true" class="form-control" name="senha" />
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
       
        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    </div>  
    
    

    
   
        
   <?php require '../template/rodape.php'; ?>

