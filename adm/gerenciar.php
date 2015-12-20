<?php require '../template/topoadm.php'; 

include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';

$daoUsuario = new DaoUsuario();

$textoPesquisa = "";

if(isset($_GET['texto'])){
    
    $textoPesquisa = $_GET['texto'];
        
        if($_GET['texto'] != "" || $_GET['texto'] != null){
            
            $listaUsuarios = $daoUsuario->buscarPorNome($textoPesquisa);
            
        }else{
            
           $listaUsuarios = $daoUsuario->buscarTodos(); 
        }
}else{
$listaUsuarios = $daoUsuario->buscarTodos();
}

?>


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        
        <script type="text/javascript">
        // Use jQuery com a variavel $j(...)
        var $j = jQuery.noConflict();
        $j(document).ready(function() {
        $j("#btnVoltarTopo").hide();
        $j(function () {
        $j(window).scroll(function () {
        if ($j(this).scrollTop() > 1000) {
        $j('#btnVoltarTopo').fadeIn();
          } else {
        $j('#btnVoltarTopo').fadeOut();
        }
        });
        $j('#btnVoltarTopo').click(function() {
        $j('body,html').animate({scrollTop:0},600);
        }); 
        });});
        </script>
        
        <!-- DIV PARA VOLTAR NO TOPO -->
        <div id="voltarTopo"></div>
        
        
        <div class="jumbotron" style=" background: white; border: 2px #e7e7e7 solid;">
            <center>
                <h3><label>Gerenciar</label></h3>
                <br />
                <br />
            </center>

            <form action="gerenciar.php" method="GET">
                <div class="form-group">
                    <label for="textoPesquisa">Nome:</label>
                    <input type="text" class="form-control" id="textoPesquisa" name="texto">
                </div>
                <button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span>Pesquisar</button>                 
                <a href="gerenciar.php" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-refresh"></span>Restaurar</a>                 
          
            </form>
          
            
            
            
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Envio</th>
        <th>Situação</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
    <?php 

    
    foreach ($listaUsuarios as $usuario) {
        echo '<tr>';
            echo '<td>';
                echo  $usuario->getNome();
            echo '</td>';
            echo '<td>';
                echo  'dataEnvio';
            echo '</td>';
            echo '<td>';
                echo  'liberado';
            echo '</td>';
            echo '<td>';
            echo "<div class='btn-group'>";
                echo   '<a href="dados.php?id='.$usuario->getId().'" class="btn btn-info btn-sm"  >';
                echo   '<span class="glyphicon glyphicon-search"></span>';                
                echo   '</a>';
            echo "</div>";
            echo '</td>';
        echo '</tr>';
    }
    
    ?>
    </tbody>
  </table>
                 
            
<!-- Modal de visualiziação  -->
<div id="modalVisualizar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Nome:</b><?php echo "Nome" ?></h4>
      </div>
      <div class="modal-body">
          <div class="jumbotron" style=" background: white;">
          <fieldset>
              <legend>Dados</legend>

                <label><b>Email:</b></label>
                <label style="color: graytext;"><?php echo "Email" ?></label><br />
                <label><b>Telefone:</b></label>
                <label style="color: graytext;"> <?php echo "Telefone" ?></label><br />
              
          </fieldset>
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

            <!-- botao voltar topo -->
            <input type="button" id="btnVoltarTopo" class="btn btn-sm btn-info" style="
                    bottom: 20px !important;
                    position: fixed;
                    right: 30px;" 
                    onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);" value="Topo" >
            
            
            
            
        </div>
    </div>  
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
</div>  

<?php require '../template/rodape.php'; ?>
