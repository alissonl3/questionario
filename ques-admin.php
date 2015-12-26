
<?php require './template/topo.php'; ?>



<script type="text/javascript">
    
    function logar()
    {
        
                    $.ajax({
                     url: 'visao/login.php',
                     data: {$('#frmLogin').serialize()}, //pegar dados do formulario
                     method: "POST",
                     async: true
                     }).done(function (r){
                         
                         
                         
                         if(r === "erro")
                         {
                            $('#messageError').html("<b>Login invalido!</b>");
                         }
                         else if(r === "sucess")
                         {
                             location.href="http://localhost/questionario/adm/gerenciar.php";
                             
                         }
                         else if(r === "erroException")
                         {
                               $('#messageError').html("<b>Estamos com problemas no momento, tente mais tarde!</b>");
                         }
                         
                         
                     }); 
        
        
    }
    
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
                
                <form id="frmLogin" method="POST" action="visao/login.php" role="form"  >
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

<?php require './template/rodape.php';


?>

