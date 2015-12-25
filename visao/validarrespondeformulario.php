<?php


include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';

//VALIDAÇÃO DOS DADOS
if(isset($_POST["cpf"])){
    $cpf = $_POST["cpf"];
}


try{
    
$dao = new DaoUsuario();
$user = $dao->buscarPorCondicao(" cpf = ". $cpf);


if($user->getId() > 0){
  
    echo "sucess";
 
}
else
{
    
    echo "erro";
     

}


} 
catch (Exception $e){
    
   echo "erroException";
}



