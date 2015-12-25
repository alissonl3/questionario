<?php

//include_once '../banco/Conexao.php';


class DaoEmail {
    
    private $pdo;
            
    function  DaoEmail(){
        
        $this->pdo = new Conexao();
        $this->pdo = $this->pdo->getPdo();
        
    }
    
    
    public function getNextID(){
        try{
            
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='email'";
            $result = $this->pdo->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC); 
            return $final_result['Auto_increment'];
         
        }  catch (Exception $e){
           
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
       
        }
    }


    public function inserir(Email $email){
        try{
            
            $sql = "INSERT INTO email("
                    . "dataEnvio,"
                    . "idUsuario"         
                    . ") VALUES ("
                    . ":dataEnvio,"
                    . ":idUsuario)";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":dataEnvio", $email->getDataEnvio());
            $p_sql -> bindValue(":idUsuario", $email->getIdUsuario());
            
            
            return $p_sql->execute();
         
            
        }  
        catch (Exception $e){
            
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. " .$e; 

        }
        
    }
    
    public function editarComSenha(Email $email) { 
        try { 
            $sql = "UPDATE email SET dataEnvio = :dataEnvio, idUsuario = :idUsuario WHERE id = :id"; 
            $p_sql = $this->pdo->prepare($sql); 
            $p_sql->bindValue(":dataEnvio", $email->getDataEnvio()); 
             $p_sql -> bindValue(":idUsuario", $email->getIdUsuario());
            $p_sql->bindValue(":id", $email->getId()); 
            return $p_sql->execute(); 
            
        } catch (Exception $e) { 
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
            
        } 
        
        }

   

    
    public function atualizar(Email $email){
        
        try{
            
            $sql = "UPDATE email SET "
                    . "dataEnvio = :dataEnvio,"
                    . "IdUsuario = :idUsuario "
                    . "WHERE id = :id";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":id", $email->getId());
            $p_sql -> bindValue(":dataEnvio", $email->getDataEnvio());
            $p_sql -> bindValue(":idUsuario", $email->getIdUsuario());
            
            return $p_sql->execute();
            
            
        }
 catch (Exception $e){
     
      print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
    
   
 }
        
    }
    
    
    public function deletar($id){
        
        try{
            
            $sql = "DELETE FROM email WHERE id = :id";
            $p_sql  = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            
            return $p_sql->execute();
     
        }
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
        
    }
    
   

    public function buscarPorUsuario($idUsuario){
        
         try{
            
            $sql = "SELECT * FROM email WHERE idUsuario = :idUsuario";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":idUsuario", $idUsuario);
            $p_sql->execute();
            
             return $this->populaEmail($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    
    
    public function buscarPorId($id){
        
         try{
            
            $sql = "SELECT * FROM email WHERE id = :id";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            $p_sql->execute();
    
             return $this->populaEmail($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    
    
     
   
      public function buscarPorCondicao($condicao){
        
           try{
            
            $sql = "SELECT * FROM email WHERE ".$condicao;
            $result = $this->pdo->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaEmail($l);
            }
           
            return $f_lista;
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
         
 }
        
    }
     
    
    public function buscarTodos(){
        
           try{
            
            $sql = "SELECT * FROM email";
            $result = $this->pdo->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaEmail($l);
            }
           
            return $f_lista;
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
         
 }
        
    }
    
    private function populaEmail($row){
        $email = new Email();
        $email ->setId($row['id']);
        $email ->setDataEnvio($row['dataEnvio']);
        $email ->setIdUsuario($row['idUsuario']);
        
        return $email;
    }
    
    
}
