<?php require '../template/topoadm.php'; 

//usuario
include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';

//email
include_once '../dao/DaoEmail.php';
include_once '../entidades/Email.php';

//curso
include_once  '../dao/DaoCurso.php';
include_once '../entidades/Curso.php';

//conexao
include_once '../banco/Conexao.php';

$daoUsuario = new DaoUsuario();
$daoEmail = new DaoEmail();

  
$daoCurso = new DaoCurso(); 
$cursos = $daoCurso->buscarTodos();

$anoConclusao = "";
$cursoPesquisa = "";

$queryBusca = "";
$control = true;
$cont = 0;
if(isset($_GET['texto']) || isset($_GET['curso'])){
    
    $anoConclusao = $_GET['texto']."%";
    $cursoPesquisa = $_GET['curso'];
        
    
        if($_GET['curso'] != "0" && $_GET['curso'] != null)
        {
           $control = false;
           $cont++;
           $queryBusca = $queryBusca. " idCurso = ".$cursoPesquisa." ";
            
        }
        
        if($_GET['texto'] != "" && $_GET['texto'] != null)
        {
            if($cont === 1)
                $queryBusca = $queryBusca. "and";
            
          $control = false;
          $cont++;
          $queryBusca = $queryBusca. " nome LIKE '".$anoConclusao."' ";
            
        }
        
        $queryBusca = $queryBusca. " AND liberado = 'sim'";
        //buscar
        if($control)
           $listaUsuarios = $daoUsuario->buscarTodosLiberados();
        else
           $listaUsuarios = $daoUsuario->buscarPorCondicaoLiberados($queryBusca);
        
}
else
{
    $listaUsuarios = $daoUsuario->buscarTodosLiberados();
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
                              <p>Pesquisar:</p>
                              <ul>
                                  <li>A pesquisa pode ser feita informando o nome do estudante ou/e curso do estudante</li>
                                  <li>Pode voltar a buscar normal clicando em "Restaurar"</li>
                              </ul>
                              <p>Enviar:</p>
                              <ul>
                                  <li>Selecione os alunos que deseja enviar o email e depois clica em "Enviar"</li>
                              </ul>
                              <p>Obsevações:</p>
                              <ul>
                                  <li>Só aparecerão na tabela os alunos que a data de envio seja igual ou menor que a data atual</li>
                                  <li>Para atualizar a lista vá na tela principal e clique em "Verificar"</li>                           
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
                    <img src="../resources/img/email.png" style="max-height: 100px;"  class="img-rounded img-responsive" />
                </center>
                <br />
            </center>
            
            <form action="email.php" method="GET">
                <div class="form-group">
                    <label for="textoPesquisa">Nome:</label>
                    <input type="text" class="form-control" id="textoPesquisa" name="texto">
                </div>
                <div class="form-group">
                    <label for="curso">Curso:</label>
                    <select id="cursoPesquisa" name="curso" class="form-control">
                            <option value="0">Selecione</option>
                            <?php
                            
                                foreach ($cursos as $value) 
                                    {
                                    echo "<option value=".$value->getId().">".$value->getNome()."</option>";
                                    }
                            
                            ?>
                          </select>
                </div>
                <button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>                 
                <a href="email.php" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-refresh"></span> Restaurar</a>                         
            </form>
            
            <br />
            <center>
                <form action="email.php" method="POST">
                    <input type="hidden" name="acao" value="verificar" />
                    <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-envelope"></span> Enviar para todos</button> 
                </form>
            </center>           
            <br />

<?php
//FAZ A BUSCA DOS ALUNOS LIBERADOS
if(count($listaUsuarios) > 0)
{
            echo "<script type='text/javascript'>";
            echo "var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#comResultado').show();
            $('#semResultado').hide();
                });";
            echo "</script>";
}
else
{
            echo "<script type='text/javascript'>";
            echo "var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#comResultado').hide();
            $('#semResultado').show();
                });";
            echo "</script>";
    
}

            
?>
            
            
<div id="comResultado">      
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Curso</th>
        <th>Data de Envio</th>
        <th>Enviado</th>
      </tr>
    </thead>
    <tbody>
    <?php 

    
    foreach ($listaUsuarios as $usuario) {
        echo '<tr>';
            echo '<td>';
                echo  $usuario->getId();
            echo '</td>';
            echo '<td>';
                echo  $usuario->getNome();
            echo '</td>';
            echo '<td>';
                $cursoUsuarioLista = $daoCurso->buscarPorId($usuario->getIdCurso());
                  if($cursoUsuarioLista != null)
                  {
                    echo $cursoUsuarioLista->getNome();
                  }
                  else
                  {
                     echo "Não existe curso!"; 
                  }
            echo '</td>'; 
            $emailAEnviar = $daoEmail->buscarPorUsuario($usuario->getId());
            echo '<td>';
                if($emailAEnviar == null)                       
                {
                 echo 'Indefinida';   
                }
                else
                {
                    echo $emailAEnviar->getDataEnvio();
                }           
            echo '</td>';
            echo '<td align="center">';
                if($emailAEnviar->getEnviado() == null || $emailAEnviar->getEnviado() == 0)                       
                {
                 echo   '<button class="btn btn-danger btn-sm" disabled="true" >';
                 echo   '<span class="glyphicon glyphicon-remove"></span>';                
                 echo   '</button>';  
                }
                else
                {
                 echo   '<button class="btn btn-success btn-sm" disabled="true" >';
                 echo   '<span class="glyphicon glyphicon-ok"></span>';                
                 echo   '</button>';       
                }           
            echo '</td>';
            echo '<td>';
            echo "<div class='btn-group'>";
                echo   '<a href="email.php?id='.$usuario->getId().'&enviar=Sim" class="btn btn-info btn-sm"  >';
                echo   '<span class="glyphicon glyphicon-envelope"></span>';                
                echo   '</a>';
            echo "</div>";
            echo '</td>';
        echo '</tr>';
    }
    
    ?>
    </tbody>
  </table>
  <div>
      <center>
        <button id="anterior" class="btn btn-success" disabled><span class="glyphicon glyphicon-chevron-left"></span></button>
        <span id="numeracao"></span>
        <button id="proximo" class="btn btn-success " disabled><span class="glyphicon glyphicon-chevron-right"></span></button>
    </center>
  </div>
</div> <!-- FIM DIV COM RESULTADO-->
<div id="semResultado" style="color: red;">
    <br />
    <center>
        <h4>Não foram encontrado nenhum estudante liberado para o envio do email!</h4>
    </center>  
</div>
            
            
            
        </div>
    </div>  
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    
    <!-- botao voltar topo -->
            <button type="button" id="btnVoltarTopo" class="btn btn-sm btn-info" style="
                    bottom: 20px !important;
                    position: fixed;
                    right: 30px;" 
                onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);" value="Topo" >
                <span class="glyphicon glyphicon-chevron-up"></span>
            </button>
    
</div>  

<?php require '../template/rodape.php'; ?>
