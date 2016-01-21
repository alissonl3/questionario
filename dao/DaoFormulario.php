<?php

//include_once '../banco/Conexao.php';


class DaoFormulario {
    
    private $pdo;
            
    function  DaoFormulario(){
        
        $this->pdo = new Conexao();
        $this->pdo = $this->pdo->getPdo();
        
    }
    
    
    public function getNextID(){
        try{
            
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='formulario'";
            $result = $this->pdo->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC); 
            return $final_result['Auto_increment'];
         
        }  catch (Exception $e){
           
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
       
        }
    }


    public function inserir(Formulario $formulario){
        try{
            
            
            $sql = "INSERT INTO formulario("
                    . "anoConclusao,"
                    . "ia1,"
                    . "ia2,"
                    . "ia3,"
                    . "ia4,"
                    . "ia5,"
                    . "ia6,"
                    . "ic1,"
                    . "ic2,"
                    . "ic3,"
                    . "ic4,"
                    . "ic5,"
                    . "ic6,"
                    . "ic7,"
                    . "ic8,"
                    . "ic9,"
                    . "ic10,"
                    . "id1,"
                    . "id2,"
                    . "id3,"
                    . "ip1,"
                    . "ip2,"
                    . "ip3,"
                    . "ip3a,"
                    . "ip3b,"
                    . "ip3c,"
                    . "ip3d,"
                    . "sugestao,"
                    . "semestre,"
                    . "status,"
                    . "idUsuario"
                    . ") VALUES ("
                    . ":anoConclusao,"
                    . ":ia1,"
                    . ":ia2,"
                    . ":ia3,"
                    . ":ia4,"
                    . ":ia5,"
                    . ":ia6,"
                    . ":ic1,"
                    . ":ic2,"
                    . ":ic3,"
                    . ":ic4,"
                    . ":ic5,"
                    . ":ic6,"
                    . ":ic7,"
                    . ":ic8,"
                    . ":ic9,"
                    . ":ic10,"
                    . ":id1,"
                    . ":id2,"
                    . ":id3,"
                    . ":ip1,"
                    . ":ip2,"
                    . ":ip3,"
                    . ":ip3a,"
                    . ":ip3b,"
                    . ":ip3c,"
                    . ":ip3d,"
                    . ":sugestao,"
                    . ":semestre,"
                    . ":status,"
                    . ":idUsuario"
                    . ")";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":anoConclusao", $formulario->getAnoConclusao());
            $p_sql -> bindValue(":ia1", $formulario->getIA1());
            $p_sql -> bindValue(":ia2", $formulario->getIA2());
            $p_sql -> bindValue(":ia3", $formulario->getIA3());
            $p_sql -> bindValue(":ia4", $formulario->getIA4());
            $p_sql -> bindValue(":ia5", $formulario->getIA5());
            $p_sql -> bindValue(":ia6", $formulario->getIA6());
            $p_sql -> bindValue(":ic1", $formulario->getIC1());
            $p_sql -> bindValue(":ic2", $formulario->getIC2());
            $p_sql -> bindValue(":ic3", $formulario->getIC3());
            $p_sql -> bindValue(":ic4", $formulario->getIC4());
            $p_sql -> bindValue(":ic5", $formulario->getIC5());
            $p_sql -> bindValue(":ic6", $formulario->getIC6());
            $p_sql -> bindValue(":ic7", $formulario->getIC7());
            $p_sql -> bindValue(":ic8", $formulario->getIC8());
            $p_sql -> bindValue(":ic9", $formulario->getIC9());
            $p_sql -> bindValue(":ic10", $formulario->getIC10());
            $p_sql -> bindValue(":id1", $formulario->getID1());
            $p_sql -> bindValue(":id2", $formulario->getID2());
            $p_sql -> bindValue(":id3", $formulario->getID3());
            $p_sql -> bindValue(":ip1", $formulario->getIP1());
            $p_sql -> bindValue(":ip2", $formulario->getIP2());
            $p_sql -> bindValue(":ip3", $formulario->getIP3());
            $p_sql -> bindValue(":ip3a", $formulario->getIP3A());
            $p_sql -> bindValue(":ip3b", $formulario->getIP3B());
            $p_sql -> bindValue(":ip3c", $formulario->getIP3C());
            $p_sql -> bindValue(":ip3d", $formulario->getIP3D());
            $p_sql -> bindValue(":sugestao", $formulario->getSugestao());
            $p_sql -> bindValue(":semestre", $formulario->getSemestre());
            $p_sql -> bindValue(":status", $formulario->getStatus());
            $p_sql -> bindValue(":idUsuario", $formulario->getIdUsuario());

            
            return $p_sql->execute();
         
            
        }  
        catch (Exception $e){
            
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. " .$e; 

        }
        
    }
    
    public function atualizar(Formulario $formulario) { 
        try { 
            $sql = "UPDATE formulario SET "
                    . " anoConclusao = :anoConclusao,"
                    . " ia1 = :ia1,"
                    . " ia2 = :ia2,"
                    . " ia3 = :ia3,"
                    . " ia4 = :ia4,"
                    . " ia5 = :ia5,"
                    . " ia6 = :ia6,"
                    . " ic1 = :ic1,"
                    . " ic2 = :ic2,"
                    . " ic3 = :ic3,"
                    . " ic4 = :ic4,"
                    . " ic5 = :ic5"
                    . " ic6 = :ic6,"
                    . " ic7 = :ic7,"
                    . " ic8 = :ic8,"
                    . " ic9 = :ic9,"
                    . " ic10 = :ic10"
                    . " id1 = :id1,"
                    . " id2 = :id2,"
                    . " id3 = :id3,"
                    . " ic4 = :ic4,"
                    . " ip1 = :ip1"
                    . " ip2 = :ip2,"
                    . " ip3 = :ip3,"
                    . " ip3a = :ip3a"
                    . " ip3b = :ip3b,"
                    . " ip3c = :ip3c,"
                    . " ip3d = :ip3d,"
                    . " sugestao = :sugestao,"
                    . " semestre = :semestre,"
                    . " status = :status,"
                    . " idUsuario = :idUsuario"
                    . " WHERE id = :id"; 
           $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":id", $formulario->getId());
            $p_sql -> bindValue(":anoConclusao", $formulario->getAnoConclusao());
            $p_sql -> bindValue(":ia1", $formulario->getIA1());
            $p_sql -> bindValue(":ia2", $formulario->getIA2());
            $p_sql -> bindValue(":ia3", $formulario->getIA3());
            $p_sql -> bindValue(":ia4", $formulario->getIA4());
            $p_sql -> bindValue(":ia5", $formulario->getIA5());
            $p_sql -> bindValue(":ia6", $formulario->getIA6());
            $p_sql -> bindValue(":ic1", $formulario->getIC1());
            $p_sql -> bindValue(":ic2", $formulario->getIC2());
            $p_sql -> bindValue(":ic3", $formulario->getIC3());
            $p_sql -> bindValue(":ic4", $formulario->getIC4());
            $p_sql -> bindValue(":ic5", $formulario->getIC5());
            $p_sql -> bindValue(":ic6", $formulario->getIC6());
            $p_sql -> bindValue(":ic7", $formulario->getIC7());
            $p_sql -> bindValue(":ic8", $formulario->getIC8());
            $p_sql -> bindValue(":ic9", $formulario->getIC9());
            $p_sql -> bindValue(":ic10", $formulario->getIC10());
            $p_sql -> bindValue(":id1", $formulario->getID1());
            $p_sql -> bindValue(":id2", $formulario->getID2());
            $p_sql -> bindValue(":id3", $formulario->getID3());
            $p_sql -> bindValue(":ip1", $formulario->getIP1());
            $p_sql -> bindValue(":ip2", $formulario->getIP2());
            $p_sql -> bindValue(":ip3", $formulario->getIP3());
            $p_sql -> bindValue(":ip3a", $formulario->getIP3A());
            $p_sql -> bindValue(":ip3b", $formulario->getIP3B());
            $p_sql -> bindValue(":ip3c", $formulario->getIP3C());
            $p_sql -> bindValue(":ip3d", $formulario->getIP3D());
            $p_sql  -> bindValue(":sugestao", $formulario->getSugestao());
            $p_sql -> bindValue(":semestre", $formulario->getSemestre()); 
            $p_sql -> bindValue(":status", $formulario->getStatus());
            $p_sql -> bindValue(":idUsuario", $formulario->getIdUsuario()); 
            
            return $p_sql->execute(); 
            
        } catch (Exception $e) { 
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
            
        } 
        
        }

  
    
    
    public function deletar($id){
        
        try{
            
            $sql = "UPDATE formulario SET status = 0 WHERE id = :id";
            //$sql = "DELETE FROM formulario WHERE id = :id";
            $p_sql  = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            
            return $p_sql->execute();
     
        }
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
        
    }
    
    
    public function buscarPorId($id){
        
         try{
            
            $sql = "SELECT * FROM formulario WHERE id = :id AND status = 1";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            $p_sql->execute();
            
             return $this->populaFormulario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    
    public function buscarPorIdDoUsuario($idUsuario){
        
         try{
            
            $sql = "SELECT * FROM formulario WHERE idUsuario = :idUsuario AND status = 1 ORDER BY id";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":idUsuario", $idUsuario);
            $p_sql->execute();
            
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaFormulario($l);
            }
           
            return $f_lista;
            
            
             //return $this->populaFormulario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    public function buscarPorIdDoUsuarioEIdDoCurso($idUsuario, $idCurso){
        
         try{
            
            $sql = "SELECT * FROM formulario WHERE idUsuario = :idUsuario AND ic1 = :idCurso AND status = 1 ORDER BY id";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":idUsuario", $idUsuario);
            $p_sql -> bindValue(":idCurso", $idCurso);
            $p_sql->execute();
            
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaFormulario($l);
            }
           
            return $f_lista;
            
            
             //return $this->populaFormulario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    

    
    public function buscarTodos(){
        
           try{
            
            $sql = "SELECT * FROM formulario WHERE status = 1 ORDER BY id";
            $result = $this->pdo->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaFormulario($l);
            }
           
            return $f_lista;
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
        
 }
 
 public function buscarCountRespostaComUsuario($condicao){
        
          try{
                        
            $sql = "SELECT COUNT(formulario.id) FROM formulario, usuario WHERE ". $condicao ." AND status = 1";
            $result = $this->pdo->query($sql);
            $retorno = $result->fetch(PDO::FETCH_ASSOC);  
    
            return $retorno;
  
            
            }       
            catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
        
 }
        
    }
 
  public function buscarCountResposta($condicao){
        
          try{
                        
            $sql = "SELECT COUNT(id) FROM formulario WHERE ". $condicao . " AND status = 1";
            $result = $this->pdo->query($sql);
            $retorno = $result->fetch(PDO::FETCH_ASSOC);  
    
            return $retorno;
  
            
            }       
            catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
        
 }
        
    }
    
    
     public function buscarPorMaiorId(){
        
           try{
            
            $sql = "SELECT MAX(id) FROM  WHERE status = 1";
            $result = $this->pdo->query($sql);
            $retorno = $result->fetch(PDO::FETCH_ASSOC);  
            
          
          return $retorno;    
            
            }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
        
    }
    
    private function populaFormulario($row){
        
        $formulario = new Formulario();
        $formulario ->setId($row['id']);
        $formulario ->setAnoConclusao($row['anoConclusao']);
        $formulario ->setIA1($row['ia1']);
        $formulario ->setIA2($row['ia2']);
        $formulario ->setIA3($row['ia3']);
        $formulario ->setIA4($row['ia4']);
        $formulario ->setIA5($row['ia5']);
        $formulario ->setIA6($row['ia6']);
        $formulario ->setIC1($row['ic1']);
        $formulario ->setIC2($row['ic2']);
        $formulario ->setIC3($row['ic3']);
        $formulario ->setIC4($row['ic4']);
        $formulario ->setIC5($row['ic5']);
        $formulario ->setIC6($row['ic6']);
        $formulario ->setIC7($row['ic7']);
        $formulario ->setIC8($row['ic8']);
        $formulario ->setIC9($row['ic9']);
        $formulario ->setIC10($row['ic10']);
        $formulario ->setID1($row['id1']);
        $formulario ->setID2($row['id2']);
        $formulario ->setID3($row['id3']);
        $formulario ->setIP1($row['ip1']);
        $formulario ->setIP2($row['ip2']);
        $formulario ->setIP3($row['ip3']);
        $formulario ->setIP3A($row['ip3a']);
        $formulario ->setIP3B($row['ip3b']);
        $formulario ->setIP3C($row['ip3c']);
        $formulario ->setIP3D($row['ip3d']);
        $formulario ->setSugestao($row['sugestao']);
        $formulario ->setSemestre($row['semestre']);
        $formulario->setStatus($row['status']);
        $formulario ->setIdUsuario($row['idUsuario']);
        
 
        return $formulario;
    }
    
    
}
