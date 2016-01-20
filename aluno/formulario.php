<?php require '../template/topouser.php';

include_once  '../dao/DaoFormulario.php';
include_once '../entidades/Formulario.php';

include_once '../banco/Conexao.php';


?>


<script type="text/javascript">
    
    var $ = jQuery.noConflict();
    $(document).ready(function(){
 
    $("#painelPessoal1").hide();
    $("#painelPessoal2").hide();
    $("#painelPessoal3").hide();
    
    $("#pessoal1sim").click(function(){   $("#painelPessoal1").show(); });
    $("#pessoal1nao").click(function(){   $("#painelPessoal1").hide(); });
    
    $("#pessoal2sim").click(function(){   $("#painelPessoal2").show(); });
    $("#pessoal2nao").click(function(){   $("#painelPessoal2").hide(); });
    
    $("#pessoal3sim").click(function(){   $("#painelPessoal3").show(); });
    $("#pessoal3nao").click(function(){   $("#painelPessoal3").hide(); });
    
    
            
    
    });
    
</script>


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
        
        
        
        <div class="jumbotron" style="background-color: white; border: 2px #e7e7e7 solid; border-radius: 10px; padding: 20px; margin-top: 10px;">
            <center>
                <h3><label>Questionário</label></h3>
                <br />
                <br />
            </center>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"  role="form">
                <input type="hidden" name="acao" value="responderQuestionario" />
                
                <fieldset>
                    <legend>Dados pessoais</legend>
                    <div class="form-group">
                        <label  for="anoConclusao">Ano de conclusão: <?php echo $idLogado ?></label>
                        <input type="number" placeholder="Insere o ano de conclusão" required="true" class="form-control" name="anoConclusao" />
                    </div>
                    <div class="form-group">
                        <label  for="opSemestre">2 - Sementre:</label>
                        <div class="radio">
                            <label><input  type="radio" name="opSemestre" value="1° Semestre">1° Semestre</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="opSemestre" value="2° Semestre">2° Semestre</label>
                        </div>
                    </div>
                </fieldset>  

                <fieldset>
                    <legend>Informações sobre o curso</legend>
                    <div class="form-group">
                        <label  for="cursoNome"> 1 - Qual o curso que você fez?</label>
                        <input type="text" placeholder="Insere o seu curso" required="true" class="form-control" name="curso1" />
                    </div> 
                    <div class="form-group">
                        <label >2 - Qual foi o tipo de curso?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso2" value="Subsequente">Subsequente</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso2" value="Concomitante">Concomitante</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  >3 - O que achou do curso que fez?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso3" value="Muito Satisfatório">Muito Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso3" value="Satisfatório">Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso3" value="Insatisfatório">Insatisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso3" value="Não sei responder">Não sei responder</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  >4 - A duração do curso foi suficiente?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso4" value="Sim">Sim</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso4" value="Não">Não</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso4" value="Não sei responder">Não sei responder</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  >5 - Como foi a parte teórica do curso?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso5" value="Muito Satisfatório">Muito Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso5" value="Satisfatório">Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso5" value="Insatisfatório">Insatisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso5" value="Não sei responder">Não sei responder</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  >6 - Como foi a parte prática do curso?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso6" value="Muito Satisfatório">Muito Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso6" value="Satisfatório">Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso6" value="Insatisfatório">Insatisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso6" value="Não sei responder">Não sei responder</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  >7 - Os conhecimentos adquiridos durante o curso foram importantes para formação profissional?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso7" value="Muito Satisfatório">Muito Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso7" value="Satisfatório">Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso7" value="Insatisfatório" >Insatisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso7" value="Não sei responder">Não sei responder</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  >8 - Como você avalia o nivel de exigência do curso?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso8" value="Deveria ter exigido muito mais de mim">Deveria ter exigido muito mais de mim</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso8" value="Deveria ter exigido um pouco mais de mim">Deveria ter exigido um pouco mais de mim</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso8" value="Deveria ter exigido menos de mim">Deveria ter exigido menos de mim</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  >9 - Qual foi a principal contribuição do curso?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso9" value="A obtenção de diploma de nível técnico">A obtenção de diploma de nível técnico</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso9" value="A aquisição de cultura geral">A aquisição de cultura geral</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso9" value="A aquisiçaoo de formação profissional e teórica">A aquisiçaoo de formação profissional e teórica</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso9" value="Melhores perspectivas de ganhos materiais">Melhores perspectivas de ganhos materiais</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >10 - Quais foram suas principais dificuldades logo após a conclusÃ£o do curso?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso10" value="Encontrar emprego na área">Encontrar emprego na área</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso10" value="Adequação salarial">Adequação salarial</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso10" value="Continuar na mesma empresa">Continuar na mesma empresa</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso10" value="Ser promovido">Ser promovido</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso10" value="Adaptação ao ambiente de trabalho">Adaptação ao ambiente de trabalho</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="curso10" value="Tempo para se dedicar a uma qualificação">Tempo para se dedicar a uma qualificação</label>
                        </div>
                    </div>
                </fieldset>

                <fieldset> 
                    <legend>Informações sobre o corpo docente</legend>
                    <div class="form-group">
                        <label  for="nome">1 - De modo geral, os professores tinham domínio do conteúdo das disciplinas que deram?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente1" value="Muito Satisfatório">Muito Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente1" value="Satisfatório">Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente1" value="Insatisfatório">Insatisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente1" value="Não sei responder">Não sei responder</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="nome">2 - De modo geral, como foram os recursos utilizados pelos professores durante as aulas?</label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente2" value="Muito Satisfatório">Muito Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente2" value="Satisfatório">Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente2" value="Insatisfatório">Insatisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente2" value="Não sei responder">Não sei responder</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="nome">3 - De Modo geral, como foi a relação do professor com os alunos? </label>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente3" value="Muito Satisfatório">Muito Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente3" value="Satisfatório">Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente3" value="Insatisfatório">Insatisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" required="true" name="docente3" value="Não sei responder">Não sei responder</label>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Informações pessoais</legend>
                    <div class="form-group">
                        <label>1 - Você já tinha uma profissão antes de fazer o curso?</label>
                        <div class="radio">
                            <label><input id="pessoal1sim" required="true" type="radio" value="Sim" name="pessoal1">Sim</label>
                        </div>
                        <div class="radio">
                            <label><input id="pessoal1nao" required="true" type="radio" value="Não" name="pessoal1">Não</label>
                        </div>
                    </div>
                    <!-- PAINEL -->
                    <div id="painelPessoal1">
                        <div class="form-group">
                            <label  for="pessoal1A">Qual?</label>
                            <input type="text" placeholder="Insere a profissão"  class="form-control" name="pessoal1A" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>2 - Você estava trabalhando na área durante o curso?</label>
                        <div class="radio">
                            <label><input id="pessoal2sim" required="true" type="radio" value="Sim" name="pessoal2">Sim</label>
                        </div>
                        <div class="radio">
                            <label><input id="pessoal2nao"  required="true" type="radio" value="Não" name="pessoal2">Não</label>
                        </div>
                    </div>
                    <!-- PAINEL -->
                    <div id="painelPessoal2">
                        <div class="form-group">
                            <label  for="pessoal2A">Onde?</label>
                            <input type="text" placeholder="Insere onde" class="form-control" name="pessoal2A" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>3 - Você está trabalhando na área atualmente?</label>
                        <div class="radio">
                            <label><input id="pessoal3sim" required="true" value="Sim" type="radio" name="pessoal3">Sim</label>
                        </div>
                        <div class="radio">
                            <label><input id="pessoal3nao" required="true"  value="Não" type="radio" name="pessoal3">Não</label>
                        </div>
                    </div>
                    <!-- PAINEL -->
                    <div id="painelPessoal3">
                        <div class="form-group">
                            <label  for="pessoal3Onde">Em que/Onde?</label>
                            <input type="text" placeholder="Insere em que e onde" class="form-control" name="pessoal3Onde" />
                        </div>
                         <div class="form-group">
                        <label  for="pessoal3A">A - Qual o seu grau de satisfação com a sua atividade profissional? </label>
                        <div class="radio">
                            <label><input type="radio" value="Muito Satisfatório" name="pessoal3A">Muito Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Satisfatório" name="pessoal3A">Satisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Insatisfatório" name="pessoal3A">Insatisfatório</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Não sei responder" name="pessoal3A">Não sei responder</label>
                        </div>
                    </div>
                     <div class="form-group">
                        <label  for="pessoal3B">B - Você egresso recém-formado, atende às necessidades da empresa para a qual você trabalha?</label>
                        <div class="radio">
                            <label><input type="radio" value="Sim, atendo a todas as necessidades" name="pessoal3B">Sim, atendo a todas as necessidades</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Quase todas" name="pessoal3B">Quase todas</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio"  value="Não, tenho várias maneiras ou métodos em mente, mas não sei como atuar na prática diária de uma empresa" name="pessoal3B">Não, tenho várias maneiras ou métodos em mente, mas não sei como atuar na prática diária de uma empresa</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Não atendo as necessidades de produçao" name="pessoal3B">Não atendo as necessidades de produçao</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="pessoal3C">C - Qual das habilidades abaixo está sendo mais exigida em seu exercício profissional?</label>
                        <div class="radio"> 
                            <label><input type="radio" value="Comunicação" name="pessoal3C">Comunicação</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Trabalhar em equipe e liderança" name="pessoal3C">Trabalhar em equipe e liderança</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Raciocínio lógico / análise crítica" name="pessoal3C">Raciocínio lógico / análise crítica</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Senso ético" name="pessoal3C">Senso ético</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Trabalho técnico" name="pessoal3C">Trabalho técnico</label>
                        </div>
                    </div>
                       <div class="form-group">
                        <label  for="pessoal3D">D - Qual a sua faixa salarial?</label>
                        <div class="radio">
                            <label><input type="radio" value="Menos de 1000 reais" name="pessoal3D">Menos de 1000 reais</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="1000 à 2000 reais" name="pessoal3D">1000 à 2000 reais</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="2000 à 3000 reais" name="pessoal3D">2000 à 3000 reais</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="3000 à 5000 reais" name="pessoal3D">3000 à 5000 reais </label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Mais de 5000 reais" name="pessoal3D">Mais de 5000 reais</label>
                        </div>
                    </div>
                    </div>
                </fieldset>
                
                <fieldset> 
                    <legend>Informações adicionais</legend>
                    <div class="form-group">
                        <label  for="adicionais1">1 - Na sua opinião um estudante recêm-formado em sua área que tenha dedicado todo o tempo de estudo somente às atividades acadêmicas, leva mais tempo para se adaptar ao mercado do que um outro que já trabalhava na área durante o dia e estudava a noite?</label>
                        <div class="radio">
                            <label><input type="radio" value="Sim, pois o contato com a prática é um grande diferencial" required="true" name="adicionais1">Sim, pois o contato com a prática é um grande diferencial</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio"  value="Não, pois os conhecimentos adquiridos com as atividades acadêmicas são suficientes para atuar no mercado" required="true" name="adicionais1">Não, pois os conhecimentos adquiridos com as atividades acadêmicas são suficientes para atuar no mercado</label>
                        </div>
                     </div>
                      <div class="form-group">
                        <label  for="adicionais2">2 - Na contratação de um egresso de sua área, o que é relevante no processo de seleção?</label>
                        <div class="radio">
                            <label><input type="radio" value="O nome da Instituição de Ensino onde estudou" required="true" name="adicionais2">O nome da Instituição de Ensino onde estudou</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="As respostas ao teste de seleção, ao qual foi submetido" required="true" name="adicionais2">As respostas ao teste de seleção, ao qual foi submetido</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="A formação teórica" required="true" name="adicionais2">A formação teórica</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="A experiência prática" required="true" name="adicionais2">A experiência prática </label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Visão sistámica" required="true" name="adicionais2">Visão sistámica</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="adicionais3">3 - O que tem faltado aos recêm-formados em sua área?</label>
                        <div class="radio">
                            <label><input type="radio" value="Maior embasamento conceitual" required="true" name="adicionais3">Maior embasamento conceitual</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Maior embasamento técnico" required="true" name="adicionais3">Maior embasamento técnico</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Maior embasamento prático" required="true" name="adicionais3">Maior embasamento prático</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Maior aproximação com as necessidades da indússtria" required="true" name="adicionais3">Maior aproximação com as necessidades da indússtria  </label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Maior capacidade de liderança" required="true" name="adicionais3">Maior capacidade de liderança</label>
                        </div>
                         <div class="radio">
                            <label><input type="radio" value="Maior visão sistêmica" required="true" name="adicionais3">Maior visão sistêmica</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="adicionais4">4 - Em sua opinião, quanto tempo leva um egresso, recêm-formado em sua area, para tornar-se altamente produtivo, após ser contratado por sua empresa?</</label>
                        <div class="radio">
                            <label><input type="radio" value="Imediatamente após a contratação" required="true" name="adicionais4">Imediatamente após a contratação</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Algumas semanas" required="true" name="adicionais4">Algumas semanas</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Alguns meses" required="true" name="adicionais4">Alguns meses</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Entre 1 e 2 anos" required="true" name="adicionais4">Entre 1 e 2 anos </label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Mais de 2 anos" required="true" name="adicionais4">Mais de 2 anos</label>
                        </div>
                      
                    </div>
                    <div class="form-group">
                        <label  for="adicionais5">5 - Você voltaria a estudar no IFPR para fazer outros cursos?</label>
                        <div class="radio">
                            <label><input type="radio" value="Sim" required="true" name="adicionais5">Sim</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Não" required="true" name="adicionais5">Não</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="adicionais6">6 - Você teria interesse em cursar uma Pós-Graduação ou cursos de qualificação profissional ofertados pelo IFPR?</label>
                        <div class="radio">
                            <label><input type="radio" value="Sim" required="true" name="adicionais6">Sim</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Não" required="true" name="adicionais6">Não</label>
                        </div>                      
                    </div>
                    
                    <div class="form-group">
                        <label  for="sugestoes"> Sugestões (se houver):</label>
                        <textarea rows="4"  class="form-control" name="sugestoes" ></textarea>
                    </div> 
                   
                    
                </fieldset>
                
                
                <center>
                <div class="btn-group">
                <button type="submit" class="btn btn-success btn-lg">Confirmar</button>
                <button type="reset" class="btn btn-danger btn-lg">Cancelar</button>
                </div>
                </center>
            </form>
            
            
            <!-- botao voltar topo -->
            <button type="button" id="btnVoltarTopo" class="btn btn-sm btn-info" style="
                    bottom: 20px !important;
                    position: fixed;
                    right: 30px;" 
                onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);" value="Topo" >
                <span class="glyphicon glyphicon-chevron-up"></span>
            </button>
            
            
        <?php
            require_once '../visao/componentes.php';
        ?>
            
        </div>
    </div>  
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
</div>  


