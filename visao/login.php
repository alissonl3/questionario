<?php


include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';


session_start();
//VALIDAÇÃO DOS DADOS
if(isset($_POST["email"])){
    $email = $_POST["email"];
}

if(isset($_POST["senha"])){
    $senha = $_POST["senha"];
}

//USUARIO MASTER
if($email == "ifpr@edu.br" && $senha == "root"){
    
    
    $_SESSION['nome'] = "Moderador";
    
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    
    //VARIAVEL DE VERIFICAÇÃO DO LOGI... saber se é adm ou usuario
    $_SESSION['tipo'] = "adm";

    echo "ifpr";
    
}
else{

try{
    
$dao = new DaoUsuario();
$user = $dao->buscarPorEmailSenha($email, $senha);


if($user->getId() > 0){
  
    //ENVIO DE DADOS PELA SEÇÃO
    $_SESSION['nome'] = $user->getNome();
    $_SESSION['id'] = $user->getId(); 
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['telefone'] = $user->getTelefone();
    $_SESSION['idFormulario'] = $user->getLiberado();

    
    
    //VARIAVEL DE VERIFICAÇÃO DO LOGI... saber se é adm ou usuario
    $_SESSION['tipo'] = "user";
      
    
    echo "sucess";
    
   
    
}
else
{
    
    unset ($_SESSION['email']);
    unset ($_SESSION['senha']);
    
    echo "erro";
     

}


} 
catch (Exception $e){
    
   echo "erroException";
}
}


