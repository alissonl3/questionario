<?php
 
class Email{
    
    function Email(){}
    
    private $id;
    private $dataEnvio;
    private $idUsuario;
    private $enviado;
 
    
    public function getId() { return $this->id; } 
    public function setId($id) { $this->id = $id; }
    
    public function getDataEnvio() { return $this->dataEnvio; } 
    public function setDataEnvio($dataEnvio) { $this->dataEnvio = $dataEnvio; }
    
    public function getIdUsuario() { return $this->idUsuario; } 
    public function setIdUsuario($idUsuario) { $this->idUsuario = $idUsuario; }
    
    public function getEnviado() { return $this->enviado; } 
    public function setEnviado($enviado) { $this->enviado = $enviado; }
    
   

}