<?php require '../template/rodape.php';

//EXECUTAR AÇÃO
if(isset($_POST['acao'])){
    
        //RESPONDER FORMULÁRIO 
        if($_POST['acao'] == "responderQuestionario")
        {
            
        $formulario = new Formulario();

        //INFORMAÇÕES PESSOAIS
        if(isset($_POST["anoConclusao"])){
            $formulario->setAnoConclusao($_POST["anoConclusao"]); 
        }
        if(isset($_POST["opSemestre"])){
            $formulario->setSemestre($_POST["opSemestre"]); 
        }


        //INFORMAÇÕES SOBRE O CURSO
        if(isset($_POST["curso1"])){
            $formulario->setIC1($_POST["curso1"]); 
        }
        if(isset($_POST["curso2"])){
            $formulario->setIC2($_POST["curso2"]); 
        }
        if(isset($_POST["curso3"])){
            $formulario->setIC3($_POST["curso3"]); 
        }
        if(isset($_POST["curso4"])){
            $formulario->setIC4($_POST["curso4"]); 
        }
        if(isset($_POST["curso5"])){
            $formulario->setIC5($_POST["curso5"]); 
        }
        if(isset($_POST["curso6"])){
            $formulario->setIC6($_POST["curso6"]); 
        }
        if(isset($_POST["curso7"])){
            $formulario->setIC7($_POST["curso7"]); 
        }
        if(isset($_POST["curso8"])){
            $formulario->setIC8($_POST["curso8"]); 
        }
        if(isset($_POST["curso9"])){
            $formulario->setIC9($_POST["curso9"]); 
        }
        if(isset($_POST["curso10"])){
            $formulario->setIC10($_POST["curso10"]); 
        }

        //INFORMAÇÕES SOBRE O CORPO DOCENTE
        if(isset($_POST["docente1"])){
            $formulario->setID1($_POST["docente1"]); 
        }
        if(isset($_POST["docente2"])){
            $formulario->setID2($_POST["docente2"]); 
        }
        if(isset($_POST["docente3"])){
            $formulario->setID3($_POST["docente3"]); 
        }

        //INFORMAÇÕES PESSOAIS
        if(isset($_POST["pessoal1"])){
            $formulario->setIP1($_POST["pessoal1"]); 
        }
        if(isset($_POST["pessoal1A"])){
            if($_POST["pessoal1A"] != null || $_POST["pessoal1A"] != ""){
            $formulario->setIP1($_POST["pessoal1A"]); 
            }
        }
        if(isset($_POST["pessoal2"])){
            $formulario->setIP2($_POST["pessoal2"]); 
        }
        if(isset($_POST["pessoal2A"])){
             if($_POST["pessoal2A"] != null || $_POST["pessoal2A"] != ""){
            $formulario->setIP2($_POST["pessoal2A"]); 
             }
        }
        if(isset($_POST["pessoal3"])){
            $formulario->setIP3($_POST["pessoal3"]); 
        }
        if(isset($_POST["pessoal3Onde"])){
             if($_POST["pessoal3Onde"] != null || $_POST["pessoal3Onde"] != ""){
            $formulario->setIP3($_POST["pessoal3Onde"]);
             }
        }
        if(isset($_POST["pessoal3A"])){
            $formulario->setIP3A($_POST["pessoal3A"]); 
        }
        if(isset($_POST["pessoal3B"])){
            $formulario->setIP3B($_POST["pessoal3B"]); 
        }
        if(isset($_POST["pessoal3C"])){
            $formulario->setIP3C($_POST["pessoal3C"]); 
        }
        if(isset($_POST["pessoal3D"])){
            $formulario->setIP3D($_POST["pessoal3D"]); 
        }

        //INFORMAÇÕES ADICIONAIS
        if(isset($_POST["adicionais1"])){
            $formulario->setIA1($_POST["adicionais1"]); 
        }
        if(isset($_POST["adicionais2"])){
            $formulario->setIA2($_POST["adicionais2"]); 
        }
        if(isset($_POST["adicionais3"])){
            $formulario->setIA3($_POST["adicionais3"]); 
        }
        if(isset($_POST["adicionais4"])){
            $formulario->setIA4($_POST["adicionais4"]); 
        }
        if(isset($_POST["adicionais5"])){
            $formulario->setIA5($_POST["adicionais5"]); 
        }
        if(isset($_POST["adicionais6"])){
            $formulario->setIA6($_POST["adicionais6"]); 
        }

        if(isset($_POST["sugestoes"])){
            $formulario->setSugestao($_POST["sugestoes"]); 
        }
        
        $formulario->setIdUsuario((int) $idLogado);
        
        
    try{
 
    
    $dao = new DaoFormulario();
    $dao->inserir($formulario);


    echo "<script type='text/javascript'>";
    
        //echo "alert('Obrigado por responder ao nosso formulário!');";
        echo "var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#modalMsgSucessoComLoadingFormulario').modal('show');
                });";
        echo "location.href='http://localhost/questionario/aluno/sair.php';";

    echo "</script>";
    
    //echo "succes";

} 
catch (Exception $e){
    
    print "Erro " .$e;
    
    echo "<script type='text/javascript'>";
    
        echo "var $ = jQuery.noConflict();
            $(document).ready(function() {
            $('#modalMsgErroExceptionComLoading').modal('show');
                });";
        //echo "alert('Houve um erro ao tentar inserir formulario');";
        echo "location.href='http://localhost/questionario/aluno/sair.php';";

    echo "</script>";
    
    //echo "erroException";
}
            
            
            
        }
}


?>

