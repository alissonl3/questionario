<?php require '../template/topoadm.php'; 

include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';

include_once '../banco/Conexao.php';

include_once '../dao/DaoFormulario.php';
include_once '../entidades/Formulario.php';

include_once  '../dao/DaoCurso.php';
include_once '../entidades/Curso.php';

include_once '../dao/DaoEmail.php';
include_once '../entidades/Email.php';
  
$daoCurso = new DaoCurso();
$daoUsuario = new DaoUsuario();
$daoFormulario = new DaoFormulario();


//BUSCA O ID DO USUARIO SELECIONADO
if(isset($_GET['id'])){
    $idSelecionado = $_GET['id'];
}
//FAZ O PROCESSAMENTO DO CURSO E OS DEMAIS CURSOS
$usuarioSelecionado = $daoUsuario->buscarPorId($idSelecionado);
$cursoUsuarioSelecionado = $daoCurso->buscarPorId($usuarioSelecionado->getIdCurso());
$cursos = $daoCurso->buscarPorCondicao(" id != ".$usuarioSelecionado->getIdCurso());

$verificacaoFormulario = false;
$formulariosUsuario = $daoFormulario->buscarPorIdDoUsuario($usuarioSelecionado->getId());
$formularioSelecionado = new Formulario();

$daoEmail = new DaoEmail();
$emailUsuario = $daoEmail->buscarPorUsuario($usuarioSelecionado->getId());

?>


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        
        
        <div class="jumbotron" style=" background: white; border: 2px #e7e7e7 solid;">
            
        <!-- DIV PARA VOLTAR NO TOPO -->
        <div id="voltarTopo"></div>
        
        <center>
                <center>
                    <img src="../resources/img/dados.png" style="max-height: 100px;"  class="img-rounded img-responsive" />
                </center>
                <br />
         </center>
            
            <div style="color: graytext;">
                <div style="float: left;">
                    <h4>Nome: <?php echo $usuarioSelecionado->getNome() ?> </h4>
                    <h4>Cpf: <?php echo $usuarioSelecionado->getCpf() ?> </h4>
                    <h4>Email: <?php echo $usuarioSelecionado->getEmail() ?> </h4>
                    <h4>Telefone: <?php echo $usuarioSelecionado->getTelefone() ?> </h4>
                    <h4>Curso: <?php echo $cursoUsuarioSelecionado->getNome() ?> </h4>
                    <h4>Data de Envio: <?php echo $emailUsuario->getDataEnvio()  ?> </h4>
                    
                </div>
                <div style="float: right;">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDeletar">
                        <span class="glyphicon glyphicon-trash"></span>               
                        Deletar                       
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAlterar">
                        <span class="glyphicon glyphicon-pencil"></span>               
                        Alterar                      
                    </button>
