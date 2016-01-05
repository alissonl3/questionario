<?php require '../template/topoadm.php'; 

include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';
include_once '../dao/DaoFormulario.php';
include_once '../entidades/Formulario.php';
include_once  '../dao/DaoCurso.php';
include_once '../entidades/Curso.php';
  
$daoCurso = new DaoCurso();
$daoUsuario = new DaoUsuario();
$daoFormulario = new DaoFormulario();

if(isset($_GET['id'])){
    $idSelecionado = $_GET['id'];
}
$usuarioSelecionado = $daoUsuario->buscarPorId($idSelecionado);
$cursoUsuarioSelecionado = $daoCurso->buscarPorId($usuarioSelecionado->getIdCurso());
$cursos = $daoCurso->buscarPorCondicao(" id != ".$usuarioSelecionado->getIdCurso());

$verificacaoFormulario = false;


if($usuarioSelecionado->getLiberado() != null && $usuarioSelecionado->getLiberado() != 0){
    $verificacaoFormulario = true;
    $formularioSelecionado = $daoFormulario->buscarPorId($usuarioSelecionado->getLiberado());
}

?>


<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 5%; margin-bottom: 5%;">
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    <div class="col-md-8 col-sm-8 col-xs-8" >
        <div class="jumbotron" style=" background: white; border: 2px #e7e7e7 solid;">
            
            <div style="color: graytext;">
                <div style="float: left;">
                    <h4>Nome: <?php echo $usuarioSelecionado->getNome() ?> </h4>
                    <h4>Cpf: <?php echo $usuarioSelecionado->getCpf() ?> </h4>
                    <h4>Email: <?php echo $usuarioSelecionado->getEmail() ?> </h4>
                    <h4>Telefone: <?php echo $usuarioSelecionado->getTelefone() ?> </h4>
                </div>
                <div style="float: right;">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDeletar">
                        <span class="glyphicon glyphicon-trash"></span>               
                        Deletar                       
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalFormulario">
                        <span class="glyphicon glyphicon-search"></span>               
                        Formulário                      
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalAlterar">
                        <span class="glyphicon glyphicon-pencil"></span>               
                        Alterar                      
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEmail">
                        <span class="glyphicon glyphicon-envelope"></span>               
                        Email                      
                    </button>
                </div>
            </div>
           
            <div style="clear: both;"></div>
         <br />

         
