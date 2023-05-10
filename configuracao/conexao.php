<?php

try { 

    //nome da base de dados
    $baseDados = "lojabrinquedos";
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";

    $conn = new PDO("mysql:host={$servidor};dbname={$baseDados}", $usuario, $senha, [PDO::ATTR_PERSISTENT => true
    ]);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>