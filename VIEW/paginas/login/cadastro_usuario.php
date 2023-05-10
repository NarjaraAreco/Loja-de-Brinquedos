<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- Include cabeçalho -->

    <?php
    include_once("../fixos/cabecalho_fixo.php");
    ?>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       

        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


        <style>
            /**/
            body, html {height: 100%}
            body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif;font-size: 23pt}

            .menu {display: none}
            .bgimg {
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url("VIEW/imagens/pizza_fundo_hd.jpg");
                min-height: 90%;
            }
        </style>
    </head>

    <body>


        <div class="wrapper fadeInDown">
            <div id="formContent">

                <?php if (isset($_SESSION['mensagemSistema'])): 
                    $mensagem = isset($_SESSION['mensagemSistema']) ? $_SESSION['mensagemSistema'] : "";
                    ?>
                
                    <div class = "alert alert-info">
                        <strong><?php echo $mensagem; ?></strong> 
                    </div>

                <?php
                unset($_SESSION['mensagemSistema']);
                endif; ?>





                <!-- Icone inserido -->
                <div class="fadeIn first">
                    <img src="../../imagens/icone_usuario.png" id="icon" alt="Icone de usuário" />
                </div>

                <!-- Formulário de login -->
                <form method="post" action="../../../Controller/UsuarioController.php?acao=cadastroUsuario">
                    <input type="text" id="nome" class="fadeIn second" name="nome" placeholder="Insira o nome" required>
                    <input type="text" id="cpf" class="fadeIn second" name="cpf" placeholder="Insira o cpf" required>
                    <input type="text" id="telefone" class="fadeIn second" name="telefone" placeholder="Insira o telefone" required>
                    <input type="email" id="email" class="fadeIn second" name="email" placeholder="Insira o email" required>
                    <input type="password" id="senha" class="fadeIn second" name="senha" placeholder="Insira a senha" required>
                    <input type="text" id="rua" class="fadeIn second" name="rua" placeholder="Insira a rua" required>
                    <input type="text" id="bairro" class="fadeIn second" name="bairro" placeholder="Insira o bairro" required>
                    <input type="text" id="numero" class="fadeIn third" name="numero" placeholder="Insira o número" required>
                    <input type="submit" class="fadeIn fourth" value="Cadastrar">
                </form>



            </div>
        </div>

    </body>

</html>
