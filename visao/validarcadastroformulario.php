<?php

include_once  './dao/DaoFormulario.php';
include_once './entidades/Formulario.php';

include_once  './dao/DaoUsuario.php';
include_once './entidades/Usuario.php';

include_once './banco/Conexao.php';

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

if(isset($_GET["acao"])){
    if($_GET["acao"] === "salvar"){
try{
 
    //print($dataEnvio);
    
    $dao = new DaoFormulario();
    $dao->inserir($formulario);
    
    $idFormulario = $dao->buscarPorMaiorId();
    
    $usuario = new Usuario();
    
    //session_start();
    
    //RECUPAREAÇÃO DOS DADOS VIA SESSION
    $usuario->setId($_SESSION['id']);
    $usuario->setNome($_SESSION['nome']);
    $usuario->setEmail($_SESSION['email']);
    $usuario->setEmailEnviado($_SESSION['emailEnviado']);
    $usuario->setRepondeu('sim');
    $usuario->setSenha($_SESSION['senha']);
    $usuario->setTelefone($_SESSION['telefone']);
    $usuario->setDataEnvio($_SESSION['dataEnvio']);
    $usuario->setLiberado($idFormulario['MAX(id)']);
    
    $userDao = new DaoUsuario();
    $userDao->atualizar($usuario);

    echo "<script type='text/javascript'>";
    
        echo "alert('Obrigado por responder ao nosso formulário!');";
        echo "location.href='http://localhost/questionario/aluno/principal.php';";

    echo "</script>";

} 
catch (Exception $e){
    
    print "Erro " .$e;
    
    echo "<script type='text/javascript'>";
    
        echo "alert('Houve um erro ao tentar inserir formulario');";
        echo "location.href='http://localhost/questionario/aluno/formulario.php';";

    echo "</script>";
}
    }
}


