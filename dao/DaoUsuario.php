<?php

//include_once '../banco/Conexao.php';


class DaoUsuario {
    
    private $pdo;
            
    function  DaoUsuario(){
        
        $this->pdo = new Conexao();
        $this->pdo = $this->pdo->getPdo();
        
    }
    
    
    public function getNextID(){
        try{
            
            $sql = "SELECT Auto_increment FROM information_schema.tables WHERE table_name='usuario'";
            $result = $this->pdo->query($sql);
            $final_result = $result->fetch(PDO::FETCH_ASSOC); 
            return $final_result['Auto_increment'];
         
        }  catch (Exception $e){
           
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
       
        }
    }


    public function inserir(Usuario $usuario){
        try{
            
            $sql = "INSERT INTO usuario("
                    . "nome,"
                    . "cpf,"
                    . "email,"
                    . "telefone,"
                    . "senha,"
                    . "liberado,"
                    . "tipo,"
                    . "qtdResponde"
                    . ") VALUES ("
                    . ":nome,"
                    . ":cpf,"
                    . ":email,"
                    . ":telefone,"
                    . ":senha,"
                    . ":liberado,"
                    . ":tipo,"
                    . ":qtdResponde)";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":nome", $usuario->getNome());
            $p_sql -> bindValue(":cpf", $usuario->getCpf());
            $p_sql -> bindValue(":email", $usuario->getEmail());
            $p_sql -> bindValue(":telefone", $usuario->getTelefone());
            $p_sql -> bindValue(":senha", $usuario->getSenha());
            $p_sql -> bindValue(":liberado", $usuario->getLiberado());
            $p_sql -> bindValue(":tipo", $usuario->getTipo());
            $p_sql -> bindValue(":qtdResponde", $usuario->getQtdResponde());
            
            return $p_sql->execute();
         
            
        }  
        catch (Exception $e){
            
         print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. " .$e; 

        }
        
    }
    
    public function editarComSenha(Usuario $usuario) { 
        try { 
            $sql = "UPDATE usuario SET nome = :nome, cpf = :cpf, email = :email, telefone = :telefone, senha = :senha, liberado = :liberado, tipo = :tipo, qtdResponde = :qtdResponde WHERE id = :id"; 
            $p_sql = $this->pdo->prepare($sql); 
            $p_sql->bindValue(":nome", $usuario->getNome()); 
             $p_sql -> bindValue(":cpf", $usuario->getCpf());
            $p_sql->bindValue(":email", $usuario->getEmail()); 
            $p_sql->bindValue(":liberado", $usuario->getLiberado()); 
            $p_sql->bindValue(":senha", $usuario->getSenha()); 
            $p_sql->bindValue(":telefone", $usuario->getTelefone()); 
            $p_sql->bindValue(":id", $usuario->getId()); 
            $p_sql -> bindValue(":tipo", $usuario->getTipo());
            $p_sql -> bindValue(":qtdResponde", $usuario->getQtdResponde());
            return $p_sql->execute(); 
            
        } catch (Exception $e) { 
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
            
        } 
        
        }

    public function alterarSenha($id, $senha_antiga, $senha_nova) { 
        try { 
            $user = $this->BuscarPorCOD($id); 
            if ($user->getSenha() == md5(trim(strtolower($senha_antiga)))) { 
                $sql = "UPDATE usuario set senha = :senha_nova WHERE id = :id and senha = :senha_antiga"; 
                $p_sql = $this->pdo->prepare($sql); 
                $p_sql->bindValue(":senha_nova", md5(trim(strtolower($senha_nova)))); 
                $p_sql->bindValue(":senha_antiga", md5(trim(strtolower($senha_antiga)))); 
                $p_sql->bindValue(":id", $id);
                return $p_sql->execute(); 
                
            } else 
                
                return false; 
            
            }
            catch (Exception $e) {
                
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
                
            } 
            
            }

    
    public function atualizar(Usuario $usuario){
        
        try{
            
            $sql = "UPDATE usuario SET "
                    . "nome = :nome,"
                    . "cpf = :cpf,"
                    . "email = :email,"
                    . "telefone = :telefone,"
                    . "senha = :senha,"
                    . "liberado = :liberado,"
                    . "tipo = :tipo "
                    . "WHERE id = :id";
            
            $p_sql = $this->pdo->prepare($sql);
            
            $p_sql -> bindValue(":id", $usuario->getId());
            $p_sql -> bindValue(":nome", $usuario->getNome());
            $p_sql -> bindValue(":cpf", $usuario->getCpf());
            $p_sql -> bindValue(":email", $usuario->getEmail());
            $p_sql -> bindValue(":telefone", $usuario->getTelefone());
            $p_sql -> bindValue(":senha", $usuario->getSenha());
            $p_sql -> bindValue(":liberado", $usuario->getLiberado());
            $p_sql -> bindValue(":tipo", $usuario->getTipo());
            
            return $p_sql->execute();
            
            
        }
 catch (Exception $e){
     
      print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
    
   
 }
        
    }
    
    
    public function deletar($id){
        
        try{
            
            $sql = "DELETE FROM usuario WHERE id = :id";
            $p_sql  = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            
            return $p_sql->execute();
     
        }
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
        
    }
    
    public function alterarSenhaAlreadyCripted($id, $senha_nova_md5) { 
        try {
            
            $sql = "UPDATE usuario SET senha = :senha_nova WHERE id = :id"; 
            $p_sql = $this->pdo->prepare($sql);
            $p_sql->bindValue(":senha_nova", $senha_nova_md5); 
            $p_sql->bindValue(":id", $id);
            return $p_sql->execute(); 
            
        } 
        catch (Exception $e) 
        { 
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
            
        } 
        
        }

    public function buscarPorEmailSenha($email, $senha){
        
         try{
            
            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":email", $email);
            $p_sql -> bindValue(":senha", $senha);
            $p_sql->execute();
            
             return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    public function login($email, $senha){
        
         try{
            
            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":email", $email);
            $p_sql -> bindValue(":senha", $senha);
            $p_sql->execute();
    
             return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    public function buscarPorId($id){
        
         try{
            
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":id", $id);
            $p_sql->execute();
    
             return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
           
              }       
        catch (Exception $e){
     
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
           
     
        }
        
    }
    
    
    
     public function buscarPorNome($nome){
        
           try{
            
            $sql = "SELECT * FROM usuario WHERE nome LIKE :nome ";
            $p_sql = $this->pdo->prepare($sql);
            $p_sql -> bindValue(":nome", $nome."%");
            $p_sql->execute();
            $lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaUsuario($l);
            }
            
         return $f_lista;
           
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
     
     
 }
    
     }  
     
   
      public function buscarPorCondicao($condicao){
        
           try{
            
            $sql = "SELECT * FROM usuario WHERE ".$condicao." ORDER BY nome";
            $result = $this->pdo->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaUsuario($l);
            }
           
            return $f_lista;
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
         
 }
        
    }
     
    
    public function buscarTodos(){
        
           try{
            
            $sql = "SELECT * FROM usuario ORDER BY nome";
            $result = $this->pdo->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            
            foreach ($lista as $l){
                $f_lista[] = $this->populaUsuario($l);
            }
           
            return $f_lista;
              }       
        catch (Exception $e){
     
     print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde."; 
         
 }
        
    }
    
    private function populaUsuario($row){
        $user = new Usuario();
        $user ->setId($row['id']);
        $user ->setNome($row['nome']);
        $user ->setCpf($row['cpf']);
        $user ->setEmail($row['email']);
        $user ->setSenha($row['senha']);
        $user ->setTelefone($row['telefone']);
        $user ->setLiberado($row['liberado']);
        $user ->setTipo($row['tipo']);
        
        return $user;
    }
    
    
}
