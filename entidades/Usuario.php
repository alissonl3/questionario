<?php
 
class Usuario{
    
    function Usuario(){}
    
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $senha;
    private $liberado;
    private $tipo;
    private $qtdResponde;
    private $idCurso;
    private $status;
    
    public function getId() { return $this->id; } 
    public function setId($id) { $this->id = $id; }
    
    public function getNome() { return $this->nome; } 
    public function setNome($nome) { $this->nome = $nome; }
    
     public function getCpf() { return $this->cpf; } 
    public function setCpf($cpf) { $this->cpf = $cpf; }
    
    public function getEmail() { return $this->email; } 
    public function setEmail($email) { $this->email = $email; }
    
    public function getTelefone() { return $this->telefone; } 
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    
    public function getSenha(){ return $this->senha; } 
    public function setSenha($senha) { $this->senha = $senha; }
    
    public function getLiberado() { return $this->liberado; } 
    public function setLiberado($liberado) { $this->liberado = $liberado; }
    
    public function getTipo(){ return $this->tipo; } 
    public function setTipo($tipo) { $this->tipo = $tipo; }
    
    public function getQtdResponde(){ return $this->qtdResponde; } 
    public function setQtdResponde($qtdResponde) { $this->qtdResponde = $qtdResponde; }
    
    public function getIdCurso() { return $this->idCurso; } 
    public function setIdCurso($idCurso) { $this->idCurso = $idCurso; }
    
    public function getStatus() { return $this->status; } 
    public function setStatus($status) { $this->status = $status; }
    
   

}

