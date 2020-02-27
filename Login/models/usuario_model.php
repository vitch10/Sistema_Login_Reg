<?php
require_once("usuario_model.php");

class Cadastro  {

    private $nome;
    private $telefone; 
    private $email;
    private $senha;
    private $confirSenha;


    //Metodos Set
    public function setNome($string){
        $this->nome = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setSenha($string){
        $this->senha = $string;
    }
    public function setConfirSenha($string){
        $this->confirSenha = $string;
    }
    
    //Metodos Get
    public function getNome(){
        return $this->nome;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getConfirSenha(){
        return $this->confirSenha;
    }

}
?>