<!--                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEmail">
                        <span class="glyphicon glyphicon-envelope"></span>               
                        Email                      
                    </button>-->
                </div>
            </div>
        
        
        
           
            <div style="clear: both;"></div>
         <br />

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
        });
    
    
        $j("#semgraficos").hide();
        $j("#comgraficos").show();

    
        $j("#linkComGraficos").click(function (){
        $j("#comgraficos").show();
        $j("#semgraficos").hide();

    });
    
    $j("#linkSemGraficos").click(function (){
        $j("#comgraficos").hide();
        $j("#semgraficos").show();
    });
    
    
        });
        </script>
         
        <div id="formularios"  style="color: graytext; float: right;">
            <center>
                <div class="btn-group">
                    <h4>Formulário: </h4>
                    <?php 
                    //LINKS PARA OS FORMULÁRIOS
                    $htmlLinksFormularios = "";
                    $incremento = 0;
                    foreach ($formulariosUsuario as $value) 
                    {
                        $incremento++;
                        $htmlLinksFormularios = $htmlLinksFormularios. " <a id='linkComGraficos".$incremento."' title='Pesquisar o formulário' href='".$_SERVER['PHP_SELF']."?id=".$usuarioSelecionado->getId()."&idFormulario=".$value->getId()."'><span class='glyphicon glyphicon-search'> </span> " .$incremento."</a>";
                    }
                    
                    $incremento++;
                    $htmlLinksFormularios = $htmlLinksFormularios. " <a id='linkComGraficos".$incremento."' title='Pesquisar o formulário' href='".$_SERVER['PHP_SELF']."?id=".$usuarioSelecionado->getId()."&idFormulario=Todos'><span class='glyphicon glyphicon-search'> </span> Todos</a>";
                    echo $htmlLinksFormularios;
                    ?>
                             
                </div>
            </center>
        </div>
        
        <div style="clear: both;"></div>
        
        <br />
           
         <div id="opcoes">              
               <ul class="nav nav-tabs nav-justified">
                   <li role="presentation"><a id="linkComGraficos" href="#"><span class="glyphicon glyphicon-search"> </span>  Com Gráficos</a></li>
                   <li role="presentation"><a id="linkSemGraficos" href="#"><span class="glyphicon glyphicon-search"> </span>  Sem Gráficos</a></li>
                </ul>
         </div>
         
         <div id="comgraficos">
             
             <?php  
   
   include_once  '../dao/DaoFormulario.php';
   include_once '../entidades/Formulario.php'; 
   include_once '../banco/Conexao.php'; 
   
   $dao = new DaoFormulario();
   
    ?>
           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-12 col-sm-12 col-xs-12" >
          <!-- SCRIPT DE IMPORTAÇÃO DO CHART -->
        <script src="../resources/js/Chart.js"></script>
        
         
            <!--script para a busca dos dados -->
            <?php 
            
              //VERIFICAR O FORMULÁRIO ATUAL PARA PREENCHER OS GRAFICOS
              $idFormularioBusca = "";
              if(isset($_GET['idFormulario']))
              {
                  $idFormularioBusca = $_GET['idFormulario'];
              }
              
              $incrementoBusca = "";
              if($idFormularioBusca != "Todos" && $idFormularioBusca != "")
              {
                $incrementoBusca = $incrementoBusca. " and id = ".$idFormularioBusca;
                 
                $formularioSelecionado = $daoFormulario->buscarPorId($idFormularioBusca);
                
              }
              else
              {
                  $incrementoBusca = " ";
                  if(count($formulariosUsuario) >= 1)
                  {
                    $verificacaoFormulario = true;                  
                  }
              }
              //FIM
              
      
            
            $simia5  = $dao->buscarCountResposta("ia5 = 'Sim' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca) ;
            $naoia5 =  $dao->buscarCountResposta("ia5 = 'Não' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);
                    
            $simia6  = $dao->buscarCountResposta("ia6 = 'Sim' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);   
            $naoia6  = $dao->buscarCountResposta("ia6 = 'Não' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);
            
            $ia21  = $dao->buscarCountResposta("ia2 = 'O nome da Instituição de Ensino onde estudou' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);  
            $ia22  = $dao->buscarCountResposta("ia2 = 'As respostas ao teste de seleção, ao qual foi submetido' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ia23  = $dao->buscarCountResposta("ia2 = 'A formação teórica' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ia24  = $dao->buscarCountResposta("ia2 = 'A experiência prática' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ia25  = $dao->buscarCountResposta("ia2 = 'Visão sistámica' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            
            $simip3  = $dao->buscarCountResposta("ip3 = 'Sim' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);   
            $naoip3  = $dao->buscarCountResposta("ip3 = 'Não' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);
            
            $ia31  = $dao->buscarCountResposta("ia3 = 'Maior embasamento conceitual' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);  
            $ia32  = $dao->buscarCountResposta("ia3 = 'Maior embasamento técnico' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ia33  = $dao->buscarCountResposta("ia3 = 'Maior embasamento prático' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ia34  = $dao->buscarCountResposta("ia3 = 'Maior aproximação com as necessidades da indússtria' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ia35  = $dao->buscarCountResposta("ia3 = 'Maior capacidade de liderança' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);
            $ia36  = $dao->buscarCountResposta("ia3 = 'Maior visão sistêmica' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);
            
            $ic71  = $dao->buscarCountResposta("ic7 = 'Muito Satisfatório' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);  
            $ic72  = $dao->buscarCountResposta("ic7 = 'Satisfatório' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ic73  = $dao->buscarCountResposta("ic7 = 'Insatisfatório' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ic74  = $dao->buscarCountResposta("ic7 = 'Não sei responder' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            
            $ic91  = $dao->buscarCountResposta("ic9 = 'A obtenção de diploma de nível técnico' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);  
            $ic92  = $dao->buscarCountResposta("ic9 = 'A aquisição de cultura geral' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ic93  = $dao->buscarCountResposta("ic9 = 'A aquisiçaoo de formação profissional e teórica' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ic94  = $dao->buscarCountResposta("ic9 = 'Melhores perspectivas de ganhos materiais' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);
            
            $ic101  = $dao->buscarCountResposta("ic10 = 'Encontrar emprego na área' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);  
            $ic102  = $dao->buscarCountResposta("ic10 = 'Adequação salarial' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ic103  = $dao->buscarCountResposta("ic10 = 'Continuar na mesma empresa' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca); 
            $ic104  = $dao->buscarCountResposta("ic10 = 'Ser promovido' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);
            $ic105  = $dao->buscarCountResposta("ic10 = 'Adaptação ao ambiente de trabalho' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);  
            $ic106  = $dao->buscarCountResposta("ic10 = 'Tempo para se dedicar a uma qualificação' and idUsuario = ". $usuarioSelecionado->getId() .$incrementoBusca);
            

            //$formularioUsuario = $dao->buscarPorIdDoUsuario($usuarioSelecionado->getId());
            $formularioUsuario = $formulariosUsuario;
            
//          if($formularioUsuario->getId() == null || $formularioUsuario->getId() == 0)
            if(count($formularioUsuario) == 0)
            {
             echo   '<script type="text/javascript">
                    $j(document).ready(function (){
                        $j("#graficosChart").hide();
                        $j("#semGraficosChart").show();
                    });
                    </script>';
                
            }
            else
            {
                echo   '<script type="text/javascript">
                    $j(document).ready(function (){
                        $j("#graficosChart").show();
                        $j("#semGraficosChart").hide();
                    });
                    </script>';
                
            }
                
            
            ?>
               


         
        <!-- DIV PARA VOLTAR NO TOPO -->
        <div id="voltarTopo"></div>
        
        <style>
           
            .quadrado
            {
                border: 2px #e7e7e7 solid;
                width: 20px;
                height: 20px;              
            }
        </style>
            
        
        
        <div id="graficosChart" class="jumbotron" style=" background: white;">
            <div id="numFormulario">
                    Formulário: 
                    <button type="button" style="border-radius: 20px;" disabled="true" class="btn btn-lg btn-success"> <?php echo $idFormularioBusca; ?></button>                             
            </div>
            <br />
            <center>
            <div id="conteudoPDF">   
            <label>Você voltaria a estudar no IFPR para fazer outros cursos?</label>
            <br />
            <br />
            <br />
            <canvas id="resp1" style="width:100%;"></canvas>
            <br />
            <br />
            <div style="color: graytext;">
                <div style="margin: 5px; float: left;">
                <label>Legenda: </label>
                </div>
                <div style="margin: 5px; float: left;">
                <div class="quadrado" style="background-color: #F7464A;"> </div> Sim
                </div>
                <div style="margin: 5px; float: left;">
                <div class="quadrado" style="background-color: #46BFBD;"> </div> Não
                </div>
            </div>
            <br />
            <div style="clear: both;"></div>    
            <hr />
            <br />
            <label>Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label>
            <br />
            <br />
            <br />
            <canvas id="resp2" style="width:100%;"></canvas>
            <br />
            <br /> 
            <div style="color: graytext;">
                <div style="margin: 5px; float: left;">
                <label>Legenda: </label>
                </div>
                <div style="margin: 5px; float: left;">
                <div class="quadrado" style="background-color: #F7464A;"> </div> Sim
                </div>
                <div style="margin: 5px; float: left;">
                <div class="quadrado" style="background-color: #46BFBD;"> </div> Não
                </div>
            </div>
            <br />
            <div style="clear: both;"></div> 
            <hr />
            <br />
            <label>Você está trabalhando na area atualmente?</label>
            <br />
            <br />
            <br />
            <canvas id="resp3" style="width:100%;"></canvas>
            <br />
            <br /> 
            <div style="color: graytext;">
                <div style="margin: 5px; float: left;">
                <label>Legenda: </label>
                </div>
                <div style="margin: 5px; float: left;">
                <div class="quadrado" style="background-color: #F7464A;"> </div> Sim
                </div>
                <div style="margin: 5px; float: left;">
                <div class="quadrado" style="background-color: #46BFBD;"> </div> Não
                </div>
            </div>
            <br />
            <div style="clear: both;"></div>    
            <hr />
            <br />
            <label>Na contratação de um egresso da sua area, o que é importante para a seleção?</label>
            <br />
            <br />
            <br />
            <canvas id="resp4" style="width:100%;"></canvas>
            <br />
            <br />    
            <div style="color: graytext;">
                <div style="margin: 5px; float: left;">
                <label>Legenda: </label>
                </div>
                <div style="clear: both;"></div>   
                <center>
                <div class="quadrado" style="background-color: #F7464A;"> </div> O nome da Instituição de Ensino onde estudou

                <div class="quadrado" style="background-color: #46BFBD;"> </div> As respostas ao teste de seleção, ao qual foi submetido
                
                <div class="quadrado" style="background-color: #0000FF;"> </div> A formação teórica
                
                <div class="quadrado" style="background-color: #98FB98;"> </div> A experiência prática
                
                <div class="quadrado" style="background-color: #FFD700;"> </div> A experiência prática
                </center>
            </div>
            <br />
            <div style="clear: both;"></div>    
            <hr />
            <br />
            <label> O que tem faltado aos recém-formados em sua area?</label>
            <br />
            <br />
            <br />
            <canvas id="resp5" style="width:100%;"></canvas>
            <br />
            <br />  
            <div style="color: graytext;">
                <div style="margin: 5px; float: left;">
                <label>Legenda: </label>
                </div>
                <div style="clear: both;"></div>   
                <center>
                <div class="quadrado" style="background-color: #F7464A;"> </div> Maior embasamento conceitual

                <div class="quadrado" style="background-color: #46BFBD;"> </div> Maior embasamento técnico
                
                <div class="quadrado" style="background-color: #0000FF;"> </div> Maior embasamento prático
                
                <div class="quadrado" style="background-color: #98FB98;"> </div> Maior aproximação com as necessidades da indústria
                
                <div class="quadrado" style="background-color: #FFD700;"> </div> Maior capacidade de liderança
                
                <div class="quadrado" style="background-color: #E9967A;"> </div> Maior visão sistêmica
                </center>
            </div>
            <br />
            <div style="clear: both;"></div>    
            <hr />
            <br />
            <label>Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label>
            <br />
            <br />
            <br />
            <canvas id="resp6" style="width:100%;"></canvas>
            <br />
            <br />  
            <div style="color: graytext;">
                <div style="margin: 5px; float: left;">
                <label>Legenda: </label>
                </div>
                <div style="clear: both;"></div>   
                <center>
                <div class="quadrado" style="background-color: #F7464A;"> </div> Muito Satisfatório

                <div class="quadrado" style="background-color: #46BFBD;"> </div> Satisfatório
                
                <div class="quadrado" style="background-color: #0000FF;"> </div> Insatisfatório
                
                <div class="quadrado" style="background-color: #98FB98;"> </div> Não sei responder
                
                </center>
            </div>
            <br />
            <div style="clear: both;"></div>    
            <hr />
            <br />               
            <label>Qual foi a principal contribuição do curso?</label>
            <br />
            <br />
            <br />
            <canvas id="resp7" style="width:100%;"></canvas>
            <br />
            <br />
            <div style="color: graytext;">
                <div style="margin: 5px; float: left;">
                <label>Legenda: </label>
                </div>
                <div style="clear: both;"></div>   
                <center>
                <div class="quadrado" style="background-color: #F7464A;"> </div> A obtenção de diploma de nível técnico

                <div class="quadrado" style="background-color: #46BFBD;"> </div> A aquisição de cultura geral
                
                <div class="quadrado" style="background-color: #0000FF;"> </div> A aquisição de formação profissional e teórica
                
                <div class="quadrado" style="background-color: #98FB98;"> </div> Melhores perspectivas de ganhos materiais
                
                </center>
            </div>
            <br />
            <div style="clear: both;"></div>    
            <hr />
            <br />
            <label>Quais foram suas principais dificuldades logo após a conclusão do curso?</label>
            <br />
            <br />
            <br />
            <canvas id="resp8" style="width:100%;"></canvas>
            <br />
            <br />  
            <div style="color: graytext;">
                <div style="margin: 5px; float: left;">
                <label>Legenda: </label>
                </div>
                <div style="clear: both;"></div>   
                <center>
                <div class="quadrado" style="background-color: #F7464A;"> </div> Encontrar emprego na área

                <div class="quadrado" style="background-color: #46BFBD;"> </div> Adequação salarial
                
                <div class="quadrado" style="background-color: #0000FF;"> </div> Continuar na mesma empresa
                
                <div class="quadrado" style="background-color: #98FB98;"> </div> Ser promovido
                
                <div class="quadrado" style="background-color: #FFD700;"> </div> Adaptação ao ambiente de trabalho
                
                <div class="quadrado" style="background-color: #E9967A;"> </div> Tempo para se dedicar a uma qualificação
                </center>
            </div>
            <br />
            <div style="clear: both;"></div>    
            <hr />
            <br />
            </div>
            </center>
            <script type="text/javascript">


                
                function printTela(el)
                {
                    
                    var conteudo = document.getElementById(el).innerHTML;  
                    var win = window.open();  
                    win.document.write(conteudo);  
                    win.print();  
                    win.close();
                    
                }
                
                function printTelaSemGrafico()
                {
                    
                    var conteudo = document.getElementById('dadosAlunoBaixar').innerHTML;  
                    var win = window.open();  
                    win.document.write(conteudo);  
                    win.print();  
                    win.close();
                    
                }
                
                
            </script>
            <hr />
            <div style="float: right;">
                <button  title="Baixar gráfico" onclick="printTela('dadosAlunoBaixar')" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-cloud-download"></span>
                                Baixar</button>
            </div>
            
            <div id="dadosAlunoBaixar" style="display: none;">
                
                <div style="color: graytext;">
                    <img src="../resources/img/logo.png"  />
                    <div style="float: right;">
                        <?php date_default_timezone_set('America/Sao_Paulo');
                        $date = date('Y-m-d H:i');
                        echo $date; ?>
                    </div>
                    <div style="clear: both;"></div>
                    <hr />
                    <table>
                        <tr>
                        <td>Nome</td>
                        <td><?php echo $usuarioSelecionado->getNome() ?></td>
                        </tr>
                        <tr>
                        <td>Cpf</td>
                        <td><?php echo $usuarioSelecionado->getCpf() ?></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td><?php echo $usuarioSelecionado->getEmail() ?></td>
                        </tr>
                        <tr>
                        <td>Telefone</td>
                        <td><?php echo $usuarioSelecionado->getTelefone() ?></td>
                        </tr>
                        <tr>
                        <td>Curso</td>
                        <td>Técnico em Informática</td>
                        </tr>
                    </table>                   
                    <hr />
                    <br />
                    
                    <?php
                    
                    if(count($formularioUsuario) >= 1){
                
              echo " 
                    <h3>Dados pessoais</h3><br />
                    <label>1 - Ano de Conclusão:</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getAnoConclusao() ." </label><br />";
                    }                    
                    echo "<label>2 - Sementre:</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getSemestre() ." </label><br />";
                    }
                   echo "<hr />";
              
              echo "
                    <h3>Informações sobre o curso</h3><br />
                    <label>1 - Qual o curso que você fez?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getAnoConclusao() ." </label><br />";
                    }
                    echo "<label>2 - Qual foi o tipo de curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC2() ." </label><br />";
                    }
                    echo "<label>3 - O que achou do curso que fez?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC3() ." </label><br />";
                    }
                    echo "<label>4 - A duração do curso foi suficiente?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC4() ." </label><br />";
                    }
                    echo "<label>5 - Como foi a parte teórica do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC5() ." </label><br />";
                    } 
                    echo "<label>6 - Como foi a parte prática do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC6() ." </label><br />";
                    }
                    echo "<label>7 - Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC7() ." </label><br />";
                    }  
                    echo "<label>8 - Como você avalia o nivel de exigência do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC8() ." </label><br />";
                    }  
                    echo "<label>9 - Qual foi a principal contribuição do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC9() ." </label><br />";
                    }  
                    echo "<label>10 - Quais foram suas principais dificuldades logo após a conclusão do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC10() ." </label><br />";
                    }                  
                    echo"<hr />";
              
              echo "
                    <h3>Informações sobre o corpo docente</h3><br />
                    <label>1 - De modo geral, os professores tinham domínio do conteúdo das disciplinas que deram?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getID1() ." </label><br />";
                    } 
                    echo "<label>2 - De modo geral, como foram os recursos utilizados pelos professores durante as aulas?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getID2() ." </label><br />";
                    }
                    echo "<label>3 - De Modo geral, como foi a relação do professor com os alunos?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getID1() ." </label><br />";
                    }                    
                   echo "<hr />";
              
             
              echo "
                    <h3>Informações pessoais</h3><br />
                    <label>1 - Você já tinha uma profissão antes de fazer o curso? Se sim, onde?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIP1() ." </label><br />";
                    }
                    echo"<label>2 - Você estava trabalhando na área durante o curso? Se sim, onde?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIP2() ." </label><br />";
                    }
                    echo"<label>3 - Você está trabalhando na área atualmente? Se sim, em que/onde?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIP3() ." </label><br />";
                         if($value->getIP3() != null && ($value->getIP3() != "Não"
                                && $value->getIP3() != "não" && $value->getIP3() != "NÃO"
                                && $value->getIP3() != "nao" && $value->getIP3() != "Nao" && $value->getIP3() != "NAO"  )){
                                 $painel = ""
                                 ."<label>A - Qual o seu grau de satisfação com a sua atividade profissional?</label><br />"
                                 ."<label style='color:graytext;'>R: ". $value->getIP3A() ." </label><br />"   
                                 ."<label>B - Você egresso recém-formado, atende às necessidades da empresa para a qual você trabalha?</label><br />"
                                 ."<label style='color:graytext;'>R: ". $value->getIP3B() ." </label><br />"
                                 ."<label>C - Qual das habilidades abaixo está sendo mais exigida em seu exercício profissional?</label><br />"
                                 ."<label style='color:graytext;'>R: ". $value->getIP3C() ." </label><br />"
                                 ."<label> D - Qual a sua faixa salarial?</label><br />"
                                 ."<label style='color:graytext;'>R: ". $value->getIP3D() ." </label><br />"
                                     ;

                             }else{
                                 $painel = ""; 
                             }
                       
                    }
//                    ."<label style='color:graytext;'>R: ". $formularioUsuario->getIP3() ." </label><br />"                    
//                    .$painel
                    echo "<hr />";
              
              
              echo "
                    <h3>Informações adicionais</h3><br />
                     <label>1 - Na sua opinião um estudante recêm-formado em sua área que tenha dedicado todo o tempo de estudo somente às atividades acadêmicas, leva mais tempo para se adaptar ao mercado do que um outro que já trabalhava na área durante o dia e estudava a noite?</label><br /> ";
                     foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA1() ." </label><br />";
                    } 
                    echo "<label>2 - Na contratação de um egresso de sua área, o que é relevante no processo de seleção?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA2() ." </label><br />";
                    }
                    echo"<label>3 - O que tem faltado aos recêm-formados em sua área?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA3() ." </label><br />";
                    }
                    echo"<label>4 - Em sua opinião, quanto tempo leva um egresso, recêm-formado em sua area, para tornar-se altamente produtivo, após ser contratado por sua empresa?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA4() ." </label><br />";
                    }  
                    echo"<label>5 - Você voltaria a estudar no IFPR para fazer outros cursos?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA5() ." </label><br />";
                    } 
                    echo "<label>6 - Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA6() ." </label><br />";
                    }
                    echo"<label> Sugestões (se houver):</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getSugestao() ." </label><br />";
                    }
                    echo"<hr />";
              
              
          }
                    
                    ?>
                    
                </div>
                
                
                
            </div>
            
            
            <!--script para a criação dos gráficos -->
            <script type="text/javascript">

                var options = {
                    responsive:true
                };
                //resposta ia5
                var data = [
                    {
                        value: <?php echo $simia5['COUNT(id)'] ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Sim"
                    },
                    {
                        value: <?php echo $naoia5['COUNT(id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Não"
                    }
                ];
                
                //resposta ia6
                var data3 = [
                    {
                        value: <?php echo $simia6['COUNT(id)'] ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Sim"
                    },
                    {
                        value: <?php echo $naoia6['COUNT(id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Não"
                    }
                ];
                
                 //resposta ip3
                var data4 = [
                    {
                        value: <?php echo $simip3['COUNT(id)'] ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Sim"
                    },
                    {
                        value: <?php echo $naoip3['COUNT(id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Não"
                    }
                ];
     
                
                //resposta ia2
                var data5 = [
                    {
                        value: <?php echo $ia21['COUNT(id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "O nome da Instituição de Ensino onde estudou"
                    },
                    {
                        value: <?php echo $ia22['COUNT(id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "As respostas ao teste de seleção, ao qual foi submetido"
                    },
                    {
                        value: <?php echo $ia23['COUNT(id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "A formação teórica"
                    },
                    {
                        value: <?php echo $ia24['COUNT(id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "A experiência prática"
                    },
                    {
                        value: <?php echo $ia25['COUNT(id)']  ?>,
                        color: "#FFD700",
                        highlight: "#F0E68C",
                        label: "Visão sistámica"
                    }
                ];
                
                 //resposta ia3
                var data6 = [
                    {
                        value: <?php echo $ia31['COUNT(id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Maior embasamento conceitual"
                    },
                    {
                        value: <?php echo $ia32['COUNT(id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Maior embasamento técnico"
                    },
                    {
                        value: <?php echo $ia33['COUNT(id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "Maior embasamento prático"
                    },
                    {
                        value: <?php echo $ia34['COUNT(id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "Maior aproximação com as necessidades da indússtria"
                    },
                    {
                        value: <?php echo $ia35['COUNT(id)']  ?>,
                        color: "#FFD700",
                        highlight: "#F0E68C",
                        label: "Maior capacidade de liderança"
                    },
                    {
                        value: <?php echo $ia36['COUNT(id)']  ?>,
                        color: "#E9967A",
                        highlight: "#FFA07A",
                        label: "Maior visão sistêmica"
                    }
                ];
                
                 //resposta ic7
                var data7 = [
                    {
                        value: <?php echo $ic71['COUNT(id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Muito Satisfatório"
                    },
                    {
                        value: <?php echo $ic72['COUNT(id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Satisfatório"
                    },
                    {
                        value: <?php echo $ic73['COUNT(id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "Insatisfatório"
                    },
                    {
                        value: <?php echo $ic74['COUNT(id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "Não sei responder"
                    }
                ];
     
                
                  //resposta ic9
                var data8 = [
                    {
                        value: <?php echo $ic91['COUNT(id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "A obtenção de diploma de nível técnico"
                    },
                    {
                        value: <?php echo $ic92['COUNT(id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "A aquisição de cultura geral"
                    },
                    {
                        value: <?php echo $ic93['COUNT(id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "A aquisiçaoo de formação profissional e teórica"
                    },
                    {
                        value: <?php echo $ic94['COUNT(id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "Melhores perspectivas de ganhos materiais"
                    }
                ];
  
                //resposta ic10
                var data9 = [
                    {
                        value: <?php echo $ic101['COUNT(id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Encontrar emprego na área"
                    },
                    {
                        value: <?php echo $ic102['COUNT(id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Adequação salarial"
                    },
                    {
                        value: <?php echo $ic103['COUNT(id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "Continuar na mesma empresa"
                    },
                    {
                        value: <?php echo $ic104['COUNT(id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "Ser promovido"
                    },
                    {
                        value: <?php echo $ic105['COUNT(id)']  ?>,
                        color: "#FFD700",
                        highlight: "#F0E68C",
                        label: "Adaptação ao ambiente de trabalho"
                    },
                    {
                        value: <?php echo $ic106['COUNT(id)']  ?>,
                        color: "#E9967A",
                        highlight: "#FFA07A",
                        label: "Tempo para se dedicar a uma qualificação"
                    }
                ];
   
                
             
                
                window.onload = function(){

                    //PERGUNTA 1
                    var ctx = document.getElementById("resp1").getContext("2d");  
                    var Chart1 = new Chart(ctx).Pie(data, options);
                    
                    //PERGUNTA 2
                    var ctx2 = document.getElementById("resp2").getContext("2d");
                    var Chart2 = new Chart(ctx2).Pie(data3, options);
                    
                    //PERGUNTA 3
                    var ctx3 = document.getElementById("resp3").getContext("2d");
                    var Chart3 = new Chart(ctx3).Pie(data4, options);
                    
                    //PERGUNTA 4
                    var ctx4 = document.getElementById("resp4").getContext("2d");
                    var Chart4 = new Chart(ctx4).Pie(data5, options);
                    
                    //PERGUNTA 5
                    var ctx5 = document.getElementById("resp5").getContext("2d");
                    var Chart5 = new Chart(ctx5).Pie(data6, options);
                    
                    //PERGUNTA 6
                    var ctx6 = document.getElementById("resp6").getContext("2d");
                    var Chart6 = new Chart(ctx6).Pie(data7, options);
                    
                    //PERGUNTA 7
                    var ctx7 = document.getElementById("resp7").getContext("2d");
                    var Chart7 = new Chart(ctx7).Pie(data8, options);
                    
                    //PERGUNTA 8
                    var ctx8 = document.getElementById("resp8").getContext("2d");
                    var Chart8 = new Chart(ctx8).Pie(data9, options);
                }; 
            </script> 
            
             

     
            
         </div>
        
        <div id="semGraficosChart" class="jumbotron" style=" background: white;">
            
            <div style='color: red;'><center><h3>O usuário <?php echo $usuarioSelecionado->getNome() ?> ainda não respondeu o formulário</h3></center></div>
            <hr />
            
            
        </div>
        
    </div>  
    </div> 
    </div>
         
<div id="semgraficos" style="color: graytext;">
<div class="row" style="margin-top: 5%; margin-bottom: 5%;">
<div class="col-md-12 col-sm-12 col-xs-12" >
<div class="jumbotron" style=" background: white;">
             
         
             <?php 
             
             
          
//            if($formularioUsuario->getId() != null || $formularioUsuario->getId() != 0)
            if(count($formularioUsuario) >= 1){
                
              echo " 
                    <h3>Dados pessoais</h3><br />
                    <label>1 - Ano de Conclusão:</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getAnoConclusao() ." </label><br />";
                    }                    
                    echo "<label>2 - Sementre:</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getSemestre() ." </label><br />";
                    }
                   echo "<hr />";
              
              echo "
                    <h3>Informações sobre o curso</h3><br />
                    <label>1 - Qual o curso que você fez?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getAnoConclusao() ." </label><br />";
                    }
                    echo "<label>2 - Qual foi o tipo de curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC2() ." </label><br />";
                    }
                    echo "<label>3 - O que achou do curso que fez?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC3() ." </label><br />";
                    }
                    echo "<label>4 - A duração do curso foi suficiente?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC4() ." </label><br />";
                    }
                    echo "<label>5 - Como foi a parte teórica do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC5() ." </label><br />";
                    } 
                    echo "<label>6 - Como foi a parte prática do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC6() ." </label><br />";
                    }
                    echo "<label>7 - Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC7() ." </label><br />";
                    }  
                    echo "<label>8 - Como você avalia o nivel de exigência do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC8() ." </label><br />";
                    }  
                    echo "<label>9 - Qual foi a principal contribuição do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC9() ." </label><br />";
                    }  
                    echo "<label>10 - Quais foram suas principais dificuldades logo após a conclusão do curso?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIC10() ." </label><br />";
                    }                  
                    echo"<hr />";
              
              echo "
                    <h3>Informações sobre o corpo docente</h3><br />
                    <label>1 - De modo geral, os professores tinham domínio do conteúdo das disciplinas que deram?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getID1() ." </label><br />";
                    } 
                    echo "<label>2 - De modo geral, como foram os recursos utilizados pelos professores durante as aulas?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getID2() ." </label><br />";
                    }
                    echo "<label>3 - De Modo geral, como foi a relação do professor com os alunos?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getID1() ." </label><br />";
                    }                    
                   echo "<hr />";
              
//              $painel = "";
//              
//              foreach ($formularioUsuario as $value) {
//                if($value->getIP3() != null && ($value->getIP3() != "Não"
//                   && $value->getIP3() != "não" && $value->getIP3() != "NÃO"
//                   && $value->getIP3() != "nao" && $value->getIP3() != "Nao" && $value->getIP3() != "NAO"  )){
//                    $painel = ""
//                    ."<label>A - Qual o seu grau de satisfação com a sua atividade profissional?</label><br />"
//                    ."<label style='color:graytext;'>R: ". $value->getIP3A() ." </label><br />"   
//                    ."<label>B - Você egresso recém-formado, atende às necessidades da empresa para a qual você trabalha?</label><br />"
//                    ."<label style='color:graytext;'>R: ". $value->getIP3B() ." </label><br />"
//                    ."<label>C - Qual das habilidades abaixo está sendo mais exigida em seu exercício profissional?</label><br />"
//                    ."<label style='color:graytext;'>R: ". $value->getIP3C() ." </label><br />"
//                    ."<label> D - Qual a sua faixa salarial?</label><br />"
//                    ."<label style='color:graytext;'>R: ". $value->getIP3D() ." </label><br />"
//                        ;
//
//                }else{
//                    $painel = ""; 
//                }
//              }
             
              echo "
                    <h3>Informações pessoais</h3><br />
                    <label>1 - Você já tinha uma profissão antes de fazer o curso? Se sim, onde?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIP1() ." </label><br />";
                    }
                    echo"<label>2 - Você estava trabalhando na área durante o curso? Se sim, onde?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIP2() ." </label><br />";
                    }
                    echo"<label>3 - Você está trabalhando na área atualmente? Se sim, em que/onde?</label><br />";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIP3() ." </label><br />";
                         if($value->getIP3() != null && ($value->getIP3() != "Não"
                                && $value->getIP3() != "não" && $value->getIP3() != "NÃO"
                                && $value->getIP3() != "nao" && $value->getIP3() != "Nao" && $value->getIP3() != "NAO"  )){
                                 $painel = ""
                                 ."<label>A - Qual o seu grau de satisfação com a sua atividade profissional?</label><br />"
                                 ."<label style='color:graytext;'>R: ". $value->getIP3A() ." </label><br />"   
                                 ."<label>B - Você egresso recém-formado, atende às necessidades da empresa para a qual você trabalha?</label><br />"
                                 ."<label style='color:graytext;'>R: ". $value->getIP3B() ." </label><br />"
                                 ."<label>C - Qual das habilidades abaixo está sendo mais exigida em seu exercício profissional?</label><br />"
                                 ."<label style='color:graytext;'>R: ". $value->getIP3C() ." </label><br />"
                                 ."<label> D - Qual a sua faixa salarial?</label><br />"
                                 ."<label style='color:graytext;'>R: ". $value->getIP3D() ." </label><br />"
                                     ;

                             }else{
                                 $painel = ""; 
                             }
                       
                    }
//                    ."<label style='color:graytext;'>R: ". $formularioUsuario->getIP3() ." </label><br />"                    
//                    .$painel
                    echo "<hr />";
              
              
              echo "
                    <h3>Informações adicionais</h3><br />
                     <label>1 - Na sua opinião um estudante recêm-formado em sua área que tenha dedicado todo o tempo de estudo somente às atividades acadêmicas, leva mais tempo para se adaptar ao mercado do que um outro que já trabalhava na área durante o dia e estudava a noite?</label><br /> ";
                     foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA1() ." </label><br />";
                    } 
                    echo "<label>2 - Na contratação de um egresso de sua área, o que é relevante no processo de seleção?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA2() ." </label><br />";
                    }
                    echo"<label>3 - O que tem faltado aos recêm-formados em sua área?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA3() ." </label><br />";
                    }
                    echo"<label>4 - Em sua opinião, quanto tempo leva um egresso, recêm-formado em sua area, para tornar-se altamente produtivo, após ser contratado por sua empresa?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA4() ." </label><br />";
                    }  
                    echo"<label>5 - Você voltaria a estudar no IFPR para fazer outros cursos?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA5() ." </label><br />";
                    } 
                    echo "<label>6 - Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getIA6() ." </label><br />";
                    }
                    echo"<label> Sugestões (se houver):</label><br /> ";
                    foreach ($formularioUsuario as $value) {
                        echo "<label style='color:graytext;'>R: ". $value->getSugestao() ." </label><br />";
                    }
                    echo"<hr />";
              
    
              echo '<div style="float: right;">
                <button  title="Baixar gráfico" onclick="printTelaSemGrafico()" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-cloud-download"></span>
                                Baixar</button>
                </div>';
              
              
          }
          else{
              
              echo "<div style='color: red;'><center><h3>O usuário ".$usuarioSelecionado->getNome()." ainda não respondeu o formulário</h3></center></div>";
          }
          
          ?>
  
