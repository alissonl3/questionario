<?php

//executar a trhead ??
class Verificacao extends Thread  {
    
    public function run(){
        
         $tempo = 5; //5 segundos
         
         sleep($tempo);
         
         print("Executou a thread!!!");
        
    }
  
}
