<?php
  class Pessoa{
    private $nome;
    private $idade;
    private $pai;
    private $mae;
   
   

    public function __get($atributo){
      return $this->$atributo;
    }

    public function __set($atributo, $valor){
      $this->$atributo = $valor;
    }

    public function PaiMae(){
      echo "Nome do pai: ".$this->__get('pai')->__get('nome')."<br>"."Nome da mãe: ".$this->__get('mae')->__get('nome');
    }
  }
  $minhacoroa = new Pessoa();
  $minhacoroa->__set('nome',"Rainha da Chinelada");

  $meupai = new Pessoa();
  $meupai->__set('nome',"SGT Nunes");
  
  $dezim = new Pessoa();
  $dezim->__set('nome', "Andrezera");
  $dezim->__set('pai', $meupai);
  $dezim->__set('mae', $minhacoroa);

  $dezim->PaiMae();

  
?>