</div>
</div>
</div>
</div>
            
          
            
<!-- Modal de visualiziação  -->
<div id="modalDeletar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
                     <button type="button" style="border-radius: 20px;" disabled="true" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-trash"></span></button>                              
        </h4>
      </div>
      <div class="modal-body">
          <div class="jumbotron" style=" background: white;">
              <label>Tem certeza que deseja excluir <?php echo $usuarioSelecionado->getNome() ?>?</label>
              <br />
              <br />
              <center>
                  <div class="btn-group">
                      <a  href="<?php echo 'dados.php?id='.$idSelecionado.'&deletar=sim' ?>" class="btn btn-danger btn-lg" >
                        <span class="glyphicon glyphicon-ok"></span>               
                        Sim                       
                    </a>  
                    <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>               
                        Não                       
                    </button>  
                  </div>
              </center>         
          </div>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="modalAlterar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
                 <button type="button" style="border-radius: 20px;" disabled="true" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-pencil"></span></button>                             
        </h4>
      </div>
      <div class="modal-body">
          <div class="jumbotron" style=" background: white;">
               <div id="alterarAluno">                     
                        <form id="frmAlterarAluno" method="POST" role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $idSelecionado;?>">
                            <input type="hidden" name="acao" value="alterarUsuario" />
                            <div class="form-group">
                                <label  for="nomeAlterar">Nome:</label>
                                <input type="text" placeholder="Insere o nome" value="<?php echo $usuarioSelecionado->getNome(); ?>" required="true" class="form-control" name="nomeAlterar" />
                            </div>
                            <div class="form-group">
                                <label  for="cursoAlterar">Curso:</label>
                                <select name="cursoAlterar" required="true" class="form-control">
                                    <option value="<?php echo $usuarioSelecionado->getIdCurso(); ?>"><?php echo $cursoUsuarioSelecionado->getNome(); ?></option>
                                    <?php

                                        foreach ($cursos as $value) 
                                        {
                                            echo "<option value=".$value->getId().">".$value->getNome()."</option>";
                                        }

                                    ?>
                                  </select>
                            </div>
                            <div class="form-group">
                                <label  for="cpfAlterar">Cpf:</label>
                                <input type="text" placeholder="Insere o cpf" value="<?php echo $usuarioSelecionado->getCpf(); ?>" name="cpfAlterar" id="cpfAlterar" required="true" class="form-control" maxlength="14">
                            </div>
                            <div class="form-group">
                                <label  for="emailAlterar">Email:</label>
                                <input type="email" placeholder="Insere o email" value="<?php echo $usuarioSelecionado->getEmail(); ?>" required="true" class="form-control" name="emailAlterar" />
                            </div>
                            <div class="form-group">
                                <label  for="telefoneAlterar">Telefone:</label>
                                <input type="tel" placeholder="Insere o telefone" value="<?php echo $usuarioSelecionado->getTelefone(); ?>" required="true" class="form-control" name="telefoneAlterar" />
                            </div>
                            <div class="form-group">
                                <label  for="dataEnvioAlterar">Data de Envio:</label>
                                <input type="date" placeholder="Escolha a data" value="<?php echo $emailUsuario->getDataEnvio(); ?>" required="true" class="form-control" name="dataEnvioAlterar" />
                            </div>
                            <center>
                                <div class="btn-group">
                                    <button  type="submit" class="btn btn-success btn-lg">
                                     <span class="glyphicon glyphicon-ok"></span>
                                    Alterar</button>
                                </div>
                            </center>
                </form>
        </div>    
          </div>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="modalEmail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
                     <button type="button" style="border-radius: 20px;" disabled="true" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-envelope"></span></button>                                  
        </h4>
      </div>
      <div class="modal-body">
          <div class="jumbotron" style=" background: white; color: graytext;">
              
        <form action="email.php" method="POST" role="form" >
            <div class="form-group">
                <label  for="email">De: Moderador</label>
            </div>
            <div class="form-group">
                <label  for="destino">Para:</label>
                <input type="text" placeholder="Infome o destinatário" required="true" class="form-control" name="destino" />
            </div>   
            <div class="form-group">
                <label  for="assunto">Assunto:</label>
                <input type="text" placeholder="Informe o assunto" required="true" class="form-control" name="assunto" />
            </div>  
            <div class="form-group">
                <label  for="msg">Menssagem:</label>
                <textarea  placeholder="Escreva a menssagem aqui" required="true" class="form-control" name="msg" ></textarea>
            </div>
            <center>
                <div class="btn-group">
                <button type="submit" class="btn btn-success btn-lg">
                    <span class="glyphicon glyphicon-ok"></span>
                    Enviar</button>
                <a href="index.php" class="btn btn-danger btn-lg">
                    <span class="glyphicon glyphicon-remove"></span>
                    Cancelar</a>
                </div>
            </center>
        </form>
          
          </div>         
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
    
        <button type="button" id="btnVoltarTopo" class="btn btn-sm btn-info" style="
                    bottom: 20px !important;
                    position: fixed;
                    right: 30px;" 
                onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);" value="Topo" >
                <span class="glyphicon glyphicon-chevron-up"></span>
            </button>
    
