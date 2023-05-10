<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../configuracao/ControleConexao.php");
include_once("../DAO/BrinquedoDAO.php");
include_once("../MODEL/Brinquedo.php");
include_once("../configuracao/conexao.php");
include_once("../configuracao/Constantes.php");

$REQUEST = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

// Armazenar essa instância no Controlador
$controleConexao = ControleConexao::getInstance();
$controleConexao->set('Connection', $conn);

//Instanciar a classe DAO para utilizarmos os seus métodos posteriormente
$brinquedoDAO = new BrinquedoDAO();

$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);


switch ($acao) {

    case $acao == "adicionarCarrinho":
        $idBrinquedo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $resultado = $brinquedoDAO->buscarRegistro($idBrinquedo);

        $brinquedoOBJ = (object) $resultado[0];
        if (!isset($_SESSION["carrinho"]) || empty($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = array();
        }


        $_SESSION["carrinho"][$brinquedoOBJ->getId_brinquedo()] = serialize($brinquedoOBJ);

        unset($_SESSION['mensagemSistema']);
        $_SESSION['mensagemSistema'] = "" . $brinquedoOBJ->getNome() . " foi adicionado ao carrinho";


        header('location: ../index.php');
        exit();
        break;



    case $acao == "listarBrinquedos":
        atualizarListaAdmin();
        break;



    case $acao == "remover":
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $brinquedoDAO->remover($id);

        unset($_SESSION['mensagemSistema']);
        $_SESSION['mensagemSistema'] = 'Brinquedo removido com sucesso!';

        atualizarListaAdmin();
        break;

    case $acao == "editar":
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        unset($_SESSION['editar_brinquedo']);

        $resultado = $brinquedoDAO->buscarRegistro($id);
        $_SESSION['editar_brinquedo'] = serialize($resultado[0]);
        header('location: ../VIEW/paginas/brinquedos/cadastro_brinquedo.php');
        exit();
        break;

    case $acao == "adicionar":
        $_SESSION['editar_brinquedo'] = serialize(new Brinquedo());
        header('location: ../VIEW/paginas/brinquedos/cadastro_brinquedo.php');
        exit();
        break;

    case $acao == "cadastrarBrinquedo":


        if ($REQUEST == "POST") {
            $id_brinquedo = filter_input(INPUT_POST, 'id_brinquedo', FILTER_DEFAULT);
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);


            // Instanciar um novo Prato e setar informações
            $brinqNovo = new Brinquedo();

            $brinqNovo->setId_brinquedo($id_brinquedo);
            $brinqNovo->setNome($nome);
            $brinqNovo->setPreco($preco);
            $brinqNovo->setTipo($tipo);


            // Chamar o método inserir criado no DAO.
            if ($brinqNovo->getId_brinquedo() == null) {
                $brinquedoDAO->inserir($brinqNovo);
                unset($_SESSION['mensagemSistema']);
                $_SESSION['mensagemSistema'] = 'Produto Adicionado com sucesso!';
            } else {
                $brinquedoDAO->atualizar($brinqNovo);
                unset($_SESSION['mensagemSistema']);
                $_SESSION['mensagemSistema'] = 'Produto Editado com sucesso!';
            }

            atualizarListaAdmin();
        }
        break;




    default:

        break;
}

function atualizarListaAdmin() {
    buscarTodos();
    header('location: ../VIEW/paginas/brinquedos/gerenciar_brinquedo.php');
    exit();
}

//busca todos os pratos e insere na session

function buscarTodos() {
    // Chamar o método buscarTodos() criado no DAO.
    global $brinquedoDAO;
    $resultados = $brinquedoDAO->buscarTodos();
    unset($_SESSION['listaBrinquedos']);
    $_SESSION['listaBrinquedos'] = serialize($resultados);
}
