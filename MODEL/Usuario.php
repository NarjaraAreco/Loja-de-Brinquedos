<?php

class Usuario {
 
    private $id_usuario;
    private $nome;
    private $cpf;
    private $senha;
    private $email;
    private $rua;
    private $bairro;
    private $numero;
    private $tipo;
    private $telefone;
    
    
    
    function getTelefone() {
        return $this->telefone;
    }

    function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

     
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getRua() {
        return $this->rua;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getNumero() {
        return $this->numero;
    }

    function setId_usuario($id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setRua($rua): void {
        $this->rua = $rua;
    }

    function setBairro($bairro): void {
        $this->bairro = $bairro;
    }

    function setNumero($numero): void {
        $this->numero = $numero;
    }

    function getSenha() {
        return $this->senha;
    }

    function setSenha($senha): void {
        $this->senha = $senha;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }


 
}
?>

