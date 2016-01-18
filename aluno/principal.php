  <?php require '../template/topouser.php';?>


   <?php  
   
   include_once  '../dao/DaoFormulario.php';
   include_once '../entidades/Formulario.php'; 
   include_once '../banco/Conexao.php'; 
   
   $dao = new DaoFormulario();
   
   $mostrarGraficos = false;
   $dataEnvioTopUser = $_SESSION['dataEnvio'];
   
    ?>
           
    <!-- Pagina do conteudo -->
    <div class="row" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
          <!-- SCRIPT DE IMPORTAÇÃO DO CHART -->
        <script src="../resources/js/Chart.js"></script>
       
        
         
               <!--script para a busca dos dados -->
            <?php 
            
            //VERIFICA SE O USUARIO RESPONDEU O FORMULARIO
            if($idFormularioTopUser != null){
               $mostrarGraficos = true;
            }
      
            //SE RESPONDEU O FORMULARIO: FAZER A PESQUISA
            if($mostrarGraficos){
                
            $simia5  = $dao->buscarCountRespostaComUsuario("ia5 = 'Sim' AND id = ".$idUsuarioTopUser."") ;
            $naoia5 =  $dao->buscarCountRespostaComUsuario("ia5 = 'Não' AND id = ".$idUsuarioTopUser."");
                    
            $simia6  = $dao->buscarCountRespostaComUsuario("ia6 = 'Sim' AND id = ".$idUsuarioTopUser."");   
            $naoia6  = $dao->buscarCountRespostaComUsuario("ia6 = 'Não' AND id = ".$idUsuarioTopUser."");
            
            $ia21  = $dao->buscarCountRespostaComUsuario("ia2 = 'O nome da Instituição de Ensino onde estudou' AND id = ".$idUsuarioTopUser."");  
            $ia22  = $dao->buscarCountRespostaComUsuario("ia2 = 'As respostas ao teste de seleção, ao qual foi submetido' AND id = ".$idUsuarioTopUser.""); 
            $ia23  = $dao->buscarCountRespostaComUsuario("ia2 = 'A formação teórica' AND id = ".$idUsuarioTopUser.""); 
            $ia24  = $dao->buscarCountRespostaComUsuario("ia2 = 'A experiência prática' AND id = ".$idUsuarioTopUser.""); 
            $ia25  = $dao->buscarCountRespostaComUsuario("ia2 = 'Visão sistámica' AND id = ".$idUsuarioTopUser.""); 
            
            $simip3  = $dao->buscarCountRespostaComUsuario("ip3 = 'Sim' AND id = ".$idUsuarioTopUser."");   
            $naoip3  = $dao->buscarCountRespostaComUsuario("ip3 = 'Não' AND id = ".$idUsuarioTopUser."");
            
            $ia31  = $dao->buscarCountRespostaComUsuario("ia3 = 'Maior embasamento conceitual' AND id = ".$idUsuarioTopUser."");  
            $ia32  = $dao->buscarCountRespostaComUsuario("ia3 = 'Maior embasamento técnico' AND id = ".$idUsuarioTopUser.""); 
            $ia33  = $dao->buscarCountRespostaComUsuario("ia3 = 'Maior embasamento prático' AND id = ".$idUsuarioTopUser.""); 
            $ia34  = $dao->buscarCountRespostaComUsuario("ia3 = 'Maior aproximação com as necessidades da indússtria' AND id = ".$idUsuarioTopUser.""); 
            $ia35  = $dao->buscarCountRespostaComUsuario("ia3 = 'Maior capacidade de liderança' AND id = ".$idUsuarioTopUser."");
           
            $ic71  = $dao->buscarCountRespostaComUsuario("ic7 = 'Muito Satisfatório' AND id = ".$idUsuarioTopUser."");  
            $ic72  = $dao->buscarCountRespostaComUsuario("ic7 = 'Satisfatório' AND id = ".$idUsuarioTopUser.""); 
            $ic73  = $dao->buscarCountRespostaComUsuario("ic7 = 'Insatisfatório' AND id = ".$idUsuarioTopUser.""); 
            $ic74  = $dao->buscarCountRespostaComUsuario("ic7 = 'Não sei responder' AND id = ".$idUsuarioTopUser.""); 
            
            $ic91  = $dao->buscarCountRespostaComUsuario("ic9 = 'A obtenção de diploma de nível técnico' AND id = ".$idUsuarioTopUser."");  
            $ic92  = $dao->buscarCountRespostaComUsuario("ic9 = 'A aquisição de cultura geral' AND id = ".$idUsuarioTopUser.""); 
            $ic93  = $dao->buscarCountRespostaComUsuario("ic9 = 'A aquisiçaoo de formação profissional e teórica' AND id = ".$idUsuarioTopUser.""); 
            $ic94  = $dao->buscarCountRespostaComUsuario("ic9 = 'Melhores perspectivas de ganhos materiais' AND id = ".$idUsuarioTopUser."");
            
            $ic101  = $dao->buscarCountRespostaComUsuario("ic10 = 'Encontrar emprego na área' AND id = ".$idUsuarioTopUser."");  
            $ic102  = $dao->buscarCountRespostaComUsuario("ic10 = 'Adequação salarial' AND id = ".$idUsuarioTopUser.""); 
            $ic103  = $dao->buscarCountRespostaComUsuario("ic10 = 'Continuar na mesma empresa' AND id = ".$idUsuarioTopUser.""); 
            $ic104  = $dao->buscarCountRespostaComUsuario("ic10 = 'Ser promovido' AND id = ".$idUsuarioTopUser."");
            $ic105  = $dao->buscarCountRespostaComUsuario("ic10 = 'Adaptação ao ambiente de trabalho' AND id = ".$idUsuarioTopUser."");  
            $ic106  = $dao->buscarCountRespostaComUsuario("ic10 = 'Tempo para se dedicar a uma qualificação' AND id = ".$idUsuarioTopUser."");
            }
            
            
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

    <!-- DATA PARA LIBERAR O ACESSO -->
    <input id="hiddenDataAcesso" type="hidden" value="<?php echo $dataEnvioTopUser; ?>"/>

        <!-- DIV PARA VOLTAR NO TOPO -->
        <div id="voltarTopo"></div>
        
        <div class="jumbotron" style=" background: white;">
            
            <div class="jumbotron" style=" background: white; border: 2px blue solid;">
                <center>
                <h3><label>Formulário</label></h3>
                <hr />
                <h4>Acesso liberado daqui: </h4>  
                <center>
                    <img  src="../resources/img/cronometro.png" alt="Relogio" class="img-resposive" style="max-height: 100px;"/>
                </center>
                <br />
                <div style="border: 2px #444 solid; background-color: #444; max-width: 200px; border-radius: 10px;">
                    <b>  <h4 id="note" style="color: white;"></h4> </b>
                </div>
                <br />
                <!-- JavaScript includes -->
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="assets/countdown/jquery.countdown.js"></script>
		<script src="assets/js/script.js"></script>

                <a id="btnResponderFormulario" href="formulario.php" disabled="true"  title="Responder o formulário" class="btn btn-success btn-lg">
                <span class="glyphicon glyphicon-pencil"></span>    
                Responder</a>
                
                </center>
            </div>
            
            
            <center>
                <h3><label>Gráficos</label></h3>
                <br />
                <br />
            
            <?php 
            
            //CRIAR OS GRAFICOS COM O RESULTADO DA PESQUISA
            if($mostrarGraficos){    
                
            echo "<label>Você voltaria a estudar no IFPR para fazer outros cursos?</label>
            <br />
            <br />
            <br />
            <canvas id='resp1' style='width:100%;'></canvas>
            <br />
            <hr />           
            <br />
            <label>Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label>
            <br />
            <br />
            <br />
            <canvas id='resp2' style='width:100%;'></canvas>
            <br />
            <hr />           
            <br />
            <label>Você está trabalhando na area atualmente?</label>
            <br />
            <br />
            <br />
            <canvas id='resp3' style='width:100%;'></canvas>
            <br />
            <hr />           
            <br />
            <label>Na contratação de um egresso da sua area, o que é importante para a seleção?</label>
            <br />
            <br />
            <br />
            <canvas id='resp4' style='width:100%;'></canvas>
            <br />
            <hr />           
            <br />
            <label> O que tem faltado aos recém-formados em sua area?</label>
            <br />
            <br />
            <br />
            <canvas id='resp5' style='width:100%;'></canvas>
            <br />
            <hr />           
            <br />
            <label>Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label>
            <br />
            <br />
            <br />
            <canvas id='resp6' style='width:100%;'></canvas>
            <br />
            <hr />           
            <br />               
            <label>Qual foi a principal contribuição do curso?</label>
            <br />
            <br />
            <br />
            <canvas id='resp7' style='width:100%;'></canvas>
            <br />
            <hr />           
            <br />
            <label>Quais foram suas principais dificuldades logo após a conclusÃ£o do curso?</label>
            <br />
            <br />
            <br />
            <canvas id='resp8' style='width:100%;'></canvas>
            <br />
            <hr />           
            <br />";
                
            }
            else
            {
               
               echo " <center><h2 style='color: red;'>Atenção</h2></center>
                <hr />
                <h3>Você ainda não respondeu nenhum formulário!</h3>
                <br />
                <h4>Aguarde o liberamento do seu acesso ao formulário. Obrigado!</h4>";
                
            }
            
            ?>
            
            
            </center>
            
            
            <!-- botao voltar topo -->
            <input type="button" id="btnVoltarTopo" class="btn btn-sm btn-info" style="
                    bottom: 20px !important;
                    position: fixed;
                    right: 30px;" 
            onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);" value="Topo" >
            
            
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
    </div>  
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    </div>  
        
    <?php require '../template/rodape.php'; ?>