<script type="text/javascript">
$(document).ready(function (){
    
    $("#semgraficos").hide();
    $("#comgraficos").show();

    
    $("#linkComGraficos").click(function (){
        $("#comgraficos").show();
        $("#semgraficos").hide();

    });
    
    $("#linkSemGraficos").click(function (){
        $("#comgraficos").hide();
        $("#semgraficos").show();
    });
    
    
    
 
});
</script>
           
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
      
            
            $simia5  = $dao->buscarCountResposta("ia5 = 'Sim' and idUsuario = ". $usuarioSelecionado->getId()) ;
            $naoia5 =  $dao->buscarCountResposta("ia5 = 'Não' and idUsuario = ". $usuarioSelecionado->getId());
                    
            $simia6  = $dao->buscarCountResposta("ia6 = 'Sim' and idUsuario = ". $usuarioSelecionado->getId());   
            $naoia6  = $dao->buscarCountResposta("ia6 = 'Não' and idUsuario = ". $usuarioSelecionado->getId());
            
            $ia21  = $dao->buscarCountResposta("ia2 = 'O nome da Instituição de Ensino onde estudou' and idUsuario = ". $usuarioSelecionado->getId());  
            $ia22  = $dao->buscarCountResposta("ia2 = 'As respostas ao teste de seleção, ao qual foi submetido' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ia23  = $dao->buscarCountResposta("ia2 = 'A formação teórica' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ia24  = $dao->buscarCountResposta("ia2 = 'A experiência prática' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ia25  = $dao->buscarCountResposta("ia2 = 'Visão sistámica' and idUsuario = ". $usuarioSelecionado->getId()); 
            
            $simip3  = $dao->buscarCountResposta("ip3 = 'Sim' and idUsuario = ". $usuarioSelecionado->getId());   
            $naoip3  = $dao->buscarCountResposta("ip3 = 'Não' and idUsuario = ". $usuarioSelecionado->getId());
            
            $ia31  = $dao->buscarCountResposta("ia3 = 'Maior embasamento conceitual' and idUsuario = ". $usuarioSelecionado->getId());  
            $ia32  = $dao->buscarCountResposta("ia3 = 'Maior embasamento técnico' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ia33  = $dao->buscarCountResposta("ia3 = 'Maior embasamento prático' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ia34  = $dao->buscarCountResposta("ia3 = 'Maior aproximação com as necessidades da indússtria' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ia35  = $dao->buscarCountResposta("ia3 = 'Maior capacidade de liderança' and idUsuario = ". $usuarioSelecionado->getId());
           
            $ic71  = $dao->buscarCountResposta("ic7 = 'Muito Satisfatório' and idUsuario = ". $usuarioSelecionado->getId());  
            $ic72  = $dao->buscarCountResposta("ic7 = 'Satisfatório' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ic73  = $dao->buscarCountResposta("ic7 = 'Insatisfatório' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ic74  = $dao->buscarCountResposta("ic7 = 'Não sei responder' and idUsuario = ". $usuarioSelecionado->getId()); 
            
            $ic91  = $dao->buscarCountResposta("ic9 = 'A obtenção de diploma de nível técnico' and idUsuario = ". $usuarioSelecionado->getId());  
            $ic92  = $dao->buscarCountResposta("ic9 = 'A aquisição de cultura geral' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ic93  = $dao->buscarCountResposta("ic9 = 'A aquisiçaoo de formação profissional e teórica' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ic94  = $dao->buscarCountResposta("ic9 = 'Melhores perspectivas de ganhos materiais' and idUsuario = ". $usuarioSelecionado->getId());
            
            $ic101  = $dao->buscarCountResposta("ic10 = 'Encontrar emprego na área' and idUsuario = ". $usuarioSelecionado->getId());  
            $ic102  = $dao->buscarCountResposta("ic10 = 'Adequação salarial' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ic103  = $dao->buscarCountResposta("ic10 = 'Continuar na mesma empresa' and idUsuario = ". $usuarioSelecionado->getId()); 
            $ic104  = $dao->buscarCountResposta("ic10 = 'Ser promovido' and idUsuario = ". $usuarioSelecionado->getId());
            $ic105  = $dao->buscarCountResposta("ic10 = 'Adaptação ao ambiente de trabalho' and idUsuario = ". $usuarioSelecionado->getId());  
            $ic106  = $dao->buscarCountResposta("ic10 = 'Tempo para se dedicar a uma qualificação' and idUsuario = ". $usuarioSelecionado->getId());

        
            
            if($simia5 != 0)
            {
             echo   '<script type="text/javascript">
                    $(document).ready(function (){

                        $("#graficosChart").hide();
                        $("#semGraficosChart").show();

                    });
                    </script>';
                
            }
            else
            {
                echo   '<script type="text/javascript">
                    $(document).ready(function (){

                        $("#graficosChart").show();
                        $("#semGraficosChart").hide();


                    });
                    </script>';
                
            }
                
            
            ?>
               


         
        <!-- DIV PARA VOLTAR NO TOPO -->
        <div id="voltarTopo"></div>
        
        <div id="graficosChart" class="jumbotron" style=" background: white;">
            <center>
               
            <label>Você voltaria a estudar no IFPR para fazer outros cursos?</label>
            <br />
            <br />
            <br />
            <canvas id="resp1" style="width:100%;"></canvas>
            <br />
            <hr />           
            <br />
            <label>Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label>
            <br />
            <br />
            <br />
            <canvas id="resp2" style="width:100%;"></canvas>
            <br />
            <hr />           
            <br />
            <label>Você está trabalhando na area atualmente?</label>
            <br />
            <br />
            <br />
            <canvas id="resp3" style="width:100%;"></canvas>
            <br />
            <hr />           
            <br />
            <label>Na contratação de um egresso da sua area, o que é importante para a seleção?</label>
            <br />
            <br />
            <br />
            <canvas id="resp4" style="width:100%;"></canvas>
            <br />
            <hr />           
            <br />
            <label> O que tem faltado aos recém-formados em sua area?</label>
            <br />
            <br />
            <br />
            <canvas id="resp5" style="width:100%;"></canvas>
            <br />
            <hr />           
            <br />
            <label>Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label>
            <br />
            <br />
            <br />
            <canvas id="resp6" style="width:100%;"></canvas>
            <br />
            <hr />           
            <br />               
            <label>Qual foi a principal contribuição do curso?</label>
            <br />
            <br />
            <br />
            <canvas id="resp7" style="width:100%;"></canvas>
            <br />
            <hr />           
            <br />
            <label>Quais foram suas principais dificuldades logo após a conclusÃ£o do curso?</label>
            <br />
            <br />
            <br />
            <canvas id="resp8" style="width:100%;"></canvas>
            <br />
            <hr />           
            <br />
            </center>
            
            <hr />
            <div style="float: right;">
                <a href="#" title="Baixar gráfico" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-cloud-download"></span>
                                Baixar</a>
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
            <div style="float: right;">
                <a href="#" title="Baixar gráfico" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-cloud-download"></span>
                                Baixar</a>
            </div>
            
        </div>
        
    </div>  
    </div> 
    </div>
         
<div id="semgraficos" style="color: graytext;">
<div class="row" style="margin-top: 5%; margin-bottom: 5%;">
<div class="col-md-12 col-sm-12 col-xs-12" >
<div class="jumbotron" style=" background: white;">
             
         
             <?php 
          
          if($verificacaoFormulario === true){
              
              echo " <fieldset>
                    <legend>Dados pessoais</legend>
                    <label>1 - Ano de Conclusão:</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getAnoConclusao() ." </label><br />" 
                    ."<label>2 - Sementre:</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getSemestre() ." </label><br />" 
                   ."</fieldset>"
                   ."<hr />";
              
              echo " <fieldset>
                    <legend>Informações sobre o curso</legend>
                    <label>1 - Qual o curso que você fez?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC1() ."</label><br />"  
                    ."<label>2 - Qual foi o tipo de curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC2() ."</label><br />"
                    ."<label>3 - O que achou do curso que fez?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC3() ."</label><br />"
                    ."<label>4 - A duração do curso foi suficiente?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC4() ."</label><br />"  
                    ."<label>5 - Como foi a parte teórica do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC5() ."</label><br />"  
                    ."<label>6 - Como foi a parte prática do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC6() ."</label><br />"
                    ."<label>7 - Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC7() ."</label><br />"  
                    ."<label>8 - Como você avalia o nivel de exigência do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC8() ."</label><br />"  
                    ."<label>9 - Qual foi a principal contribuição do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC9() ."</label><br />"  
                    ."<label>10 - Quais foram suas principais dificuldades logo após a conclusÃ£o do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC10() ."</label><br />"                  
                    ."</fieldset>"
                    ."<hr />";
              
              echo " <fieldset>
                    <legend>Informações sobre o corpo docente</legend>
                    <label>1 - De modo geral, os professores tinham domínio do conteúdo das disciplinas que deram?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID1() ." </label><br />" 
                    ."<label>2 - De modo geral, como foram os recursos utilizados pelos professores durante as aulas?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID2() ." </label><br />"
                    ."<label>3 - De Modo geral, como foi a relação do professor com os alunos?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID3() ." </label><br />"                    
                   ."</fieldset>"
                   ."<hr />";
              
              $painel = "";
              
              if($formularioSelecionado->getIP3() != null && ($formularioSelecionado->getIP3() != "Não"
                 && $formularioSelecionado->getIP3() != "não" && $formularioSelecionado->getIP3() != "NÃO"
                 && $formularioSelecionado->getIP3() != "nao" && $formularioSelecionado->getIP3() != "Nao" && $formularioSelecionado->getIP3() != "NAO"  )      ){
                  $painel = ""
                  ."<label>A - Qual o seu grau de satisfação com a sua atividade profissional?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3A() ." </label><br />"   
                  ."<label>B - Você egresso recém-formado, atende às necessidades da empresa para a qual você trabalha?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3B() ." </label><br />"
                  ."<label>C - Qual das habilidades abaixo está sendo mais exigida em seu exercício profissional?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3C() ." </label><br />"
                  ."<label> D - Qual a sua faixa salarial?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3D() ." </label><br />"
                      ;
              }else{
                  $painel = ""; 
              }
             
              echo "<fieldset>
                    <legend>Informações pessoais</legend>
                    <label>1 - Você já tinha uma profissão antes de fazer o curso? Se sim, onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP1() ." </label><br />" 
                    ."<label>2 - Você estava trabalhando na área durante o curso? Se sim, onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP2() ." </label><br />"
                    ."<label>3 - Você está trabalhando na área atualmente? Se sim, em que/onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3() ." </label><br />"                    
                    .$painel
                    ."</fieldset>"
                   ."<hr />";
              
              
              echo " <fieldset>
                    <legend>Informações adicionais</legend>
                     <label>1 - Na sua opinião um estudante recêm-formado em sua área que tenha dedicado todo o tempo de estudo somente às atividades acadêmicas, leva mais tempo para se adaptar ao mercado do que um outro que já trabalhava na área durante o dia e estudava a noite?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA1() ."</label><br />"  
                    ."<label>2 - Na contratação de um egresso de sua área, o que é relevante no processo de seleção?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA2() ."</label><br />"
                    ."<label>3 - O que tem faltado aos recêm-formados em sua área?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA3() ."</label><br />"
                    ."<label>4 - Em sua opinião, quanto tempo leva um egresso, recêm-formado em sua area, para tornar-se altamente produtivo, após ser contratado por sua empresa?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA4() ."</label><br />"  
                    ."<label>5 - Você voltaria a estudar no IFPR para fazer outros cursos?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA5() ."</label><br />"  
                    ."<label>6 - Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA6() ."</label><br />"
                    ."<label> Sugestões (se houver):</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getSugestao() ."</label><br />"
                    ."</fieldset>"
                    ."<hr />";
              
    
              echo '<div style="float: right;">
                <a href="#" title="Baixar gráfico" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-cloud-download"></span>
                                Baixar</a>
                </div>';
              
              
          }
          else{
              
              echo "<div style='color: red;'><center><h3>O usuário ".$usuarioSelecionado->getNome()." ainda não respondeu o formulário</h3></center></div>";
              echo "<hr />";
              echo '<div style="float: right;">
                <a href="#" title="Baixar gráfico" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-cloud-download"></span>
                                Baixar</a>
                </div>';
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
        <h4 class="modal-title">Exclusão</h4>
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
        <h4 class="modal-title">Alteração</h4>
      </div>
      <div class="modal-body">
          <div class="jumbotron" style=" background: white;">
               <div id="alterarAluno">                     
                        <form id="frmAlterarAluno" method="POST" role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=1">
                            <input type="hidden" name="acao" value="alterarUsuario" />
                            <div class="form-group">
                                <label  for="nomeAlterar">Nome:</label>
                                <input type="text" placeholder="Insere o nome" value="<?php echo $usuarioSelecionado->getNome(); ?>" required="true" class="form-control" name="nomeAlterar" />
                            </div>
                            <div class="form-group">
                                <label  for="cursoAlterar">Curso:</label>
                                <select name="cursoAlterar">
                                    <option value="<?php echo $usuarioSelecionado->getIdCurso(); ?>"><?php echo $cursoUsuarioSelecionado->getNome(); ?></option>
                                    <?php

                                        foreach ($cursos as $value) 
                                        {
                                            echo "<option value=".$value->getNome().">".$value->getNome()."</option>";
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
        <h4 class="modal-title">Email</h4>
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


<!-- Modal de visualiziação do formulario -->
<div id="modalFormulario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal corpo-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulário</h4>
      </div>
      <div class="modal-body">
        
          <?php 
          
          if($verificacaoFormulario === true){
              
              echo " <fieldset>
                    <legend>Dados pessoais</legend>
                    <label>1 - Ano de Conclusão:</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getAnoConclusao() ." </label><br />" 
                    ."<label>2 - Sementre:</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getSemestre() ." </label><br />" 
                   ."</fieldset>"
                   ."<hr />";
              
              echo " <fieldset>
                    <legend>Informações sobre o curso</legend>
                    <label>1 - Qual o curso que você fez?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC1() ."</label><br />"  
                    ."<label>2 - Qual foi o tipo de curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC2() ."</label><br />"
                    ."<label>3 - O que achou do curso que fez?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC3() ."</label><br />"
                    ."<label>4 - A duração do curso foi suficiente?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC4() ."</label><br />"  
                    ."<label>5 - Como foi a parte teórica do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC5() ."</label><br />"  
                    ."<label>6 - Como foi a parte prática do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC6() ."</label><br />"
                    ."<label>7 - Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC7() ."</label><br />"  
                    ."<label>8 - Como você avalia o nivel de exigência do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC8() ."</label><br />"  
                    ."<label>9 - Qual foi a principal contribuição do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC9() ."</label><br />"  
                    ."<label>10 - Quais foram suas principais dificuldades logo após a conclusÃ£o do curso?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIC10() ."</label><br />"                  
                    ."</fieldset>"
                    ."<hr />";
              
              echo " <fieldset>
                    <legend>Informações sobre o corpo docente</legend>
                    <label>1 - De modo geral, os professores tinham domínio do conteúdo das disciplinas que deram?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID1() ." </label><br />" 
                    ."<label>2 - De modo geral, como foram os recursos utilizados pelos professores durante as aulas?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID2() ." </label><br />"
                    ."<label>3 - De Modo geral, como foi a relação do professor com os alunos?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getID3() ." </label><br />"                    
                   ."</fieldset>"
                   ."<hr />";
              
              $painel = "";
              
              if($formularioSelecionado->getIP3() != null && ($formularioSelecionado->getIP3() != "Não"
                 && $formularioSelecionado->getIP3() != "não" && $formularioSelecionado->getIP3() != "NÃO"
                 && $formularioSelecionado->getIP3() != "nao" && $formularioSelecionado->getIP3() != "Nao" && $formularioSelecionado->getIP3() != "NAO"  )      ){
                  $painel = ""
                  ."<label>A - Qual o seu grau de satisfação com a sua atividade profissional?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3A() ." </label><br />"   
                  ."<label>B - Você egresso recém-formado, atende às necessidades da empresa para a qual você trabalha?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3B() ." </label><br />"
                  ."<label>C - Qual das habilidades abaixo está sendo mais exigida em seu exercício profissional?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3C() ." </label><br />"
                  ."<label> D - Qual a sua faixa salarial?</label><br />"
                  ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3D() ." </label><br />"
                      ;
              }else{
                  $painel = ""; 
              }
             
              echo "<fieldset>
                    <legend>Informações pessoais</legend>
                    <label>1 - Você já tinha uma profissão antes de fazer o curso? Se sim, onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP1() ." </label><br />" 
                    ."<label>2 - Você estava trabalhando na área durante o curso? Se sim, onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP2() ." </label><br />"
                    ."<label>3 - Você está trabalhando na área atualmente? Se sim, em que/onde?</label><br />"
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIP3() ." </label><br />"                    
                    .$painel
                    ."</fieldset>"
                   ."<hr />";
              
              
              echo " <fieldset>
                    <legend>Informações adicionais</legend>
                     <label>1 - Na sua opinião um estudante recêm-formado em sua área que tenha dedicado todo o tempo de estudo somente às atividades acadêmicas, leva mais tempo para se adaptar ao mercado do que um outro que já trabalhava na área durante o dia e estudava a noite?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA1() ."</label><br />"  
                    ."<label>2 - Na contratação de um egresso de sua área, o que é relevante no processo de seleção?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA2() ."</label><br />"
                    ."<label>3 - O que tem faltado aos recêm-formados em sua área?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA3() ."</label><br />"
                    ."<label>4 - Em sua opinião, quanto tempo leva um egresso, recêm-formado em sua area, para tornar-se altamente produtivo, após ser contratado por sua empresa?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA4() ."</label><br />"  
                    ."<label>5 - Você voltaria a estudar no IFPR para fazer outros cursos?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA5() ."</label><br />"  
                    ."<label>6 - Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getIA6() ."</label><br />"
                    ."<label> Sugestões (se houver):</label><br /> "
                    ."<label style='color:graytext;'>R: ". $formularioSelecionado->getSugestao() ."</label><br />"
                    ."</fieldset>"
                    ."<hr />";
              
              
          }
          else{
              
              echo "<p>O usuário ".$usuarioSelecionado->getNome()." ainda não respondeu o formulário</p>";
              echo "<hr />";
              echo '<div style="float: right;">
                <a href="#" title="Baixar gráfico" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-cloud-download"></span>
                                Baixar</a>
                </div>';
          }
          
          ?>
               
          
          
                  
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

<!-- deletar usuario -->
<?php 

    
if(isset($_POST['acao'])){
        
        if($_POST['acao'] == "alterarUsuario")
        {
          
            //alterar o aluno
            $usuarioSelecionado->setNome($_POST['nomeAlterar']);
            $usuarioSelecionado->setTelefone($_POST['telefoneAlterar']);
            $usuarioSelecionado->setCpf($_POST['cpfAlterar']);
            $usuarioSelecionado->setEmail($_POST['emailAlterar']);
            
            try
            {
            $daoUsuario->atualizar($usuarioSelecionado);
            
            echo "<script type='text/javascript'>";
    
            echo "alert('Usuario atualizado com sucesso!');";
            echo "location.href='http://localhost/questionario/adm/dados.php?id=".$idSelecionado."';";

            echo "</script>";
            
            }
            catch (Exception $erro)
            {
             
            echo "<script type='text/javascript'>";
    
            echo "alert('Erro ao tentar atualizar usuario!');";
            echo "location.href='http://localhost/questionario/adm/gerenciar.php?id=".$idSelecionado."';";

            echo "</script>";
                
                
            }
            
        }
        
        
        
    }




if(isset($_GET['deletar'])){
   if($_GET['deletar'] == "sim"){
      
       try{
       //verificar existencia do formulario
       if($usuarioSelecionado->getLiberado() != null && $usuarioSelecionado->getLiberado() != 0){
           
           $idForm = $usuarioSelecionado->getLiberado();   
       }
       
       $daoUsuario->deletar($usuarioSelecionado->getId());
       
       if($idForm != null && $idForm != 0){
              
           $daoFormulario->deletar($usuarioSelecionado->getLiberado());
       }
       
       echo "<script type='text/javascript'>";
    
            echo "alert('Usuario deletado com sucesso!');";
            echo "location.href='http://localhost/questionario/adm/gerenciar.php';";

       echo "</script>";
       
       
       }
       catch (Exception $erro){
           
       print($erro);  
           
       echo "<script type='text/javascript'>";
    
            echo "alert('Erro ao tentar deletar usuario!');";
            echo "location.href='http://localhost/questionario/adm/gerenciar.php';";

       echo "</script>";
           
       }
       
   } 
}

?>

 <!-- Enviar email -->
    <?php 
    
    require_once '../email/Email.php';
    
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

