
<?php require './template/topo.php'; ?>

<script type="text/javascript">

function liberarQuestionario()
{
                $.ajax({
                     url: 'visao/validarrespondeformulario.php',
                     data: {$('#frmLogin').serialize()}, //pegar dados do formulario
                     method: "POST",
                     async: true
                     }).done(function (retorno){
                         
                         
                         
                         if(retorno === "erro"){
                            $('#messageError').html("<b>Login invalido!</b>");
                         }
                         else if(retorno === "erroQtdResponde")
                         {                            
                             $('#messageError').html("<b>Ja atingiu seu limite!</b>");
                         }
                         else if(retorno === "erroException")
                         {
                             $('#messageError').html("<b>Estamos com problemas no momente, tente mais tarde!</b>");
                         }
                         else if(retorno === "sucess")
                         {
                             document.getElementById("resposta").style.cursor = "auto";
                             document.getElementById("resposta").style.pointer-events = "auto";
                         }
                         
                         
                     });
    
}

</script>

<!-- Pagina do conteudo -->
<div class="row" style="margin-top: 5%; margin-bottom: 5%; " >
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
    
    <div class="col-md-8 col-sm-8 col-xs-8" style="background-color: white; border: 2px #e7e7e7 solid; border-radius: 10px; padding: 20px; margin-top: 10px;" >

        <div id="pergunta" style="color: graytext;">
            <center>
                <h2>Formulário</h2>
                <p>
                    O formulário será respondido durante cinco anos após o termino do curso. Nesse 
                    tempo a cada ano será envia um e-mail para o estudando solicitando o respondimento
                    do formulário.
                </p>
                <br/>
                <hr />
                <br />
                <p style="color: red;">
                    Para desbloquear o acesso informe seu cpf abaixo
                </p>
                <form id="fmrLiberarQuestionario" method="POST" role="form" onsubmit="liberarQuestionario(); return false;" >
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">CPF</span>
                            <input type="text" required="true" class="form-control" placeholder="informe o cpf" aria-describedby="basic-addon1">
                        </div> 
                        <br />
                        <center>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-success btn-lg">
                                <span class="glyphicon glyphicon-ok"></span>
                                Confirmar</button>
                            
                        </center>
                    </form>
            </center>
            
        </div>
        
        <div id="modalResponder" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal corpo-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">VALIDAÇÃO</h4>
                </div>
                <div class="modal-body">
                    
                 
                    
          
                    
                    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        
        
        <br />
        
        <style>
            
            #resposta {
                cursor:not-allowed;
            }
            #resposta * {
                pointer-events: none;
            }
            
        </style>
        
        
        <div id="resposta" >
            
            <form action="formulario.php?acao=salvar" method="POST"  role="form"  >
                <fieldset>
                    <legend>Dados pessoais</legend>
                    <div class="form-group">
                        <label  for="anoConclusao">Ano de conclusão:</label>
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
                    <div class="form-group">
                        <label  for="opSemestre">3 - Faixa Salarial:</label>
                        <div class="radio">
                            <label><input  type="radio" name="opSalario" value="<=1000,00"><=1000,00</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="opSalario" value="> 1000,00 e <=3000,00">> 1000,00 e <=3000,00
                        </div>
                        <div class="radio">
                            <label><input  type="radio" name="opSalario" value=">3000,00 e <= 5000,00">>3000,00 e <= 5000,00</label>
                        </div>
                        <div class="radio">
                            <label><input  type="radio" name="opSalario" value="> 5000,00">> 5000,00</label>
                        </div>
                </fieldset> 
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
            
        </div>

        <hr />
        
        <div id="email" style="color: graytext; float: right;"  >
            
            <div style="float: left;">
            <a href="email.php" title="Recuperar sua senha" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-envelope"></span>
                                E-mail</a>
            </div>
           
        
        </div>
        

    </div>
    
    <div class="col-md-2 col-sm-2 col-xs-2"></div>
</div> 

<?php require './template/rodape.php';


?>

