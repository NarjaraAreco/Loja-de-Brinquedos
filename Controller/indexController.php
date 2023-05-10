<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("configuracao/ControleConexao.php");
include_once("DAO/BrinquedoDAO.php");
include_once("MODEL/Brinquedo.php");
include_once("configuracao/conexao.php");
include_once("configuracao/Constantes.php");

$REQUEST = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

// Armazenar essa instância no Controlador
$controleConexao = ControleConexao::getInstance();
$controleConexao->set('Connection', $conn);


$acao = filter_input(INPUT_GET, 'acao', FILTER_SANITIZE_STRING);

$brinquedoDAO = new BrinquedoDAO();

switch ($acao) {
    case $acao === "mostrarMenu":

        $resultados = $brinquedoDAO->buscarTodos();
        unset($_SESSION['listaBrinquedos']);
        $_SESSION['listaBrinquedos'] = serialize($resultados);

        header('location: /Loja_Brinquedos/indexSite.php');
        exit();
        break;

    default:
        break;
}



function menu() {
    global $brinquedoDAO;
    
    $resultados = $brinquedoDAO->buscarTodos();
    unset($_SESSION['listaBrinquedos']);
    $_SESSION['listaBrinquedos'] = serialize($resultados);

    header('location: /Loja_Brinquedos/indexSite.php');
    exit();
}
