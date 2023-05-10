<?php

include_once("../MODEL/Pedido.php");
include_once("../MODEL/Usuario.php");
include_once("../MODEL/PedidoBrinquedo.php");

class PedidoDAO {

    private $conn;

    public function __construct() {
        $controle = ControleConexao::getInstance();
        $this->conn = $controle->get('Connection');
    }

    public function inserir(Pedido $pedido) {
        $this->conn->beginTransaction();

        try {

            $stmt = $this->conn->prepare(
                    'INSERT INTO lojabrinquedos.pedido (fk_id_usuario, data, status)  VALUES (:idUsuario, :dataHora, :status)'
            );

            $stmt->bindValue(':idUsuario', $pedido->getFk_id_usuario());
            $stmt->bindValue(':status', $pedido->getStatus());
            $stmt->bindValue(':dataHora', $pedido->getData());
            $stmt->execute();

            $id_insert = $this->conn->lastInsertId();
            $this->conn->commit();

            return $id_insert;
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function adicionarBrinquedo(PedidoBrinquedo $pedidoBrinquedo) {
        $this->conn->beginTransaction();

        try {

            $stmt = $this->conn->prepare(
                    'INSERT INTO lojabrinquedos.pedido_brinquedo (fk_id_brinquedo, fk_id_pedido, quantidade)  VALUES (:idBrinquedo, :idPedido, :quantidade)'
            );

            $stmt->bindValue(':idBrinquedo', $pedidoBrinquedo->getFk_id_brinquedo());
            $stmt->bindValue(':idPedido', $pedidoBrinquedo->getFk_id_pedido());
            $stmt->bindValue(':quantidade', $pedidoBrinquedo->getQuantidade());
            $stmt->execute();

            $id_insert = $this->conn->lastInsertId();
            $this->conn->commit();

            return $id_insert;
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function cancelarPedido($id) {
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                    'UPDATE lojabrinquedos.pedido SET status=:status WHERE id_pedido=:idPedido'
            );


            $stmt->bindValue(':status', "CANCELADO");
            $stmt->bindValue(':idPedido', $id);
            $stmt->execute();

            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function finalizarPedido($id) {
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                    'UPDATE lojabrinquedos.pedido SET status=:status WHERE id_pedido=:idPedido'
            );


            $stmt->bindValue(':status', "FINALIZADO");
            $stmt->bindValue(':idPedido', $id);
            $stmt->execute();

            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function atualizar(Pedido $pedido) {
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                    'UPDATE lojabrinquedos.pedido SET  valorTotal=:valorTotal, status=:status WHERE id_pedido=:idPedido'
            );

            $stmt->bindValue(':valorTotal', $pedido->getValorTotal());
            $stmt->bindValue(':status', $pedido->getStatus());
            $stmt->bindValue(':idPedido', $pedido->getId_pedido());
            $stmt->execute();



            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function remover(int $id) {
        $this->conn->beginTransaction();

        try {


            $stmti = $this->conn->prepare(
                    'DELETE FROM lojabrinquedos.pedido_prato WHERE  fk_id_pedido=:idInserido'
            );

            $stmti->bindValue(':idInserido', $id);
            $stmti->execute();

            //$stmti->conn->commit();




            $stmt = $this->conn->prepare(
                    'DELETE FROM lojabrinquedos.pedido WHERE  id_pedido=:idInserido'
            );

            $stmt->bindValue(':idInserido', $id);
            $stmt->execute();

            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }
    
        public function buscarPedidosStatus($status) {


        $statement = $this->conn->query(
                'SELECT lojabrinquedos.pedido.*, lojabrinquedos.usuario.nome,lojabrinquedos.usuario.email, lojabrinquedos.usuario.telefone 
                    FROM lojabrinquedos.pedido 
                    INNER JOIN lojabrinquedos.usuario ON lojabrinquedos.pedido.fk_id_usuario=lojabrinquedos.usuario.id_usuario 
                    WHERE lojabrinquedos.pedido.status='." '".$status ."';"
        );


        return $this->processaResultadosJoinUsuario($statement);
    }

    public function buscarPedidosUsuario() {


        $statement = $this->conn->query(
                'SELECT lojabrinquedos.pedido.*, lojabrinquedos.usuario.nome,lojabrinquedos.usuario.email, lojabrinquedos.usuario.telefone 
                    FROM lojabrinquedos.pedido 
                    INNER JOIN lojabrinquedos.usuario ON lojabrinquedos.pedido.fk_id_usuario=lojabrinquedos.usuario.id_usuario;'
        );

        //var_dump($statement);

        return $this->processaResultadosJoinUsuario($statement);
    }

    private function processaResultadosJoinUsuario($statement) {
        $resultados = array();

        if ($statement) {
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $pedido = new Pedido();
                $usuario = new Usuario();

                $usuario->setNome($row->nome);
                $usuario->setEmail($row->email);
                $usuario->setTelefone($row->telefone);

                $pedido->setId_pedido($row->id_pedido);
                $pedido->setFk_id_usuario($row->fk_id_usuario);
                $pedido->setData($row->data);
                $pedido->setStatus($row->status);
                $pedido->setValorTotal($row->valorTotal);
                $pedido->setUsuario($usuario);

                $resultados[] = $pedido;
            }
        }

        return $resultados;
    }

    public function buscarTodos() {
        $statement = $this->conn->query(
                'SELECT * FROM lojabrinquedo.pedido'
        );

        return $this->processaResultados($statement);
    }

    public function buscarPedido(int $id) {

        $statement = $this->conn->query(
                'SELECT * FROM lojabrinquedo.pedido WHERE id_pedido=' . $id
        );

        return $this->processaResultados($statement);
    }

    private function processaResultados($statement) {
        $resultados = array();

        if ($statement) {
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $pedido = new Pedido();

                $pedido->setId_pedido($row->id_pedido);
                $pedido->setFk_id_usuario($row->fk_id_usuario);
                $pedido->setData($row->data);
                $pedido->setStatus($row->status);
                $pedido->setValorTotal($row->valorTotal);


                $resultados[] = $pedido;
            }
        }

        return $resultados;
    }

}

?>