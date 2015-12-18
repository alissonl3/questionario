  <?php require './template/topo.php'; ?>
           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 12%; margin-bottom: 10%;">
    <div class="col-md-4 col-sm-3 col-xs-2"></div>
    <div class="col-md-4 col-sm-6 col-xs-8">
        
        <div class="jumbotron" style=" background: white; border: 2px greenyellow solid; ">
            <fieldset>
                <legend>Recuperar senha</legend>
                <h5 style="color: graytext;">
                    Uma mensagem será enviado ao seu email. Atenção: A menssagem pode ser
                    acusada de spam. Verifique seus spam's.
                </h5>
                <hr />
        <form action="email.php" method="POST" role="form" >
            <div class="form-group">
                <label  for="email">Seu email:</label>
                <input type="email" placeholder="Insere o seu email" required="true" class="form-control" name="emailEnviar" />
            </div>     
            <center>
                <div class="btn-group">
                <button type="submit" class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-ok"></span>
                    Enviar</button>
                <a href="index.php" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-arrow-left"></span>
                    Voltar</a>
                </div>
            </center>
        </form>
            </fieldset>
        </div>
        
    </div>
    <div class="col-md-4 col-sm-3 col-xs-2"></div>
    </div>  
        
    <?php require './template/rodape.php'; ?>

    <!-- Enviar email -->
    <?php 
    
    require_once './email/Email.php';
    
    if(isset($_POST['emailEnviar'])){
        
        $emailEnviar = $_POST['emailEnviar'];
        
        if($emailEnviar != null && $emailEnviar != ""){
            
                       
          $enviar =  new Email("administrador@questionariodeegressos.16mb.com", $emailEnviar, "Teste22", "Apenas um teste22!");
          
        
          
          //VERIFICAR SE O EMAIL FOI ENVIADO
          if($enviar->send()){
              
               echo "<script type='text/javascript'>";
    
                    echo "alert('Verifique sua caixa de entrada!');";
                    echo "location.href='http://localhost/questionario/index.php';";

                echo "</script>";
      
              
          }else{
               
              echo "<script type='text/javascript'>";
    
                    echo "alert('Houve um erro ao enviar o email... Tente mais tarde!);";
                    echo "location.href='http://localhost/questionario/index.php';";

                echo "</script>";
              
          }
            
        }
        
        
    }
    
    
    ?>

