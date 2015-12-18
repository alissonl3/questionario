<?php

include_once  '../dao/DaoUsuario.php';
include_once '../entidades/Usuario.php';
include_once '../banco/Conexao.php';

try{
    
$dataAtual = date("d/m/y");
    
$condicaoBusca = "dataEnvio IS NOT NULL";
    
$dao = new DaoUsuario();
$user = $dao->buscarPorCondicao($condicaoBusca);

if(count($user) > 0){
    
foreach ($user as $valor) {
    //ENVIAR O EMAIL
  if(verificarData($valor->getDataEnvio())){
      //METODO PARA MANDAR O EMAIL
  }
}

    
}


}  
catch (Exception $erro){
    
    print "Erro: " + $erro;
    
}

//COMPARA AS DATAS ATUAL x BANCO
function verificarData($data){
    
    $retorno = false;
    
    $matriz = explode("/", $data);
    
    $dataBancoAno = (int) $matriz[2];
    $dataBancoMes = (int) $matriz[1];
    $dataBancoDia = (int) $matriz[0];
    
    $dataAtualAno = (int) date("y");
    $dataAtualMes = (int) date("m");
    $dataAtualDia = (int) date("d");
    
    if($dataAtualAno > $dataBancoAno){
        
        $retorno = true;
    
    }
    else
    {
        if($dataAtualAno == $dataBancoAno){
        
            if($dataAtualMes > $dataBancoMes){
                $retorno = true;
            }
            else{
                
                    if($dataAtualMes == $dataBancoMes){
                    
                    if($dataAtualDia > $dataBancoDia){
                        
                        $retorno = true;
                    }
                    else{

                        if($dataAtualDia == $dataBancoDia){

                            $retorno = true;

                        }
                        else{
                            $retorno = false;
                        }

                    }
                
                }
                else{
                    $retorno = false;
                }
                
            }
            
    
        }
        else           
        {
            
            $retorno = false;
        }
        
        
    }
}