</div>  



<?php 
          require_once '../visao/componentes.php';
          require_once '../template/rodape.php'; 
?>

<!-- deletar usuario -->
<?php 

//VERIFICA A AÇÃO QUE FOI DISPARADA  
if(isset($_POST['acao'])){
        
        //EXECUTAR AÇÃO PARA ALTERAR O USUARIO
        if($_POST['acao'] == "alterarUsuario")
        {
          
            //DADOS DE ALTERAÇÃO
            $usuarioSelecionado->setNome($_POST['nomeAlterar']);
            $usuarioSelecionado->setTelefone($_POST['telefoneAlterar']);
            $usuarioSelecionado->setCpf($_POST['cpfAlterar']);
            $usuarioSelecionado->setEmail($_POST['emailAlterar']);
            $usuarioSelecionado->setIdCurso($_POST['cursoAlterar']);
            
            $emailUsuario->setDataEnvio($_POST['dataEnvioAlterar']);
            $emailUsuario->setEnviado(0);
            
            //SE O USUARIO MUDOU DE CURSO, ZERAR A QUANT RESP
            //USUARIO TERÁ QUE RESPONDER NOVAMENTE 5 FORMULÁRIOS DURANTE 5 ANOS
            if($cursoUsuarioSelecionado->getId() != $_POST['cursoAlterar'])
            {
                $usuarioSelecionado->setQtdResponde(0);
            }
            
            try
            {
                
            $daoUsuario->atualizar($usuarioSelecionado);
            $daoEmail->atualizar($emailUsuario);
            
            echo "<script type='text/javascript'>";
            echo "var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#modalMsgSucessoComLoading').modal('show');
                });";
            echo "location.href='http://localhost/questionario/adm/dados.php?id=".$idSelecionado."&idFormulario=Todos';";
            echo "</script>";
            
            }
            catch (Exception $erro)
            {
             
            echo "<script type='text/javascript'>";
            echo "var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#modalMsgErro').modal('show');
                });";
            echo "location.href='http://localhost/questionario/adm/gerenciar.php?id=".$idSelecionado."';";
            echo "</script>";
                
                
            }
            
        }
        
        
        
    }



//EXECUTAR AÇÃO PARA DELETAR O USUARIO
if(isset($_GET['deletar'])){
   if($_GET['deletar'] == "sim"){
      
       try
       {
       //ALTERAR O ID DO USUARIO NO FORMULÁRIO OU DELETAR OS FORMULÁRIOS RELACIONADOS A ELE
       $idForm = 0;
       
       $daoUsuario->deletar($usuarioSelecionado->getId());
       
       if($idForm != null && $idForm != 0){
              
           $daoFormulario->deletar($usuarioSelecionado->getLiberado());
       }
       
       echo "<script type='text/javascript'>";
            echo "var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#modalMsgSucessoComLoading').modal('show');
                });";
            echo "location.href='http://localhost/questionario/adm/gerenciar.php';";
       echo "</script>";
       
       
       }
       catch (Exception $erro){
           
       print($erro);  
           
       echo "<script type='text/javascript'>";  
            echo "var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#modalMsgErro').modal('show');
                });";
            echo "location.href='http://localhost/questionario/adm/gerenciar.php';";
       echo "</script>";
           
       }
       
   } 
}

?>


