  <?php require_once '../template/topouser.php';
  
 require_once '../visao/componentes.php';
  
  ?>

<script type='text/javascript'>
var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#modalMsgSucessoComLoadingFormulario').modal('show');
                });
</script>

           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 8%; margin-bottom: 10%;">
    <div class="col-md-2 col-sm-2 col-xs-1"></div>
    <div class="col-md-8 col-sm-8 col-xs-10" >
        <center>
        <div class="jumbotron" style=" background: white; border: 2px #e7e7e7 solid;">
           <img src="../resources/img/carregamento.gif" width="250px" height="250px" class="img-responsive" />
           <hr />
           <div style="color: graytext;">
               <label>Aguardando o seu deslogamento...</label>
               <h3>Por favor, clique em "Sair" no header da página!</h3>              
           </div>
        </div>               
        </center>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-1"></div>
    </div>  
    

        
    <?php require '../template/rodape.php'; ?>


