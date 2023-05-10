<?php

//include_once("../MODEL/Prato.php");
include_once("../MODEL/Brinquedo.php");

class BrinquedoDAO {

    private $conn;

    public function __construct() {
        $controle = ControleConexao::getInstance();
        $this->conn = $controle->get('Connection');
    }

    public function buscarTodos() {
        $statement = $this->conn->query(
                'SELECT * FROM lojabrinquedos.brinquedo'
        );

        return $this->processaResultados($statement);
    }

    public function buscarRegistro(int $id) {

        $statement = $this->conn->query(
                'SELECT * FROM lojabrinquedos.brinquedo WHERE id_brinquedo=' . $id
        );

        return $this->processaResultados($statement);
    }

    public function inserir(Brinquedo $brinquedo) {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                    'INSERT INTO brinquedo (nome, preco, tipo)  VALUES (:nome, :preco, :tipo)'
            );


            $stmt->bindValue(':nome', $brinquedo->getNome());
            $stmt->bindValue(':preco', $brinquedo->getPreco());
            $stmt->bindValue(':tipo', $brinquedo->getTipo());
            $stmt->execute();



            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function atualizar(Brinquedo $brinquedo) {
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                    'UPDATE lojabrinquedos.brinquedo SET nome=:nome, preco=:preco, tipo=:tipo WHERE id_brinquedo=:id_brinquedo'
            );

            $stmt->bindValue(':nome', $brinquedo->getNome());
            $stmt->bindValue(':preco', $brinquedo->getPreco());
            $stmt->bindValue(':tipo', $brinquedo->getTipo());
            $stmt->bindValue(':id_brinquedo', $brinquedo->getId_Brinquedo());

            $stmt->execute();



            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    private function processaResultados($statement) {
        $resultados = array();

        if ($statement) {
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $brinquedo = new Brinquedo();

                $brinquedo->setId_brinquedo($row->id_brinquedo);
                $brinquedo->setNome($row->nome );
                $brinquedo->setPreco($row->preco);
                $brinquedo->setTipo($row->tipo);


                $resultados[] = $brinquedo;
            }
        }

        return $resultados;
    }

    public function remover(int $id) {
        $this->conn->beginTransaction();

        try {

            $stmt = $this->conn->prepare(
                    'DELETE FROM lojabrinquedos.brinquedo WHERE  id_brinquedo=:idInserido'
            );

            $stmt->bindValue(':idInserido', $id);
            $stmt->execute();

            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

}

?>