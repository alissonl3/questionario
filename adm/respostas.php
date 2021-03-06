  <?php require '../template/topoadm.php';?>


   <?php  
   
   include_once  '../dao/DaoFormulario.php';
   include_once '../entidades/Formulario.php'; 
   
   //curso
    include_once  '../dao/DaoCurso.php';
    include_once '../entidades/Curso.php';
   
   
   include_once '../banco/Conexao.php'; 
   
   $dao = new DaoFormulario();
   
   $daoCurso = new DaoCurso(); 
   $cursos = $daoCurso->buscarTodos();
   
$anoConclusao = "";
$cursoPesquisa = "";

$queryBusca = "";
if(isset($_GET['anoConclusao']) || isset($_GET['curso'])){
    
    $anoConclusao = $_GET['anoConclusao'];
    $cursoPesquisa = $_GET['curso'];
    
        if($_GET['curso'] != "0" && $_GET['curso'] != null)
        {
            
           $queryBusca = $queryBusca. " and usuario.idCurso = ".$cursoPesquisa;
            
        }
        
        if($_GET['anoConclusao'] != "" && $_GET['anoConclusao'] != null)
        {
            
          $queryBusca = $queryBusca. " and formulario.anoConclusao = ".$anoConclusao;
            
        }
        
}
   
    ?>
           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        
          <!-- SCRIPT DE IMPORTAÇÃO DO CHART -->
        <script src="../resources/js/Chart.js"></script>
        
         
               <!--script para a busca dos dados -->
            <?php 
      
            
            $simia5  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia5 = 'Sim' " .$queryBusca) ;
            $naoia5 =  $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia5 = 'Não' " .$queryBusca);
                    
            $simia6  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia6 = 'Sim' " .$queryBusca);   
            $naoia6  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia6 = 'Não' " .$queryBusca);
            
            $ia21  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia2 = 'O nome da Instituição de Ensino onde estudou' " .$queryBusca);  
            $ia22  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia2 = 'As respostas ao teste de seleção, ao qual foi submetido' " .$queryBusca); 
            $ia23  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia2 = 'A formação teórica' " .$queryBusca); 
            $ia24  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia2 = 'A experiência prática' " .$queryBusca); 
            $ia25  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia2 = 'Visão sistámica' " .$queryBusca); 
            
            $simip3  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ip3 = 'Sim' " .$queryBusca);   
            $naoip3  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ip3 = 'Não' " .$queryBusca);
            
            $ia31  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia3 = 'Maior embasamento conceitual' " .$queryBusca);  
            $ia32  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia3 = 'Maior embasamento técnico' " .$queryBusca); 
            $ia33  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia3 = 'Maior embasamento prático' " .$queryBusca); 
            $ia34  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia3 = 'Maior aproximação com as necessidades da indússtria' " .$queryBusca); 
            $ia35  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ia3 = 'Maior capacidade de liderança' " .$queryBusca);
           
            $ic71  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic7 = 'Muito Satisfatório' " .$queryBusca);  
            $ic72  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic7 = 'Satisfatório' " .$queryBusca); 
            $ic73  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic7 = 'Insatisfatório' " .$queryBusca); 
            $ic74  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic7 = 'Não sei responder' " .$queryBusca); 
            
            $ic91  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic9 = 'A obtenção de diploma de nível técnico' " .$queryBusca);  
            $ic92  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic9 = 'A aquisição de cultura geral' " .$queryBusca); 
            $ic93  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic9 = 'A aquisiçaoo de formação profissional e teórica' " .$queryBusca); 
            $ic94  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic9 = 'Melhores perspectivas de ganhos materiais' " .$queryBusca);
            
            $ic101  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic10 = 'Encontrar emprego na área' " .$queryBusca);  
            $ic102  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic10 = 'Adequação salarial' " .$queryBusca); 
            $ic103  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic10 = 'Continuar na mesma empresa' " .$queryBusca); 
            $ic104  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic10 = 'Ser promovido' " .$queryBusca);
            $ic105  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic10 = 'Adaptação ao ambiente de trabalho' " .$queryBusca);  
            $ic106  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario and formulario.ic10 = 'Tempo para se dedicar a uma qualificação' " .$queryBusca);

            
            
            ?>
               
          
               
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
        <style>
           
            .quadrado
            {
                border: 2px #e7e7e7 solid;
                width: 20px;
                height: 20px;              
            }
        </style>
        
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
                                  <li>A pesquisa pode ser feita informando o ano de conclusão ou/e curso</li>
                                  <li>Pode voltar a buscar normal clicando em "Restaurar"</li>
                              </ul>
                              <p>Visualizar:</p>
                              <ul>
                                  <li>Pode visualizar os dados da pesquisa nos gráficas à seguir</li>
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
                    <img src="../resources/img/visualizar.png" style="max-height: 100px;"  class="img-rounded img-responsive" />
                </center>
                <br />
         </center>
         
         <form action="respostas.php" method="GET">
                <div class="form-group">
                    <label for="anoConclusao">Ano de conclusão:</label>
                    <input type="number" class="form-control" id="anoConclusao" name="anoConclusao">
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
                <button type="submit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span>Pesquisar</button>                 
                <a href="respostas.php" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-refresh"></span>Restaurar</a>                          
            </form>
         <br />
         <hr />
         
         <?php
         
         $formularios  = $dao->buscarCountRespostaComUsuario("usuario.id = formulario.idUsuario " .$queryBusca);
         
         if($formularios['COUNT(formulario.id)'] > 0)
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
            <center>
                
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
            <label>Quais foram suas principais dificuldades logo após a conclusÃ£o do curso?</label>
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
            </center>
         </div>
         
         <div id="semResultado">
             <br />
             <div style='color: red;'><center><h3>Não retornou resultado!</h3></center></div>;         
         </div>
            
            <!-- botao voltar topo -->
            <button type="button" id="btnVoltarTopo" class="btn btn-sm btn-info" style="
                    bottom: 20px !important;
                    position: fixed;
                    right: 30px;" 
                onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);" value="Topo" >
                <span class="glyphicon glyphicon-chevron-up"></span>
            </button>
            
            
            
       

            
            <!--script para a criação dos gráficos -->
            <script type="text/javascript">

                var options = {
                    responsive:true
                };
                //resposta ia5
                var data = [
                    {
                        value: <?php echo $simia5['COUNT(formulario.id)'] ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Sim"
                    },
                    {
                        value: <?php echo $naoia5['COUNT(formulario.id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Não"
                    }
                ];
                
                //resposta ia6
                var data3 = [
                    {
                        value: <?php echo $simia6['COUNT(formulario.id)'] ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Sim"
                    },
                    {
                        value: <?php echo $naoia6['COUNT(formulario.id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Não"
                    }
                ];
                
                 //resposta ip3
                var data4 = [
                    {
                        value: <?php echo $simip3['COUNT(formulario.id)'] ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Sim"
                    },
                    {
                        value: <?php echo $naoip3['COUNT(formulario.id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Não"
                    }
                ];
     
                
                //resposta ia2
                var data5 = [
                    {
                        value: <?php echo $ia21['COUNT(formulario.id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "O nome da Instituição de Ensino onde estudou"
                    },
                    {
                        value: <?php echo $ia22['COUNT(formulario.id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "As respostas ao teste de seleção, ao qual foi submetido"
                    },
                    {
                        value: <?php echo $ia23['COUNT(formulario.id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "A formação teórica"
                    },
                    {
                        value: <?php echo $ia24['COUNT(formulario.id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "A experiência prática"
                    },
                    {
                        value: <?php echo $ia25['COUNT(formulario.id)']  ?>,
                        color: "#FFD700",
                        highlight: "#F0E68C",
                        label: "Visão sistámica"
                    }
                ];
                
                 //resposta ia3
                var data6 = [
                    {
                        value: <?php echo $ia31['COUNT(formulario.id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Maior embasamento conceitual"
                    },
                    {
                        value: <?php echo $ia32['COUNT(formulario.id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Maior embasamento técnico"
                    },
                    {
                        value: <?php echo $ia33['COUNT(formulario.id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "Maior embasamento prático"
                    },
                    {
                        value: <?php echo $ia34['COUNT(formulario.id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "Maior aproximação com as necessidades da indússtria"
                    },
                    {
                        value: <?php echo $ia35['COUNT(formulario.id)']  ?>,
                        color: "#FFD700",
                        highlight: "#F0E68C",
                        label: "Maior capacidade de liderança"
                    }
                ];
                
                 //resposta ic7
                var data7 = [
                    {
                        value: <?php echo $ic71['COUNT(formulario.id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Muito Satisfatório"
                    },
                    {
                        value: <?php echo $ic72['COUNT(formulario.id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Satisfatório"
                    },
                    {
                        value: <?php echo $ic73['COUNT(formulario.id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "Insatisfatório"
                    },
                    {
                        value: <?php echo $ic74['COUNT(formulario.id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "Não sei responder"
                    }
                ];
     
                
                  //resposta ic9
                var data8 = [
                    {
                        value: <?php echo $ic91['COUNT(formulario.id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "A obtenção de diploma de nível técnico"
                    },
                    {
                        value: <?php echo $ic92['COUNT(formulario.id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "A aquisição de cultura geral"
                    },
                    {
                        value: <?php echo $ic93['COUNT(formulario.id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "A aquisiçaoo de formação profissional e teórica"
                    },
                    {
                        value: <?php echo $ic94['COUNT(formulario.id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "Melhores perspectivas de ganhos materiais"
                    }
                ];
  
                //resposta ic10
                var data9 = [
                    {
                        value: <?php echo $ic101['COUNT(formulario.id)']  ?>,
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Encontrar emprego na área"
                    },
                    {
                        value: <?php echo $ic102['COUNT(formulario.id)']  ?>,
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Adequação salarial"
                    },
                    {
                        value: <?php echo $ic103['COUNT(formulario.id)']  ?>,
                        color: "#0000FF",
                        highlight: "#6495ED",
                        label: "Continuar na mesma empresa"
                    },
                    {
                        value: <?php echo $ic104['COUNT(formulario.id)']  ?>,
                        color: "#00FF7F",
                        highlight: "#98FB98",
                        label: "Ser promovido"
                    },
                    {
                        value: <?php echo $ic105['COUNT(formulario.id)']  ?>,
                        color: "#FFD700",
                        highlight: "#F0E68C",
                        label: "Adaptação ao ambiente de trabalho"
                    },
                    {
                        value: <?php echo $ic106['COUNT(formulario.id)']  ?>,
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
    </div>  
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    </div>  
        
    <?php require '../template/rodape.php'; ?>

