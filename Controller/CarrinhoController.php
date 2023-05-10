<?php

/**/
session_start();
include_once("../configuracao/ControleConexao.php");
include_once("../DAO/BrinquedoDAO.php");
include_once("../DAO/PedidoDAO.php");
include_once("../MODEL/Brinquedo.php");
include_once("../MODEL/Usuario.php");
include_once("../MODEL/Brinquedo.php");
include_once("../MODEL/PedidoBrinquedo.php");
include_once("../configuracao/conexao.php");
include_once("../configuracao/Constantes.php");

//pega o fuso horário local de campo grande
date_default_timezone_set('America/Campo_Grande');

$REQUEST = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

// Armazenar essa instância no Controlador
$controleConexao = ControleConexao::getInstance();
$controleConexao->set('Connection', $conn);

//Instanciar a classe DAO para utilizarmos os seus métodos posteriormente
//$pratoDAO = new PratoDAO();
$pedidoDAO = new PedidoDAO();

$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);

switch ($acao) {
    case $acao == "verCarrinho":
        if (!isset($_SESSION["carrinho"]) || empty($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = array();
        }

        //para evitar registros duplicados
        $_SESSION["carrinho"] = array_unique($_SESSION["carrinho"]);


        header('location: ../VIEW/paginas/carrinho/gerenciar_carrinho.php');
         exit();
        break;

    case $acao == "remover":

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//aqui removemos o pedido pelo id
        unset($_SESSION["carrinho"][$id]);

        header('location: ../VIEW/paginas/carrinho/gerenciar_carrinho.php');
         exit();
        break;


    case $acao == "finalizarCompra":

        unset($_SESSION['mensagemSistema']);

        if (!isset($_SESSION["carrinho"]) || empty($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = array();
            $_SESSION['mensagemSistema'] = "Carrinho vazio!";
        } else {
            
            $quantidadeBrinquedo = filter_input(INPUT_POST, 'quantidadeBrinquedo', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $dataAtual = date('Y-m-d H:i:s');
            $pedido = new Pedido();

            $pedido->setData($dataAtual);

            //realizamos a verificação do usuário na sessão e pegamos o seu ID
            if (isset($_SESSION['usuario_logado'])) {
                $usuarioLogado = unserialize($_SESSION['usuario_logado']);
                $pedido->setFk_id_usuario($usuarioLogado->getId_usuario());
            }
            $pedido->setStatus("EM ANDAMENTO");

            $inserido = $pedidoDAO->inserir($pedido);
            $pedido->setId_pedido($inserido);

            $valorPedido = 0;
            $i = 0;
            foreach ($_SESSION["carrinho"] as $brinquedo) {
                $brinquedo = unserialize($brinquedo);
                $pedidoBrinquedo = new PedidoBrinquedo();

                $pedidoBrinquedo->setFk_id_pedido($pedido->getId_pedido());
                $pedidoBrinquedo->setFk_id_brinquedo($brinquedo->getId_brinquedo());
                $pedidoBrinquedo->setQuantidade($quantidadeBrinquedo[$i]);
                $valorPedido = $brinquedo->getPreco() * $quantidadeBrinquedo[$i] + $valorPedido;
                $i++;

                $pedidoDAO->adicionarBrinquedo($pedidoBrinquedo);
            }
            $pedido->setValorTotal($valorPedido);
            $pedidoDAO->atualizar($pedido);
            
             $_SESSION['mensagemSistema'] = "Pedido realizado com sucesso! <br> Total a ser pago: " . $valorPedido;
        }




       

        header('location: ../VIEW/paginas/carrinho/gerenciar_carrinho.php');
         exit();
        break;


    default:

        break;
}