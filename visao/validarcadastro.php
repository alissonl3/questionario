<?php

include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';

$user = new Usuario();

            if(isset($_POST["nome"]))
                $user->setNome($_POST["nome"]);

            if(isset($_POST["email"]))
                $user->setEmail($_POST["email"]);

            if(isset($_POST["telefone"]))
                $user->setTelefone($_POST["telefone"]);

            if(isset($_POST["senha"]))
                $user->setSenha($_POST["senha"]);

            if(isset($_POST["cpf"]))
                $user->setCpf($_POST["cpf"]);
            
            if(isset($_POST["opTipo"]))
                $user->setTipo($_POST["opTipo"]);

            if(isset($_POST["curso"]))
                $user->setIdCurso($_POST["curso"]);


//    echo "<script type='text/javascript'>";
//        //echo "$(document).ready(function (){ ";
//        
//        
//    //   echo "$('#modalMsgSucesso').modal('show');";
//        echo "alert('Obrigado por se cadastrar!');";
//    //    echo "location.href='http://localhost/questionario/index.php';";
//
//       // echo "});";
//    echo "</script>";



try{
    
    
$dao = new DaoUsuario();
$dao->inserir($user);

//    header('location:http://localhost/questionario/index.php');
    
//    echo "<script type='text/javascript'>";
//    
//        echo "alert('Obrigado por se cadastrar!');";
//    //    echo "location.href='http://localhost/questionario/index.php';";
//
//    echo "</script>";

//       echo " $('#msgSucesso').show();";

return "success";

} 
catch (Exception $e){
    
    print "Erro " .$e;
    
//    echo "<script type='text/javascript'>";
//    
//        echo "alert('Houve um erro ao tentar cadastrar usuario');";
//        echo "location.href='http://localhost/questionario/cadastro.php';";
//
//    echo "</script>";
    
    echo "erroException";
}
