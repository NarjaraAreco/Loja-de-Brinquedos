<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- Include cabeçalho -->

    <?php
    include_once "../fixos/cabecalho_fixo.php";
    require_once __RAIZ__ . '/MODEL/Brinquedo.php';
    // include_once(__RAIZ__."/VIEW/paginas/fixos/cabecalho.php");
    ?>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">      

        <!--css criado para paginas desse estilo de gerenciamento-->
        <link rel="stylesheet" type="text/css" href="../css/tabelas.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!--Icones-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




        <script>
            $(document).ready(function () {
                // Activate tooltip
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>



    </head>

    <body>
<div class="w3-main" style="margin-left:340px;margin-right:40px">
<div class="w3-container" style="margin-top:80px" id="menu">

        <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-xs-7">
                                <h2>Gerenciar <b>Carrinho</b></h2>
                            </div>

                        </div>
                    </div>



                    <form method="post" action="../../../Controller/CarrinhoController.php?acao=finalizarCompra">



                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>                                    
                                    <th>Tipo</th>
                                    <th>Nome</th>
                                  
                                    <th>Preço (Unitário)</th>
                                    <th>Quantidade</th>
                             
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($_SESSION["carrinho"] as $brinquedoOBJ) {
                                    $brinquedoOBJ = unserialize($brinquedoOBJ);
                                    ?>

                                    <tr>
                                        <td><?php echo $brinquedoOBJ->getTipo(); ?></td>
                                        <td><?php echo $brinquedoOBJ->getNome(); ?></td>
                                        <td><?php echo 'R$ ' . $brinquedoOBJ->getPreco(); ?></td>
                                        <td>
                                            <input type="number" id="quantidadeBrinquedo" name="quantidadeBrinquedo[]" value="1">
                                        </td>
                                        <td>                                                
                                            <!--<a href="../../../Controller/PratoController.php?acao=remover" class="delete" data-toggle="modal">  <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>-->
                                            <a href="../../../Controller/CarrinhoController.php?acao=remover&id=<?php echo $brinquedoOBJ->getId_brinquedo(); ?>" class="delete" data-toggle='tooltip'>
                                                <i class="material-icons" data-toggle="tooltip" title="Remover brinquedo">&#xE872;</i></a>                                  
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>


                        </table>
                        <input type="submit" class="fadeIn second" value="Finalizar compra" />
                    </form>

                </div>

                <?php
                if (isset($_SESSION['mensagemSistema'])):
                    $mensagem = isset($_SESSION['mensagemSistema']) ? $_SESSION['mensagemSistema'] : "";
                    unset($_SESSION["carrinho"]);
                    ?>

                    <div class = "alert alert-info">
                        <strong><?php echo $mensagem; ?></strong> 
                    </div>

                    <?php
                    unset($_SESSION['mensagemSistema']);
                endif;
                ?>

            </div>        
        </div>



    </body>


</html>
