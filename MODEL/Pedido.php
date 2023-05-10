<?php

class Pedido {
 
    private $id_pedido;
    private $fk_id_usuario;
    private $data;
    private $status;
    private $valorTotal;
    private Usuario $usuario;
    
    
    function getUsuario(): Usuario {
        return $this->usuario;
    }

    function setUsuario(Usuario $usuario): void {
        $this->usuario = $usuario;
    }

        
    function getValorTotal() {
        return $this->valorTotal;
    }

    function setValorTotal($valorTotal): void {
        $this->valorTotal = $valorTotal;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status): void {
        $this->status = $status;
    }

    function getId_pedido() {
        return $this->id_pedido;
    }

    function getFk_id_usuario() {
        return $this->fk_id_usuario;
    }

    function getData() {
        return $this->data;
    }

    function setId_pedido($id_pedido): void {
        $this->id_pedido = $id_pedido;
    }

    function setFk_id_usuario($fk_id_usuario): void {
        $this->fk_id_usuario = $fk_id_usuario;
    }

    function setData($data): void {
        $this->data = $data;
    }
 
}


