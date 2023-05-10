<?php

include_once("../MODEL/Usuario.php");

class UsuarioDAO {

    private $conn;

    public function __construct() {
        $controle = ControleConexao::getInstance();
        $this->conn = $controle->get('Connection');
    }

    public function validarLogin(String $login, String $senha) {
        $this->conn->beginTransaction();

        try {
            //aqui é explicito o schema principal
            $stmt = $this->conn->prepare('SELECT * FROM lojabrinquedos.usuario WHERE email=:email AND senha=:senha'
            );

            $stmt->bindValue(':email', $login);
            $stmt->bindValue(':senha', sha1($senha));
            $stmt->execute();


            $this->conn->commit();
            return $this->processaResultados($stmt);
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function inserir(Usuario $usuario) {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                    'INSERT INTO usuario (nome, cpf, email, rua, bairro, numero, senha, tipo, telefone)  VALUES (:nome, :cpf, :email, :rua, :bairro, :numero, :senha, :tipo, :telefone)'
            );


            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':cpf', $usuario->getCpf());
            $stmt->bindValue(':email', $usuario->getEmail());
            $stmt->bindValue(':rua', $usuario->getRua());
            $stmt->bindValue(':bairro', $usuario->getBairro());
            $stmt->bindValue(':numero', $usuario->getNumero());
            $stmt->bindValue(':telefone', $usuario->getTelefone());
            $stmt->bindValue(':tipo', $usuario->getTipo());
            $stmt->bindValue(':senha', sha1($usuario->getSenha()));
            $stmt->execute();



            $this->conn->commit();
        } catch (Exception $e) {
            print_r($e);
            $this->conn->rollback();
        }
    }

    public function buscarTodos() {
        $statement = $this->conn->query(
                'SELECT * FROM usuario'
        );

        return $this->processaResultados($statement);
    }

    private function processaResultados($statement) {
        $resultados = array();

        if ($statement) {
            while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
                $usuario = new Usuario();

                $usuario->setId_usuario($row->id_usuario);
                $usuario->setEmail($row->email);
                $usuario->setCpf($row->cpf);
                $usuario->setBairro($row->bairro);
                $usuario->setNome($row->nome);
                $usuario->setNumero($row->numero);
                $usuario->setRua($row->rua);
                $usuario->setSenha($row->senha);
                $usuario->setTelefone($row->telefone);
                $usuario->setTipo($row->tipo);

                $resultados[] = $usuario;
            }
        }

        return $resultados;
    }

}

?>