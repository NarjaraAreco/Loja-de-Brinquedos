<?php

class PedidoBrinquedo {
 
    private $fk_id_pedido;
    private $fk_id_brinquedo;
    private $quantidade;

    function getFk_id_pedido() {
        return $this->fk_id_pedido;
    }

    function getFk_id_brinquedo() {
        return $this->fk_id_brinquedo;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setFk_id_pedido($fk_id_pedido): void {
        $this->fk_id_pedido = $fk_id_pedido;
    }

    function setFk_id_brinquedo($fk_id_brinquedo): void {
        $this->fk_id_brinquedo = $fk_id_brinquedo;
    }

    function setQuantidade($quantidade): void {
        $this->quantidade = $quantidade;
    }

}