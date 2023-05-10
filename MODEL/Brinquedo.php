<?php

class Brinquedo {
 
    private $id_brinquedo;
    private $nome;
    private $preco;
    private $tipo;
 


    function getId_brinquedo() {
        return $this->id_brinquedo;
    }

    function getNome() {
        return $this->nome;
    }

    function getPreco() {
        return $this->preco;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId_brinquedo($id_brinquedo): void {
        $this->id_brinquedo = $id_brinquedo;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setPreco($preco): void {
        $this->preco = $preco;
    }

    function setTipo($tipo): void {
        $this->tipo = $tipo;
    }



 
}


